<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Tez Dashboard</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="favicon.png" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
    <link href="bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="icon_fonts_assets/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <style type="text/css">
        input{
        text-transform: capitalize;
        }
    </style>
    <link href="icon_fonts_assets/themefy/themify-icons.css" rel="stylesheet">
    <link href="icon_fonts_assets/picons-thin/style.css" rel="stylesheet">
    <style type="text/css">
      body{
        padding: 0;
        margin: 0;
        background: #ccc;
      }
      ul{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        margin: 0;
        padding: 0;
        display: flex;
      }
      ul li{
        list-style: none;
        margin: 0 40px;
      }
      ul li .fa{
        font-size: 40px;
        color: #262626;
        line-height: 80px;
        transition: .5s;
      }
      ul li a{
        text-decoration: none;
        position: relative;
        display: block;
        height: 110px;
        width: 250px;
        background: #fff;
        text-align: center;
        transform: perspective(1000px) rotate(-30deg) skew(25deg) translate(0,0);
        transition: .5s;
        box-shadow: -20px 20px 10px rgba(0,0,0,0.5);
      }
      ul li a:before{
        content: '';
        position: absolute;
        top: 10px;
        left: -20px;
        height: 100%;
        width:20px;
        background: #b1b1b1;
        transition: .5s;
        transform: rotate(0deg) skewY(-45deg);
      }
      ul li a:after{
        content: '';
        position: absolute;
        bottom: -20px;
        left: -10px;
        height: 20px;
        width:100%;
        background: #b1b1b1;
        transition: .5s;
        transform: rotate(0deg) skewX(-45deg);
      }
      ul li a:hover{
        transform: perspective(1000px) rotate(-30deg) skew(25deg) translate(20px,-20px);
        box-shadow: -50px 50px 50px rgba(0,0,0,0.5);
      }
      ul li:hover .fa{
        color: #fff;
      }
      ul li:nth-child(1):hover a{
        background-color: #3b5999;
      }
      ul li:nth-child(1):hover a:before{
        background-color: #2e4a86;
      }
      ul li:nth-child(1):hover a:after{
        background-color: #4a69ad;
      }

      ul li:nth-child(2):hover a{
        background-color: #55acee;
      }
      ul li:nth-child(2):hover a:before{
        background-color: #4184b7;
      }
      ul li:nth-child(2):hover a:after{
        background-color: #4d9fde;
      }

      ul li:nth-child(3):hover a{
        background-color: #dd4b39;
      }
      ul li:nth-child(3):hover a:before{
        background-color: #c13929;
      }
      ul li:nth-child(3):hover a:after{
        background-color: #e8432e;
      }

      ul li:nth-child(4):hover a{
        background-color: #0077B5;
      }
      ul li:nth-child(4):hover a:before{
        background-color: #036aa0;
      }
      ul li:nth-child(4):hover a:after{
        background-color: #0d82bf;
      }

      ul li:nth-child(5):hover a{
        background-color: #e4405f;
      }
      ul li:nth-child(5):hover a:before{
        background-color: #d02d4c;
      }
      ul li:nth-child(5):hover a:after{
        background-color: #f1395c;
      }
    </style>
  <script src="pace/pace.js"></script>
  <link href="pace/themes/blue/pace-theme-corner-indicator.css" rel="stylesheet" />
</head>
<body>
    <ul>
      <li>
        <a href="main.php"><i class="fa"><b style="font-size: 60px;" >KPI</b></i></a>
      </li>
      <li>
        <a href="main.php"><i class="fa" style="line-height: 55px;"><b>Portfolio Snapshot</b></i></a>
      </li>
      <li>
        <a href="main.php"><i class="fa" style="line-height: 55px;"><b>Disbursement Overview</b></i></a>
      </li>
      <li>
        <a href="main.php"><i class="fa picons-thin-icon-thin-0397_analytics_graph_line_statistics_presentation_keynote"></i></a>
      </li>
      <li>
        <a href="main.php"><i class="fa picons-thin-icon-thin-0401_graph_growth_money_stock_inflation"></i></a>
      </li>
    </ul>
		<?php 
		include('script.php');
		?>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js" ></script>
</body>
</html>