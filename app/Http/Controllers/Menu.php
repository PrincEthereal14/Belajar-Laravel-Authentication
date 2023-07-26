<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// biar terhubung dengan database model siswa
use App\Models\MenuMakanan;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class Menu extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //tampilin data
        // view('layouts.tampilmenu')->with('nama variabel di blade',$nama variabel di controller);
        // $tampildata = MenuMakanan::all();

        // agar urut sesuai id
        // $tampildata=MenuMakanan::all()->orderBy('id','desc');
        // $tampildata = DB::table('menu_makanans')
        //         ->orderBy('id', 'desc')
                
        //         ->get()
        //         ->paginate(5);

                $tampildata = DB::table('menu_makanans')->Paginate(5);
        return view('layouts.tampilmenu')->with('variabelblade',$tampildata);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('layouts.tambahmenu');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return "<h1>anjay berhasil</h1>";
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tampildata= MenuMakanan::where('id',$id)->first();
        return view('layouts.detail')->with('variabelblade',$tampildata);
    }

    // public function show($id){
    //     $user = MenuMakanan::where('id',$id)->first();
    //     return view('layouts.detail',[
    //         'user' => $user
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
