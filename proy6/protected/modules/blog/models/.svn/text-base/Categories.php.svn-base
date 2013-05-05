<?php

/**
 * This is the model class for table "{{categories}}".
 *
 * The followings are the available columns in table '{{categories}}':
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property integer $parent
 *
 * The followings are the available model relations:
 * @property PostCategoryRelation[] $postCategoryRelations
 */
class Categories extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Categories the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{categories}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('parent', 'numerical', 'integerOnly' => true),
            array('name, permalink, category_img', 'length', 'max' => 255),
            array('description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, permalink, parent, category_img', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'postCategoryRelations' => array(self::HAS_MANY, 'Postcategoryrelation', 'category_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'category_img' => 'Category thumbnail',
            'permalink' => 'Permalink',
            'parent' => 'Parent',
        );
    }

    public function getThumbnail($width = 640, $height = 480, $name_attribute = 'thumbnail') {

        $thumbnail = '';
        if (!empty($this->$name_attribute))
            $thumbnail = '<img width="' . $width . '" height="' . $height . '" src="' . Yii::app()->request->hostInfo . $this->$name_attribute . '" />';
        return $thumbnail;
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('category_img', $this->category_img, true);
        $criteria->compare('permalink', $this->permalink, true);
        $criteria->compare('parent', $this->parent);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}