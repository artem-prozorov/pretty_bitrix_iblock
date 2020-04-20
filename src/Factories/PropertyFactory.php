<?php

namespace PrettyIblock\Factories;

use PrettyIblock\Base\AbstractProperty;
use PrettyIblock\Properties\{StringProperty, NumberProperty, ListProperty};
use PrettyIblock\Dictionaries\PropertyTypes;
use InvalidArgumentException;

class PropertyFactory
{
    /**
     * @var		array	$types
     */
    public static array $types = [];

    /**
     * getSuitableProperty.
     *
     * @access	public
     * @param	array	$propertyData	
     * @return	AbstractProperty
     */
    public function getSuitableProperty(array $propertyData): AbstractProperty
    {
        if (! empty($propertyData['USER_TYPE'])) {
            $class = $this->getUserTypeProperty($propertyData['USER_TYPE']);

            return new $class($propertyData);
        }

        switch ($propertyData['PROPERTY_TYPE']) {
            case PropertyTypes::TYPE_NUMBER:
                return new NumberProperty($propertyData);

            case PropertyTypes::TYPE_LIST:
                return new ListProperty($propertyData);

            default:
                return new StringProperty($propertyData);
        }
    }

    /**
     * getUserTypeProperty.
     *
     * @access	protected
     * @param	string	$code	
     * @return	string
     */
    protected function getUserTypeProperty(string $code): string
    {
        if (! in_array($code, array_keys(static::$types))) {
            throw new InvalidArgumentException('Unknown property type ' . $code);
        }

        return static::$types[$code];
    }
}
