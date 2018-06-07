<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"D:\phpStudy\PHPTutorial\WWW\MyaccTh5./myaccount/settings\view\classsetting\classdetail.html";i:1526383366;}*/ ?>
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
    <div class="work-div">
        <h3><?php echo $titlename; ?></h3>

        <form class="form-horizontal" method="POST" action="/settings.php/settings/classsetting/save">
            <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="type" class="col-sm-2 control-label hidden-xs">分类：</label>
                <div class="col-sm-10">
                    <select class="form-control" name="type" id="type">
                        <option value="1" <?php  if($type == '收入') { echo 'selected' ;}  ?>>收入</option>
                        <option value="2" <?php  if($type == '支出') { echo 'selected' ;}  ?>>支出</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="classname" class="col-sm-2 control-label hidden-xs">分类名称：</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="classname" id="classname" placeholder="分类名称" value="<?php echo $classname; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="state" class="col-sm-2 control-label hidden-xs">状态：</label>
                <div class="col-sm-10">
                    <select class="form-control" name="state" id="state">
                        <option value="Y" <?php  if($state == '有效') { echo 'selected' ;}  ?>>有效</option>
                        <option value="N" <?php  if($state == '失效') { echo 'selected' ;}  ?>>失效</option>
                    </select>
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