<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login_view() {
        return view("auth.login");
    }

    public function login(Request $request) {
        $data = [
            'email' => $request['email'],
            'password' => $request['password']
        ];
        if(!Auth::attempt($data)) {
            return back()->with("fail", "Մուտքանունը կամ ծածկագիրը սխալ է");
        }
    }

    public function logout() {

    }

    public function register() {
        $data = [
            'name' => 'John Smith',
            'avatar' => 'a.jpg',
            'email' => 'john@mail.ru',
            'password' => Hash::make(1234),
            'role_id' => 1
        ];

        User::create($data);

    }
}
