<?php
/**
 * Created by PhpStorm.
 * User: wwj
 * Date: 2018-05-17
 * Time: 9:54
 */

namespace app\report\controller;

use think\Controller;
use app\report\model\PaymentClassMonthModel;


class Paymentclassmonthchart extends Controller
{
    //首页列表数据
    public function IndexChart()
    {
        //初始化数据参数
        $year = date('Y',time());
        $month = date('m',time());
        $typename='支出';
        if($_POST)
        {
            $year=$_POST['year'];
            $month=$_POST['month'];
            $typename = $_POST['typename'];
        }
        $yearlist = PaymentClassMonthModel::scope('Year')->select();
        $monthlist = PaymentClassMonthModel::scope('Month')->select();
        $classname = PaymentClassMonthModel::scope('IndexChart')
                                            ->where('year',$year)
                                            ->where('month',$month)
                                            ->where('typename',$typename)
                                            ->column('classname');
        $classname = "'".implode("','",$classname)."'";
        $amount = PaymentClassMonthModel::scope('IndexChart')
                                            ->where('year',$year)
                                            ->where('month',$month)
                                            ->where('typename',$typename)
                                            ->column('amount');
        $amount = implode(',',$amount);
        // 把数据赋值给模板变量
        $this->assign('year',$year);
        $this->assign('month',$month);
        $this->assign('typename',$typename);
        $this->assign('yearlist',$yearlist);
        $this->assign('monthlist',$monthlist);
        $this->assign('classname',$classname);
        $this->assign('amount',$amount);
        //渲染模板输出
        return $this->fetch();
    }


}