<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Album;
use App\Models\Kategori;
use App\Models\Komentar;
use App\Models\Postingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class postinganController extends Controller
{

    public function formAdd(Request $request){
        $kategori = Kategori::all();
        $album = Album::where('user_id', auth()->user()->id)->get();
        $jmlalbum = Album::where('user_id', auth()->user()->id)->count();
        $postingan = Postingan::with('kategori', 'album');
        return view('user-admin.postingan.form-add', compact('kategori', 'album', 'postingan', 'jmlalbum'));
    }

    public function detail(Request $request, $id){
        $detail = Postingan::find($id)->with('kategori');
        return $detail;
        return view('user-admin.detail', compact('detail'));
    }

    public function add(Request $request){
        $request->validate([
            'judul' => 'required',
            'name' => 'required|mimes:png,jpg,jpeg',
            'deskripsi' => 'required',
            'status' => 'required',
            'kategori' => 'required',
        ]);

        $filefoto = $request->file('name');
        $extensiFile = $filefoto->getClientOriginalExtension();
        date_default_timezone_set('Asia/Jakarta');
        $gambar = $request->judul. '-' . date('d_m_Y_H_i_s') . '.' . $extensiFile;
        $filefoto->move(public_path('Assets/images/Postingan'), $gambar);

        if($request->album == null ){
            $album = $request->album;
        }else{
            $album = NULL;
        }


        $data = [
            'user_id' => Auth::user()->id,
            'judul' => $request->judul,
            'name' => $gambar,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'kategori_id' => $request->kategori,
            'album_id' => $album
        ];

        $validate = Postingan::create($data);

        if( $validate == true ){
            return redirect('/plus')->with('success', 'Uploading Success Full');
        } else {
            return redirect()->back()->with('error', 'Your Uploaded File Error');
        }
    }

    public function formUpdate(Request $request, $id){
        $kategori = Kategori::all();
        $album = Album::where('user_id', auth()->user()->id)->get();
        $postingan = Postingan::with(['kategori', 'album'])->find($id);
        return view('user-admin.postingan.form-update', compact('kategori', 'album', 'postingan'));
    }

    public function update(Request $request){
        $id = $request->id;
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
            'kategori' => 'required'
        ]);
        if($request->album == null){
            $album = $request->album;
        }else{
            $album = NULL;
        }
        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'kategori_id' => $request->kategori,
            'album_id' => $album
        ];

        $validate = Postingan::find($id)->where('user_id', Auth::user()->id)->update($data);

        if( $validate == true ){
            return redirect('/detail/'. $id)->with('success', 'Uploading Success Full');
        } else {
            return redirect()->back()->with('error', 'Your Uploaded File Error');
        }
    }

    public function delete($id)
    {
        $postingan = Postingan::find($id);
        $komentar = Komentar::where('postingan_id', $id);
        $like = Like::where('postingan_id', $id);
        if ($postingan) {
            $filepath = public_path('Assets/images/Postingan/' . $postingan->name);
            if (file_exists($filepath)) {
                unlink($filepath);
            }else{
                return false;
            }
            $postingan->delete();
            $like->delete();
            $komentar->delete();
            return redirect('/plus')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

}
