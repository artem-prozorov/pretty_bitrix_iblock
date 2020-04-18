<?php

namespace PrettyIblock\Base;

use Iterator;
use Countable;
use Webmozart\Assert\Assert;
use InvalidArgumentException;

abstract class AbstractTypedMap implements Iterator, Countable
{
    /**
     * @var		string	$allowedClass
     */
    public static string $allowedClass;

    /**
     * @var		integer	$position
     */
    protected int $position;

    /**
     * @var		array	$data
     */
    protected array $data = [];

    /**
     * @var		array	$map
     */
    protected array $map = [];

    public function __construct(array $data = [])
    {
        if (empty(static::$allowedClass) || ! class_exists(static::$allowedClass)) {
            throw new InvalidArgumentException('Class ' . static::$allowedClass . 'not does not exist');
        }

        $this->position = 0;

        foreach ($data as $item) {
            $this->push($item);
        }
    }

    protected function checkType($item)
    {
        Assert::isInstanceOf($item, static::$allowedClass);
    }

    /**
     * getIndex.
     *
     * @access	protected
     * @param	mixed	$item	
     * @return	string
     */
    abstract protected function getIndex($item): string;

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        $currentCode = $this->map[$this->position];

        return $this->data[$currentCode] ?? null;
    }

    public function key()
    {
        return $this->map[$this->position];
    }

    public function next()
    {
        ++$this->position;
    }

    public function valid()
    {
        if (empty($this->map[$this->position])) {
            return false;
        }

        $currentCode = $this->map[$this->position];

        return isset($this->data[$currentCode]);
    }

    /**
     * getByIndex.
     *
     * @access	public
     * @param	string	$index	
     * @return	mixed
     */
    public function getByIndex(string $index)
    {
        if (empty($this->data[$index])) {
            return null;
        }

        return $this->data[$index] ?? null;
    }

    public function push($item)
    {
        $this->checkType($item);

        $index = $this->getIndex($item);

        $this->map[] = $index;

        $this->data[$index] = $item;
    }

    public function count(): int
    {
        return count($this->data);
    }
}
