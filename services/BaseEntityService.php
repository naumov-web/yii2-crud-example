<?php

namespace app\services;

use app\exceptions\ModelByIdNotFoundException;
use yii\db\ActiveRecord;

/**
 * Class BaseEntityService
 * @package app\services
 */
abstract class BaseEntityService
{
    /**
     * Get first model by id
     *
     * @param int $id
     * @return ActiveRecord
     * @throws ModelByIdNotFoundException
     */
    public function getFirstById(int $id): ActiveRecord
    {
        return $this->repository->getFirstById($id);
    }
}