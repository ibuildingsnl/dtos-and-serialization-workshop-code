<?php

namespace Test\Assignment01\Solution1;

use Assignment01\Solution1\User;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\SerializerBuilder;

class UserDeserializationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_deserializes_lat_long_but_accepts_invalid_values()
    {
        $serializedData = <<<EOD
{
    "lat": 1000,
    "long": 2000
}
EOD;

        $serializer = SerializerBuilder::create()
            ->setDeserializationVisitor('json', new JsonDeserializationVisitor(new IdenticalPropertyNamingStrategy()))
            ->addDefaultHandlers()
            ->build();

        /** @var $deserializedObject User */
        $deserializedObject = $serializer->deserialize($serializedData, User::class, 'json');

        // We shouldn't be happy that this is the case, but it is, which is also the point we are illustrating here:
        $this->assertEquals(1000, $deserializedObject->lat());
        $this->assertEquals(2000, $deserializedObject->long());
    }
}
