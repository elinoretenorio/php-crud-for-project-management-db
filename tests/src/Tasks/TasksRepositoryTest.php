<?php

declare(strict_types=1);

namespace ProjectManagement\Tests\Tasks;

use PHPUnit\Framework\TestCase;
use ProjectManagement\Database\DatabaseException;
use ProjectManagement\Tasks\{ TasksDto, ITasksRepository, TasksRepository };

class TasksRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private TasksDto $dto;
    private ITasksRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("ProjectManagement\Database\IDatabase");
        $this->result = $this->createMock("ProjectManagement\Database\IDatabaseResult");
        $this->input = [
            "id" => 5034,
            "task_name" => "range",
            "instruction" => "social",
            "status" => 193,
            "total_hours" => 643.97,
            "milestone" => 4671,
            "project_id" => 1827,
            "user_id" => 817,
        ];
        $this->dto = new TasksDto($this->input);
        $this->repository = new TasksRepository($this->db);
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
        $expected = 9097;

        $sql = "INSERT INTO `tasks` (`task_name`, `instruction`, `status`, `total_hours`, `milestone`, `project_id`, `user_id`)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->taskName,
                $this->dto->instruction,
                $this->dto->status,
                $this->dto->totalHours,
                $this->dto->milestone,
                $this->dto->projectId,
                $this->dto->userId
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
        $expected = 2471;

        $sql = "UPDATE `tasks` SET `task_name` = ?, `instruction` = ?, `status` = ?, `total_hours` = ?, `milestone` = ?, `project_id` = ?, `user_id` = ?
                WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->taskName,
                $this->dto->instruction,
                $this->dto->status,
                $this->dto->totalHours,
                $this->dto->milestone,
                $this->dto->projectId,
                $this->dto->userId,
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
        $id = 6799;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 786;

        $sql = "SELECT `id`, `task_name`, `instruction`, `status`, `total_hours`, `milestone`, `project_id`, `user_id`
                FROM `tasks` WHERE `id` = ?";

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
        $sql = "SELECT `id`, `task_name`, `instruction`, `status`, `total_hours`, `milestone`, `project_id`, `user_id`
                FROM `tasks`";

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
        $id = 1434;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 4535;
        $expected = 7588;

        $sql = "DELETE FROM `tasks` WHERE `id` = ?";

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