<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use think\Db;
use think\Session;
/*
 * 密码加密
 * @param $code 用户随机码
 * @param $pwd 密码
 * return 加密后的密码
 */
function get_password($pwd, $code) {
    return md5(md5($pwd).$code);
}
/*
 * 登录检查
 * @param $username 用户名
 * @param $password 密码
 * return 0: 登录成功; 1: 用户不存在; 2: 密码错误;
 */
function login_check($username, $password) {
    $user = Db::name("user")->where('u_name', $username)->find();
    if (!$user) {
        $res = ['code' => 1, 'msg' => '用户不存在', 'data' => []];
        return $res;
    }
    if (get_password($password, $user['u_salt']) === $user['u_pwd']) {
        //登录成功将id存入session
        Session::set('user_id', $user['u_id']);
        //获取用户信息
        $user_data = Db::name('user')->where('u_name', $username)->find();
        $res = ['code' => 0, 'msg' => '登录成功', 'data' => $user_data];
        return $res;
    }
    $res = ['code' => 2, 'msg' => '密码错误', 'data' => []];
    return $res;
}
/*
 * ajax返回数据
 * @param $code 错误码
 * @param $msg 错误信息
 * @param $data 返回数据，默认为空数组
 * return 字符串
 */
function ajax_return($code, $msg, $data = []) {
    $res['code'] = $code;
    $res['msg'] = $msg;
    $res['data'] = $data;
    return json_encode($res);
}
/*
 * 格式化字符串
 * @param $time int 时间戳
 * return Y-m-d H:i:s 格式时间
 */
function format_time($time) {
    if (!is_int($time) || !$time) {
        return '';
    }
    return date('Y-m-d H:i:s', $time);
}
/**
 * 获取用户信息
 *
 */
function get_user_info ($id) {
    return Db::name('user')->where('u_id', $id)->find();
}