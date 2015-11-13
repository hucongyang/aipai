<?php
namespace frontend\controllers;

use frontend\models\User;
use yii\db\Exception;
use yii\db\Query;
use yii\web\Controller;

class IndexController extends Controller
{
    public function actionIndex()
    {

        $user_id = 12;
        $time = date("Y-m-d H:i:s");
        $model_time = md5($user_id . $time. microtime() . 'mokunShanghai');
        if (session_id('name')) {
            $model = "helloworld";
        } else {
            $model = 'jj';
        }
        $condition = 'id > :id';
        $param[':id'] = 0;
        $id = (new Query())
            ->select('*')
            ->from('cnhutong_user.user')
            ->where($condition, $param)
            ->orderBy('id desc')
            ->all();
        $server = serialize($_COOKIE['PHPSESSID']);
        return $this->render("index", ['model' => $model, 'model_time' => $model_time, 'server' => $server, 'id' => $id]);
    }
}