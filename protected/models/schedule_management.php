<?php

/**
 * This is the model class for table "vcos_schedule_management".
 *
 * The followings are the available columns in table 'vcos_schedule_management':
 * @property string $id
 * @property string $depatment_code
 * @property string $schedule_detail_code
 * @property string $employee_code
 * @property string $date
 */
class schedule_management extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return schedule_management the static model class
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
		return 'vcos_schedule_management';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('depatment_code, schedule_detail_code, employee_code', 'length', 'max'=>32),
			array('date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, depatment_code, schedule_detail_code, employee_code, date', 'safe', 'on'=>'search'),
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
			'depatment_code' => 'Depatment Code',
			'schedule_detail_code' => 'Schedule Detail Code',
			'employee_code' => 'Employee Code',
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
		$criteria->compare('depatment_code',$this->depatment_code,true);
		$criteria->compare('schedule_detail_code',$this->schedule_detail_code,true);
		$criteria->compare('employee_code',$this->employee_code,true);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}