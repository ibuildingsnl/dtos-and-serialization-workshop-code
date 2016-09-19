<?php
declare(strict_types=1);

namespace Test\Assignment02\Solution3;

use Assignment02\Solution3\AccessGranted;
use Assignment02\Solution3\AccessLevel;

class AccessGrantedTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_gets_constructed_with_a_user_id_and_a_granted_at_timestamp()
    {
        $userId = 1234;
        $grantedAt = new \DateTimeImmutable('2017-09-19T10:00:00+0000');
        $accessLevel = AccessLevel::low();
        $event = new AccessGranted(
            $userId,
            $grantedAt,
            $accessLevel
        );
        
        $this->assertEquals($userId, $event->userId());
        $this->assertEquals($grantedAt, $event->grantedAt());
        $this->assertEquals($accessLevel, $event->accessLevel());
    }

    /**
     * @test
     */
    public function it_deserializes_itself()
    {
        $data = [
            'userId' => 1234,
            'grantedAt' => '2017-09-19T10:00:00+0000',
            'accessLevel' => [
                'level' => 1
            ]
        ];

        $event = AccessGranted::deserialize($data);

        $this->assertInstanceOf(AccessGranted::class, $event);
        /** @var $event AccessGranted */
        $this->assertEquals(1234, $event->userId());
        $this->assertEquals(new \DateTimeImmutable('2017-09-19T10:00:00+0000'), $event->grantedAt());
        $this->assertEquals(AccessLevel::low(), $event->accessLevel());
    }
}
