<!DOCTYPE html>
<?php
@session_start();
include './common/FunctionCheckActive.php';
include './common/Permission.php';

ACTIVEPAGES(1);
?>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->

        <title> <?= $_SESSION["title"] ?></title>

        <!-- Bootstrap -->
        <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="../build/css/custom.min.css" rel="stylesheet">
        <link href="images/favicon.ico" rel="icon" type="image/ico" />
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <!-- menu content -->
                <?php require_once './content/menu_content.php' ?>
                <!-- /menu content -->

                <!-- top navigation -->
                <?php require_once './content/top_content.php' ?>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">


                    <div class="row">
                        <div class="row top_tiles">
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="newsletter.php">
                                    <div class="tile-stats">

                                        <div class="icon" style="right: 70px;"><i class="fa fa-newspaper-o"> </i> </div>
                                        <div class="count"><span id="lb_newsletter"></span></div>

                                        <h3><?= $_SESSION["newsletter"] ?></h3>
                                        <p><?= $_SESSION["lb_box1_msg"] ?></p>

                                    </div>
                                </a>
                            </div>
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="contacts.php">
                                    <div class="tile-stats">
                                        <div class="icon" style="right: 70px;"><i class="fa fa-comments-o"></i></div>
                                        <div class="count"><span id="lb_contacts"></span></div>
                                        <h3><?= $_SESSION["contacts"] ?></h3>
                                        <p><?= $_SESSION["lb_box2_msg"] ?></p>
                                    </div>
                                </a>
                            </div>
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="devices.php">
                                    <div class="tile-stats">
                                        <div class="icon" style="right: 70px;"><i class="fa fa-suitcase"></i></div>
                                        <div class="count"><span id="lb_device"></span></div>
                                        <h3><?= $_SESSION["devices"] ?></h3>
                                        <p><?= $_SESSION["lb_box3_msg"] ?></p>
                                    </div>
                                </a>
                            </div>
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="cosme.php">
                                    <div class="tile-stats">
                                        <div class="icon" style="right: 50px;"><i class="fa fa-flask"></i></div>
                                        <div class="count"><span id="lb_cosme"></span></div>
                                        <h3> <?= $_SESSION["cosmeceuticals"] ?></h3>
                                        <p><?= $_SESSION["lb_box4_msg"] ?></p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2><?= $_SESSION["lb_morris"] ?> </h2>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div id="graph_bar" style="width:100%; height:350px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2><?= $_SESSION["lb_donut_header"] ?></h2>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                        <div id="echart_donut" style="height:350px;"></div>

                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="row" >

                    </div>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <?php require_once './content/footer_content.php' ?>
                <!-- /footer content -->
            </div>
        </div>

        <!-- jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="../vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="../vendors/nprogress/nprogress.js"></script>
        <!-- Chart.js -->
        <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
        <!-- jQuery Sparklines -->
        <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
        <!-- Flot -->
        <script src="../vendors/Flot/jquery.flot.js"></script>
        <script src="../vendors/Flot/jquery.flot.pie.js"></script>
        <script src="../vendors/Flot/jquery.flot.time.js"></script>
        <script src="../vendors/Flot/jquery.flot.stack.js"></script>
        <script src="../vendors/Flot/jquery.flot.resize.js"></script>
        <!-- Flot plugins -->
        <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
        <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
        <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
        <!-- DateJS -->
        <script src="../vendors/DateJS/build/date.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="js/moment/moment.min.js"></script>
        <script src="js/datepicker/daterangepicker.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>

        <!-- morris.js -->
        <script src="../vendors/raphael/raphael.min.js"></script>
        <script src="../vendors/morris.js/morris.min.js"></script>

        <!-- ECharts -->
        <script src="../vendors/echarts/dist/echarts.min.js"></script>
        <script src="../vendors/echarts/map/js/world.js"></script>


        <script>
            $(document).ready(function () {
                unloading();
            });
        </script>
        <?php
        include './controller/dashboardController.php';
        include './service/dashboardService.php';
        $dash = new dashboardController();
        ?>

        <script>
            $(document).ready(function () {
                initial();
                unloading();
            });


            function initial() {

                $.ajax({
                    type: 'GET',
                    url: 'controller/dashboardController.php?func=initialtopContent',
                    //data: Jsdata,
                    beforeSend: function ()
                    {
//                        $('#se-pre-con').fadeIn(100);
                    },
                    success: function (data) {
                        var res = JSON.parse(data);
                        $.each(res, function (i, item) {
                            $("#lb_newsletter").text(item.newsletter);
                            $("#lb_contacts").text(item.contacts);
                            $("#lb_device").text(item.devices);
                            $("#lb_cosme").text(item.cosme);
                        });
                        MorrisBar();
                        $('#se-pre-con').delay(100).fadeOut();
                    },
                    error: function (data) {
                        var res = JSON.parse(data.responseText);
                        $.each(res, function (i, item) {
                            $("#lb_newsletter").text(item.newsletter);
                            $("#lb_contacts").text(item.contacts);
                            $("#lb_device").text(item.devices);
                            $("#lb_cosme").text(item.cosme);
                        });
                        MorrisBar();
                        $('#se-pre-con').delay(100).fadeOut();

                    }

                });
            }


            function MorrisBar() {
                Morris.Bar({
                    element: 'graph_bar',
                    data: [
                        {date: '<?= $dash->range_date(9) ?>', qty: <?= (integer) $dash->qty_by_date(9) ?>},
                        {date: '<?= $dash->range_date(8) ?>', qty: <?= (integer) $dash->qty_by_date(8) ?>},
                        {date: '<?= $dash->range_date(7) ?>', qty: <?= (integer) $dash->qty_by_date(7) ?>},
                        {date: '<?= $dash->range_date(6) ?>', qty: <?= (integer) $dash->qty_by_date(6) ?>},
                        {date: '<?= $dash->range_date(5) ?>', qty: <?= (integer) $dash->qty_by_date(5) ?>},
                        {date: '<?= $dash->range_date(4) ?>', qty: <?= (integer) $dash->qty_by_date(4) ?>},
                        {date: '<?= $dash->range_date(3) ?>', qty: <?= (integer) $dash->qty_by_date(3) ?>},
                        {date: '<?= $dash->range_date(2) ?>', qty: <?= (integer) $dash->qty_by_date(2) ?>},
                        {date: '<?= $dash->range_date(1) ?>', qty: <?= (integer) $dash->qty_by_date(1) ?>},
                        {date: '<?= $dash->range_date(0) ?>', qty: <?= (integer) $dash->qty_by_date(0) ?>}
                    ]
                    ,
                    xkey: 'date',
                    ykeys: ['qty'],
                    labels: ['<?= $_SESSION["lb_morris_qty"] ?>'],
                    barRatio: 0.4,
                    barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
                    xLabelAngle: 35,
                    hideHover: 'auto',
                    resize: true
                });





            }
            $MENU_TOGGLE.on('click', function () {
                $(window).resize();
            });

        </script>



        <script>

            var theme = {
                color: [
                    '#9B59B6', '#34495E', '#759c6a', '#bfd3b7',
                    '#26B99A', '#34495E', '#BDC3C7', '#3498DB'
                ],
                title: {
                    itemGap: 8,
                    textStyle: {
                        fontWeight: 'normal',
                        color: '#408829'
                    }
                },
                dataRange: {
                    color: ['#1f610a', '#97b58d']
                },
                toolbox: {
                    color: ['#408829', '#408829', '#408829', '#408829']
                },
                tooltip: {
                    backgroundColor: 'rgba(0,0,0,0.5)',
                    axisPointer: {
                        type: 'line',
                        lineStyle: {
                            color: '#408829',
                            type: 'dashed'
                        },
                        crossStyle: {
                            color: '#408829'
                        },
                        shadowStyle: {
                            color: 'rgba(200,200,200,0.3)'
                        }
                    }
                },
                dataZoom: {
                    dataBackgroundColor: '#eee',
                    fillerColor: 'rgba(64,136,41,0.2)',
                    handleColor: '#408829'
                },
                grid: {
                    borderWidth: 0
                },
                categoryAxis: {
                    axisLine: {
                        lineStyle: {
                            color: '#408829'
                        }
                    },
                    splitLine: {
                        lineStyle: {
                            color: ['#eee']
                        }
                    }
                },
                valueAxis: {
                    axisLine: {
                        lineStyle: {
                            color: '#408829'
                        }
                    },
                    splitArea: {
                        show: true,
                        areaStyle: {
                            color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                        }
                    },
                    splitLine: {
                        lineStyle: {
                            color: ['#eee']
                        }
                    }
                },
                timeline: {
                    lineStyle: {
                        color: '#408829'
                    },
                    controlStyle: {
                        normal: {color: '#408829'},
                        emphasis: {color: '#408829'}
                    }
                },
                k: {
                    itemStyle: {
                        normal: {
                            color: '#68a54a',
                            color0: '#a9cba2',
                            lineStyle: {
                                width: 1,
                                color: '#408829',
                                color0: '#86b379'
                            }
                        }
                    }
                },
                map: {
                    itemStyle: {
                        normal: {
                            areaStyle: {
                                color: '#ddd'
                            },
                            label: {
                                textStyle: {
                                    color: '#c12e34'
                                }
                            }
                        },
                        emphasis: {
                            areaStyle: {
                                color: '#99d2dd'
                            },
                            label: {
                                textStyle: {
                                    color: '#c12e34'
                                }
                            }
                        }
                    }
                },
                force: {
                    itemStyle: {
                        normal: {
                            linkStyle: {
                                strokeColor: '#408829'
                            }
                        }
                    }
                },
                chord: {
                    padding: 4,
                    itemStyle: {
                        normal: {
                            lineStyle: {
                                width: 1,
                                color: 'rgba(128, 128, 128, 0.5)'
                            },
                            chordStyle: {
                                lineStyle: {
                                    width: 1,
                                    color: 'rgba(128, 128, 128, 0.5)'
                                }
                            }
                        },
                        emphasis: {
                            lineStyle: {
                                width: 1,
                                color: 'rgba(128, 128, 128, 0.5)'
                            },
                            chordStyle: {
                                lineStyle: {
                                    width: 1,
                                    color: 'rgba(128, 128, 128, 0.5)'
                                }
                            }
                        }
                    }
                },
                gauge: {
                    startAngle: 225,
                    endAngle: -45,
                    axisLine: {
                        show: true,
                        lineStyle: {
                            color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                            width: 8
                        }
                    },
                    axisTick: {
                        splitNumber: 10,
                        length: 12,
                        lineStyle: {
                            color: 'auto'
                        }
                    },
                    axisLabel: {
                        textStyle: {
                            color: 'auto'
                        }
                    },
                    splitLine: {
                        length: 18,
                        lineStyle: {
                            color: 'auto'
                        }
                    },
                    pointer: {
                        length: '90%',
                        color: 'auto'
                    },
                    title: {
                        textStyle: {
                            color: '#333'
                        }
                    },
                    detail: {
                        textStyle: {
                            color: 'auto'
                        }
                    }
                },
                textStyle: {
                    fontFamily: 'Arial, Verdana, sans-serif'
                }
            };













            var echartDonut = echarts.init(document.getElementById('echart_donut'), theme);

            echartDonut.setOption({
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },
                calculable: true,
                legend: {
                    x: 'center',
                    y: 'bottom',
                    data: ['<?= $_SESSION["lb_newsletter_category_all"] ?>', '<?= $_SESSION["lb_newsletter_category_1"] ?>',
                        '<?= $_SESSION["lb_newsletter_category_2"] ?>', '<?= $_SESSION["lb_newsletter_category_3"] ?>',
                        '<?= $_SESSION["lb_newsletter_category_4"] ?>']
                },
                toolbox: {
                    show: true,
                    feature: {
                        magicType: {
                            show: true,
                            type: ['pie', 'funnel'],
                            option: {
                                funnel: {
                                    x: '25%',
                                    width: '50%',
                                    funnelAlign: 'center',
                                    max: 1548
                                }
                            }
                        },
                        restore: {
                            show: false,
                            title: "Restore"
                        },
                        saveAsImage: {
                            show: true,
                            title: "Save Image"
                        }
                    }
                },
                series: [{
                        name: '<?= $_SESSION["lb_donut_1"] ?>',
                        type: 'pie',
                        radius: ['35%', '55%'],
                        itemStyle: {
                            normal: {
                                label: {
                                    show: true
                                },
                                labelLine: {
                                    show: true
                                }
                            },
                            emphasis: {
                                label: {
                                    show: true,
                                    position: 'center',
                                    textStyle: {
                                        fontSize: '14',
                                        fontWeight: 'normal'
                                    }
                                }
                            }
                        },
                        data: [
                            {
                                value: <?= (integer) $dash->donut_by_type(0) ?>,
                                name: '<?= $_SESSION["lb_newsletter_category_all"] ?>'
                            },
                            {
                                value: <?= (integer) $dash->donut_by_type(1) ?>,
                                name: '<?= $_SESSION["lb_newsletter_category_1"] ?>'
                            },
                            {
                                value: <?= (integer) $dash->donut_by_type(2) ?>,
                                name: '<?= $_SESSION["lb_newsletter_category_2"] ?>'
                            },
                            {
                                value: <?= (integer) $dash->donut_by_type(3) ?>,
                                name: '<?= $_SESSION["lb_newsletter_category_3"] ?>'
                            },
                            {
                                value: <?= (integer) $dash->donut_by_type(4) ?>,
                                name: '<?= $_SESSION["lb_newsletter_category_4"] ?>'
                            }
                        ]
                    }]
            });













        </script>
    </body>
</html>