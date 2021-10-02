<?php

declare(strict_types=1);

namespace ProjectManagement\Tests\Hours;

use PHPUnit\Framework\TestCase;
use ProjectManagement\Database\DatabaseException;
use ProjectManagement\Hours\{ HoursDto, IHoursRepository, HoursRepository };

class HoursRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private HoursDto $dto;
    private IHoursRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("ProjectManagement\Database\IDatabase");
        $this->result = $this->createMock("ProjectManagement\Database\IDatabaseResult");
        $this->input = [
            "id" => 8751,
            "date" => "2021-09-29",
            "time" => 373.80,
            "work_completed" => "good",
            "task_id" => 4505,
            "project_id" => 3278,
            "user_id" => 5748,
        ];
        $this->dto = new HoursDto($this->input);
        $this->repository = new HoursRepository($this->db);
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
        $expected = 6007;

        $sql = "INSERT INTO `hours` (`date`, `time`, `work_completed`, `task_id`, `project_id`, `user_id`)
                VALUES (?, ?, ?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->date,
                $this->dto->time,
                $this->dto->workCompleted,
                $this->dto->taskId,
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
        $expected = 2836;

        $sql = "UPDATE `hours` SET `date` = ?, `time` = ?, `work_completed` = ?, `task_id` = ?, `project_id` = ?, `user_id` = ?
                WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->date,
                $this->dto->time,
                $this->dto->workCompleted,
                $this->dto->taskId,
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
        $id = 5719;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 3734;

        $sql = "SELECT `id`, `date`, `time`, `work_completed`, `task_id`, `project_id`, `user_id`
                FROM `hours` WHERE `id` = ?";

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
        $sql = "SELECT `id`, `date`, `time`, `work_completed`, `task_id`, `project_id`, `user_id`
                FROM `hours`";

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
        $id = 4991;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 3669;
        $expected = 7977;

        $sql = "DELETE FROM `hours` WHERE `id` = ?";

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