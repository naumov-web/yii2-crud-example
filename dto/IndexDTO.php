<?php

namespace app\dto;

/**
 * Class IndexDTO
 * @package app\dto
 */
final class IndexDTO
{

    /**
     * Limit value
     * @var int|null
     */
    private ?int $limit = null;

    /**
     * Offset value
     * @var int|null
     */
    private ?int $offset = null;

    /**
     * Sort by column
     * @var string|null
     */
    private ?string $sort_by = null;

    /**
     * Sort direction value
     * @var string|null
     */
    private ?string $sort_direction = null;

    /**
     * Mass assignment of object fields
     *
     * @param array $fields
     * @return IndexDTO
     */
    public function fill(array $fields): self
    {
        foreach ($fields as $field => $value) {
            $this->{$field} = $value;
        }

        return $this;
    }

    /**
     * Get offset value
     *
     * @return int|null
     */
    public function getOffset(): ?int
    {
        return $this->offset;
    }

    /**
     * Get limit value
     *
     * @return int|null
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Get sort direction value
     *
     * @return string|null
     */
    public function getSortDirection(): ?string
    {
        return $this->sort_direction;
    }

    /**
     * Get sort column
     *
     * @return string|null
     */
    public function getSortBy(): ?string
    {
        return $this->sort_by;
    }
}