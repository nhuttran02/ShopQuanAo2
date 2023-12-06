<?php


namespace App\Http\Services\Role;


use App\Models\Slider;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class RoleService
{
    public function insert($request)
    {
        try {
            #$request->except('_token');
            Role::create([
                'name' => $request->input('name'),
                'list_route_admin' => json_encode($request->input('list_route_admin')),
            ]);
            Session::flash('success', 'Thêm Role mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Role LỖI');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function get()
    {
        return Role::orderByDesc('id')->paginate(15);
    }

    public function update($request, $role)
    {
        try {
            $role->fill([
                'name' => $request->input('name'),
                'list_route_admin' => json_encode($request->input('list_route_admin')),
            ]);
            $role->save();
            Session::flash('success', 'Cập nhật Role thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật role Lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function destroy($request)
    {
        try {
            $role = Role::where('id', $request->input('id'))->first();
            if ($role) {
                User::where('role_id', $role->id)->update([
                    'role_id' => null
                ]);
                $role->delete();
                return true;
            }
        }catch (\Exception $e){}

        return false;
    }

    public function show()
    {
        return Slider::where('active', 1)->orderByDesc('sort_by')->get();
    }
}
