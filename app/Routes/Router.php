<?php

namespace App\Routes;

use Attribute;

#[Attribute]
readonly class Router
{
    public function __construct(
        private string $route
    )
    {}
}