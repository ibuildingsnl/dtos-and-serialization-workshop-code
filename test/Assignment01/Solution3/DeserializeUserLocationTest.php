<?php

namespace Test\Assignment01\Solution3;

use Assignment01\Solution3\User;
use Assignment01\Solution3\GeoLocation;
use Illuminate\Validation\Validator;
use Symfony\Component\Translation\Translator;

final class DeserializeUserLocationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_decodes_json_data_validates_and_tracks_the_user_s_location()
    {
        $serializedData = <<<EOD
{
    "lat": 50,
    "long": 20
}
EOD;

        $data = json_decode($serializedData, true);

        $validator = new Validator(
            new Translator('nl_NL'),
            $data,
            [
                'lat' => ['required', 'numeric', 'min:-90', 'max:90'],
                'long' => ['required', 'numeric', 'min:-180', 'max:180']
            ],
            [
                'lat.min' => 'Latitude should not be less than -90',
                'long.max' => 'Longitude should be less than 180',
            ]
        );

        if ($validator->fails()) {
            $this->fail('Should not happen');
        }

        $user = new User();
        $newLocation = new GeoLocation($data['lat'], $data['long']);
        $user->trackLocation($newLocation);

        $this->assertEquals($newLocation, $user->location());
    }
}
