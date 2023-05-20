<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class stController extends Controller
{
    public function index()
    {
        $subjects = Subject::paginate(8);
        return view('st', ['subjects' => $subjects]);
    }
}
