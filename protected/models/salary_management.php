<?php

/**
 * This is the model class for table "vcos_salary_management".
 *
 * The followings are the available columns in table 'vcos_salary_management':
 * @property string $id
 * @property string $employee_code
 * @property integer $base_salary
 * @property string $remark_base_salary
 * @property integer $skill_allowance
 * @property string $remark_skill_allowance
 * @property string $date
 */
class salary_management extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return salary_management the static model class
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
		return 'vcos_salary_management';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('base_salary, skill_allowance', 'numerical', 'integerOnly'=>true),
			array('employee_code', 'length', 'max'=>32),
			array('remark_base_salary, remark_skill_allowance', 'length', 'max'=>255),
			array('date', 'length', 'max'=>18),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_code, base_salary, remark_base_salary, skill_allowance, remark_skill_allowance, date', 'safe', 'on'=>'search'),
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
			'base_salary' => 'Base Salary',
			'remark_base_salary' => 'Remark Base Salary',
			'skill_allowance' => 'Skill Allowance',
			'remark_skill_allowance' => 'Remark Skill Allowance',
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
		$criteria->compare('base_salary',$this->base_salary);
		$criteria->compare('remark_base_salary',$this->remark_base_salary,true);
		$criteria->compare('skill_allowance',$this->skill_allowance);
		$criteria->compare('remark_skill_allowance',$this->remark_skill_allowance,true);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}