<?php
//$this->widget('zii.widgets.CListView', array(
//    'dataProvider' => $dataProvider,
//    'itemView' => '_footer_menu_item',
//    'pagerCssClass' => $menu_key,
//    'template' => FALSE
//));
?>
<?php if (!empty($menu_items)) { ?>
    <ul class="<?php echo $class; ?> <?php echo $menu_key; ?>">
        <?php if (isset($menu_name) && !empty($menu_name)) { ?>
            <li><?php echo "$menu_name"; ?></li>
        <?php } ?>
        <?php
        foreach ($menu_items as $item) {
//            if (isset($_GET["language"])) {
//                $model_fot_page_other_lang = Page::model()->findByAttributes(array('language' => $_GET["language"], 'permalink' => $item->page->permalink));
//            }
//            if (isset($model_fot_page_other_lang) && !empty($model_fot_page_other_lang)) {
//                $item = $model_fot_page_other_lang;
                ?>
<!--                <li><a class="<?php // echo ($link_class) ? $item->permalink : ''; ?>" href="<?php // echo ($item->content != 'link') ? Yii::app()->urlManager->multicreateUrl('/page/' . $item->url) : $item->url; ?>" title=""><?php // echo ($show_title) ? $item->title : ''; ?></a></li>-->
                <?php
//            } else {
                ?>
                <li><a class="<?php echo ($link_class) ? $item->page->permalink : ''; ?>" href="<?php echo ($item->page->content != 'link') ? Yii::app()->createUrl('/page/' . $item->page->url) : $item->page->url; ?>" title=""><?php echo ($show_title) ? $item->page->title : ''; ?></a></li>
                <?php
//            }
        }
        ?>
    </ul>
<?php } ?>