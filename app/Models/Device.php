<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'devices';

    protected $fillable = [
        'device',
        'merek',
        'type',
        'serial_num',
        'qlt',
        'image',
        'status',
        'outlet_id',
        // 'displacement_id'
    ];

    public function outlet(){
        return $this->belongsTo(Outlet::class);
    }

    // public function displacement(){
    //     return $this->belongsToMany(Displacement::class, 'riwayat_barang')
    //     ->withPivot('name_pic','name_it','description','qlt')
    //     ->withTimestamps();
    // }

    // public function displacement(){
    //     return $this->belongsTo(Displacement::class, 'displacement_id');
    // }

    // public function displacement(){
    //     return $this->hasOne(Displacement::class);
    // }
}
