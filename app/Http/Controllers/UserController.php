<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'name' => 'required|string',
            'surname' => 'required|string',
            'login' => 'required|string|unique:App\Models\User,login',
            'email' => 'required|email:strict|unique:App\Models\User,email',
            'password' => 'required|string|same:password_repeat|min:6',
            'password_repeat' => 'required|string|same:password|min:6'
        ]);
        
        if($validator->fails()) return response()->json($validator->errors(), 400);
        
        User::create([
            'name' => $r->name,
            'surname' => $r->surname,
            'patronymic' => $r->patronymic,
            'email' => $r->email,
            'login' => $r->login,
            'password' => Hash::make($r->password),
            'is_admin' => '0',
        ]);
        
        return response()->json(['success' => 'success'], 200);
    }

    public function login(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'login' => 'required|string',
            'password' => 'required|string'
        ]);

        if($validator->fails()) return response()->json($validator->errors(), 400);

        if(Auth::attempt(['login' => $r->login, 'password' => $r->password])) {
            return response()->json(['success' => 'success'], 200);
        } else {
            return response()->json(['error' => 'error'], 400);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
