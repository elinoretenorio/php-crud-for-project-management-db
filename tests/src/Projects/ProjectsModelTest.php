<?php

declare(strict_types=1);

namespace ProjectManagement\Tests\Projects;

use PHPUnit\Framework\TestCase;
use ProjectManagement\Projects\{ ProjectsDto, ProjectsModel };

class ProjectsModelTest extends TestCase
{
    private array $input;
    private ProjectsDto $dto;
    private ProjectsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 3074,
            "project_name" => "total",
            "project_manager_id" => 1117,
            "start_date" => "2021-10-14",
            "hourly_rate" => 615.43,
            "budget" => 540.00,
            "active" => 3313,
            "status_id" => 5577,
            "client_id" => 5640,
            "total_hours" => 479.81,
            "labor_costs" => 141.66,
            "material_cost" => 681.31,
        ];
        $this->dto = new ProjectsDto($this->input);
        $this->model = new ProjectsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new ProjectsModel(null);

        $this->assertInstanceOf(ProjectsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 44;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetProjectName(): void
    {
        $this->assertEquals($this->dto->projectName, $this->model->getProjectName());
    }

    public function testSetProjectName(): void
    {
        $expected = "seek";
        $model = $this->model;
        $model->setProjectName($expected);

        $this->assertEquals($expected, $model->getProjectName());
    }

    public function testGetProjectManagerId(): void
    {
        $this->assertEquals($this->dto->projectManagerId, $this->model->getProjectManagerId());
    }

    public function testSetProjectManagerId(): void
    {
        $expected = 1101;
        $model = $this->model;
        $model->setProjectManagerId($expected);

        $this->assertEquals($expected, $model->getProjectManagerId());
    }

    public function testGetStartDate(): void
    {
        $this->assertEquals($this->dto->startDate, $this->model->getStartDate());
    }

    public function testSetStartDate(): void
    {
        $expected = "2021-10-20";
        $model = $this->model;
        $model->setStartDate($expected);

        $this->assertEquals($expected, $model->getStartDate());
    }

    public function testGetHourlyRate(): void
    {
        $this->assertEquals($this->dto->hourlyRate, $this->model->getHourlyRate());
    }

    public function testSetHourlyRate(): void
    {
        $expected = 842.52;
        $model = $this->model;
        $model->setHourlyRate($expected);

        $this->assertEquals($expected, $model->getHourlyRate());
    }

    public function testGetBudget(): void
    {
        $this->assertEquals($this->dto->budget, $this->model->getBudget());
    }

    public function testSetBudget(): void
    {
        $expected = 787.10;
        $model = $this->model;
        $model->setBudget($expected);

        $this->assertEquals($expected, $model->getBudget());
    }

    public function testGetActive(): void
    {
        $this->assertEquals($this->dto->active, $this->model->getActive());
    }

    public function testSetActive(): void
    {
        $expected = 7669;
        $model = $this->model;
        $model->setActive($expected);

        $this->assertEquals($expected, $model->getActive());
    }

    public function testGetStatusId(): void
    {
        $this->assertEquals($this->dto->statusId, $this->model->getStatusId());
    }

    public function testSetStatusId(): void
    {
        $expected = 3847;
        $model = $this->model;
        $model->setStatusId($expected);

        $this->assertEquals($expected, $model->getStatusId());
    }

    public function testGetClientId(): void
    {
        $this->assertEquals($this->dto->clientId, $this->model->getClientId());
    }

    public function testSetClientId(): void
    {
        $expected = 9089;
        $model = $this->model;
        $model->setClientId($expected);

        $this->assertEquals($expected, $model->getClientId());
    }

    public function testGetTotalHours(): void
    {
        $this->assertEquals($this->dto->totalHours, $this->model->getTotalHours());
    }

    public function testSetTotalHours(): void
    {
        $expected = 916.44;
        $model = $this->model;
        $model->setTotalHours($expected);

        $this->assertEquals($expected, $model->getTotalHours());
    }

    public function testGetLaborCosts(): void
    {
        $this->assertEquals($this->dto->laborCosts, $this->model->getLaborCosts());
    }

    public function testSetLaborCosts(): void
    {
        $expected = 122.20;
        $model = $this->model;
        $model->setLaborCosts($expected);

        $this->assertEquals($expected, $model->getLaborCosts());
    }

    public function testGetMaterialCost(): void
    {
        $this->assertEquals($this->dto->materialCost, $this->model->getMaterialCost());
    }

    public function testSetMaterialCost(): void
    {
        $expected = 758.26;
        $model = $this->model;
        $model->setMaterialCost($expected);

        $this->assertEquals($expected, $model->getMaterialCost());
    }

    public function testToDto(): void
    {
        $this->assertEquals($this->dto, $this->model->toDto());
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals($this->input, $this->model->jsonSerialize());
    }
}