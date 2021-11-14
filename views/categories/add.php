<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

    /**
     * @var \app\forms\CategoryForm $model
     */
    /**
     * @var array $categories
     */
    $dropdown_items = ['' => 'Select parent category...'] +
        \yii\helpers\ArrayHelper::map($categories, 'id', 'name');
?>
<div class="container">
    <h2 class="page-title">
        Add new category
    </h2>

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'parent_id')
            ->dropDownList($dropdown_items) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>