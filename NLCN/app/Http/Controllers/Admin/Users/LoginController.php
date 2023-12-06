<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login', [
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }

    public function indexLogin()
    {
        return view('login', [
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }

    public function indexRegister()
    {
        return view('register', [
            'title' => 'Đăng Ký Hệ Thống'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email'    => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember'))) {

            return redirect()->route('admin');
        }

        Session::flash('error', 'Email hoặc Password không đúng');
        return redirect()->back();
    }

    public function storeLogin(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email'    => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember'))) {

            return redirect()->route('home');
        }

        Session::flash('error', 'Email hoặc Password không đúng');
        return redirect()->back();
    }

    public function storeRegister(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        if ($user) {
            Session::flash('success', 'Tạo tài khoản thành công');
        }else{
            Session::flash('error', 'Đã có lỗi xảy ra, vui lòng thử lại');
        }
        return redirect()->back();
    }
}
