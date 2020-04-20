<?php

namespace PrettyIblock\Base;

use PrettyIblock\Traits\HasValidator;
use InvalidArgumentException;

abstract class AbstractModel
{
    use HasValidator;

    /**
     * @var		array	$rules
     */
    protected array $rules = [];

    /**
     * @var		array	$data
     */
    protected array $data;

    public function __construct(array $data)
    {
        $this->validate($data);

        $this->data = $data;
    }

    /**
     * Get from internal array data
     *
     * @access	public
     * @param	string	$code	
     * @return	mixed| null
     */
    public function get(string $code)
    {
        if (empty($this->data[$code])) {
            throw new InvalidArgumentException('No property with such code: ' . $code);
        }

        return $this->data[$code];
    }
}
