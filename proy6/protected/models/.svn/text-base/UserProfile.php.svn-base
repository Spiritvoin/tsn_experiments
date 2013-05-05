<?php

/**
 * This is the model class for table "{{user_profile}}".
 *
 * The followings are the available columns in table '{{user_profile}}':
 * @property integer $profile_id
 * @property integer $profile_user_id
 * @property string $profile_firstname
 * @property string $profile_lastname
 * @property string $profile_email
 * @property integer $profile_gender
 * @property string $profile_updated
 * @property string $profile_created
 *
 * The followings are the available model relations:
 * @property User $profileUser
 */
class UserProfile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserProfile the static model class
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
		return '{{user_profile}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('profile_updated, profile_created', 'required'),
			array('profile_user_id, profile_gender', 'numerical', 'integerOnly'=>true),
			array('profile_firstname, profile_lastname, profile_email', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('profile_id, profile_user_id, profile_firstname, profile_lastname, profile_email, profile_gender, profile_updated, profile_created', 'safe', 'on'=>'search'),
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
			'profileUser' => array(self::BELONGS_TO, 'User', 'profile_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'profile_id' => 'Profile Id',
			'profile_user_id' => 'User Id',
			'profile_firstname' => 'Firstname',
			'profile_lastname' => 'Lastname',
			'profile_email' => 'Email',
			'profile_gender' => 'Gender',
			'profile_updated' => 'Profile Updated',
			'profile_created' => 'Profile Created',
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

		$criteria->compare('profile_id',$this->profile_id);
		$criteria->compare('profile_user_id',$this->profile_user_id);
		$criteria->compare('profile_firstname',$this->profile_firstname,true);
		$criteria->compare('profile_lastname',$this->profile_lastname,true);
		$criteria->compare('profile_email',$this->profile_email,true);
		$criteria->compare('profile_gender',$this->profile_gender);
		$criteria->compare('profile_updated',$this->profile_updated,true);
		$criteria->compare('profile_created',$this->profile_created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}