<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Album;
use App\Models\Follow;
use App\Models\Favorite;
use App\Models\Komentar;
use App\Models\Postingan;
use App\Models\Trigerlogin;
use App\Models\LaporanKomentar;
use App\Models\LaporanPostingan;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function postingan(){
        return $this->hasMany(Postingan::class, 'user_id', 'id');
    }

    public function album(){
        return $this->hasMany(Album::class, 'user_id', 'id');
    }

    public function favorite(){
        return $this->hasMany(Favorite::class, 'user_id', 'id');
    }

    public function follow(){
        return $this->hasMany(Follow::class, 'user_id', 'id');
    }

    public function komentar(){
        return $this->hasMany(Komentar::class, 'user_id', 'id');
    }

    public function laporankomentar(){
        return $this->hasMany(LaporanKomentar::class, 'user_id', 'id');
    }

    public function laporanpostingan(){
        return $this->hasMany(LaporanPostingan::class, 'user_id', 'id');
    }

    public function like(){
        return $this->hasMany(Like::class, 'user_id', 'id');
    }

    public function trigerlogin(){
        return $this->hasMany(Trigerlogin::class, 'user_id', 'id');
    }

    public function followedPostingans()
    {
        return $this->hasManyThrough(
            Postingan::class,
            Follow::class,
            'mengikuti_id', // Kolom pada tabel follows yang menunjukkan pengguna yang mengikuti
            'user_id', // Kolom pada tabel postingans yang menunjukkan pemilik postingan
            'id', // Kolom pada tabel users yang merupakan kunci utama
            'diikuti_id' // Kolom pada tabel follows yang menunjukkan pengguna yang diikuti
        );
    }
}
