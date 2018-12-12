<?php

namespace Service\Http\Controllers;

use Illuminate\Http\Request;

use Service\Http\Requests;
use Service\Http\Controllers\Controller;

use Service\Entry;

class SearchController extends Controller
{
	public function view($phone, $i)
	{
		$entry = Entry::findOrFail($i);

		return view('search.view', compact('entry'));
	}

    public function search(Request $data, $i)
    {
    	$entries = Entry::where('user_id', $i)
    					->where('c_id', $data->c_id)
    					->orderBy('created_at', 'DESC')
    					->get();

    	return view('search.list', compact('entries'));
    }
}
