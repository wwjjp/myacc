<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:98:"D:\phpStudy\PHPTutorial\WWW\MyaccTh5./myaccount/report\view\paymentclassmonthtable\index_list.html";i:1526542988;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>月度收支分类汇总表-个人记账系统</title>

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
        <h3><?php echo $year; ?>年<?php echo $month; ?>月<?php echo $typename; ?>分类汇总表</h3>
        <!--查询条件-->
        <div style="height: 40px">
            <form class="form-horizontal" method="POST" action="/report.php/report/paymentclassmonthtable/indexlist">
                <div>
                    <label for="year" class="col-sm-1 control-label hidden-xs">年份：</label>
                    <div class="col-sm-2">
                        <select class="form-control" name="year" id="year">
                            <?php if(is_array($yearlist) || $yearlist instanceof \think\Collection || $yearlist instanceof \think\Paginator): $i = 0; $__LIST__ = $yearlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$yearlist): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $yearlist['year']; ?>"
                                    <?php 
                                    if($yearlist[
                            'year'] == $year){ echo 'selected';}
                             ?>
                            ><?php echo $yearlist['year']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="month" class="col-sm-1 control-label hidden-xs">月份：</label>
                    <div class="col-sm-2">
                        <select class="form-control" name="month" id="month">
                            <?php if(is_array($monthlist) || $monthlist instanceof \think\Collection || $monthlist instanceof \think\Paginator): $i = 0; $__LIST__ = $monthlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$monthlist): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $monthlist['month']; ?>"
                                    <?php 
                                    if($monthlist[
                            'month'] == $month){ echo 'selected';}
                             ?>
                            ><?php echo $monthlist['month']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="typename" class="col-sm-1 control-label hidden-xs">类型：</label>
                    <div class="col-sm-2">
                        <select class="form-control" name="typename" id="typename">
                            <option value="收入"
                                    <?php 
                                    if($typename == '收入'){ echo 'selected';}
                             ?>
                            >收入</option>
                            <option value="支出"
                                    <?php 
                                    if($typename == '支出'){ echo 'selected';}
                             ?>
                            >支出</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <input type="submit" class="btn btn-primary btn-block" value="查询"/>
                </div>

            </form>
        </div>
        <!--数据显示-->
        <table class="table table-bordered table-striped" style="margin-top: 15px">
            <tr>
                <th style="text-align: center">编号</th>
                <th style="text-align: center">分类</th>
                <th style="text-align: center">金额</th>
                <th style="text-align: center">操作</th>
            </tr>
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Paymentclassmonthtable): $mod = ($i % 2 );++$i;?>
            <tr

                    <?php 
            //设置字体颜色
            if ($Paymentclassmonthtable['typename'] == '收入' ) { echo "style = \"color:red\""; };
            if ($Paymentclassmonthtable['typename'] == '支出' ) { echo "style = \"color:green\""; };
             ?>
            >
            <td><?php echo $Paymentclassmonthtable['class']; ?></td>
            <td><?php echo $Paymentclassmonthtable['classname']; ?></td>
            <td><?php echo number_format(abs($Paymentclassmonthtable['amount']),2); ?></td>
            <td>
                <a type="btn" class="btn btn-primary btn-xs" href="/report.php/report/paymentclassmonthtable/detaillist/year/<?php echo $year; ?>/month/<?php echo $month; ?>/typename/<?php echo $typename; ?>/class/<?php echo $Paymentclassmonthtable['class']; ?>/classname/<?php echo $Paymentclassmonthtable['classname']; ?>">明细</a>
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