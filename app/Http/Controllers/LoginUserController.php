<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginUserController extends Controller
{
    public function login(){
        return view('pages.login');
    }
    public function register(){
        return view('pages.register');
    }
    public function registerUser(UserRegisterRequest $request){
        $data = $request->all();
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();
         // luu lai nguoi dang nhap
         Auth::attempt(['email' => $request->email,
         'password' => $request->password,
        ]);
         $success = 'Đăng kí thành công';

         return redirect('/login')->with('success', $success);
    }

    public function loginUser(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::attempt(['email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->route('homepage');
        }
        else {
            return back()->with('error', 'Đăng nhập thất bại');
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('homepage');
    }
}
