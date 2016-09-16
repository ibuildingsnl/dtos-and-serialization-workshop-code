<?php
declare(strict_types=1);

namespace Test\Assignment02\Solution3;

use Assignment02\Solution3\AccessGranted;

class AccessGrantedTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_gets_constructed_with_a_user_id_and_a_granted_at_timestamp()
    {
        $userId = 1234;
        $grantedAt = new \DateTimeImmutable('2017-09-19T10:00:00+0000');
        $event = new AccessGranted($userId, $grantedAt);
        
        $this->assertEquals($userId, $event->userId());
        $this->assertEquals($grantedAt, $event->grantedAt());
    }
}
