<?php

declare(strict_types=1);

namespace ProjectManagement\Hours;

interface IHoursService
{
    public function insert(HoursModel $model): int;

    public function update(HoursModel $model): int;

    public function get(int $id): ?HoursModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?HoursModel;
}