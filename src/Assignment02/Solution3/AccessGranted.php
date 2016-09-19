<?php
declare(strict_types=1);

namespace Assignment02\Solution3;

final class AccessGranted
{
    private $userId;
    private $grantedAt;
    private $accessLevel;

    public function __construct(int $userId, \DateTimeImmutable $grantedAt, AccessLevel $accessLevel)
    {
        $this->userId = $userId;
        $this->grantedAt = $grantedAt;
        $this->accessLevel = $accessLevel;
    }

    public static function deserialize($data)
    {
        return new self(
            $data['userId'],
            new \DateTimeImmutable($data['grantedAt']),
            AccessLevel::deserialize($data['accessLevel'])
        );
    }

    public function userId() : int
    {
        return $this->userId;
    }

    public function grantedAt() : \DateTimeImmutable
    {
        return $this->grantedAt;
    }

    public function accessLevel()
    {
        return $this->accessLevel;
    }
}
