<?php

namespace App\Models;

use Src\Models\Core;

class User extends Core
{
    const TABLE = "users";

    public function create(string $email, string $name, string $password): void
    {
        $stmt = $this->db->prepare(query: "INSERT INTO users (email, name, password) VALUES (:email, :name, :password)");
        $stmt->bindParam(param: ':email', var: $email);
        $stmt->bindParam(param: ':name', var: $name);
        $stmt->bindParam(param: ':password', var: $password);

        $stmt->execute();
    }
}