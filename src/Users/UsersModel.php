<?php

declare(strict_types=1);

namespace ProjectManagement\Users;

use JsonSerializable;

class UsersModel implements JsonSerializable
{
    private int $id;
    private string $email;
    private string $firstName;
    private string $lastName;
    private string $role;

    public function __construct(UsersDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->email = $dto->email;
        $this->firstName = $dto->firstName;
        $this->lastName = $dto->lastName;
        $this->role = $dto->role;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function toDto(): UsersDto
    {
        $dto = new UsersDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->email = $this->email ?? "";
        $dto->firstName = $this->firstName ?? "";
        $dto->lastName = $this->lastName ?? "";
        $dto->role = $this->role ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "email" => $this->email,
            "first_name" => $this->firstName,
            "last_name" => $this->lastName,
            "role" => $this->role,
        ];
    }
}