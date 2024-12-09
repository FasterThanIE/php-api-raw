<?php

namespace Src\Models;

use PDO;

class Core
{
    public readonly PDO $db;

    public function __construct()
    {
        $this->db = new PDO(
            dsn: 'mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_DATABASE'],
            username: $_ENV['DB_USER'],
            password: $_ENV['DB_PASSWORD'],
        );
    }
}