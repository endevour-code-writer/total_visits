<?php

namespace Actions;

use Domain\Visits\Entities\TotalVisits;
use Domain\Visits\Services\TotalVisitsCounter;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class IndexAction
{
    private const TOTAL_VISITS_ID = 1;

    /** @var TotalVisitsCounter $totalVisitsCounter*/
    private TotalVisitsCounter $totalVisitsCounter;

    /**
     * IndexAction constructor.
     * @param TotalVisitsCounter $totalVisitsCounter
     */
    public function __construct(TotalVisitsCounter $totalVisitsCounter)
    {
        $this->totalVisitsCounter = $totalVisitsCounter;
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        /** @var TotalVisits $totalVisits */
        $totalVisits = $this->totalVisitsCounter->updateCountAndGetLastValueById(self::TOTAL_VISITS_ID);

        if (! (bool) $totalVisits) {
            $totalVisits = $this->totalVisitsCounter->getTotalCountsById(self::TOTAL_VISITS_ID);
        }


        $response->getBody()->write("This page has been visited by {$totalVisits['visits']} people");

        return $response;
    }
}