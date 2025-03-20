<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Displacement extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'displacements';

    protected $fillable = [
        
        'device_id',
        'outlet_awal_id',
        'outlet_tujuan_id',
        'tanggal_pindah',
        'jumlah_pindah',
        'image',
        'name_pic',
        'name_it',
        'description',
    ];

    public function device(){
        return $this->belongsTo(Device::class, 'device_id');
    }

    public function outletAwal(){
        return $this->belongsTo(Outlet::class, 'outlet_awal_id');
    }

    public function outletTujuan(){
        return $this->belongsTo(Outlet::class, 'outlet_tujuan_id');
    }
    
}   
