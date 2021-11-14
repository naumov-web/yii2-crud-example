<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Category
 * @package app\models
 *
 * @property-read int $id
 * @property string $name
 * @property int $parent_id
 * @property int $level
 */
final class Category extends ActiveRecord
{
    /**
     * Define table name
     *
     * @return string
     */
    public static function tableName(): string
    {
        return 'categories';
    }

    /**
     * Get validation rules
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            ['name', 'safe'],
            ['parent_id', 'safe'],
            ['level', 'safe']
        ];
    }
}