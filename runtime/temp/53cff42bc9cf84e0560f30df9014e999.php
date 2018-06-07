<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"D:\phpStudy\PHPTutorial\WWW\MyaccTh5./myaccount/record\view\transfer\transferdetail.html";i:1526482773;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>转账记账-个人记账系统</title>

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

        <form class="form-horizontal" method="POST" action="/record.php/record/transfer/save">
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
                <label for="pay_account" class="col-sm-2 control-label hidden-xs">转出：</label>
                <div class="col-sm-10">
                    <select class="form-control" name="pay_account" id="pay_account">
                        <?php if(is_array($payaccountlist) || $payaccountlist instanceof \think\Collection || $payaccountlist instanceof \think\Paginator): $i = 0; $__LIST__ = $payaccountlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$payaccountlist): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $payaccountlist['id']; ?>" <?php  if($pay_account == $payaccountlist['id']) { echo 'selected' ;}  ?>><?php echo $payaccountlist['accname']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="income_account" class="col-sm-2 control-label hidden-xs">转入：</label>
                <div class="col-sm-10">
                    <select class="form-control" name="income_account" id="income_account">
                        <?php if(is_array($incomeaccountlist) || $incomeaccountlist instanceof \think\Collection || $incomeaccountlist instanceof \think\Paginator): $i = 0; $__LIST__ = $incomeaccountlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$incomeaccountlist): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $incomeaccountlist['id']; ?>" <?php  if($income_account == $incomeaccountlist['id']) { echo 'selected' ;}  ?>><?php echo $incomeaccountlist['accname']; ?></option>
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