<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:99:"D:\phpStudy\PHPTutorial\WWW\MyaccTh5./myaccount/report\view\paymentclassmonthchart\index_chart.html";i:1526562190;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>月度收支分类统计图-个人记账系统</title>

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
        <!--<h3><?php echo $year; ?>年<?php echo $month; ?>月<?php echo $typename; ?>分类汇总表</h3>-->
        <br />
        <!--查询条件-->
        <div style="height: 40px">
            <form class="form-horizontal" method="POST" action="/report.php/report/paymentclassmonthchart/indexchart">
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
        <div>
            <canvas id="myChart"></canvas>
            <!--引入JS-->
            <script src="<?php echo JS_URL; ?>Chart.js"></script>
            <script>
                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: [ <?php echo $classname; ?> ],
                        datasets: [{
                            label: '分类',
                            data: [ <?php echo $amount; ?> ],
                            backgroundColor: ['Red', 'Blue', 'Purple', 'Yellow', 'Green', 'Black', 'orange', 'Red', 'Blue', 'Purple', 'Yellow', 'Green', 'Black', 'orange', 'Red', 'Blue', 'Purple', 'Yellow', 'Green', 'Black', 'orange', 'Red', 'Blue', 'Purple', 'Yellow', 'Green', 'Black', 'orange', 'Red', 'Blue', 'Purple', 'Yellow', 'Green', 'Black', 'orange', 'Red', 'Blue', 'Purple', 'Yellow', 'Green', 'Black', 'orange'],
                            borderWidth: 1
                        }],
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        },
                        title: {
                            display: true,
                            text: <?php echo $year; ?>+"年"+<?php echo $month; ?>+"月"+"<?php echo $typename; ?>分类汇总图"            }
                    }
                });
            </script>
        </div>

    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo JS_URL; ?>jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo JS_URL; ?>bootstrap.min.js"></script>
</body>
</html>