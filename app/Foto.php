<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $fillable = [
        'nama_file', 'kategori',  'soal', 'nomor_peserta',
    ];
}
