<?php

namespace PrettyIblock\Facades;

use PrettyIblock\Base\AbstractFacade;
use PrettyIblock\Repositories\EnumRepository as BaseEnumRepository;

class EnumRepository extends AbstractFacade
{
    /**
     * @inheritDoc
     */
    protected static function getFacadeAccessor()
    {
        return BaseEnumRepository::class;
    }
}
