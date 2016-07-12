<?php

/**
 * This is the model class for table "vcos_ship".
 *
 * The followings are the available columns in table 'vcos_ship':
 * @property string $ship_id
 * @property string $ship_code
 * @property string $ship_name
 */
class ship extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ship the static model class
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
		return 'vcos_ship';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ship_code', 'length', 'max'=>32),
			array('ship_name', 'length', 'max'=>80),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ship_id, ship_code, ship_name', 'safe', 'on'=>'search'),
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
			'ship_id' => 'Ship',
			'ship_code' => 'Ship Code',
			'ship_name' => 'Ship Name',
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

		$criteria->compare('ship_id',$this->ship_id,true);
		$criteria->compare('ship_code',$this->ship_code,true);
		$criteria->compare('ship_name',$this->ship_name,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}