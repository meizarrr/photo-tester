<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Foto;

class DisplayController2 extends Controller
{
        public function display(Request $request)
        {
            $jumlah_foto = DB::table('fotos')
                ->where('soal' , '=' , 2)
                ->count();
            $nama_juri = Auth::user()->name;
            $status = DB::table('status_juri')
                ->where('name', '=' , $nama_juri)
                ->where('soal', '=', 2)
                ->first();
            $counter = $status->last_photo;
            $counter = $counter-1;
            $display = DB::table('fotos')
                ->where('soal', '=', 2)
                ->skip($counter)
                ->first();

            return view('soalb')
                ->with('counter', $status->last_photo)
                ->with('max', $jumlah_foto)
                ->with('source', $display);
        }
}
