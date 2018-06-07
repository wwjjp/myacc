<?php
/**
 * Created by PhpStorm.
 * User: wwj
 * Date: 2018-05-17
 * Time: 16:02
 */

namespace app\report\controller;

use app\report\model\PaymentMonthModel;
use think\Controller;
use  think\Db;
use  think\model;

class Paymentmonthchart extends Controller
{
    //首页列表数据
    public function IndexChart()
    {
        //初始化数据参数
        $year = date('Y', time());
        if($_POST){ $year = $_POST['year'];};
        $yearlist = PaymentMonthModel::scope('Year')->select();
        //$month = collection(PaymentMonthModel::where('year',$year)->select())->toArray();
        $month = PaymentMonthModel::where('year',$year)->column('month');
        $month = implode(',',$month);
        $incomeamount = PaymentMonthModel::where('year',$year)->column('incomeamount');
        $incomeamount = implode(',',$incomeamount);
        $payamount = PaymentMonthModel::where('year',$year)->column('payamount');
        $payamount = implode(',',$payamount);
        $this->assign('yearlist',$yearlist);
        $this->assign('year',$year);
        $this->assign('month',$month);
        $this->assign('incomeamount',$incomeamount);
        $this->assign('payamount',$payamount);
        //渲染模板输出
        return $this->fetch();
    }
}