<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Foto;

class ScoringController extends Controller
{
	public function display(Request $request)
	{
		$nama_juri = Auth::user()->name;
		$kategori = Auth::user()->kategori;
		$soal = Auth::user()->soal;
		$skiped = Auth::user()->skiped;
		$scored = Auth::user()->scored_photo;

		$jumlah_foto = DB::table('fotos')
			->where('kategori' , '=', $kategori)
            ->where('soal' , '=' , $soal)
            ->count();

        $display = DB::table('fotos')
        	->where('kategori' , '=', $kategori)
            ->where('soal' , '=', $soal)
            ->where($nama_juri, '=' , 0)
            ->orderBy('id')
            ->skip($skiped)
            ->first();
		return view('soal')
			->with('kategori', $kategori)
			->with('soal', $soal)
            ->with('counter', $skiped+$scored+1)
            ->with('max', $jumlah_foto)
            ->with('source', $display);
	}

	public function scoring(Request $request)
	{
		$nama_juri = Auth::user()->name;
		$kategori = Auth::user()->kategori;
		$soal = Auth::user()->soal;
		$skiped = Auth::user()->skiped;
		$scored = Auth::user()->scored_photo;
		$jumlah_foto = DB::table('fotos')
			->where('kategori' ,'=', $kategori)
			->where('soal' , '=' , $soal)
			->count();

		if($request->clickedbutton == "next")
		{
			if($request->nilai != NULL)
			{
				DB::table('fotos')
					->where('nama_file' , '=' , $request->nama_file)
					->where('kategori' ,'=', $kategori)
					->where('soal' , '=' , $soal)
					->update([$nama_juri => $request->nilai]
				);
				
				$scored = $scored + 1;
				DB::table('users')
					->where('name', '=', $nama_juri)
					->where('kategori' ,'=', $kategori)
					->where('soal' , '=' , $soal)
					->update(['scored_photo' => $scored]
				);
			}
			else
			{
				$skiped = $skiped + 1;
				if($skiped >= ($jumlah_foto-$scored))
				{
					$skiped = 0;
				}
				DB::table('users')
					->where('name', '=', $nama_juri)
					->where('kategori' ,'=', $kategori)
					->where('soal' , '=' , $soal)
					->update(['skiped' => $skiped]
				);
			}

			$display = DB::table('fotos')
	        	->where('kategori' , '=', $kategori)
	            ->where('soal' , '=', $soal)
	            ->where($nama_juri, '=' , 0)
	            ->orderBy('id')
	            ->skip($skiped)
	            ->first();
			return view('soal')
				->with('kategori', $kategori)
				->with('soal', $soal)
	            ->with('counter', $skiped+$scored+1)
	            ->with('max', $jumlah_foto)
	            ->with('source', $display);
		}
		if($request->clickedbutton == "previous")
		{
			if($request->nilai != NULL)
			{
				DB::table('fotos')
					->where('nama_file' , '=' , $request->nama_file)
					->where('kategori' ,'=', $kategori)
					->where('soal' , '=' , $soal)
					->update([$nama_juri => $request->nilai]
				);
				
				$scored = $scored + 1;
				DB::table('users')
					->where('name', '=', $nama_juri)
					->where('kategori' ,'=', $kategori)
					->where('soal' , '=' , $soal)
					->update(['scored_photo' => $scored]
				);
			}
			else
			{
				if($skiped == 0)
				{
					$skiped = ($jumlah_foto - $scored -1);
				}
				else
				{
					$skiped = $skiped-1;
				}
				DB::table('users')
					->where('name', '=', $nama_juri)
					->where('kategori' ,'=', $kategori)
					->where('soal' , '=' , $soal)
					->update(['skiped' => $skiped]
				);
				$display = DB::table('fotos')
		        	->where('kategori' , '=', $kategori)
		            ->where('soal' , '=', $soal)
		            ->where($nama_juri, '=' , 0)
		            ->orderBy('id')
		            ->skip($skiped)
		            ->first();
				return view('soal')
					->with('kategori', $kategori)
					->with('soal', $soal)
		            ->with('counter', $skiped+$scored+1)
		            ->with('max', $jumlah_foto)
		            ->with('source', $display);
			}	
		}
	}

	/*public function scoring(Request $request)
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
				DB::table('status_juri')
					->where('name', '=', $nama_juri)
					->where('soal', '=', 1)
					->update(['scored_photo' => $scored]
				);
				if($scored >= $jumlah_foto)
				{
					return $this->displayScore();
				}
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
	}*/

	public function displayScore()
	{
		$jumlah_foto = DB::table('fotos')
			->where('soal' , '=' , 1)
			->count();
		$status1 = DB::table('status_juri')
			->where('name', '=', 'juri1')
			->where('soal', '=', 1)
			->first();
		$status2 = DB::table('status_juri')
			->where('name', '=', 'juri2')
			->where('soal', '=', 1)
			->first();
		if(($status1->scored_photo == $jumlah_foto) && ($status2->scored_photo == $jumlah_foto))
		{
			$hasil = DB::table('fotos')
				->select(DB::raw("nama_file, (juri1 + juri2 + juri3) as total"))
				->where('soal', '=', 1)
				->orderBy('total', 'desc')
				->get();

			return view('skor')
				->with('data', $hasil);
		}
		else
		{
			return view('tunggujuri');
		}		
	}
}
