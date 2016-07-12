<?php

/**
 * This is the model class for table "vcos_log_management".
 *
 * The followings are the available columns in table 'vcos_log_management':
 * @property string $log_id
 * @property string $employee_code
 * @property string $operation_module
 * @property integer $operation_type
 * @property string $operation_time
 * @property string $operation_content
 */
class log_management extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return log_management the static model class
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
		return 'vcos_log_management';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('operation_type', 'numerical', 'integerOnly'=>true),
			array('employee_code', 'length', 'max'=>32),
			array('operation_module', 'length', 'max'=>50),
			array('operation_content', 'length', 'max'=>255),
			array('operation_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('log_id, employee_code, operation_module, operation_type, operation_time, operation_content', 'safe', 'on'=>'search'),
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
			'log_id' => 'Log',
			'employee_code' => 'Employee Code',
			'operation_module' => 'Operation Module',
			'operation_type' => 'Operation Type',
			'operation_time' => 'Operation Time',
			'operation_content' => 'Operation Content',
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

		$criteria->compare('log_id',$this->log_id,true);
		$criteria->compare('employee_code',$this->employee_code,true);
		$criteria->compare('operation_module',$this->operation_module,true);
		$criteria->compare('operation_type',$this->operation_type);
		$criteria->compare('operation_time',$this->operation_time,true);
		$criteria->compare('operation_content',$this->operation_content,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}