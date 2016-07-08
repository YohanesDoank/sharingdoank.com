<?php 
namespace App\Helpers;
use App\Artikel;


   class Helper {
      public static function displayString($string){
          return $string;
      }

      // public static function indonesian_date ($timestamp = '', $date_format = 'l, j F Y | H:i', $suffix = 'WIB') {
      public static function indonesian_date ($timestamp = '', $date_format = 'l, j F Y') {
	    if (trim ($timestamp) == '')
	    {
	            $timestamp = time ();
	    }
	    elseif (!ctype_digit ($timestamp))
	    {
	        $timestamp = strtotime ($timestamp);
	    }
	    # remove S (st,nd,rd,th) there are no such things in indonesia :p
	    $date_format = preg_replace ("/S/", "", $date_format);
	    $pattern = array (
	        '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
	        '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
	        '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
	        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
	        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
	        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
	        '/April/','/June/','/July/','/August/','/September/','/October/',
	        '/November/','/December/',
	    );
	    $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
	        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
	        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
	        'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
	        'Oktober','November','Desember',
	    );
	    $date = date ($date_format, $timestamp);
	    $date = preg_replace ($pattern, $replace, $date);
	    // $date = "{$date} {$suffix}";
	    return $date;
	} 
	public static function checkNewPost($date){

		//code dibawah buat mengecek apakah post masih baru atau tidak
		$baru = ""; $timezone = date('d', time());
		$string = $date;
		$timestamp = strtotime($string);
		$tgl = date("d", $timestamp);
		
		if ($timezone - $tgl <= 2) {
			$baru = "baru";
		}

		return $baru;
	}
	public static function jumlahRowKategoriPost(){
		$totalRowFound;
		$counter = 0;
		$artTotal;
		$tutTotal;
		$kategori = ["artikel", "tutorial"];
		$subArt = ["coding", "berita-hot", "pengetahuan-umum"];
		$subTut = ["coding-php","coding-vb","coding-java-desktop","coding-java-mobile", "sulap", "game-ps", "game-pc", "game-mobile", "game-jadul"];
		// $subTutor = [];
		for ($i=0; $i < 2 ; $i++) { 
			if ($i == 0) {
				for ($j=0; $j < count($subArt) ; $j++) { 
					// $artTotal[$i] = Artikel::where("kategori","=","artikel")->count();
					$artTotal[$j] = Artikel::where("kategori","=",$kategori[$i])->where("subKategori","like","%".$subArt[$j]."%")->count();
					$totalRowFound[$counter] = $artTotal[$j];
					$counter += 1;

				}
			}
			else{
				for ($j=0; $j < count($subTut) ; $j++) { 
					// $artTotal[$i] = Artikel::where("kategori","=","artikel")->count();
					$tutTotal[$j] = Artikel::where("kategori","=",$kategori[$i])->where("subKategori","like","%".$subTut[$j]."%")->count();
					$totalRowFound[$counter] = $tutTotal[$j];
					$counter += 1;
				}	
			}
			
		}
        return $totalRowFound;
	}
  }