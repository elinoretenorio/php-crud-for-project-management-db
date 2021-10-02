<?php

declare(strict_types=1);

namespace ProjectManagement\Hours;

interface IHoursRepository
{
    public function insert(HoursDto $dto): int;

    public function update(HoursDto $dto): int;

    public function get(int $id): ?HoursDto;

    public function getAll(): array;

    public function delete(int $id): int;
}