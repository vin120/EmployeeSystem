<?php

/**
 * This is the model class for table "vcos_qualification_management".
 *
 * The followings are the available columns in table 'vcos_qualification_management':
 * @property string $id
 * @property string $employee_code
 * @property string $date_of_start
 * @property string $date_of_end
 * @property string $remark
 */
class qualification_management extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return qualification_management the static model class
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
		return 'vcos_qualification_management';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_code', 'length', 'max'=>32),
			array('remark', 'length', 'max'=>255),
			array('date_of_start, date_of_end', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_code, date_of_start, date_of_end, remark', 'safe', 'on'=>'search'),
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
			'date_of_start' => 'Date Of Start',
			'date_of_end' => 'Date Of End',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('employee_code',$this->employee_code,true);
		$criteria->compare('date_of_start',$this->date_of_start,true);
		$criteria->compare('date_of_end',$this->date_of_end,true);
		$criteria->compare('remark',$this->remark,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}