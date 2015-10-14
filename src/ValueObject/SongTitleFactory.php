<?php

namespace CotolecialoDomain\ValueObject;

class SongTitleFactory
{
    /**
     * @param string $title
     * @return SongTitle
     */
    public function create($title)
    {
        // filter input

        return new SongTitle($title);
    }
}
