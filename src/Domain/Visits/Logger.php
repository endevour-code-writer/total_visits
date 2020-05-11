<?php

namespace Domain\Visits;

use PDO;

class Logger
{
    /** @var PDO */
    private PDO $connection;

    /**
     * Logger constructor.
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param string $error
     * @return bool
     */
    public function log(string $error): bool
    {
        $query = "INSERT INTO total_visits_logs
                  (message, created_at)
                  VALUES ($error, UNIX_TIMESTAMP())"
        ;

        $this->connection->prepare($query)->execute();
    }
}