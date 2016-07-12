<?php

/**
 * This is the model class for table "v_c_country_i18n".
 *
 * The followings are the available columns in table 'v_c_country_i18n':
 * @property string $id
 * @property string $country_code
 * @property string $country_name
 * @property string $i18n
 */
class Country_i18n extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Country_i18n the static model class
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
		return 'v_c_country_i18n';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('country_code, i18n', 'length', 'max'=>12),
			array('country_name', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, country_code, country_name, i18n', 'safe', 'on'=>'search'),
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
			'country_code' => 'Country Code',
			'country_name' => 'Country Name',
			'i18n' => 'I18n',
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
		$criteria->compare('country_code',$this->country_code,true);
		$criteria->compare('country_name',$this->country_name,true);
		$criteria->compare('i18n',$this->i18n,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}