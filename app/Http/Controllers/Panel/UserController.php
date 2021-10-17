<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('panel.users.index')->with('users',$users);
    }

    public function create()
    {
        return view('panel.users.create');
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

    public function edit(User $user)
    {
       // $user = User::findOrFail($id);
        return view('panel.users.edit')->with('user',$user);
    }

    public function update(Request $request , User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:11' ,'min:11' ,Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'role' => ['required', 'max:255'],
        ]);

        $data = $request->only(['name' , 'mobile' , 'email' , 'role']);
        $user->update($data);

        return redirect()->route('users.index');
    }


}