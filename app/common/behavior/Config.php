<?php
// +----------------------------------------------------------------------
// | blog [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2018 http://www.hellobike.xin All rights reserved.
// +----------------------------------------------------------------------
// | Contacts: Linyi <619906202@qq.com> <http://www.hellobike.xin>
// +----------------------------------------------------------------------
// | http://www.apache.org/licenses/LICENSE-2.0
// +----------------------------------------------------------------------

namespace app\common\behavior;

/**
 * 初始化配置信息行为
 * @package application\common\behavior
 */
class Config
{
    /**
     * 执行行为 run方法是Behavior唯一的接口
     * @access public
     * @param mixed $params  行为参数
     * @return void
     */
    public function run(&$params)
    {

         //获取当前模块名称
        $module = '';
        $dispatch = request()->dispatch();
        if (isset($dispatch['module'])) {
            $module = $dispatch['module'][0];
        }

        // 获取入口目录
        $base_file = request()->baseFile();
        $base_dir  = preg_replace(['/index.php$/', '/a.php$/', '/t.php$/'], ['', '', '', ''], $base_file);
        define('PUBLIC_PATH', $base_dir. 'public/');

        // 视图输出字符串内容替换
        $view_replace_str = [
            // 静态资源目录
            '__STATIC__'    => PUBLIC_PATH. 'static',

            '__PUBLIC__'    => PUBLIC_PATH,

            '__CSS__' => PUBLIC_PATH. 'static/css',
            // JS目录
            '__JS__'  => PUBLIC_PATH. 'static/js',
            // IMG目录
            '__IMG__' => PUBLIC_PATH. 'static/img',

            '__FONT__' => PUBLIC_PATH.'static/font-awesome'

        ];
        config('view_replace_str', $view_replace_str);

        // 如果定义了入口为core、index、则修改默认的访问控制器层

        if(defined('ENTRANCE') && (ENTRANCE == 'core' || ENTRANCE == 'index')) {

            if ($dispatch['type'] == 'module' && $module == '') {

                if(ENTRANCE == 'core'){
                    // 博客后台管理
                    header("Location: ".$base_dir.'a.php/admin', true, 302);exit();
                }elseif(ENTRANCE == 'tenant'){
                    // 博客首页
                    header("Location: ".$base_dir.'t.php/index', true, 302);exit();
                }
            }

            if ($module != '' && $module != 'common' && $module != 'home' && $module != 'portal' && $module != 'extra' && $module != 'api' ) {
                if ($module != ENTRANCE) {
                    if($module != ENTRANCE){
                        // 修改默认访问控制器层
//                        config('url_controller_layer', ENTRANCE);
                        if($module != 'user'){
                            // 修改视图模板路径
//                            config('template.view_path', APP_PATH. $module. '/view/'.ENTRANCE.'/');
                        }
                    }
                }
            }
        } else {
            if ($dispatch['type'] == 'module') {
                if($module == 'core'){
                    // SAAS后台管理
                    header("Location: ".$base_dir.'a.php/admin', true, 302);exit();
                }elseif($module == 'tenant'){
                    // 租户后台管理
                    header("Location: ".$base_dir.'t.php/indext', true, 302);exit();
                }
            }
        }

    }
}
