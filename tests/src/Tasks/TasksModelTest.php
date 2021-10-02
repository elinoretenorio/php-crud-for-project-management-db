<?php

declare(strict_types=1);

namespace ProjectManagement\Tests\Tasks;

use PHPUnit\Framework\TestCase;
use ProjectManagement\Tasks\{ TasksDto, TasksModel };

class TasksModelTest extends TestCase
{
    private array $input;
    private TasksDto $dto;
    private TasksModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 594,
            "task_name" => "push",
            "instruction" => "firm",
            "status" => 7862,
            "total_hours" => 749.67,
            "milestone" => 3244,
            "project_id" => 8732,
            "user_id" => 5523,
        ];
        $this->dto = new TasksDto($this->input);
        $this->model = new TasksModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new TasksModel(null);

        $this->assertInstanceOf(TasksModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 8778;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetTaskName(): void
    {
        $this->assertEquals($this->dto->taskName, $this->model->getTaskName());
    }

    public function testSetTaskName(): void
    {
        $expected = "information";
        $model = $this->model;
        $model->setTaskName($expected);

        $this->assertEquals($expected, $model->getTaskName());
    }

    public function testGetInstruction(): void
    {
        $this->assertEquals($this->dto->instruction, $this->model->getInstruction());
    }

    public function testSetInstruction(): void
    {
        $expected = "eye";
        $model = $this->model;
        $model->setInstruction($expected);

        $this->assertEquals($expected, $model->getInstruction());
    }

    public function testGetStatus(): void
    {
        $this->assertEquals($this->dto->status, $this->model->getStatus());
    }

    public function testSetStatus(): void
    {
        $expected = 8232;
        $model = $this->model;
        $model->setStatus($expected);

        $this->assertEquals($expected, $model->getStatus());
    }

    public function testGetTotalHours(): void
    {
        $this->assertEquals($this->dto->totalHours, $this->model->getTotalHours());
    }

    public function testSetTotalHours(): void
    {
        $expected = 257.73;
        $model = $this->model;
        $model->setTotalHours($expected);

        $this->assertEquals($expected, $model->getTotalHours());
    }

    public function testGetMilestone(): void
    {
        $this->assertEquals($this->dto->milestone, $this->model->getMilestone());
    }

    public function testSetMilestone(): void
    {
        $expected = 7309;
        $model = $this->model;
        $model->setMilestone($expected);

        $this->assertEquals($expected, $model->getMilestone());
    }

    public function testGetProjectId(): void
    {
        $this->assertEquals($this->dto->projectId, $this->model->getProjectId());
    }

    public function testSetProjectId(): void
    {
        $expected = 9143;
        $model = $this->model;
        $model->setProjectId($expected);

        $this->assertEquals($expected, $model->getProjectId());
    }

    public function testGetUserId(): void
    {
        $this->assertEquals($this->dto->userId, $this->model->getUserId());
    }

    public function testSetUserId(): void
    {
        $expected = 4308;
        $model = $this->model;
        $model->setUserId($expected);

        $this->assertEquals($expected, $model->getUserId());
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