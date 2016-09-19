<?php

namespace Assignment01\Solution3;

final class User
{
    private $location;

    public function trackLocation(GeoLocation $geoLocation)
    {
        $this->location = $geoLocation;
    }

    public function location()
    {
        return $this->location;
    }
}
