<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = ['jenis', 'judul', 'isi', 'link_youtube', 'nama_admin', 'tanggal_upload'];
}

