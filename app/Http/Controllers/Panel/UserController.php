<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
