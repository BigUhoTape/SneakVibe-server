<?php


namespace app\modules\api\controllers;

use app\modules\api\models\LoginForm;
use app\modules\api\models\SignupForm;
use yii\filters\AccessControl;

class AuthController extends Controller {

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        unset($behaviors['authenticator']);
        return $behaviors;
    }

    public function actionLogin () {
        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post(), '') && $model->login()) {
            return $model->getUser();
        }

        \Yii::$app->response->statusCode = 422;
        return [
            'errors' => $model->errors
        ];
    }

    public function actionSignup () {
        $model = new SignupForm();
        if ($model->load(\Yii::$app->request->post(), '') && $model->register()) {
            return $model->_user;
        }

        \Yii::$app->response->statusCode = 422;
        return [
            'errors' => $model->errors
        ];
    }

}