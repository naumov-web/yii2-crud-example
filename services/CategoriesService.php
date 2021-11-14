<?php

namespace app\services;

use app\dto\IndexDTO;
use app\dto\ListItemsDTO;
use app\models\Category;
use app\repositories\CategoriesRepository;
use app\exceptions\ModelByIdNotFoundException;

/**
 * Class CategoriesService
 * @package app\services
 */
final class CategoriesService extends BaseEntityService
{
    /**
     * Categories repository instance
     * @var CategoriesRepository
     */
    protected CategoriesRepository $repository;

    /**
     * Categories service constructor
     * @param CategoriesRepository $repository
     */
    public function __construct(CategoriesRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create category instance
     *
     * @param array $data
     * @return Category
     * @throws ModelByIdNotFoundException
     */
    public function create(array $data): Category
    {
        if (($data['parent_id'] ?? null) && !empty($data['parent_id'])) {
            /**
             * @var Category $parent
             */
            $parent = $this->repository->getFirstById($data['parent_id']);

            $data['level'] = $parent->level + 1;
        } else {
            $data['level'] = 1;
        }

        /**
         * @var Category $model
         */
        $model = $this->repository->store($data);

        return $model;
    }

    public function index(array $data = []): ListItemsDTO
    {
        return $this->repository->index(
            (new IndexDTO())->fill($data)
        );
    }
}