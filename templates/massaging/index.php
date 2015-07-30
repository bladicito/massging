<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="<?php page_description(); ?>" />
        <title><?php page_title(); ?></title>
        <meta name="keywords" content="<?php page_keywords(); ?>" />
        <link rel="stylesheet" href="<?php echo TEMPLATE_DIR;?>/css/styles.css">
        <link type="text/css" rel="stylesheet" href="http://fast.fonts.net/cssapi/cd802a3f-e2cf-4b1c-8451-b5cfe02baafd.css"/>
        <?php
            if(function_exists('register_frontend_modfiles')) {
                register_frontend_modfiles('css');
                register_frontend_modfiles('js');
            }
        ?>
    </head>
    <body class="global-massaging">
        <div class="full-width-gray">
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
            </div>
        </div>
        <div class="full-width-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="mod mod-menu">
                            <?php include('modules-terrific/menu/menu.php');?>
                        </div>
                    </div>
                    <div class="col-md-3 slider-dots--holder pull-right">

                    </div>
                </div>
            </div>
        </div>

        <div class="full-width-white">
            <div class="mod mod-sliderhuge">
                <?php include('modules-terrific/sliderhuge/sliderhuge.php');?>
            </div>
        </div>

        <div class="full-width-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mod mod-textcontent">
                            <?php echo page_content(4);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="container">
            <div class="row">
                <div class="mod mod-footer">
                    Copyright © <?php page_footer(); ?>-<?php echo date("Y");?>
                </div>
            </div>

        </div>

        <script type="text/javascript" src="<?php echo TEMPLATE_DIR;?>/js/scripts.js"></script>
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
    </body>
</html>