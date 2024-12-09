<?php

namespace App\Controllers;

use App\Routes\Router;
use \App\Models\User as UserModel;

class User
{
    #[Router('getAll')]
    public function index(): array
    {
        return [
            'data' => 'test'
        ];
    }

    #[Router('create')]
    public function create(UserModel $user): array
    {
        $user->create(name: 'Toma', password: 'dqwqwd', email: 'gubka@bob.com');
        return [
            'data' => 'test'
        ];
    }

}