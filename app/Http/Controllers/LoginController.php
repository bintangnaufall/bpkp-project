<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("login");
    }

    protected function validator($data)
    {
        $rules = [
            'nip' => 'required',
            'password' => 'required'
        ];

        $message = [
            'nip.required' => 'NIP tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong'
        ];

        return Validator::make($data, $rules, $message);
    }
    public function authenticate(Request $request) 
    {

        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $nip = str_replace(' ', '',$request->nip);
        
        $credentials = [
            "NIP" =>  $nip,
            "password" => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->hak_akses_id == 1 || auth()->user()->hak_akses_id == 3) 
            { 
                return redirect()->intended('dashboard')->with('loginSuccess', 'Selamat Datang....');
            }
            else 
            {
                return redirect()->intended('/surat/disposisi_surat')->with('loginSuccess', 'Selamat Datang....');
            }
        } 
        return back()->with('loginError', 'Login Gagal')->withInput();
    }

    public function logout(Request $request) 
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');   
    }
}
