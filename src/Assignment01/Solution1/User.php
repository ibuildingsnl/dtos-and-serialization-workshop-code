<?php

namespace Assignment01\Solution1;

use Assert\Assertion;
use JMS\Serializer\Annotation as Serializer;

final class User
{
    /**
     * Normally we would rely on the JMSSerializer Doctrine integration, which loads an entity from the database and
     * uses it as the base object for the JMSSerializer.
     */
    private $id;

    /**
     * @Serializer\Type("float")
     */
    private $lat;

    /**
     * @Serializer\Type("float")
     */
    private $long;

    public function lat() : float
    {
        return $this->lat;
    }

    public function setLat(float $lat)
    {
        Assertion::range($lat, -90, 90);

        $this->lat = $lat;
    }

    public function long() : float
    {
        return $this->long;
    }

    public function setLong(float $long)
    {
        Assertion::range($long, -180, 180);

        $this->long = $long;
    }
}
