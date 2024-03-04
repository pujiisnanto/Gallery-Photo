<?php

namespace App\Models;

use App\Models\User;
use App\Models\Postingan;
use App\Models\LaporanKomentar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komentar extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function postingan(){
        return $this->belongsTo(Postingan::class, 'postingan_id', 'id');
    }

    public function laporan(){
        return $this->hasMany(LaporanKomentar::class, 'komentar_id', 'id');
    }
}
