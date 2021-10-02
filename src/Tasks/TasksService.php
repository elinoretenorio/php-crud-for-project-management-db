<?php

declare(strict_types=1);

namespace ProjectManagement\Tasks;

class TasksService implements ITasksService
{
    private ITasksRepository $repository;

    public function __construct(ITasksRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(TasksModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(TasksModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?TasksModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new TasksModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var TasksDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new TasksModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?TasksModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new TasksDto($row);

        return new TasksModel($dto);
    }
}