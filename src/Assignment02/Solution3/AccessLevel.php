<?php
declare(strict_types=1);

namespace Assignment02\Solution3;

final class AccessLevel
{
    const HIGH = 2;
    const LOW = 1;

    private $level;

    private function __construct(int $level)
    {
        $this->level = $level;
    }

    public static function high() : AccessLevel
    {
        return new AccessLevel(self::HIGH);
    }

    public static function low() : AccessLevel
    {
        return new AccessLevel(self::LOW);
    }

    public function isHigh() : bool
    {
        return $this->level == self::HIGH;
    }

    public function isLow() : bool
    {
        return $this->level == self::LOW;
    }
}
