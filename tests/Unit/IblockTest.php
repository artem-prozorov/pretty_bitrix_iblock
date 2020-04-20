<?php

namespace PrettyIblock\Tests;

use Mockery\Adapter\Phpunit\MockeryTestCase;
use PrettyIblock\Iblock;
use PrettyIblock\Repositories\IblockRepository;
use PrettyIblock\Properties\{PropertiesMap, StringProperty};

class IblockTest extends MockeryTestCase
{
    public function testIndex()
    {
        $iblockId = 2;

        $repository = $this->createMock(IblockRepository::class);

        $propertyOne = new StringProperty(fixture('properties.property', [
            'ID' => 1,
            'IBLOCK_ID' => $iblockId,
            'PROPERTY_TYPE' => 'S',
            'CODE' => 'first_property',
        ]));

        $propertyTwo = new StringProperty(fixture('properties.property', [
            'ID' => 2,
            'IBLOCK_ID' => $iblockId,
            'PROPERTY_TYPE' => 'S',
            'CODE' => 'second_property',
        ]));

        $expectedMap = new PropertiesMap();
        $expectedMap->push($propertyOne);
        $expectedMap->push($propertyTwo);

        $repository->method('getMapByIblockId')
            ->with($iblockId)
            ->willReturn($expectedMap);

        $manager = new Iblock($repository);

        $map = $manager->getMapByIblockId($iblockId);

        $this->assertSame($expectedMap, $map);
    }
}
