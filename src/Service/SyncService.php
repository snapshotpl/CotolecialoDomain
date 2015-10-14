<?php

namespace CotolecialoDomain\Service;

use CotolecialoDomain\Entity\Play;
use CotolecialoDomain\Record\SyncRecord;
use CotolecialoDomain\Repository\PlayRepositoryInterface as PlayRepository;

class SyncService
{
    protected $playRepository;
    protected $songService;

    /**
     * @param PlayRepository $playRepository
     * @param SongService $songService
     */
    public function __construct(PlayRepository $playRepository, SongService $songService)
    {
        $this->playRepository = $playRepository;
        $this->songService = $songService;
    }

    /**
     * @param SyncServiceStrategyInterface $syncStrategy
     * @return Play
     */
    public function sync(SyncServiceStrategyInterface $syncStrategy)
    {
        $record = $syncStrategy->sync();

        if (!$record instanceof SyncRecord) {
            return;
        }
        $song = $this->songService->getSong($record->getSongName(), $record->getArtistName());

        $play = new Play($song, $record->getRadioStation(), $record->getDateTime());

        $this->playRepository->add($play);

        return $play;
    }
}
