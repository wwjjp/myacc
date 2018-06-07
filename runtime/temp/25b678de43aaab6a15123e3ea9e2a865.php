<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"D:\phpStudy\PHPTutorial\WWW\MyaccTh5./myaccount/settings\view\passwordupdate\index.html";i:1526041042;}*/ ?>
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
<div class="text-center">
    <div class="work-div">
        <h3>修改密码</h3>
        <form class="form-horizontal" method="POST" action="/settings.php/settings/PasswordUpdate/passwordupdate">
            <input type="hidden" name="id" value="<?php echo \think\Cookie::get('login_id'); ?>">
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label hidden-xs">用户名：</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" id="username" placeholder="用户名"
                           value="<?php echo \think\Cookie::get('login_username'); ?>" placeholder="Disabled input here..." disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label hidden-xs">姓名：</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="姓名"
                           value="<?php echo \think\Cookie::get('login_name'); ?>" placeholder="Disabled input here..." disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="passwordold" class="col-sm-2 control-label hidden-xs">原密码：</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="passwordold" id="passwordold" placeholder="原密码">
                </div>
            </div>
            <div class="form-group">
                <label for="passwordnew1" class="col-sm-2 control-label hidden-xs">新密码：</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="passwordnew1" id="passwordnew1"
                           placeholder="新密码">
                </div>
            </div>
            <div class="form-group">
                <label for="passwordnew2" class="col-sm-2 control-label hidden-xs">确认新密码：</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="passwordnew2" id="passwordnew2"
                           placeholder="确认新密码">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="提交"/>
                <input type="reset" class="btn btn-danger" value="重置"/>
            </div>
        </form>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo JS_URL; ?>jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo JS_URL; ?>bootstrap.min.js"></script>
</body>
</html>