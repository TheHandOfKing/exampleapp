<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    public function carModels()
    {
        return $this->hasMany(CarModel::class, 'manufac_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
