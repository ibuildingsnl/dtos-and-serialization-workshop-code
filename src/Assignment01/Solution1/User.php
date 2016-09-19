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
        Assertion::greaterOrEqualThan($lat, -90);
        Assertion::lessOrEqualThan($lat, 90);

        $this->lat = $lat;
    }

    public function long() : float
    {
        return $this->long;
    }

    public function setLong(float $long)
    {
        Assertion::greaterOrEqualThan($long, -180);
        Assertion::lessOrEqualThan($long, 180);

        $this->long = $long;
    }
}
