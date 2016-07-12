<?php

/**
 * This is the model class for table "vcos_employment_profiles".
 *
 * The followings are the available columns in table 'vcos_employment_profiles':
 * @property string $id
 * @property string $employee_code
 * @property string $ship_code
 * @property string $department_code
 * @property string $post_code
 * @property integer $employee_type
 * @property integer $employee_source
 * @property integer $employee_job_status
 * @property string $bank_name
 * @property string $bank_card_number
 * @property string $date_of_entry
 * @property string $date_of_positive
 * @property string $date_of_departure
 */
class employment_profiles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return employment_profiles the static model class
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
		return 'vcos_employment_profiles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_type, employee_source, employee_job_status', 'numerical', 'integerOnly'=>true),
			array('employee_code, ship_code, department_code, post_code', 'length', 'max'=>32),
			array('bank_name', 'length', 'max'=>50),
			array('bank_card_number', 'length', 'max'=>30),
			array('date_of_entry, date_of_positive, date_of_departure', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_code, ship_code, department_code, post_code, employee_type, employee_source, employee_job_status, bank_name, bank_card_number, date_of_entry, date_of_positive, date_of_departure', 'safe', 'on'=>'search'),
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
			'ship_code' => 'Ship Code',
			'department_code' => 'Department Code',
			'post_code' => 'Post Code',
			'employee_type' => 'Employee Type',
			'employee_source' => 'Employee Source',
			'employee_job_status' => 'Employee Job Status',
			'bank_name' => 'Bank Name',
			'bank_card_number' => 'Bank Card Number',
			'date_of_entry' => 'Date Of Entry',
			'date_of_positive' => 'Date Of Positive',
			'date_of_departure' => 'Date Of Departure',
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
		$criteria->compare('ship_code',$this->ship_code,true);
		$criteria->compare('department_code',$this->department_code,true);
		$criteria->compare('post_code',$this->post_code,true);
		$criteria->compare('employee_type',$this->employee_type);
		$criteria->compare('employee_source',$this->employee_source);
		$criteria->compare('employee_job_status',$this->employee_job_status);
		$criteria->compare('bank_name',$this->bank_name,true);
		$criteria->compare('bank_card_number',$this->bank_card_number,true);
		$criteria->compare('date_of_entry',$this->date_of_entry,true);
		$criteria->compare('date_of_positive',$this->date_of_positive,true);
		$criteria->compare('date_of_departure',$this->date_of_departure,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
}