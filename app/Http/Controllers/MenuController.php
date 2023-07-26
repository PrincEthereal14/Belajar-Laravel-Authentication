<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MenuMakanan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tampildata = DB::table('menu_makanans')->Paginate(5);
        return view('layouts.tampilmenu')->with('variabelblade', $tampildata);
    }

    // public function indexuser()
    // {
    //     //
    //     $tampildata = DB::table('menu_makanans');
    //     return view('layouts.daftarmenu')->with('variabelblade', $tampildata);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dengan pesan kustom
        return view('layouts.tambahmenu');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // pake session flash agar jika ada yang kurang,data yang tadi udah dimasukin tetep tertampil
        Session::flash('nama', $request->nama);
        Session::flash('deskripsi', $request->deskripsi);
        Session::flash('kategori', $request->kategori);
        Session::flash('harga', $request->harga);
        //
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'harga' => 'required | numeric',
            // mimes = ekstensi foto
            'foto' => 'required | mimes:jpg,bmp,png'
        ], [
            // bikin pesan custom
            'nama.required' => "Nama Makanan Wajib Diisi",
            'deskripsi.required' => "Deskripsi Makanan Wajib Diisi !!",
            'kategori.required' => "Kategori Makanan Wajib Diisi !!",
            'harga.required' => "Harga Makanan Wajib Diisi !!",
            'harga.numeric' => "Harga Makanan Wajib Diisi dengan angka !!",
            'foto.required' => "Silahkan Masukkan Gambar !!",
            'foto.mimes' => "Dalam Ekstensi (PNG,JPG,HEIC)",
        ]);

        //    $tampildata =[
        //     'nama' => $request->input('nama'),
        //     'deskripsi' => $request->input('deskripsi'),
        //     'kategori' => $request->input('kategori'),
        //     'harga' => $request->input('harga'),
        //    ];

        //    nangkap foto 
        //  buat variabel $tangkap_foto untuk mengambil inputan berbentuk file dari name=foto
        $tangkap_foto = $request->file('foto');
        //  agar bisa kedeteksi foto tadi berekstensi apa (jpg,png,dsb)
        $foto_ekstensi = $tangkap_foto->extension();
        //  nama foto akan bernama waktu upload
        $rename_foto = date('ymdhis') . "." . $foto_ekstensi;
        // foto tadi di pindahkan ke folder xxxx
        $tangkap_foto->move(public_path('foto'), $rename_foto);

        MenuMakanan::create([
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'kategori' => $request->input('kategori'),
            'harga' => $request->input('harga'),
            'foto' => $rename_foto
        ]);

        return redirect('/menu')->with('success', 'Berhasil Menambahkan Menu Makanan');
        //  return "anjay";
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $tampildata = MenuMakanan::where('id', $id)->first();
        return view('layouts.show')->with('variabelblade', $tampildata);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $tampildata = MenuMakanan::where('id', $id)->first();
        return view('layouts.edit')->with('variabelblade', $tampildata);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // return "ababaa";
        // pake session flash agar jika ada yang kurang,data yang tadi udah dimasukin tetep tertampil
        // Session::flash('nama',$request->nama);
        // Session::flash('deskripsi',$request->deskripsi);
        // Session::flash('kategori',$request->kategori);
        // Session::flash('harga',$request->harga);
        //
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'harga' => 'required | numeric'
        ], [
            // bikin pesan custom
            'nama.required' => "Nama Makanan Wajib Diisi",
            'deskripsi.required' => "Deskripsi Makanan Wajib Diisi !!",
            'kategori.required' => "Kategori Makanan Wajib Diisi !!",
            'harga.required' => "Harga Makanan Wajib Diisi !!",
            'harga.numeric' => "Harga Makanan Wajib Diisi dengan angka !!",
        ]);



        $tampildata = [
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'kategori' => $request->input('kategori'),
            'harga' => $request->input('harga'),
        ];

        // proses mengupdate data foto
        if ($request->hasFile('foto')) {
            $request->validate([
                // mimes = ekstensi foto
                'foto' => 'mimes:jpg,bmp,png,jpeg,jpe'

            ], [
                'foto.mimes' => "Dalam Ekstensi (PNG,JPG,HEIC)",
            ]);

            //    nangkap foto 
            //  buat variabel $tangkap_foto untuk mengambil inputan berbentuk file dari name=foto
            $tangkap_foto = $request->file('foto');
            //  agar bisa kedeteksi foto tadi berekstensi apa (jpg,png,dsb)
            $foto_ekstensi = $tangkap_foto->extension();
            //  nama foto akan bernama waktu upload
            $rename_foto = date('ymdhis') . "." . $foto_ekstensi;
            // foto tadi di pindahkan ke folder xxxx
            $tangkap_foto->move(public_path('foto'), $rename_foto);
            //   sudah terupload ke direktori


            // proses menghapus foto lama
            $foto_lama = MenuMakanan::where('id', $id)->first();
            File::delete(public_path('foto') . '/' . $foto_lama->foto);
            $tampildata['foto'] = $rename_foto;
        }

       




        MenuMakanan::where('id', $id)->update($tampildata);
        return redirect('/menu')->with('success', 'Berhasil MengUpdate Menu Makanan');
        //  return "anjay";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // agar jika didelete,foto yang ada di folder public juga ikut ke hapus
        //  variabel $tampungfoto mencari data berdasarkan id
        $tampungfoto = MenuMakanan::where('id', $id)->first();
        // ,lalu ketika udah ketemu maka akan didelete (mendelet nama file didalam direktori foto di publik)
        File::delete(public_path('foto') . '/' . $tampungfoto->foto);
        MenuMakanan::where('id', $id)->delete();
        return redirect('/menu')->with('success', 'Berhasil MengHapus Menu Makanan');
    }
}
