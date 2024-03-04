<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Follow extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function mengikuti()
    {
        return $this->belongsTo(User::class, 'mengikuti_id');
    }

    public function diikuti()
    {
        return $this->belongsTo(User::class, 'diikuti_id');
    }
}
