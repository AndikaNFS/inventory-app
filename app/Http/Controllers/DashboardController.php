<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Dashboard::all();
        return view ('admin.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // melakukan validasi data
    $request->validate([
        'nama' => 'required|max:45',
        'jenis' => 'required|max:45',
        'harga_jual' => 'required|numeric',
        'harga_beli' => 'required|numeric',
        'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ],
    [
        'nama.required' => 'Nama wajib diisi',
        'nama.max' => 'Nama maksimal 45 karakter',
        'jenis.required' => 'jenis wajib diisi',
        'jenis.max' => 'jenis maksimal 45 karakter',
        'foto.max' => 'Foto maksimal 2 MB',
        'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
        'foto.image' => 'File harus berbentuk image'
    ]);
    
    //jika file foto ada yang terupload
    if(!empty($request->foto)){
        //maka proses berikut yang dijalankan
        $fileName = 'foto-'.uniqid().'.'.$request->foto->extension();
        //setelah tau fotonya sudah masuk maka tempatkan ke public
        $request->foto->move(public_path('image'), $fileName);
    } else {
        $fileName = 'nophoto.jpg';
    }
    
    //tambah data produk
    DB::table('dashboards')->insert([
        'nama'=>$request->nama,
        'jenis'=>$request->jenis,
        'harga_jual'=>$request->harga_jual,
        'harga_beli'=>$request->harga_beli,
        'deskripsi' => $request->deskripsi,
        'foto'=>$fileName,
    ]);
    
    return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
