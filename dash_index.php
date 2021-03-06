<?php
ob_start();
date_default_timezone_set("America/Sao_Paulo");
//error_reporting(0);
//error_reporting(E_WARNING);
header('Content-type: text/html; charset=utf-8');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
try {


    session_start();

    $script = '';
    if (isset($_SESSION['msg'])) {
        $script = " toast('" . $_SESSION['msg'] . "'); ";
        unset($_SESSION['msg']);
    }

    $content = 'home';
    if (isset($_GET['p'])) {
        $content = $_GET['p'];
        //$css_pages = "<link rel='stylesheet' href='./css/pages.css' type='text/css' />\n\t";
        //$script = "$('html').animate({ scrollTop: 00 }, 200); ";
    }

    $title = ucwords(str_replace("_", " ", (" &middot; " . $content)));
    if (isset($_GET['s'])) {
        $title = ucwords(str_replace("_", " ", (" &middot; " . $_GET['s']))) . $title;
    }

    $require = './partial/' . $content . '.php';
    if (!file_exists($require)) {
        header("HTTP/1.0 404 Not Found");
        header("Status: 404 Not Found");
        $require = './partial/404.php';
    }
} catch (Exception $ex) {
    echo "<h1>Houve um Erro ao processar esta Página!</h1><p>Informe ao desenvolvedor:</p><br /><pre>";
    echo $ex;
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from simpliq.bootstrapmaster.com/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 19 Mar 2014 13:08:24 GMT -->
    <head>

        <!-- start: Meta -->
        <meta charset="utf-8">
        <title>SR-PHP-CMRV</title>
        <meta name="description" content="SR-PHP-CMRV">
        <meta name="author" content="SOFT-ROM Sistemas">
        <meta name="keyword" content="SOFT-ROM Sistemas">
        <!-- end: Meta -->

        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- end: Mobile Specific -->

        <!-- start: CSS -->
        <link href="V/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="V/bootstrap/lib_css/style.min.css" rel="stylesheet">
        <link href="V/bootstrap/lib_css/retina.min.css" rel="stylesheet">
        <!-- end: CSS -->


        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>

                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
                <script src="V/bootstrap/lib_js/respond.min.js"></script>
                <script src="bootstrap/lib_css/ie6-8.css"></script>

        <![endif]-->

        <!-- start: Favicon and Touch Icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="M/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="M/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="M/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="M/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="favicon.ico">
        <!-- end: Favicon and Touch Icons -->

    </head>

    <body>
        <!-- start: Header -->
        <header class="navbar">
            <div class="container">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".sidebar-nav.nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="main-menu-toggle" class="hidden-xs open"><i class="fa fa-bars"></i></a>
                <a class="navbar-brand col-lg-2 col-sm-1 col-xs-12" href="./"><span>SOFT-ROM Sistemas</span></a>
                <!-- start: Header Menu -->
                <div class="nav-no-collapse header-nav">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown hidden-xs">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-warning"></i>
                            </a>
                            <ul class="dropdown-menu notifications">
                                <li class="dropdown-menu-title">
                                    <span>You have 11 notifications</span>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon blue"><i class="fa fa-user"></i></span>
                                        <span class="message">New user registration</span>
                                        <span class="time">1 min</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon green"><i class="fa fa-comment"></i></span>
                                        <span class="message">New comment</span>
                                        <span class="time">7 min</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon green"><i class="fa fa-comment"></i></span>
                                        <span class="message">New comment</span>
                                        <span class="time">8 min</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon green"><i class="fa fa-comment"></i></span>
                                        <span class="message">New comment</span>
                                        <span class="time">16 min</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon blue"><i class="fa fa-user"></i></span>
                                        <span class="message">New user registration</span>
                                        <span class="time">36 min</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon yellow"><i class="fa fa-shopping-cart"></i></span>
                                        <span class="message">2 items sold</span>
                                        <span class="time">1 hour</span>
                                    </a>
                                </li>
                                <li class="warning">
                                    <a href="#">
                                        <span class="icon red"><i class="fa fa-user"></i></span>
                                        <span class="message">User deleted account</span>
                                        <span class="time">2 hour</span>
                                    </a>
                                </li>
                                <li class="warning">
                                    <a href="#">
                                        <span class="icon red"><i class="fa fa-shopping-cart"></i></span>
                                        <span class="message">Transaction was canceled</span>
                                        <span class="time">6 hour</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon green"><i class="fa fa-comment"></i></span>
                                        <span class="message">New comment</span>
                                        <span class="time">yesterday</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon blue"><i class="fa fa-user"></i></span>
                                        <span class="message">New user registration</span>
                                        <span class="time">yesterday</span>
                                    </a>
                                </li>
                                <li class="dropdown-menu-sub-footer">
                                    <a>View all notifications</a>
                                </li>
                            </ul>
                        </li>
                        <!-- start: Notifications Dropdown -->
                        <li class="dropdown hidden-xs">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-tasks"></i>
                            </a>
                            <ul class="dropdown-menu tasks">
                                <li>
                                    <span class="dropdown-menu-title">You have 17 tasks in progress</span>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="header">
                                            <span class="title">iOS Development</span>
                                            <span class="percent"></span>
                                        </span>
                                        <div class="taskProgress progressSlim progressBlue">80</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="header">
                                            <span class="title">Android Development</span>
                                            <span class="percent"></span>
                                        </span>
                                        <div class="taskProgress progressSlim progressYellow">47</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="header">
                                            <span class="title">Django Project For Google</span>
                                            <span class="percent"></span>
                                        </span>
                                        <div class="taskProgress progressSlim progressRed">32</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="header">
                                            <span class="title">SEO for new sites</span>
                                            <span class="percent"></span>
                                        </span>
                                        <div class="taskProgress progressSlim progressGreen">63</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="header">
                                            <span class="title">New blog posts</span>
                                            <span class="percent"></span>
                                        </span>
                                        <div class="taskProgress progressSlim progressPink">80</div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-menu-sub-footer">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- end: Notifications Dropdown -->
                        <!-- start: Message Dropdown -->
                        <li class="dropdown hidden-xs">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i>
                            </a>
                            <ul class="dropdown-menu messages">
                                <li>
                                    <span class="dropdown-menu-title">You have 9 messages</span>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="avatar"><img src="assets/img/avatar.jpg" alt="Avatar"></span>
                                        <span class="header">
                                            <span class="from">
                                                Łukasz Holeczek
                                            </span>
                                            <span class="time">
                                                6 min
                                            </span>
                                        </span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="avatar"><img src="assets/img/avatar2.jpg" alt="Avatar"></span>
                                        <span class="header">
                                            <span class="from">
                                                Megan Abott
                                            </span>
                                            <span class="time">
                                                56 min
                                            </span>
                                        </span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="avatar"><img src="assets/img/avatar3.jpg" alt="Avatar"></span>
                                        <span class="header">
                                            <span class="from">
                                                Kate Ross
                                            </span>
                                            <span class="time">
                                                3 hours
                                            </span>
                                        </span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="avatar"><img src="assets/img/avatar4.jpg" alt="Avatar"></span>
                                        <span class="header">
                                            <span class="from">
                                                Julie Blank
                                            </span>
                                            <span class="time">
                                                yesterday
                                            </span>
                                        </span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="avatar"><img src="assets/img/avatar5.jpg" alt="Avatar"></span>
                                        <span class="header">
                                            <span class="from">
                                                Jane Sanders
                                            </span>
                                            <span class="time">
                                                Jul 25, 2012
                                            </span>
                                        </span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-menu-sub-footer">View all messages</a>
                                </li>
                            </ul>
                        </li>
                        <!-- end: Message Dropdown -->
                        <li>
                            <a class="btn" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                        </li>
                        <!-- start: User Dropdown -->
                        <li class="dropdown">
                            <a class="btn account dropdown-toggle" data-toggle="dropdown" href="#">
                                <div class="avatar"><img src="assets/img/avatar.jpg" alt="Avatar"></div>
                                <div class="user">
                                    <span class="hello">Welcome!</span>
                                    <span class="name">Łukasz Holeczek</span>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-menu-title">

                                </li>
                                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> Messages</a></li>
                                <li><a href="login.html"><i class="fa fa-off"></i> Logout</a></li>
                            </ul>
                        </li>
                        <!-- end: User Dropdown -->
                    </ul>
                </div>
                <!-- end: Header Menu -->

            </div>
        </header>
        <!-- end: Header -->

        <div class="container">
            <div class="row">

                <!-- start: Main Menu -->
                <div id="sidebar-left" class="col-lg-2 col-sm-1">

                    <input type="text" class="search hidden-sm" placeholder="..." />

                    <div class="nav-collapse sidebar-nav collapse navbar-collapse bs-navbar-collapse">
                        <ul class="nav nav-tabs nav-stacked main-menu">
                            <li><a href="./"><i class="fa fa-bar-chart-o"></i><span class="hidden-sm"> Dashboard</span></a></li>
                            <li>
                                <a class="dropmenu" href="#"><i class="fa fa-eye"></i><span class="hidden-sm"> UI Features</span> <span class="label">3</span></a>
                                <ul>
                                    <li><a class="submenu" href="ui-sliders-progress.html"><i class="fa fa-eye"></i><span class="hidden-sm"> Sliders & Progress</span></a></li>
                                    <li><a class="submenu" href="ui-nestable-list.html"><i class="fa fa-eye"></i><span class="hidden-sm"> Nestable Lists</span></a></li>
                                    <li><a class="submenu" href="ui-elements.html"><i class="fa fa-eye"></i><span class="hidden-sm"> Elements</span></a></li>
                                </ul>
                            </li>
                            <li><a href="widgets.html"><i class="fa fa-dashboard"></i><span class="hidden-sm"> Widgets</span></a></li>
                            <li>
                                <a class="dropmenu" href="#"><i class="fa fa-folder-o"></i><span class="hidden-sm"> Example Pages</span> <span class="label">3</span></a>
                                <ul>
                                    <li><a class="submenu" href="page-infrastructure.html"><i class="fa fa-hdd-o"></i><span class="hidden-sm"> Infrastructure</span></a></li>
                                    <li><a class="submenu" href="page-inbox.html"><i class="fa fa-envelope"></i><span class="hidden-sm"> Inbox</span></a></li>
                                    <li><a class="submenu" href="page-todo.html"><i class="fa fa-tasks"></i><span class="hidden-sm"> ToDo & Timeline</span></a></li>
                                    <!-- Profile Page - Cooming Soone
                                    <li><a class="submenu" href="page-profile.html"><i class="fa fa-male"></i><span class="hidden-sm"> User Profile</span></a></li>
                                    -->
                                </ul>
                            </li>
                            <li>
                                <a class="dropmenu" href="#"><i class="fa fa-edit"></i><span class="hidden-sm"> Forms</span> <span class="label">3</span></a>
                                <ul>
                                    <li><a class="submenu" href="form-elements.html"><i class="fa fa-edit"></i><span class="hidden-sm"> Form elements</span></a></li>
                                    <li><a class="submenu" href="form-wizard.html"><i class="fa fa-edit"></i><span class="hidden-sm"> Wizard</span></a></li>
                                    <li><a class="submenu" href="form-dropzone.html"><i class="fa fa-edit"></i><span class="hidden-sm"> Dropzone Upload</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="dropmenu" href="#"><i class="fa fa-list-alt"></i><span class="hidden-sm"> Charts</span> <span class="label">3</span></a>
                                <ul>
                                    <li><a class="submenu" href="charts-flot.html"><i class="fa fa-list-alt"></i><span class="hidden-sm"> Flot Charts</span></a></li>
                                    <li><a class="submenu" href="charts-xcharts.html"><i class="fa fa-list-alt"></i><span class="hidden-sm"> xCharts</span></a></li>
                                    <li><a class="submenu" href="charts-others.html"><i class="fa fa-list-alt"></i><span class="hidden-sm"> Other</span></a></li>
                                </ul>

                            </li>
                            <li><a href="typography.html"><i class="fa fa-font"></i><span class="hidden-sm"> Typography</span></a></li>
                            <li><a href="gallery.html"><i class="fa fa-picture-o"></i><span class="hidden-sm"> Gallery</span></a></li>
                            <li><a href="table.html"><i class="fa fa-align-justify"></i><span class="hidden-sm"> Tables</span></a></li>
                            <li><a href="calendar.html"><i class="fa fa-calendar"></i><span class="hidden-sm"> Calendar</span></a></li>
                            <li><a href="file-manager.html"><i class="fa fa-folder-open"></i><span class="hidden-sm"> File Manager</span></a></li>
                            <li>
                                <a class="dropmenu" href="#"><i class="fa fa-star"></i><span class="hidden-sm"> Icons</span> <span class="label">5</span></a>
                                <ul>
                                    <li><a class="submenu" href="icons-halflings.html"><i class="fa fa-star"></i><span class="hidden-sm"> Halflings</span></a></li>
                                    <li><a class="submenu" href="icons-glyphicons-pro.html"><i class="fa fa-star"></i><span class="hidden-sm"> Glyphicons PRO</span></a></li>
                                    <li><a class="submenu" href="icons-filetypes.html"><i class="fa fa-star"></i><span class="hidden-sm"> Filetypes</span></a></li>
                                    <li><a class="submenu" href="icons-social.html"><i class="fa fa-star"></i><span class="hidden-sm"> Social</span></a></li>
                                    <li><a class="submenu" href="icons-font-awesome.html"><i class="fa fa-star"></i><span class="hidden-sm"> Font Awesome</span></a></li>
                                </ul>
                            </li>
                            <li><a href="login.html"><i class="fa fa-lock"></i><span class="hidden-sm"> Login Page</span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- end: Main Menu -->

                <!-- start: Content -->
                <div id="content" class="col-lg-10 col-sm-11">


                    <div class="row">

                        <div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
                            <div class="smallstat box">
                                <div class="boxchart-overlay blue">
                                    <div class="boxchart">5,6,7,2,0,4,2,4,8,2,3,3,2</div>
                                </div>
                                <span class="title">Clients</span>
                                <span class="value">4 589</span>
                            </div>
                        </div><!--/col-->

                        <div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
                            <div class="smallstat box">
                                <div class="boxchart-overlay red">
                                    <div class="boxchart">1,2,6,4,0,8,2,4,5,3,1,7,5</div>
                                </div>
                                <span class="title">Transactions</span>
                                <span class="value">789</span>
                            </div>
                        </div><!--/col-->

                        <div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
                            <div class="smallstat box">
                                <i class="fa fa-download green"></i>
                                <span class="title">Income</span>
                                <span class="value">$1 999,99</span>
                            </div>
                        </div><!--/col-->

                        <div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
                            <div class="smallstat box">
                                <i class="fa fa-money yellow"></i>
                                <span class="title">Account</span>
                                <span class="value">$19 999,99</span>
                            </div>
                        </div><!--/col-->

                    </div><!--/row-->

                    <div class="row">

                        <div class="col-xs-12">

                            <div class="main-chart">

                                <div class="bar">

                                    <div class="title">JAN</div>
                                    <div class="value">80%</div>

                                </div>

                                <div class="bar simple">

                                    <div class="title">FEB</div>
                                    <div class="value">60%</div>

                                </div>

                                <div class="bar simple">

                                    <div class="title">MAR</div>
                                    <div class="value">50%</div>

                                </div>

                                <div class="bar">

                                    <div class="title">APR</div>
                                    <div class="value">40%</div>

                                </div>

                                <div class="bar simple">

                                    <div class="title">MAY</div>
                                    <div class="value">10%</div>

                                </div>

                                <div class="bar simple">

                                    <div class="title">JUN</div>
                                    <div class="value">30%</div>

                                </div>

                                <div class="bar">

                                    <div class="title">JUL</div>
                                    <div class="value">50%</div>

                                </div>

                                <div class="bar simple">

                                    <div class="title">AUG</div>
                                    <div class="value">65%</div>

                                </div>

                                <div class="bar simple">

                                    <div class="title">SEP</div>
                                    <div class="value">40%</div>

                                </div>

                                <div class="bar">

                                    <div class="title">OCT</div>
                                    <div class="value">32%</div>

                                </div>

                                <div class="bar simple">

                                    <div class="title">NOV</div>
                                    <div class="value">20%</div>

                                </div>

                                <div class="bar simple">

                                    <div class="title">DEC</div>
                                    <div class="value">10%</div>

                                </div>

                                <div class="bar">

                                    <div class="title">JAN</div>
                                    <div class="value">100%</div>

                                </div>

                                <div class="bar simple">

                                    <div class="title">FEB</div>
                                    <div class="value">60%</div>

                                </div>

                                <div class="bar simple">

                                    <div class="title">MAR</div>
                                    <div class="value">50%</div>

                                </div>

                                <div class="bar">

                                    <div class="title">APR</div>
                                    <div class="value">40%</div>

                                </div>

                                <div class="bar simple">

                                    <div class="title">MAY</div>
                                    <div class="value">10%</div>

                                </div>

                                <div class="bar simple">

                                    <div class="title">JUN</div>
                                    <div class="value">30%</div>

                                </div>

                                <div class="bar">

                                    <div class="title">JUL</div>
                                    <div class="value">50%</div>

                                </div>

                                <div class="bar simple">

                                    <div class="title">AUG</div>
                                    <div class="value">65%</div>

                                </div>

                            </div>

                        </div><!--/col-->

                    </div><!--/row-->

                    <div class="row">

                        <div class="col-lg-6 col-md-6">

                            <div class="row">

                                <div class="col-lg-12">

                                    <div class="multi-stat-box box">
                                        <div class="header">
                                            <div class="left">
                                                <h2>Pageviews</h2>
                                                <a class="fa fa-chevron-down"></a>
                                            </div>
                                            <div class="right">
                                                <h2>MAY 15 - MAY 22</h2>
                                                <div class="percent"><i class="fa fa-double-angle-up"></i> 22%</div>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="left">
                                                <ul>
                                                    <li>
                                                        <span class="date">Overall</span>
                                                        <span class="value">987,123</span>
                                                    </li>
                                                    <li class="active">
                                                        <span class="date">This week</span>
                                                        <span class="value">9,873</span>
                                                    </li>
                                                    <li>
                                                        <span class="date">Yesterday</span>
                                                        <span class="value">851</span>
                                                    </li>
                                                    <li>
                                                        <span class="date">Today</span>
                                                        <span class="value">184</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="right">
                                                <div class="multi-stat-box-chart" style="height:180px; width: 90%; padding: 10px"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box blue">
                                        <div class="box-header">
                                            <h2><i class="fa fa-bar-chart-o"></i>Weekly Stat</h2>
                                            <div class="box-icon">
                                                <a href="#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                                                <a href="#" class="btn-close"><i class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                        <div class="box-content">
                                            <div class="chart-type1" style="height:170px"></div>
                                        </div>
                                    </div><!--/span-->

                                </div>

                            </div>

                        </div><!--/col-->

                        <div class="col-lg-6 col-md-6">

                            <div class="box blue">

                                <div class="box-header">
                                    <h2>Revenue</h2>
                                </div>
                                <div class="box-content">

                                    <div class="chart-type2" style="height:220px;"></div>

                                    <div class="verticalChart">

                                        <div class="singleBar">

                                            <div class="bar">

                                                <div class="value">
                                                    <span>37%</span>
                                                </div>

                                            </div>

                                            <div class="title">US</div>

                                        </div>

                                        <div class="singleBar">

                                            <div class="bar">

                                                <div class="value">
                                                    <span>16%</span>
                                                </div>

                                            </div>

                                            <div class="title">PL</div>

                                        </div>

                                        <div class="singleBar">

                                            <div class="bar">

                                                <div class="value">
                                                    <span>12%</span>
                                                </div>

                                            </div>

                                            <div class="title">GB</div>

                                        </div>

                                        <div class="singleBar">

                                            <div class="bar">

                                                <div class="value">
                                                    <span>9%</span>
                                                </div>

                                            </div>

                                            <div class="title">DE</div>

                                        </div>

                                        <div class="singleBar">

                                            <div class="bar">

                                                <div class="value">
                                                    <span>7%</span>
                                                </div>

                                            </div>

                                            <div class="title">NL</div>

                                        </div>

                                        <div class="singleBar">

                                            <div class="bar">

                                                <div class="value">
                                                    <span>6%</span>
                                                </div>

                                            </div>

                                            <div class="title">CA</div>

                                        </div>

                                        <div class="singleBar">

                                            <div class="bar">

                                                <div class="value">
                                                    <span>5%</span>
                                                </div>

                                            </div>

                                            <div class="title">FI</div>

                                        </div>

                                        <div class="singleBar">

                                            <div class="bar">

                                                <div class="value">
                                                    <span>4%</span>
                                                </div>

                                            </div>

                                            <div class="title">RU</div>

                                        </div>

                                        <div class="singleBar">

                                            <div class="bar">

                                                <div class="value">
                                                    <span>3%</span>
                                                </div>

                                            </div>

                                            <div class="title">AU</div>

                                        </div>

                                        <div class="singleBar">

                                            <div class="bar">

                                                <div class="value">
                                                    <span>1%</span>
                                                </div>

                                            </div>

                                            <div class="title">N/A</div>

                                        </div>

                                    </div>

                                    <div class="clearfix"></div>

                                </div>

                            </div>

                        </div><!--/col-->

                    </div><!--/row-->

                    <div class="row">

                        <div class="col-lg-7 col-md-7">

                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="box calendar">
                                        <div class="calendar-details">
                                            <div class="day">MONDAY</div>
                                            <div class="date">MAY 22</div>
                                            <ul class="events">
                                                <li>MAY 22, 19:30 Meeting</li>
                                                <li>MAY 22, 19:30 Meeting</li>
                                            </ul>
                                            <div class="add-event">
                                                <i class="fa fa-plus"></i>
                                                <input type="text" class="new event" value="">
                                            </div>
                                        </div>
                                        <div class="calendar-small"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div><!--/col-->

                            </div><!--/row-->

                            <div class="row">

                                <div class="col-lg-6 col-sm-6 col-xs-6 col-xxs-12">

                                    <div class="smallchart blue box">

                                        <div class="title">Account balance</div>

                                        <div class="content">

                                            <div class="chart-stat">
                                                <div class="chart white">7,3,2,6,6,3,9,0,1,4</div>
                                            </div>

                                        </div>

                                        <div class="value">$19 999,99</div>

                                    </div>

                                </div><!--/col-->

                                <div class="col-lg-6 col-sm-6 col-xs-6 col-xxs-12">

                                    <div class="smallchart red box">

                                        <div class="title">Weekly revenue</div>

                                        <div class="content">

                                            <div class="chart-stat">
                                                <div class="chart white">5,8,3,9,2,5,6,2,2,5</div>
                                            </div>

                                        </div>

                                        <div class="value">$1 849,99</div>

                                    </div>

                                </div><!--/col-->

                            </div><!--/row-->

                        </div><!--/col-->

                        <div class="col-lg-5 col-md-5">

                            <div class="box noOverflow chat alt">

                                <div class="contacts">
                                    <ul class="list">
                                        <li>
                                            <img class="avatar" src="assets/img/avatar.jpg" alt="avatar">
                                            <span class="name">Łukasz Holeczek</span>
                                            <span class="status online"></span>
                                            <span class="important">4</span>
                                        </li>
                                        <li>
                                            <img class="avatar" src="assets/img/avatar2.jpg" alt="avatar">
                                            <span class="name">Łukasz Holeczek</span>
                                            <span class="status offline"></span>
                                        </li>
                                        <li>
                                            <img class="avatar" src="assets/img/avatar3.jpg" alt="avatar">
                                            <span class="name">Łukasz Holeczek</span>
                                            <span class="status busy"></span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="conversation">
                                    <div class="actions">
                                        <img class="avatar" src="assets/img/avatar.jpg" alt="avatar">
                                        <img class="avatar" src="assets/img/avatar3.jpg" alt="avatar">
                                        <img class="avatar" src="assets/img/avatar4.jpg" alt="avatar">
                                    </div>
                                    <ul class="talk">
                                        <li>
                                            <img class="avatar" src="assets/img/avatar3.jpg" alt="avatar">
                                            <span class="name">Ann Kovalsky</span>
                                            <span class="time">1:32PM</span>
                                            <div class="message">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
                                        </li>
                                        <li>
                                            <img class="avatar" src="assets/img/avatar4.jpg" alt="avatar">
                                            <span class="name">Megan Abbott</span>
                                            <span class="time">1:32PM</span>
                                            <div class="message">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
                                        </li>
                                        <li>
                                            <img class="avatar" src="assets/img/avatar3.jpg" alt="avatar">
                                            <span class="name">Ann Kovalsky</span>
                                            <span class="time">1:32PM</span>
                                            <div class="message">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
                                        </li>
                                        <li>
                                            <img class="avatar" src="assets/img/avatar.jpg" alt="avatar">
                                            <span class="name">Łukasz Holeczek</span>
                                            <span class="time">1:32PM</span>
                                            <div class="message">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
                                        </li>
                                        <li>
                                            <img class="avatar" src="assets/img/avatar4.jpg" alt="avatar">
                                            <span class="name">Megan Abbott</span>
                                            <span class="time">1:32PM</span>
                                            <div class="message">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</div>
                                        </li>
                                    </ul>
                                    <div class="form">
                                        <input type="text" class="write-message" placeholder="Write Message">
                                    </div>
                                </div>

                            </div>

                        </div><!--/col-->

                    </div><!--/row-->

                    <div class="row">

                        <div class="col-lg-8 col-md-8">
                            <div class="box">
                                <div class="box-header">
                                    <h2>tickets</h2>
                                </div>
                                <div class="box-content" style="height:304px" >
                                    <div id="stats-chart2"  class="col-lg-12" style="height:290px" ></div>
                                </div>
                            </div>
                        </div><!--/col-->

                        <div class="col-lg-4 col-md-4">

                            <div class="box">
                                <div class="box-header">
                                    <h2><i class="fa fa-check"></i>To Do List</h2>
                                    <div class="box-icon">
                                        <a href="#" class="btn-setting"><i class="fa fa-wrench"></i></a>
                                        <a href="#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                                        <a href="#" class="btn-close"><i class="fa fa-times"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">
                                    <div class="todo">
                                        <ul class="todo-list">
                                            <li>
                                                <span class="todo-actions">
                                                    <a href="#"><i class="fa fa-square-o"></i></a>
                                                </span>
                                                <span class="desc">Windows Phone 8 App</span>
                                                <span class="label label-important">today</span>
                                            </li>
                                            <li>
                                                <span class="todo-actions">
                                                    <a href="#"><i class="fa fa-square-o"></i></a>
                                                </span>
                                                <span class="desc">New frontend layout</span>
                                                <span class="label label-important">today</span>
                                            </li>
                                            <li>
                                                <span class="todo-actions">
                                                    <a href="#"><i class="fa fa-square-o"></i></a>
                                                </span>
                                                <span class="desc">Hire developers</span>
                                                <span class="label label-warning">tommorow</span>
                                            </li>
                                            <li>
                                                <span class="todo-actions">
                                                    <a href="#"><i class="fa fa-square-o"></i></a>
                                                </span>
                                                <span class="desc">Windows Phone 8 App</span>
                                                <span class="label label-warning">tommorow</span>
                                            </li>
                                            <li>
                                                <span class="todo-actions">
                                                    <a href="#"><i class="fa fa-square-o"></i></a>
                                                </span>
                                                <span class="desc">New frontend layout</span>
                                                <span class="label label-success">this week</span>
                                            </li>
                                            <li>
                                                <span class="todo-actions">
                                                    <a href="#"><i class="fa fa-square-o"></i></a>
                                                </span>
                                                <span class="desc">Hire developers</span>
                                                <span class="label label-success">this week</span>
                                            </li>
                                            <li>
                                                <span class="todo-actions">
                                                    <a href="#"><i class="fa fa-square-o"></i></a>
                                                </span>
                                                <span class="desc">New frontend layout</span>
                                                <span class="label label-info">this month</span>
                                            </li>
                                            <li>
                                                <span class="todo-actions">
                                                    <a href="#"><i class="fa fa-square-o"></i></a>
                                                </span>
                                                <span class="desc">Hire developers</span>
                                                <span class="label label-info">this month</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div><!--/col-->

                    </div><!--/row-->

                    <div class="row">

                        <div class="col-lg-12 discussions">

                            <ul>

                                <li>
                                    <div class="author">
                                        <img src="assets/img/avatar.jpg" alt="avatar">
                                    </div>

                                    <div class="name">Łukasz Holeczek</div>
                                    <div class="date">Today, 1:08 PM</div>
                                    <div class="delete"><i class="fa fa-times"></i></div>

                                    <div class="message">
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                    </div>

                                    <ul>

                                        <li>
                                            <div class="author">
                                                <img src="assets/img/avatar3.jpg" alt="avatar">
                                            </div>
                                            <div class="name">Ann Kovalsky</div>
                                            <div class="date">Today, 1:08 PM</div>
                                            <div class="delete"><i class="fa fa-times"></i></div>

                                            <div class="message">
                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                            </div>

                                        </li>

                                        <li>
                                            <div class="author">
                                                <img src="assets/img/avatar6.jpg" alt="avatar">
                                            </div>
                                            <div class="name">Megan Abbott</div>
                                            <div class="date">Today, 1:08 PM</div>
                                            <div class="delete"><i class="fa fa-times"></i></div>

                                            <div class="message">
                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                            </div>
                                        </li>

                                        <li>
                                            <div class="author">
                                                <img src="assets/img/avatar.jpg" alt="avatar">
                                            </div>
                                            <textarea class="diss-form" placeholder="Write comment"></textarea>
                                        </li>

                                    </ul>

                                </li>

                                <li>
                                    <div class="author">
                                        <img src="assets/img/avatar9.jpg" alt="avatar">
                                    </div>

                                    <div class="name">Tom Allen</div>
                                    <div class="date">Today, 1:08 PM</div>
                                    <div class="delete"><i class="fa fa-times"></i></div>

                                    <div class="message">
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                    </div>

                                    <ul>

                                        <li>
                                            <div class="author">
                                                <img src="assets/img/avatar2.jpg" alt="avatar">
                                            </div>
                                            <div class="name">Katie Moss</div>
                                            <div class="date">Today, 1:08 PM</div>
                                            <div class="delete"><i class="fa fa-times"></i></div>

                                            <div class="message">
                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                            </div>

                                        </li>

                                        <li>
                                            <div class="author">
                                                <img src="assets/img/avatar4.jpg" alt="avatar">
                                            </div>
                                            <div class="name">Anna Holn</div>
                                            <div class="date">Today, 1:08 PM</div>
                                            <div class="delete"><i class="fa fa-times"></i></div>

                                            <div class="message">
                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
                                            </div>
                                        </li>

                                        <li>
                                            <div class="author">
                                                <img src="assets/img/avatar9.jpg" alt="avatar">
                                            </div>
                                            <textarea class="diss-form" placeholder="Write comment"></textarea>
                                        </li>

                                    </ul>

                                </li>

                            </ul>

                        </div><!--/col-->

                    </div><!--/row-->



                </div>
                <!-- end: Content -->

            </div><!--/row-->

        </div><!--/container-->


        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <p>Here settings can be configured...</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="clearfix"></div>

        <footer>

            <div class="row">

                <div class="col-sm-5">
                    &copy; 2014 creativeLabs. <a href="../bootstrapmaster.com/index.html">Admin Templates</a> by BootstrapMaster
                </div><!--/.col-->

                <div class="col-sm-7 text-right">
                    Powered by: <a href="../bootstrapmaster.com/demo/simpliq/index.html" alt="Bootstrap Admin Templates">SimpliQ Dashboard</a> | Based on Bootstrap 3.1.1 | Built with brix.io <a href="../brix.io/index.html" alt="Brix.io - Interface Builder">Interface Builder</a>
                </div><!--/.col-->

            </div><!--/.row-->

        </footer>



        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="V/bootstrap/js/jquery.min.js"><\/script>');</script>

        <script src="V/bootstrap/lib_js/jquery-migrate-1.2.1.min.js"></script>
        <script src="V/bootstrap/js/bootstrap.min.js"></script>

        <!-- start: JavaScript-->
        <!--[if !IE]>-->

        <script src="V/bootstrap/lib_js/jquery-2.1.0.min.js"></script>

        <!--<![endif]-->

        <!--[if IE]>

                <script src="V/bootstrap/lib_js/jquery-1.11.0.min.js"></script>

        <![endif]-->

        <!--[if !IE]>-->

        <script type="text/javascript">
            window.jQuery || document.write("<script src='V/bootstrap/lib_js/jquery-2.1.0.min.js'>" + "<" + "/script>");
        </script>

        <!--<![endif]-->

        <!--[if IE]>

                <script type="text/javascript">
                window.jQuery || document.write("<script src='V/bootstrap/lib_js/jquery-1.11.0.min.js'>"+"<"+"/script>");
                </script>

        <![endif]-->





        <!-- page scripts -->
        <script src="V/bootstrap/lib_js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="V/bootstrap/lib_js/jquery.ui.touch-punch.min.js"></script>
        <script src="V/bootstrap/lib_js/jquery.sparkline.min.js"></script>
        <script src="V/bootstrap/lib_js/fullcalendar.min.js"></script>
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="V/bootstrap/lib_js/excanvas.min.js"></script><![endif]-->
        <script src="V/bootstrap/lib_js/jquery.flot.min.js"></script>
        <script src="V/bootstrap/lib_js/jquery.flot.pie.min.js"></script>
        <script src="V/bootstrap/lib_js/jquery.flot.stack.min.js"></script>
        <script src="V/bootstrap/lib_js/jquery.flot.resize.min.js"></script>
        <script src="V/bootstrap/lib_js/jquery.flot.time.min.js"></script>
        <script src="V/bootstrap/lib_js/jquery.autosize.min.js"></script>
        <script src="V/bootstrap/lib_js/jquery.placeholder.min.js"></script>

        <!-- theme scripts -->
        <script src="V/bootstrap/lib_js/custom.min.js"></script>
        <script src="V/bootstrap/lib_js/core.min.js"></script>

        <!-- inline scripts related to this page -->
        <script src="V/bootstrap/lib_js/pages/index.js"></script>

        <!-- end: JavaScript-->

    </body>

    <!-- Mirrored from simpliq.bootstrapmaster.com/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 19 Mar 2014 13:08:24 GMT -->
</html>