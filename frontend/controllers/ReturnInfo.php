<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/11/12
 * Time: 18:45
 */
namespace frontend\controllers;

class ReturnInfo
{
    public $ret_code;
    public $ret_msg;
    public $error_code;

    public function __construct($ret_code = 0, $ret_msg = '', $error_code = 0)
    {
        $this->$ret_code = $ret_code;
        $this->$ret_msg = $ret_msg;
        $this->$error_code = $error_code;
    }

    public function set_info($ret_code = 0, $ret_msg = '', $error_code = 0)
    {
        $this->$ret_code = $ret_code;
        $this->$ret_msg = $ret_msg;
        $this->$error_code = $error_code;
    }

    public function getRetMsg()
    {
        return $this->ret_msg;
    }

    public function getRetCode()
    {
        return $this->ret_code;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return json_encode($this);
    }
}