<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Like;
use App\Models\User;
use App\Models\Follow;
use App\Models\Komentar;
use App\Models\Postingan;
use Illuminate\Http\Request;

class fiturController extends Controller
{
    public function like(Request $request, $id)
    {
        $user = auth()->user();
        $post = Postingan::findOrFail($id);

        $exists = Like::where('user_id', $user->id)->where('postingan_id', $post->id)->exists();

        // $like = new Like(['user_id' => $user->id]);
        // $post->like()->save($like);
        $data = [
            'user_id' => auth()->user()->id,
            'postingan_id' => $id
        ];
        Like::create($data);

        return response()->json(['status' => 'liked']);
    }

    public function dislike(Request $request, $id)
    {
        $user = auth()->user();
        $post = Postingan::findOrFail($id);

        // $like = Like::where('user_id', $user->id)
        //             ->where('post_id', $post->id)
        //             ->first();
        Like::where('user_id', $user->id)->where('postingan_id', $post->id)->delete();

        return response()->json(['status' => 'disliked']);

    }

    public function follow(Request $request, $id)
    {
        $user = auth()->user();
        $targetUser = User::findOrFail($id);

        $data = [
            'user_id' => auth()->user()->id,
            'mengikuti_id' => $id
        ];
        Follow::create($data);

        return response()->json(['status' => 'followed']);
    }

    public function unfollow(Request $request, $id)
    {
        $user = auth()->user();
        $targetUser = User::findOrFail($id);

        $follow = Follow::where('user_id', $user->id)->where('mengikuti_id', $targetUser->id)->delete();

        if ($follow) {
            return response()->json(['status' => 'unfollowed']);
        }
        // Return a response indicating the user was not following the target user
        return response()->json(['status' => 'not_following']);
    }

    public function uploadKomentar(Request $request){

            $data = [
                'isi_komentar' => $request->komentar,
                'user_id' => auth()->user()->id,
                'postingan_id' => $request->postinganId,
            ];

            Komentar::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
            ]);

    }



   // Controller
    public function komentar(Request $request, $id) {
        try {
            $explore = Komentar::where('postingan_id', $id)
                ->with('user')
                ->orderBy('created_at', 'desc')
                ->paginate(8);

            return response()->json([
                'data' => $explore,
                'statuscode' => 200
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Terjadi kesalahan saat memproses permintaan.',
                'statuscode' => 500
            ]);
        }
    }

    public function search(Request $request){
        $query = $request->input('query');        
        $results = User::where('username', 'like', '%' . $query . '%')->get();
        return response()->json([
            'data' => $results,
            'statuscode' => 200
        ]);
    }

    public function cariData(Request $request){
        $explore = Postingan::where('status', 'public')
                    ->where('judul', 'like', '%' . $request->data . '%')
                    ->orderBy('created_at', 'desc')
                    ->paginate(8);
        return response()->json(
            [
                'datas' => $explore,
                'statuscode' => 200
            ]
        );
    }

    public function getDataByCategory($id)
    {
        $data = Postingan::where('kategori_id', $id)->where('status', 'public')->get();
        
        return response()->json([
            'data' => $data,
            'statuscode' => 200
        ]);
    }
}
