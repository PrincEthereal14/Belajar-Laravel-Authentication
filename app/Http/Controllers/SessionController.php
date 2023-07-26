<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    // Menampilkan form login 
      function index()
    {
        return view('layouts.login');
    }

    // proses login
    function login(Request $request)
    {
        // kasih sesiion
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            // bikin pesan custom
            'email.required' => "Masukan Email Anda !!",
            'password.required' => "Password Anda Salah !!",
        ]);

        // proses authentikasi

        // variabel penyimpan data
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // 
        if(Auth::attempt($infologin)){
            // yang dijalankan jika ketika benar (othentikasi sukses)
            return redirect('menu')->with('success','Berhasil Login !!');

        }else{
            // kalau gagal
            return redirect('sesi')->withErrors('Username/Password Anda Salah !!');
            // return "gagal";
        }
    }

    // proses logut

     function logout()
    {
        # code...
        Auth::logout();
        return redirect('sesi')->with('success','Berhasil Logout');
    }

    // menampilkan form register
     function register()
    {
        # code...
        return view('layouts.register');
    }

     function create(Request $request)
    {
        # code...
        // return "data masuk";
        // kasih sesiion
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);
        $request->validate([
            'name' => 'required',
            // unique = harus berbeda dari yang sudah ada di tabel users
            'email' => 'required | email | unique:users',
            'password' => 'required | min:6',
        ], [
            // bikin pesan custom
            'name.required' => "Masukan Nama Anda !!",
            'email.required' => "Masukan Email Anda !!",
            'email.email' => "Email Anda Tidak valid !!",
            'email.unique' => "Email Anda Sudah Digunakan !!",
            'password.required' => "Password Anda Salah !!",
            'password.min' => "Password Minimal 6 Karakter !!",
        ]);

        // proses menyimpan data
        $simpandata = [
            'name'=>  $request->input('name'),
            'email'=>  $request->input('email'),
            'password'=>  Hash::make ($request->password),
        ];

        User::create($simpandata);
        // proses authentikasi

        // variabel penyimpan data
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // 
        if(Auth::attempt($infologin)){
            // yang dijalankan jika ketika benar (othentikasi sukses)
            return redirect('sesi')->with('success', Auth::user()->name. ' Berhasil Register, Silahkan Login !!');

        }else{
            // kalau gagal
            return redirect('sesi')->withErrors('Username/Password Anda Salah !!');
            // return "gagal";
        }
    }
}
