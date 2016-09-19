<?php

namespace Test\Assignment02\Solution4;

use Assignment02\Solution3\AccessGranted;
use Assignment02\Solution4\EventEnvelope;

class EventEnvelopeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_has_a_type_revision_and_payload()
    {
        $type = AccessGranted::class;
        $revision = 1;
        $payload = ['key' => 'value'];
        
        $envelope = new EventEnvelope($type, $revision, $payload);
        $this->assertEquals($type, $envelope->className());
        $this->assertEquals($revision, $envelope->revision());
        $this->assertEquals($payload, $envelope->payload());
    }

    /**
     * @test
     */
    public function when_upcasted_the_revision_is_incremented_and_it_has_the_new_payload()
    {
        $revision = 1;
        $payload = ['key' => 'value'];
        $envelope = new EventEnvelope(AccessGranted::class, $revision, $payload);

        $upcastedPayload = ['key' => 'new value'];
        $envelope = $envelope->withUpcastedPayload($upcastedPayload);

        $this->assertEquals($upcastedPayload, $envelope->payload());
        $this->assertEquals(2, $envelope->revision());
    }
}
