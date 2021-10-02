<?php

declare(strict_types=1);

namespace ProjectManagement\Clients;

interface IClientsService
{
    public function insert(ClientsModel $model): int;

    public function update(ClientsModel $model): int;

    public function get(int $id): ?ClientsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?ClientsModel;
}