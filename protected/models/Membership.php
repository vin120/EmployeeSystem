<?php

/**
 * This is the model class for table "v_membership".
 *
 * The followings are the available columns in table 'v_membership':
 * @property string $m_id
 * @property string $smart_card_number
 * @property string $m_code
 * @property string $m_name
 * @property string $email
 * @property string $mobile_number
 * @property string $fixed_telephone
 * @property string $m_password
 * @property double $balance
 * @property double $max_overdraft_limit
 * @property double $curr_overdraft_limit
 * @property integer $points
 * @property integer $vip_grade
 * @property string $full_name
 * @property string $last_name
 * @property string $first_name
 * @property string $gender
 * @property string $birthday
 * @property string $birth_place
 * @property string $country_code
 * @property string $passport_number
 * @property string $resident_id_card
 * @property string $nation_code
 * @property integer $member_verification
 * @property integer $email_verification
 * @property integer $mobile_verification
 * @property string $create_by
 * @property string $create_time
 * @property string $remark
 * @property string $sign
 */
class Membership extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Membership the static model class
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
		return 'v_membership';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('points, vip_grade, member_verification, email_verification, mobile_verification', 'numerical', 'integerOnly'=>true),
			array('balance, max_overdraft_limit, curr_overdraft_limit', 'numerical'),
			array('smart_card_number, m_name', 'length', 'max'=>50),
			array('m_code, resident_id_card, create_by', 'length', 'max'=>32),
			array('email, m_password, full_name, last_name, first_name', 'length', 'max'=>100),
			array('mobile_number, fixed_telephone, passport_number', 'length', 'max'=>20),
			array('gender', 'length', 'max'=>1),
			array('birth_place', 'length', 'max'=>250),
			array('country_code', 'length', 'max'=>16),
			array('nation_code', 'length', 'max'=>2),
			array('remark', 'length', 'max'=>128),
			array('sign', 'length', 'max'=>64),
			array('birthday, create_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('m_id, smart_card_number, m_code, m_name, email, mobile_number, fixed_telephone, m_password, balance, max_overdraft_limit, curr_overdraft_limit, points, vip_grade, full_name, last_name, first_name, gender, birthday, birth_place, country_code, passport_number, resident_id_card, nation_code, member_verification, email_verification, mobile_verification, create_by, create_time, remark, sign', 'safe', 'on'=>'search'),
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
			'm_id' => 'M',
			'smart_card_number' => 'Smart Card Number',
			'm_code' => 'M Code',
			'm_name' => 'M Name',
			'email' => 'Email',
			'mobile_number' => 'Mobile Number',
			'fixed_telephone' => 'Fixed Telephone',
			'm_password' => 'M Password',
			'balance' => 'Balance',
			'max_overdraft_limit' => 'Max Overdraft Limit',
			'curr_overdraft_limit' => 'Curr Overdraft Limit',
			'points' => 'Points',
			'vip_grade' => 'Vip Grade',
			'full_name' => 'Full Name',
			'last_name' => 'Last Name',
			'first_name' => 'First Name',
			'gender' => 'Gender',
			'birthday' => 'Birthday',
			'birth_place' => 'Birth Place',
			'country_code' => 'Country Code',
			'passport_number' => 'Passport Number',
			'resident_id_card' => 'Resident Id Card',
			'nation_code' => 'Nation Code',
			'member_verification' => 'Member Verification',
			'email_verification' => 'Email Verification',
			'mobile_verification' => 'Mobile Verification',
			'create_by' => 'Create By',
			'create_time' => 'Create Time',
			'remark' => 'Remark',
			'sign' => 'Sign',
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

		$criteria->compare('m_id',$this->m_id,true);
		$criteria->compare('smart_card_number',$this->smart_card_number,true);
		$criteria->compare('m_code',$this->m_code,true);
		$criteria->compare('m_name',$this->m_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('mobile_number',$this->mobile_number,true);
		$criteria->compare('fixed_telephone',$this->fixed_telephone,true);
		$criteria->compare('m_password',$this->m_password,true);
		$criteria->compare('balance',$this->balance);
		$criteria->compare('max_overdraft_limit',$this->max_overdraft_limit);
		$criteria->compare('curr_overdraft_limit',$this->curr_overdraft_limit);
		$criteria->compare('points',$this->points);
		$criteria->compare('vip_grade',$this->vip_grade);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('birth_place',$this->birth_place,true);
		$criteria->compare('country_code',$this->country_code,true);
		$criteria->compare('passport_number',$this->passport_number,true);
		$criteria->compare('resident_id_card',$this->resident_id_card,true);
		$criteria->compare('nation_code',$this->nation_code,true);
		$criteria->compare('member_verification',$this->member_verification);
		$criteria->compare('email_verification',$this->email_verification);
		$criteria->compare('mobile_verification',$this->mobile_verification);
		$criteria->compare('create_by',$this->create_by,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('sign',$this->sign,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}