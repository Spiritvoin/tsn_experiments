<?php

class Comments extends CActiveRecord
{
    /**
     * The followings are the available columns in table 'tbl_comment':
     * @var integer $id
     * @var string $content
     * @var integer $status
     * @var integer $create_time
     * @var string $guest_name
     * @var string $guest_email
     * @var string $url
     * @var integer $post_id
     */

    const STATUS_PENDING = 1;
    const STATUS_APPROVED = 2;

    /**
     * Returns the static model of the specified AR class.
     * @return CActiveRecord the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{comments}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('content, guest_name, guest_email', 'required'),
//                        array('content', 'required','on'=>'user_registered'),

            array('guest_name, guest_email, url', 'length', 'max' => 128),
            array('guest_email', 'email'),
            array('url', 'url'),
//                        array('create_time','date', 'format'=>'MM/dd/yyyy hh:mm'),
            array('author_id, create_time, status', 'safe', 'on' => 'search')
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'post' => array(self::BELONGS_TO, 'Posts', 'post_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'Id',
            'content' => 'Comment',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'guest_name' => 'Guest Name',
            'guest_email' => 'Guest Email',
            'url' => 'Website',
            'post_id' => 'Post',
            'author_id' => 'Author Id'
        );
    }

    /**
     * Approves a comment.
     */
    public function approve()
    {
        $this->status = Comment::STATUS_APPROVED;
        $this->update(array('status'));
    }

    /**
     * @param Post the post that this comment belongs to. If null, the method
     * will query for the post.
     * @return string the permalink URL for this comment
     */
    public function getUrl($post = null)
    {
        if ($post === null)
            $post = $this->post;
        return $post->PostLink . '#c' . $this->id;
    }

    /**
     * @return string the hyperlink display for the current comment's author
     */
    public function getAuthorLink()
    {
        if (!empty($this->url))
            return CHtml::link(CHtml::encode($this->guest_name), $this->url);
        else
            return CHtml::encode($this->guest_name);
    }

    /**
     * @return integer the number of comments that are pending approval
     */
    public function getPendingCommentCount()
    {
        return $this->count('status=' . self::STATUS_PENDING);
    }

    /**
     * @param integer the maximum number of comments that should be returned
     * @return array the most recently added comments
     */
    public function findRecentComments($limit = 10)
    {
        return $this->with('post')->findAll(array(
                    'condition' => 't.status=' . self::STATUS_APPROVED,
                    'order' => 't.create_time DESC',
                    'limit' => $limit,
                ));
    }

    /**
     * This is invoked before the record is saved.
     * @return boolean whether the record should be saved.
     */
//	protected function beforeSave()
//	{
//		if(parent::beforeSave())
//		{
//			if($this->isNewRecord)
//				$this->create_time=date("Y-m-d H:i:s");
//			return true;
//		}
//		else
//			return false;
//	}

    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('guest_name', $this->guest_name, true);
        $criteria->compare('guest_email', $this->guest_email, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('post_id', $this->post_id, true);
        $criteria->compare('author_id', $this->author_id);


        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}