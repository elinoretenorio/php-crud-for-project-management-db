<?php

declare(strict_types=1);

namespace ProjectManagement\Users;

use ProjectManagement\Database\IDatabase;
use ProjectManagement\Database\DatabaseException;

class UsersRepository implements IUsersRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(UsersDto $dto): int
    {
        $sql = "INSERT INTO `users` (`email`, `first_name`, `last_name`, `role`)
                VALUES (?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->email,
                $dto->firstName,
                $dto->lastName,
                $dto->role
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(UsersDto $dto): int
    {
        $sql = "UPDATE `users` SET `email` = ?, `first_name` = ?, `last_name` = ?, `role` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->email,
                $dto->firstName,
                $dto->lastName,
                $dto->role,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?UsersDto
    {
        $sql = "SELECT `id`, `email`, `first_name`, `last_name`, `role`
                FROM `users` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new UsersDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `email`, `first_name`, `last_name`, `role`
                FROM `users`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new UsersDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `users` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}