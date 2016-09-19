<?php

namespace Test\Assignment01\Solution3;

use Illuminate\Validation\Validator;
use Symfony\Component\Translation\Translator;

class FiddleWithLaravelValidationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function validator_generates_a_nice_list_of_errors()
    {
        $data = [
            'lat' => -100,
            'long' => 200
        ];

        $translator = new Translator('nl_NL');
        $validator = new Validator(
            $translator,
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
        $this->assertTrue($validator->fails());

        $this->assertEquals(
            [
                'Latitude should not be less than -90',
                'Longitude should be less than 180'
            ],
            $validator->messages()->all()
        );
    }
}
