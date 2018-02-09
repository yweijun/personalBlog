<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 2018/2/9
 * Time: 11:10
 */

namespace app\index\controller;


class BlogEdit extends Base
{
    public function blog_edit() {
        return $this->fetch();
    }
}