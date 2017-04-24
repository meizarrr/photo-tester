<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Foto;

class DisplayController extends Controller
{
        public function display(Request $request)
    {
    	$jumlah_foto = DB::table('fotos')
    		->where('soal' , '=' , 1)
    		->count();
    	$nama_juri = Auth::user()->name;
    	$status = DB::table('status_juri')
    		->where('name', '=' , $nama_juri)
    		->first();
    	$counter = $status->last_photo;
    	$counter = $counter-1;
    	$display = DB::table('fotos')
    		->skip($counter)
    		->first();

    	return view('soal' )
    		->with('counter', $status->last_photo)
    		->with('max', $jumlah_foto)
    		->with('source', $display);

    		
    }
}
