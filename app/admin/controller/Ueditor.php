<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 2018/2/2
 * Time: 18:52
 */

namespace app\admin\controller;


class Ueditor extends Base
{
    public function ueditor () {
        return $this->fetch('ueditor');
    }
}