<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Foto as foto;
use DB;
use Storage;
use Auth;
use File;
use App\Peserta;

class FotoController extends Controller
{
	public function upload(Request $request){
		$this->validate($request, [
			'nomor_peserta' => 'required',
			'kategori' => 'required',
		]);

		$pesan='';

		if(($request->foto1 != NULL))
		{
			$hasupload = Foto::where('nomor_peserta', '=', $request->nomor_peserta)
						->where('kategori', '=', $request->kategori)
						->where('soal', '=', 1)
						->first();
			if($hasupload)
			{
				$pesan=$pesan.'Pernah submit soal 1, ';
			}
			else
			{
				$foto1 = $request->file('foto1');
				$nama_file = $request->nomor_peserta . '.' . $foto1->getClientOriginalExtension();
				$destinationPath = public_path('/' . $request->kategori . '/soal1');
				$foto1->move($destinationPath, $nama_file);
				$foto = new foto;
				$foto->nama_file = $nama_file;
				$foto->kategori = $request->kategori;
				$foto->soal = "1";
				$foto->nomor_peserta = $request->nomor_peserta;
				$foto->save();
				$pesan=$pesan . 'Berhasil submit Soal 1, ';
				DB::table('users')
					->where('soal', '=', 1)
					->where('kategori', '=', $request->kategori)
					->update(['status' => 'UNFINISHED']);
			}
		}

		if($request->foto2 != NULL)
		{
			$hasupload = Foto::where('nomor_peserta', '=', $request->nomor_peserta)
						->where('kategori', '=', $request->kategori)
						->where('soal', '=', 2)
						->first();
			if($hasupload)
			{
				$pesan=$pesan . 'Pernah submit soal 2, ';
			}
			else
			{
				$foto2 = $request->file('foto2');
				$nama_file = $request->nomor_peserta . '.' . $foto2->getClientOriginalExtension();
				$destinationPath = public_path('/' . $request->kategori . '/soal2');
				$foto2->move($destinationPath, $nama_file);
				$foto = new foto;
				$foto->nama_file = $nama_file;
				$foto->kategori = $request->kategori;
				$foto->soal = "2";
				$foto->nomor_peserta = $request->nomor_peserta;
				$foto->save();
				$pesan=$pesan . 'Berhasil submit soal 2, ';
				DB::table('users')
					->where('soal', '=', 2)
					->where('kategori', '=', $request->kategori)
					->update(['status' => 'UNFINISHED']);
			}
		}

		if($pesan != '') flash($pesan, 'danger')->important();
		return redirect('upload');		
	}

}
