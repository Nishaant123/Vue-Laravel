<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Designation;
use App\Models\Device;

class Employee extends Model
{
    use HasFactory;
    public function designationData(){
        return $this->hasOne(Designation::class);
    }

    public function devicesData(){
        return $this->hasMany(Device::class);
    }
}
