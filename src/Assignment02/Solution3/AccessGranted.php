<?php
declare(strict_types=1);

namespace Assignment02\Solution3;

final class AccessGranted
{
    private $userId;
    private $grantedAt;

    public function __construct(int $userId, \DateTimeImmutable $grantedAt)
    {
        $this->userId = $userId;
        $this->grantedAt = $grantedAt;
    }

    public function userId() : int
    {
        return $this->userId;
    }

    public function grantedAt() : \DateTimeImmutable
    {
        return $this->grantedAt;
    }
}
