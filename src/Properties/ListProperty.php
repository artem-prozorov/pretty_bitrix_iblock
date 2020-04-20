<?php

namespace PrettyIblock\Properties;

use PrettyIblock\Base\AbstractProperty;
use PrettyIblock\Dictionaries\PropertyTypes;
use PrettyIblock\Facades\EnumRepository;
use PrettyIblock\DataObjects\{Enum, EnumMap};

class ListProperty extends AbstractProperty
{
    public const TYPE = PropertyTypes::TYPE_LIST;

    /**
     * @var		EnumMap	$enums
     */
    protected EnumMap $enums;

    /**
     * Returns enum options
     *
     * @access	public
     * @return	EnumMap
     */
    public function getEnums(): EnumMap
    {
        if (empty($this->enums)) {
            $this->enums = EnumRepository::getEnums($this->getId());
        }

        return $this->enums;
    }

    /**
     * getEnumById.
     *
     * @access	public
     * @param	int	$id	
     * @return	Enum|null
     */
    public function getEnumById(int $id): ?Enum
    {
        return $this->getEnums()->getByIndex($id);
    }
}
