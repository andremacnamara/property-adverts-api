<?php

namespace App;

use App\Property;

use Illuminate\Database\Eloquent\Model;

class PropertyPayments extends Model
{
    protected $fillable = ['amount', 'braintree_transaction_id', 'property_id', 'billing_address', 'town', 'county'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
