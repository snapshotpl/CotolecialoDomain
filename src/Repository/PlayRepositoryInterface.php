<?php

namespace CotolecialoDomain\Repository;

use CotolecialoDomain\Entity\Play;
use CotolecialoDomain\Entity\RadioStation;

interface PlayRepositoryInterface
{
    public function add(Play $play);

    /**
     * @param RadioStation $radioStation
     *
     * @return Play
     */
    public function findLastByRadioStation(RadioStation $radioStation);
}
