<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 2018/1/22
 * Time: 16:22
 */

namespace app\index\controller;


class BlogDetail extends Base
{
    public function blogDetail()
    {
        return $this->fetch();
    }
}