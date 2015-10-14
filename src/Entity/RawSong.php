<?php

namespace CotolecialoDomain\Entity;

use Ramsey\Uuid\Uuid;

class RawSong
{
    protected $id;

    protected $songTitle;

    protected $artistName;

    /**
     * @var Song
     */
    protected $song;

    public function __construct($songTitle, $artistName, Song $song)
    {
        $this->id = Uuid::uuid4();
        $this->songTitle = (string) $songTitle;
        $this->artistName = (string) $artistName;
        $this->song = $song;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSongTitle()
    {
        return $this->songTitle;
    }

    public function getSong()
    {
        return $this->song;
    }

    public function getArtistName()
    {
        return $this->artistName;
    }
}
