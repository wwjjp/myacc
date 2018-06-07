<?php
/**
 * Created by PhpStorm.
 * User: wwj
 * Date: 2018-05-16
 * Time: 17:36
 */

namespace app\record\controller;

use think\Controller;
use think\Cookie;
use think\Db;
use app\record\model\PayModel;
use app\record\model\ClassModel;
use app\record\model\AccountModel;

class Pay extends Controller
{
    //新增支出
    public function add()
    {
        $titlename = '新增支出';
        $id = 0;
        $date = date('Y-m-d', time());
        $abstract = null;
        $type = '支出';
        $class = null;
        $account = null;
        $amount = 0;
        $classlist = ClassModel::scope('classlistpay')->select();
        $accountlist = AccountModel::scope('accountlistpay')->select();
        $this->assign('titlename', $titlename);
        $this->assign('id', $id);
        $this->assign('date', $date);
        $this->assign('abstract', $abstract);
        $this->assign('type', $type);
        $this->assign('classlist', $classlist);
        $this->assign('class', $class);
        $this->assign('account', $account);
        $this->assign('accountlist', $accountlist);
        $this->assign('amount', $amount);
        //渲染模板输出
        return $this->fetch('paydetail');
    }

    //编辑支出
    public function edit($id)
    {
        //查询数据
        $pay = PayModel::get($id);
        $classlist = ClassModel::scope('classlistpay')->select();
        $accountlist = AccountModel::scope('accountlistpay')->select();
        $titlename = '编辑支出';
        $this->assign('titlename', $titlename);
        $this->assign('id', $id);
        $this->assign('date', $pay->date);
        $this->assign('abstract', $pay->abstract);
        $this->assign('type', '支出');
        $this->assign('classlist', $classlist);
        $this->assign('class', $pay->class);
        $this->assign('account', $pay->account);
        $this->assign('accountlist', $accountlist);
        $this->assign('amount', $pay->amount);
        //渲染模板输出
        return $this->fetch('paydetail');
    }

    //删除支出
    public function del($id)
    {
        //查询要删除的数据
        $pay = PayModel::get($id);
        //删除数据
        if ($pay->delete()) {
            $url = '/report.php/report/index/indexdetaillist';
            echo "<script language=\"JavaScript\">alert(\"删除支出记账记录成功！！！\");window.location = \"" . $url . "\";</script>";
            exit;
        } else {
            $url = '/report.php/report/index/indexdetaillist';
            echo "<script language=\"JavaScript\">alert(\"删除支出记账记录失败，请于管理员联系！！！\");window.location = \"" . $url . "\";</script>";
            exit;
        }
    }

    //保存支出数据
    public function save($id, $date, $abstract, $class, $account, $amount)
    {
        $time = date('Y-m-d H:i:s', time());
        $username = Cookie::get('login_username');
        if ($id == 0) {
            $pay = new PayModel;
            $pay->date = $date;
            $pay->abstract = $abstract;
            $pay->type = 2;
            $pay->class = $class;
            $pay->account = $account;
            $pay->amount = $amount;
            $pay->create_time = $time;
            $pay->create_user = $username;
            $pay->update_time = $time;
            $pay->update_user = $username;
            if ($pay->save()) {
                $url = '/report.php/report/index/indexdetaillist';
                echo "<script language=\"JavaScript\">alert(\"新增支出记账记录成功！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            } else {
                $url = '/report.php/report/index/indexdetaillist';
                echo "<script language=\"JavaScript\">alert(\"新增支出记账记录失败，请于管理员联系！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            }

        } else {
            $pay = PayModel::get($id);
            $pay->date = $date;
            $pay->abstract = $abstract;
            $pay->type = 2;
            $pay->class = $class;
            $pay->account = $account;
            $pay->amount = $amount;
            $pay->update_time = $time;
            $pay->update_user = $username;
            if ($pay->save()) {
                $url = '/report.php/report/index/indexdetaillist';
                echo "<script language=\"JavaScript\">alert(\"编辑支出记账记录成功！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            } else {
                $url = '/report.php/report/index/indexdetaillist';
                echo "<script language=\"JavaScript\">alert(\"编辑支出记账记录失败，请于管理员联系！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            }
        }
    }
}