<?php

namespace PrettyIblock\Dictionaries;

use PrettyIblock\Base\AbstractDictionary;

class PropertyTypes extends AbstractDictionary
{
    public const TYPE_STRING = 'S';
    public const TYPE_NUMBER = 'N';
    public const TYPE_LIST = 'L';
    public const TYPE_DIRECTORY = 'directory';

    public static function getItems(): array
    {
        return [
            static::TYPE_STRING => 'Строка',
            static::TYPE_NUMBER => 'Число',
            static::TYPE_LIST => 'Список',
            static::TYPE_DIRECTORY => 'Справочник',
        ];
    }
}
