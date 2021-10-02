<?php

declare(strict_types=1);

namespace ProjectManagement\Projects;

use ProjectManagement\Database\IDatabase;
use ProjectManagement\Database\DatabaseException;

class ProjectsRepository implements IProjectsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(ProjectsDto $dto): int
    {
        $sql = "INSERT INTO `projects` (`project_name`, `project_manager_id`, `start_date`, `hourly_rate`, `budget`, `active`, `status_id`, `client_id`, `total_hours`, `labor_costs`, `material_cost`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->projectName,
                $dto->projectManagerId,
                $dto->startDate,
                $dto->hourlyRate,
                $dto->budget,
                $dto->active,
                $dto->statusId,
                $dto->clientId,
                $dto->totalHours,
                $dto->laborCosts,
                $dto->materialCost
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(ProjectsDto $dto): int
    {
        $sql = "UPDATE `projects` SET `project_name` = ?, `project_manager_id` = ?, `start_date` = ?, `hourly_rate` = ?, `budget` = ?, `active` = ?, `status_id` = ?, `client_id` = ?, `total_hours` = ?, `labor_costs` = ?, `material_cost` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->projectName,
                $dto->projectManagerId,
                $dto->startDate,
                $dto->hourlyRate,
                $dto->budget,
                $dto->active,
                $dto->statusId,
                $dto->clientId,
                $dto->totalHours,
                $dto->laborCosts,
                $dto->materialCost,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?ProjectsDto
    {
        $sql = "SELECT `id`, `project_name`, `project_manager_id`, `start_date`, `hourly_rate`, `budget`, `active`, `status_id`, `client_id`, `total_hours`, `labor_costs`, `material_cost`
                FROM `projects` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new ProjectsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `project_name`, `project_manager_id`, `start_date`, `hourly_rate`, `budget`, `active`, `status_id`, `client_id`, `total_hours`, `labor_costs`, `material_cost`
                FROM `projects`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new ProjectsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `projects` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}