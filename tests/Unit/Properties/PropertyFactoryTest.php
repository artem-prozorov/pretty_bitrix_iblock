<?php

namespace PrettyIblock\Tests\Properties;

use Mockery\Adapter\Phpunit\MockeryTestCase;
use PrettyIblock\Properties\{StringProperty, NumberProperty, ListProperty};
use PrettyIblock\Factories\PropertyFactory;

class PropertyFactoryTest extends MockeryTestCase
{
    /**
     * @test
     * @dataProvider getData
     */
    public function factory_returns_correct_type(array $propertyData, string $expected)
    {
        $factory = new PropertyFactory();

        $property = $factory->getSuitableProperty($propertyData);

        $this->assertEquals($expected, get_class($property));
    }

    public function getData(): array 
    {
        return [
            [
                fixture('properties.multiple_string'),
                StringProperty::class,
            ],

            [
                fixture('properties.property', ['PROPERTY_TYPE' => 'N']),
                NumberProperty::class,
            ],

            [
                fixture('properties.list'),
                ListProperty::class,
            ],
        ];
    }
}
