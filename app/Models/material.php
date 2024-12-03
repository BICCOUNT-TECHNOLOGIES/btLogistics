<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class material extends Model
{
    use HasFactory;
    
    use HasFactory;

    protected $fillable = ['manufacturer_id', 'name','description', 'price', 'image'];



    // app/Models/Material.php
public function images()
{
    return $this->hasMany(Image::class);
}


}
