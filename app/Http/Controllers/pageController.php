<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Subject;
use App\Models\Departments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class pageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::paginate(8);
        return view('subjects.index', ['subjects' => $subjects]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()) {
            return Redirect('login');
        }
        $this->authorize('create' , Subject::class);
        $departments = Departments::get();
        return view('subjects/create', ['departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()) {
            return redirect('login');
        }
        $this->authorize('create' , Subject::class);

        $formFields = $request->validate([
            'name' => 'required',
            'code' => 'required',
            'department_id' => 'required'
        ]);
        Subject::create($formFields);
        return redirect('/subjects')->with('success', 'Subject Added');
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
        $this->authorize('update' , Subject::class);

        $departments = Departments::get();
        $subjects = Subject::findOrFail($id);
        return view('subjects.edit', ['subjects' => $subjects], ['departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Auth::user()) {
            return redirect('login');
        }
        // if( !Gate::allows('update')){
        //     return 'Not authorized';

        // }


        $this->authorize('update' , Subject::class);

        $subjects = Subject::findOrFail($id);
        $subjects->name = $request->name;
        $subjects->code = $request->code;
        $subjects->department_id = $request->department_id;
        $subjects->save();
        return redirect('/subjects')->with('success', 'subjects updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Auth::user()) {
            return redirect('login');
        }
        $this->authorize('delete' , Subject::class);

        $subjects = Subject::findOrFail($id);
        $subjects->delete();
        return redirect('/subjects')->with('delete', 'Subject Deleted');
    }
}
