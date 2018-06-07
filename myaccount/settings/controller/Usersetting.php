<?php
/**
 * Created by PhpStorm.
 * User: wwj
 * Date: 2018-05-15
 * Time: 14:39
 */

namespace app\settings\controller;

use think\Controller;
use think\Cookie;
use think\Db;
use app\settings\model\User;

class Usersetting extends Controller
{
    //显示用户信息列表
    public function index()
    {
        //查询明细列表数据
        $user = new  User();
        $list = $user->order('id')->paginate(14);
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
    }

    //添加用户信息
    public function add()
    {
        $titlename = '新增用户';
        $id = 0;
        $username = null;
        $password = null;
        $name =null;
        $telphone = null;
        $note = null;
        $this->assign('titlename',$titlename);
        $this->assign('id',$id);
        $this->assign('username',$username);
        $this->assign('password',$password);
        $this->assign('name',$name);
        $this->assign('telphone',$telphone);
        $this->assign('note',$note);
        //渲染模板输出
        return $this->fetch('userdetail');

    }
    //编辑用户信息
    public function edit($id)
    {
        //查询数据
        $user = User::get($id);
        $titlename = '编辑用户';
        $this->assign('titlename',$titlename);
        $this->assign('id',$id);
        $this->assign('username',$user->username);
        $this->assign('password',$user->password);
        $this->assign('name',$user->name);
        $this->assign('telphone',$user->telphone);
        $this->assign('note',$user->note);
        //渲染模板输出
        return $this->fetch('userdetail');

    }
    //删除用户信息
    public function del($id)
    {
        //查询要删除的数据
        $user = User::get($id);
        //删除数据
        if($user -> delete())
        {
            $url='/settings.php/settings/usersetting/index';
            echo "<script language=\"JavaScript\">alert(\"删除用户信息成功！！！\");window.location = \"" . $url . "\";</script>";
            exit;
        }
        else
        {
            $url='/settings.php/settings/usersetting/index';
            echo "<script language=\"JavaScript\">alert(\"删除用户信息失败，请于管理员联系！！！\");window.location = \"" . $url . "\";</script>";
            exit;
        }

    }
    //保存用户信息
    public function save($id,$username,$password,$name,$telphone,$note)
    {
        $time = date('Y-m-d H:i:s',time());
        if($id == 0)
        {
            //新增数据
            $user = new User;
            $user -> username = $username;
            $user -> password = md5($password);
            $user -> name = $name;
            $user -> telphone = $telphone;
            $user -> note = $note;
            $user -> create_time = $time;
            if($user -> save())
            {
                $url='/settings.php/settings/usersetting/index';
                echo "<script language=\"JavaScript\">alert(\"新增用户信息成功！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            }
            else
            {
                $url='/settings.php/settings/usersetting/index';
                echo "<script language=\"JavaScript\">alert(\"新增用户信息失败，请于管理员联系！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            }

        }
        else
        {
            //编辑数据
            $user = User::get($id);
            $user -> username = $username;
            $user -> password = $password;
            $user -> name = $name;
            $user -> telphone = $telphone;
            $user -> note = $note;
            if($user -> save())
            {
                $url='/settings.php/settings/usersetting/index';
                echo "<script language=\"JavaScript\">alert(\"更新用户信息成功！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            }
            else
            {
                $url='/settings.php/settings/usersetting/index';
                echo "<script language=\"JavaScript\">alert(\"更新用户信息失败，请于管理员联系！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            }
        }

    }
    //重置用户密码
    public function resetpassword($id)
    {
        $user = User::get($id);
         $user -> password = md5($user->username);
        if($user -> save())
        {
            $url='/settings.php/settings/usersetting/index';
            echo "<script language=\"JavaScript\">alert(\"重置用户密码成功！！！\");window.location = \"" . $url . "\";</script>";
            exit;
        }
        else
        {
            $url='/settings.php/settings/usersetting/index';
            echo "<script language=\"JavaScript\">alert(\"重置用户密码失败，请于管理员联系！！！\");window.location = \"" . $url . "\";</script>";
            exit;
        }
    }
}