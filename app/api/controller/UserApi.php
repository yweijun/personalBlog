<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 2018/2/6
 * Time: 17:33
 */

namespace app\api\controller;

use think\Controller;
use think\Db;
use think\Session;

class UserApi
{
    // 修改用户信息
    public function edit_user_info () {
        $post_data['avator'] = input('post.avator');
        $post_data['nick'] = input('post.nick');
        $post_data['desc'] = input('post.desc');
        $u_id = Session::get('user_id');
        // 判断头像有没有改变，没有改变的话，只要修改其他信息
        if (preg_match('/^http/', $post_data['avator'])) {
            $update_data = [
                'u_nick' => $post_data['nick'],
                'u_desc' => $post_data['desc'],
            ];
            $update_res = DB::name('user')->where('u_id', $u_id)->update($update_data);
            $return_data = [
                'nick' => $post_data['nick'],
                'desc' => $post_data['desc'],
                'avator' => $post_data['avator']
            ];
            if ($update_res) {
                return ajax_return(0, 'success', $return_data);
            } else {
                return ajax_return(4, '信息修改失败');
            }
        }
        /* 上传头像步骤 */
        list($img_type, $img_data) = explode(',', $post_data['avator']);
        //判断图片后缀
        if(strstr($img_type,'image/jpeg') !== ''){
            $ext = '.jpeg';
        }elseif(strstr($img_type,'image/gif') !== ''){
            $ext = '.gif';
        }elseif(strstr($img_type,'image/png') !== ''){
            $ext = '.png';
        }elseif(strstr($img_type,'image/jpg') !== ''){
            $ext = '.jpg';
        }else {
            return ajax_return(1, '不支持的图片格式');
        }
        $file_name = time().$ext;
        $img_path = __PUBLIC__.'upload/'.$file_name;
        $res = file_put_contents($img_path, base64_decode($img_data)); // 写入文件,生成图片
        if (!$res) {
            return ajax_return(2, '图片保存失败');
        } else {
            //图片本地上传成功后，将图片上传OSS
            $oss_obj = 'blog/avator/'.$file_name;
            $oss_res = OssUploadImage($oss_obj, $img_path);
            // oss上传成功之后保存数据到数据库
            if ($oss_res) {
                $update_data = [
                    'u_nick' => $post_data['nick'],
                    'u_desc' => $post_data['desc'],
                    'u_avator' => $oss_res
                ];
                $update_res = DB::name('user')->where('u_id', $u_id)->update($update_data);
                @unlink($img_path); //删除本地文件
                if ($update_res) {
                    $return_data = [
                        'nick' => $post_data['nick'],
                        'desc' => $post_data['desc'],
                        'avator' => $oss_res
                    ];
                    return ajax_return(0, 'success', $return_data);
                } else {
                    return ajax_return(4, '信息修改失败');
                }
            } else {
                return ajax_return(3, '图片上传失败');
            }
        }
    }
}