<?php

declare(strict_types=1);

namespace ProjectManagement\Projects;

class ProjectsService implements IProjectsService
{
    private IProjectsRepository $repository;

    public function __construct(IProjectsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(ProjectsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(ProjectsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?ProjectsModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new ProjectsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var ProjectsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new ProjectsModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?ProjectsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new ProjectsDto($row);

        return new ProjectsModel($dto);
    }
}