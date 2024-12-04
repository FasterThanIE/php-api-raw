<?php

namespace App\Controllers;

use App\Routes\Router;

class User
{
    #[Router('getAll')]
    public function index()
    {
        return json_encode([
            'success' => 'Of course'
        ]);
    }
}