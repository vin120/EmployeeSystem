<?php

/**
 * This is the model class for table "vcos_certificate".
 *
 * The followings are the available columns in table 'vcos_certificate':
 * @property string $certificate_id
 * @property string $certificate_code
 * @property string $certificate_type
 * @property string $remark
 */
class certificate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return certificate the static model class
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
		return 'vcos_certificate';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('certificate_code', 'length', 'max'=>32),
			array('certificate_type', 'length', 'max'=>50),
			array('remark', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('certificate_id, certificate_code, certificate_type, remark', 'safe', 'on'=>'search'),
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
			'certificate_id' => 'Certificate',
			'certificate_code' => 'Certificate Code',
			'certificate_type' => 'Certificate Type',
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

		$criteria->compare('certificate_id',$this->certificate_id,true);
		$criteria->compare('certificate_code',$this->certificate_code,true);
		$criteria->compare('certificate_type',$this->certificate_type,true);
		$criteria->compare('remark',$this->remark,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}