<?php

namespace Service\Http\Controllers;

use Illuminate\Http\Request;

use Service\Http\Requests;
use Service\Http\Controllers\Controller;
use Service\User;

class AdminController extends Controller
{
    public function panel()
    {
    	return view('admin.panel');
    }

    public function config()
    {
    	$user = User::findOrFail(\Auth::user()->id);

    	return view('admin.config', compact('user'));
    }

    public function postConfig(Request $request)
    {
    	$user = User::findOrFail(\Auth::user()->id);

    	$rules = [
    		'name' => 'required',
    		'email' => 'required|unique:users,email,'.$user->id,
    		'description' => 'required|max:255',
    		'logo' => 'mimes:jpeg,gif,png,bmp'
    	];

    	$data = [
    		'name' => $request->name,
    		'email' => $request->email,
    		'description' => $request->description,
    		'password' => $request->password,
    		'logo' => $request->file('logo')
    	];

    	$validate = \Validator::make($data, $rules);
        if ($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $user->fill($data);

        if ($data['logo'] != null)
        {
        	if($user->path != null)
        	{
        		unlink(public_path().$user->path);
        	}

        	$ext = pathinfo($data['logo']->getClientOriginalName());

        	\Storage::disk('local')->put($data['name'].'.'.$ext['extension'],  \File::get($data['logo']));

        	$user->path = '/uploads/'.$data['name'].'.'.$ext['extension'];
        }

        $user->save();

        return redirect()->route('panel');
    }
}
