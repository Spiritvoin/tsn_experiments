<?php if (Yii::app()->user->hasFlash('success')) { ?>
    <div class="alertMessage success SE" id="sflash">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php } ?>

<?php

/**
 * Created by JetBrains PhpStorm.
 * User: vladwork
 * Date: 25.04.13
 * Time: 17:46
 * To change this template use File | Settings | File Templates.
 */

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'validation',
    'enableAjaxValidation' => false,
));
?>
<?php echo SettingsCHtml::settingsCheckBox('maintenance_mode', array('id' => 'online', 'class' => 'online'), 'Maintenance Mode'); ?>

<?php echo SettingsCHtml::settingsTextField('admin_email', '', 'Email', 'Admin email'); ?>

<?php echo SettingsCHtml::settingstextArea('site_logo', array('rows' => 6, 'cols' => 70), 'Logo', 'Main logo'); ?>

<?php echo SettingsCHtml::settingstextArea('main_page_text', array('rows' => 6, 'cols' => 70), 'Text', 'Main page'); ?>


<p><?php echo CHtml::submitButton('Save', array('style' => 'margin-top: 8px;')); ?></p>
<?php $this->endWidget(); ?>
