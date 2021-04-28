<?php
namespace frontend\controllers;

use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;

class RequestController extends ActiveController
{
    public $modelClass = 'frontend\models\Request';

    

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = function ($action) {
            return new ActiveDataProvider([
                'query' => $this->modelClass::find(),
                'sort'=> ['defaultOrder' => ['status' => SORT_ASC, 'created_at' => SORT_ASC]],
            ]);
        };

        return $actions;
    }
}