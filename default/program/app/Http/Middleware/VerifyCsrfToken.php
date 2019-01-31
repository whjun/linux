<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        "login/login_do",
        "login/register",
        "Index/product_category_add_do",
        "Index/product_brand_do",
        "Index/product_add_do",
    ];
}
