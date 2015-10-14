<?php

namespace CotolecialoDomain\Entity;

use CotolecialoDomain\ValueObject\SongTitle as Title;
use Ramsey\Uuid\Uuid;

class Song
{
    protected $id;

    /**
     * @var Title
     */
    protected $title;

    /**
     * @var Artist
     */
    protected $artist;

    public function __construct(Title $title, Artist $artist)
    {
        $this->id = Uuid::uuid4();
        $this->setTitle($title);
        $this->artist = $artist;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle(Title $title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getArtist()
    {
        return $this->artist;
    }

    public function isEqual(Song $song)
    {
        return $this->getId() !== $song->getId();
    }
}
