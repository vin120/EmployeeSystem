<?php

/**
 * This is the model class for table "vcos_title".
 *
 * The followings are the available columns in table 'vcos_title':
 * @property string $title_id
 * @property string $title_code
 * @property string $title_name
 * @property integer $title_level
 * @property string $remark
 */
class title extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return title the static model class
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
		return 'vcos_title';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title_level', 'numerical', 'integerOnly'=>true),
			array('title_code', 'length', 'max'=>32),
			array('title_name', 'length', 'max'=>50),
			array('remark', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('title_id, title_code, title_name, title_level, remark', 'safe', 'on'=>'search'),
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
			'title_id' => 'Title',
			'title_code' => 'Title Code',
			'title_name' => 'Title Name',
			'title_level' => 'Title Level',
			'remark' => 'Remark',
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

		$criteria->compare('title_id',$this->title_id,true);
		$criteria->compare('title_code',$this->title_code,true);
		$criteria->compare('title_name',$this->title_name,true);
		$criteria->compare('title_level',$this->title_level);
		$criteria->compare('remark',$this->remark,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}