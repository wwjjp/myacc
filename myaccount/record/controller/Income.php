<?php
/**
 * Created by PhpStorm.
 * User: wwj
 * Date: 2018-05-16
 * Time: 17:36
 */

namespace app\record\controller;

use app\settings\model\Account;
use think\Controller;
use think\Cookie;
use think\Db;
use app\record\model\IncomeModel;
use app\record\model\ClassModel;
use app\record\model\AccountModel;

class Income extends Controller
{
    //新增收入
    public function add()
    {
        $titlename = '新增收入';
        $id = 0;
        $date = date('Y-m-d', time());
        $abstract = null;
        $type = '收入';
        $class = null;
        $account = null;
        $amount = 0;
        $classlist = ClassModel::scope('classlistincome')->select();
        $accountlist = AccountModel::scope('accountlistincome')->select();
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
        return $this->fetch('incomedetail');
    }

    //编辑收入
    public function edit($id)
    {
        //查询数据
        $income = IncomeModel::get($id);
        $classlist = ClassModel::scope('classlistincome')->select();
        $accountlist = AccountModel::scope('accountlistincome')->select();
        $titlename = '编辑收入';
        $this->assign('titlename', $titlename);
        $this->assign('id', $id);
        $this->assign('date', $income->date);
        $this->assign('abstract', $income->abstract);
        $this->assign('type', '收入');
        $this->assign('classlist', $classlist);
        $this->assign('class', $income->class);
        $this->assign('account', $income->account);
        $this->assign('accountlist', $accountlist);
        $this->assign('amount', $income->amount);
        //渲染模板输出
        return $this->fetch('incomedetail');
    }

    //删除收入
    public function del($id)
    {
        //查询要删除的数据
        $income = IncomeModel::get($id);
        //删除数据
        if ($income->delete()) {
            $url = '/report.php/report/index/indexdetaillist';
            echo "<script language=\"JavaScript\">alert(\"删除收入记账记录成功！！！\");window.location = \"" . $url . "\";</script>";
            exit;
        } else {
            $url = '/report.php/report/index/indexdetaillist';
            echo "<script language=\"JavaScript\">alert(\"删除收入记账记录失败，请于管理员联系！！！\");window.location = \"" . $url . "\";</script>";
            exit;
        }
    }

    //保存收入数据
    public function save($id, $date, $abstract, $class, $account, $amount)
    {
        $time = date('Y-m-d H:i:s', time());
        $username = Cookie::get('login_username');
        if ($id == 0) {
            $income = new IncomeModel;
            $income->date = $date;
            $income->abstract = $abstract;
            $income->type = 1;
            $income->class = $class;
            $income->account = $account;
            $income->amount = $amount;
            $income->create_time = $time;
            $income->create_user = $username;
            $income->update_time = $time;
            $income->update_user = $username;
            if ($income->save()) {
                $url = '/report.php/report/index/indexdetaillist';
                echo "<script language=\"JavaScript\">alert(\"新增收入记账记录成功！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            } else {
                $url = '/report.php/report/index/indexdetaillist';
                echo "<script language=\"JavaScript\">alert(\"新增收入记账记录失败，请于管理员联系！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            }

        } else {
            $income = IncomeModel::get($id);
            $income->date = $date;
            $income->abstract = $abstract;
            $income->type = 1;
            $income->class = $class;
            $income->account = $account;
            $income->amount = $amount;
            $income->update_time = $time;
            $income->update_user = $username;
            if ($income->save()) {
                $url = '/report.php/report/index/indexdetaillist';
                echo "<script language=\"JavaScript\">alert(\"编辑收入记账记录成功！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            } else {
                $url = '/report.php/report/index/indexdetaillist';
                echo "<script language=\"JavaScript\">alert(\"编辑收入记账记录失败，请于管理员联系！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            }
        }
    }
}