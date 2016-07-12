<?php

/**
 * This is the model class for table "vcos_train_management".
 *
 * The followings are the available columns in table 'vcos_train_management':
 * @property string $id
 * @property string $employee_code
 * @property string $train_code
 * @property string $date_of_train
 * @property string $train_organization
 * @property string $train_content
 * @property string $train_effect
 */
class train_management extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return train_management the static model class
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
		return 'vcos_train_management';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_code, train_code', 'length', 'max'=>32),
			array('train_organization', 'length', 'max'=>200),
			array('train_content, train_effect', 'length', 'max'=>255),
			array('date_of_train', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_code, train_code, date_of_train, train_organization, train_content, train_effect', 'safe', 'on'=>'search'),
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
			'train_code' => 'Train Code',
			'date_of_train' => 'Date Of Train',
			'train_organization' => 'Train Organization',
			'train_content' => 'Train Content',
			'train_effect' => 'Train Effect',
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
		$criteria->compare('train_code',$this->train_code,true);
		$criteria->compare('date_of_train',$this->date_of_train,true);
		$criteria->compare('train_organization',$this->train_organization,true);
		$criteria->compare('train_content',$this->train_content,true);
		$criteria->compare('train_effect',$this->train_effect,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}