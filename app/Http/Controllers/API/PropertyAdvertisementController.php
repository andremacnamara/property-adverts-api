<?php

namespace App\Http\Controllers\API;

use Auth;
use App\User;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PropertyAdvertisement;

class PropertyAdvertisementController extends Controller
{
    public function store(Request $request) 
    {
        $advert = Auth::user()->propertyAdvertisement()->create($request->all());
        return response()->json($advert);
    }

    public function UploadAdvertImage(Request $request) 
    {
        $this->validate($request,[
            'image_name'=>'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
        ]);
 
        $image_name = $request->file('image_name')->getRealPath();;
 
        Cloudder::upload($image_name, null);
 
        return $request->all();
 
    }

    public function ProcessAdvertPayment() 
    {

    }
}
