<?php

/**
 * This is the model class for table "vcos_housing_fund".
 *
 * The followings are the available columns in table 'vcos_housing_fund':
 * @property string $id
 * @property string $employee_code
 * @property integer $fund_base
 * @property string $fund_person_percent
 * @property string $fund_compony_percent
 * @property integer $security_base
 * @property string $unemployment
 * @property string $maternity
 * @property string $endowment_person
 * @property string $endowment_compony
 * @property string $medical_person
 * @property string $medical_compony
 * @property string $injury_person
 * @property string $injury_compony
 */
class housing_fund extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return housing_fund the static model class
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
		return 'vcos_housing_fund';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fund_base, security_base', 'numerical', 'integerOnly'=>true),
			array('employee_code', 'length', 'max'=>32),
			array('fund_person_percent, fund_compony_percent, unemployment, maternity, endowment_person, endowment_compony, medical_person, medical_compony, injury_person, injury_compony', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_code, fund_base, fund_person_percent, fund_compony_percent, security_base, unemployment, maternity, endowment_person, endowment_compony, medical_person, medical_compony, injury_person, injury_compony', 'safe', 'on'=>'search'),
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
			'fund_base' => 'Fund Base',
			'fund_person_percent' => 'Fund Person Percent',
			'fund_compony_percent' => 'Fund Compony Percent',
			'security_base' => 'Security Base',
			'unemployment' => 'Unemployment',
			'maternity' => 'Maternity',
			'endowment_person' => 'Endowment Person',
			'endowment_compony' => 'Endowment Compony',
			'medical_person' => 'Medical Person',
			'medical_compony' => 'Medical Compony',
			'injury_person' => 'Injury Person',
			'injury_compony' => 'Injury Compony',
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
		$criteria->compare('fund_base',$this->fund_base);
		$criteria->compare('fund_person_percent',$this->fund_person_percent,true);
		$criteria->compare('fund_compony_percent',$this->fund_compony_percent,true);
		$criteria->compare('security_base',$this->security_base);
		$criteria->compare('unemployment',$this->unemployment,true);
		$criteria->compare('maternity',$this->maternity,true);
		$criteria->compare('endowment_person',$this->endowment_person,true);
		$criteria->compare('endowment_compony',$this->endowment_compony,true);
		$criteria->compare('medical_person',$this->medical_person,true);
		$criteria->compare('medical_compony',$this->medical_compony,true);
		$criteria->compare('injury_person',$this->injury_person,true);
		$criteria->compare('injury_compony',$this->injury_compony,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}