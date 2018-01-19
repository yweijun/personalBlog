<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 2018/1/19
 * Time: 16:45
 */
namespace app\admin\controller;
use think\Controller;

class Index extends Base
{
    public function index()
    {
        return $this->fetch('login/login');
    }
}