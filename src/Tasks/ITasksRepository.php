<?php

declare(strict_types=1);

namespace ProjectManagement\Tasks;

interface ITasksRepository
{
    public function insert(TasksDto $dto): int;

    public function update(TasksDto $dto): int;

    public function get(int $id): ?TasksDto;

    public function getAll(): array;

    public function delete(int $id): int;
}