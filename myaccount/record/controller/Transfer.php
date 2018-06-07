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
use app\record\model\TransferModel;
use app\record\model\ClassModel;
use app\record\model\AccountModel;

class Transfer extends Controller
{
    //新增转账
    public function add()
    {
        $titlename = '新增转账';
        $id = 0;
        $date = date('Y-m-d', time());
        $abstract = null;
        $type = '转账';
        $pay_account = null;
        $income_account = null;
        $amount = 0;
        $payaccountlist = AccountModel::scope('Transferpayaccount')->select();
        $incomeaccountlist = AccountModel::scope('Transferincomeaccount')->select();
        $this->assign('titlename', $titlename);
        $this->assign('id', $id);
        $this->assign('date', $date);
        $this->assign('abstract', $abstract);
        $this->assign('type', $type);
        $this->assign('payaccountlist', $payaccountlist);
        $this->assign('pay_account', $pay_account);
        $this->assign('income_account', $income_account);
        $this->assign('incomeaccountlist', $incomeaccountlist);
        $this->assign('amount', $amount);
        //渲染模板输出
        return $this->fetch('transferdetail');
    }

    //编辑转账
    public function edit($id)
    {
        //查询数据
        $Transfer = TransferModel::get($id);
        $payaccountlist = AccountModel::scope('Transferpayaccount')->select();
        $incomeaccountlist = AccountModel::scope('Transferincomeaccount')->select();
        $titlename = '编辑转账';
        $this->assign('titlename', $titlename);
        $this->assign('id', $id);
        $this->assign('date', $Transfer->date);
        $this->assign('abstract', $Transfer->abstract);
        $this->assign('type', '转账');
        $this->assign('payaccountlist', $payaccountlist);
        $this->assign('pay_account', $Transfer->pay_account);
        $this->assign('income_account', $Transfer->income_account);
        $this->assign('incomeaccountlist', $incomeaccountlist);
        $this->assign('amount', $Transfer->amount);
        //渲染模板输出
        return $this->fetch('transferdetail');
    }

    //删除转账
    public function del($id)
    {
        //查询要删除的数据
        $Transfer = TransferModel::get($id);
        //删除数据
        if ($Transfer->delete()) {
            $url = '/report.php/report/index/indexdetaillist';
            echo "<script language=\"JavaScript\">alert(\"删除转账记账记录成功！！！\");window.location = \"" . $url . "\";</script>";
            exit;
        } else {
            $url = '/report.php/report/index/indexdetaillist';
            echo "<script language=\"JavaScript\">alert(\"删除转账记账记录失败，请于管理员联系！！！\");window.location = \"" . $url . "\";</script>";
            exit;
        }
    }

    //保存转账数据
    public function save($id, $date, $abstract, $pay_account, $income_account, $amount)
    {
        $time = date('Y-m-d H:i:s', time());
        $username = Cookie::get('login_username');
        if ($id == 0) {
            $Transfer = new TransferModel;
            $Transfer->date = $date;
            $Transfer->abstract = $abstract;
            $Transfer->type = 3;
            $Transfer->pay_account = $pay_account;
            $Transfer->income_account = $income_account;
            $Transfer->amount = $amount;
            $Transfer->create_time = $time;
            $Transfer->create_user = $username;
            $Transfer->update_time = $time;
            $Transfer->update_user = $username;
            if ($Transfer->save()) {
                $url = '/report.php/report/index/indexdetaillist';
                echo "<script language=\"JavaScript\">alert(\"新增转账记账记录成功！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            } else {
                $url = '/report.php/report/index/indexdetaillist';
                echo "<script language=\"JavaScript\">alert(\"新增转账记账记录失败，请于管理员联系！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            }

        } else {
            $Transfer = TransferModel::get($id);
            $Transfer->date = $date;
            $Transfer->abstract = $abstract;
            $Transfer->type = 3;
            $Transfer->pay_account = $pay_account;
            $Transfer->income_account = $income_account;
            $Transfer->amount = $amount;
            $Transfer->update_time = $time;
            $Transfer->update_user = $username;
            if ($Transfer->save()) {
                $url = '/report.php/report/index/indexdetaillist';
                echo "<script language=\"JavaScript\">alert(\"编辑转账记账记录成功！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            } else {
                $url = '/report.php/report/index/indexdetaillist';
                echo "<script language=\"JavaScript\">alert(\"编辑转账记账记录失败，请于管理员联系！！！\");window.location = \"" . $url . "\";</script>";
                exit;
            }
        }
    }
}