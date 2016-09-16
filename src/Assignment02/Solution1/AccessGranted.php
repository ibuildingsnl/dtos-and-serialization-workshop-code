<?php
declare(strict_types = 1);

namespace Assignment02\Solution1;

use JMS\Serializer\Annotation as Serializer;

final class AccessGranted
{
    /**
     * @Serializer\Type("integer")
     */
    private $userId;

    /**
     * @Serializer\Type("DateTime")
     */
    private $grantedAt;

    public function __construct(int $userId, \DateTimeInterface $grantedAt)
    {
        $this->userId = $userId;
        $this->grantedAt = $grantedAt;
    }
}
