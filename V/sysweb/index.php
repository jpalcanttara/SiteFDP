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
        <title>Gestão</title>
        <meta name="description" content="SR-PHP-CMRV">
        <meta name="author" content="SOFT-ROM Sistemas">
        <meta name="keyword" content="SOFT-ROM Sistemas">
        <!-- end: Meta -->

        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- end: Mobile Specific -->

        <!-- start: CSS -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../bootstrap/lib_css/style.min.css" rel="stylesheet">
        <link href="../bootstrap/lib_css/retina.min.css" rel="stylesheet">
        <!-- end: CSS -->


        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>

                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
                <script src="../bootstrap/lib_js/respond.min.js"></script>
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
                <a class="navbar-brand col-lg-2 col-sm-1 col-xs-12" href="./"><span>Festival Filhos da PUC</span></a>
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
                                <div class="avatar"><img src="img/avatar.jpg" alt="Avatar"></div>
                                <div class="user">
                                    <span class="hello">Bem vindo!</span>
                                    <span class="name">Administrador</span>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-menu-title">

                                </li>
                                <li><a href="./?=p=profile"><i class="fa fa-user"></i> Perfil</a></li>
                                <li><a href="./?=p=config"><i class="fa fa-cog"></i> Configurações</a></li>                                
                                <li><a href="../../C/Logout.php"><i class="fa fa-off"></i> Sair</a></li>
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
                    <div class="nav-collapse sidebar-nav collapse navbar-collapse bs-navbar-collapse">
                        <ul class="nav nav-tabs nav-stacked main-menu">
                            <li><a href="./"><i class="fa fa-bar-chart-o"></i><span class="hidden-sm"> Visão Geral</span></a></li>
                            <li><a href="./?p=ga"><i class="fa fa-bar-chart-o"></i><span class="hidden-sm"> Gestão A</span></a></li>
                            <li><a href="./?p=gb"><i class="fa fa-bar-chart-o"></i><span class="hidden-sm"> Gestão B</span></a></li>
                            <li><a href="./?p=gc"><i class="fa fa-bar-chart-o"></i><span class="hidden-sm"> Gestão C</span></a></li>

                        </ul>
                    </div>
                </div>
                <!-- end: Main Menu -->

                <!-- start: Content -->
                <div id="content" class="col-lg-10 col-sm-11">

                    <?php require_once $require ?>

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
                    <a href="#">Festival Filhos da PUC</a>
                </div><!--/.col-->

                <div class="col-sm-7 text-right">
                    Powered by:
                    <a href="http://4mentes.com.br" class="link_externo" alt="PHP">4MENTES</a>
                </div><!--/.col-->

            </div><!--/.row-->

        </footer>



        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../bootstrap/js/jquery.min.js"><\/script>');</script>

        <script src="../bootstrap/lib_js/jquery-migrate-1.2.1.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>

        <!-- start: JavaScript-->
        <!--[if !IE]>-->

        <script src="../bootstrap/lib_js/jquery-2.1.0.min.js"></script>

        <!--<![endif]-->

        <!--[if IE]>

                <script src="../bootstrap/lib_js/jquery-1.11.0.min.js"></script>

        <![endif]-->

        <!--[if !IE]>-->

        <script type="text/javascript">
            window.jQuery || document.write("<script src='../bootstrap/lib_js/jquery-2.1.0.min.js'>" + "<" + "/script>");
        </script>

        <!--<![endif]-->

        <!--[if IE]>

                <script type="text/javascript">
                window.jQuery || document.write("<script src='../bootstrap/lib_js/jquery-1.11.0.min.js'>"+"<"+"/script>");
                </script>

        <![endif]-->





        <!-- page scripts -->
        <script src="../bootstrap/lib_js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="../bootstrap/lib_js/jquery.ui.touch-punch.min.js"></script>
        <script src="../bootstrap/lib_js/jquery.sparkline.min.js"></script>
        <script src="../bootstrap/lib_js/fullcalendar.min.js"></script>
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="../bootstrap/lib_js/excanvas.min.js"></script><![endif]-->
        <script src="../bootstrap/lib_js/jquery.flot.min.js"></script>
        <script src="../bootstrap/lib_js/jquery.flot.pie.min.js"></script>
        <script src="../bootstrap/lib_js/jquery.flot.stack.min.js"></script>
        <script src="../bootstrap/lib_js/jquery.flot.resize.min.js"></script>
        <script src="../bootstrap/lib_js/jquery.flot.time.min.js"></script>
        <script src="../bootstrap/lib_js/jquery.autosize.min.js"></script>
        <script src="../bootstrap/lib_js/jquery.placeholder.min.js"></script>

        <!-- theme scripts -->
        <script src="../bootstrap/lib_js/custom.min.js"></script>
        <script src="../bootstrap/lib_js/core.min.js"></script>

        <!-- inline scripts related to this page -->
        <script src="../bootstrap/lib_js/pages/index.js"></script>

        <!-- end: JavaScript-->

    </body>

    <!-- Mirrored from simpliq.bootstrapmaster.com/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 19 Mar 2014 13:08:24 GMT -->
</html>