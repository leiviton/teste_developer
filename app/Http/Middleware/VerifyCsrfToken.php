<?php

namespace TestDeveloper\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        'oauth/token',
        'api/*',
        'api/v1/admin/auth/user'
    ];
}
