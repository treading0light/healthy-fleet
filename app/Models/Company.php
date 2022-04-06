<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function trucks() {
        return $this->hasMany(Truck::class);
    }

    public function departments() {
        return $this->hasMany(Department::class);
    }
}
