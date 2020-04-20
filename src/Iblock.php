<?php

namespace PrettyIblock;

use PrettyIblock\Properties\PropertiesMap;
use PrettyIblock\Repositories\IblockRepository;
use InvalidArgumentException;

class Iblock
{
    /**
     * @var		array	$maps
     */
    protected array $maps = [];

    /**
     * @var		IblockRepository	$repository
     */
    protected IblockRepository $repository;

    public function __construct(IblockRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * loadIblockMap.
     *
     * @access	protected
     * @param	int	$iblockId
     * @throws  InvalidArgumentException	
     * @return	void
     */
    protected function loadIblockMap(int $iblockId): void
    {
        $map = $this->repository->getMapByIblockId($iblockId);

        if (empty($map)) {
            throw new InvalidArgumentException('Отсутствует инфоблок с указанным идентификатором');
        }

        $this->maps[$iblockId] = $map;
    }

    /**
     * getMapByIblockId.
     *
     * @access	public
     * @param	int	$iblockId	
     * @return	PropertiesMap
     */
    public function getMapByIblockId(int $iblockId): PropertiesMap
    {
        if (empty($this->maps[$iblockId])) {
            $this->loadIblockMap($iblockId);
        }

        return $this->maps[$iblockId];
    }
}
