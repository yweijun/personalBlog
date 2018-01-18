<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 2018/1/18
 * Time: 11:27
 */
namespace app\admin\controller;

class Index extends Base
{
    public function index() {
        $data =['menu1', 'menu2', 'menu3'];
        $this->assign('menu', $data);
        return $this->fetch();
    }
}