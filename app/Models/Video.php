<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    public $table = 'videos';
    protected $fillable = ['judul', 'jenis', 'link', 'tanggal_upload'];
}
