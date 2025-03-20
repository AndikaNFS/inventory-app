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
        
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        // $spreadsheet = new Spreadsheet();
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
            if ($device->image && Storage::exists('public/' . $device->photo)) {
                $imagePath = storage_path('app/public/images/devices' . $device->photo);

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
    
        
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        // $writer = new Xlsx($spreadsheet);
        $filePath = storage_path('app/public/' . $fileName);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    // Import data device dari Excel
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        // Lewati header (baris pertama)
        unset($rows[0]);

        foreach ($rows as $row) {
            Device::updateOrCreate(
                ['id' => $row[0]], // ID sebagai primary key
                [
                    'name' => $row[1],
                    'outlet_id' => $this->getOutletIdByName($row[2]), // Konversi nama outlet ke ID
                    'status' => $row[3],
                ]
            );
        }

        return redirect()->back()->with('success', 'Data berhasil diimport!');
    }

    private function getOutletIdByName($name)
    {
        return \App\Models\Outlet::where('name', $name)->value('id') ?? null;
    }
}
