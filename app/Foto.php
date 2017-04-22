<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $fillable = [
        'nama_file', 'soal', 'nomor_peserta',
    ];
}
