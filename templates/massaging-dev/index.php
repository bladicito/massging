
/**
 * Created by PhpStorm.
 * User: bladimirardiles
 * Date: 28/07/15
 * Time: 21:53
 */


<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Page title - Website title</title>
    <link rel="stylesheet" href="<?php echo TEMPLATE_DIR;?>/css/style.css">
    <meta name="description" content="<?php page_description(); ?>" />
    <meta name="keywords" content="<?php page_keywords(); ?>" />
    <?php
        if(function_exists('register_frontend_modfiles')) {
            register_frontend_modfiles('css');
            register_frontend_modfiles('js');
        }
    ?>
</head>
<body class="mod mod-global-layout">
<div class="container">
    <div class="row header">
        <div class="col-md-6">
            <div class="mod mod-logo">
                <?php include('modules-terrific/logo/logo.php') ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mod mod-slogan">
                <?php include('modules-terrific/slogan/slogan.php') ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="mod mod-menu">
                <?php include('modules-terrific/menu/menu.php');?>
            </div>
        </div>
    </div>


    <div class="main-menu">
        <?php show_menu2(0,SM2_ROOT,SM2_ALL,SM2_ALL,'[li][a][menu_title]</a>','</li>','[ul]','</ul>',false,'<ul id="nav">');?>
    </div>
    <div class="content">
        <?php echo page_content();?>
    </div>
    <div class="mod mod-footer">
        Copyright © <?php page_footer(); ?>-<?php echo date("Y");?>
    </div>
    <script src="<?php echo TEMPLATE_DIR;?>/js/scripts.js"></script>
    <script type="text/javascript">
        (function($) {
            $(document).ready(function() {
                var $page = $('body');
                var application = new Tc.Application($page);
                application.registerModules();
                application.start();
            });
        })(Tc.$);
    </script>
</div>
</body>
</html>