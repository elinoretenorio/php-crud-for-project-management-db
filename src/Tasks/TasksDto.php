<?php

declare(strict_types=1);

namespace ProjectManagement\Tasks;

class TasksDto 
{
    public int $id;
    public string $taskName;
    public string $instruction;
    public int $status;
    public float $totalHours;
    public int $milestone;
    public int $projectId;
    public int $userId;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->taskName = $row["task_name"] ?? "";
        $this->instruction = $row["instruction"] ?? "";
        $this->status = (int) ($row["status"] ?? 0);
        $this->totalHours = (float) ($row["total_hours"] ?? 0);
        $this->milestone = (int) ($row["milestone"] ?? 0);
        $this->projectId = (int) ($row["project_id"] ?? 0);
        $this->userId = (int) ($row["user_id"] ?? 0);
    }
}