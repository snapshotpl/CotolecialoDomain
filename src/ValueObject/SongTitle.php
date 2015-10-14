<?php

namespace CotolecialoDomain\ValueObject;

use CotolecialoDomain\Exception\InvalidArgumentException;

final class SongTitle
{
    private $title;

    public function __construct($title)
    {
        $this->setTitle($title);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function __toString()
    {
        return $this->title;
    }

    private function setTitle($title)
    {
        if (empty($title)) {
            throw new InvalidArgumentException('Song title is required');
        }
        if (!is_string($title)) {
            throw new InvalidArgumentException('Song title must be a string');
        }
        $this->title = $title;
    }
}
