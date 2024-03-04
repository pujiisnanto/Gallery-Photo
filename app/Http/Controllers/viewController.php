<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use App\Models\Album;
use App\Models\Follow;
use App\Models\Kategori;
use App\Models\Komentar;
use App\Models\Postingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class viewController extends Controller
{
    public function plus(Request $request){
        $album = Album::withCount('postingan')->where('user_id', auth()->user()->id)->get();
        $postingan = Postingan::where('user_id', Auth()->user()->id);
        $jmlalbum = Album::where('user_id', auth()->user()->id)->count();
        $jmlpostingan = $postingan->count();
        return view('user-admin.plus', compact('album', 'postingan', 'jmlalbum', 'jmlpostingan'));
    }

    public function beranda(Request $request){
        // jika tidak berhasil maka menggunakan $pengikut yang telah ada
        $pengikut = Follow::where('user_id', auth()->user()->id)->with('user')->get();
        $jumlahpengikut = $pengikut->count();

        // // Mendapatkan pengguna saat ini
        $dataPostingan = collect(); // Inisialisasi koleksi untuk menyimpan data postingan

        foreach ($pengikut as $follow) {
            $user = $follow->mengikuti; // Ambil informasi pengguna yang diikuti
            $postinganUser = Postingan::where('user_id', $user->id)->get(); // Ambil data postingan dari pengguna yang diikuti
            $dataPostingan = $dataPostingan->merge($postinganUser); // Gabungkan data postingan ke dalam koleksi
        }
        // return $pengikut;
        return view('user-admin.index', compact('pengikut', 'jumlahpengikut', 'dataPostingan'));
    }

    public function profile(){
        $user = User::find(Auth::user()->id);
        $followers = Follow::where('mengikuti_id', auth()->user()->id)->count();
        $follow = Follow::where('user_id', auth()->user()->id)->count();
        $jumlahpostingan = Postingan::where('user_id', auth()->user()->id)->count();
        $postingan = Postingan::where('user_id', auth()->user())->with('album');
        $like = Like::with('postingan')->where('user_id', auth()->user()->id)->get();
        return view('user-admin.profile.profile', compact('user', 'postingan', 'follow', 'followers', 'jumlahpostingan', 'like'));
    }

    public function explore(){
        $kategori = Kategori::all();
        return view('user-admin.jelajahi', compact('kategori'));
    }

    public function pengikut(){
        $follow = Follow::with('user')->where('mengikuti_id', auth()->user()->id)->get();
        return view('user-admin.Pengikut', compact('follow'));
    }

    public function userProfile($id){
        $user = User::with('postingan')->where('id', $id)->first();
        $postingan = Postingan::where('user_id', $id)->where('status', 'public')->get();
        $following = Follow::where('user_id', $id)->count();
        $follower = Follow::where('mengikuti_id', $id)->count();
        $follow = Follow::where('user_id', auth()->user()->id)->pluck('mengikuti_id')->toArray();
        $isFollowing = in_array($user->id, $follow);
        return view('user-admin.profile.user-profile', compact('user', 'postingan', 'follow', 'follower', 'isFollowing', 'following'));
    }

    public function detail(Request $request, $id){
        $detail = Postingan::with('like', 'kategori')->find($id);
        $userId = Auth::check() ? Auth::user()->id : null;

        $like = Like::where('postingan_id', $id)->get();
        $likeUserIds = $detail->like->pluck('user_id')->toArray();
        $isLiked = in_array($userId, $likeUserIds);

        $follow = Follow::where('user_id', $userId)->pluck('mengikuti_id')->toArray();
        $isFollowing = in_array($detail->user_id, $follow);

        $komentars = Komentar::with('user')->where('postingan_id', $id)->orderBY('created_at', 'desc')->get();
        $postingan = Postingan::where('kategori_id', $detail->kategori_id)
                ->where('id','<>', $id)
                ->orderBY('created_at', 'desc')
                ->get();
        return view('user-admin.detail', compact('detail', 'like', 'komentars', 'isLiked', 'isFollowing', 'follow', 'postingan'));
    }

    public function logout(){
        Auth::logout();
        return redirect('/login')->with('succes', 'Logout Berhasil');
    }

}
