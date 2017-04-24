<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Foto;

class ScoringController extends Controller
{
	public function scoring(Request $request)
	{
		$nama_juri = Auth::user()->name;
		$query = DB::table('status_juri')
					->where('name', '=', $nama_juri)
					->where('soal', '=', 1)
					->first();
		$scored = $query->scored_photo;

		$jumlah_foto = DB::table('fotos')
			->where('soal' , '=' , 1)
			->count();
			
		$status = DB::table('status_juri')
			->where('name', '=' , $nama_juri)
			->where('soal', '=', 1)
			->first();

		
		$nama_file = $request->nama_file;
		if($request->nilai != NULL)
		{
			
				DB::table('fotos')
					->where('nama_file' , '=' , $request->nama_file)
					->where('soal' , '=' , 1)
					->update([$nama_juri => $request->nilai]
				);
				
				$scored = $scored + 1;
				if($scored == $jumlah_foto)
				{
					return $this->displayScore();
				}

				DB::table('status_juri')
					->where('name', '=', $nama_juri)
					->where('soal', '=', 1)
					->update(['scored_photo' => $scored]
				);

		}

		

		if($request->clickedbutton == 'previous')
		{
			
			if($status->last_photo == 1)
			{
				$previous_photo = DB::table('fotos')
					->where('soal', '=' , 1)
					->orderBy('id')
					->offset($jumlah_foto-1)
					->select('nama_file')
					->first();

				DB::table('status_juri')
					->where('name' , '=' , $nama_juri)
					->where('soal', '=', 1)
					->update(['last_photo' => $jumlah_foto]);

				return view('soal' )
				->with('counter', $jumlah_foto)
				->with('max', $jumlah_foto)
				->with('source', $previous_photo);
			}
			else
			{
				$previous_photo = DB::table('fotos')
					->where('soal', '=' , 1)
					->orderBy('id')
					->offset($status->last_photo-2)
					->select('nama_file')
					->first();

				DB::table('status_juri')
					->where('name' , '=' , $nama_juri)
					->where('soal', '=', 1)
					->update(['last_photo' => $status->last_photo-1]);

				return view('soal' )
					->with('counter', $status->last_photo-1)
					->with('max', $jumlah_foto)
					->with('source', $previous_photo);
			}
			
		}

		elseif($request->clickedbutton == 'next')
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
					->orderBy('id')
					->offset(0)
					->select('nama_file')
					->first();

				DB::table('status_juri')
					->where('name' , '=' , $nama_juri)
					->where('soal', '=', 1)
					->update(['last_photo' => 1]);

				return view('soal')
				->with('counter', 1)
				->with('max', $jumlah_foto)
				->with('source', $next_photo);
			}

			else
			{
				$next_photo = DB::table('fotos')
					->where('soal', '=' , 1)
					->orderBy('id')
					->offset($status->last_photo)
					->select('nama_file')
					->first();

				DB::table('status_juri')
					->where('name' , '=' , $nama_juri)
					->where('soal', '=', 1)
					->update(['last_photo' => $status->last_photo+1]);

				return view('soal' )
					->with('counter', $status->last_photo+1)
					->with('max', $jumlah_foto)
					->with('source', $next_photo);
			}
		}
	}

	public function displayScore()
	{

		$hasil = DB::table('fotos')
			->select(DB::raw("nama_file, (juri1 + juri2 + juri3) as total"))
			->where('soal', '=', 1)
			->orderBy('total', 'desc')
			->get();

		return view('skor')
			->with('data', $hasil);
	}
}
