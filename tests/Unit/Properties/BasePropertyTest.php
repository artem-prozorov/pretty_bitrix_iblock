<?php

use Mockery\Adapter\Phpunit\MockeryTestCase;
use PrettyIblock\Properties\AbstractProperty;

class BasePropertyTest extends MockeryTestCase
{
    /**
     * @dataProvider getData
     */
    public function testConstructor(array $propertyData)
    {
        $property = new class($propertyData) extends AbstractProperty {
            public const TYPE = 'F';
        };

        $this->assertEquals($propertyData['ID'], $property->getId());
        $this->assertEquals($propertyData['XML_ID'], $property->getXmlId());
        $this->assertEquals($propertyData['CODE'], $property->getCode());
    }

    public function getData(): array
    {
        return [
            [
                [
                    'ID' => '13', 
                    '~ID' => '13', 
                    'TIMESTAMP_X' => '2020-04-03 13:26:15', 
                    '~TIMESTAMP_X' => '2020-04-03 13:26:15', 
                    'IBLOCK_ID' => '2', '~IBLOCK_ID' => '2', 
                    'NAME' => 'Картинки галереи', 
                    '~NAME' => 'Картинки галереи', 
                    'ACTIVE' => 'Y', 
                    '~ACTIVE' => 'Y', 
                    'SORT' => '500', 
                    '~SORT' => '500', 
                    'CODE' => 'MORE_PHOTO', 
                    '~CODE' => 'MORE_PHOTO', 
                    'DEFAULT_VALUE' => '', 
                    '~DEFAULT_VALUE' => '', 
                    'PROPERTY_TYPE' => 'F', 
                    '~PROPERTY_TYPE' => 'F', 
                    'ROW_COUNT' => '1', 
                    '~ROW_COUNT' => '1', 
                    'COL_COUNT' => '30', 
                    '~COL_COUNT' => '30', 
                    'LIST_TYPE' => 'L', 
                    '~LIST_TYPE' => 'L', 
                    'MULTIPLE' => 'Y', 
                    '~MULTIPLE' => 'Y', 
                    'XML_ID' => 'MORE_PHOTO', 
                    '~XML_ID' => 'MORE_PHOTO', 
                    'FILE_TYPE' => 'jpg, gif, bmp, png, jpeg', 
                    '~FILE_TYPE' => 'jpg, gif, bmp, png, jpeg', 
                    'MULTIPLE_CNT' => '5', 
                    '~MULTIPLE_CNT' => '5', 
                    'TMP_ID' => NULL, 
                    '~TMP_ID' => NULL, 
                    'LINK_IBLOCK_ID' => '0', 
                    '~LINK_IBLOCK_ID' => '0', 
                    'WITH_DESCRIPTION' => 'Y', 
                    '~WITH_DESCRIPTION' => 'Y', 
                    'SEARCHABLE' => 'N', 
                    '~SEARCHABLE' => 'N', 
                    'FILTRABLE' => 'N', 
                    '~FILTRABLE' => 'N', 
                    'IS_REQUIRED' => 'N', '~IS_REQUIRED' => 'N', 
                    'VERSION' => '1', 
                    '~VERSION' => '1', 
                    'USER_TYPE' => NULL, 
                    '~USER_TYPE' => NULL, 
                    'USER_TYPE_SETTINGS' => NULL, 
                    '~USER_TYPE_SETTINGS' => NULL, 
                    'HINT' => '', 
                    '~HINT' => '',
                ],
            ],
        ];
    }
}
