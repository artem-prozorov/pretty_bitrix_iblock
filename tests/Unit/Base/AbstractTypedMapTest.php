<?php

namespace PrettyIblock\Tests\Base;

use Mockery\Adapter\Phpunit\MockeryTestCase;
use PrettyIblock\Base\AbstractTypedMap;
use PrettyIblock\Properties\StringProperty;

class AbstractTypedMapTest extends MockeryTestCase
{
    public function testConstructor()
    {
        $map = new class() extends AbstractTypedMap {
            public static string $allowedClass = StringProperty::class;

            protected $i = 0;

            protected function getIndex($item): string
            {
                $key = 'i' . $this->i;

                $this->i++;

                return $key;
            }
        };

        $this->assertEquals(0, count($map));

        $property = new StringProperty(fixture('properties.property', ['PROPERTY_TYPE' => 'S']));
        $map->push($property);

        $this->assertEquals(1, count($map));
        $this->assertSame($map->getByIndex('i0'), $property);
    }
}
