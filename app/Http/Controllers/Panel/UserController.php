<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\User\CreateUserRequest;
use App\Http\Requests\Panel\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);
        return view('panel.users.index')->with('users',$users);
    }

    public function create()
    {
        return view('panel.users.create');
    }

    public function store(CreateUserRequest  $request)
    {
        //validation in request class
        $data = $request->validated();
        $data['password'] = Hash::make('password');
//        dd($data);
        User::create($data);

        $request->session()->flash('status' , 'کاربر به درستی ایجاد شد!');

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
       // $user = User::findOrFail($id);
        return view('panel.users.edit')->with('user',$user);
    }

    public function update(UpdateUserRequest $request , User $user)
    {
        //validation in request class
        $data = $request->validated();
        $user->update($data);

        $request->session()->flash('status' , 'کاربر به درستی ویرایش شد!');

        return redirect()->route('users.index');
    }

    public function destroy( Request $request , User $user)
    {
        $user->delete();
        $request->session()->flash('status' , 'کاربر به درستی حذف شد!');
        return redirect()->route('users.index');
    }


}
