<div class="grid_12 no-box">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'page-form',
        'enableAjaxValidation' => false,
//        'action' => array('menu/AddLinkMenu'),
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <div style="margin-left: 197px; ">
            <?php echo $form->textField($model, 'title', array('size' => 50, 'maxlength' => 10000)); ?>
            <?php echo $form->error($model, 'title'); ?>
        </div>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'url'); ?>
        <div style="margin-left: 197px; ">
            <?php echo $form->textField($model, 'url', array('size' => 50, 'maxlength' => 10000)); ?>
            <?php echo $form->error($model, 'url'); ?>
        </div>
    </div>


    <div class="actions">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
