<?php

namespace App\Http\Controllers\API;

use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertySearchController extends Controller
{
    public function filter(Request $request, Property $property)
    {
        $property = $property->newQuery();

        if($request->has('county')) {
            $property->where('county', $request->input('county'));
        }

        if($request->has('town')) {
            $property->where('town', $request->input('town'));
        }

        if($request->has('property_type')) {
            $property->where('property_type', $request->input('property_type'));
        }

        if($request->has('selling_type')) {
            $property->where('selling_type', $request->input('selling_type'));
        }

        // Price
        if($request->has('min_price')) {
            $property->where('price',  '>=', $request->input('min_price'));
        }

        if($request->has('max_price')) {
            $property->where('price',  '<=', $request->input('max_price'));
        }

        //Bedrooms
        if($request->has('min_bedrooms')) {
            $property->where('bedrooms',  '>=', $request->input('min_bedrooms'));
        }

        if($request->has('max_bedrooms')) {
            $property->where('bedrooms',  '<=', $request->input('max_bedrooms'));
        }

        //Bathrooms
        if($request->has('min_bathrooms')) {
            $property->where('bathrooms',  '>=', $request->input('min_bathrooms'));
        }

        if($request->has('max_bathrooms')) {
            $property->where('bathrooms',  '<=', $request->input('max_bathrooms'));
        }

        //Size
        if($request->has('min_size')) {
            $property->where('size',  '>=', $request->input('min_size'));
        }

        if($request->has('max_size')) {
            $property->where('size',  '<=', $request->input('max_size'));
        }

        return $request->all();
    }
}
