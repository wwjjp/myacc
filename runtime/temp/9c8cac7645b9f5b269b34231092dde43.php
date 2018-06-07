<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"D:\phpStudy\PHPTutorial\WWW\MyaccTh5./myaccount/report\view\index\index_detail_list.html";i:1526485979;}*/ ?>
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
        <h3>日记账明细</h3>
        <table class="table table-bordered table-striped">
            <tr>
                <th style="text-align: center">编号</th>
                <th style="text-align: center">日期</th>
                <th style="text-align: center">摘要</th>
                <th style="text-align: center">类型</th>
                <th style="text-align: center">分类</th>
                <th style="text-align: center">账户</th>
                <th style="text-align: center">金额</th>
                <th style="text-align: center">操作</th>
            </tr>
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$detail): $mod = ($i % 2 );++$i;?>
            <tr

                <?php 
                    //设置字体颜色
                    if ($detail['typename'] == '收入' ) { echo "style = \"color:red\""; };
                    if ($detail['typename'] == '支出' ) { echo "style = \"color:green\""; };
                 ?>
            >
            <td><?php echo $detail['word']; ?>-<?php echo $detail['id']; ?></td>
            <td><?php echo $detail['date']; ?></td>
            <td><?php echo $detail['abstract']; ?></td>
            <td><?php echo $detail['typename']; ?></td>
            <td><?php echo $detail['classname']; ?></td>
            <td><?php echo $detail['accountname']; ?></td>
            <td><?php echo abs($detail['amount']); ?></td>
            <td>
                <a type="btn" class="btn btn-primary btn-xs" href="/report.php/report/index/edit/word/<?php echo $detail['word']; ?>/typename/<?php echo $detail['typename']; ?>/id/<?php echo $detail['id']; ?>">编辑</a>
                <a type="btn" class="btn btn-danger btn-xs" href="/report.php/report/index/del/word/<?php echo $detail['word']; ?>/typename/<?php echo $detail['typename']; ?>/id/<?php echo $detail['id']; ?>">删除</a>
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