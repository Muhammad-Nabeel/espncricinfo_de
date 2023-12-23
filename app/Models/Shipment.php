<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{

    public function pickupAddress()
    {
        return $this->hasOne(PickupAddress::class);
    }

    public function deliveryAddress()
    {
        return $this->hasOne(DeliveryAddress::class);
    }

    public function parcels()
    {
        return $this->belongsToMany(Parcel::class);
    }

    public function trackingEvents()
    {
        return $this->hasMany(ShipmentTrackingEvent::class, 'shipment_id');
    }
}
