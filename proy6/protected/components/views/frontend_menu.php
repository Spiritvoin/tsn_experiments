<?php

$items = array(
    array('label' => 'Home', 'url' => array('/site/index')),
        array('label' => 'Blog', 'url' => array('/blog/posts/index'))
);

$items3 = array(
    array('label' => 'Admin Panel', 'url' => array('/admin'), 'visible' => Yii::app()->user->isAdmin()),
    array('label' => 'Login', 'url' => array('/auth/login'), 'visible' => Yii::app()->user->isGuest),
    array('label' => 'Logout(' . Yii::app()->user->getUsername(Yii::app()->getId()) . ')', 'url' => array('/auth/logout'), 'visible' => !Yii::app()->user->isGuest),
);

$items = array_merge($items, $menuItems, $items3);

$this->widget('zii.widgets.CMenu', array(
    'items' => $items,
    'htmlOptions' => array(
        'class' => 'nav',
    ),
));
//$this->widget('application.extensions.mbmenu.MbMenu',array(
//    'items' => $items,
//));
?>
