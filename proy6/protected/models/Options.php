<?php

/**
 * This is the model class for table "{{Options}}".
 *
 * The followings are the available columns in table '{{Options}}':
 * @property integer $id
 * @property string $name
 * @property integer $code
 * @property string $type
 * @property integer $order_position
 */
class Options extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Options the static model class
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
        return '{{options}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('value, code, type, order_position', 'required'),
            array('code, order_position', 'numerical', 'integerOnly' => true),
            array('value, type', 'length', 'max' => 128),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, value, code, type, order_position', 'safe', 'on' => 'search'),
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
            'id' => 'ID',
            'value' => 'Value',
            'code' => 'Code',
            'type' => 'Type',
            'order_position' => 'Order Position',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('value', $this->value, true);
        $criteria->compare('code', $this->code);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('order_position', $this->order_position);

        return new CActiveDataProvider($this, array(
                    'pagination' => array(
                        'pageSize' => 20,
                    ),
                    'criteria' => $criteria,
                ));
    }

    //Получаем статусы для grid
    private static $_items = array();

    public static function items($type)
    {
        if (!isset(self::$_items[$type]))
            self::loadItems($type);
        return self::$_items[$type];
    }

    public static function item($type, $code)
    {
        if (!isset(self::$_items[$type]))
            self::loadItems($type);
        return isset(self::$_items[$type][$code]) ? self::$_items[$type][$code] : false;
    }

    private static function loadItems($type)
    {
        self::$_items[$type] = array();
        $models = self::model()->findAll(array(
            'condition' => 'type=:type',
            'params' => array(':type' => $type),
            'order' => 'order_position',
                ));
        foreach ($models as $model)
            self::$_items[$type][$model->code] = $model->value;
    }

    public function getStatusMaintenance()
    {
        $model = self::model()->find(array(
            'condition' => 'type=:type',
            'params' => array(':type' => 'StatusMaintenance'),
                ));
        return $model->code;
    }

}