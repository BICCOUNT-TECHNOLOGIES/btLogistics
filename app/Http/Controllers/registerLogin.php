<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class registerLogin extends Controller
{
    //
    public function registerLogin(){

        $user = Auth::user();
        switch ($user->user_type) {
            case 1:
                return redirect()->route('client.dashboard'); // Define this route
            case 2:
                return redirect()->route('dashboard'); // Define this route
            case 3:
                return redirect()->route('supplier.dashboard'); // Define this route
            default:
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'user_type' => 'Invalid user type.',
                ]);
        }
    
    }
}
