<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('panel.users.index');
    }

    public function create()
    {
        return view('panel.users.create');
    }

    public function edit($id)
    {
        return view('panel.users.edit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:11' ,'min:11' ,'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'max:255'],
        ]);

        $data = $request->only(['name' , 'mobile' , 'email' , 'role']);
        $data['password'] = Hash::make('password');
//        dd($data);
        User::create($data);

        return redirect()->route('users.index');
    }
}
