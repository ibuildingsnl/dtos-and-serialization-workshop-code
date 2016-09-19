<?php

namespace Assignment02\Solution4;

use Assignment02\Solution3\AccessGranted;

final class AccessGrantedRevision1to2 implements Upcaster
{
    public function castUp(EventEnvelope $envelope): EventEnvelope
    {
        if ($envelope->className() !== AccessGranted::class) {
            return $envelope;
        }

        if ($envelope->revision() !== 1) {
            return $envelope;
        }

        $newPayload = $envelope->payload();
        $newPayload['accessLevel'] = ['level' => 1];

        return $envelope->withUpcastedPayload($newPayload);
    }
}
