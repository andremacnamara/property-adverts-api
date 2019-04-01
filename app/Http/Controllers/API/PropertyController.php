<?php

namespace App\Http\Controllers\API;

use Auth;
use App\Photo;
use App\Property;
use App\User;

use App\Http\Requests\PhotoRequest;
use App\Http\Requests\PropertyRequest;
use App\Http\Requests\PropertyPaymentRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//External API's
use Braintree_Configuration;
use Braintree_Transaction;
use JD\Cloudder\Facades\Cloudder;



class PropertyController extends Controller
{
    public function store(User $user, PropertyRequest $request) 
    {
        $advert = $user->property()->create($request['property']);
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

    public function ProcessAdvertPayment(Property $property, Request $request, PropertyPaymentRequest $propertyPaymentRequest)
    {

        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];

        $payment = Braintree_Transaction::sale([
            'amount' => 1,
            'paymentMethodNonce' => $nonce,
            'creditCard' => ['number' => request('cardnumber'), 'expirationDate' => request('month') . '/' . request('year'), "cvv" => request('cvv')],
        ]);

        if($payment->success)
        {
            $property->payment()->create(['amount' => $payment->transaction->amount, 'braintree_transaction_id' => $payment->transaction->id, 'billing_address' => request('billing_address'), 'town' => request('town'), 'county' => request('county')]);
            // $property->payment()->create($request1->all());
            return response()->json($payment);
        } 

        return response()->json(['error' => 'Payment Failed. Please try again or contact your payment provider for further help.'], 400);
    }
}

