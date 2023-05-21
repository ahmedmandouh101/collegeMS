<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::get();
        return view('subject_registeration', ['subjects' => $subjects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Step 1: Validate the form input fields
        $formFields = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Step 2: Retrieve the authenticated user
        $user = $request->user();

        // Step 3: Set the subject attribute of the user
        $user->subject = $formFields['name'];

        // Step 4: Save the user to the database
        $user->save();

        // Redirect back with a success message
        return redirect('/student')->with('success', 'Subject added successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
