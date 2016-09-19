<?php

namespace Test\Assignment02\Solution4;

use Assignment02\Solution3\AccessGranted;
use Assignment02\Solution4\AccessGrantedRevision1to2;
use Assignment02\Solution4\EventEnvelope;

class AccessGrantedRevision1to2Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_adds_the_access_level_key()
    {
        $envelope = new EventEnvelope(AccessGranted::class, 1, []);
        $upcaster = new AccessGrantedRevision1to2();

        $result = $upcaster->castUp($envelope);

        $this->assertEquals(
            ['accessLevel' => ['level' => 1]],
            $result->payload()
        );
        $this->assertEquals(2, $result->revision());
    }
}
