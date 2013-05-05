<?php

class PostsController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
//            'postsOnly + delete', // we only allow deletion via POSTS request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {

        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'admin', 'view', 'create', 'update', 'delete', 'imageupload'),
                'expression' => 'Yii::app()->user->isAdmin()',
            ),
            array('deny', // deny all users
                'expression' => '!Yii::app()->user->isAdmin()',
            ),
        );
    }

    public function actionImageUpload() {
        if (!empty($_FILES['file']['name'])) {
            $webPath = '/uploads/';
            $uploadPath = Yii::getPathOfAlias('webroot') . $webPath;
            $dir = $uploadPath;

            $_FILES['file']['type'] = strtolower($_FILES['file']['type']);

            if ($_FILES['file']['type'] == 'image/png'
                    || $_FILES['file']['type'] == 'image/jpg'
                    || $_FILES['file']['type'] == 'image/gif'
                    || $_FILES['file']['type'] == 'image/jpeg'
                    || $_FILES['file']['type'] == 'image/pjpeg') {
                // setting file's mysterious name
                $file = md5(date('YmdHis')) . '.jpg';

                // copying
                copy($_FILES['file']['tmp_name'], $dir . $file);

                // displaying file
                $array = array(
                    'filelink' => Yii::app()->createAbsoluteUrl($webPath . $file),
                );

                echo stripslashes(json_encode($array));
            }
        }
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $model_comment = new Comments('search');

        $model_comment->unsetAttributes();  // clear any default values
        if (isset($_GET['Comments']))
            $model_comment->attributes = $_GET['Comments'];

        $this->render('view', array(
            'model' => $this->loadModel($id), 'model_comment' => $model_comment
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {

        $model = new Posts;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $model_postmeta = new PostMeta('search');

        $model_user = new User('search');
        $model_user->unsetAttributes();
        if (isset($_GET['User']))
            $model_user->attributes = $_GET['User'];


        if (isset($_POST['Posts'])) {
            $model->attributes = $_POST['Posts'];
            $vowels = array(" ", ',');
            $permalink = strtolower(str_replace($vowels, "-", $model->title));
            $find_like_permalink = Posts::model()->findAll(array('order' => 'permalink', 'condition' => 'permalink LIKE :permalink', 'params' => array(':permalink' => "$permalink%")));
           $listData =  CHtml::listData($find_like_permalink, 'id', 'permalink');
           $model->permalink = Functions::generationPermalink($permalink,$listData);         
            
            
            
            
            
            
            if (isset($_POST['_author_id'])) {
                $model->author_id = $_POST['_author_id'];
            }
            if (!empty($_POST['Posts']['_category_checkboxList'])) {
                $model->_category_checkboxList=$_POST['Posts']['_category_checkboxList'];
            }
            



            if ($model->save()) {
                if (isset($_POST['postmeta']["field"]) && !empty($_POST['postmeta']["field"])) {
                    PostMeta::model()->deleteAllByAttributes(array('type' => 'field', 'post_id' => $model->id));
                    foreach ($_POST['postmeta']['field'] as $element) {
                        $model_post_meta = new PostMeta();
                        $model_post_meta->post_id = $model->id;
                        $model_post_meta->type = 'field';
                        $model_post_meta->value = $element;
                        $model_post_meta->save();
                    }
                }
                if (isset($_POST['postmeta']["area"]) && !empty($_POST['postmeta']["area"])) {
                    PostMeta::model()->deleteAllByAttributes(array('type' => 'area', 'post_id' => $model->id));
                    foreach ($_POST['postmeta']['area'] as $element) {
                        $model_post_meta = new PostMeta();
                        $model_post_meta->post_id = $model->id;
                        $model_post_meta->type = 'area';
                        $model_post_meta->value = $element;
                        $model_post_meta->save();
                    }
                }

                if (isset($_POST['postmeta']["file"]) && !empty($_POST['postmeta']["file"])) {
                    PostMeta::model()->deleteAllByAttributes(array('type' => 'file', 'post_id' => $model->id));
                    foreach ($_POST['postmeta']["file"] as $element) {
                        $model_post_meta = new PostMeta();
                        $model_post_meta->post_id = $model->id;
                        $model_post_meta->type = 'file';
                        $model_post_meta->value = $element;
                        $model_post_meta->save();
                    }
                }
                if (!empty($_POST['Posts']['_category_checkboxList'])) {
                    Postcategoryrelation::model()->deleteAllByAttributes(array('post_id' => $model->id));
                    foreach ($_POST['Posts']['_category_checkboxList'] as $category) {
                        $post_cat_rel = new Postcategoryrelation();
                        $post_cat_rel->post_id = $model->id;
                        $post_cat_rel->category_id = $category;
                        $post_cat_rel->save();
                    }
                }


                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'model_user' => $model_user,
//            'model_postmeta'=>$model_postmeta,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {

        $model = $this->loadModel($id);


        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $model_user = new User('search');
        $model_user->unsetAttributes();
        if (isset($_GET['User']))
            $model_user->attributes = $_GET['User'];


        if (isset($_POST['Posts'])) {
            $model->attributes = $_POST['Posts'];
            
            $vowels = array(" ", ',');
            $permalink = strtolower(str_replace($vowels, "-", $model->title));
            $find_like_permalink = Posts::model()->findAll(array('order' => 'permalink', 'condition' => 'permalink LIKE :permalink', 'params' => array(':permalink' => "$permalink%")));
            $listData =  CHtml::listData($find_like_permalink, 'id', 'permalink');
            $model->permalink = Functions::generationPermalink($permalink,$listData);   
            
            
            if (isset($_POST['_author_id'])) {
                $model->author_id = $_POST['_author_id'];
            }

            if (isset($_POST['postmeta']["field"]) && !empty($_POST['postmeta']["field"])) {
                PostMeta::model()->deleteAllByAttributes(array('type' => 'field', 'post_id' => $model->id));
                foreach ($_POST['postmeta']['field'] as $element) {
                    $model_post_meta = new PostMeta();
                    $model_post_meta->post_id = $model->id;
                    $model_post_meta->type = 'field';
                    $model_post_meta->value = $element;
                    $model_post_meta->save();
                }
            }
            if (isset($_POST['postmeta']["area"]) && !empty($_POST['postmeta']["area"])) {
                PostMeta::model()->deleteAllByAttributes(array('type' => 'area', 'post_id' => $model->id));
                foreach ($_POST['postmeta']['area'] as $element) {
                    $model_post_meta = new PostMeta();
                    $model_post_meta->post_id = $model->id;
                    $model_post_meta->type = 'area';
                    $model_post_meta->value = $element;
                    $model_post_meta->save();
                }
            }

            if (isset($_POST['postmeta']["file"]) && !empty($_POST['postmeta']["file"])) {
                PostMeta::model()->deleteAllByAttributes(array('type' => 'file', 'post_id' => $model->id));
                foreach ($_POST['postmeta']["file"] as $element) {
                    $model_post_meta = new PostMeta();
                    $model_post_meta->post_id = $model->id;
                    $model_post_meta->type = 'file';
                    $model_post_meta->value = $element;
                    $model_post_meta->save();
                }
            }
            if (!empty($_POST['Posts']['_category_checkboxList'])) {
                Postcategoryrelation::model()->deleteAllByAttributes(array('post_id' => $model->id));
                foreach ($_POST['Posts']['_category_checkboxList'] as $category) {
                    $post_cat_rel = new Postcategoryrelation();
                    $post_cat_rel->post_id = $model->id;
                    $post_cat_rel->category_id = $category;
                    $post_cat_rel->save();
                }
            }



            if ($model->save()) {
                
            }
        }

        $this->render('update', array(
            'model' => $model,
            'model_user' => $model_user
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {

        $this->loadModel($id)->delete();
//        PostMeta::model()->deleteAllByAttributes(array('post_id' => $id));
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {

        $dataProvider = new CActiveDataProvider('Posts');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {

        $model = new Posts('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Posts']))
            $model->attributes = $_GET['Posts'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {

        $model = Posts::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'post-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
