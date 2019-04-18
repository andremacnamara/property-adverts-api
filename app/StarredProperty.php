<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class StarredProperty extends Model
{
    use SoftDeletes;

    protected $fillable = ['property_id', 'user_id'];

    public function scopeStarredProperty($query, $propertyId, $userId)
    {
        return $query->where('property_id', $propertyId)->where('user_id', $userId)->exists();
    }
}
