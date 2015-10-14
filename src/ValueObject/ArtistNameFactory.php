<?php

namespace CotolecialoDomain\ValueObject;

class ArtistNameFactory
{
    /**
     * @param string $name
     * @return ArtistName
     */
    public function create($name)
    {
        // filter input

        return new ArtistName($name);
    }
}
