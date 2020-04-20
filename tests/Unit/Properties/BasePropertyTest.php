<?php

namespace PrettyIblock\Tests\Properties;

use Mockery\Adapter\Phpunit\MockeryTestCase;
use PrettyIblock\Base\AbstractProperty;

class BasePropertyTest extends MockeryTestCase
{
    /**
     * @dataProvider getData
     */
    public function testConstructor(array $propertyData)
    {
        $property = $this->getProperty($propertyData);

        $this->assertEquals($propertyData['ID'], $property->getId());
        $this->assertEquals($propertyData['XML_ID'], $property->getXmlId());
        $this->assertEquals($propertyData['CODE'], $property->getCode());

        if ($propertyData['MULTIPLE'] === 'Y') {
            $this->assertTrue($property->isMultiple());
        } else {
            $this->assertFalse($property->isMultiple());
        }

        if ($propertyData['IS_REQUIRED'] === 'Y') {
            $this->assertTrue($property->isRequired());
        } else {
            $this->assertFalse($property->isRequired());
        }
    }

    protected function getProperty(array $propertyData): AbstractProperty
    {
        return new class($propertyData) extends AbstractProperty {
            public const TYPE = 'F';
        };
    }

    public function getData(): array
    {
        return [
            [
                fixture('properties.property'),
                fixture('properties.multiple_string'),
            ],
        ];
    }
}
