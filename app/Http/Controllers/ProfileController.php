<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\profile;
use Illuminate\Support\Facades\Storage;
use App\Models\User;


class ProfileController extends Controller
{

    public function updateProfilePicture(Request $request)
{
    // Validate the uploaded file
    $request->validate([
        'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // max 2048
    ]);

    // Get the authenticated user
    // $user = Auth::user();

    // Get the authenticated user
        /** @var \App\Models\User $user */
        $user = Auth::user();

    // Check if a file was uploaded
    if ($request->hasFile('profile_picture')) {
        // Generate a unique filename
        $filename = time() . '_' . $user->id . '.' . $request->file('profile_picture')->getClientOriginalExtension();

        // Store the file in the storage directory
        $path = $request->file('profile_picture')->storeAs(
            'public/profile_pictures', 
            $filename
        );

        // Delete old profile picture if exists
        if ($user->profile_picture && storage::exists('public/profile_pictures/' . $user->profile_picture)) {
            Storage::delete('public/profile_pictures/' . $user->profile_picture);
        }

        // Update user's profile picture in database
        $user->profile_picture = $filename;
        $user->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Profile picture updated successfully');
    }

    // Redirect back with error if no file uploaded
    return redirect()->back()->with('error', 'No file uploaded');
}
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
