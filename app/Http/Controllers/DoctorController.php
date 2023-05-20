<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Departments;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::paginate(8);
        return view('Doctor.index', ['subjects' => $subjects]);
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $photoName = $file->getClientOriginalName();
        $updatedPhotoName = time() . '_' . $photoName;
        $file->move('photos', $updatedPhotoName);
        $media = new Media;
        $media->name = $updatedPhotoName;
        $media->id;
        $media->save();
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subjects = Subject::where('id', '=', $id)->with('department')->first();
        $media = Media::get();
        return view('Doctor.show', ['subjects' => $subjects, 'media' => $media]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Auth::user()) {
            return redirect('login');
        }
        $this->authorize('update', Subject::class);

        $departments = Departments::get();
        $subjects = Subject::findOrFail($id);
        return view('Doctor.edit', ['subjects' => $subjects], ['departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Auth::user()) {
            return redirect('login');
        }
        $this->authorize('update', Subject::class);

        $subjects = Subject::findOrFail($id);
        $subjects->name = $request->name;
        $subjects->code = $request->code;
        $subjects->department_id = $request->department_id;
        $subjects->save();
        $media = new Media;
        $media->name = $request->name;
        return redirect('/doctor')->with('success', 'subjects updated');
    }
}
