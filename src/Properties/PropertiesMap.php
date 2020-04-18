<?php

namespace PrettyIblock\Properties;

class PropertiesMap
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
