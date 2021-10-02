<?php

declare(strict_types=1);

namespace ProjectManagement\Hours;

use ProjectManagement\Database\IDatabase;
use ProjectManagement\Database\DatabaseException;

class HoursRepository implements IHoursRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(HoursDto $dto): int
    {
        $sql = "INSERT INTO `hours` (`date`, `time`, `work_completed`, `task_id`, `project_id`, `user_id`)
                VALUES (?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->date,
                $dto->time,
                $dto->workCompleted,
                $dto->taskId,
                $dto->projectId,
                $dto->userId
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(HoursDto $dto): int
    {
        $sql = "UPDATE `hours` SET `date` = ?, `time` = ?, `work_completed` = ?, `task_id` = ?, `project_id` = ?, `user_id` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->date,
                $dto->time,
                $dto->workCompleted,
                $dto->taskId,
                $dto->projectId,
                $dto->userId,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?HoursDto
    {
        $sql = "SELECT `id`, `date`, `time`, `work_completed`, `task_id`, `project_id`, `user_id`
                FROM `hours` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new HoursDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `date`, `time`, `work_completed`, `task_id`, `project_id`, `user_id`
                FROM `hours`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new HoursDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `hours` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}