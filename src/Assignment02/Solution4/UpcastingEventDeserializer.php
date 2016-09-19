<?php

namespace Assignment02\Solution4;

final class UpcastingEventDeserializer implements EventSerializer
{
    public function deserialize(string $className, string $serializedData)
    {
        $upcasters = [
            new AccessGrantedRevision1to2()
        ];

        $data = json_decode($serializedData, true);
        $envelope = new EventEnvelope($className, 1, $data);

        foreach ($upcasters as $upcaster) {
            $envelope = $upcaster->castUp($envelope);
        }

        return call_user_func(
            [$className, 'deserialize'],
            $envelope->payload()
        );
    }
}
