<?php

namespace App\Http\Controllers\API;

use App\Property;
use App\User;
use App\StarredProperty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class StarredPropertyController extends Controller
{
    public function star(Property $property, User $user, Request $request)
    {     

        $starredProperty = $user->starredProperties()->starredProperty($property->id, $user->id)->first();
        
        if(!$starredProperty)
        {
            return response()->json(StarredProperty::create(['property_id' => $property->id, 'user_id' => $user->id]));
        }

        return response()->json('You have already like this property');
    }

    public function unstar(Property $property, User $user, Request $request)
    {
        $starredProperty = $user->starredProperties()->starredProperty($property->id, $user->id);

        if($starredProperty->exists())
        {
            $starredProperty->delete();
            return response()->json('You have unstarred this property');
        }

        return response()->json('Record does not exist');
    }

    public function getStarredProperties(User $user)
    {
        return response()->json($user->starredProperties()->get());
    }
}
