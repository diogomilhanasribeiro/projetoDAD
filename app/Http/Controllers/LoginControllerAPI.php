<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

define('YOUR_SERVER_URL', 'http://projetodad.dad');
// Check "oauth_clients" table for next 2 values:
define('CLIENT_ID', '10');
define('CLIENT_SECRET', 'MxfhbKAMm3U93HltaUzNApF0ezm3yRhB0KtDLauW');

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
                'email' => $request->email,
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

        if (bcrypt($request->oldpassword) == Auth::user()->password){
            $errorCode = '200';
            $user = User::find(Auth::User()->id);
            $user->password = bcrypt($request->newpassword);
            // Auth::user()->password = bcrypt($request->newpassword);
        }
        if ($errorCode == '200'){
            return json_decode((string) $response->getBody(), true);
        } else {
            return response()->json(['msg'=>'User credentials are invalid'], $errorCode);
        }

    }

    public function forgotPassword(Request $request){
        $totalEmail = 0;
        dd('$totalEmail');
        if ($request->has('email') ) {
            $totalEmail = DB::table('users')->where('email', '=', $request->email)->count();
        }
        if($totalEmail == 1){
            // TODO Enviar link por email
        }else{
            return response()->json(['msg'=>'There is no account associated to this email'], $errorCode);
        }
        return response()->json($totalEmail == 1);
    }

    public function setAdminEmail(Request $request)
    {
        $errorCode = '404';

        if(Auth::guest()){
            return response()->json(['msg'=>'User not logged in!'], $errorCode);     
        }

        if (bcrypt($request->email) != Auth::user()->email){
            $errorCode = '200';
            $user = User::find(Auth::User()->id);
            $user->email = bcrypt($request->email);
               // Auth::user()->password = bcrypt($request->newpassword);
        }
        if ($errorCode == '200'){
            return json_decode((string) $response->getBody(), true);
        } else {
            return response()->json(['msg'=>'Email already in use'], $errorCode);
        }

    }


}