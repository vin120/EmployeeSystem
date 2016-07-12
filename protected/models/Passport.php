<?php

/**
 * This is the model class for table "v_m_passport".
 *
 * The followings are the available columns in table 'v_m_passport':
 * @property string $p_id
 * @property string $passport_number
 * @property string $type
 * @property string $date_issue
 * @property string $date_expire
 * @property string $place_issue
 * @property string $Authority
 * @property string $full_name
 * @property string $last_name
 * @property string $first_name
 * @property string $gender
 * @property string $birthday
 * @property string $birth_place
 * @property string $country_code
 * @property string $MRZ1
 * @property string $MRZ2
 */
class Passport extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Passport the static model class
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
		return 'v_m_passport';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('passport_number, type', 'length', 'max'=>20),
			array('place_issue, Authority, full_name, last_name, first_name', 'length', 'max'=>100),
			array('gender', 'length', 'max'=>1),
			array('birth_place', 'length', 'max'=>250),
			array('country_code', 'length', 'max'=>16),
			array('MRZ1, MRZ2', 'length', 'max'=>50),
			array('date_issue, date_expire, birthday', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('p_id, passport_number, type, date_issue, date_expire, place_issue, Authority, full_name, last_name, first_name, gender, birthday, birth_place, country_code, MRZ1, MRZ2', 'safe', 'on'=>'search'),
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
			'p_id' => 'P',
			'passport_number' => 'Passport Number',
			'type' => 'Type',
			'date_issue' => 'Date Issue',
			'date_expire' => 'Date Expire',
			'place_issue' => 'Place Issue',
			'Authority' => 'Authority',
			'full_name' => 'Full Name',
			'last_name' => 'Last Name',
			'first_name' => 'First Name',
			'gender' => 'Gender',
			'birthday' => 'Birthday',
			'birth_place' => 'Birth Place',
			'country_code' => 'Country Code',
			'MRZ1' => 'Mrz1',
			'MRZ2' => 'Mrz2',
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

		$criteria->compare('p_id',$this->p_id,true);
		$criteria->compare('passport_number',$this->passport_number,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('date_issue',$this->date_issue,true);
		$criteria->compare('date_expire',$this->date_expire,true);
		$criteria->compare('place_issue',$this->place_issue,true);
		$criteria->compare('Authority',$this->Authority,true);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('birth_place',$this->birth_place,true);
		$criteria->compare('country_code',$this->country_code,true);
		$criteria->compare('MRZ1',$this->MRZ1,true);
		$criteria->compare('MRZ2',$this->MRZ2,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}