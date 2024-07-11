<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalAcara extends Model
{
    use HasFactory;

    protected $table = 'jadwal_acaras';
    protected $fillable = ['hari', 'program_acara', 'jam_mulai', 'jam_selesai'];
}
