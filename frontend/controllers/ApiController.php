<?php


namespace frontend\controllers;


use common\models\Service;
use Yii;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class ApiController extends ActiveController
{
    public $modelClass = Service::class;

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }
// testwork/api?filter[city]=Москва = Получить по городу Услуги
// testwork/api?filter[id]=4 = Получить по id информацию о услуге

    public function actionIndex()
    {
        $filter = Yii::$app->request->get('filter');
        $query = Service::find();
        if ($filter) {
            $query->filterWhere($filter);
        }

        return new ActiveDataProvider([
            'query' => $query
        ]);
    }

    public function actionView()
    {

    }

}