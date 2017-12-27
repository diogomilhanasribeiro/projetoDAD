<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

define('YOUR_SERVER_URL', 'http://projetodad.dad');
// Check "oauth_clients" table for next 2 values:
define('CLIENT_ID', '2');
define('CLIENT_SECRET', 'gx8TTDCXQ5wY3wexjn2S4Y7oYq6YLZ3OZKRF1Se5');

class LoginControllerAPI extends Controller
{
    public function login(Request $request)
    {
        $http = new \GuzzleHttp\Client;
        $response = $http->post(YOUR_SERVER_URL.'/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => CLIENT_ID,
                'client_secret' => CLIENT_SECRET,
                'username' => $request->email,
                'password' => $request->password,
                    'scope' => ''//$request->scope
                ],
                'exceptions' => false,
            ]);
        $errorCode = $response->getStatusCode();
        if ($errorCode == '200') {
            return json_decode((string) $response->getBody(), true);
        } else {
            return response()->json(['msg'=>'User credentials are invalid'], $errorCode);
        }
    }

    public function logout()
    {
        \Auth::guard('api')->user()->token()->revoke();
        \Auth::guard('api')->user()->token()->delete();
        return response()->json(['msg'=>'OK'], 200);
    }

    public function changePassword(Request $request)
    {
       // return $request->newpassword;
        $errorCode = '404';
        if(Auth::guest()){
         return response()->json(['msg'=>'User not logged in!'], $errorCode);     
     }

     if (bcrypt($request->oldpassword) == Auth::user()->password)
        {
            $errorCode = '200';
            $user = User::find(Auth::User()->id);
            $user->password = bcrypt($request->newpassword);
           // Auth::user()->password = bcrypt($request->newpassword);
        }
        if ($errorCode == '200') 
        {
            return json_decode((string) $response->getBody(), true);
        } else {
            return response()->json(['msg'=>'User credentials are invalid'], $errorCode);
        }
        
    }

}