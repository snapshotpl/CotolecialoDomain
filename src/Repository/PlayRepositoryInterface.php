<?php

namespace CotolecialoDomain\Repository;

use CotolecialoDomain\Entity\Play;

interface PlayRepositoryInterface
{
    public function add(Play $play);
}
