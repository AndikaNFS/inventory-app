<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Outlet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'location',
        // 'device_id',
    ];

    public function device(){
        return $this->hasMany(Device::class);
    }
    // public function device(){
    //     return $this->belongsTo(Device::class);
    // }
}
