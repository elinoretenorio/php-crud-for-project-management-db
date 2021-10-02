<?php

declare(strict_types=1);

namespace ProjectManagement\Clients;

use JsonSerializable;

class ClientsModel implements JsonSerializable
{
    private int $id;
    private string $name;
    private string $website;
    private string $industry;
    private string $revenue;
    private string $description;
    private string $phone;
    private string $street1;
    private string $street2;
    private string $city;
    private string $state;
    private int $zip;
    private string $country;
    private string $notes;

    public function __construct(ClientsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->name = $dto->name;
        $this->website = $dto->website;
        $this->industry = $dto->industry;
        $this->revenue = $dto->revenue;
        $this->description = $dto->description;
        $this->phone = $dto->phone;
        $this->street1 = $dto->street1;
        $this->street2 = $dto->street2;
        $this->city = $dto->city;
        $this->state = $dto->state;
        $this->zip = $dto->zip;
        $this->country = $dto->country;
        $this->notes = $dto->notes;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getWebsite(): string
    {
        return $this->website;
    }

    public function setWebsite(string $website): void
    {
        $this->website = $website;
    }

    public function getIndustry(): string
    {
        return $this->industry;
    }

    public function setIndustry(string $industry): void
    {
        $this->industry = $industry;
    }

    public function getRevenue(): string
    {
        return $this->revenue;
    }

    public function setRevenue(string $revenue): void
    {
        $this->revenue = $revenue;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getStreet1(): string
    {
        return $this->street1;
    }

    public function setStreet1(string $street1): void
    {
        $this->street1 = $street1;
    }

    public function getStreet2(): string
    {
        return $this->street2;
    }

    public function setStreet2(string $street2): void
    {
        $this->street2 = $street2;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): void
    {
        $this->state = $state;
    }

    public function getZip(): int
    {
        return $this->zip;
    }

    public function setZip(int $zip): void
    {
        $this->zip = $zip;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    public function getNotes(): string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): void
    {
        $this->notes = $notes;
    }

    public function toDto(): ClientsDto
    {
        $dto = new ClientsDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->name = $this->name ?? "";
        $dto->website = $this->website ?? "";
        $dto->industry = $this->industry ?? "";
        $dto->revenue = $this->revenue ?? "";
        $dto->description = $this->description ?? "";
        $dto->phone = $this->phone ?? "";
        $dto->street1 = $this->street1 ?? "";
        $dto->street2 = $this->street2 ?? "";
        $dto->city = $this->city ?? "";
        $dto->state = $this->state ?? "";
        $dto->zip = (int) ($this->zip ?? 0);
        $dto->country = $this->country ?? "";
        $dto->notes = $this->notes ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "website" => $this->website,
            "industry" => $this->industry,
            "revenue" => $this->revenue,
            "description" => $this->description,
            "phone" => $this->phone,
            "street1" => $this->street1,
            "street2" => $this->street2,
            "city" => $this->city,
            "state" => $this->state,
            "zip" => $this->zip,
            "country" => $this->country,
            "notes" => $this->notes,
        ];
    }
}