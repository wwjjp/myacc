<?php
/**
 * Created by PhpStorm.
 * User: wwj
 * Date: 2018-05-10
 * Time: 17:22
 */

namespace app\settings\controller;

use think\Controller;
use think\Cookie;
use think\Db;

class About extends Controller
{
    //显示关于信息首页
    public function index()
    {
        // 渲染模板输出
        return $this->fetch();
    }
}