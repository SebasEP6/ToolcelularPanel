<?php

namespace Service\Http\Controllers;

use Illuminate\Http\Request;

use Service\Http\Requests;
use Service\Http\Controllers\Controller;

use Service\User;
use Service\Phone;
use Service\Entry;
use Service\BrandModel;
use Service\Image;

use Carbon\Carbon;

class DefaultController extends Controller
{
    public function index()
    {
    	$users = User::get();

    	return view('home', compact('users'));
    }

    public function update($i)
    {
    	$entry = Entry::findOrFail($i);

    	return view('phones.update', compact('entry'));
    }

    public function postUpdate(Request $data, $i)
    {
    	$entry = Entry::findOrFail($i);

        $rules = [
            'error' => 'required',
            'budget' => 'required',
            'delivery' => 'required',
            'state' => 'required'
        ];

        $validate = \Validator::make($data->all(), $rules);
        if ($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }

    	$entry->fill($data->all());
    	$entry->save();

    	if ($entry->state == 'fixed')
        {
            \Mail::send('emails.notification', compact('entry'), function ($message) use ($entry) {

                $message->from('no-reply@toolcelular.com.ve', 'Toolcelular');
                $message->subject('Notificación Servicio Técnico');
                $message->to($entry->email);

            });
        }

    	return redirect()->route('phones');
    }

    public function store_imgs(Request $data, $i)
    {
    	$entry = Entry::findOrFail($i);

    	$path = public_path().'/uploads/'.$entry->c_id;

    	if(!file_exists($path))
    	{
    		mkdir($path, 0755);
    	}

		$files = $data->file('file');

		foreach($files as $file)
		{
			$fileName = $file->getClientOriginalName();
			$file->move($path, $fileName);

			$img = new Image();
			$img->path = '/uploads/'.$entry->c_id.'/'.$fileName;
			$img->entry_id = $entry->id;
			$img->save();
		}

		return redirect()->route('upPh', $i);
    }

    public function delete($i)
    {
    	Entry::destroy($i);

    	return redirect()->back();
    }

    public function adminPhones()
    {
    	$entries = Entry::where('user_id', \Auth::user()->id)
    					->where('state', '<>', 'delivered')
    					->get();

    	$actualDate = Carbon::now();

    	return view('phones.admin', compact('entries'));
    }

    public function create()
    {
    	$phones = Phone::orderBy('name', 'ASC')->lists('name', 'id');

    	return view('phones.add', compact('phones'));
    }

    public function postCreate(Request $data)
    {
    	$entry = new Entry();

        $rules = [
            'c_name' => 'required',
            'c_id' => 'required',
            'email' => 'required',
            'phone_id' => 'required',
            'brand_model_id' => 'required',
            'p_imei' => 'required|between:14,17',
            'observation' => 'required'
        ];

        $validate = \Validator::make($data->all(), $rules);
        if ($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }

    	$entry->fill($data->all());
    	$entry->user_id = \Auth::user()->id;
    	$entry->state = 'non-check';
    	$entry->save();

    	return redirect()->route('phones');
    }

    public function getBModels(Request $request, $i)
    {
    	if ($request->ajax())
    	{
    		$bModels = BrandModel::where('phone_id', $i)
    								->orderBy('name')->get();

    		return response()->json($bModels);
    	}
    }
}
