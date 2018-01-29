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
    //保存博客
    public function save_blog () {
        $u_id = Session::get('user_id');
        if (!$u_id) {
            return ajax_return('1', '暂无登录');
        }
        $get_data = input('post.');
        $get_data['add_time'] = time();
        $get_data['u_id'] = $u_id;
        Db::name('article')->insert($get_data);
        return ajax_return(0, 'success');
    }
    //获取博客内容
    public function get_blog_detail () {
        $article_id = input('post.id');
        if (!$article_id) {
            return ajax_return(1, '参数错误');
        }
        $article = Db::name('article')->alias('a')
            ->join('__USER__ b', 'a.u_id = b.u_id', 'LEFT')
            ->field('a.article_id,a.content,a.classify_id,a.label,a.title,a.desc,a.add_time,b.u_nick')
            ->where('a.article_id', $article_id)->find();
        $article['add_time'] = format_time($article['add_time']);
        return $article ? ajax_return(0, 'success', $article) : ajax_return(2, '文章不存在');
    }
    //获取博客列表
    public function get_blogs () {
        $page = input('post.page');
        $limit = input('post.limit');
        if (!$page || !$limit) {
            return ajax_return('1', '参数错误');
        }
        $articles = Db::name('article')->alias('a')
            ->join('__USER__ b', 'a.u_id = b.u_id', 'LEFT')
            ->field('a.article_id,a.content,a.classify_id,a.label,a.title,a.desc,a.add_time,b.u_nick')
            ->page($page, $limit)->select();
        foreach ($articles as $key => $val) {
            $articles[$key]['add_time'] = format_time($val['add_time']);
        }
        return ajax_return(0, 'success', $articles);
    }
}