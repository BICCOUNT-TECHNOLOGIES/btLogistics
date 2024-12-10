<?php

namespace App\Http\Controllers;

use App\Models\material;
use App\Models\User; // Don't forget to include the User model
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Facades\Auth;

class manufacturerController extends Controller
{
    //
    public function index(){

        $userId = Auth::id(); // Retrieves the logged-in user's ID
        $manufacturerId = Manufacturer::where('user_id', $userId)->value('id');

        $profile_picture= Auth::user()->profile_picture;

    // Retrieve the materials belonging to the logged-in manufacturer
    $materials = material::where('manufacturer_id', $manufacturerId)
                         ->with('images') // Eager load the associated images
                         ->get();

        
    
    //  Return the materials along with their images as a JSON response
    //   return response()->json([
    //       'materials' => $materials,
    //   ]);
    // dd($materials);

         return view('Manufacturer.index', compact('materials','profile_picture'));
    }

    
    // The show method, which retrieves and displays the user's profile
    public function show()
    {
        // Fetch the user from the database
        // $manufacturers = User::findOrFail();

        // Return the profile view with the user data
        return view('manufacturer.profile');

    }

    // Show the edit form
    public function edit()
    {
        // $manufacturers = User::findOrFail();
        return view('manufacturer.edit');
    }

    public function deletePage()
{
    // Find the user by ID
    $user = User::findOrFail();

    // Return the delete confirmation view
    return view('manufacturer.delete');
}

public function destroy()
{
    // Find the user by ID
    $user = User::findOrFail();

// Ensure the logged-in user is the one requesting the deletion
if ($user->id !== auth()->id()) {
    return redirect()->route('user.profile',)->with('error', 'You are not authorized to delete this account.');
}

    // Delete the user
    $user->delete();

    // // Redirect to a page (for example, the home page) after deletion with a success message
    // return redirect()->route('home')->with('success', 'Your account has been deleted successfully.');
}

// Handle the form submission
public function update(Request $request)
{
    // Validate the incoming data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:15',
        'profile-picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'current-password' => 'nullable|string',
        'new-password' => 'nullable|string|min:8|confirmed',
    ]);


        // Update the user's profile information
        $user = Auth::user();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];

        // Update the profile picture if a new one is uploaded
        if ($request->hasFile('profile-picture')) {
            // Delete old profile picture if it exists
            if ($user->profile_picture && Storage::exists($user->profile_picture)) {
                Storage::delete($user->profile_picture);
            }
}

            // Store the new profile picture
            $imagePath = $request->file('profile-picture')->store('profile_pictures');
            $user->profile_picture = $imagePath;
        }

        // // Update the password if provided
        // if ($request->filled('current-password') && Hash::check($request->current-password, $user->password)) {
        //     $user->password = Hash::make($validated['new-password']);
        // }

//         // Save the changes to the user
//         $user->save();
//         return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
// 
    }
    