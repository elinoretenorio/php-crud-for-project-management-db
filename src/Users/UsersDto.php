<?php

declare(strict_types=1);

namespace ProjectManagement\Users;

class UsersDto 
{
    public int $id;
    public string $email;
    public string $firstName;
    public string $lastName;
    public string $role;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->email = $row["email"] ?? "";
        $this->firstName = $row["first_name"] ?? "";
        $this->lastName = $row["last_name"] ?? "";
        $this->role = $row["role"] ?? "";
    }
}