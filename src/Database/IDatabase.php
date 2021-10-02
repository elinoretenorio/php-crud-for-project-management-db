<?php

declare(strict_types=1);

namespace ProjectManagement\Database;

interface IDatabase
{
    public function prepare(string $sql): IDatabaseResult;

    public function lastInsertId(): int;
}
