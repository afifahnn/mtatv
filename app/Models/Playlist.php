<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    public $table = 'playlist';

    protected $fillable = [
        'channel_id',
        'playlist_id',
        'title',
        'description',
        'thumbnails',
        'publishedAt'
    ];
}
