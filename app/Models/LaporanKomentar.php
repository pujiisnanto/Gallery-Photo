<?php

namespace App\Models;

use App\Models\User;
use App\Models\Komentar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LaporanKomentar extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function komentar(){
        return $this->belongsTo(Komentar::class, 'komentar_id', 'id');
    }

}
