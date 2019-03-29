<?php

namespace App\Http\Controllers\API;

use Auth;
use App\Photo;
use App\Property;
use App\User;

use App\Http\Requests\PhotoRequest;
use App\Http\Requests\PropertyRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;


class PropertyController extends Controller
{
    public function store(PropertyRequest $request) 
    {
        $user = User::find(1);
        // $user = Auth::user();
        $advert = $user->property()->create($request->all());
        return response()->json($advert);
    }

    public function UploadAdvertImage(Property $property, PhotoRequest $request) 
    {
        $image_name = $request->file('image_name')->getRealPath();;
        Cloudder::upload($image_name, null);

        $result = Cloudder::getResult();

        $photo = $property->photo()->create(['url' => $result['url'], 'public_id' => $result['public_id']]);

        return response()->json($photo);
    }

    public function ProcessAdvertPayment() 
    {

    }
}
