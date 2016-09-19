<?php

namespace Assignment01\Solution3;

use Assert\Assertion;

final class GeoLocation
{
    private $latitude;
    private $longitude;

    public function __construct(float $latitude, float $longitude)
    {
        Assertion::greaterOrEqualThan($latitude, -90);
        Assertion::lessOrEqualThan($latitude, 90);
        $this->latitude = $latitude;

        Assertion::greaterOrEqualThan($longitude, -180);
        Assertion::lessOrEqualThan($longitude, 180);
        $this->longitude = $longitude;
    }

    public function latitude() : float
    {
        return $this->latitude;
    }

    public function longitude() : float
    {
        return $this->longitude;
    }
}
