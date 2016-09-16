<?php

namespace Assignment02\Solution4;

interface EventSerializer
{
    public function deserialize(string $className, string $serializedData);
}
