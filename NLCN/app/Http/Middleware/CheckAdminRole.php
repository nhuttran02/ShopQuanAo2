<?php

namespace App\Http\Middleware;

use Arr;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     * @throws Exception
     */
    public function handle(Request $request, Closure $next)
    {
        if(env('CHECK_ROLE_ADMIN', false)){
            $this->checkRouteName($request);
        }
        return $next($request);
    }

    private function checkIfContains( $needle, $haystack ) {
        return preg_match( '#\b' . preg_quote( $needle, '#' ) . '\b#i', $haystack ) !== 0;
    }

    /**
     * Check route name alias (route admin must have alias name)
     *
     * @param $request
     *
     * @return void
     * @throws Exception
     */
    public function checkRouteName($request)
    {
        //Permission on admin
        $route = \Route::getRoutes()->match($request);
        if ($this->checkIfContains('admin', $route->getPrefix())) {
            if (!$this->passPermissionRoute($route->getName())) {
                $users = auth()->user();
                if ($users && !$users->hasPermissionTo($route->getName())) {
                    abort(401, 'No permission');
                }
            }
        }
    }


    /**
     * Passmermission route
     *
     * @param string $route_name
     * @return bool
     * */
    public function passPermissionRoute(string $route_name): bool
    {
        $array_ignore_route_permission = [
            'main',
            'admin'
        ];

        return (in_array($route_name, $array_ignore_route_permission) || $this->checkEndsWith($route_name));
    }

    /**
     * Check end with string route
     *
     * @param string $route_name
     * @return bool
     * */
    private function checkEndsWith(string $route_name): bool
    {
        $array_ignore_by_regex = [
            '.search',
            '.store',
            '.update',
            '.not_check',
        ];

        foreach ($array_ignore_by_regex as $value) {
            if (str_ends_with($route_name, $value)) return true;
        }
        return false;
    }
}
