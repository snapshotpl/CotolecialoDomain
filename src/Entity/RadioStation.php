<?php

namespace CotolecialoDomain\Entity;

use Ramsey\Uuid\Uuid;

class RadioStation
{
    private $id;

    private $name;

    /**
     * @var \DateTimeZone
     */
    private $timezone;

    public function __construct($name, \DateTimeZone $timezone)
    {
        $this->id = Uuid::uuid4();
        $this->name = $name;
        $this->timezone = $timezone;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @return \DateTimeZone
     */
    public function getTimezone()
    {
        return $this->timezone;
    }
}
