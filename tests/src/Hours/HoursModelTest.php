<?php

declare(strict_types=1);

namespace ProjectManagement\Tests\Hours;

use PHPUnit\Framework\TestCase;
use ProjectManagement\Hours\{ HoursDto, HoursModel };

class HoursModelTest extends TestCase
{
    private array $input;
    private HoursDto $dto;
    private HoursModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 2101,
            "date" => "2021-10-11",
            "time" => 489.00,
            "work_completed" => "evening",
            "task_id" => 2512,
            "project_id" => 6488,
            "user_id" => 6969,
        ];
        $this->dto = new HoursDto($this->input);
        $this->model = new HoursModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new HoursModel(null);

        $this->assertInstanceOf(HoursModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 669;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetDate(): void
    {
        $this->assertEquals($this->dto->date, $this->model->getDate());
    }

    public function testSetDate(): void
    {
        $expected = "2021-10-08";
        $model = $this->model;
        $model->setDate($expected);

        $this->assertEquals($expected, $model->getDate());
    }

    public function testGetTime(): void
    {
        $this->assertEquals($this->dto->time, $this->model->getTime());
    }

    public function testSetTime(): void
    {
        $expected = 602.71;
        $model = $this->model;
        $model->setTime($expected);

        $this->assertEquals($expected, $model->getTime());
    }

    public function testGetWorkCompleted(): void
    {
        $this->assertEquals($this->dto->workCompleted, $this->model->getWorkCompleted());
    }

    public function testSetWorkCompleted(): void
    {
        $expected = "television";
        $model = $this->model;
        $model->setWorkCompleted($expected);

        $this->assertEquals($expected, $model->getWorkCompleted());
    }

    public function testGetTaskId(): void
    {
        $this->assertEquals($this->dto->taskId, $this->model->getTaskId());
    }

    public function testSetTaskId(): void
    {
        $expected = 8717;
        $model = $this->model;
        $model->setTaskId($expected);

        $this->assertEquals($expected, $model->getTaskId());
    }

    public function testGetProjectId(): void
    {
        $this->assertEquals($this->dto->projectId, $this->model->getProjectId());
    }

    public function testSetProjectId(): void
    {
        $expected = 4753;
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
        $expected = 6796;
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