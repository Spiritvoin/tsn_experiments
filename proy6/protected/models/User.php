<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $email
 * @property string $passwd
 * @property string $first_name
 * @property string $last_name
 * @property integer $phone
 * @property string $date_create
 * @property string $date_last_login
 * @property integer $role_id
 * @property string $date_leave
 * @property integer $status
 */
class User extends CActiveRecord
{


    const ADMIN_ROLE = 1;
    const WEBUSER_ROLE = 2;

	public $passwd2;
	public $terms = false;
	public $salt;
	public $validacion;

//	public $FB_login;// check FB login option status on||off
//	public function __construct() {
//		 $this->FB_login = Options::model()->findByAttributes(array('type' => 'FB_login'))->code;
//	}

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model( $className = __CLASS__ ) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'tsn_user';
	}

	/**
	 * @return array validacion rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('email, passwd, first_name, last_name, country_id', 'required'),
				array('passwd2, zip, city', 'required', 'on' => 'registerwcaptcha'),
				array('passwd2', 'compare', 'compareAttribute' => 'passwd', 'message' => 'Passwords don\'t match', 'on' => array('registerwcaptcha')),
				array('terms', 'compare', 'compareValue' => 1, 'message' => 'You must agree with terms', 'on' => array('registerwcaptcha')),
				array('phone, role_id, status', 'numerical', 'integerOnly' => true),
				array('email, passwd', 'length', 'max' => 255, 'min' => 6),
				array('first_name, last_name, city', 'length', 'max' => 255),
				array('date_create, date_last_login, date_leave, country_id, state_id, city, fb_id, phone', 'safe'),
				array('email', 'email'),
				array('email', 'unique'),
//				array('validacion',
//						'application.extensions.recaptcha.EReCaptchaValidator',
//						'privateKey' => '6LcJwtYSAAAAAMhe_siwVr1UKLZWPKnEaI3sjllT',
//						'on' => 'registerwcaptcha'
//				),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, email, passwd, first_name, last_name, phone, date_create, role_id, country_id, state_id, fb_id', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'country' => array(self::BELONGS_TO, 'Countries', array('id' => 'country_id')),
				'state' => array(self::BELONGS_TO, 'States', array('state_id' => 'id')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {

		return array(
				'id' => 'ID',
				'fb_id' => 'Facebook Id',
				'email' => 'Email',
				'passwd' => 'Password',
				'first_name' => 'First Name',
				'last_name' => 'Last Name',
				'phone' => 'Phone',
				'date_create' => 'Date Create',
				'date_last_login' => 'Date Last Login',
				'role_id' => 'Type',
				'date_leave' => 'Date Leave',
				'status' => 'Status',
				'country_id' => 'Country',
				'state_id' => 'State',
				'passwd2' => 'Confirm Password',
				'terms' => 'I agree with <a href="' . Yii::app()->createUrl('page/page/infopage/', array('name' => 'terms')) . '">Terms of Use</a>',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;
//         $criteria->condition = 'status=0';
		$criteria->compare('id', $this->id);
		$criteria->compare('fb_id', $this->fb_id);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('passwd', $this->passwd, true);
		$criteria->compare('first_name', $this->first_name, true);
		$criteria->compare('last_name', $this->last_name, true);
		$criteria->compare('phone', $this->phone);
		$criteria->compare('country_id', $this->country_id);
		$criteria->compare('state_id', $this->state_id);
		$criteria->compare('date_create', $this->date_create, true);
		$criteria->compare('date_last_login', $this->date_last_login, true);
		$criteria->compare('role_id', $this->role_id);
		$criteria->compare('date_leave', $this->date_leave);
        $criteria->order = "id DESC";

		// $criteria->compare('status', $this->status);
		return new CActiveDataProvider($this, array(
						  'criteria' => $criteria,
				  ));
	}

	/**
	 * validate password auth
	 */
	public function validatePassword1( $password ) {
		return $this->passwd === $password;
	}

	// Get username
	public function getUsername() {
		Yii::app()->getModule('users');
		$username = User::model()->findAllByAttributes(array('email' => $this->email));
		return $username;
	}

    /**
     * @param $key_type
     * @internal param string $out
     * @return string representation of the type of user.
     */
    public static function getTextTypeUser($key_type){
        $label = self::getArrayTypesUser();
        return $label[$key_type];
    }

    /**
     * $param empty.
     * @return array_types_users.
     */
    public static function getArrayTypesUser()
    {
        return array(
            self::ADMIN_ROLE => 'Admin',
            self::WEBUSER_ROLE => 'User',
        );
    }

	public function validatePassword( $password ) {
		return $this->hashPassword($password, $this->salt) === $this->passwd;
	}

	public function hashPassword( $password, $salt ) {
		return md5($salt . $password);
	}

	static function countUsers( $attrs ) {
		$model = User::model()->countByAttributes($attrs);

		return $model;
	}

	public static function getTimeUSA( $date ) {
		$time = date('m/d/Y H:i:s', strtotime($date));
		return $time;
	}

	/*	 * **********************************************
	 * @return 
	 * FB_user  - info about user											
	 * *********************************************** */

	public static function getFBUser() {
		$login = false;
		$data;
//		$this->FB_login = Options::model()->findByAttributes(array('type' => 'FB_login'))->code;
		# if  FB_login option on

		try
		{
			$FB_id = Yii::app()->facebook->getUser(); // try get facebook user id
			if ($FB_id)
			{
				$login = true;
			}
		}
		catch (FacebookApiException $e)
		{
			$login = false;
		}


		if ($login === true)
			$data = Yii::app()->facebook->api('/me'); // if isset facebook user id -> get user information
		else
			$data = false;



		return $data;
	}

	public static function FB_isActive() {
		return Options::model()->findByAttributes(array('type' => 'FB_login'))->code ;
	}

}
