<?php

/**
 * This is the model class for table "vcos_fund_management".
 *
 * The followings are the available columns in table 'vcos_fund_management':
 * @property string $id
 * @property string $employee_code
 * @property string $resident_id_card
 * @property string $social_security_number
 * @property integer $all_total
 * @property integer $person_total
 * @property integer $compony_total
 * @property integer $fund_base
 * @property integer $fund_person
 * @property integer $fund_compony
 * @property integer $security_base
 * @property integer $unemployment
 * @property integer $maternity
 * @property integer $endowment_person
 * @property integer $endowment_compony
 * @property integer $medical_person
 * @property integer $medical_compony
 * @property integer $injury_person
 * @property integer $injury_compony
 * @property string $date
 * @property string $remark
 */
class fund_management extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return fund_management the static model class
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
		return 'vcos_fund_management';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('all_total, person_total, compony_total, fund_base, fund_person, fund_compony, security_base, unemployment, maternity, endowment_person, endowment_compony, medical_person, medical_compony, injury_person, injury_compony', 'numerical', 'integerOnly'=>true),
			array('employee_code, resident_id_card, social_security_number', 'length', 'max'=>32),
			array('date', 'length', 'max'=>18),
			array('remark', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_code, resident_id_card, social_security_number, all_total, person_total, compony_total, fund_base, fund_person, fund_compony, security_base, unemployment, maternity, endowment_person, endowment_compony, medical_person, medical_compony, injury_person, injury_compony, date, remark', 'safe', 'on'=>'search'),
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
			'resident_id_card' => 'Resident Id Card',
			'social_security_number' => 'Social Security Number',
			'all_total' => 'All Total',
			'person_total' => 'Person Total',
			'compony_total' => 'Compony Total',
			'fund_base' => 'Fund Base',
			'fund_person' => 'Fund Person',
			'fund_compony' => 'Fund Compony',
			'security_base' => 'Security Base',
			'unemployment' => 'Unemployment',
			'maternity' => 'Maternity',
			'endowment_person' => 'Endowment Person',
			'endowment_compony' => 'Endowment Compony',
			'medical_person' => 'Medical Person',
			'medical_compony' => 'Medical Compony',
			'injury_person' => 'Injury Person',
			'injury_compony' => 'Injury Compony',
			'date' => 'Date',
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
		$criteria->compare('resident_id_card',$this->resident_id_card,true);
		$criteria->compare('social_security_number',$this->social_security_number,true);
		$criteria->compare('all_total',$this->all_total);
		$criteria->compare('person_total',$this->person_total);
		$criteria->compare('compony_total',$this->compony_total);
		$criteria->compare('fund_base',$this->fund_base);
		$criteria->compare('fund_person',$this->fund_person);
		$criteria->compare('fund_compony',$this->fund_compony);
		$criteria->compare('security_base',$this->security_base);
		$criteria->compare('unemployment',$this->unemployment);
		$criteria->compare('maternity',$this->maternity);
		$criteria->compare('endowment_person',$this->endowment_person);
		$criteria->compare('endowment_compony',$this->endowment_compony);
		$criteria->compare('medical_person',$this->medical_person);
		$criteria->compare('medical_compony',$this->medical_compony);
		$criteria->compare('injury_person',$this->injury_person);
		$criteria->compare('injury_compony',$this->injury_compony);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('remark',$this->remark,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}