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
use think\Session;

class LoginApi extends Controller
{
    public function login()
    {
        $username = input('post.user');
        $pwd = input('post.pwd');
        if (!$username && !$pwd) {
            return ajax_return(3, '参数错误');
        }
        $res = login_check($username, $pwd);
        return ajax_return($res['code'], $res['msg'], $res['data']);
    }

    //获取用户信息
    public function get_user_info() {
        $id = Session::get('user_id');
        if (!$id) {
            return ajax_return(1, '暂未登录');
        }
        $user_data = get_user_info($id);
        return ajax_return(0, 'success', $user_data);
    }
}