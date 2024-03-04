<?php

namespace App\Models;

use App\Models\Postingan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function postingan(){
        return $this->hasMany(Postingan::class, 'kategori_id', 'id');
    }
}
