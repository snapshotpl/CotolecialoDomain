<?php

namespace CotolecialoDomain\Entity;

use Ramsey\Uuid\Uuid;

class Play
{
    private $id;

    /**
     * @var \DateTimeInterface
     */
    private $datetime;

    /**
     * @var Song
     */
    private $song;

    /**
     * @var RadioStation
     */
    private $radioStation;

    public function __construct(Song $song, RadioStation $radioStation, \DateTimeInterface $datetime = null)
    {
        $this->id = Uuid::uuid4();
        $this->song = $song;
        $this->radioStation = $radioStation;
        $this->datetime = $datetime;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDatetime()
    {
        if ($this->datetime === null) {
            $this->datetime = new \DateTimeImmutable('now', $this->radioStation->getTimezone());
        }

        return $this->datetime;
    }

    public function getSong()
    {
        return $this->song;
    }

    public function getRadioStation()
    {
        return $this->radioStation;
    }
}
