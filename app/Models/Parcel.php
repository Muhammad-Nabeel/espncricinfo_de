<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    protected $fillable = [
        'tracking_number',
        'pieces',
        'weight',
        'length',
        'width',
        'height',
        'price',
        'parcel_details',
    ];

    // public function shipments()
    // {
    //     return $this->belongsToMany(Shipment::class);
    // }

    public function shipment()
    {
        return $this->belongsTo(Shipment::class, 'shipment_id');
    }
}
