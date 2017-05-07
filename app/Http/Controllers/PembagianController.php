<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class PembagianController extends Controller
{
    public function index(Request $request)
    {
    	$nama_juri = Auth::user()->name;
        $kategori = Auth::user()->kategori;
        $soal = Auth::user()->soal;
        $result = DB::table('users')
        	->where('kategori' , '=', $request->kategori)
        	->where('soal', '=', $request->soal)
        	->count();
        if($result >= 2)
        {
        	flash('Kategori dan Soal sudah dipilih 2 juri lain.');
        	return redirect ('home');
        }
        else
        {
        	if($kategori == NULL)
	        {
	        	DB::table('users')
					->where('name' , '=' , $nama_juri)
					->update([
						'kategori' => $request->kategori,
						'soal' => $request->soal
					]);
	        }
	        return redirect()->action('ScoringController@display');
        }
        
    }
}
