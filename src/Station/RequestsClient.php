<?php
declare(strict_types=1);

namespace AzuraCast\Api\Station;

use AzuraCast\Api\AbstractStationClient;
use AzuraCast\Api\Dto;
use AzuraCast\Api\Exception;

class RequestsClient extends AbstractStationClient
{
    /**
     * @return Dto\RequestableSongsDto
     *
     * @throws Exception\AccessDeniedException
     * @throws Exception\ClientRequestException
     */
    public function list(): Dto\RequestableSongsDto
    {
        $requestableSongsData = $this->request('GET', sprintf(
            'station/%s/requests',
            $this->stationId
        ));

        return Dto\RequestableSongsDto::fromArray($requestableSongsData);
    }

    /**
     * @param string $uniqueId
     *
     * @return void
     *
     * @throws Exception\ClientRequestException
     * @throws Exception\RequestsDisabledException
     */
    public function submit(string $uniqueId): void
    {
        try {
            $this->request('POST', sprintf(
                'station/%s/request/%s',
                $this->stationId,
                $uniqueId
            ));
        } catch (Exception\AccessDeniedException $e) {
            throw new Exception\RequestsDisabledException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
