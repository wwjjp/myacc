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
use app\settings\model\Account;

class Accountsetting extends Controller
{
    //显示账户信息列表
    public function index()
    {
        //查询明细列表数据
        $account = new  Account();
        $list = $account->order('id')->paginate(14);
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
    }

    //添加账户信息
    public function add()
    {
        $titlename = '新增账户';
        $id = 0;
        $accname = null;
        $bank = null;
        $accnum =null;
        $state = '有效';
        $note = null;
        $this->assign('titlename',$titlename);
        $this->assign('id',$id);
        $this->assign('accname',$accname);
        $this->assign('bank',$bank);
        $this->assign('accnum',$accnum);
        $this->assign('state',$state);
        $this->assign('note',$note);
        //渲染模板输出
        return $this->fetch('accountdetail');

    }
    //编辑账户信息
    public function edit($id)
    {
        //查询数据
        $account = Account::get($id);
        $titlename = '编辑账户';
        $this->assign('titlename',$titlename);
        $this->assign('id',$id);
        $this->assign('accname',$account->accname);
        $this->assign('bank',$account->bank);
        $this->assign('accnum',$account->accnum);
        $this->assign('state',$account->state);
        $this->assign('note',$account->note);
        //渲染模板输出
        return $this->fetch('accountdetail');

    }
    //删除账户信息
    public function del($id)
    {
        //查询要删除的数据
        $account = Account::get($id);
        //删除数据
        if($account -> delete())
        {
            $url='/settings.php/settings/accountsetting/index';
            echo "<script language=\"JavaScript\">alert(\"删除账户信息成功！！！\");window.location = \"" . $url . "\";</script>";
            exit;
        }
        else
        {
            $url='/settings.php/settings/accountsetting/index';
            echo "<script language=\"JavaScript\">alert(\"删除账户信息失败，请于管理员联系！！！\");window.location = \"" . $url . "\";</script>";
            exit;
        }

    }
    //保存账户信息
    public function save($id,$accname,$bank,$accnum,$state,$note)
    {
        $time = date('Y-m-d H:i:s',time());
        if($id == 0)
        {
            //新增数据
            $account = new Account;
            $account -> accname = $accname;
            $account -> bank = $bank;
            $account -> accnum = $accnum;
            $account -> state = $state;
            $account -> note = $note;
            $account -> create_time = $time;
            $account -> update_time = $time;
            if($account -> save())
            {
                $url='/settings.php/settings/accountsetting/index';
                echo "<script language=\"JavaScript\">alert(\"新增账户信息成功！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            }
            else
            {
                $url='/settings.php/settings/accountsetting/index';
                echo "<script language=\"JavaScript\">alert(\"新增账户信息失败，请于管理员联系！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            }

        }
        else
        {
            //编辑数据
            $account = Account::get($id);
            $account -> accname = $accname;
            $account -> bank = $bank;
            $account -> accnum = $accnum;
            $account -> state = $state;
            $account -> note = $note;
            $account -> update_time = $time;
            if($account -> save())
            {
                $url='/settings.php/settings/accountsetting/index';
                echo "<script language=\"JavaScript\">alert(\"更新账户信息成功！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            }
            else
            {
                $url='/settings.php/settings/accountsetting/index';
                echo "<script language=\"JavaScript\">alert(\"更新账户信息失败，请于管理员联系！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            }
        }

    }
}