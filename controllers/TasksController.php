<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use app\models\LoginForm;
use app\models\Product;

class TasksController extends AppController
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSelect()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $select = Product::find()->where(['is_published' => 1])->orderBy(['id' => SORT_DESC])->all();

        return $select;
    }

    public function actionView($id)
    {
        $data = Product::findOne($id);
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $data;
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
