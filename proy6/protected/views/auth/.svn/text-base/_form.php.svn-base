<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('autocomplete' => "off")
            )
    );
    ?>


    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <p class="label inp-1">
            <?php echo $form->labelEx($model, 'first_name'); ?>
            <?php echo $form->textField($model, 'first_name', array('size' => 20, 'maxlength' => 255)); ?>
            <?php // echo $form->error($model, 'firs_name'); ?>
        </p>
        <p class="label inp-1">
            <?php echo $form->labelEx($model, 'last_name'); ?>
            <?php echo $form->textField($model, 'last_name', array('size' => 20, 'maxlength' => 255)); ?>
            <?php // echo $form->error($model, 'last_name'); ?>
        </p>
    </div>

    <div class="row">

        <p class="label inp-1">
            <?php echo $form->labelEx($model, 'email'); ?>
            <?php echo $form->textField($model, 'email', array('size' => 20, 'maxlength' => 255)); ?>
            <?php // echo $form->error($model, 'email'); ?>
        </p>
    </div>

    <div class="row">
        <p class="label inp-1">
            <?php echo $form->labelEx($model, 'passwd'); ?>
            <?php echo $form->passwordField($model, 'passwd', array('size' => 20, 'maxlength' => 255)); ?>
            <?php // echo $form->error($model, 'passwd'); ?>
        </p>
        <p class="label inp-1">
            <?php echo $form->labelEx($model, 'passwd2'); ?>
            <?php echo $form->passwordField($model, 'passwd2', array('size' => 20, 'maxlength' => 255)); ?>
            <?php // echo $form->error($model, 'passwd2'); ?>
        </p>
    </div>

    <div class="row">
        <p class="label sel-1">
            <?php
            $model_countries->id = 223;
            echo $form->dropDownList($model_countries, 'id', CHtml::listData($countries->findAll(), 'id', 'country_name_en'), array('class' => 'sel'));
            ?>
        </p>
        <p class="label sel-1">
            <?php echo $form->dropDownList($model_states, 'id', CHtml::listData($states, 'id', 'state_name_en'), array('class' => 'sel')); ?>
        </p>
    </div>
    <div class="row">
        <p class="label inp-1">
            <?php echo $form->labelEx($model, 'city'); ?>
            <?php echo $form->textField($model, 'city', array('size' => 20, 'maxlength' => 255)); ?>
            <?php // echo $form->error($model, 'city'); ?>
        </p>
        <p class="label inp-1">
            <?php echo $form->labelEx($model, 'zip'); ?>
            <?php echo $form->textField($model, 'zip', array('size' => 5, 'maxlength' => 5)); ?>
            <?php // echo $form->error($model, 'zip'); ?>
        </p>
        <p class="label inp-1">
            <?php echo $form->labelEx($model, 'phone'); ?>
            <?php echo $form->textField($model, 'phone', array('size' => 12, 'maxlength' => 12)); ?>
            <?php // echo $form->error($model, 'zip'); ?>
        </p>
    </div>
     

 

    <div class="row">
        <?php // echo CHtml::activeLabel($model, 'validacion'); ?>
        <?php
//        $this->widget('application.extensions.recaptcha.EReCaptcha', array('model' => $model, 'attribute' => 'validacion',
//            'theme' => 'red', 'language' => 'es_ES',
//            'publicKey' => '6LcJwtYSAAAAAN-HAUB3EsXgOujmmYABnZSHabxC'))
        ?>
        <?php // echo CHtml::error($model, 'validacion'); ?>

    </div>
    <div class="row">
        <div class="checkbox-1">
            <?php echo $form->checkBox($model, 'terms'); ?>
            <?php echo $form->labelEx($model, 'terms'); ?>
        </div>

    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->