<?php

namespace CotolecialoDomain\Entity;

use CotolecialoDomain\ValueObject\ArtistName;
use Ramsey\Uuid\Uuid;

class Artist
{
    private $id;

    private $name;

    public function __construct(ArtistName $name)
    {
        $this->id = Uuid::uuid4();
        $this->setName($name);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName(ArtistName $name)
    {
        $this->name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function __toString()
    {
        return $this->name;
    }
}
