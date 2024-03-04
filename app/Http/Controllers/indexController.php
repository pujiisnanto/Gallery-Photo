<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Follow;
use App\Models\Kategori;
use App\Models\Komentar;
use App\Models\Postingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class indexController extends Controller
{
    public function index(){
        return view('user.index');
    }

    public function jelajahi(){
        $kategori = Kategori::all();
        return view('user.jelajahi', compact('kategori'));
    }

    public function login(){
        return view('user.login');
    }

    public function daftar(){
        return view('user.daftar');
    }

    public function detail($id){
        $detail = Postingan::with('like')->find($id);
        $userId = Auth::check() ? Auth::user()->id : null;
        $like = Like::where('postingan_id', $id)->get();
        $likeUserIds = $detail->like->pluck('user_id')->toArray();
        $isLiked = in_array($userId, $likeUserIds);
        // Menggunakan pluck() untuk mendapatkan array yang berisi user_id dari hasil query like

        $follow = Follow::where('user_id', $userId)->pluck('mengikuti_id')->toArray();
        $isFollowing = in_array($detail->user_id, $follow);

        // kemnetar
        $komentar = Komentar::where('postingan_id', $id)->get();
        return view('user.detail', compact('detail', 'like', 'komentar', 'isLiked', 'isFollowing'));
    }

}
