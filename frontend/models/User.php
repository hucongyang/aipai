<?php
namespace frontend\models;

use yii\db\ActiveRecord;
use yii\db\Exception;
use yii\db\Query;

class User extends ActiveRecord
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function getUserId($username, $password, $email)
    {
        $user_id = 0;
        if ($username != null || $password != null || $email != null)
        {
            $con_user = \Yii::$app->db;
            $param = array();
            $condition = null;
            if ($username)
            {
                $condition = 'username = :username';
                $param[':username'] = $username;
            } elseif ($password)
            {
                $condition = 'password = :password';
                $param[':password'] = $password;
            }
            // 加上其他参数
            $condition = $condition . ' AND app_id = :app_id';
            $param[':app_id'] = $GLOBALS['app_id'];
            try {
                $user_id = (new Query())
                    ->select(['id'])
                    ->from('yii2advanced.user')
                    ->where($condition, $param)
                    ->limit(1)
                    ->all();
            } catch(Exception $e) {
                error_log($e);
            }
        }
        return $user_id;
    }

    public function insertUser($username, $password, $email = null)
    {
        $user_id = 0;
        try {
            // 数据库连接
            $con_user = \Yii::$app->db;
            // 创建用户，主表写入数据
            $con_user->createCommand()->insert('user',array(
                'username' => $username,
                'password' => $password,
                'email' => $email
            ))->execute();
            $user_id = \Yii::$app->db->getLastInsertID();
            // 分表插入数据
            $table_name = sprintf('user_%02s', dechex($user_id % 256));
            $con_user->createCommand()->insert($table_name, array(
                'user_id' => $user_id,
                'username' => $username,
                'password' => $password
            ));
        } catch (Exception $e) {
            error_log($e);
        }
        return $user_id;
    }
    public $expire_time = 315360000;
    public function insertUserToken($user_id)
    {
        $time = date("Y-m-d H:i:s");
        // 创建用户token
        $token = md5($user_id . $time . microtime() . 'cnhutong');
        $exprie_ts = date("Y-m-d H:i:s", time() + $this->expire_time);
    }
}