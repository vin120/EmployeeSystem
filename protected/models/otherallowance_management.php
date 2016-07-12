<?php

/**
 * This is the model class for table "vcos_otherallowance_management".
 *
 * The followings are the available columns in table 'vcos_otherallowance_management':
 * @property string $id
 * @property string $employee_code
 * @property integer $total_amount
 * @property string $remark
 * @property string $date
 * @property integer $status
 */
class otherallowance_management extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return otherallowance_management the static model class
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
		return 'vcos_otherallowance_management';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('total_amount, status', 'numerical', 'integerOnly'=>true),
			array('employee_code', 'length', 'max'=>32),
			array('remark', 'length', 'max'=>255),
			array('date', 'length', 'max'=>18),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_code, total_amount, remark, date, status', 'safe', 'on'=>'search'),
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
			'total_amount' => 'Total Amount',
			'remark' => 'Remark',
			'date' => 'Date',
			'status' => 'Status',
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
		$criteria->compare('total_amount',$this->total_amount);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}