<?php

namespace App\Http\Controllers\API;

use App\Property;
use App\User;
use App\Http\Requests\PropertyRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PropertyController extends Controller
{

    public function all(User $user)
    {
        $properties = $user->properties()->get();

        if (!$user)
        {
            return response()->json(['error' => 'User does not exist'], 404);
        }

        if (!$properties)
        {
            return response()->json(['error' => 'No properties'], 200);
        }

        return response()->json($properties);
    }

    public function show(Property $property)
    {
        if (!$property)
        {
            return response()->json(['error' => 'Property not found'], 404);
        }

        return response()->json($property);
    }

    public function edit(Property $property)
    {
        if (!$property)
        {
            return response()->json(['error' => 'Property not found'], 404);
        }

        return response()->json($property);
    }

    public function update(Property $property, PropertyRequest $request) 
    {
        // $advert =  $property->update([$request['property']]);
        $advert =  $property->update($request->all());
        return response()->json($advert);
    }



}

