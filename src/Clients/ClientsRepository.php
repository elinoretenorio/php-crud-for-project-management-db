<?php

declare(strict_types=1);

namespace ProjectManagement\Clients;

use ProjectManagement\Database\IDatabase;
use ProjectManagement\Database\DatabaseException;

class ClientsRepository implements IClientsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(ClientsDto $dto): int
    {
        $sql = "INSERT INTO `clients` (`name`, `website`, `industry`, `revenue`, `description`, `phone`, `street1`, `street2`, `city`, `state`, `zip`, `country`, `notes`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->name,
                $dto->website,
                $dto->industry,
                $dto->revenue,
                $dto->description,
                $dto->phone,
                $dto->street1,
                $dto->street2,
                $dto->city,
                $dto->state,
                $dto->zip,
                $dto->country,
                $dto->notes
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(ClientsDto $dto): int
    {
        $sql = "UPDATE `clients` SET `name` = ?, `website` = ?, `industry` = ?, `revenue` = ?, `description` = ?, `phone` = ?, `street1` = ?, `street2` = ?, `city` = ?, `state` = ?, `zip` = ?, `country` = ?, `notes` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->name,
                $dto->website,
                $dto->industry,
                $dto->revenue,
                $dto->description,
                $dto->phone,
                $dto->street1,
                $dto->street2,
                $dto->city,
                $dto->state,
                $dto->zip,
                $dto->country,
                $dto->notes,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?ClientsDto
    {
        $sql = "SELECT `id`, `name`, `website`, `industry`, `revenue`, `description`, `phone`, `street1`, `street2`, `city`, `state`, `zip`, `country`, `notes`
                FROM `clients` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new ClientsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `name`, `website`, `industry`, `revenue`, `description`, `phone`, `street1`, `street2`, `city`, `state`, `zip`, `country`, `notes`
                FROM `clients`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new ClientsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `clients` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}