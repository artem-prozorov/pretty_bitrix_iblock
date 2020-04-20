<?php

namespace PrettyIblock\DataObjects;

use PrettyIblock\Base\AbstractModel;

class Enum extends AbstractModel
{
    protected array $rules = [
        'ID' => 'required|numeric',
        'PROPERTY_ID' => 'required|numeric',
        'VALUE' => 'required|string',
        'DEF' => 'required|in:Y,N',
        'XML_ID' => 'required|string',
        'PROPERTY_CODE' => 'required|string',
    ];
}
