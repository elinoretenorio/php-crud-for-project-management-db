<?php

declare(strict_types=1);

namespace ProjectManagement\Tests\Users;

use PHPUnit\Framework\TestCase;
use ProjectManagement\Users\{ UsersDto, UsersModel };

class UsersModelTest extends TestCase
{
    private array $input;
    private UsersDto $dto;
    private UsersModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 2411,
            "email" => "tammy96@example.net",
            "first_name" => "peace",
            "last_name" => "several",
            "role" => "Fine artist",
        ];
        $this->dto = new UsersDto($this->input);
        $this->model = new UsersModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new UsersModel(null);

        $this->assertInstanceOf(UsersModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 4651;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetEmail(): void
    {
        $this->assertEquals($this->dto->email, $this->model->getEmail());
    }

    public function testSetEmail(): void
    {
        $expected = "christopher71@example.org";
        $model = $this->model;
        $model->setEmail($expected);

        $this->assertEquals($expected, $model->getEmail());
    }

    public function testGetFirstName(): void
    {
        $this->assertEquals($this->dto->firstName, $this->model->getFirstName());
    }

    public function testSetFirstName(): void
    {
        $expected = "foreign";
        $model = $this->model;
        $model->setFirstName($expected);

        $this->assertEquals($expected, $model->getFirstName());
    }

    public function testGetLastName(): void
    {
        $this->assertEquals($this->dto->lastName, $this->model->getLastName());
    }

    public function testSetLastName(): void
    {
        $expected = "however";
        $model = $this->model;
        $model->setLastName($expected);

        $this->assertEquals($expected, $model->getLastName());
    }

    public function testGetRole(): void
    {
        $this->assertEquals($this->dto->role, $this->model->getRole());
    }

    public function testSetRole(): void
    {
        $expected = "Financial adviser";
        $model = $this->model;
        $model->setRole($expected);

        $this->assertEquals($expected, $model->getRole());
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