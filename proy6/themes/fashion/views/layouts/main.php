<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>FashionStudio</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="<?= Yii::app()->theme->baseUrl; ?>/css/main.css" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/vendors/fancybox/jquery.fancybox-1.3.2.css" media="screen" />
        <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/js/jquery-1.8.2.js"></script>
        <script type="text/javascript" src="http://cdn.jquerytools.org/1.2.7/all/jquery.tools.min.js"></script>
        <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/js/jquery.horizontalNav.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.full-width').horizontalNav({});
            });
        </script>
        <link rel="stylesheet" href="<?= Yii::app()->theme->baseUrl; ?>/css/form.css" type="text/css"/>
        <script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/js/custom-form-elements.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/vendors/fancybox/jquery.easing-1.3.pack.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/vendors/fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/vendors/fancybox/jquery.fancybox-1.3.2.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/functions.js"></script>
        <script type="text/javascript" >
            $(document).ready(function() {
                $('#vhod').click(function() {
                    $('.vhod').slideToggle('fast');
                    $(this).toggleClass('active');
                });
                $('.close-vhod').click(function() {
                    $('.vhod').slideUp('fast');
                    $(this).removeClass('active');
                });
            });
        </script>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div class="top">
                    <a href="#">Регистриоваться</a> |
                    <a href="#" id="vhod">Войти в кабинет</a> | <a class="link-sign_in" href="<?= Yii::app()->createUrl('/auth/loginpopup') ?>" title=""><?php echo Yii::t('header', 'login')?></a>
                    <div class="vhod">
                        <form>
                            <div class="form-row"><input type="text" class="text-inp" value="Логин:" onfocus="if (this.value == 'Логин:')
                    this.value = '';" onblur="if (this.value == '') {
                    this.value = 'Логин:'
                }"/></div>
                            <div class="form-row"><input type="password" class="text-inp" value="Пароль:" onfocus="if (this.value == 'Пароль:')
                    this.value = '';" onblur="if (this.value == '') {
                    this.value = 'Пароль:'
                }"/></div>
                            <div class="form-row"><input type="submit" value="Войти" class="submit"/><input type="checkbox" class="check"/><label>запомнить меня</label></div>
                            <div class="form-row">
                                <a href="#">Забыли пароль?</a><br/>
                                <a href="#">Забыли логин?</a>
                            </div>
                        </form>
                        <a href="#" class="close-vhod"></a>
                    </div>
                </div>
                <div class="phone">
                    <div class="big">
                        <p><sup>+7 (926)/</sup> 521-29-30</p>
                        <p><sup>(499)/</sup>  741-71-04</p>
                        <p><sup>(499)/</sup>  741-99-63</p>
                    </div>
                    <p>Ежедневно с 9.00 до 22.00 </p>
                </div>
                <div class="search">
                    <p><b>Поиск по сайту:</b></p>
                    <form>
                        <input type="text" class="s-text" value="—введите что хотите найти—"/>
                        <input type="submit" class="s-btn" value=""/>
                    </form>
                    <p>Например: <a href="#">Свадебные прически</a></p>
                </div>
                <a href="#" id="logo"></a>
                <div class="horizontal-nav full-width horizontalNav-notprocessed">
                    <?php
                    $this->widget('application.components.FrontendMenuWidget', array(
                        'menu_key' => '_head',
                                'type' => 'main',
//                        'type' => 'list',
                        'link_class' => TRUE,
                        'show_title' => TRUE
                    ));
//                die;
                    ?>
                    <?php // $this->widget('application.components.FrontendMenuWidget'); ?>
                </div>
            </div>
            <div id="wrapper"><div class="wrap-in"><div class="cont-in">
                        <?php //$this->widget('application.components.FrontendMenuWidget'); ?>


                        <?php echo $content; ?>

                    </div></div></div>
            <div id="footer">
                <div class="foot-in">
                    <div class="cont-in">
                        <div class="socials"><img src="images/soc.jpg" alt=""/></div>
                        <p>Fashion-Studio в Люблино © 2012</p>
                        <a href="#" class="sitemap">карта сайта</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
