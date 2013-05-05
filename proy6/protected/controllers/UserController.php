<?php

class UserController extends Controller
{

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('index'),
                'expression' => '!Yii::app()->user->isGuest',
            ),
            array('allow',
                'actions' => array('view'),
                'expression' => '!Yii::app()->user->isGuest',
            ),
            array('allow',
                'actions' => array('create', 'admin', 'delete'),
                'expression' => 'Yii::app()->user->isAdmin()',
            ),
            array('allow',
                'actions' => array('update', 'Loginasuser'),
                'expression' => 'Yii::app()->user->isAdvertiser() || Yii::app()->user->isAdmin()'
            ),
            /* array('allow',
              'actions'=> array('admin')
              ), */
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $request = Yii::app()->request;

        if (Yii::app()->user->isAdmin()) {
            $id = (int) $request->getQuery("id");
        } else {
            $id = Yii::app()->user->id;
        }
        $model = $this->loadModel($id);
        $this->render('view', compact('model'));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model_countries = Countries::model();
        $model_zones = Zones::model();
        $countries = $model_countries;
        $zones = $model_zones->findAllByAttributes(array('countryID' => 223));
        Yii::app()->theme = 'advertiser';
        $model = new User;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $model->countryID = $_POST['Countries']['countryID'];

            if (isset($_POST['Zones']['zoneID']) && $_POST['Countries']['countryID'] == 223)
                $model->zoneID = $_POST['Zones']['zoneID'];
            else
                $model->zoneID = '';
            $model->attributes = $_POST['User'];
            if ($model->save()) {
                $this->regMail();
                $this->redirect(array('admin'));
                //$this->redirect(array('view','id'=>$model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'model_countries' => $model_countries,
            'model_zones' => $model_zones,
            'countries' => $countries,
            'zones' => $zones
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {

        $model_countries = Countries::model();
        $model_zones = Zones::model();
        $countries = $model_countries;
        $zones = $model_zones->findAllByAttributes(array('countryID' => 223));
        Yii::app()->theme = 'advertiser';
        if (!Yii::app()->user->isAdmin()) {
            $id = Yii::app()->user->getID();
        }
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $model->countryID = $_POST['Countries']['countryID'];

            if (isset($_POST['Zones']['zoneID']) && $_POST['Countries']['countryID'] == 223)
                $model->zoneID = $_POST['Zones']['zoneID'];
            else
                $model->zoneID = '';
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
            'model_countries' => $model_countries,
            'model_zones' => $model_zones,
            'countries' => $countries,
            'zones' => $zones
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            //$this->loadModel($id)->delete();
            //Disable user
            //Disable status = 1
            $model = User::model()->findByPk($id);
            if ($model) {
                $model->status = 1;
                $model->save();
            }
            //$this->loadModel($id)->$model1();
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        // $request = Yii::app()->request;

        if (Yii::app()->user->isAdmin()) {
            $dataProvider = new CActiveDataProvider('User');
            $this->render('index', array(
                'dataProvider' => $dataProvider,
            ));
        } else {
            $id = Yii::app()->user->id;
            $this->actionView($id);
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        Yii::app()->theme = 'advertiser';

        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * mail notification after registartion
     */
    public function regMail()
    {
        $email = $_POST['User']['email'];
        $message = "Congratulations!
                  \nYou are registred in accounting.
                  \nGo to login page http://" . $_SERVER['HTTP_HOST'] . $this->createUrl('/users/auth/login') . "
                  \nLogin: " . $email . "
                  \nPasswd: " . $_POST['User']['passwd'];
        Yii::app()->mailer->Host = 'localhost';
        Yii::app()->mailer->IsSMTP();
        Yii::app()->mailer->From = 'accounting@devserverca.org.ua';
        Yii::app()->mailer->FromName = 'Accounting';
        //Yii::app()->mailer->AddReplyTo($mail);
        Yii::app()->mailer->AddAddress($email);
        Yii::app()->mailer->Subject = 'accounting registration';
        Yii::app()->mailer->Body = $message;
        Yii::app()->mailer->Send();
    }

    public function actionLoginasuser($id)
    {
        $identity = new UserIdentity(null, null, $id);
        $res = Yii::app()->user->login($identity);
        if ($res) {
            $this->redirect(Yii::app()->createUrl('/coupon/admin'));
        }
    }

}
