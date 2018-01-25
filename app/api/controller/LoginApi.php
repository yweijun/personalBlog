<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 2018/1/22
 * Time: 16:59
 */
namespace app\api\controller;

use think\Controller;
use think\Db;

class LoginApi extends Controller
{
    public function login()
    {
        $username = input('post.user');
        $pwd = input('post.pwd');
        $res = $username && $pwd ? login_check($username, $pwd) : '空';
        echo json_encode($res);
    }
}