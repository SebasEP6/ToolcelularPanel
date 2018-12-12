<?php

namespace Service\Http\Controllers;

use Illuminate\Http\Request;

use Service\Http\Requests;
use Service\Http\Controllers\Controller;

use Service\Phone;
use Service\BrandModel;

class PhonesController extends Controller
{
    public function brand(Request $data)
    {
    	$phone = new Phone();
    	$phone->fill($data->all());
    	$phone->save();

    	return redirect()->back();
    }

    public function bModel(Request $data)
    {
    	$bModel = new BrandModel();
    	$bModel->fill($data->all());
    	$bModel->save();

    	return redirect()->back();
    }
}
