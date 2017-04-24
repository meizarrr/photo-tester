<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Foto;

class DisplayController extends Controller
{
    public function next(Request $request)
    {
    	$jumlah_foto = DB::table('fotos')
    		->where('soal' , '=' , 1)
    		->count();
    	$nama_juri = Auth::user()->name;
    	$status = DB::table('status_juri')
    		->where('name', '=' , $nama_juri)
    		->first();

    	if ($status->last_photo == $jumlah_foto)
    	{
    		$next_photo = DB::table('fotos')
	    		->where('soal', '=' , 1)
	    		->first();
    		
    		return view('soal' )
    			->with('counter', $status->last_photo)
    			->with('max', $jumlah_foto)
    			->with('source', $next_photo);
    	}
    	else
    	{
    		$next_photo = DB::table('fotos')
	    		->where('soal', '=' , 1)
	    		->skip($status->last_photo)
	    		->first();
    		
    		return view('soal' )
    			->with('counter', $status->last_photo)
    			->with('max', $jumlah_foto)
    			->with('source', $next_photo);
    	}
    	
    }

    public function previous(Request $request)
    {	
    	$jumlah_foto = DB::table('fotos')
    		->where('soal' , '=' , 1)
    		->count();

    	$nama_juri = Auth::user()->name;
    	$status = DB::table('status_juri')
    		->where('name', '=' , $nama_juri)
    		->first();

    	if($status->last_photo == 1)
    	{
    		$previous_photo = DB::table('fotos')
	    		->where('soal', '=' , 1)
	    		->skip($jumlah_foto-1)
	    		->select('nama_file')
	    		->first();
    		
    		return view('soal' )
    			->with('counter', $status->last_photo)
    			->with('max', $jumlah_foto)
    			->with('source', $previous_photo);
    	}
    	$previous_photo = DB::table('fotos')
    		->where('soal', '=' , 1)
    		->skip($status->last_photo-2)
    		->select('nama_file')
    		->first();
    	
    		return view('soal' )
    			->with('counter', $status->last_photo)
    			->with('max', $jumlah_foto)
    			->with('source', $previous_photo);
    }

    public function display(Request $request)
    {
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
