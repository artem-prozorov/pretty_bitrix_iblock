<?php

namespace PrettyIblock\Properties;

use PrettyIblock\Base\AbstractTypedMap;
use PrettyIblock\Base\AbstractProperty;

class PropertiesMap extends AbstractTypedMap
{
    public static string $allowedClass = AbstractProperty::class;

    /**
     * @inheritDoc
     */
    protected function getIndex($item): string
    {
        return $item->getCode();
    }
}
