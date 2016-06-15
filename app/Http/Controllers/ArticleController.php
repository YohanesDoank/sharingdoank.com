<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Artikel;
use View;
use File;
use DB;
use Session;
use Input;
use Validator;
use Response;
use Redirect;

class ArticleController extends Controller
{
    public function index(){
        $message = Artikel::orderby("created_at", "slug")->paginate(4);
        return view('index',compact('message'));
    }

    public function tutorials(){
        $message = Artikel::where("kategori","=","tutorial")->orderby("created_at", "slug")->paginate(6);
        return view('page.tutorials',compact('message'));
    }

    public function searchTutor(){
    	
    	$kata = Input::get('kata_kunci');
        $message = Artikel::where('article.title',  'like', '%'.$kata.'%' )->where("kategori","=","tutorial")->paginate(6);
        // return Redirect::to('tutorials')->with('message', $message);
        return view('page.tutorials',compact('message'));
        // return $message;
    }

    // to show posting 
    public function show_detail_post($kategori, $SubKategori, $slug){
        $artikel = Artikel::where("slug","=",$slug)->where("kategori", "=", $kategori)->where("SubKategori", "=", $SubKategori)->get();
        return view('page.single',compact('artikel'));
    }

    public function show_detail_post2($kategori, $SubKategori1, $SubKategori2, $slug){
        $artikel = Artikel::where("slug","=",$slug)->where("kategori", "=", $kategori)->where("SubKategori", "like",'%'.$SubKategori2.'%')->get();
        return view('page.single',compact('artikel'));  
    }


}

