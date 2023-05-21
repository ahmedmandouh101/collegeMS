<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function create_account()
    {
        $subjects = Subject::paginate(8);
        return view('account', ['subjects' => $subjects]);
    }
    public function store_account(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', function ($attribute, $value, $fail) {
                $hashedPassword = Hash::make($value);
                if ($hashedPassword) {
                    request()->merge(['password' => $hashedPassword]);
                } else {
                    $fail('Error hashing password');
                }
            }],
            'role_id' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role_id = $request->role_id;
        $user->subject = ('');
        $user->save();
        return redirect('/home')->with('success', 'Congratulation ,The Account has been created.');
    }
}
