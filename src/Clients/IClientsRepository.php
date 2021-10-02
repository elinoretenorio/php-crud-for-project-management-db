<?php

declare(strict_types=1);

namespace ProjectManagement\Clients;

interface IClientsRepository
{
    public function insert(ClientsDto $dto): int;

    public function update(ClientsDto $dto): int;

    public function get(int $id): ?ClientsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}