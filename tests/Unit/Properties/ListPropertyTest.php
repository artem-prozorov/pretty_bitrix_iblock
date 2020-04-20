<?php

namespace PrettyIblock\Tests\Properties;

use Mockery\Adapter\Phpunit\MockeryTestCase;
use PrettyIblock\Properties\ListProperty;
use PrettyIblock\DataObjects\{Enum, EnumMap};
use PrettyIblock\Facades\EnumRepository;

class ListPropertyTest extends MockeryTestCase
{
    /**
     * @dataProvider getData
     */
    public function testConstructor(array $propertyData, array $enumData)
    {
        $enums = new EnumMap();

        foreach ($enumData as $rawEnum) {
            $enums->push(new Enum($rawEnum));
        }

        EnumRepository::shouldReceive('getEnums')
            ->once()
            ->andReturn($enums);

        $list = new ListProperty($propertyData);

        $this->assertSame($enums, $list->getEnums());

        $this->assertEmpty($list->getEnumById(1));

        foreach ($enumData as $rawEnum) {
            $enum = $list->getEnumById($rawEnum['ID']);

            $this->assertEquals($rawEnum['ID'], $enum->get('ID'));
        }
    }

    public function getData(): array
    {
        return [
            [
                fixture('properties.list'),
                [
                    fixture('dataobjects.enum', ['ID' => '3', 'VALUE' => 'Value1']),
                    fixture('dataobjects.enum', ['ID' => '4', 'VALUE' => 'Value2']),
                ],
            ],
        ];
    }
}
