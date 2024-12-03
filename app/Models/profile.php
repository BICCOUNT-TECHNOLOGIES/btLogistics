<?php
// app/Models/User.php
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
        return $value ? asset('storage/profile_pictures/' . $value) : asset('default-profile.png');
    }
}