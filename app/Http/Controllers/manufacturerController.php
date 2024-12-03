<?php

namespace App\Http\Controllers;

use App\Models\material;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class manufacturerController extends Controller
{
    //
    public function index(){

        $userId = Auth::id(); // Retrieves the logged-in user's ID
        $manufacturerId = Manufacturer::where('user_id', $userId)->value('id');

    // Retrieve the materials belonging to the logged-in manufacturer
    $materials = material::where('manufacturer_id', $manufacturerId)
                         ->with('images') // Eager load the associated images
                         ->get();

    //  Return the materials along with their images as a JSON response
    //   return response()->json([
    //       'materials' => $materials,
    //   ]);
    // dd($materials);

         return view('Manufacturer.index', compact('materials'));
    }
}
