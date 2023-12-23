<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    protected $fillable = [
        'consignor',
        'address_line_1',
        'address_line_2',
        'address_line_3',
        'town',
        'country',
        'postal_code',
        'contact',
        'telephone',
        'consignee_email',
    ];

    public function shipments()
    {
        return $this->hasMany(Shipment::class, 'delivery_address_id');
    }
}
