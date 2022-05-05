<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use App\Models\Service;

class Truck extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function department() {

        return $this->belongsTo(Department::class, 'department_id');
    }

    public function company() {

        return $this->belongsTo(Company::class, 'company_id');
    }

    public function images() {
        
        return $this->hasMany(Image::class);
    }

    public function services() {

        return $this->hasMany(Service::class);
    }

}
