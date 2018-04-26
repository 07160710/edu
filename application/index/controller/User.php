<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/26
 * Time: 10:36
 */

namespace app\index\controller;

use app\index\controller\Base;
class User extends Base
{
    public function login()
    {
        return $this -> view -> fetch();
    }
    public function checkLogin()
    {
    }
    public function logout()
    {

    }
}