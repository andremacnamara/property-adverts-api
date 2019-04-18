<?php

namespace App\Http\Controllers\API;

use App\Property;
use App\User;
use App\StarredProperty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class StarredPropertyController extends Controller
{
    public function store(Property $property, User $user, Request $request)
    {     
        if(!$user->starredProperties()->starredProperty($property->id, $user->id))
        {
            return response()->json(StarredProperty::create(['property_id' => $property->id, 'user_id' => $user->id]));
        }

        return response()->json('You have already like this property');
    }
}
