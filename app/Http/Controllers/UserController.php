<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController as AuthRegisterController;
use App\Http\Controllers\RegisterController;
use Illuminate\Routing\Redirector;
use App\Models\User;
use Error;

use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\CssSelector\Parser\Token;
use Tymon\JWTAuth\Contracts\Providers\Auth as ProvidersAuth;

class UserController extends Controller
{
   
   
    public function login(Request $request)
    {
        
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            return ["error", "La contraseña o el correo son equivocados, intentelo de nuevo"];
               
        };
        $user = User::where('email',$request['email'])->firstOrFail();

        $token = $user->createToken('access_token')->plainTextToken;
        return ["logueado",Auth::id(),Auth::user()->name,$token];

       
       
        

       
       
    }


    public function store(Request $request)
    {
        
        
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        if ($validator->fails()) {
            return [ "error", $validator->errors()->all()];
        }

            
        $user = User::create([
            'name' => $request-> name,
            'email' => $request-> email,
            'password' => Hash::make($request-> password),
        ]);
        $token = $user->createToken('access_token')->plainTextToken;
        return ["creado",$user, $token];
         


    }

}
