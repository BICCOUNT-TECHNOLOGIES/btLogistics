<?php
namespace App\Http\Controllers;
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Fillable fields
    protected $fillable = [
        'name', 
        'email', 
        'profile_picture'
    ];

    // Optional: If you want to add a mutator or accessor for profile picture
    public function getProfilePictureAttribute($value)
    {
        return $this->profile_picture 
        ? route('profile-picture', ['filename' => $this->profile_picture])
        : asset('default-profile.jpg');
        // return $value ? asset('storage/profile_pictures/' . $value) : asset('default-profile.png');
    }
}