<div class="block-sign_in-wrapper">
            <div id="block-sign_in" class="block-popup">
                <div class="block-popup-in">
                    <div class="title-popup-in">
                        <h2><?php echo Yii::t('popup_login', 'title'); ?></h2>
                    </div>
                    <div class="block-popup-in-2">

                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'login-form',
                            'action' => Yii::app()->createUrl('/auth/loginpopup'),
                            'enableAjaxValidation' => true,
                            'enableClientValidation' => true,
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                            ),
                        ));
                        ?>
                        <div class="base-form">
                            <?php
//                                    Yii::app()->eauth->renderWidget(array(
//                                        'action' => '/auth/social'
//                                    ));
                            ?>

                            <div class="fb-btn base-btn"> <?php echo CHtml::link('Facebook Sign Up', Yii::app()->createUrl('auth/facebook/login'), array('class' => 'fb-login')) ?> </div>
                            <big><?php echo Yii::t('popup_login', 'or') ?></big>
                            <div class="row">
                                <?php echo $form->labelEx($model,'email'); ?>
                                <?php echo $form->textField($model, 'email'); ?>
                                <?php echo $form->error($model, 'email'); ?>
                            </div>
                            <div class="row">
                                <?php echo $form->labelEx($model,'password'); ?>
                                <?php echo $form->passwordField($model, 'password'); ?>
                                <?php echo $form->error($model, 'password'); ?>
                            </div>
                            <div class="row forgot-pass row-pad">
                                <?php echo CHtml::submitButton('Submit', array('class' => 'base-btn join')); ?>
                                <?php echo CHtml::link(Yii::t("UserModule.frontend", "Forgot Password?"), array('/auth/recoverypass'), array('class' => 'but-blue')); ?>
                            </div>
                            <div class="block-line">
                                <p>
                                    <?php
                                    echo CHtml::link('Terms of Use', array('/static/static/viewPage', 'url' => 'terms-of-use'), array('target' => '_blank')
                                    );
                                    ?> and <?php
                                    echo CHtml::link('Privacy Policy', array('/static/static/viewPage', 'url' => 'privacy-policy'), array('target' => '_blank')); ?>
                                </p>
                            </div>
                        </div>
                        <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
        </div>