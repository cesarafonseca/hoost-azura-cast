<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class RequestableSongsDto
{
    /**
     * @var RequestableSongDto[]
     */
    protected $requestableSongs;

    /**
     * @param RequestableSongDto[] $requestableSongs
     */
    public function __construct(array $requestableSongs) {
        $this->setRequestableSongs($requestableSongs);
    }

    /**
     * @return RequestableSongDto[]
     */
    public function getRequestableSongs(): array
    {
        return $this->requestableSongs;
    }

    /**
     * @param RequestableSongDto[] $requestableSongs
     *
     * @return RequestableSongsDto
     */
    public function setRequestableSongs(array $requestableSongs): RequestableSongsDto
    {
        $this->requestableSongs = $requestableSongs;

        return $this;
    }

    /**
     * @param mixed[] $requestableSongsData
     *
     * @return RequestableSongsDto
     */
    public static function fromArray(array $requestableSongsData): self
    {
        $requestableSongs = [];
        foreach ($requestableSongsData as $requestableSongData) {
            $requestableSongs[] = RequestableSongDto::fromArray($requestableSongData);
        }

        return new self(
            $requestableSongs
        );
    }
}
