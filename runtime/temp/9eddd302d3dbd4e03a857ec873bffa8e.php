<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:93:"D:\phpStudy\PHPTutorial\WWW\MyaccTh5./myaccount/report\view\paymentmonthchart\index_list.html";i:1526553861;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>月度收支汇总图-个人记账系统</title>

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
        <!--<h3><?php echo $year; ?>年月度收支汇总图</h3>-->
        <br >
        <!--查询条件-->
        <div style="height: 40px">
            <form class="form-horizontal" method="POST" action="/report.php/report/paymentmonthchart/indexlist">
                <div>
                    <label for="year" class="col-sm-2 control-label hidden-xs">年份：</label>
                    <div class="col-sm-8">
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
                <div class="col-sm-2">
                    <input type="submit" class="btn btn-primary btn-block" value="查询"/>
                </div>

            </form>
        </div>
        <!--数据显示-->
        <div>
            <canvas id="myChart"></canvas>
            <script src="<?php echo JS_URL; ?>Chart.js"></script>
            <script>
                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: [ <?php echo $month; ?> ],
                            datasets: [{
                                label: '收入',
                                data: [ <?php echo $incomeamount; ?> ],
                                backgroundColor: ['red', 'red', 'red', 'red', 'red', 'red', 'red', 'red', 'red', 'red', 'red', 'red'],
                                borderWidth: 1
                            }, {
                                label: '支出',
                                data: [ <?php echo $payamount; ?> ],
                                backgroundColor: ['green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green', 'green'],
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
                                text: <?php echo $year; ?>+"年度收支汇总图"
                            }
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