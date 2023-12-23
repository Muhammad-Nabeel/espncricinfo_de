<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipmentTrackingEvent extends Model
{
    protected $fillable = [
        'shipment_id',
        'event',
        'event_date',
        'location',
        'notes',
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
