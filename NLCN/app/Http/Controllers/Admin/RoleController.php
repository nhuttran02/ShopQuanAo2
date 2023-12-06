<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Role\RoleService;
use App\Models\Role;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;

class RoleController extends Controller
{
    protected $role;

    public function __construct(RoleService $role)
    {
        $this->role = $role;
    }

    public function create()
    {
        return view('admin.role.add', [
            'title'  => 'Thêm Role mới',
            'routes' => $this->listRoute() ?? []
        ]);
    }

    public function listRoute()
    {
        $list_route = \Route::getRoutes()->getRoutesByName();
        $array_route_admin = [];
        $array_ignore_route_permission = [
            'main',
            'admin'
        ];

        foreach ($list_route as $route) {
            if ($this->checkIfContains('admin', $route->getPrefix()) && !in_array($route->getName(), $array_ignore_route_permission) && $this->checkEndsWith($route->getName())) {
                $array_route_admin[$route->getName()] = request()->getSchemeAndHttpHost() . '/' . $route->uri();
            }
        }

        return $array_route_admin;
    }

    private function checkIfContains( $needle, $haystack ) {
        return preg_match( '#\b' . preg_quote( $needle, '#' ) . '\b#i', $haystack ) !== 0;
    }

    private function checkEndsWith(string $route_name): bool
    {
        $array_ignore_by_regex = [
            '.search',
            '.store',
            '.update',
            '.not_check',
        ];
        foreach ($array_ignore_by_regex as $value) {
            if (str_ends_with($route_name, $value)) return false;
        }
        return true;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'list_route_admin' => 'required',
        ]);

        $this->role->insert($request);

        return redirect()->back();
    }

    public function index()
    {
        return view('admin.role.list', [
            'title' => 'Danh Sách Role Mới Nhất',
            'roles' => $this->role->get()
        ]);
    }

    public function show($role)
    {
        $role = Role::findOrFail($role);
        return view('admin.role.edit', [
            'title'  => 'Chỉnh Sửa Role',
            'role' => $role,
            'routes' => $this->listRoute()
        ]);
    }

    public function update(Request $request, $role)
    {
        $role = Role::findOrFail($role);
        $this->validate($request, [
            'name'  => 'required',
            'list_route_admin' => 'required',
        ]);

        $result = $this->role->update($request, $role);
        if ($result) {
            return redirect('/admin/roles');
        }

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->role->destroy($request);
        if ($result) {
            return response()->json([
                'error'   => false,
                'message' => 'Xóa thành công Role'
            ]);
        }

        return response()->json(['error' => true]);
    }
}
