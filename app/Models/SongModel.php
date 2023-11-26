<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SongModel extends Model
{
    protected $fillable = ['NameSong', 'Artist', 'Type', 'UserCreate', 'Img', 'LinkMp3'];

    public function user()
    {
        return $this->belongTo(User::class);
    }
}
