<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update_profile(Request $request){
        try {
            User::where('email', $request->old_email)->update([
                'email'   => $request->email,
                'password'   => bcrypt($request->password),
            ]);
            return redirect()->route('profile');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
