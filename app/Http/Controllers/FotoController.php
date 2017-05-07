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
			'foto1' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
			'foto2' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
			]);

			$hasupload = Foto::where('nomor_peserta', '=', $request->nomor_peserta)->first();
			if($hasupload)
			{
				flash('Anda sudah mensubmit foto', 'danger');
				return redirect('upload');
			}

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
			flash('Berhasil Submit Foto');
			return redirect('upload');
		}

	}
