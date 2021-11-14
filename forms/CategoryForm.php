<?php

namespace app\forms;

use app\models\Category;
use yii\base\Model;

/**
 * Class CategoryForm
 * @package app\forms
 */
final class CategoryForm extends Model
{
    /**
     * Field "name" on form
     * @var string
     */
    public string $name = '';

    /**
     * Field "Parent category" on form
     * @var int|string|null
     */
    public $parent_id = null;

    /**
     * Get validation rules
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            ['name', 'required'],
            ['name', 'unique', 'targetAttribute' => 'name', 'targetClass' => Category::class],
            ['parent_id', 'integer'],
            ['parent_id', 'exist', 'targetAttribute' => 'id', 'targetClass' => Category::class, 'skipOnEmpty' => true]
        ];
    }

    /**
     * Get customized attribute labels
     *
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'parent_id' => 'Parent category',
        ];
    }
}