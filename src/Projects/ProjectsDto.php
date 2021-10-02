<?php

declare(strict_types=1);

namespace ProjectManagement\Projects;

class ProjectsDto 
{
    public int $id;
    public string $projectName;
    public int $projectManagerId;
    public string $startDate;
    public float $hourlyRate;
    public float $budget;
    public int $active;
    public int $statusId;
    public int $clientId;
    public float $totalHours;
    public float $laborCosts;
    public float $materialCost;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->projectName = $row["project_name"] ?? "";
        $this->projectManagerId = (int) ($row["project_manager_id"] ?? 0);
        $this->startDate = $row["start_date"] ?? "";
        $this->hourlyRate = (float) ($row["hourly_rate"] ?? 0);
        $this->budget = (float) ($row["budget"] ?? 0);
        $this->active = (int) ($row["active"] ?? 0);
        $this->statusId = (int) ($row["status_id"] ?? 0);
        $this->clientId = (int) ($row["client_id"] ?? 0);
        $this->totalHours = (float) ($row["total_hours"] ?? 0);
        $this->laborCosts = (float) ($row["labor_costs"] ?? 0);
        $this->materialCost = (float) ($row["material_cost"] ?? 0);
    }
}