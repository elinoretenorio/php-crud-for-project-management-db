<?php

declare(strict_types=1);

namespace ProjectManagement\Tasks;

use ProjectManagement\Database\IDatabase;
use ProjectManagement\Database\DatabaseException;

class TasksRepository implements ITasksRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(TasksDto $dto): int
    {
        $sql = "INSERT INTO `tasks` (`task_name`, `instruction`, `status`, `total_hours`, `milestone`, `project_id`, `user_id`)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->taskName,
                $dto->instruction,
                $dto->status,
                $dto->totalHours,
                $dto->milestone,
                $dto->projectId,
                $dto->userId
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(TasksDto $dto): int
    {
        $sql = "UPDATE `tasks` SET `task_name` = ?, `instruction` = ?, `status` = ?, `total_hours` = ?, `milestone` = ?, `project_id` = ?, `user_id` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->taskName,
                $dto->instruction,
                $dto->status,
                $dto->totalHours,
                $dto->milestone,
                $dto->projectId,
                $dto->userId,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?TasksDto
    {
        $sql = "SELECT `id`, `task_name`, `instruction`, `status`, `total_hours`, `milestone`, `project_id`, `user_id`
                FROM `tasks` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new TasksDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `task_name`, `instruction`, `status`, `total_hours`, `milestone`, `project_id`, `user_id`
                FROM `tasks`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new TasksDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `tasks` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}