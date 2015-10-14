<?php

namespace CotolecialoDomain\Service;

use CotolecialoDomain\Entity\Artist;
use CotolecialoDomain\Entity\RawSong;
use CotolecialoDomain\Entity\Song;
use CotolecialoDomain\Repository\RawSongRepositoryInterface as RawSongRepository;
use CotolecialoDomain\ValueObject\ArtistNameFactory;
use CotolecialoDomain\ValueObject\SongTitleFactory;

class SongService
{
    protected $rawSongRepository;
    protected $artistNameFactory;
    protected $songTitleFactory;

    /**
     * @param RawSongRepository $rawSongRepository
     * @param ArtistNameFactory $artistNameFactory
     * @param SongTitleFactory $songTitleFactory
     */
    public function __construct(RawSongRepository $rawSongRepository, ArtistNameFactory $artistNameFactory, SongTitleFactory $songTitleFactory)
    {
        $this->rawSongRepository = $rawSongRepository;
        $this->artistNameFactory = $artistNameFactory;
        $this->songTitleFactory = $songTitleFactory;
    }

    /**
     * @param string $title
     * @param string $name
     * @return Song
     */
    public function getSong($title, $name)
    {
        $songTitle = $this->songTitleFactory->create($title);
        $artistName = $this->artistNameFactory->create($name);

        $foundrawSong = $this->rawSongRepository->findByTitleAndArtist($songTitle, $artistName);

        if ($foundrawSong !== null) {
            return $foundrawSong->getSong();
        }

        $artist = new Artist($artistName);
        $song = new Song($songTitle, $artist);

        $rawSong = new RawSong($title, $name, $song);

        $this->rawSongRepository->add($rawSong);

        return $song;
    }
}
