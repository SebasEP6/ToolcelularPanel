<?php

namespace Service\Http\Controllers;

use Illuminate\Http\Request;

use Service\Http\Requests;
use Service\Http\Controllers\Controller;

use Service\User;
use Service\Record;

use Carbon\Carbon;

class UsersController extends Controller
{
    public function company()
    {
    	$users = User::orderBy('name', 'ASC')
                        ->where('email', '<>', 'toolcelular@gmail.com')
                        ->paginate(5);

    	return view('users.admin', compact('users'));
    }

    public function renew($i)
    {
    	$records = Record::findOrFail($i);

        $date = Carbon::Parse($records->exp_date)->format('d-M-y h:i:s');

        $records->exp_date = $date->addYear();
    	$records->save();

    	return redirect()->back();
    }

    public function delete($i)
    {
    	User::destroy($i);

    	return redirect()->back();
    }

    public function create()
    {
    	return view('users.add');
    }

    public function postCreate(Request $data)
    {
    	$rules = [
    		'name' => 'required',
    		'email' => 'required|unique:users,email'
    	];

    	$validate = \Validator::make($data->all(), $rules);
        if ($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $user = new User();
        $user->fill($data->all());
        $user->password = '123456';
        $user->save();

        $date = Carbon::Parse($user->created_at)->addYear();

        $record = new record();
        $record->user_id = $user->id;
        $record->exp_date = $date;
        $record->save();

        return redirect()->route('comp');
    }
}
