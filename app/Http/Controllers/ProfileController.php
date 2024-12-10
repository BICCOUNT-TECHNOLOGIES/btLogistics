<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function getProfile(Request $request)
  {
    $user = Auth::user();
    return view('manufacturer.profile', compact('user'));


}


public function editProfile(Request $request){
// dd($request->all());
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'location' => 'required|string|max:255',
        'photo' => 'required', // Max 2MB image
        'phone' => 'required',
    ]);

    // Get the authenticated user
    $user = Auth::user();

    // Update user details
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->location = $validatedData['location'];
    $user->phone = $validatedData['phone'];

    // Handle photo upload if provided
    if ($request->hasFile('photo')) {

    //  Delete the old photo if it exists

       if ($user->photo) {
            Storage::delete($user->photo);
    }

        // Store the new photo and get its path
        $path = $request->file('photo')->store('photos', 'public');

        // $path = $request->store('photos', 'public');

        $user->profile_picture = $path;
    }

    // $user->profile_picture = $validatedData['photo'];

    // Save the user record
    $user->save();

    // Redirect with a success message
    return redirect()->back()->with('success', 'Profile updated successfully!');


}


public function showProfile()
{
    // Get the logged-in user
    $user = auth()->user();

    // Return the user's profile data, including the profile picture
    return view('profile.edit', compact('user'));
}
}