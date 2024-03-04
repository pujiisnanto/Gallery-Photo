<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Kategori;
use App\Models\Postingan;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;

class albumController extends Controller
{
    public function formAdd(Request $request){
        return view('user-admin.album.form-add');
    }

    public function detail(Request $request, $id){

        $album = Album::find($id);
        $postingan = Postingan::where('album_id', $album->id)->get();
        $kategori = Kategori::all();
        $albums = ALbum::where('user_id', auth()->user()->id)
                    ->whereNotIn('id', [$id])
                    ->get();
        return view('user-admin.album.detail-album', compact('album', 'postingan', 'albums', 'kategori'));
    }

    public function add(Request $request){
        $request->validate([
            'name' => 'required',
            'thumbnail' => 'required|mimes:png,jpg,jpeg',
            'deskripsi' => 'required',
        ]);

        $filefoto = $request->file('thumbnail');
        $extensiFile = $filefoto->getClientOriginalExtension();
        date_default_timezone_set('Asia/Jakarta');
        $gambar = $request->name. '-' . date('d_m_Y_H_i_s') . '.' . $extensiFile;
        $filefoto->move('Assets/images/Postingan', $gambar);

        $data = [
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'thumbnail' => $gambar,
            'deskripsi' => $request->deskripsi,
        ];
        $validate = Album::create($data);

        if( $validate == true ){
            return redirect('/plus')->with('success', 'Uploading Success Full');
        } else {
            return redirect()->back()->with('error', 'Your Uploaded File Error');
        }
    }

    public function formUpdate(Request $request, $id){
        $album = Album::withCount('postingan')->where('user_id', Auth::user()->id);
        $dataAlbum = Album::where('id', $id)->first();
        $postingan = Postingan::with(['kategori, album'])->where('album_id', $id);
        $kategori = Kategori::where('user_id', Auth::user()->id);
        return view('user-admin.album.form-update', compact('kategori', 'album', 'postingan', 'dataAlbum'));
    }

    public function update(Request $request){
        $id = $request->id;
        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'thumbnail' => 'required|mimes:png,jpg,jpeg'
        ]);

        if(isNull($request->thumbnail)){
            $thumbnail = $request->thumbnailLama;
        } else {
            $filefoto = $request->file('thumbnail');
            $extensiFile = $filefoto->getClientOriginalExtension();
            date_default_timezone_set('Asia/Jakarta');
            $thumbnail = $request->name. '-' . date('d_m_Y_H_i_s') . '.' . $extensiFile;
            $filefoto->move('Assets/images/Postingan', $thumbnail);
            unlink('Assets/images/Postingan', $request->thumbnailLama);
        }

        $data = [
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
            'thumbnail' => $thumbnail
        ];

        $validate = Album::find($id)->where('user_id', Auth::user()->id)->update($data);

        if( $validate == true ){
            return redirect('/plus')->with('success', 'Uploading Success Full');
        } else {
            return redirect()->back()->with('error', 'Your Uploaded File Error');
        }
    }

    public function delete($id)
    {
        $album = Album::where('id', $id)->first();
        // return $album;
        if ($album) {
            $filepath = public_path('Assets/images/Postingan/' . $album->thumbnail);
            if (file_exists($filepath)) {
                unlink($filepath);
            }else{
                return redirect()->back()->with('error', 'THUMBNAIL BELUM DIHAPUS');
            }
            $album->delete();
            Postingan::where('album_id', $id)->update(['album_id' => null]);
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }
}
