<?php

namespace Test\Assignment02\Solution3;

use Assignment02\Solution3\AccessLevel;

class AccessLevelTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_can_be_a_high_access_level()
    {
        $level = AccessLevel::high();
        $this->assertTrue($level->isHigh());
        $this->assertFalse($level->isLow());
    }

    /**
     * @test
     */
    public function it_can_be_a_low_access_level()
    {
        $level = AccessLevel::low();
        $this->assertTrue($level->isLow());
        $this->assertFalse($level->isHigh());
    }
}
