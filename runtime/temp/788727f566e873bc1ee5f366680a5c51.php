<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"D:\phpStudy\PHPTutorial\WWW\MyaccTh5./myaccount/settings\view\usersetting\userdetail.html";i:1526392640;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>用户设置-个人记账系统</title>

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
        <h3><?php echo $titlename; ?></h3>

        <form class="form-horizontal" method="POST" action="/settings.php/settings/usersetting/save">
            <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
            <div class="form-group" >
                <label for="username" class="col-sm-2 control-label hidden-xs">用户名：</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" id="username" placeholder="用户名" value="<?php echo $username; ?>"
                           <?php 
                                if ($id != '0' ) { echo "disabled"; };
                             ?>
                    >
                </div>
            </div>
            <div class="form-group"
                 <?php 
                    if ($id != '0' ) { echo "style = \"display: none\""; };
                  ?>
                >
                <label for="password" class="col-sm-2 control-label hidden-xs">密码：</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="password" placeholder="密码" value="<?php echo $password; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label hidden-xs">姓名：</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="姓名" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="telphone" class="col-sm-2 control-label hidden-xs">电话：</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="telphone" id="telphone" placeholder="电话" value="<?php echo $telphone; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="note" class="col-sm-2 control-label hidden-xs">备注：</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="note" id="note" placeholder="备注" value="<?php echo $note; ?>">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="提交"/>
                <input type="reset" class="btn btn-danger" value="重置">
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