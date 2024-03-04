<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    //
    public function changePassword(Request $request){
        $request->validate([
            'password' => 'required|min:6',
            'confirmPassword' => 'required|min:6',
            'passwordLama' => 'required|min:6'
        ]);

        $user = User::find(Auth::user()->id);

        if ($user && Hash::check($request->passwordLama, $user->password) && $request->password == $request->confirmPassword) {
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect('/profile')->with('success', 'Password Update Success');
        } else {
            return redirect()->back()->with('error', 'your password lama incorec');
        }
    }

    public function changeAvatar(Request $request){
        $request->validate([
            'avatar' => 'required|mimes:png,jpg',
        ]);
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $user = auth()->user();
            $filefoto = $request->file('avatar');
            $extensiFile = $filefoto->getClientOriginalExtension();
            date_default_timezone_set('Asia/Jakarta');
            $gambar = $user->username . date('d_m_Y_H_i_s') . '.' .$extensiFile;
            $filefoto->move('Assets/images/user-profile', $gambar);
            $avatar = ['1.jpg', '2.jpg', '3.jpg', '4.jpg'];
            if (!in_array($user->avatar, $avatar)) {
                $filePath = public_path('Assets/images/user-profile/' . $user->avatar);
                if (file_exists($filePath)) {
                    unlink($filePath);
                } else {
                    return false;
                }
            }
            $validasi = User::find(Auth::user()->id)->update(['avatar' => $gambar]);
            if($validasi == true){
                return redirect('/profile')->with('success', 'Avatar Update Success');
            } else {
                return redirect()->back()->with('error', 'Avatar Update Error');
            }
        } else {
            return redirect()->back()->with('error', 'Failed to upload file');
        }
    }

    public function update(Request $request){
        $request->validate([
            'username' => 'required',
            'name1' => 'required',
            'addres' => 'required',
            'bio' => 'required',
            'no_telepon' => 'required|min:10|max:13',
        ]);

        $data = [
            'username' => $request->username,
            'name' => $request->name1 .'-'. $request->name2,
            'address' => $request->addres,
            'bio' => $request->bio,
            'no_telepon' => $request->no_telepon,
            'jenis_kelamin' => $request->jenis_kelamin
        ];

        $validasi = User::find(Auth::user()->id)->update($data);

        if ($validasi == true){
            return redirect('/profile')->with('success', 'Your Profile Update Success');
        }else {
            return redirect()->back()->with('error', 'Error your update Profile');
        }
    }
}
