<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Foto;
use Redirect;

class ScoringController extends Controller
{
	public function display(Request $request)
	{
		$nama_juri = Auth::user()->name;
		$kategori = Auth::user()->kategori;
		$soal = Auth::user()->soal;
		$skiped = Auth::user()->skiped;
		$scored = Auth::user()->scored_photo;
		$status = Auth::user()->status;

		$jumlah_foto = DB::table('fotos')
			->where('kategori' , '=', $kategori)
            ->where('soal' , '=' , $soal)
            ->count();

        if($status == "UNFINISHED")
        {
	        if($skiped >= ($jumlah_foto-$scored))
			{
				$skiped = 0;
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
				->with('score', $display->$nama_juri)
	            ->with('counter', $scored)
	            ->with('max', $jumlah_foto)
	            ->with('status', $status)
	            ->with('source', $display);
        }
        elseif($status == "FINISHED")
        {
        	if($skiped >= ($jumlah_foto-$scored))
			{
				$skiped = 0;
			}
        	$display = DB::table('fotos')
	        	->where('kategori' , '=', $kategori)
	            ->where('soal' , '=', $soal)
	            ->orderBy('id')
	            ->skip($skiped)
	            ->first();
	        return view('soal')
				->with('kategori', $kategori)
				->with('soal', $soal)
				->with('score', $display->$nama_juri)
	            ->with('counter', $skiped+1)
	            ->with('max', $jumlah_foto)
	            ->with('status', $status)
	            ->with('source', $display);
        }
		
	}

	public function scoring(Request $request)
	{
		$nama_juri = Auth::user()->name;
		$kategori = Auth::user()->kategori;
		$soal = Auth::user()->soal;
		$skiped = Auth::user()->skiped;
		$scored = Auth::user()->scored_photo;
		$status = Auth::user()->status;
		$jumlah_foto = DB::table('fotos')
			->where('kategori' ,'=', $kategori)
			->where('soal' , '=' , $soal)
			->count();

		if($status == "UNFINISHED")
		{
			//next
			if($request->clickedbutton == "next")
			{
				//if ada nilai
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
					if($scored == $jumlah_foto)
					{
						$status = "FINISHED";
						DB::table('users')
							->where('name', '=', $nama_juri)
							->where('kategori' ,'=', $kategori)
							->where('soal' , '=' , $soal)
							->update([
								'status' => $status,
								'skiped' => 0
						]);
						return $this->displayScore();
					}	
				}

				//if skip dulu
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

				//display
				if($skiped >= ($jumlah_foto-$scored))
				{
					$skiped = 0;
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
					->with('score', $display->$nama_juri)
		            ->with('counter', $scored)
		            ->with('max', $jumlah_foto)
		            ->with('status', $status)
		            ->with('source', $display);
				
			}

			//previous
			if($request->clickedbutton == "previous")
			{

				//if ada nilainya
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
					if($scored == $jumlah_foto)
					{
						$status = "FINISHED";
						DB::table('users')
							->where('name', '=', $nama_juri)
							->where('kategori' ,'=', $kategori)
							->where('soal' , '=' , $soal)
							->update([
								'status' => $status,
								'skiped' => 0
						]);
						return $this->displayScore();
					}		
				}
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
				//display
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
					->with('score', $display->$nama_juri)
		            ->with('counter', $scored)
		            ->with('max', $jumlah_foto)
		            ->with('status', $status)
		            ->with('source', $display);	
			}
		}

		if($status == "FINISHED")
		{
			if($request->nilai != NULL)
			{
				DB::table('fotos')
					->where('nama_file' , '=' , $request->nama_file)
					->where('kategori' ,'=', $kategori)
					->where('soal' , '=' , $soal)
					->update([$nama_juri => $request->nilai]
				);
			}

			if($request->clickedbutton == "next")
			{
				$skiped = $skiped+1;
				if($skiped >= $jumlah_foto)
				{
					$skiped = 0;
				}
			}
			elseif($request->clickedbutton == "previous")
			{
				if($skiped == 0)
				{
					$skiped = $jumlah_foto-1;
				}
				else
				{
					$skiped = $skiped-1;
				}
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
	            ->orderBy('id')
	            ->skip($skiped)
	            ->first();
				
			return view('soal')
				->with('kategori', $kategori)
				->with('soal', $soal)
				->with('score', $display->$nama_juri)
	            ->with('counter', $skiped+1)
	            ->with('max', $jumlah_foto)
	            ->with('status', $status)
	            ->with('source', $display);
		}
		
	}

	public function displayScore()
	{

		$kategori = Auth::user()->kategori;
		$soal = Auth::user()->soal;
		$finished_juri = DB::table('users')
			->where('kategori', '=', $kategori)
			->where('soal', '=' , $soal)
			->where('status' , '=', 'FINISHED')
			->count();
		if($finished_juri >= 2)
		{
			$hasil = DB::table('fotos')
				->select(DB::raw("nama_file, (juri1 + juri2 +juri3 + juri4 + juri5 + juri6 + juri7 + juri8) as total"))
				->where('kategori', '=' , $kategori)
				->where('soal', '=', $soal)
				->orderBy('total', 'desc')
				->get();

			return view('skor')
				->with('data', $hasil)
				->with('kategori', $kategori)
				->with('soal', $soal);
		}
		else
		{
			return view('tunggujuri');
		}		
	}
}
