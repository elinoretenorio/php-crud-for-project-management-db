<?php

declare(strict_types=1);

namespace ProjectManagement\Tests\Clients;

use PHPUnit\Framework\TestCase;
use ProjectManagement\Clients\{ ClientsDto, ClientsModel };

class ClientsModelTest extends TestCase
{
    private array $input;
    private ClientsDto $dto;
    private ClientsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 4478,
            "name" => "someone",
            "website" => "sell",
            "industry" => "improve",
            "revenue" => "commercial",
            "description" => "nothing",
            "phone" => "such",
            "street1" => "throw",
            "street2" => "person",
            "city" => "matter",
            "state" => "up",
            "zip" => 2088,
            "country" => "central",
            "notes" => "Physical center seek. Listen respond others region table.",
        ];
        $this->dto = new ClientsDto($this->input);
        $this->model = new ClientsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new ClientsModel(null);

        $this->assertInstanceOf(ClientsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 1745;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetName(): void
    {
        $this->assertEquals($this->dto->name, $this->model->getName());
    }

    public function testSetName(): void
    {
        $expected = "anything";
        $model = $this->model;
        $model->setName($expected);

        $this->assertEquals($expected, $model->getName());
    }

    public function testGetWebsite(): void
    {
        $this->assertEquals($this->dto->website, $this->model->getWebsite());
    }

    public function testSetWebsite(): void
    {
        $expected = "feel";
        $model = $this->model;
        $model->setWebsite($expected);

        $this->assertEquals($expected, $model->getWebsite());
    }

    public function testGetIndustry(): void
    {
        $this->assertEquals($this->dto->industry, $this->model->getIndustry());
    }

    public function testSetIndustry(): void
    {
        $expected = "career";
        $model = $this->model;
        $model->setIndustry($expected);

        $this->assertEquals($expected, $model->getIndustry());
    }

    public function testGetRevenue(): void
    {
        $this->assertEquals($this->dto->revenue, $this->model->getRevenue());
    }

    public function testSetRevenue(): void
    {
        $expected = "anyone";
        $model = $this->model;
        $model->setRevenue($expected);

        $this->assertEquals($expected, $model->getRevenue());
    }

    public function testGetDescription(): void
    {
        $this->assertEquals($this->dto->description, $this->model->getDescription());
    }

    public function testSetDescription(): void
    {
        $expected = "idea";
        $model = $this->model;
        $model->setDescription($expected);

        $this->assertEquals($expected, $model->getDescription());
    }

    public function testGetPhone(): void
    {
        $this->assertEquals($this->dto->phone, $this->model->getPhone());
    }

    public function testSetPhone(): void
    {
        $expected = "result";
        $model = $this->model;
        $model->setPhone($expected);

        $this->assertEquals($expected, $model->getPhone());
    }

    public function testGetStreet1(): void
    {
        $this->assertEquals($this->dto->street1, $this->model->getStreet1());
    }

    public function testSetStreet1(): void
    {
        $expected = "wall";
        $model = $this->model;
        $model->setStreet1($expected);

        $this->assertEquals($expected, $model->getStreet1());
    }

    public function testGetStreet2(): void
    {
        $this->assertEquals($this->dto->street2, $this->model->getStreet2());
    }

    public function testSetStreet2(): void
    {
        $expected = "you";
        $model = $this->model;
        $model->setStreet2($expected);

        $this->assertEquals($expected, $model->getStreet2());
    }

    public function testGetCity(): void
    {
        $this->assertEquals($this->dto->city, $this->model->getCity());
    }

    public function testSetCity(): void
    {
        $expected = "thought";
        $model = $this->model;
        $model->setCity($expected);

        $this->assertEquals($expected, $model->getCity());
    }

    public function testGetState(): void
    {
        $this->assertEquals($this->dto->state, $this->model->getState());
    }

    public function testSetState(): void
    {
        $expected = "recognize";
        $model = $this->model;
        $model->setState($expected);

        $this->assertEquals($expected, $model->getState());
    }

    public function testGetZip(): void
    {
        $this->assertEquals($this->dto->zip, $this->model->getZip());
    }

    public function testSetZip(): void
    {
        $expected = 5974;
        $model = $this->model;
        $model->setZip($expected);

        $this->assertEquals($expected, $model->getZip());
    }

    public function testGetCountry(): void
    {
        $this->assertEquals($this->dto->country, $this->model->getCountry());
    }

    public function testSetCountry(): void
    {
        $expected = "strategy";
        $model = $this->model;
        $model->setCountry($expected);

        $this->assertEquals($expected, $model->getCountry());
    }

    public function testGetNotes(): void
    {
        $this->assertEquals($this->dto->notes, $this->model->getNotes());
    }

    public function testSetNotes(): void
    {
        $expected = "Full blue risk some night whom everyone. American until power.";
        $model = $this->model;
        $model->setNotes($expected);

        $this->assertEquals($expected, $model->getNotes());
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