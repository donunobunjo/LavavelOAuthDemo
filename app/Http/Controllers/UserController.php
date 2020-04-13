<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Dotenv\Result\Success;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator as ValidationValidator;

class UserController extends Controller
{
    public function register(Request $request){
        $validate = Validator::make($request->all(),[
            'name'=>'required',
            'city'=>'required',
            'email'=>'required|email|unique',
            'password'=>'required'
        ]);

        if (!$validate){
            $errorss= $validate->errors();
            return response()->json($errorss);
        }
        
        if ($validate){
            $user =User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'city'=>$request->city,
                'password'=>bcrypt($request->password)
            ]);
            if ($user){
                $success['name']=$user->name;
                $success['city']=$user->city;
                $success['token']=$user->createToken('yourapp')->accessToken;
                return response()->json($success);
            }
        }
    }
    public function login(Request $request){
        //return response()->json(['msg'=>'hahahahh']);
        $validate = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if ($validate->fails()){
            //return response()->json($validate->errors());
            return response()->json(['msg'=>'Invalid credentials']);
        }
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)){
            $user = Auth::user();
            $success['token']=$user->createToken('helo')->accessToken;
            $success['name']=$user->name;
            $success['city'] = $user->city;
            /*if ($success['token']==''&& $success['name']){
                return response()->json(['msg'=>'Invalidddddddd credentials']);
            }*/
            return response()->json($success);
        }
        return response()->json(['msg'=>'Invalid credentials']);
    }
}