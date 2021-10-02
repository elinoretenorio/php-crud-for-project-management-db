<?php

declare(strict_types=1);

namespace ProjectManagement\Projects;

interface IProjectsRepository
{
    public function insert(ProjectsDto $dto): int;

    public function update(ProjectsDto $dto): int;

    public function get(int $id): ?ProjectsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}