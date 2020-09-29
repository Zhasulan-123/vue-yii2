<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Product;
use yii\web\Response;

/**
 * Tasks controller for the `admin` module
 */
class TasksController extends AppController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSelect()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $select = Product::find()->orderBy(['id' => SORT_DESC])->all();

        return $select;
    }

    public function actionCreate()
    {
        $model = new Product();
        if (Yii::$app->request->isPost) {
            $model->name = Yii::$app->request->post('name');
            $model->price = Yii::$app->request->post('price');
            $model->desc = Yii::$app->request->post('desc');
            if (Yii::$app->request->post('is_published')) {
                $model->is_published = 1;
            } else {
                $model->is_published = 0;
            }
            $model->created_at = date('Y-m-d H:i:s');
            if ($model->save()) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ['success' => true];
            }
        }
    }

    public function actionUpdate($id)
    {
        $model = Product::findOne($id);
        if (Yii::$app->request->isPost) {
            $model->name = Yii::$app->request->post('name');
            $model->price = Yii::$app->request->post('price');
            $model->desc = Yii::$app->request->post('desc');
            if (Yii::$app->request->post('is_published')) {
                $model->is_published = 1;
            } else {
                $model->is_published = 0;
            }
            $model->updated_at = date('Y-m-d H:i:s');
            if ($model->save()) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ['success' => true];
            }
        }
    }

    public function actionEdit($id)
    {
        $data = Product::findOne($id);
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $data;
    }
}
