<?php

namespace app\modules\v1\controllers;

use yii\data\ActiveDataProvider;
use yii\filters\auth\CompositeAuth;
use yii\filters\ContentNegotiator;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\web\Response;

/**
 * Class CategoriesController
 * @package app\modules\v1\controllers
 */
class CategoriesController extends ActiveController
{
    /**
     * Model class definition
     * @var string
     */
    public $modelClass = 'app\models\Category';

    /**
     * Serializer settings
     * @var array
     */
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    /**
     * Get behaviors
     *
     * @return array
     */
    public function behaviors(): array
    {
        return [
            'authenticator' => [
                'class' => CompositeAuth::className(),
                'authMethods' => []
            ],
            'contentNegotiator' => [
                'class' => ContentNegotiator::className(),
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            'verbFilter' => [
                'class' => VerbFilter::className(),
                'actions' => $this->verbs(),
            ],
        ];
    }

    /**
     * Action index handler
     *
     * @return ActiveDataProvider
     */
    public function actionIndex(): ActiveDataProvider
    {
        $modelClass = $this->modelClass;
        $query = $modelClass::find();

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }
}