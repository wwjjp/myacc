<?php

namespace app\index\controller;

use think\Controller;
use app\index\model\User;
use think\Cookie;

class Index extends Controller
{
    //首页
    public function index()
    {
        //通过cookie判断是否登录
        if(!Cookie::has('login_id'))
        {
            $url='/index.php/index/index/login';
            echo "<script language=\"JavaScript\">window.location = \"" . $url . "\";</script>";
            exit;
        }
        else
        {
          return  $this->fetch();
        }

    }

    //登录
    public function login()
    {
        if ($_POST) {
            //接收POST参数变量
            $username = ($_POST['username']) ? $_POST['username'] : null;
            $password = ($_POST['password']) ? $_POST['password'] : null;
            //判断用户名是否为空
            if ( $username == null) {
                $url = '/index.php/index/index/login';
                echo "<script language=\"JavaScript\">alert(\"用户名不能为空！\");window.location = \"" . $url . "\";</script>";
                exit;
            }
            //判断密码是否为空
            if($password==null)
            {
                $url='/index.php/index/index/login';
                echo "<script language=\"JavaScript\">alert(\"密码不能为空！\");window.location = \"" . $url . "\";</script>";
                exit;
            }
            //查询用户数据
            $user = new User();
            $user ->where(['username'=>$username,'password'=>md5($password)]);
            //判断用户名数据
            if($user->count()==1)
            {
                $z =$user ->where(['username'=>$username,'password'=>md5($password)])->find();
                Cookie::set('login_id',$z->getData()['id']);
                Cookie::set('login_username',$z->getData()['username']);
                Cookie::set('login_name',$z->getData()['name']);
                $url='/';
                echo "<script language=\"JavaScript\">window.location = \"" . $url . "\";</script>";
                exit;
            }
            else
            {
                $url='/index.php/index/index/login';
                echo "<script language=\"JavaScript\">alert(\"用户名或密码错误！\");window.location = \"" . $url . "\";</script>";
                exit;
            }


        } else {
            return $this->fetch();
        }

    }

    //注销
    public function logout()
    {
        Cookie::delete('login_id');
        Cookie::delete('login_username');
        Cookie::delete('login_name');
        Cookie::clear();
        $url = '/';
        echo "<script language=\"JavaScript\">alert(\"注销成功！\");window.location = \"" . $url . "\";</script>";
        exit;

    }
}
