<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <?php // var_dump($model->attributes) ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 64)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>


    <div class="row">
        <?php
//        echo '<pre>';
//            var_dump(CHtml::listData(Options::model()->findAll(array('condition' => 'type = :UserRole', 'params' => array(':UserRole' => 'UserRole'))), 'code', 'value'));
//            echo '</pre>';
//            die;
        ?>
        <?php echo $form->labelEx($model, 'role_id'); ?>
        <?php echo $form->dropDownList($model, 'role_id', User::getArrayTypesUser()) ?>
        <?php echo $form->error($model, 'role_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'first_name'); ?>
        <?php echo $form->textField($model, 'first_name', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'first_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'last_name'); ?>
        <?php echo $form->textField($model, 'last_name', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'last_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'phone'); ?>
        <?php echo $form->textField($model, 'phone'); ?>
        <?php echo $form->error($model, 'phone'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'country_id'); ?>
        <?php
        echo $form->dropDownList($model, 'country_id', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name_en'), array(
            'ajax' => array(
                'type' => 'POST', //request type
                'url' => CController::createUrl('user/dynamicstate'), //url to call.
                'update' => '#state_id', //selector to update
                'success' => 'function(data) {
                    var element = jQuery("#state_id")
                    if(data!="none"){
                        element.html(data);
                        element.parents(".row").show();
                        element.selectmenu("destroy");
                        element.selectmenu({
                            style: \'dropdown\',
                            transferClasses: true,
                            width: null
                    });
                    }else{
                    element.selectmenu("destroy");                
                    element.parents(".row").hide();
                    } 
                }',
                )));
        ?>
    </div>
    <div class="row" style="<?php echo ($model->state_id && $model->country_id!=220)?'':'display: none;' ?>" >
        <?php echo $form->labelEx($model, 'state_id'); ?>
        <?php echo $form->dropDownList($model, 'state_id',CHtml::listData(States::model()->findAllByAttributes(array('country_id' => $model->country_id)), 'id', 'state_name_en'), array('id' => 'state_id','empty'=>'Select state')); ?>
        <?php echo $form->error($model, 'state_id'); ?>
    </div>


    <div class="row">

        <?php  echo $form->labelEx($model, 'passwd'); ?>
        <?php echo $form->passwordField($model, 'passwd', array('size' => 60, 'maxlength' => 255, 'autocomplete' => 'off', 'value' => '')); ?>
        <?php echo $form->error($model, 'passwd'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->