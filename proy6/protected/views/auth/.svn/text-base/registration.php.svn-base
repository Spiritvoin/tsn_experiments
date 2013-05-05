<div class="hr">&nbsp;</div>
<?php
$this->pageTitle = 'Reagistration';
$this->title = 'Registration';
?>

<div class="content contact contact_no_map">
    <div class="about">
        <div class="center-step">
            <?php if (Yii::app()->user->hasFlash('error')) { ?>
                <div class="flash-error">
                    <?php echo Yii::app()->user->getFlash('error'); ?>
                </div>
            <?php } elseif (Yii::app()->user->hasFlash('success')) { ?>
                <div class="flash-success">
                    <?php echo Yii::app()->user->getFlash('success'); ?>
                </div>
            <?php }; ?>

            <?php
            echo $this->renderPartial('_form', array('model' => $model, 'model_countries' => $model_countries,
                'model_states' => $model_states,
                'countries' => $countries,
                'states' => $states));
            ?>
        </div>
    </div>
</div>