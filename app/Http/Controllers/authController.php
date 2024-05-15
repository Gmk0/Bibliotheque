<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Jetstream;

class authController extends Controller
{
    //



    public function login(Request $request)
    {


        try {

            $rules = ['email' => 'required|email', 'password' => 'required'];


            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                $token = $user->createToken("personal_token")->plainTextToken;
                $response = ['user' => $user, 'token' => $token];

                return response()->json($response, 200);
            }

            $response = ['message' => "Email ou mot de passe incorrect"];
            return response()->json($response, 400);
        } catch (\Exception $e) {

            $response = ['message' => "Quelque chose se mal passer{$e->getMessage()}"];
            return response()->json($response, 422);
        }
    }

    public function create(Request $request)
    {

        try {
            $rules = [
                'name' => ['required', 'string', 'max:255', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
                'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $user =  User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'password' => Hash::make($request['password']),
            ]);

            $token = $user->createToken("personal_token")->plainTextToken;
            $response = ['user' => $user, 'token' => $token, 'status' => true];
            return response()->json($response, 200);
        } catch (\Exception $e) {

            return response()->json([
                'message' => $e->getMessage(),
                'status' => false
            ], 500);
        }
    }
}