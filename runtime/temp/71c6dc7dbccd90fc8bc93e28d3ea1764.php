<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"D:\phpStudy\PHPTutorial\WWW\MyaccTh5./myaccount/settings\view\about\index.html";i:1526521747;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>关于软件-个人记账系统</title>

    <!-- Bootstrap -->
    <link href="<?php echo CSS_URL; ?>bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?php echo JS_URL; ?>html5shiv.min.js"></script>
    <script src="<?php echo JS_URL; ?>respond.min.js"></script>
    <![endif]-->
    <style>
        .work-div {
            max-width: 960px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>

<div class="work-div">
    <h2 class="text-center">关于软件</h2>
    <p><strong>软件名称：</strong>个人记账系统</p>
    <p><strong>当前版本：</strong>V2.0.0</p>
    <p><strong>开发环境：</strong>php+mysql+bootstrap+ThinkPHP</p>
    <p><strong>开发人员：</strong>飞跃无极限</p>
    <p><strong>APP下载：</strong><a type="btn" class="btn btn-primary btn-xs" href="soft/myaccountapp.apk">点击下载</a></p>
    <p><strong>更新说明：</strong></p>
    <p style="text-indent: 2em"><strong>2018-05-20：V2.0.0</strong></p>
    <p style="text-indent: 2em"><span class="glyphicon glyphicon-asterisk">采用ThinkPHP5.0.19框架重构</span></p>
    <p style="text-indent: 2em"><span class="glyphicon glyphicon-asterisk">取消收支明细查询</span></p>
    <p style="text-indent: 2em"><span class="glyphicon glyphicon-asterisk">取消转账明细查询</span></p>
    <p style="text-indent: 2em"><strong>2018-03-29：V1.2.0</strong></p>
    <p style="text-indent: 2em"><span class="glyphicon glyphicon-asterisk">新增收支日统计图功能</span></p>
    <p style="text-indent: 2em"><strong>2018-03-22：V1.1.2</strong></p>
    <p style="text-indent: 2em"><span class="glyphicon glyphicon-asterisk">修订账户余额按金额排序</span></p>
    <p style="text-indent: 2em"><strong>2018-03-15：V1.1.1</strong></p>
    <p style="text-indent: 2em"><span class="glyphicon glyphicon-asterisk">修订一些bug</span></p>
    <p style="text-indent: 2em"><strong>2018-03-14：V1.1.0</strong></p>
    <p style="text-indent: 2em"><span class="glyphicon glyphicon-asterisk">新增APP功能</span></p>
    <p style="text-indent: 2em"><strong>2018-03-13：V1.0.0</strong></p>
    <p style="text-indent: 2em"><span class="glyphicon glyphicon-asterisk">初始版本,具备记账、查询、设置等基本功能</span></p>
    <br/>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo JS_URL; ?>jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo JS_URL; ?>bootstrap.min.js"></script>
</body>
</html>