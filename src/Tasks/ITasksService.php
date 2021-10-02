<?php

declare(strict_types=1);

namespace ProjectManagement\Tasks;

interface ITasksService
{
    public function insert(TasksModel $model): int;

    public function update(TasksModel $model): int;

    public function get(int $id): ?TasksModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?TasksModel;
}