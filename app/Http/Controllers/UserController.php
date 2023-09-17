<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index',[
            'users' => $users,
        ]);
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',[
            'user' => $user
        ]);
        
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required|min:6',
        ]);
        $user = User::find($id);
        $user->update([
                'name' => $request->name,
                'email' => $user->email,
                'password' => Hash::make($request->password),
            ]);

        return redirect('admin/user')->with('success','Update success!');
    }
}
