<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function truck() {

        return $this->belongsTo(Truck::class, 'truck_id');
    }
}
