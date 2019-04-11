<?php

namespace App\Search;

use App\Property;
use Illuminate\Http\Request;

class PropertySearch
{
    public static function apply(Request $filters)
    {
        $property = (new Property)->newQuery();

        if($filters->has('county')) {
            $property->where('county', $filters->input('county'));
        }

        if($filters->has('town')) {
            $property->where('town', $filters->input('town'));
        }

        if($filters->has('property_type')) {
            $property->where('property_type', $filters->input('property_type'));
        }

        if($filters->has('selling_type')) {
            $property->where('selling_type', $filters->input('selling_type'));
        }

        // Price
        if($filters->has('min_price')) {
            $property->where('price',  '>=', $filters->input('min_price'));
        }

        if($filters->has('max_price')) {
            $property->where('price',  '<=', $filters->input('max_price'));
        }

        //Bedrooms
        if($filters->has('min_bedrooms')) {
            $property->where('bedrooms',  '>=', $filters->input('min_bedrooms'));
        }

        if($filters->has('max_bedrooms')) {
            $property->where('bedrooms',  '<=', $filters->input('max_bedrooms'));
        }

        //Bathrooms
        if($filters->has('min_bathrooms')) {
            $property->where('bathrooms',  '>=', $filters->input('min_bathrooms'));
        }

        if($filters->has('max_bathrooms')) {
            $property->where('bathrooms',  '<=', $filters->input('max_bathrooms'));
        }

        //Size
        if($filters->has('min_size')) {
            $property->where('size',  '>=', $filters->input('min_size'));
        }

        if($filters->has('max_size')) {
            $property->where('size',  '<=', $filters->input('max_size'));
        }

        return $property->with('photos')->get();
    }
}