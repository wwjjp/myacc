<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\phpStudy\PHPTutorial\WWW\MyaccTh5./myaccount/index\view\index\login.html";i:1525960554;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>登录-个人记账系统</title>

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
<div style="max-width: 330px;margin-left: auto;margin-right: auto;margin-top: 15%">
    <form class="text-center" name="login_form" method="post" action="/index.php/index/index/login">
        <h2>欢迎使用
            <small>个人记账系统</small>
        </h2>
        <input type="text" class="form-control" placeholder="用户名" name="username">
        <br />
        <input type="password" class="form-control" placeholder="密码" name="password">
        <br />
        <button type="submit" class="btn btn-lg btn-primary btn-block">登录</button>
    </form>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo JS_URL; ?>jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo JS_URL; ?>bootstrap.min.js"></script>
</body>
</html>