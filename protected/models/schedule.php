<?php

/**
 * This is the model class for table "vcos_schedule".
 *
 * The followings are the available columns in table 'vcos_schedule':
 * @property string $schedule_id
 * @property string $schedule_code
 * @property string $schedule_name
 * @property string $depatment_code
 * @property integer $schedule_status
 */
class schedule extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return schedule the static model class
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
		return 'vcos_schedule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('schedule_status', 'numerical', 'integerOnly'=>true),
			array('schedule_code, depatment_code', 'length', 'max'=>32),
			array('schedule_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('schedule_id, schedule_code, schedule_name, depatment_code, schedule_status', 'safe', 'on'=>'search'),
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
			'schedule_id' => 'Schedule',
			'schedule_code' => 'Schedule Code',
			'schedule_name' => 'Schedule Name',
			'depatment_code' => 'Depatment Code',
			'schedule_status' => 'Schedule Status',
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

		$criteria->compare('schedule_id',$this->schedule_id,true);
		$criteria->compare('schedule_code',$this->schedule_code,true);
		$criteria->compare('schedule_name',$this->schedule_name,true);
		$criteria->compare('depatment_code',$this->depatment_code,true);
		$criteria->compare('schedule_status',$this->schedule_status);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}