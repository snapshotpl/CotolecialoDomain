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
        $radioStation = $record->getRadioStation();
        $song = $this->songService->getSong($record->getSongName(), $record->getArtistName());

        $lastPlay = $this->playRepository->findLastByRadioStation($radioStation);

        if ($lastPlay !== null && $lastPlay->getSong()->isEqual($song)) {
            return $lastPlay;
        }

        $play = new Play($song, $radioStation, $record->getDateTime());

        $this->playRepository->add($play);

        return $play;
    }
}
