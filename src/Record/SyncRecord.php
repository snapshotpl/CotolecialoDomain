<?php

namespace CotolecialoDomain\Record;

use CotolecialoDomain\Entity\RadioStation;

class SyncRecord
{
    protected $artistName;

    protected $songName;

    /**
     * @var \DateTimeInterface
     */
    protected $dateTime;

    /**
     *
     * @var RadioStation
     */
    protected $radioStation;

    public function getArtistName()
    {
        return $this->artistName;
    }

    public function getSongName()
    {
        return $this->songName;
    }

    public function getDateTime()
    {
        return $this->dateTime;
    }

    public function getRadioStation()
    {
        return $this->radioStation;
    }

    public function setRadioStation(RadioStation $radioStation)
    {
        $this->radioStation = $radioStation;
    }

    public function setArtistName($artistName)
    {
        $this->artistName = (string) $artistName;
    }

    public function setSongName($songName)
    {
        $this->songName = (string) $songName;
    }

    public function setDateTime(\DateTimeInterface $dateTime)
    {
        $this->dateTime = $dateTime;
    }
}
