<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'client_id',
        'plate',
        'brand',
        'model',
        'manufacture_year',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
