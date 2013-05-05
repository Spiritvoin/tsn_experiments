<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->
        <!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/global.css"/>-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui-lightness/jquery-ui-1.10.0.custom.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/vendors/fancybox/jquery.fancybox-1.3.2.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main-2.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <!--[if lt IE 9]>
            <link media="screen" type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style_ie.css" media="screen, projection" />
        <![endif]-->
        <script type="text/javascript" >
            var domain = "<?php echo $_SERVER['SERVER_NAME']; ?><?php echo Yii::app()->request->baseUrl; ?>";
        </script>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/js/jquery-1.8.2.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.10.0.custom.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.infieldlabel.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/functions.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom-form-elements.js"></script>
        <!--<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/slides.min.jquery.js"></script>-->
        <!--<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/slider.js"></script>-->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/vendors/fancybox/jquery.easing-1.3.pack.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/vendors/fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/vendors/fancybox/jquery.fancybox-1.3.2.js"></script>

        <!-- <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/dw_event.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/dw_viewport.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/dw_tooltip.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/dw_tooltip_aux.js" type="text/javascript"></script>
        <script type="text/javascript">
            dw_Tooltip.content_vars = {
                L1: 'HELP PASSPORT COUNTRY',
                L2: 'HELP PASSPORT NUMBER'
            }
        </script> -->
        <script type="text/javascript">
            $(function() {
                $('#fancybox-close').click(function() {
                    parent.$.fancybox.close();
                });
            });
        </script>

    </head>

    <body style="background: none;">
        <a id="fancybox-close" style="display: inline;"></a>
        <?php echo $content; ?>
    </body>
</html>
