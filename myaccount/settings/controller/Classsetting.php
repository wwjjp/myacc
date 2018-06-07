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
use app\settings\model\ClassModel;

class Classsetting extends Controller
{
    //显示分类信息列表
    public function index()
    {
        //查询明细列表数据
        $class = new  ClassModel();
        $list = $class->order('type,classname')->paginate(14);
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
    }

    //添加分类信息
    public function add()
    {
        $titlename = '新增分类';
        $id = 0;
        $type = '收入';
        $classname = null;
        $state = '有效';
        $note = null;
        $this->assign('titlename',$titlename);
        $this->assign('id',$id);
        $this->assign('type',$type);
        $this->assign('classname',$classname);
        $this->assign('state',$state);
        $this->assign('note',$note);
        //渲染模板输出
        return $this->fetch('classdetail');

    }
    //编辑分类信息
    public function edit($id)
    {
        //查询数据
        $class   = ClassModel::get($id);
        $titlename = '编辑分类';
        $this->assign('titlename',$titlename);
        $this->assign('id',$id);
        $this->assign('type',$class->type);
        $this->assign('classname',$class->classname);
        $this->assign('state',$class->state);
        $this->assign('note',$class->note);
        //渲染模板输出
        return $this->fetch('classdetail');

    }
    //删除分类信息
    public function del($id)
    {
        //查询要删除的数据
        $class = ClassModel::get($id);
        //删除数据
        if($class -> delete())
        {
            $url='/settings.php/settings/classsetting/index';
            echo "<script language=\"JavaScript\">alert(\"删除分类信息成功！！！\");window.location = \"" . $url . "\";</script>";
            exit;
        }
        else
        {
            $url='/settings.php/settings/classsetting/index';
            echo "<script language=\"JavaScript\">alert(\"删除分类信息失败，请于管理员联系！！！\");window.location = \"" . $url . "\";</script>";
            exit;
        }

    }
    //保存分类信息
    public function save($id,$type,$classname,$state,$note)
    {
        $time = date('Y-m-d H:i:s',time());
        if($id == 0)
        {
            //新增数据
            $class = new ClassModel;
            $class -> type = $type;
            $class -> classname = $classname;
            $class -> state = $state;
            $class -> note = $note;
            $class -> create_time = $time;
            $class -> update_time = $time;
            if($class -> save())
            {
                $url='/settings.php/settings/classsetting/index';
                echo "<script language=\"JavaScript\">alert(\"新增分类信息成功！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            }
            else
            {
                $url='/settings.php/settings/classsetting/index';
                echo "<script language=\"JavaScript\">alert(\"新增分类信息失败，请于管理员联系！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            }

        }
        else
        {
            //编辑数据
            $class = ClassModel::get($id);
            $class -> type = $type;
            $class -> classname = $classname;
            $class -> state = $state;
            $class -> note = $note;
            $class -> update_time = $time;
            if($class -> save())
            {
                $url='/settings.php/settings/classsetting/index';
                echo "<script language=\"JavaScript\">alert(\"更新分类信息成功！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            }
            else
            {
                $url='/settings.php/settings/classsetting/index';
                echo "<script language=\"JavaScript\">alert(\"更新分类信息失败，请于管理员联系！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            }
        }

    }
}