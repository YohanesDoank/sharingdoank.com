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
        $subKateg = Input::get('select-subKateg');
        // $error = Input::get('select-subKateg');
        $message = Artikel::where('article.title',  'like', '%'.$kata.'%' )->where('kategori','like','tutorial')->where('SubKategori','like','%'.$subKateg.'%')->paginate(6);
        // return Redirect::to('tutorials')->with('message', $message);
        // return $message;
        if ($subKateg == "" ) {
            $message = Artikel::where("kategori","=","tutorial")->orderby("created_at", "slug")->paginate(6);
            Session::flash('errors', 'Pilih salah satu Kategori');
            return view('page.tutorials',compact('message', 'kata', 'subKateg'));            
        }
        else{
            return view('page.tutorials',compact('message', 'kata', 'subKateg'));            
        }
        

    }

    // to show posting 
    public function show_detail_post($kategori, $SubKategori1, $slug){
        $artikel = Artikel::where("slug","like",'%'.$slug.'%')->where("kategori", "=", $kategori)->where("SubKategori", "like",'%'.$SubKategori1.'%')->get();
        $artikelRelated = Artikel::where("slug","<>",$slug)->where("kategori", "=", $kategori)->where("SubKategori", "like",'%'.$SubKategori1.'%')->paginate(8);
        return view('page.single',compact('artikel', 'artikelRelated')); 
        // echo $kategori.$SubKategori1.$slug ;
    }

    public function show_detail_post2($kategori, $SubKategori1, $SubKategori2, $slug){
        $artikel = Artikel::where("slug","like",'%'.$slug.'%')->where("kategori", "=", $kategori)->where("SubKategori", "like",'%'.$SubKategori2.'%')->get();
        $artikelRelated = Artikel::where("slug","<>",$slug)->where("kategori", "=", $kategori)->where("SubKategori", "like",'%'.$SubKategori2.'%')->paginate(8);
        return view('page.single',compact('artikel', 'artikelRelated'));  
    }
    public function show_detail_post3($kategori, $SubKategori1, $SubKategori2, $SubKategori3, $slug){
        $artikel = Artikel::where("slug","like",'%'.$slug.'%')->where("kategori", "=", $kategori)->where("SubKategori", "like",'%'.$SubKategori3.'%')->get();
        $artikelRelated = Artikel::where("slug","<>",$slug)->where("kategori", "=", $kategori)->where("SubKategori", "like",'%'.$SubKategori3.'%')->paginate(8);
        return view('page.single',compact('artikel', 'artikelRelated'));  
    }

}

