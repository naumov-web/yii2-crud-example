<?php

namespace app\controllers;

use app\enums\ServiceNamesEnum;
use app\forms\CategoryForm;
use app\services\CategoriesService;
use Yii;
use yii\base\InvalidConfigException;
use yii\web\Controller;
use yii\web\Response;
use app\exceptions\ModelByIdNotFoundException;

/**
 * Class CategoriesController
 * @package app\controllers;
 */
final class CategoriesController  extends Controller
{
    /**
     * Categories service instance
     * @var CategoriesService
     */
    private $categories_service;

    /**
     * Categories controller constructor
     * @param $id
     * @param $module
     * @param array $config
     * @throws InvalidConfigException
     */
    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);

        $this->categories_service = Yii::$app->get(ServiceNamesEnum::CATEGORIES_SERVICE);
    }

    /**
     * Render page with categories list
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $items_dto = $this->categories_service->index();

        return $this->render(
            'index',
            [
                'items_dto' => $items_dto
            ]
        );
    }

    /**
     * Add new category and render page for addition it
     *
     * @return string|Response
     * @throws ModelByIdNotFoundException
     */
    public function actionAdd()
    {
        $form = new CategoryForm();
        $items_dto = $this->categories_service->index();

        if (Yii::$app->request->getIsPost()) {
            $form->load(Yii::$app->request->post());

            if ($form->validate()) {
                $this->categories_service->create($form->attributes);

                return $this->redirect('/categories');
            }
        }

        return $this->render(
            'add',
            [
                'model' => $form,
                'categories' => $items_dto->getModels()
            ]
        );
    }

    /**
     * Edit existing category and render page for updating it
     *
     * @param int $id
     * @return string|Response
     * @throws ModelByIdNotFoundException
     */
    public function actionEdit(int $id)
    {
        $category = $this->categories_service->getFirstById($id);
        $form = new CategoryForm();
        $form->load($category);

        if (Yii::$app->request->getIsPost()) {
            $form->load(Yii::$app->request->post());

            if ($form->validate()) {
                return $this->redirect('/categories');
            }
        }

        $items_dto = $this->categories_service->index();

        return $this->render(
            'add',
            [
                'model' => $form,
                'categories' => $items_dto->getModels()
            ]
        );
    }
}