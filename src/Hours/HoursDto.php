<?php

declare(strict_types=1);

namespace ProjectManagement\Hours;

class HoursDto 
{
    public int $id;
    public string $date;
    public float $time;
    public string $workCompleted;
    public int $taskId;
    public int $projectId;
    public int $userId;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->date = $row["date"] ?? "";
        $this->time = (float) ($row["time"] ?? 0);
        $this->workCompleted = $row["work_completed"] ?? "";
        $this->taskId = (int) ($row["task_id"] ?? 0);
        $this->projectId = (int) ($row["project_id"] ?? 0);
        $this->userId = (int) ($row["user_id"] ?? 0);
    }
}