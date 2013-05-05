<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	'enableAjaxValidation'=>FALSE,
)); ?>
<?php  echo $form->errorSummary($model); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
        <?php if(Yii::app()->user->isGuest){ ?>
            <div class="row">
		<?php echo $form->labelEx($model,'guest_name'); ?>
		<?php echo $form->textField($model,'guest_name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'guest_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'guest_email'); ?>
		<?php echo $form->textField($model,'guest_email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'guest_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>
        <?php } ?>
	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->