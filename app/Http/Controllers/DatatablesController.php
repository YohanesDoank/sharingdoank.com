<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Datatables;

use App\Artikel;
use View;
use Auth;

class DatatablesController extends Controller
{
    public function getIndex(){
    	return view('datatables.index');
	}

/**
 * Process datatables ajax request.
 *
 * @return \Illuminate\Http\JsonResponse
 */
	public function anyData(){
    	return Datatables::of(Artikel::get())->make(true);
	}
}
