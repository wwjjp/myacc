<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"D:\phpStudy\PHPTutorial\WWW\MyaccTh5/myaccount/record\view\income\incomedetail.html";i:1526480042;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>收入记账-个人记账系统</title>

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

        <form class="form-horizontal" method="POST" action="/record.php/record/income/save">
            <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="date" class="col-sm-2 control-label hidden-xs">日期：</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="date" id="date" placeholder="日期" value="<?php echo $date; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="abstract" class="col-sm-2 control-label hidden-xs">摘要：</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="abstract" id="abstract" placeholder="摘要" value="<?php echo $abstract; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="type" class="col-sm-2 control-label hidden-xs">类型：</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="type" id="type" placeholder="类型" value="<?php echo $type; ?>" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="class" class="col-sm-2 control-label hidden-xs">分类：</label>
                <div class="col-sm-10">
                    <select class="form-control" name="class" id="class">
                        <?php if(is_array($classlist) || $classlist instanceof \think\Collection || $classlist instanceof \think\Paginator): $i = 0; $__LIST__ = $classlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$classlist): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $classlist['id']; ?>" <?php  if($class == $classlist['id']) { echo 'selected' ;}  ?>><?php echo $classlist['classname']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="account" class="col-sm-2 control-label hidden-xs">账户：</label>
                <div class="col-sm-10">
                    <select class="form-control" name="account" id="account">
                        <?php if(is_array($accountlist) || $accountlist instanceof \think\Collection || $accountlist instanceof \think\Paginator): $i = 0; $__LIST__ = $accountlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$accountlist): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $accountlist['id']; ?>" <?php  if($account == $accountlist['id']) { echo 'selected' ;}  ?>><?php echo $accountlist['accname']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="amount" class="col-sm-2 control-label hidden-xs">金额：</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="amount" id="amount" placeholder="金额" value="<?php echo $amount; ?>">
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