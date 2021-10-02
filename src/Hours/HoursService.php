<?php

declare(strict_types=1);

namespace ProjectManagement\Hours;

class HoursService implements IHoursService
{
    private IHoursRepository $repository;

    public function __construct(IHoursRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(HoursModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(HoursModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?HoursModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new HoursModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var HoursDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new HoursModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?HoursModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new HoursDto($row);

        return new HoursModel($dto);
    }
}