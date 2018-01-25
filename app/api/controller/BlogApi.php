<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 2018/1/25
 * Time: 16:42
 */

namespace app\api\controller;
use think\Controller;
use think\Db;
use think\Session;

class BlogApi extends Controller
{
    public function save_blog () {
        $get_data['u_id'] = Session::get('user_id');
        $get_data = input('post.');

        Db::name('article')->insert($get_data);
        return json_encode($get_data);
    }
}