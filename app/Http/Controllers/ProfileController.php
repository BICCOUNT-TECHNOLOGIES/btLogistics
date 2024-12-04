<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function updateProfilePicture(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Check if a file was uploaded
        if ($request->hasFile('profile_picture')) {
            // Generate unique filename
            $filename = time() . '_' . $user->id . '.' . $request->file('profile_picture')->getClientOriginalExtension();

            // Store the file
            $path = $request->file('profile_picture')->storeAs(
                'public/profile_pictures', 
                $filename
            );

            // // Update user's profile picture
            // $user->profile_picture = $filename;
            // $user->save();

            return redirect()->back()->with('success', 'Profile picture updated successfully');
        }

        return redirect()->back()->with('error', 'No file uploaded');
    }

    public function getProfilePicture()
    {
        // $path = storage_path('app/public/profile_pictures/' . $filename);

        // if (!file_exists($path)) {
            // abort(404);
        // }

        // return response()->file($path);
        return view('Manufacturer.profile');
    }

    
}