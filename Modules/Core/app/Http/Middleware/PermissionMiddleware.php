<?php

namespace Modules\Core\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Modules\Core\Traits\ResponseMessage;

class PermissionMiddleware
{
    use ResponseMessage;

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $permission)
    {
        try {
            $roles = $request->user()->roles()->get()->toArray();
            $permission = explode('.', $permission);

            $authorize = false;
            foreach ($roles as $role) {
                $permissions = json_decode($role['permissions'], true);
                if (
                    !empty($permissions[$permission[0]][$permission[1]])
                    || $role['permission_type'] == 'all'
                    ) {
                    $authorize = true;
                }
            }

            if (!$authorize) {
                throw new AuthorizationException('This action is restricted.');
            }
        } catch (Exception $exception) {
            return $this->errorResponse(
                message: $exception->getMessage(),
                code: 401,
            );
        }

        return $next($request);
    }
}