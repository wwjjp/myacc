<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"D:\phpStudy\PHPTutorial\WWW\MyaccTh5./myaccount/index\view\index\index.html";i:1525960891;s:68:"D:\phpStudy\PHPTutorial\WWW\MyaccTh5\myaccount\public\view\head.html";i:1526562447;s:68:"D:\phpStudy\PHPTutorial\WWW\MyaccTh5\myaccount\public\view\foot.html";i:1525932628;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>个人记账系统</title>

    <!-- Bootstrap -->
    <link href="<?php echo CSS_URL; ?>bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?php echo JS_URL; ?>html5shiv.min.js"></script>
    <script src="<?php echo JS_URL; ?>respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!--引入头部-->
<!--导航-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="index.php" class="navbar-brand">
                <span class="glyphicon glyphicon-home"></span>
                <span>
                    <?php echo \think\Cookie::get('login_name'); ?> 欢迎您！
                </span>
            </a>
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#divNav">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="divNav" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/">首页</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">记账 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/record.php/record/income/add" target="work">收入记账</a></li>
                        <li><a href="/record.php/record/pay/add" target="work">支出记账</a></li>
                        <li><a href="/record.php/record/transfer/add" target="work">转账记账</a></li>
                        <span class="icon-bar"></span>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">查询 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <!--
                        <li><a href="index.php?address=paymentdetail">收支明细</a></li>
                        <li><a href="index.php?address=transferdetail">转账明细</a></li>
                        <li class="divider"></li>
                        -->
                        <li><a href="/report.php/report/accountbalance/indexlist" target="work">账户余额</a></li>
                        <li class="divider"></li>
                        <li><a href="/report.php/report/paymentmonthchart/indexchart" target="work">收支月度图</a></li>
                        <li><a href="/report.php/report/paymentdaychart/indexchart" target="work">收支日统计图</a></li>
                        <li class="divider"></li>
                        <li><a href="/report.php/report/paymentclassmonthchart/indexchart" target="work">收支分类月度图</a></li>
                        <li><a href="/report.php/report/paymentclassmonthtable/indexlist" target="work">收支分类月度表</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">设置 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/settings.php/settings/usersetting/index" target="work">用户设置</a></li>
                        <li><a href="/settings.php/settings/classsetting/index" target="work">分类设置</a></li>
                        <li><a href="/settings.php/settings/accountsetting/index" target="work">账户设置</a></li>
                        <li class="divider"></li>
                        <li><a href="/settings.php/settings/PasswordUpdate/index" target="work">修改密码</a></li>
                        <li class="divider"></li>
                        <li><a href="/settings.php/settings/about/index" target="work">关于软件</a></li>
                    </ul>
                </li>
                <li><a href="/index.php/index/index/logout">注销</a></li>
            </ul>
        </div>
    </div>
</nav>
<!--预留菜单位置-->
<div style="height: 50px"></div>

<!--工作区work数据-->
<iframe name="work" src="/report.php/report/index/indexdetaillist" frameborder="0" scrolling="no" id="indexiframe"
        onload="this.height=100" style="width: 100%"></iframe>
<!--work自适应高度-->
<script type="text/javascript">
    function reinitIframe() {
        var iframe = document.getElementById("indexiframe");
        try {
            var bHeight = iframe.contentWindow.document.body.scrollHeight;
            var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
            var height = Math.max(bHeight, dHeight);
            iframe.height = height;
            console.log(height);
        } catch (ex) {
        }
    }

    window.setInterval("reinitIframe()", 200);
</script>

<!--引入底部-->
<footer class="text-center">
    <span>®Copyright 2012-<?php echo date('Y',(isset($data['time']) && ($data['time'] !== '')?$data['time']:time())); ?> WangWeijia. All Rights Reserved</span>
    <br/>
    <span>网站备案：</span>
    <a href="http://www.miitbeian.gov.cn/">蒙ICP备18000539号</a>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo JS_URL; ?>jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo JS_URL; ?>bootstrap.min.js"></script>
</body>
</html>