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
use app\report\model\AccountBalanceModel;
use app\report\model\DetailModel;

class Accountbalance extends Controller
{
    //首页列表数据
    public function IndexList()
    {
        //查询明细数据，并设置每页输出15条数据
        //$list = Db::view('detail')->order('date desc')->paginate(15);
        $list = AccountBalanceModel::scope('IndexList')->paginate(15);
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        //渲染模板输出
        return $this->fetch();
    }

    //账户余额日记账明细
    public function DetailList($id)
    {
        //查询明细数据，并设置每页输出15条数据
        //$list = Db::view('detail')->order('date desc')->paginate(15);
        $list = DetailModel::scope('AccountBalanceDetailList')->where('account',$id)->paginate(15);
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
    }

}