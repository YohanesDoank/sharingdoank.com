<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Artikel;
use View;
use File;
use DB;
use Session;
class PageController extends Controller
{
    public function index(){
	   return view('index');
    }

    public function about(){
	   return view('page.about');
    }
    public function articles(){
	   return view('page.articles');
    }
    public function contact(){
	   return view('page.contact');
    }
    public function single(){
	   return view('page.single');
    }
    public function tutorials(){
	   return view('page.tutorials');
    }
    public function createPost(){
       return view('page.createPost');
    }
    public function showPost(){
       return view('page.showPost');
    }
    public function editPost(){
       return view('page.edit_post');
    }
    // auth
    public function login(){
       return view('auth.login');
    }
    public function register(){
       return view('auth.register');
    }




}
