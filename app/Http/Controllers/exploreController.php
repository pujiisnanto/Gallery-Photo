<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Postingan;
use Illuminate\Http\Request;

class exploreController extends Controller
{
    //

    // public function getdata(Request $request){
    //     $explore = Postingan::with(['kategori', 'album'])->paginate(8);
    //     return response()->json(
    //         [
    //             'data' => $explore,
    //             'statuscode' => 200
    //         ]
    //     );
    // }

    public function getData(Request $request)
    {

            if ($request->data) {
                $explore = Postingan::where('status', 'public')
                    ->where('judul', 'like', '%' . $request->data . '%')
                    ->orderBy('created_at', 'desc')
                    ->paginate(8);
            } else {
                $explore = Postingan::where('status', 'public')
                    ->orderBy('created_at', 'desc')
                    ->paginate(8);
            }

            return response()->json(
                [
                    'data' => $explore,
                    'statuscode' => 200
                ]
            );

    }

    public function exploreBeranda(){
        try {
            // Mendapatkan pengguna saat ini
            $user = auth()->user();
            // Mengambil postingan dari pengguna yang diikuti
            $followedPostingans = $user->followedPostingans;

            $explore = Postingan::where('status', 'public')->paginate(8);
            return response()->json(
                [
                    'data' => $explore,
                    'statuscode' => 200
                ]
            );
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while processing the request.',
                'statuscode' => 500
            ]);
        }
    }

    public function like(Request $request){
        try{
            $request->validate([
                'idfoto' => 'required'
            ]);

            $existinglike = Like::where('postingan_id', $request->id_foto)->where('user_id', auth()->user()->id)->first();
            $jumlah = Like::where('postingan_id', $request->id_foto)->count()->get();
            if(!$existinglike){
                $datasimpan = [
                    'postingan_id' => $request->id_foto,
                    'user_id' => auth()->user()->id,
                    'jumlah' => $jumlah
                ];
                Like::create($datasimpan);
            }else{
                Like::where('postingan_id', $request->id_foto)->where('user_id', auth()->user()->id)->delete();
            }

            return response()->json('data berhasil disimpan', 200);
        }catch (\Throwable $th) {
            return response()->json([
                'error' => 'Something wont wrong',
                'statuscode' => 500
            ]);
        }
    }

    public function plusPostingan(Request $request)
    {
        try {
            $explore = Postingan::where('user_id', auth()->user()->id)->paginate(4);
            return response()->json(
                [
                    'data' => $explore,
                    'statuscode' => 200
                ]
            );
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while processing the request.',
                'statuscode' => 500
            ]);
        }
    }
    public function profile(Request $request)
    {
        try {
            $explore = Postingan::where('user_id', auth()->user()->id)->paginate(4);
            return response()->json(
                [
                    'data' => $explore,
                    'statuscode' => 200
                ]
            );
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while processing the request.',
                'statuscode' => 500
            ]);
        }
    }
    public function profileUser(Request $request, $id)
    {
        try {
            if($id){
                $explore = Postingan::where('user_id', $id)->where('status', 'public')->paginate(4);
            }
            return response()->json(
                [
                    'data' => $explore,
                    'statuscode' => 200
                ]
            );
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while processing the request.',
                'statuscode' => 500
            ]);
        }
    }

    public function dataDetail(Request $request, $id) {
        try {
            $explore = Postingan::where('kategori_id', $id)
                ->where('status', 'public')
                ->orderBy('created_at', 'desc')
                ->paginate(2);

            return response()->json([
                'datas' => $explore,
                'statuscode' => 200
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Terjadi kesalahan saat memproses permintaan.',
                'statuscode' => 500
            ]);
        }
    }

    
}
