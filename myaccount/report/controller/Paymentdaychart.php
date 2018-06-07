<?php
/**
 * Created by PhpStorm.
 * User: wwj
 * Date: 2018-05-17
 * Time: 9:54
 */

namespace app\report\controller;

use think\Controller;
use app\report\model\PaymentDayModel;


class Paymentdaychart extends Controller
{
    //首页列表数据
    public function IndexChart()
    {
        //初始化数据参数
        $begindate = date('Y-m',time()).'-01';
        $enddate =date('Y-m-d',time());
        if($_POST)
        {
            $begindate = $_POST['begindate'];
            $enddate = $_POST['enddate'];
            if($begindate>$enddate)
            {
                $url='/report.php/report/paymentdaychart/indexchart';
                echo "<script language=\"JavaScript\">alert(\"结束时间不能小于开始时间！\");window.location = \"" . $url . "\";</script>";
                exit;
            }
        }
        $date = PaymentDayModel::scope('IndeChart')->where('date','>=',$begindate)->where('date','<=',$enddate)->column('date');
        $date = "'".implode("','",$date)."'";
        $incomeamount = PaymentDayModel::scope('IndeChart')->where('date','>=',$begindate)->where('date','<=',$enddate)->column('incomeamount');
        $incomeamount = implode(",",$incomeamount);
        $payamount = PaymentDayModel::scope('IndeChart')->where('date','>=',$begindate)->where('date','<=',$enddate)->column('payamount');
        $payamount = implode(",",$payamount);
        // 把数据赋值给模板变量
        $this->assign('begindate',$begindate);
        $this->assign('enddate',$enddate);
        $this->assign('date',$date);
        $this->assign('incomeamount',$incomeamount);
        $this->assign('payamount',$payamount);
        //渲染模板输出
        return $this->fetch();
    }


}