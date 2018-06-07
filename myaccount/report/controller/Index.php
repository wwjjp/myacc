<?php
/**
 * Created by PhpStorm.
 * User: wwj
 * Date: 2018-05-10
 * Time: 17:22
 */

namespace app\report\controller;

use think\Controller;
use think\Cookie;
use think\Db;
use app\report\model\DetailModel;

class Index extends Controller
{
    //首页列表数据
    public function indexDetailList()
    {
        //查询明细数据，并设置每页输出15条数据
        //$list = Db::view('detail')->order('date desc')->paginate(15);
        $list = DetailModel::scope('index')->paginate(15);
        // 把分页数据赋值给模板变量list
        $this->assign('list', $list);
        // 渲染模板输出
        return $this->fetch();
    }

    //编辑数据按钮
    public function edit($word, $typename, $id)
    {
        if ($word == '记') {
            if ($typename == '收入') {
                $url = '/record.php/record/income/edit/id/'.$id;
            }
            if ($typename == '支出') {
                $url = '/record.php/record/pay/edit/id/'.$id;
            }
        }
        if ($word == '转') {
            $url = '/record.php/record/transfer/edit/id/'.$id;
        }

        echo "<script language=\"JavaScript\">window.location = \"" . $url . "\";</script>";
        exit;
    }
    public  function del($word,$typename,$id)
    {
        if($word == '记')
        {
            if($typename == '收入')
            {
                $url='/record.php/record/income/del/id/'.$id;
            }
            if($typename == '支出')
            {
                $url='/record.php/record/pay/del/id/'.$id;
            }
        }
        if($word == '转')
        {
            $url='/record.php/record/transfer/del/id/'.$id;
        }

        echo "<script language=\"JavaScript\">window.location = \"" . $url . "\";</script>";
        exit;
    }
}