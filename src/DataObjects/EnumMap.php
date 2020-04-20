<?php

namespace PrettyIblock\DataObjects;

use PrettyIblock\Base\AbstractTypedMap;
use PrettyIblock\Base\AbstractProperty;

class EnumMap extends AbstractTypedMap
{
    public static string $allowedClass = Enum::class;

    /**
     * @inheritDoc
     */
    protected function getIndex($item): string
    {
        return $item->get('ID');
    }
}
