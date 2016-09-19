<?php

namespace Test\Assignment03;

use Test\Assignment03\Fixtures\ModelClass;

class ClosureBindingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_is_possible_to_bind_a_closure_to_an_object_and_access_private_properties()
    {
        $serializer = function() {
            /** @var $this ModelClass */
            return [
                'privateProperty' => $this->privateProperty
            ];
        };

        $modelObject = new ModelClass();
        $data = $serializer->call($modelObject);

        $this->assertEquals(['privateProperty' => 'private value'], $data);
    }
}
