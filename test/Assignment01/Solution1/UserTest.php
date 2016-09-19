<?php

namespace Test\Assignment01\Solution1;

use Assignment01\Solution1\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider latitudes
     * @test
     * @param int $tryLatitude
     * @param bool $expectedToBeValid
     */
    public function it_accepts_only_valid_latitudes(int $tryLatitude, bool $expectedToBeValid)
    {
        try {
            $user = new User();
            $user->setLat($tryLatitude);

            if (!$expectedToBeValid) {
                $this->fail(sprintf('%d was expected to be invalid', $tryLatitude));
            }
        } catch (\InvalidArgumentException $exception) {
            if ($expectedToBeValid) {
                $this->fail(sprintf('%d was not expected to be invalid', $tryLatitude));
            }
        }
    }

    public function latitudes()
    {
        return [
            [90, true],
            [91, false],
            [-90, true],
            [-91, false],
        ];
    }    
    
    /**
     * @dataProvider longitudes
     * @test
     * @param int $tryLongitude
     * @param bool $expectedToBeValid
     */
    public function it_accepts_only_valid_longitudes(int $tryLongitude, bool $expectedToBeValid)
    {
        try {
            $user = new User();
            $user->setLong($tryLongitude);

            if (!$expectedToBeValid) {
                $this->fail(sprintf('%d was expected to be invalid', $tryLongitude));
            }
        } catch (\InvalidArgumentException $exception) {
            if ($expectedToBeValid) {
                $this->fail(sprintf('%d was not expected to be invalid', $tryLongitude));
            }
        }
    }

    public function longitudes()
    {
        return [
            [180, true],
            [181, false],
            [-180, true],
            [-181, false],
        ];
    }
}
