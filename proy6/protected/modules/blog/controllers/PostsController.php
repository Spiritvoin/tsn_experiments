<?php

class PostsController extends Controller
{
//	public $layout='column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

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
			array('allow',  // allow all users to access 'index' and 'view' actions.
				'actions'=>array('index','view','create','update','admin'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated users to access all actions
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$post=$this->loadModel();
		$comment=$this->newComment($post);
		$this->render('view',array(
			'model'=>$post,
			'comment'=>$comment,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Post;
		if(isset($_POST['Posts']))
		{
			$model->attributes=$_POST['Posts'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
		if(isset($_POST['Posts']))
		{
			$model->attributes=$_POST['Posts'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex() {

        $criteria = new CDbCriteria();
        $criteria->with = array('commentCount', 'postcategoryrelations');
        $criteria->condition = 't.status=' . Posts::STATUS_PUBLISHED;
        $criteria->order = 't.update_time DESC';
     
        if (isset($_GET['category'])) {
            $criteria->join = 'JOIN tsn_post_category_relation ON t.id = tsn_post_category_relation.post_id ';
            $criteria->condition.=' AND tsn_post_category_relation.category_id=' . $_GET['category'];
        }
        if (isset($_GET['tag']))
            $criteria->addSearchCondition('t.tags', $_GET['tag']);




        $dataProvider = new CActiveDataProvider('Posts', array(
                    'criteria' => $criteria,
                    'pagination' => array(
                        'pageSize' => Yii::app()->params['postsPerPage'],
                    ),
                ));    
    

        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Posts('search');
		if(isset($_GET['Posts']))
			$model->attributes=$_GET['Posts'];
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Suggests tags based on the current user input.
	 * This is called via AJAX when the user is entering the tags input.
	 */
	public function actionSuggestTags()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$tags=Tag::model()->suggestTags($keyword);
			if($tags!==array())
				echo implode("\n",$tags);
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['permalink']))
			{
				if(Yii::app()->user->isGuest)
					$condition='status='.Posts::STATUS_PUBLISHED.' OR status='.Posts::STATUS_ARCHIVED;
				else
					$condition='';
//                                    echo '<pre>';
//                                    var_dump($_GET['permalink']);
//                                    echo '</pre>';
//                                    die;
				$this->_model=Posts::model()->findByAttributes(array('permalink'=>$_GET['permalink']), $condition);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Creates a new comments.
	 * This method attempts to create a new comments based on the user input.
	 * If the comments is successfully created, the browser will be redirected
	 * to show the created comments.
	 * @param Post the post that the new comments belongs to
	 * @return Comments the comments instance
	 */
	protected function newComment($post)
	{
		$comment=new Comments;
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($comment);
			Yii::app()->end();
		}
		if(isset($_POST['Comments']))
		{
               
                      if (Yii::app()->user->isGuest) {
                          
                        $comment->attributes = $_POST['Comments'];
                          
                      }else{
                          
                        $user = User::model()->findByPk(Yii::app()->user->id);
                        $comment->attributes = $_POST['Comments'];
                        $comment->guest_name = $user->first_name . ' ' . $user->last_name;
                        $comment->guest_email = $user->email;
                        $comment->author_id = Yii::app()->user->id;
                        $comment->create_time = date("Y-m-d H:i:s");

                      }
			
			if($post->addComment($comment))
			{
				if($comment->status==Comments::STATUS_PENDING)
					Yii::app()->user->setFlash('commentSubmitted','Thank you for your comment. Your comment will be posted once it is approved.');
				$this->refresh();
			}
		}
		return $comment;
	}
}
