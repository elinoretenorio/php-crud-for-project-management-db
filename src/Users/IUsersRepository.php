<?php

declare(strict_types=1);

namespace ProjectManagement\Users;

interface IUsersRepository
{
    public function insert(UsersDto $dto): int;

    public function update(UsersDto $dto): int;

    public function get(int $id): ?UsersDto;

    public function getAll(): array;

    public function delete(int $id): int;
}