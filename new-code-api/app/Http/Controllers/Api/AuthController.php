<?php

namespace App\Http\Controllers\Api;

use App\User;
use Hash;
use App\Mail\resetPassTokenMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function register (Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
    
        $request['password']=Hash::make($request['password']);
        $user = User::create($request->toArray());
    
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $response = ['user' => $user, 'token' => $token];
    
        return response($response, 200);
    
    }
    public function login (Request $request) {

        $user = User::where('email', $request->email)->first();
    
        if ($user) {
    
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['user' => $user, 'token' => $token];
                return response($response, 200);
            } else {
                $response = "Password missmatch";
                return response($response, 422);
            }
    
        } else {
            $response = 'User does not exist';
            return response($response, 422);
        }
    
    }
    public function logout (Request $request) {

        $token = $request->user()->token();
        $token->revoke();
    
        $response = 'You have been succesfully logged out!';
        return response($response, 200);
    
    }
    public function validatePasswordReset(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $response = 'User does not exist';
            return response()->json($response, 401);
        }

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Hash::make(str_random(30)),
            'created_at' => Carbon::now()
        ]);
        
        $token = DB::table('password_resets')
            ->where('email', $request->email)->first();
        
        // $mail = $this->sendMail($user, $tokenData);
        Mail::to($request->email)->send(new resetPassTokenMail($user, $token));
        return response()->json(['message' => 'Email enviado']);
    }
    public function verifyToken(Request $request) {
        $token = DB::table('password_resets')
            ->where('token', $request->token)->first();
        if (!$token) {
            return response()->json('Fail token', 400);
        } else {
            return response()->json('success token', 200);
        }
    }
    public function alterPass (Request $request) {
        $token = DB::table('password_resets')
        ->where('token', $request['token'])->first();

        $user = User::where('email', $token->email)->first();

        if ($user) {
            $request['password']=Hash::make($request['password']);
            $user->password = $request['password'];
            $user->save();
            DB::table('password_resets')
            ->where('token', $request['token'])->delete();
        } else {
            return response()->json('user does not exists', 404);
        }
    }
}
