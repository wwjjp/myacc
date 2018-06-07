<?php
/**
 * Created by PhpStorm.
 * User: wwj
 * Date: 2018-05-11
 * Time: 13:10
 */

namespace app\settings\controller;

use think\Controller;
use think\Cookie;
use think\Db;
use app\index\model\User;

class Passwordupdate extends Controller
{
    //显示当前用户信息
    public function index()
    {
        // 渲染模板输出
        return $this->fetch();
    }

    //更新密码
    public function passwordupdate($id,$passwordold,$passwordnew1,$passwordnew2)
    {
        //验证必填项是否为空
        if($passwordold == null or $passwordnew1 == null or $passwordnew2 == null)
        {
            $url='/settings.php/settings/PasswordUpdate/index';
            echo "<script language=\"JavaScript\">alert(\"密码不能为空，请重新输入!\");window.location = \"" . $url . "\";</script>";
            exit;
        };
        //查询当前用户密码
        $user = new User();
        $user -> where('id',$id) ;
        //验证原密码是否正确
        if($user->value('password') != md5($passwordold))
        {
            $url='/settings.php/settings/PasswordUpdate/index';
            echo "<script language=\"JavaScript\">alert(\"原密码不正确，请重新输入!\");window.location = \"" . $url . "\";</script>";
            exit;
        };
        //验证两次输入密码是否一致
        if($passwordnew1 != $passwordnew2)
        {
            $url='/settings.php/settings/PasswordUpdate/index';
            echo "<script language=\"JavaScript\">alert(\"两次输入的密码不一致，请重新输入!\");window.location = \"" . $url . "\";</script>";
            exit;
        };
        //更新密码
        $user = User::get($id);
        $user -> password = MD5($passwordnew1);
        if($user -> save())
        {
            $url='/index.php/index/index/logout';
            echo "<script language=\"JavaScript\">alert(\"密码修改成功，请退出系统重新登录!\");window.location = \"" . $url . "\";</script>";
            exit;
        }
        else
        {
            $url='/settings.php/settings/PasswordUpdate/index';
            echo "<script language=\"JavaScript\">alert(\"密码修改失败，请联系系统管理员!\");window.location = \"" . $url . "\";</script>";
            exit;
        };

    }
}