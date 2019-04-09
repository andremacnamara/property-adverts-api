<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
   
    </head>
 <body class="bg-light">
<div class="container">
  <h3 style="color: #ff00bf">Property App</h3>

  <div class="card mb-4" style="border-top: 5px solid #ff00bf;">
    <div class="card-body">
    <p>You have recieved a new enquiry about property {{$msg->property['address']}}, {{$msg->property['town']}}, {{$msg->property['county']}}, {{$msg->property['postcode']}}, {{$msg->property['eircode']}} from <strong>{{$msg->name}}</p>
    
    <strong>Reply Email: </strong> {{$msg->email}}
    The message is
    <p>{{$msg->message}}</p>
    </div>
  </div>
    </body>
</html>
