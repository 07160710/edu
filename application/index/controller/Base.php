<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/25
 * Time: 20:09
 */

namespace app\index\controller;


use think\Controller;
use think\Session;

class Base extends Controller
{
    protected function _initialize()
    {
        parent::_initialize();
        // TODO:
        define('USER_ID',Session::get('user_id'));
    }

    protected function isLogin(){
        if(empty(USER_ID))
        {
            $this->error('用户名未登录，无权访问',url('user/login'));
        }
    }
    protected function alreadyLogin(){
        if(!empty(USER_ID)){
            $this->error('用户已登录,请勿重复登录',url('index/index'));
        }
    }
}