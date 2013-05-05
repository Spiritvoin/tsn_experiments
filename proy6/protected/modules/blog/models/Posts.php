<?php

class Posts extends CActiveRecord
{
    /**
     * The followings are the available columns in table 'tbl_posts':
     * @var integer $id
     * @var string $title
     * @var string $content
     * @var string $tags
     * @var integer $status
     * @var integer $create_time
     * @var integer $update_time
     * @var integer $author_id
     */

    const STATUS_DRAFT = 1;
    const STATUS_PUBLISHED = 2;
    const STATUS_ARCHIVED = 3;

    private $_oldTags;
    public $_useremail;
    public $_category_id;
    public $_category_checkboxList;

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
        return '{{posts}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, status, author_id', 'required'),
            array('status', 'in', 'range' => array(1, 2, 3)),
            array('title', 'length', 'max' => 128),
            array('tags', 'match', 'pattern' => '/^[\w\s,]+$/', 'message' => 'Tags can only contain word characters.'),
            array('tags', 'normalizeTags'),
            array('thumbnail', 'length', 'max' => 255), 
            array('content, permalink', 'safe'),
            array('title, status, _useremail, _category_id, _category_checkboxList, update_time, author_id, thumbnail, content', 'safe', 'on' => 'search'),
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
            'user' => array(self::HAS_ONE, 'User', array('id' => 'author_id')),
            'comments' => array(self::HAS_MANY, 'Comments', 'post_id', 'condition' => 'comments.status=' . Comments::STATUS_APPROVED, 'order' => 'comments.create_time DESC'),
            'commentCount' => array(self::STAT, 'Comments', 'post_id', 'condition' => 'status=' . Comments::STATUS_APPROVED),
            'postcategoryrelations' => array(self::HAS_MANY, 'Postcategoryrelation', array('post_id' => 'id')),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'Id',
            'title' => 'Title',
            'content' => 'Content',
            'permalink'=>'Permalink',
            'tags' => 'Tags',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'author_id' => 'Author',
            '_category_checkboxList' => 'Categories',
            '_category_id' => 'Category',
            'thumbnail' => 'Thumbnail'
        );
    }

//    /**
//     * @return string the URL that shows the detail of the post
//     */
//    public function getUrl()
//    {
//        return Yii::app()->createUrl('blog/posts/view', array(
//                    'id' => $this->id,
//                    'title' => $this->title,
//                ));
//    }

    /**
     * @return string the post's thumbnail
     */
    public function getThumbnail($width = 640, $height = 480,$thum='thumbnail')
    {
        $thumbnail = '';
        if (!empty($this->$thum))
            $thumbnail = '<img width="' . $width . '" height="' . $height . '" src="' . Yii::app()->request->hostInfo . $this->$thum . '" />';
        return $thumbnail;
    }

    /**
     * @return array a list of links that point to the post list filtered by every tag of this post
     */
    public function getTagLinks()
    {
        $links = array();
        foreach (Tag::string2array($this->tags) as $tag)
            $links[] = CHtml::link(CHtml::encode($tag), array('posts/index', 'tag' => $tag));
        return $links;
    }

    public function getCategoryLinks()
    {
        $data = array();
        $links = array();
        $data = CHtml::listData(Postcategoryrelation::model()->findAllByAttributes(array('post_id' => $this->id)), 'category.id', 'category.name');
        foreach ($data as $key => $item) {
            $links[] = CHtml::link(CHtml::encode($item), array('posts/index', 'category' => $key));
        }
        return implode(', ', $links);
    }

    /**
     * Normalizes the user-entered tags.
     */
    public function normalizeTags($attribute, $params)
    {
        $this->tags = Tag::array2string(array_unique(Tag::string2array($this->tags)));
    }

    /**
     * Adds a new comment to this post.
     * This method will set status and post_id of the comment accordingly.
     * @param Comment the comment to be added
     * @return boolean whether the comment is saved successfully
     */
    public function addComment($comment)
    {
        if (Yii::app()->params['commentNeedApproval'])
            $comment->status = Comments::STATUS_PENDING;
        else
            $comment->status = Comments::STATUS_APPROVED;
        $comment->post_id = $this->id;
        return $comment->save();
    }

    /**
     * This is invoked when a record is populated with data from a find() call.
     */
    protected function afterFind()
    {
        parent::afterFind();
        $this->_oldTags = $this->tags;
    }

    /**
     * This is invoked before the record is saved.
     * @return boolean whether the record should be saved.
     */
    protected function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->create_time = $this->update_time = date("Y-m-d H:i:s");
//                                if($this->author_id == null){
//                                    $this->author_id = Yii::app()->user->id;
//                                }
            }
            else
                $this->update_time = date("Y-m-d H:i:s");
            return true;
        }
        else
            return false;
    }

    /**
     * Retrieves the list of posts based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the needed posts.
     */
    public function search()
    {

        $criteria = new CDbCriteria;
        $criteria->with = array("user");
//        $criteria->join ='';
        $criteria->condition.=' 1=1 ';
        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.title', $this->title, true);

        $criteria->compare('t.status', $this->status, true);

        $criteria->compare('t.content', $this->content, true);
        $criteria->compare('t.tags', $this->tags, true);
        $criteria->compare('t.create_time', $this->create_time, true);
        $criteria->compare('t.update_time', $this->update_time, true);
        $criteria->compare('t.author_id', $this->author_id, true);
        $criteria->compare('user.email', $this->_useremail, true);
//        var_dump($this->_category_id);
        if (!empty($this->_category_id)) {
            $criteria->join = 'JOIN tsn_post_category_relation ON t.id = tsn_post_category_relation.post_id ';
            $criteria->condition.=' AND tsn_post_category_relation.category_id=' . $this->_category_id;
        }

        return new CActiveDataProvider('Posts', array(
                    'criteria' => $criteria,
                    'sort' => array(
                        'defaultOrder' => 't.status, update_time DESC',
                    ),
                ));
    }

    public function getPostLink()
    {
        return Yii::app()->createUrl("/blog/posts/view/", array(/*'id' => $this->id,*/ 'permalink' => $this->permalink));
    }


    /**
     * @param $key_status
     * @internal param string $out
     * @return string representation of the status of posts.
     */
    public static function getTextStatusPost($key_status){
        $label = self::getArrayStatusPosts();
        return $label[$key_status];
    }

    /**
     * $param empty.
     * @return array_status_posts.
     */
    public static function getArrayStatusPosts()
    {
        return array(
            self::STATUS_DRAFT => 'Draft',
            self::STATUS_PUBLISHED => 'Published',
            self::STATUS_ARCHIVED => 'Archived',
        );
    }
}