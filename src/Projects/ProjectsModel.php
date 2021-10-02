<?php

declare(strict_types=1);

namespace ProjectManagement\Projects;

use JsonSerializable;

class ProjectsModel implements JsonSerializable
{
    private int $id;
    private string $projectName;
    private int $projectManagerId;
    private string $startDate;
    private float $hourlyRate;
    private float $budget;
    private int $active;
    private int $statusId;
    private int $clientId;
    private float $totalHours;
    private float $laborCosts;
    private float $materialCost;

    public function __construct(ProjectsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->projectName = $dto->projectName;
        $this->projectManagerId = $dto->projectManagerId;
        $this->startDate = $dto->startDate;
        $this->hourlyRate = $dto->hourlyRate;
        $this->budget = $dto->budget;
        $this->active = $dto->active;
        $this->statusId = $dto->statusId;
        $this->clientId = $dto->clientId;
        $this->totalHours = $dto->totalHours;
        $this->laborCosts = $dto->laborCosts;
        $this->materialCost = $dto->materialCost;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getProjectName(): string
    {
        return $this->projectName;
    }

    public function setProjectName(string $projectName): void
    {
        $this->projectName = $projectName;
    }

    public function getProjectManagerId(): int
    {
        return $this->projectManagerId;
    }

    public function setProjectManagerId(int $projectManagerId): void
    {
        $this->projectManagerId = $projectManagerId;
    }

    public function getStartDate(): string
    {
        return $this->startDate;
    }

    public function setStartDate(string $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function getHourlyRate(): float
    {
        return $this->hourlyRate;
    }

    public function setHourlyRate(float $hourlyRate): void
    {
        $this->hourlyRate = $hourlyRate;
    }

    public function getBudget(): float
    {
        return $this->budget;
    }

    public function setBudget(float $budget): void
    {
        $this->budget = $budget;
    }

    public function getActive(): int
    {
        return $this->active;
    }

    public function setActive(int $active): void
    {
        $this->active = $active;
    }

    public function getStatusId(): int
    {
        return $this->statusId;
    }

    public function setStatusId(int $statusId): void
    {
        $this->statusId = $statusId;
    }

    public function getClientId(): int
    {
        return $this->clientId;
    }

    public function setClientId(int $clientId): void
    {
        $this->clientId = $clientId;
    }

    public function getTotalHours(): float
    {
        return $this->totalHours;
    }

    public function setTotalHours(float $totalHours): void
    {
        $this->totalHours = $totalHours;
    }

    public function getLaborCosts(): float
    {
        return $this->laborCosts;
    }

    public function setLaborCosts(float $laborCosts): void
    {
        $this->laborCosts = $laborCosts;
    }

    public function getMaterialCost(): float
    {
        return $this->materialCost;
    }

    public function setMaterialCost(float $materialCost): void
    {
        $this->materialCost = $materialCost;
    }

    public function toDto(): ProjectsDto
    {
        $dto = new ProjectsDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->projectName = $this->projectName ?? "";
        $dto->projectManagerId = (int) ($this->projectManagerId ?? 0);
        $dto->startDate = $this->startDate ?? "";
        $dto->hourlyRate = (float) ($this->hourlyRate ?? 0);
        $dto->budget = (float) ($this->budget ?? 0);
        $dto->active = (int) ($this->active ?? 0);
        $dto->statusId = (int) ($this->statusId ?? 0);
        $dto->clientId = (int) ($this->clientId ?? 0);
        $dto->totalHours = (float) ($this->totalHours ?? 0);
        $dto->laborCosts = (float) ($this->laborCosts ?? 0);
        $dto->materialCost = (float) ($this->materialCost ?? 0);

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "project_name" => $this->projectName,
            "project_manager_id" => $this->projectManagerId,
            "start_date" => $this->startDate,
            "hourly_rate" => $this->hourlyRate,
            "budget" => $this->budget,
            "active" => $this->active,
            "status_id" => $this->statusId,
            "client_id" => $this->clientId,
            "total_hours" => $this->totalHours,
            "labor_costs" => $this->laborCosts,
            "material_cost" => $this->materialCost,
        ];
    }
}