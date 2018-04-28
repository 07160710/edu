<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/26
 * Time: 10:36
 */

namespace app\index\controller;

use app\index\controller\Base;
use think\Request;
use app\index\model\User as UserModel;

class User extends Base
{
    public function login()
    {
        return $this -> view -> fetch();
    }
    public function checkLogin(Request $request)
    {

        $status = 0;
        $result = '';
        $data = $request ->param();


        $rule = [
            'username|用户名' => 'require',
            'password|密码' => 'require',
            'verify|验证码' => 'require|captcha',
        ];
        $msg = [
            'username' => ['require' => '用户名不能为空,请检查'],
            'password' => ['require' => '密码不能为空,请检查'],
            'verify' =>[
                'require' => '验证码不能为空,请检查',
                'captcha' => '验证码错误',
            ]
        ];
        $result = $this->validate($data,$rule,$msg);
        if($result === true){
            $map = [
                'username' => $data['username'],
                'password' => md5($data['password']),
            ];
            $user = UserModel::get($map);
            if($user == null){
                $result = '没有找到该用户';
            }else{
                $status = 1;
                $result = '验证通过,点击[确定]后进入后台';
            }
        }

        return ['status'=>$status,'message'=>$result,'data'=>$data];




        //var_dump($result);

    }
    public function logout()
    {

    }
}