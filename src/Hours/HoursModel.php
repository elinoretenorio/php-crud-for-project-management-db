<?php

declare(strict_types=1);

namespace ProjectManagement\Hours;

use JsonSerializable;

class HoursModel implements JsonSerializable
{
    private int $id;
    private string $date;
    private float $time;
    private string $workCompleted;
    private int $taskId;
    private int $projectId;
    private int $userId;

    public function __construct(HoursDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->date = $dto->date;
        $this->time = $dto->time;
        $this->workCompleted = $dto->workCompleted;
        $this->taskId = $dto->taskId;
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

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function getTime(): float
    {
        return $this->time;
    }

    public function setTime(float $time): void
    {
        $this->time = $time;
    }

    public function getWorkCompleted(): string
    {
        return $this->workCompleted;
    }

    public function setWorkCompleted(string $workCompleted): void
    {
        $this->workCompleted = $workCompleted;
    }

    public function getTaskId(): int
    {
        return $this->taskId;
    }

    public function setTaskId(int $taskId): void
    {
        $this->taskId = $taskId;
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

    public function toDto(): HoursDto
    {
        $dto = new HoursDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->date = $this->date ?? "";
        $dto->time = (float) ($this->time ?? 0);
        $dto->workCompleted = $this->workCompleted ?? "";
        $dto->taskId = (int) ($this->taskId ?? 0);
        $dto->projectId = (int) ($this->projectId ?? 0);
        $dto->userId = (int) ($this->userId ?? 0);

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "date" => $this->date,
            "time" => $this->time,
            "work_completed" => $this->workCompleted,
            "task_id" => $this->taskId,
            "project_id" => $this->projectId,
            "user_id" => $this->userId,
        ];
    }
}