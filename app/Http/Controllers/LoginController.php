<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
        public function login(Request $request){
            try {
                $this->validate($request, [
                    'email' => 'required|email',
                    'password' => 'required',
                ]);

                $credentials = $request->only('email', 'password');

                if (Auth::attempt($credentials)) {
                    return redirect()->intended('/home');
                }

                return back()->withErrors(['email' => 'Invalid credentials']);
            } catch (Exception $e) {
                dd($e->getMessage());
            }
        }

        public function logout()
        {
            try {
                Auth::logout();

                return redirect()->route('login');
            } catch (Exception $e) {
                dd($e->getMessage());
            }
        }
}
