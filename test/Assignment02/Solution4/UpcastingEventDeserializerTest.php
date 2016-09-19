<?php

namespace Test\Assignment02\Solution4;

use Assignment02\Solution3\AccessGranted;
use Assignment02\Solution3\AccessLevel;
use Assignment02\Solution4\UpcastingEventDeserializer;

class UpcastingEventDeserializerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_upcasts_our_access_granted_event_correctly()
    {
        $jsonData = <<<EOD
{
    "userId": 1234,
    "grantedAt": "2017-09-19T10:00:00+0000"
}
EOD;

        $serializer = new UpcastingEventDeserializer();
        $event = $serializer->deserialize(
            AccessGranted::class,
            $jsonData
        );

        $this->assertInstanceOf(AccessGranted::class, $event);
        /** @var $event AccessGranted */
        $this->assertEquals(1234, $event->userId());
        $this->assertEquals(new \DateTimeImmutable('2017-09-19T10:00:00+0000'), $event->grantedAt());
        $this->assertEquals(AccessLevel::low(), $event->accessLevel());
    }
}
