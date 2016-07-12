<?php

/**
 * This is the model class for table "vcos_welfare".
 *
 * The followings are the available columns in table 'vcos_welfare':
 * @property string $welfare_id
 * @property string $welfare_code
 * @property string $welfare_name
 * @property integer $welfare_status
 * @property string $remark
 */
class welfare extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return welfare the static model class
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
		return 'vcos_welfare';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('welfare_status', 'numerical', 'integerOnly'=>true),
			array('welfare_code', 'length', 'max'=>32),
			array('welfare_name', 'length', 'max'=>50),
			array('remark', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('welfare_id, welfare_code, welfare_name, welfare_status, remark', 'safe', 'on'=>'search'),
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
			'welfare_id' => 'Welfare',
			'welfare_code' => 'Welfare Code',
			'welfare_name' => 'Welfare Name',
			'welfare_status' => 'Welfare Status',
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

		$criteria->compare('welfare_id',$this->welfare_id,true);
		$criteria->compare('welfare_code',$this->welfare_code,true);
		$criteria->compare('welfare_name',$this->welfare_name,true);
		$criteria->compare('welfare_status',$this->welfare_status);
		$criteria->compare('remark',$this->remark,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}