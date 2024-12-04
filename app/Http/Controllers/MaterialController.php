<?php
namespace App\Http\Controllers;
use App\Models\Image;
use App\Models\Material;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            // dd(request()->all()),

            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|array',  // Allow multiple images, or none
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validate each image
        ]);


        $userId = Auth::id(); // Retrieves the logged-in user's ID
        $manufacturerId = Manufacturer::where('user_id', $userId)->value('id');


        // Initialize image paths array
        $storedPaths = [];
        foreach ($request->file('photo') as $image) {
            // Store the image in the 'storage/app/public/photos' directory
            $path = $image->store('manufacturer', 'public');
            $storedPaths[] = $path;

        }



//    return response()->json([
//        'manufacturer_id' => $manufacturerId,
//    ]);
        // Create new material entry
        $material =material::create([
            'manufacturer_id' => $manufacturerId,
             'name' => $validated['name'],
             'description' => $validated['description'],
             'price' => $validated['price'],
             'image_path' => json_encode($storedPaths),  // Store multiple paths as JSON
         ]);


         foreach ($storedPaths as $path) {
            Image::create([
                'material_id' => $material->id,
                'imagepath' => $path,
            ]);
        }        
   
         // return redirect()->route('materials.index')->with('success', 'Material added successfully!');
   




}
}
