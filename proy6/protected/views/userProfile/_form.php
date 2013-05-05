<?php
/* @var $this UserProfileController */
/* @var $model UserProfile */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-profile-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'profile_user_id'); ?>
		<?php echo $form->textField($model,'profile_user_id'); ?>
	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profile_firstname'); ?>
		<?php echo $form->textField($model,'profile_firstname',array('size'=>60,'maxlength'=>128)); ?>
	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profile_lastname'); ?>
		<?php echo $form->textField($model,'profile_lastname',array('size'=>60,'maxlength'=>128)); ?>
	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profile_email'); ?>
		<?php echo $form->textField($model,'profile_email',array('size'=>60,'maxlength'=>128)); ?>
	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profile_gender'); ?>
		<?php echo $form->textField($model,'profile_gender'); ?>
	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profile_updated'); ?>
		<?php echo $form->textField($model,'profile_updated'); ?>
	
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profile_created'); ?>
		<?php echo $form->textField($model,'profile_created'); ?>
	
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->