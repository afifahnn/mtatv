<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jihad extends Model
{
    use HasFactory;

    public $table = 'jihads';
    protected $fillable = ['judul', 'link', 'thumbnail', 'tanggal_upload'];
}
