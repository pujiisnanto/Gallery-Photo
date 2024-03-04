<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function laporan(){
        return $this->hasMany(LaporanPostingan::class, 'postingan_id', 'id');
    }

    public function komentar(){
        return $this->hasMany(Komentar::class, 'komentar_id', 'id');
    }

    public function favorite(){
        return $this->hasMany(Favorite::class, 'postingan_id', 'id');
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class , 'kategori_id', 'id');
    }

    public function like(){
        return $this->hasMany(Like::class, 'postingan_id', 'id');
    }

    public function album(){
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }
}
