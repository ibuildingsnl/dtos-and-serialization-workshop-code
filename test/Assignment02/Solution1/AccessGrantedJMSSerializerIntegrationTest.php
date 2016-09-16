<?php
declare(strict_types=1);

namespace Test\Assignment02\Solution1;

use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\SerializerBuilder;
use Assignment02\Solution1\AccessGranted;

class AccessGrantedJMSSerializerIntegrationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_deserializes_access_granted()
    {
        $serializedData = <<<EOD
{
    "userId": 1234,
    "grantedAt": "2017-09-19T10:00:00+0000"
}
EOD;
        $serializer = SerializerBuilder::create()
            ->setDeserializationVisitor('json', new JsonDeserializationVisitor(new IdenticalPropertyNamingStrategy()))
            ->addDefaultHandlers()
            ->build();
        $deserializedObject = $serializer->deserialize($serializedData, AccessGranted::class, 'json');
        $this->assertEquals(
            new AccessGranted(
                1234,
                new \DateTime('2017-09-19T10:00:00+0000')
            ),
            $deserializedObject
        );
    }
}
