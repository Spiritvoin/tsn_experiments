<?php

class AuthController extends Controller
{

    const USER_CONFIRM = 1;
    const USER_NOT_CONFIRM = 2;
    const ROLE_USER = 2;
    const ROLE_ADMIN = 1;

    public $title = null;

    public function actionLogin()
    {
        $model = new LoginForm;

        //if is FB user
        $fb_data = User::getFBUser();
        if ($fb_data) {
            $user = User::model()->findByAttributes(array('email' => $fb_data["email"]));

            if ($user) {
                $id = $user->id;
                $identity = new UserIdentity(null, null, $id);
                Yii::app()->user->login($identity);
                $this->redirect(Yii::app()->user->returnUrl . '/');
            } else {
                $this->redirect(Yii::app()->createUrl('/auth/registration'));
            }
        }
        // if it is ajax validacion request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl . '/');
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }
    public function actionLoginPopup()
    {
        $this->layout = 'popup';
        $model = new LoginForm;

        //if is FB user
        $fb_data = User::getFBUser();
        if ($fb_data) {
            $user = User::model()->findByAttributes(array('email' => $fb_data["email"]));

            if ($user) {
                $id = $user->id;
                $identity = new UserIdentity(null, null, $id);
                Yii::app()->user->login($identity);
                $this->redirect(Yii::app()->user->returnUrl . '/');
            } else {
                $this->redirect(Yii::app()->createUrl('/auth/registration'));
            }
        }
        // if it is ajax validacion request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
//                $this->redirect(Yii::app()->user->returnUrl . '/');
                echo '<script type="text/javascript">parent.location.reload();</script>';
        }
        // display the login form
        $this->render('_login_popup', array('model' => $model));
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    private function mail1($mail, $message, $subject)
    {
        Yii::app()->mailer->Host = 'localhost';
        Yii::app()->mailer->IsSMTP();
        Yii::app()->mailer->From = 'info@netmania.in.ua';


        Yii::app()->mailer->AddAddress($mail);
        Yii::app()->mailer->Subject = $subject;
        Yii::app()->mailer->Body = $message;
        Yii::app()->mailer->Send();
    }

    public function actionRegistration()
    {

        if (Yii::app()->user->hasFlash('message')) {
            PopupFancy::showMessage('<div class="block-popup">
                 <div class="block-registration">
                    <div class="block-popup-in">
                        <p><b></b></p>
                        <p>' . Yii::app()->user->getFlash('message') . '</p>
                     </div>
                     <div class="but">
                        <a href="javascript:;" class="popup_button" onclick="$.fancybox.close()">OK</a>
                        <div class="but-in">&nbsp;</div>
                     </div>
                 </div>
            </div>');
        }

        $model = new User;
        $model_countries = Countries::model();
        $model_states = States::model();
        $countries = $model_countries;
        $states = $model_states->findAllByAttributes(array('country_id' => 223));
        $model->scenario = 'registerwcaptcha';

        /*
         *  check option FB login status and fb user id
         */
        $fb_data = $model::getFBUser();
        if ($model::FB_isActive() && $fb_data) { //FB login mode -> ON && isset FB data
            if (!$model->findByAttributes(array('email' => $fb_data["email"]))) {// its new email
                $model->first_name = $fb_data["first_name"];
                $model->last_name = $fb_data["last_name"];
                $model->email = $fb_data["email"];
                $model->fb_id = $fb_data["id"];
                $model->status = self::USER_CONFIRM;
            } else {// its old email
                $user = $model->findByAttributes(array('email' => $fb_data["email"]));
                $id = $user->id;
                $identity = new UserIdentity(null, null, $id);
                Yii::app()->user->login($identity);
            }
        }


        if (isset($_POST['User'])) {

            $model->attributes = $_POST['User'];

            if ($model->status != self::USER_CONFIRM) {
                $model->status = self::USER_NOT_CONFIRM;
                $model->activkey = md5(rand() . microtime());
            }

            $model->passwd = (!empty($_POST['User']['passwd'])) ? md5($_POST['User']['passwd']) : '';
            $model->passwd2 = (!empty($_POST['User']['passwd2'])) ? md5($_POST['User']['passwd2']) : '';
            $model->country_id = (int) $_POST['Countries']['id'];
            $model->role_id = self::ROLE_USER;

            if (isset($_POST['States']['id']) && $_POST['Countries']['id'] == 223)
                $model->state_id = (int) $_POST['States']['id'];
            else
                $model->state_id = '';

            if ($model->validate()) {
                $model->save();

                if (!empty($model->activkey)) {
                    $activation_url = 'http://' . $_SERVER['HTTP_HOST'] . $this->createUrl('auth/activation/', array("activkey" => $model->activkey, "email" => $_POST['User']['email']));
                    $to = $_POST['User']['email'];
                    $subject = 'Please activate you account.';
                    $message = ' Congratulations on becoming a part of IDEALTERMINALS, the premier advertising network. Now that you’re a member, please click the following link to confirm your advertiser account. ' . "$activation_url" . ' Please do not hesitate to our support team if you have any questions.. Again, congratulations from all of us and good luck with all!';
                    $Extra = "From: info@" . $_SERVER['HTTP_HOST'];
                    mail($to, $subject, $message, $Extra);
                    Yii::app()->user->setFlash('message', "<p><b>Confirmation sent to your email address</b></p>
                        <small>Check your spam folder if you did not receive confirmation email.</small>");
                    $this->redirect(Yii::app()->createUrl('/site/index'));
                } else {
                    $this->redirect(Yii::app()->createUrl('/auth/login'));
                }
            }
            $model->passwd = '';
            $model->passwd2 = '';
        }





        $this->render('registration', array(
            'model' => $model,
            'model_countries' => $model_countries,
            'model_states' => $model_states,
            'countries' => $countries,
            'states' => $states
        ));
    }

    public function actionActivation()
    {
        $model = new User;
        $email = ((isset($_GET['email'])) ? $_GET['email'] : '');
        $activkey = ((isset($_GET['activkey'])) ? $_GET['activkey'] : '');

        if ($email && $activkey) {

            $user = User::model()->findByAttributes(array('email' => $email));
            if (isset($user) && $user->activkey == $activkey) {
                $user->activkey = md5(rand() . microtime());
                $user->status = self::USER_CONFIRM;
                $user->save();


                $subject = 'You confirmed the registration';
                $message = 'You confirmed the registration please login = ' . 'http://' . $_SERVER['HTTP_HOST'];
                $Extra = "From: info@" . $_SERVER['HTTP_HOST'];
                mail($email, $subject, $message, $Extra);
                $this->redirect(Yii::app()->createUrl('/auth/login'));
            }
        } else {
            die('asd');
        }
    }

    public function actionRecoveryPass()
    {


        $model = new User;
        $email = ((isset($_GET['email'])) ? $_GET['email'] : '');
        $activkey = ((isset($_GET['activkey'])) ? $_GET['activkey'] : '');

        if (isset($_POST['User']['email'])) {


            $email = $_POST['User']['email'];
            $user = User::model()->findByAttributes(array('email' => $email));
            if (isset($user) && empty($activkey)) {
                $user->activkey = md5(rand() . microtime());
                $user->save();
                //Составляем URL для сброса пароля.

                $activation_url = 'http://' . $_SERVER['HTTP_HOST'] . $this->createUrl('auth/recoverypass', array("activkey" => $user->activkey, "email" => $user->email));
                $site_name = Yii::app()->name;
                $message = 'You have requested the password recovery site ' . $site_name . 'To reset a password, go to ' . $activation_url;
                $Extra = "From: info@kiosk.trustingdomains.com";

                $to = $_POST['User']['email'];
                $subject = 'Recovry password';
                if (mail($to, $subject, $message, $Extra) == true)
                    Yii::app()->user->setFlash('message', "Confirmation key has been sent to your email.");
                else
                    Yii::app()->user->setFlash('message', "Failure when sending a message, try later.");
                $this->redirect(Yii::app()->createUrl('/site/index'));
            } else {
                Yii::app()->user->setFlash('message', "Email not found.");
                $this->redirect(Yii::app()->createUrl('/site/index'));
            }
        } else {
            //Проверяем ключ и сбрасываем пароль
            if ($email && $activkey) {

                $user = User::model()->findByAttributes(array('email' => $email));
                if (isset($user) && $user->activkey == $activkey) {
                    $newpass = rand(1000000, 20000000);
                    $user->passwd = md5($newpass);
                    $user->activkey = md5(rand() . microtime());
                    $user->save();
                    $subject = 'New password';
                    $message = 'You new pass = ' . $newpass;
                    $Extra = "From: info@kiosk.trustingdomains.com";
                    if (mail($email, $subject, $message, $Extra))
                        Yii::app()->user->setFlash('message', "Sent to your email new password");
                    else
                        Yii::app()->user->setFlash('message', "Failure when sending a new password, try later.");
                    $this->redirect(Yii::app()->createUrl('/site/index'));
                }
            }
        }

        $this->render('recoverypass', array('model' => $model));
    }

}
