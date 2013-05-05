<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>


    <title>Admin Panel</title>
    <?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>

    <!-- Link shortcut icon-->
    <link rel="shortcut icon" type="image/ico" href="<?= Yii::app()->theme->baseUrl; ?>/images/favicon2.ico"/>

    <!-- Link css-->
    <link rel="stylesheet" type="text/css" href="<?= Yii::app()->theme->baseUrl; ?>/css/zice.style.css"/>


    <!--[if lte IE 8]>
    <script language="javascript" type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/flot/excanvas.min.js"></script><![endif]-->


    <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/components/ui/jquery.ui.min.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/components/ui/jquery.autotab.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/components/ui/timepicker.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/colorpicker/js/colorpicker.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/checkboxes/iphone.check.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/elfinder/js/elfinder.full.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/datatables/dataTables.min.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/components/datatables/ColVis.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/scrolltop/scrolltopcontrol.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/fancybox/jquery.fancybox.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/jscrollpane/mousewheel.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/jscrollpane/mwheelIntent.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/jscrollpane/jscrollpane.min.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/components/spinner/ui.spinner.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/components/tipsy/jquery.tipsy.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/editor/jquery.cleditor.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/components/chosen/chosen.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/confirm/jquery.confirm.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/validationEngine/jquery.validationEngine.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/validationEngine/jquery.validationEngine-en.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/vticker/jquery.vticker-min.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/components/sourcerer/sourcerer.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/fullcalendar/fullcalendar.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/components/flot/flot.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/components/flot/flot.pie.min.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/components/flot/flot.resize.min.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/components/flot/graphtable.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/components/uploadify/swfobject.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/components/uploadify/uploadify.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/checkboxes/customInput.jquery.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/effect/jquery-jrumble.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/filestyle/jquery.filestyle.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/placeholder/jquery.placeholder.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/components/Jcrop/jquery.Jcrop.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/imgTransform/jquery.transform.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/components/webcam/webcam.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/rating_star/rating_star.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/dualListBox/dualListBox.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/smartWizard/jquery.smartWizard.min.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/maskedinput/jquery.maskedinput.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/highlightText/highlightText.js"></script>
    <script type="text/javascript"
            src="<?= Yii::app()->theme->baseUrl; ?>/components/elastic/jquery.elastic.source.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/js/zice.custom.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/functions.js"></script>


</head>
<body class="dashborad">
<div id="alertMessage" class="error"></div>
<!-- Header -->
<div id="header">
    <div id="account_info">
        <!--                    <img src="<?= Yii::app()->theme->baseUrl; ?>/images/avatar.png" alt="Online" class="avatar"/>-->
        <div class="setting"><b>Welcome,</b> <b class="red"><?= Yii::app()->user->getUsername(); ?></b><img
                src="<?= Yii::app()->theme->baseUrl; ?>/images/gear.png" class="gear" alt="Profile Setting"/>
            <ul class="subnav ">
                <li><a href="<?= Yii::app()->createUrl('admin'); ?>">Dashboard</a></li>

                <br class="clear" \>
            </ul>
        </div>
        <div class="logout" title="Disconnect"><a
                href="<?= Yii::app()->createUrl('admin/admin/logout'); ?>"><b>Logout</b></a></div>
    </div>
</div>
<!-- End Header -->
<div id="shadowhead"></div>

<div id="left_menu">
    <ul id="main_menu" class="main_menu">
        <li class="limenu "><a href="<?= Yii::app()->createUrl('admin'); ?>"><span
                    class="ico gray shadow home"></span><b>Dashboard</b></a></li>
        <li class="limenu "><a href="<?= Yii::app()->createUrl('/admin/user/admin'); ?>"><span
                    class="ico gray shadow spreadsheet"></span><b>Users</b></a>
            <ul>
                <li><a href="<?= Yii::app()->createUrl('/admin/user/admin'); ?>"> Users </a></li>
                <li><a href="<?= Yii::app()->createUrl('/admin/user/create'); ?>"> Create User </a></li>

            </ul>
        </li>

        <li class="limenu"><a href="<?= Yii::app()->createUrl('/admin/page/admin'); ?>"><span
                    class="ico gray shadow spreadsheet"></span><b>Static Page</b></a>
            <ul>
                <li><a href="<?= Yii::app()->createUrl('/admin/page/admin'); ?>">Manage Pages </a></li>
                <li><a href="<?= Yii::app()->createUrl('/admin/page/create'); ?>"> Create Page </a></li>
                <!--<li ><a href="<?= Yii::app()->createUrl('/admin/page/AddLinkMenu'); ?>"> Add Link </a></li>-->
                <!--<li><a href="<?php echo Yii::app()->createUrl('/admin/page/menu') ?>">Manage Menu</a></li>-->

            </ul>
        </li>

        <li class="limenu"><a href="<?= Yii::app()->createUrl('/admin/menu/menu'); ?>"><span
                    class="ico gray shadow spreadsheet"></span><b>Menu</b></a>
            <ul>
                <li><a href="<?php echo Yii::app()->createUrl('/admin/menu/menu') ?>">Manage Menu</a></li>
                <li><a href="<?= Yii::app()->createUrl('/admin/menu/admin'); ?>"> Manage Link</a></li>
            </ul>
        </li>

        <li class="limenu"><a href="<?= Yii::app()->createUrl('/admin/posts/admin'); ?>"><span
                    class="ico gray shadow spreadsheet"></span><b>Blog</b></a>
            <ul>
                <li><a href="<?= Yii::app()->createUrl('/admin/posts/create'); ?>"> Create Post </a></li>
                <li><a href="<?= Yii::app()->createUrl('/admin/posts/admin'); ?>"> Manage Post </a></li>
                <li><a href="<?php echo Yii::app()->createUrl('/admin/categories/admin') ?>">Categories</a></li>

            </ul>
        </li>
        <li class="limenu"><a href="<?= Yii::app()->createUrl('/admin/messages/admin'); ?>"><span
                    class="ico gray shadow spreadsheet"></span><b>Messages</b></a>
            <ul>
                <li><a href="<?= Yii::app()->createUrl('/admin/messages/admin'); ?>"> Manage messages </a></li>
                <li><a href="<?= Yii::app()->createUrl('/admin/messages/create'); ?>"> Create messages </a></li>

            </ul>
        </li>

        <li class="limenu"><a href="<?= Yii::app()->createUrl('/admin/settings/index'); ?>"><span
                    class="ico gray shadow spreadsheet"></span><b>Site Settings</b></a>
        </li>
        <li class="limenu"><a href="<?= Yii::app()->createUrl('/admin/filemanager/index'); ?>"><span
                    class="ico gray shadow  file"></span><b>File manager </b></a></li>
    </ul>
</div>


<div id="content">


    <div class="inner">
        <div class="topcolumn">
            <!--                    <div class="logo"></div>-->
            <ul id="shortcut">
                <li><a href="<?= Yii::app()->createUrl('admin'); ?>" title="Back To home"> <img
                            src="<?= Yii::app()->theme->baseUrl; ?>/images/icon/shortcut/home.png" alt="home"/><strong>Home</strong>
                    </a></li>
                <li><a style="width: 65px;" href="<?= Yii::app()->createUrl('site/index'); ?>" title="Back to Site">
                        <img src="<?= Yii::app()->theme->baseUrl; ?>/images/icon/shortcut/index.png"
                             alt="setting"/><strong>Back to Site</strong></a></li>
                <!--<li> <a href="<?= Yii::app()->createUrl('admin'); ?>" title="Setting" > <img src="<?= Yii::app()->theme->baseUrl; ?>/images/icon/shortcut/setting.png" alt="setting" /><strong>Setting</strong></a> </li>-->


                <!--<li> <a href="<?= Yii::app()->createUrl('admin'); ?>" title="Messages"> <img src="<?= Yii::app()->theme->baseUrl; ?>/images/icon/shortcut/mail.png" alt="messages" /><strong>Message</strong></a><div class="notification" >0</div></li>-->
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <!-- full width -->


        <?= $content; ?>



        <!-- clear fix -->
        <div class="clear"></div>

        <div id="footer"> &copy; Copyright 2012</div>

    </div>
    <!--// End inner -->


</div>
<!--// End content -->
</body>
</html>
















