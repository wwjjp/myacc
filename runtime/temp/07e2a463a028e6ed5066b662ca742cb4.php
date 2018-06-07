<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"D:\phpStudy\PHPTutorial\WWW\MyaccTh5./myaccount/report\view\paymentdaychart\index_chart.html";i:1526564272;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>日收支汇总图-个人记账系统</title>

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
        <!--<h3></h3>-->
        <br >
        <!--查询条件-->
        <div style="height: 40px">
            <form class="form-horizontal" method="POST" action="/report.php/report/paymentdaychart/indexchart">
                <div>
                    <label for="begindate" class="col-sm-2 control-label hidden-xs">开始日期：</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="date" name="begindate" id="begindate" value="<?php echo $begindate; ?>" pattern="开始日期">
                    </div>
                </div>
                <div>
                    <label for="enddate" class="col-sm-2 control-label hidden-xs">结束日期：</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="date" name="enddate" id="enddate" value="<?php echo $enddate; ?>" pattern="结束日期">
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
                    type: 'line',
                    data: {
                        labels: [ <?php echo $date; ?> ],
                        datasets: [{
                            label: '收入',
                            data: [ <?php echo $incomeamount; ?> ],
                            borderColor: ['red'],
                            backgroundColor: ['rgba(0, 0, 0, 0.0)']

                        },
                            {
                                label: '支出',
                                data: [ <?php echo $payamount; ?> ],
                                borderColor: ['green'],
                                backgroundColor: ['rgba(0, 0, 0, 0.0)']
                            }
                        ],
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
                            text: '2018-05-01至2018-05-17的日收支统计图'            }
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