<?php

namespace PrettyIblock\Base;

use PrettyIblock\Traits\HasValidator;

/**
 * Base property class
 *
 * @global
 */
abstract class AbstractProperty
{
    use HasValidator;

    public const TYPE = '';

    /**
     * @var		array	$rules
     */
    protected array $rules = [
        'ID' => 'required|numeric',
        'IBLOCK_ID' => 'required|numeric',
        'NAME' => 'required|string',
        'ACTIVE' => 'required|in:Y,N',
        'CODE' => 'required|string',
        'MULTIPLE' => 'required|in:Y,N',
        'XML_ID' => 'required|string',
    ];

    /**
     * @var		array	$additionalRules
     */
    protected array $additionalRules = [];

    /**
     * @var		array	$data
     */
    protected array $data;

    public function __construct(array $data)
    {
        $this->validate($data, $this->getRules());

        $this->data = $data;
    }

    /**
     * Returns validation rules
     *
     * @access	protected
     * @return	mixed
     */
    protected function getRules(): array
    {
        return array_merge(
            $this->rules, 
            ['PROPERTY_TYPE' => 'required|in:' . static::TYPE],
            $this->additionalRules
        );
    }

    /**
     * Returns the ID of the current property
     *
     * @access	public
     * @return	int
     */
    public function getId(): int
    {
        return $this->data['ID'];
    }

    /**
     * Returns the XML_ID of the current property
     *
     * @access	public
     * @return	string
     */
    public function getXmlId(): string
    {
        return $this->data['XML_ID'];
    }

    /**
     * Returns the CODE of the current Property
     *
     * @access	public
     * @return	string
     */
    public function getCode(): string
    {
        return $this->data['CODE'];
    }

    /**
     * Returns true if the current property is multiple
     *
     * @access	public
     * @return	bool
     */
    public function isMultiple(): bool
    {
        return $this->data['MULTIPLE'] === 'Y';
    }

    /**
     * Returns true if the current property is required
     *
     * @access	public
     * @return	bool
     */
    public function isRequired(): bool
    {
        return $this->data['IS_REQUIRED'] === 'Y';
    }
}
