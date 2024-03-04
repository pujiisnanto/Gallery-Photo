<?php

namespace App\Models;

use App\Models\User;
use App\Models\Postingan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favorite extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function postingan(){
        return $this->belongsTo(Postingan::class, 'postingan_id', 'id');
    }
}
