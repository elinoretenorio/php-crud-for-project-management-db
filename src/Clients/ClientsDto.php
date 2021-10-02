<?php

declare(strict_types=1);

namespace ProjectManagement\Clients;

class ClientsDto 
{
    public int $id;
    public string $name;
    public string $website;
    public string $industry;
    public string $revenue;
    public string $description;
    public string $phone;
    public string $street1;
    public string $street2;
    public string $city;
    public string $state;
    public int $zip;
    public string $country;
    public string $notes;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->name = $row["name"] ?? "";
        $this->website = $row["website"] ?? "";
        $this->industry = $row["industry"] ?? "";
        $this->revenue = $row["revenue"] ?? "";
        $this->description = $row["description"] ?? "";
        $this->phone = $row["phone"] ?? "";
        $this->street1 = $row["street1"] ?? "";
        $this->street2 = $row["street2"] ?? "";
        $this->city = $row["city"] ?? "";
        $this->state = $row["state"] ?? "";
        $this->zip = (int) ($row["zip"] ?? 0);
        $this->country = $row["country"] ?? "";
        $this->notes = $row["notes"] ?? "";
    }
}