<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"D:\phpStudy\PHPTutorial\WWW\MyaccTh5./myaccount/settings\view\usersetting\index.html";i:1526389890;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>账户设置-个人记账系统</title>

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
    <div class="table-responsive work-div">
        <h3>账户基本信息</h3>
        <table class="table table-bordered table-striped">
            <tr>
                <th style="text-align: center">编号</th>
                <th style="text-align: center">用户名</th>
                <th style="text-align: center">姓名</th>
                <th style="text-align: center">电话</th>
                <th style="text-align: center">备注</th>
                <th style="text-align: center">
                    <a type="btn" class="btn btn-success btn-xs"  href="/settings.php/settings/usersetting/add" target="work">添加账户</a>
                </th>
            </tr>
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['telphone']; ?></td>
                <td><?php echo $user['note']; ?></td>
            <td>
                <a type="btn" class="btn btn-primary btn-xs" href="/settings.php/settings/usersetting/edit/id/<?php echo $user['id']; ?>"  target="work">编辑</a>
                <a type="btn" class="btn btn-danger btn-xs" href="/settings.php/settings/usersetting/del/id/<?php echo $user['id']; ?>"  target="work">删除</a>
                <a type="btn" class="btn btn-warning btn-xs" href="/settings.php/settings/usersetting/resetpassword/id/<?php echo $user['id']; ?>"  target="work">重置密码</a>
            </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <!--分页处理-->
        <?php echo $list->render(); ?>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo JS_URL; ?>jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo JS_URL; ?>bootstrap.min.js"></script>
</body>
</html>