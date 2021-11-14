<?php

namespace app\dto;

/**
 * Class ListItemsDTO
 * @package app\dto
 */
final class ListItemsDTO
{
    /**
     * Count of all items
     * @var int
     */
    private int $count;

    /**
     * Array with models
     * @var array
     */
    private array $models;

    /**
     * ListItemsDTO constructor.
     * @param array $models
     * @param int $count
     */
    public function __construct(array $models, int $count)
    {
        $this->models = $models;
        $this->count = $count;
    }

    /**
     * Get models list
     *
     * @return array
     */
    public function getModels(): array
    {
        return $this->models;
    }

    /**
     * Get count of all items
     *
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }
}