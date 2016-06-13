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
use Datatables;
class PostController extends Controller
{
    protected $rules = [
        'title' => ['required', 'max:255', 'unique:article,title'],
        'isi' => ['required'],
        'image' => ['required'],

    ];

    protected $messageRules = [
            'title.required'  => ' Harus Isi judul ' ,
            'title.unique'  => ' Judul sudah Diambil ',
            'isi.required' => ' Harus Isi content ',
            'image.required' => ' Kudu ngasi Gambar utama Artikel ',
    ];
    
    protected $rulesEdit = [
        'title' => ['required', 'max:255'],
        'isi' => ['required']
    ];

    protected $messageRulesEdit = [
            'title.required'  => ' Harus Isi judul ',
            'isi.required' => 'isi content juga'
    ];

    // for create articles purposes
    public function create_post(Request $request){
        $err_code;
        $error;
        $message;

        $this->validate($request, $this->rules, $this->messageRules);
        
        try{
            $artikel = new Artikel;
            $artikel->title = $request->title;
            $artikel->content = $this->generateImage($request->isi);
            $artikel->slug = str_replace(" ", '-', strtolower($request->title));
            $artikel->path = $this->saveImage($request->image);
            $artikel->kategori = $request->kategori;
            $artikel->penginput = $request->penginput;

            // $artikel->kategori = $request->kategori;

            $artikel->save();

            $err_code = 0;
            $error = "Success!";
            $message = ", Artikel telah diupload!";

        }catch(Exception $e){
            $err_code = 0;
            $error = "Warning!";
            $message = ", Artikel gagal diupload!";
        }

        return response()->json(['error_code' => $err_code, 'error' => $error, 'message' => $message]);
    }

    // this function to show all post with ajax
    public function show_all_post(Request $request){
        return Datatables::of(Artikel::get())->make(true);
    }

    public function editPost($id){
        $message = Artikel::where("id","=",$id)->get();
        return view('page.edit_post',compact('message'));

    }
    public function update_post(Request $request){
        $err_code;
        $error;
        $message;

        $this->validate($request, $this->rulesEdit, $this->messageRulesEdit);
        
        try{
            $artikel = Artikel::find($request->id);
            $artikel->title = $request->title; 
            if($request->image != ""){
                File::delete($artikel->path);
                $artikel->path = $this->saveImage($request->image);
            }
            else if($request->foto == ""){   
                File::delete($artikel->path);
                $artikel->path = "";
            }
            $artikel->content = $this->generateImage($request->isi);
            $artikel->slug = str_slug($request->title, "-");
            $artikel->kategori = $request->kategori;
            $artikel->updated_at = $request->updated_at;

            $artikel->save();

            //return redirect()->action('ArtikelController@kelola_post');

            $err_code = 0;
            $error = "Success!";
            $message = ", Artikel berhasil diedit!";

        }catch(Exception $e){
            $err_code = 0;
            $error = "Warning!";
            $message = ", Artikel gagal diedit!";
        }

        return response()->json(['error_code' => $err_code, 'error' => $error, 'message' => $message]);
    }

    

    public function delete_post(Request $request){
        //return redirect('/');
        $title;
        try{
            $artikel = Artikel::find($request->id);
            File::delete($artikel->path);

            $artikel->delete();

            $err_code = 0;
            $error = "Success! ";
            $message = " telah dihapus!";
            $title = $request->title;

        }catch(Exception $e){
            $err_code = 0;
            $error = "Warning!";
            $message = ", Artikel gagal dihapus!";
        }

        return response()->json(['error_code' => $err_code, 'error' => $error, 'title' => $title, 'message' => $message]);
    }


    // to show posting 


    public function show_detail_post($kategori, $slug){
        $artikel = Artikel::where("slug","=",$slug)->where("kategori", "=", $kategori)->get();
        return view('page.single',compact('artikel'));
    }

    // this function for genereate image from summernote editor
    private function generateImage($html){
        $html = preg_replace_callback("/src=\"data:([^\"]+)\"/", function ($matches) {
            list($contentType, $encContent) = explode(';', $matches[1]);
            if (substr($encContent, 0, 6) != 'base64') {
                return $matches[0]; // Don't understand, return as is
            }
            $imgBase64 = substr($encContent, 6);
            $imgFilename = md5($imgBase64); // Get unique filename
            //$imgFilename = $title . "_image_" . date();
            $imgExt = '';
            switch($contentType) {
                case 'image/jpeg':  $imgExt = 'jpg'; break;
                case 'image/gif':   $imgExt = 'gif'; break;
                case 'image/png':   $imgExt = 'png'; break;
                default:            return $matches[0]; // Don't understand, return as is
            }

            $dir = "gambarArtikel/";
            
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }

            $imgPath = $dir.$imgFilename.rand(0, 15).'.'.$imgExt;
            // Save the file to disk if it doesn't exist
            if (!file_exists($imgPath)) {
                $imgDecoded = base64_decode($imgBase64);
                $fp = fopen($imgPath, 'w');
                if (!$fp) {
                    return $matches[0];
                }
                fwrite($fp, $imgDecoded);
                fclose($fp);
            }
            return 'src="../../'.$imgPath.'"';
        }, $html);

        return $html;
    }

        private function saveImage($data){

        list($type, $encContent) = explode(';', $data);
        list($str, $contentType) = explode(':', $type);
        if (substr($encContent, 0, 6) != 'base64') {
            return -1; // Don't understand, return as is
        }
        $imgBase64 = substr($encContent, 6);
        $imgFilename = md5($imgBase64); // Get unique filename
        //$imgFilename = $title . "_image_" . date();
        $imgExt = '';
        switch($contentType) {
            case 'image/jpeg':  $imgExt = 'jpg'; break;
            case 'image/gif':   $imgExt = 'gif'; break;
            case 'image/png':   $imgExt = 'png'; break;
            default:            return $matches[0]; // Don't understand, return as is
        }

        $dir = "gambarArtikel/";
        
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $imgPath = $dir.$imgFilename.'.'.$imgExt;
        // Save the file to disk if it doesn't exist
        if (!file_exists($imgPath)) {
            $imgDecoded = base64_decode($imgBase64);
            $fp = fopen($imgPath, 'w');
            if (!$fp) {
                return $matches[0];
            }
            fwrite($fp, $imgDecoded);
            fclose($fp);
        }
        return $imgPath;
    }


}

