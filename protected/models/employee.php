<?php

/**
 * This is the model class for table "vcos_employee".
 *
 * The followings are the available columns in table 'vcos_employee':
 * @property string $employee_id
 * @property string $employee_code
 * @property string $employee_card_number
 * @property integer $employee_status
 * @property string $cn_name
 * @property string $first_name
 * @property string $last_name
 * @property string $country_code
 * @property string $nation_code
 * @property integer $political_status
 * @property string $sex
 * @property string $date_of_birth
 * @property string $birth_place
 * @property integer $card_type
 * @property string $resident_id_card
 * @property string $passport_number
 * @property string $other_card_number
 * @property integer $marry_status
 * @property integer $health_status
 * @property string $height
 * @property string $weight
 * @property string $shoe_size
 * @property integer $blood_type
 * @property string $working_life
 * @property string $major
 * @property integer $education
 * @property string $foreign_language
 * @property string $mailing_address
 * @property string $dormitory_num
 * @property string $telephone_num
 * @property string $mobile_num
 * @property string $emergency_contact
 * @property string $emergency_contact_phone
 */
class employee extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return employee the static model class
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
		return 'vcos_employee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_code', 'required'),
			array('employee_status, political_status, card_type, marry_status, health_status, blood_type, education', 'numerical', 'integerOnly'=>true),
			array('employee_code, employee_card_number, resident_id_card, other_card_number', 'length', 'max'=>32),
			array('cn_name, first_name, last_name, emergency_contact', 'length', 'max'=>100),
			array('country_code', 'length', 'max'=>16),
			array('nation_code', 'length', 'max'=>2),
			array('sex', 'length', 'max'=>1),
			array('birth_place, mailing_address', 'length', 'max'=>250),
			array('passport_number, telephone_num, mobile_num, emergency_contact_phone', 'length', 'max'=>20),
			array('height, weight, shoe_size, working_life', 'length', 'max'=>5),
			array('major, foreign_language, dormitory_num', 'length', 'max'=>50),
			array('date_of_birth', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('employee_id, employee_code, employee_card_number, employee_status, cn_name, first_name, last_name, country_code, nation_code, political_status, sex, date_of_birth, birth_place, card_type, resident_id_card, passport_number, other_card_number, marry_status, health_status, height, weight, shoe_size, blood_type, working_life, major, education, foreign_language, mailing_address, dormitory_num, telephone_num, mobile_num, emergency_contact, emergency_contact_phone', 'safe', 'on'=>'search'),
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
			'employee_id' => 'Employee',
			'employee_code' => 'Employee Code',
			'employee_card_number' => 'Employee Card Number',
			'employee_status' => 'Employee Status',
			'cn_name' => 'Cn Name',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'country_code' => 'Country Code',
			'nation_code' => 'Nation Code',
			'political_status' => 'Political Status',
			'sex' => 'Sex',
			'date_of_birth' => 'Date Of Birth',
			'birth_place' => 'Birth Place',
			'card_type' => 'Card Type',
			'resident_id_card' => 'Resident Id Card',
			'passport_number' => 'Passport Number',
			'other_card_number' => 'Other Card Number',
			'marry_status' => 'Marry Status',
			'health_status' => 'Health Status',
			'height' => 'Height',
			'weight' => 'Weight',
			'shoe_size' => 'Shoe Size',
			'blood_type' => 'Blood Type',
			'working_life' => 'Working Life',
			'major' => 'Major',
			'education' => 'Education',
			'foreign_language' => 'Foreign Language',
			'mailing_address' => 'Mailing Address',
			'dormitory_num' => 'Dormitory Num',
			'telephone_num' => 'Telephone Num',
			'mobile_num' => 'Mobile Num',
			'emergency_contact' => 'Emergency Contact',
			'emergency_contact_phone' => 'Emergency Contact Phone',
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

		$criteria->compare('employee_id',$this->employee_id,true);
		$criteria->compare('employee_code',$this->employee_code,true);
		$criteria->compare('employee_card_number',$this->employee_card_number,true);
		$criteria->compare('employee_status',$this->employee_status);
		$criteria->compare('cn_name',$this->cn_name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('country_code',$this->country_code,true);
		$criteria->compare('nation_code',$this->nation_code,true);
		$criteria->compare('political_status',$this->political_status);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('birth_place',$this->birth_place,true);
		$criteria->compare('card_type',$this->card_type);
		$criteria->compare('resident_id_card',$this->resident_id_card,true);
		$criteria->compare('passport_number',$this->passport_number,true);
		$criteria->compare('other_card_number',$this->other_card_number,true);
		$criteria->compare('marry_status',$this->marry_status);
		$criteria->compare('health_status',$this->health_status);
		$criteria->compare('height',$this->height,true);
		$criteria->compare('weight',$this->weight,true);
		$criteria->compare('shoe_size',$this->shoe_size,true);
		$criteria->compare('blood_type',$this->blood_type);
		$criteria->compare('working_life',$this->working_life,true);
		$criteria->compare('major',$this->major,true);
		$criteria->compare('education',$this->education);
		$criteria->compare('foreign_language',$this->foreign_language,true);
		$criteria->compare('mailing_address',$this->mailing_address,true);
		$criteria->compare('dormitory_num',$this->dormitory_num,true);
		$criteria->compare('telephone_num',$this->telephone_num,true);
		$criteria->compare('mobile_num',$this->mobile_num,true);
		$criteria->compare('emergency_contact',$this->emergency_contact,true);
		$criteria->compare('emergency_contact_phone',$this->emergency_contact_phone,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}