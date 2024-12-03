<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;
    protected $fillable = ['user_id',];



    // app/Models/Manufacturer.php
public function materials()
{
    return $this->hasMany(Material::class);
}

}
