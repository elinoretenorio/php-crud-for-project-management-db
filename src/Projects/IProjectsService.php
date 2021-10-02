<?php

declare(strict_types=1);

namespace ProjectManagement\Projects;

interface IProjectsService
{
    public function insert(ProjectsModel $model): int;

    public function update(ProjectsModel $model): int;

    public function get(int $id): ?ProjectsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?ProjectsModel;
}