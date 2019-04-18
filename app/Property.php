<?php

namespace App;

use App\Photo;
use App\PropertyPayments;
use App\StarredProperty;
use App\User; 

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->hasOne(Photo::class);
    }

    public function stars()
    {
        return $this->hasMany(StarredProperty::class);
    }

    public function getMainPhoto()
    {
        return $this->hasOne(Photo::class);
    }

    public function payment()
    {
        return $this->hasOne(PropertyPayments::class);
    }


}
