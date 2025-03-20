<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DeviceImportExportController;
use App\Http\Controllers\DisplacementController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Models\Displacement;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/create', function () {
    return view('create');
})->middleware(['auth', 'verified'])->name('create');

// Route::get('/product', [ProductController::class, 'index'])->name('admin.product');
// Route::get('/product/create', [ProductController::class, 'create'])->name('admin.product.create');
// Route::get('/product/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
// Route::post('/product/store', [ProductController::class, 'store'])->name('admin.product.store');

// Route::get('/device', [DeviceController::class, 'index'])->name('admin.devices.index');
// Route::get('/device/create', [DeviceController::class, 'create'])->name('admin.devices.create');
// Route::post('/device/store', [DeviceController::class, 'store'])->name('admin.devices.store');


// Route::get('/dashboard', [DeviceController::class, 'index']);
Route::middleware(['auth'])->group(function () {
    Route::get('devices/create/{outlet_id}', [DeviceController::class, 'create'])->name('admin.devices.create');
    Route::post('devices/store/{outlet_id}', [DeviceController::class, 'store'])->name('admin.devices.store');
    Route::get('devices/{id}/edit', [DeviceController::class, 'edit'])->name('admin.devices.edit');
    Route::put('devices/{id}', [DeviceController::class, 'update'])->name('admin.devices.update');
    Route::delete('devices/{id}', [DeviceController::class, 'destroy'])->name('admin.devices.destroy');
    
});

Route::middleware(['auth'])->group(function () {
    Route::get('/devices/outlet/{outlet_id}', [DeviceController::class, 'index'])->name('admin.devices.index');
    
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [OutletController::class, 'index'])->name('dashboard');
    
    // Route::get('/displacement', [DisplacementController::class, 'index'])->name('admin.displacement.index');
    Route::get('/displacement/create', [DisplacementController::class, 'create'])->name('admin.displacement.create');
    Route::get('/displacement/devices/{outlet_id}', [DisplacementController::class, 'getDevicesByOutlet']);
    Route::post('/displacement/store', [DisplacementController::class, 'store'])->name('admin.displacement.store');
    // Route::get('/create', [DeviceController::class, 'create'])->name('admin.devices.create');
    // Route::resource('devices', DeviceController::class)->middleware('role:admin')->except('index');
    // Route::get('/devices', [DeviceController::class, 'index'])->name('admin.devices.index');
    // Route::get('/devices/{outlet_id}', [DeviceController::class, 'show'])->name('admin.devices.show');
    
    // Import Export
    // Route::get('devices/import', [DeviceController::class, 'import'])->name('admin.devices.import');
    // Route::post('devices/import_file', [DeviceController::class, 'import_file'])->name('admin.devices.import_file');
    Route::post('devices/import', [DeviceImportExportController::class, 'import'])->name('admin.devices.import');
    Route::get('devices/export', [DeviceImportExportController::class, 'export'])->name('admin.devices.export');
    
    Route::get('displacements', [DisplacementController::class, 'index'])->name('admin.displacement.index');
    
    Route::get('reports', [DisplacementController::class, 'index'])->name('admin.displacement.report');
    // Route::get('reports', [ReportController::class, 'snow'])->name('admin.report.detail');
    
    Route::get('/import', function() {
        return view('admin.devices.import');
    })->middleware(['auth', 'verified'])->name('import');

    Route::get('/report/detail', function () {
        return view('admin.report.detail');
    })->middleware(['auth', 'verified'])->name('detail');
    
    Route::resource('outlets', OutletController::class)->middleware('role:admin|user');
    Route::prefix('admin')->name('admin.')->group(function (){
        // Route::resource('reports', ReportController::class)->middleware('role:admin|user');
        
        // Route::resource('devices', DeviceController::class)->middleware('role:admin|user');
        // Route::get('devices', [DeviceController::class, 'index'])->name('device.index');
        // Route::post('/devices/request/{device:id}', [DeviceController::class, 'store'])->middleware('role:admin')->name('device.store');
        // // Route::get('create', [DeviceController::class, 'create'])->name('devices.create');
    });
    
});



require __DIR__.'/auth.php';
