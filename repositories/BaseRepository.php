<?php

namespace app\repositories;

use app\dto\IndexDTO;
use app\dto\ListItemsDTO;
use app\exceptions\ModelByIdNotFoundException;
use \yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Class BaseRepository
 * @package app\repositories
 */
abstract class BaseRepository
{
    /**
     * Get model class name
     *
     * @return string
     */
    abstract protected function getModelClass(): string;

    /**
     * Create model instance and save it to database
     *
     * @param array $data
     * @return ActiveRecord
     */
    public function store(array $data): ActiveRecord
    {
        $class_name = $this->getModelClass();
        /**
         * @var ActiveRecord $model
         */
        $model = new $class_name();
        $model->setAttributes($data);
        $model->save();

        return $model;
    }

    /**
     * Get model instance by id
     *
     * @param int $id
     * @return ActiveRecord
     * @throws ModelByIdNotFoundException
     */
    public function getFirstById(int $id): ActiveRecord
    {
        $class_name = $this->getModelClass();
        $model = $class_name::findOne($id);

        if (!$model) {
            throw new ModelByIdNotFoundException();
        }

        return $model;
    }

    /**
     * Get items from database
     *
     * @param IndexDTO $data
     * @return ListItemsDTO
     */
    public function index(IndexDTO $data): ListItemsDTO
    {
        $class_name = $this->getModelClass();
        /**
         * @var ActiveQuery $query
         */
        $query = $class_name::find();
        $count = $query->count();
        $query = $this->applyPagination($query, $data);

        return new ListItemsDTO(
            $query->all(),
            $count
        );
    }

    /**
     * Apply pagination settings to query
     *
     * @param ActiveQuery $query
     * @param IndexDTO $data
     * @return ActiveQuery
     */
    public function applyPagination(ActiveQuery $query, IndexDTO $data): ActiveQuery
    {
        if ($data->getLimit()) {
            $query = $query->limit($data->getLimit());
        }

        if ($data->getOffset()) {
            $query = $query->offset($data->getOffset());
        }

        return $query;
    }
}