<?php

/**
 * This is the model class for table "vcos_schedule_detail".
 *
 * The followings are the available columns in table 'vcos_schedule_detail':
 * @property string $id
 * @property string $schedule_code
 * @property string $schedule_detail_code
 * @property string $name
 * @property string $start_time
 * @property string $end_time
 */
class schedule_detail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return schedule_detail the static model class
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
		return 'vcos_schedule_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('schedule_code, schedule_detail_code', 'length', 'max'=>32),
			array('name', 'length', 'max'=>50),
			array('start_time, end_time', 'length', 'max'=>18),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, schedule_code, schedule_detail_code, name, start_time, end_time', 'safe', 'on'=>'search'),
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
			'schedule_code' => 'Schedule Code',
			'schedule_detail_code' => 'Schedule Detail Code',
			'name' => 'Name',
			'start_time' => 'Start Time',
			'end_time' => 'End Time',
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
		$criteria->compare('schedule_code',$this->schedule_code,true);
		$criteria->compare('schedule_detail_code',$this->schedule_detail_code,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('start_time',$this->start_time,true);
		$criteria->compare('end_time',$this->end_time,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}