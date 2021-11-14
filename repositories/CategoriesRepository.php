<?php

namespace app\repositories;

use app\models\Category;

/**
 * Class CategoriesRepository
 * @package app\repositories
 */
final class CategoriesRepository extends BaseRepository
{

    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return Category::class;
    }
}