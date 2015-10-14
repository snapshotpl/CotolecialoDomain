<?php

namespace CotolecialoDomain\Repository;

use CotolecialoDomain\Entity\RawSong;
use CotolecialoDomain\ValueObject\ArtistName;
use CotolecialoDomain\ValueObject\SongTitle;

interface RawSongRepositoryInterface
{
    /**
     * @param SongTitle $title
     * @param ArtistName $artist
     *
     * @return RawSong|null
     */
    public function findByTitleAndArtist(SongTitle $title, ArtistName $artist);

    /**
     * @param RawSong $rawSong
     */
    public function add(RawSong $rawSong);
}
