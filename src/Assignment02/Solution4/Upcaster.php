<?php
declare(strict_types=1);

namespace Assignment02\Solution4;

interface Upcaster
{
    /**
     * Modify the provided data
     *
     * @param EventEnvelope $envelope
     * @return EventEnvelope
     */
    public function castUp(EventEnvelope $envelope): EventEnvelope;
}
