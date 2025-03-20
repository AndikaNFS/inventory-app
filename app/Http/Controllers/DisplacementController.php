<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Displacement;
use App\Models\Outlet;
use Illuminate\Http\Request;

class DisplacementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $outlets = Outlet::all();
        $displacements = Displacement::with(['device', 'outletAwal', 'outletTujuan'])->get();
        return view('admin.displacement.report', compact('displacements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $outlets = Outlet::all();
        $selectedOutlet = $request->query('outlet_awal_id');
        $devices = [];

        if ($selectedOutlet) {
            $devices = Device::where('outlet_id', $selectedOutlet)->get();
        }

        // $devices = Device::all();
        return view('admin.displacement.index', compact('outlets', 'devices', 'selectedOutlet'));
    }

    public function getDevicesByOutlet($outlet_id)
    {
        $devices = Device::where('outlet_id', $outlet_id)->get();
        return response()->json($devices);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'device_id' => 'required|exists:devices,id', // memastikan semua ID 
            'outlet_awal_id' => 'required|exists:outlets,id',
            // 'outlet_tujuan_id' => 'required|exists:outlets,id|different:outlet_awal_id',
            'outlet_tujuan_id' => 'required|exists:outlets,id',
            'jumlah_pindah' => 'required|integer|min:1',
            'tanggal_pindah' => 'required|date',
            'name_pic' => 'required|string|max:225',
            'name_it' => 'required|string|max:225',
            'description' => 'required|string|max:225',
        ]);

        // Ambil data device berdasarkan device_id
        $device = Device::findOrFail($request->device_id);

        // Pastikan jumlah device di outlet awal cukup
        if ($device->qlt < $request->jumlah_pindah) {
            return back()->with('error','Jumlah device di outlet awal tidak mencukupi.');
        }

        // Kurangi jumlah device di outlet awal
        $device->qlt -= $request->jumlah_pindah;
        $device->save();

        // Cek apakah device sudah ada di outlet tujuan
        $deviceTujuan = Device::where('device', $device->device)
                                ->where('outlet_id', $request->outlet_tujuan_id)
                                ->first();
        
        if ($deviceTujuan) {
            // Jika sudah ada di outlet tujuan, tambahkan jumlahnya
            $deviceTujuan->qlt += $request->jumlah_pindah;
            $deviceTujuan->save();
        } else {
            // Jika belum ada, buat data device baru untuk outlet tujuan
            Device::create([
                'device' => $device->device,
                'merek' => $device->merek,
                'type' => $device->type,
                'status' => $device->status,
                'serial_num' => $device->serial_num,
                'qlt' => $request->jumlah_pindah,
                'outlet_id' => $request->outlet_tujuan_id,
                'image' => $device->image // Salin gambar dari device outlet awal
            ]);
        }

        // dd($validated);

        // Simpan data perpindahan
        Displacement::create([
            'device_id' => $request->device_id,
            'outlet_awal_id' => $request->outlet_awal_id,
            'outlet_tujuan_id' => $request->outlet_tujuan_id,
            'jumlah_pindah' => $request->jumlah_pindah,
            'tanggal_pindah' => $request->tanggal_pindah,
            'name_pic' => $request->name_pic,
            'name_it' => $request->name_it,
            'description' => $request->description,
            'image' => $device->image // Salin gambar juga ke displacement
        ]);

        // Update outlet_id di table devices
        // Device::where('id', $request->device_id)->update(['outlet_id' => $request->outlet_tujuan_id]);

        // dd($request->all());
        return redirect()->route('admin.displacement.report')->with('success', 'Perpindahan perangkat berhasil di simpan!');
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
