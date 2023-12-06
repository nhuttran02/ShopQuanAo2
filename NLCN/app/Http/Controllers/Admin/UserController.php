<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\User\UserService;
use App\Models\Role;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserService $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('admin.user.list', [
            'title' => 'Danh Sách User Mới Nhất',
            'users' => $this->user->get()
        ]);
    }

    public function show(User $user)
    {
        return view('admin.user.edit', [
            'title' => 'Chỉnh Sửa User',
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        $result = $this->user->update($request, $user);
        if ($result) {
            return redirect('/admin/users');
        }

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->user->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công User'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}
