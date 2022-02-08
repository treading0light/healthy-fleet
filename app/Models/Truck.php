<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function department() {

        return $this->belongsTo(Department::class, 'department_id');
    }

    public function user() {

        return $this->belongsTo(User::class, 'user_id');
    }

}
