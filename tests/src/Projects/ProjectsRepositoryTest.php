<?php

declare(strict_types=1);

namespace ProjectManagement\Tests\Projects;

use PHPUnit\Framework\TestCase;
use ProjectManagement\Database\DatabaseException;
use ProjectManagement\Projects\{ ProjectsDto, IProjectsRepository, ProjectsRepository };

class ProjectsRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private ProjectsDto $dto;
    private IProjectsRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("ProjectManagement\Database\IDatabase");
        $this->result = $this->createMock("ProjectManagement\Database\IDatabaseResult");
        $this->input = [
            "id" => 4870,
            "project_name" => "whom",
            "project_manager_id" => 8379,
            "start_date" => "2021-09-26",
            "hourly_rate" => 230.43,
            "budget" => 964.60,
            "active" => 3320,
            "status_id" => 1226,
            "client_id" => 4740,
            "total_hours" => 414.80,
            "labor_costs" => 884.41,
            "material_cost" => 908.10,
        ];
        $this->dto = new ProjectsDto($this->input);
        $this->repository = new ProjectsRepository($this->db);
    }

    protected function tearDown(): void
    {
        unset($this->db);
        unset($this->result);
        unset($this->input);
        unset($this->dto);
        unset($this->repository);
    }

    public function testInsert_ReturnsFailedOnException(): void
    {
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->insert($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testInsert_ReturnsId(): void
    {
        $expected = 3604;

        $sql = "INSERT INTO `projects` (`project_name`, `project_manager_id`, `start_date`, `hourly_rate`, `budget`, `active`, `status_id`, `client_id`, `total_hours`, `labor_costs`, `material_cost`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->projectName,
                $this->dto->projectManagerId,
                $this->dto->startDate,
                $this->dto->hourlyRate,
                $this->dto->budget,
                $this->dto->active,
                $this->dto->statusId,
                $this->dto->clientId,
                $this->dto->totalHours,
                $this->dto->laborCosts,
                $this->dto->materialCost
            ]);
        $this->db->expects($this->once())
            ->method("lastInsertId")
            ->willReturn($expected);

        $actual = $this->repository->insert($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testUpdate_ReturnsFailedOnException(): void
    {
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->update($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testUpdate_ReturnsRowCount(): void
    {
        $expected = 9909;

        $sql = "UPDATE `projects` SET `project_name` = ?, `project_manager_id` = ?, `start_date` = ?, `hourly_rate` = ?, `budget` = ?, `active` = ?, `status_id` = ?, `client_id` = ?, `total_hours` = ?, `labor_costs` = ?, `material_cost` = ?
                WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->projectName,
                $this->dto->projectManagerId,
                $this->dto->startDate,
                $this->dto->hourlyRate,
                $this->dto->budget,
                $this->dto->active,
                $this->dto->statusId,
                $this->dto->clientId,
                $this->dto->totalHours,
                $this->dto->laborCosts,
                $this->dto->materialCost,
                $this->dto->id
            ]);
        $this->result->expects($this->once())
            ->method("rowCount")
            ->willReturn($expected);

        $actual = $this->repository->update($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testGet_ReturnsEmptyOnException(): void
    {
        $id = 1398;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 1505;

        $sql = "SELECT `id`, `project_name`, `project_manager_id`, `start_date`, `hourly_rate`, `budget`, `active`, `status_id`, `client_id`, `total_hours`, `labor_costs`, `material_cost`
                FROM `projects` WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([$id]);
        $this->result->expects($this->once())
            ->method("fetchAll")
            ->willReturn([$this->input]);

        $actual = $this->repository->get($id);
        $this->assertEquals($this->dto, $actual);
    }

    public function testGetAll_ReturnsEmptyOnException(): void
    {
        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->getAll();
        $this->assertEmpty($actual);
    }

    public function testGetAll_ReturnsDtos(): void
    {
        $sql = "SELECT `id`, `project_name`, `project_manager_id`, `start_date`, `hourly_rate`, `budget`, `active`, `status_id`, `client_id`, `total_hours`, `labor_costs`, `material_cost`
                FROM `projects`";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute");
        $this->result->expects($this->once())
            ->method("fetchAll")
            ->willReturn([$this->input]);

        $actual = $this->repository->getAll();
        $this->assertEquals([$this->dto], $actual);
    }

    public function testDelete_ReturnsFailedOnException(): void
    {
        $id = 2070;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 751;
        $expected = 4485;

        $sql = "DELETE FROM `projects` WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([$id]);
        $this->result->expects($this->once())
            ->method("rowCount")
            ->willReturn($expected);

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }
}