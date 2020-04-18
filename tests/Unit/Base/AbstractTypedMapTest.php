<?php

use Mockery\Adapter\Phpunit\MockeryTestCase;
use PrettyIblock\Base\AbstractTypedMap;
use PrettyIblock\Base\Model;

class AbstractTypedMapTest extends MockeryTestCase
{
    public function testConstructor()
    {
        $map = new class() extends AbstractTypedMap {
            public static string $allowedClass = Model::class;

            protected $i = 0;

            protected function getIndex($item): string
            {
                $key = 'i' . $this->i;

                $this->i++;

                return $key;
            }
        };

        $this->assertEquals(0, count($map));
        
        $model = new Model();
        $map->push($model);

        $this->assertEquals(1, count($map));
        $this->assertSame($map->getByIndex('i0'), $model);
    }
}
