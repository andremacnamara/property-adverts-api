<?php

namespace App\Http\Controllers\API;

use App\Property;
use App\Search\PropertySearch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertySearchController extends Controller
{
    public function filter(Request $request, Property $property)
    {
        return response()->json(PropertySearch::apply($request));
    }
}
