<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Login;

class BackController extends Controller
{
    public function index()
    {
        $users = session('data_login');
        return view('admin.index', [
            'users' => $users
        ]);
    }

    public function profile()
    {
        $findSession = session('data_login');
        $users = Login::find($findSession->id);
        return view('admin.profile', [
            'users' => $users
        ]);
    }

    public function login()
    {
        $users = session('data_login');
        if ($users !== null) {
            return redirect('dashboard')->with('gagal_beralih', 'Anda telah login, tidak dapat beralih ke halaman login!');
        }
        return view('login');
    }

    public function register()
    {
        $users = session('data_login');
        if ($users !== null) {
            return redirect('dashboard')->with('gagal_beralih', 'Anda telah login, tidak dapat beralih ke halaman login!');
        }
        return view('register');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['data_login']);
        $request->session()->flush();
        return redirect()->route('login')->with('berhasil_logout', 'Anda telah logout!');
    }

    public function post_login(Request $request)
    {
        $cariUser = Login::where('login_username', $request->login_username)->get();
        if ($cariUser->isEmpty()) {
            return back()->with('status_fail', 'Maaf username atau password salah!')->withInput();
        }
        $data_login = Login::where('login_username', $request->login_username)->firstOrFail();
        switch ($data_login->login_level) {
            case 'admin':
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('dashboard');
                    }
                }
                break;
            case 'petugas':
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('dashboard');
                    }
                }
                break;
            case 'user':
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('dashboard');
                    }
                }
                break;
        }
        return back()->with('status_fail', 'Maaf username atau password salah!')->withInput();
    }

    public function post_register(Request $request)
    {
        $login_data = new Login;
        $validatedLogin = $request->validate([
            'login_nama' => 'required',
            'login_username' => 'required',
            'login_password' => 'required',
            'login_email' => 'required'
        ]);
        $hashPassword = Hash::make($validatedLogin["login_password"], [
            'rounds' => 12,
        ]);
        $token = Str::random(16);
        $level = "user";
        $login_status = "verified";
        $login_data = Login::create([
            'login_nama' => $validatedLogin["login_nama"],
            'login_username' => $validatedLogin["login_username"],
            'login_password' => $hashPassword,
            'login_email' => $validatedLogin["login_email"],
            'login_token' => $token,
            'login_level' => $level,
            'login_status' => $login_status,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $login_data->save();
        return redirect()->route('login')->with('berhasil_register', 'Berhasil melakukan registrasi!');
    }
}
