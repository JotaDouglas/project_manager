<?php

namespace App\Http\Middleware;

use App\Support\Tenant;
use Closure;
use Illuminate\Http\Request;

class SetTenant
{
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            Tenant::setCompanyId(auth()->user()->company_id);
        } else {
            Tenant::setCompanyId(null);
        }

        return $next($request);
    }
}