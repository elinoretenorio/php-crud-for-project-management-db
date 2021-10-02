<?php

declare(strict_types=1);

namespace ProjectManagement\Tests\Clients;

use PHPUnit\Framework\TestCase;
use ProjectManagement\Database\DatabaseException;
use ProjectManagement\Clients\{ ClientsDto, IClientsRepository, ClientsRepository };

class ClientsRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private ClientsDto $dto;
    private IClientsRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("ProjectManagement\Database\IDatabase");
        $this->result = $this->createMock("ProjectManagement\Database\IDatabaseResult");
        $this->input = [
            "id" => 35,
            "name" => "despite",
            "website" => "never",
            "industry" => "road",
            "revenue" => "message",
            "description" => "herself",
            "phone" => "them",
            "street1" => "father",
            "street2" => "purpose",
            "city" => "standard",
            "state" => "yet",
            "zip" => 8782,
            "country" => "fly",
            "notes" => "Environment central personal PM friend. Nature here participant degree almost. Finish door send set leg finally sound.",
        ];
        $this->dto = new ClientsDto($this->input);
        $this->repository = new ClientsRepository($this->db);
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
        $expected = 1005;

        $sql = "INSERT INTO `clients` (`name`, `website`, `industry`, `revenue`, `description`, `phone`, `street1`, `street2`, `city`, `state`, `zip`, `country`, `notes`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->name,
                $this->dto->website,
                $this->dto->industry,
                $this->dto->revenue,
                $this->dto->description,
                $this->dto->phone,
                $this->dto->street1,
                $this->dto->street2,
                $this->dto->city,
                $this->dto->state,
                $this->dto->zip,
                $this->dto->country,
                $this->dto->notes
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
        $expected = 8036;

        $sql = "UPDATE `clients` SET `name` = ?, `website` = ?, `industry` = ?, `revenue` = ?, `description` = ?, `phone` = ?, `street1` = ?, `street2` = ?, `city` = ?, `state` = ?, `zip` = ?, `country` = ?, `notes` = ?
                WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->name,
                $this->dto->website,
                $this->dto->industry,
                $this->dto->revenue,
                $this->dto->description,
                $this->dto->phone,
                $this->dto->street1,
                $this->dto->street2,
                $this->dto->city,
                $this->dto->state,
                $this->dto->zip,
                $this->dto->country,
                $this->dto->notes,
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
        $id = 8226;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 7556;

        $sql = "SELECT `id`, `name`, `website`, `industry`, `revenue`, `description`, `phone`, `street1`, `street2`, `city`, `state`, `zip`, `country`, `notes`
                FROM `clients` WHERE `id` = ?";

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
        $sql = "SELECT `id`, `name`, `website`, `industry`, `revenue`, `description`, `phone`, `street1`, `street2`, `city`, `state`, `zip`, `country`, `notes`
                FROM `clients`";

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
        $id = 714;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 6842;
        $expected = 9930;

        $sql = "DELETE FROM `clients` WHERE `id` = ?";

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