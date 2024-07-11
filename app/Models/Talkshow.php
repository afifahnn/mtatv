<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talkshow extends Model
{
    use HasFactory;

    public $table = 'talkshows';
    protected $fillable = ['judul', 'jenis', 'link', 'tanggal_upload', 'deskripsi'];
}
