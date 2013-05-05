<?php

/**
 * This is the model class for table "{{contents}}".
 *
 * The followings are the available columns in table '{{contents}}':
 * @property string $content_id
 * @property string $content_author
 * @property string $content_date
 * @property string $content_content
 * @property string $content_title
 * @property string $content_excerpt
 * @property string $content_status
 * @property string $content_comment_status
 * @property string $content_password
 * @property string $content_name
 * @property string $content_modified
 * @property string $content_parent
 * @property integer $content_menu_order
 * @property string $content_type
 * @property string $content_comment_count
 */
class Contents extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Contents the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{contents}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content_author, content_content, content_title, content_excerpt', 'required'),
			array('content_menu_order', 'numerical', 'integerOnly'=>true),
			array('content_author', 'length', 'max'=>255),
			array('content_status, content_comment_status, content_password, content_parent, content_type, content_comment_count', 'length', 'max'=>20),
			array('content_name', 'length', 'max'=>200),
			array('content_date, content_modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('content_id, content_author, content_date, content_content, content_title, content_excerpt, content_status, content_comment_status, content_password, content_name, content_modified, content_parent, content_menu_order, content_type, content_comment_count', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'content_id' => 'Content',
			'content_author' => 'Content Author',
			'content_date' => 'Content Date',
			'content_content' => 'Content Content',
			'content_title' => 'Content Title',
			'content_excerpt' => 'Content Excerpt',
			'content_status' => 'Content Status',
			'content_comment_status' => 'Content Comment Status',
			'content_password' => 'Content Password',
			'content_name' => 'Content Name',
			'content_modified' => 'Content Modified',
			'content_parent' => 'Content Parent',
			'content_menu_order' => 'Content Menu Order',
			'content_type' => 'Content Type',
			'content_comment_count' => 'Content Comment Count',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('content_id',$this->content_id,true);
		$criteria->compare('content_author',$this->content_author,true);
		$criteria->compare('content_date',$this->content_date,true);
		$criteria->compare('content_content',$this->content_content,true);
		$criteria->compare('content_title',$this->content_title,true);
		$criteria->compare('content_excerpt',$this->content_excerpt,true);
		$criteria->compare('content_status',$this->content_status,true);
		$criteria->compare('content_comment_status',$this->content_comment_status,true);
		$criteria->compare('content_password',$this->content_password,true);
		$criteria->compare('content_name',$this->content_name,true);
		$criteria->compare('content_modified',$this->content_modified,true);
		$criteria->compare('content_parent',$this->content_parent,true);
		$criteria->compare('content_menu_order',$this->content_menu_order);
		$criteria->compare('content_type',$this->content_type,true);
		$criteria->compare('content_comment_count',$this->content_comment_count,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}