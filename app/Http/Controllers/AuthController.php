<?php

namespace App\Http\Controllers;

use App\Models\Trigerlogin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function Authlogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $request->session()->regenerate();
            if( Auth::user()->role == 'user'){
                Trigerlogin::create([
                    'user_id' => auth()->user()->id
                ]);
                return redirect('/beranda')->with('success', 'Selamat Datang ' . Auth::user()->nama);
            } else if( Auth::user()->role == 'admin'){
                return redirect('/administrator')->with('success', 'Selamat Datang ' . Auth::user()->nama);
            }else{
                return redirect('/logout')->with('error', 'Maaf anda tidak dapat mengakses halaman ini');
            }
        } else {
            return redirect()->back()->with('error', 'login invalid');
        }
    }

    public function Authdaftar(Request $request){

        $request->validate([
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'birthday' => 'required'
        ]);

        $randomNumbers = [];

        // Menggunakan fungsi rand()
        for ($i = 0; $i < 1; $i++) {
            $randomNumbers[] = rand(); 
        }

        $usernameResponse = response()->json(['random_numbers' => $randomNumbers]);

        // Mengambil data JSON dari respons
        $usernameData = json_decode($usernameResponse->getContent(), true);

        $gambar = ['1.jpg', '2.jpg', '3.jpg', '4.jpg'];
        $gambarAcak = collect($gambar)->random();

        $data = [
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'birthday' => $request->input('birthday'),
            'username' => 'Guest' . implode('', $usernameData['random_numbers']),
            'avatar' => $gambarAcak,
        ];
        $validasi = User::create($data);
        if($validasi == true){
            return redirect('/login')->with('success', 'Success Regis');
        }else{
            return redirect()->back()->with('error', 'this accoun cannot regis');
        }
    }
}
