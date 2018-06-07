<?php
/**
 * Created by PhpStorm.
 * User: wwj
 * Date: 2018-05-17
 * Time: 9:54
 */

namespace app\report\controller;

use think\Controller;
use think\Cookie;
use think\Db;
use app\report\model\PaymentClassMonthModel;
use app\report\model\DetailModel;

class Paymentclassmonthtable extends Controller
{
    //首页列表数据
    public function IndexList()
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
        //查询明细数据，并设置每页输出15条数据
        //$list = Db::view('detail')->order('date desc')->paginate(15);
        $list = PaymentClassMonthModel::scope('IndexList')
                                        ->where('year',$year)
                                        ->where('month',$month)
                                        ->where('typename',$typename)
                                        ->paginate(15);
        // 把数据赋值给模板变量
        $this->assign('list', $list);
        $this->assign('year',$year);
        $this->assign('month',$month);
        $this->assign('typename',$typename);
        $this->assign('yearlist',$yearlist);
        $this->assign('monthlist',$monthlist);
        //渲染模板输出
        return $this->fetch();
    }

    //月度分类日记账明细
    public function DetailList($year,$month,$typename,$class,$classname)
    {
        //查询明细数据，并设置每页输出15条数据
        $month1=$month+1;
        //$list = Db::view('detail')->order('date desc')->paginate(15);
        $list = DetailModel::scope('PaymentClassMonthTableDetailList')
            ->where('date','>=',$year.'-'.$month.'-01')
            ->where('date','<',$year.'-'.$month1.'-01')
            ->where('typename',$typename)
            ->where('class',$class)
            ->paginate(15);;
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        $this->assign('year',$year);
        $this->assign('month',$month);
        $this->assign('typename',$typename);
        $this->assign('classname',$classname);
        // 渲染模板输出
        return $this->fetch(); $this->fetch();
    }

}