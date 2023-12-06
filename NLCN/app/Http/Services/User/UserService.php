<?php


namespace App\Http\Services\User;


use App\Models\Slider;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public function get()
    {
        return User::orderByDesc('id')->paginate(15);
    }

    public function update($request, $user)
    {
        try {
            $user->fill($request->input());
            $user->save();
            Session::flash('success', 'Cập nhật User thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật user Lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function destroy($request)
    {
        $user = User::where('id', $request->input('id'))->first();
        if ($user) {
            $user->delete();
            return true;
        }

        return false;
    }
}
