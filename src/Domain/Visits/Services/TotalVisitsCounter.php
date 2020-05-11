<?php

namespace Domain\Visits\Services;

use Domain\Visits\Repository\TotalVisitsRepository;

class TotalVisitsCounter
{
    /** @var TotalVisitsRepository  */
    private TotalVisitsRepository $repository;

    /**
     * @param TotalVisitsRepository $totalVisitsRepository
     */
    public function __construct(TotalVisitsRepository $totalVisitsRepository)
    {
        $this->repository = $totalVisitsRepository;
    }

    /**
     * @param int $id
     * @return array
     */
    public function updateCountAndGetLastValueById(int $id): array
    {
        return $this->repository->updateCountAndGetLastValueById($id);
    }

    /**
     * @param int $id
     * @return array
     */
    public function getTotalCountsById(int $id): array
    {
        return $this->repository->getTotalCountsById($id);
    }
}
