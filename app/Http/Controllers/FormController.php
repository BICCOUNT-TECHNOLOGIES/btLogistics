<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    //

    public function submit(Request $request)
    {
        //  Validate the form data
     $validatedData = $request->validate([
            'description' => 'required|string|max:255',
         ]);

        // // Handle form submission (e.g., save data to database)
        // // Example: User::create($validatedData);

        // // Redirect to a success page or another form
        // return redirect()->route('form.success');

        return view('index');
    }
}
