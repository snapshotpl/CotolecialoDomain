<?php

namespace CotolecialoDomain\ValueObject;

use CotolecialoDomain\Exception\InvalidArgumentException;

class ArtistName
{
    private $name;

    public function __construct($name)
    {
        $this->setName($name);
    }

    public function getName()
    {
        return $this->name;
    }

    public function __toString()
    {
        return $this->name;
    }

    private function setName($name)
    {
        if (empty($name)) {
            throw new InvalidArgumentException('Artist name is reqired');
        }
        if (!is_string($name)) {
            throw new InvalidArgumentException('Artist name must be a string');
        }
        $this->name = $name;
    }
}
