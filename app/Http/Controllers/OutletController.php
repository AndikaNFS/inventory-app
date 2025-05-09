<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $outlets = Outlet::all();
        $outlets = Outlet::with('device')->get();


        return view('dashboard', compact('outlets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.outlets.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:225',
            'location' => 'required|string|max:225',

         ]);

         

        //  simpan data
        Outlet::create([
            'name' => $request->name,
            'location' => $request->location,
        ]);

        // Redirect ke daftar device berdasarkan outlet_id
        return redirect()->route('dashboard')->with('success', 'Outlet berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

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
