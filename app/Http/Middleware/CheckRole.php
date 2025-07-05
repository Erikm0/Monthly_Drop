<?php

namespace app\Http\Middleware;

use App\AppClasses\AppConstants;
use App\Models\User;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole extends Middleware
{

    public function handle($request, Closure $next, ...$guards)
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->role == AppConstants::ROLE_ADMIN) {
            return $next($request);
        }

        return redirect(route('home'));
    }
}
