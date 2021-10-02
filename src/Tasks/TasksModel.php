<?php

declare(strict_types=1);

namespace ProjectManagement\Tasks;

use JsonSerializable;

class TasksModel implements JsonSerializable
{
    private int $id;
    private string $taskName;
    private string $instruction;
    private int $status;
    private float $totalHours;
    private int $milestone;
    private int $projectId;
    private int $userId;

    public function __construct(TasksDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->taskName = $dto->taskName;
        $this->instruction = $dto->instruction;
        $this->status = $dto->status;
        $this->totalHours = $dto->totalHours;
        $this->milestone = $dto->milestone;
        $this->projectId = $dto->projectId;
        $this->userId = $dto->userId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTaskName(): string
    {
        return $this->taskName;
    }

    public function setTaskName(string $taskName): void
    {
        $this->taskName = $taskName;
    }

    public function getInstruction(): string
    {
        return $this->instruction;
    }

    public function setInstruction(string $instruction): void
    {
        $this->instruction = $instruction;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getTotalHours(): float
    {
        return $this->totalHours;
    }

    public function setTotalHours(float $totalHours): void
    {
        $this->totalHours = $totalHours;
    }

    public function getMilestone(): int
    {
        return $this->milestone;
    }

    public function setMilestone(int $milestone): void
    {
        $this->milestone = $milestone;
    }

    public function getProjectId(): int
    {
        return $this->projectId;
    }

    public function setProjectId(int $projectId): void
    {
        $this->projectId = $projectId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function toDto(): TasksDto
    {
        $dto = new TasksDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->taskName = $this->taskName ?? "";
        $dto->instruction = $this->instruction ?? "";
        $dto->status = (int) ($this->status ?? 0);
        $dto->totalHours = (float) ($this->totalHours ?? 0);
        $dto->milestone = (int) ($this->milestone ?? 0);
        $dto->projectId = (int) ($this->projectId ?? 0);
        $dto->userId = (int) ($this->userId ?? 0);

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "task_name" => $this->taskName,
            "instruction" => $this->instruction,
            "status" => $this->status,
            "total_hours" => $this->totalHours,
            "milestone" => $this->milestone,
            "project_id" => $this->projectId,
            "user_id" => $this->userId,
        ];
    }
}