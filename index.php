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

    $require = 'V/site/partial/' . $content . '.php';
    if (!file_exists($require)) {
        header("HTTP/1.0 404 Not Found");
        header("Status: 404 Not Found");
        $require = './404.php';
    }
    if (isset($content)) {
        $menu_home = "$('#menu-$content').addClass('active');";
    }
} catch (Exception $ex) {
    echo "<h1>Houve um Erro ao processar esta Página!</h1><p>Informe ao desenvolvedor:</p><br /><pre>";
    echo $ex;
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <!-- start: Meta -->
        <meta charset="utf-8">
        <title>A.A.A. Computação<?= $title ?></title>
        <meta name="description" content="Associação Acadêmica Atletica de Computação">
        <meta name="author" content="João Pedro A. Gonçalves">
        <meta name="keywords" content="Atletica, PUC, PUCMINAS, Atlética de Computação, Liga da PUC">
        <!-- end: Meta -->

        <link rel="shortcut icon" href="V/site/img/layout/favicon.ico">
        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- end: Mobile Specific -->

        <!-- start: CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link href="V/bootstrap/lib_css/retina.min.css" rel="stylesheet">
        <link href="V/bootstrap/lib_css/style-blue.css" rel="stylesheet">
        <link href="V/bootstrap/lib_css/animate.min.css" rel="stylesheet">
        <link href="V/bootstrap/lib_js/uploadify/uploadify.css" rel="stylesheet">

        <link href="V/sysweb/css/utils.css" rel="stylesheet">
        <link href="V/site/css/site.css" rel="stylesheet">


        <!-- end: CSS -->


        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>

                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
                <script src="bootstrap/lib_js/respond.min.js"></script>
                <script src="bootstrap/lib_css/ie6-8.css"></script>

        <![endif]-->

        <!-- start: Favicon and Touch Icons -->
        <link rel="apple-touch-icon" sizes="57x57" href="V/site/img/layout/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="V/site/img/layout/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="V/site/img/layout/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="V/site/img/layout/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="V/site/img/layout/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="V/site/img/layout/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="V/site/img/layout/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="V/site/img/layout/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="V/site/img/layout/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="V/site/img/layout/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="V/site/img/layout/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="V/site/img/layout/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="V/site/img/layout/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="V/site/img/layout/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <!-- end: Favicon and Touch Icons -->

    </head>

    <body>
        <div id="preloader">
            <div class="progress progress-striped active">
                <div class="progress-bar" style="width:0;"></div>
            </div>
            <h1>Carregando 0.00%</h1>
        </div>

        <header id="header-full-top" class="hidden-xs header-full">
            <img id="logo_menu" class="img-responsive img-circle animated fadeInUp animation-delay-2" src="./V/site/img/layout/logo.jpg" alt="Logo AAC">
            <div class="container">
                <div class="header-full-title">
                    <h1 class="animated fadeInLeft"><a href="./">Associação Atlética de <span>Computação</span></a></h1>
                    <p class="animated fadeInRight">Filhos da <span>PUC</span></p>
                </div>
                <nav class="top-nav">
                    <ul class="top-nav-social hidden-sm">
                        <li><a target="_blank" href="https://www.facebook.com/pinguinspuc/" class="animated bounceInDown animation-delay-8 facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a target="_blank" href="https://chat.whatsapp.com/9WHelKbwgbhIdSq3JV54Ko" class="animated bounceInDown animation-delay-9 whatsapp"><i class="fa fa-whatsapp"></i></a></li>
                        <li><a target="_blank" href="https://www.instagram.com/pinguinspuc/" class="animated bounceInDown animation-delay-10 instagram"><i class="fa fa-instagram"></i></a></li>
                        <li><a target="_blank" href="https://twitter.com/Pinguinspuc" class="animated bounceInDown animation-delay-12 twitter"><i class="fa fa-twitter"></i></a></li>
                    </ul>

                </nav>
            </div> <!-- container -->
        </header> <!-- header-full -->

        <nav class="navbar navbar-static-top navbar-default navbar-header-full navbar-dark" role="navigation" id="header">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand hidden-lg hidden-md hidden-sm" href="./">A. A. <span>Computação</span></a>
                </div> <!-- navbar-header -->

                <!-- Collect the nav links, forms, and other content for toggling -->

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li id="menu-home" class="animated bounceInRight animation-delay-2">
                            <a href="?p=home"><b class="fa fa-home"></b> HOME</a>
                        </li>
                        <li id="menu-empresa" class="animated bounceInRight animation-delay-4">
                            <a href="?p=empresa"><b class="fa fa-building-o"></b> SOBRE NÓS</a>
                        </li>
                        <li id="menu-contato" class="animated bounceInRight animation-delay-6">
                            <a href="?p=contato"><b class="fa fa-envelope-o"></b> CONTATO</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div>
            <?php require_once $require; ?>
        </div>

        <div class="clearfix"></div>

        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <a href="#" class="btn-social sm facebook" style="border-color: white;"><i style="color: white;" class="fa fa-facebook"></i></a>
                        <a href="#" class="btn-social sm whatsapp" style="border-color: white;"><i style="color: white;" class="fa fa-whatsapp"></i></a>
                        <a href="#" class="btn-social sm instagram" style="border-color: white;"><i style="color: white;" class="fa fa-instagram"></i></a>
                        <a href="#" class="btn-social sm twitter" style="border-color: white;"><i style="color: white;" class="fa fa-twitter"></i></a>
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                        <p class="text-left">Desenvolvido por: <a href="https://www.facebook.com/joaopedro.alcantaragoncalves">João Pedro Alcântara</a></p>
                    </div>
                </div>
                <div class="row">
                    <p class="text-center">Copyright 2014</p>
                </div>
            </div>
        </div>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../bootstrap/js/jquery.min.js"><\/script>');</script>
        <script src="V/bootstrap/lib_js/jquery-migrate-1.2.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <script src="V/bootstrap/lib_js/wait4images/jquery.waitforimages.min.js"></script>
        <script src="V/bootstrap/lib_js/md5-min.js"></script>
        <script src="V/bootstrap/lib_js/wow.min.js"></script>
        <script src="V/bootstrap/lib_js/uploadify/jquery.uploadify.min.js"></script>


        <script src="V/sysweb/js/utils.js"></script>
        <script src="V/site/js/site.js"></script>

        <script>
            $(document).ready(function () {
<?= $script ?>
<?= $menu_home ?>
            });
        </script>

    </body>
</html>