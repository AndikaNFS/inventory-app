<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Http\Controllers\Controller;
// use App\Http\Requests\StoreDeviceRequest;
use App\Http\Requests\UpdateDeviceRequest;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($outlet_id)
    {
        // $devices = Device::orderByDesc('id')->get();
        $devices = Device::where('outlet_id', $outlet_id,)->get();
        $outlets = Outlet::all();
        // $outlet = Outlet::with('devices')->findOrFail($outlet_id);

        if ($devices->isEmpty()) {
            return "Tidak ad device untuk outlet ini.";
        }

        return view('admin.devices.index', compact('devices', 'outlets', 'outlet_id'));
        // return view('admin.devices.index', compact('outlet'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($outlet_id)
    {
        $outlet = Outlet::findOrFail($outlet_id);
        return view ('admin.devices.create', compact('outlet'));
    }

    public function import()
    {
        return view ('admin.devices.import');
    }

    public function import_file()
    {
        return view ('admin.devices.import');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $outlet_id)
    {
         // Validasi input
         $request->validate([
            'device' => 'required|string|max:225',
            'merek' => 'required|string|max:225',
            'type' => 'required|string|max:225',
            'serial_num' => 'required|string|max:225',
            'qlt' => 'required|integer|max:30',
            'image' => 'nullable|image|mmimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:Baik,Rusak',

         ]);


        // $imagePath = $request->file('image') ? $request->file('image')->store('devices', 'public') : null ;
         $imagePath = null;

         if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/devices','public');
         }

        //  simpan data
        Device::create([
            'device' => $request->device,
            'merek' => $request->merek,
            'type' => $request->type,
            'serial_num' => $request->serial_num,
            'qlt' => $request->qlt,
            'image' => $imagePath,
            'status' => $request->status,
            'outlet_id' =>$request->outlet_id,
        ]);

        // Redirect ke daftar device berdasarkan outlet_id
        return redirect()->route('admin.devices.index', $outlet_id)->with('success', 'Device berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Device $device)
    public function show($id)
    {
        // Cari data berdasarkan ID
        $device = Device::findOrFail($id);

        // Kirim data ke view
        return view('admin.devices.show', compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $device = Device::findOrFail($id);
        $outlets = Outlet::all();
        return view ('admin.devices.edit', compact('device', 'outlets'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    public function update(Request $request, Device $device, $id)
    {
           
         // Validasi input
         $request->validate([
            'device' => 'required|string|max:225',
            'merek' => 'required|string|max:225',
            'type' => 'required|string|max:225',
            'serial_num' => 'required|string|max:225',
            'qlt' => 'required|integer|max:30',
            'status' => 'required|in:Baik,Rusak',
            'image' => 'nullable|image|max:2048', // foto tidak wajib di
            // 'outlet_id' => 'required|exists:outlets,id',
         ]);

         if ($request->hasFile('image')) {
            // cek apakah foto lama ada sebelum menghapusnya
            if ($device->image && Storage::disk('public')->exists($device->image)) {
                Storage::disk('public')->delete($device->image);

            };
            $imagePath = $request->file('image')->store('/images/devices','public' );
         } else {
            $imagePath = $device->image;
         }

        //  simpan data
        
        $device = Device::findOrFail($id);
        $device->update([
            'device' => $request->device,
            'merek' => $request->merek,
            'type' => $request->type,
            'serial_num' => $request->serial_num,
            'qlt' => $request->qlt,
            'status' => $request->status,
            'image' => $imagePath,
            // 'outlet_id' =>$outlet_id,
        ]);

        // Redirect ke daftar device berdasarkan outlet_id
        return redirect()->route('admin.devices.index', $device->outlet_id)->with('success', 'Device berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $device = Device::findOrFail($id);
        $device->delete();

    return redirect()->route('admin.devices.index', $device->outlet_id)->with('success', 'Device berhasil dihapus!');
    }
}
