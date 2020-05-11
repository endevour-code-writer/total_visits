<?php

namespace Domain\Visits\Repository;

use PDO;

class TotalVisitsRepository
{
    /** @var PDO  */
    private PDO $connection;

    /**
     * TotalVisitsRepository constructor.
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param int $id
     * @return array
     */
    public function updateCountAndGetLastValueById(int $id): array
    {
        try {
            $this->connection->beginTransaction();
            $updateVisitCountsQuery =  "INSERT INTO total_visits (id, visits) 
                                        VALUES ('1', '1')
                                        ON DUPLICATE KEY UPDATE visits = visits + 1;";

            $this->connection->exec($updateVisitCountsQuery);
            $totalVisits = $this->getTotalCountsById($id);

            $this->connection->commit();
        } catch (\Exception $exception) {
            $exception->getMessage();
            $this->connection->rollBack();
            return [];
        }

        return $totalVisits;
    }

    /**
     * @param int $id
     * @return array
     */
    public function getTotalCountsById(int $id): array
    {

        $totalVisitsQuery = "SELECT * FROM total_visits WHERE id = :id";
        $statement = $this->connection->prepare($totalVisitsQuery);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}
