<?php
declare(strict_types=1);

namespace Assignment02\Solution4;

final class EventEnvelope
{
    private $className;
    private $revision;
    private $payload;

    public function __construct(string $className, int $revision, array $payload)
    {
        $this->className = $className;
        $this->revision = $revision;
        $this->payload = $payload;
    }

    public function withUpcastedPayload(array $upcastedPayload)
    {
        $copy = clone $this;
        $copy->revision++;
        $copy->payload = $upcastedPayload;

        return $copy;
    }

    public function className() : string
    {
        return $this->className;
    }

    public function revision() : int
    {
        return $this->revision;
    }

    public function payload() : array
    {
        return $this->payload;
    }
}
