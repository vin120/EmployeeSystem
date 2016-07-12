<?php

/**
 * This is the model class for table "vcos_allowance_management".
 *
 * The followings are the available columns in table 'vcos_allowance_management':
 * @property string $id
 * @property string $employee_code
 * @property integer $allowance_amount
 * @property string $remark
 * @property string $date
 */
class allowance_management extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return allowance_management the static model class
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
		return 'vcos_allowance_management';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('allowance_amount', 'numerical', 'integerOnly'=>true),
			array('employee_code', 'length', 'max'=>32),
			array('remark', 'length', 'max'=>255),
			array('date', 'length', 'max'=>18),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_code, allowance_amount, remark, date', 'safe', 'on'=>'search'),
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
			'employee_code' => 'Employee Code',
			'allowance_amount' => 'Allowance Amount',
			'remark' => 'Remark',
			'date' => 'Date',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('employee_code',$this->employee_code,true);
		$criteria->compare('allowance_amount',$this->allowance_amount);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}