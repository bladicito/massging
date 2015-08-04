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
                        <?php include('modules-terrific//menu/menu.php');?>
                    </div>
                </div>
                <div class="col-md-3 slider-dots--holder pull-right hidden-xs">
                    <!-- place for slider dots... if any -->
                </div>
            </div>
        </div>
    </div>




    <?php






    switch (PAGE_TITLE) {
        case 'Home' :
            include($_SERVER['DOCUMENT_ROOT']. '/templates/massaging/pages/home.php');
            break;
        default :
            include($_SERVER['DOCUMENT_ROOT']. '/templates/massaging/pages/standard.php');
    }



    ?>


    <div class="full-width-green">
        <div class="container">
            <div class="row footer">
                <div class="col-md-12">
                    <div class="mod mod-footer">
                        <?php include('modules-terrific/footer/footer.php');?>
                    </div>
                </div>
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