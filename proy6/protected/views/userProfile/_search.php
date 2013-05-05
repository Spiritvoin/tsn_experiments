<?php
/* @var $this UserProfileController */
/* @var $model UserProfile */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'profile_id'); ?>
		<?php echo $form->textField($model,'profile_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profile_user_id'); ?>
		<?php echo $form->textField($model,'profile_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profile_firstname'); ?>
		<?php echo $form->textField($model,'profile_firstname',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profile_lastname'); ?>
		<?php echo $form->textField($model,'profile_lastname',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profile_email'); ?>
		<?php echo $form->textField($model,'profile_email',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profile_gender'); ?>
		<?php echo $form->textField($model,'profile_gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profile_updated'); ?>
		<?php echo $form->textField($model,'profile_updated'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profile_created'); ?>
		<?php echo $form->textField($model,'profile_created'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->