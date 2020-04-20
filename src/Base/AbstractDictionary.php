<?php

namespace PrettyIblock\Base;

abstract class AbstractDictionary
{
    abstract public static function getItems(): array;

    /**
     * getItem.
     *
     * @access	public static
     * @param	string	$code	
     * @return	string
     */
    public static function getItem(string $code): string
    {
        if (! array_key_exists($code, static::getItems())) {
            throw new \InvalidArgumentException('Запрошенный элемент '.$code.' отсутствует в словаре '.__CLASS__);
        }

        return static::getItems()[$code];
    }

    /**
     * getCodes.
     *
     * @access	public static
     * @return	array
     */
    public static function getCodes(): array
    {
        return array_keys(static::getItems());
    }

    /**
     * getValues.
     *
     * @access	public static
     * @return	array
     */
    public static function getValues(): array
    {
        return array_values(static::getItems());
    }

    /**
     * implodeCodes.
     *
     * @access	public static
     * @param	string	$delimiter	Default: ','
     * @return	string
     */
    public static function implodeCodes(string $delimiter = ','): string
    {
        return implode($delimiter, array_keys(static::getItems()));
    }
}