<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class DeviceImportExportController extends Controller
{
    // Export data device ke Excel
    public function export(Request $request)
    {
        // Ambil dari request
        $outlet_id = $request->query('outlet_id');

        $devices = Device::where('outlet_id', $outlet_id)->get();

        if ($devices->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data device untuk outlet ini.');
        }
        
        // $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // Header kolom
        // $sheet->setCellValue('A1', 'ID');
        // $sheet->setCellValue('B1', 'Nama Device');
        // $sheet->setCellValue('C1', 'Outlet');
        // $sheet->setCellValue('D1', 'Status');
        $headers = ['ID', 'Nama Device', 'Merek', 'Tipe', 'Serial Number', 'Qlt', 'Status', 'Foto'];
        $columnIndex = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($columnIndex . '1', $header);
            $columnIndex++;
        }
        
        // Isi data
        $row = 2;
        foreach ($devices as $device) {
            $sheet->setCellValue('A' . $row, $device->id);
            $sheet->setCellValue('B' . $row, $device->device);
            $sheet->setCellValue('C' . $row, $device->merek);
            $sheet->setCellValue('D' . $row, $device->type);
            $sheet->setCellValue('E' . $row, $device->serial_num);
            $sheet->setCellValue('F' . $row, $device->qlt);
            $sheet->setCellValue('G' . $row, $device->status);

            // Tambahkan foto jika ada
            if ($device->image && Storage::exists('public/images/devices/' . $device->image)) {
                $imagePath = storage_path('app/public/images/devices/' . $device->image);

                $drawing = new Drawing();
                $drawing->setName('Device Image');
                $drawing->setDescription('Foto Device');
                $drawing->setPath($imagePath);
                $drawing->setHeight(50); // Atur tinggi gambar
                $drawing->setCoordinates('H' . $row); // Masukkan ke kolom H
                $drawing->setWorksheet($sheet);
            }   
            $row++;
        }

        // Nama file sesuai outlet
        $outletName = $devices->first()->outlet->name;
        $fileName = 'devices_' . strtolower(str_replace(' ', '_', $outletName)) . '.xlsx';
    
        
        // $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer = new Xlsx($spreadsheet);
        $filePath = storage_path('app/public/' . $fileName);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    // Import data device dari Excel
    public function import(Request $request)
    {
        // $request->validate([
        //     'file' => 'required|mimes:xlsx,xls',
        // ]);
        $file = $request->file('file');
        
        // Validasi file harus Excel
        if (!$file->isValid()) {
            return back()->with('error', 'File tidak valid.');
        }

        $spreadsheet = IOFactory::load($file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        // Mulai dari baris ke-2 agar tidak mengambil header
        foreach (array_slice($rows, 1) as $row) {
            // Pastikan semua kolom tidak kosong
            if (empty($row[0]) || empty($row[1]) || empty($row[2])) {
                continue; // Lewati jika ada data kosong
            }

            Device::create([
                'device' => $row[0],
                'merek' => $row[1],
                'type' => $row[2],
                'serial_num' => $row[3] ?? null,
                'qlt' => $row[4] ?? 1,
                'status' => $row[5] ?? 'Unknown',
                'outlet_id' => $row[6] ?? null, // Pastikan outlet_id sesuai
            ]);
        }

        // Lewati header (baris pertama)
        // unset($rows[0]);

        // foreach ($rows as $row) {
        //     Device::updateOrCreate(
        //         ['id' => $row[0]], // ID sebagai primary key
        //         [
        //             'name' => $row[1],
        //             'outlet_id' => $this->getOutletIdByName($row[2]), // Konversi nama outlet ke ID
        //             'status' => $row[3],
        //         ]
        //     );
        // }

        return redirect()->back()->with('success', 'Data berhasil diimport!');
    }

    private function getOutletIdByName($name)
    {
        return \App\Models\Outlet::where('name', $name)->value('id') ?? null;
    }
}
