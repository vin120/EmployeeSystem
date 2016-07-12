<?php

/**
 * This is the model class for table "vcos_train".
 *
 * The followings are the available columns in table 'vcos_train':
 * @property string $train_id
 * @property string $train_code
 * @property string $train_name
 * @property string $remark
 */
class train extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return train the static model class
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
		return 'vcos_train';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('train_code', 'length', 'max'=>32),
			array('train_name', 'length', 'max'=>50),
			array('remark', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('train_id, train_code, train_name, remark', 'safe', 'on'=>'search'),
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
			'train_id' => 'Train',
			'train_code' => 'Train Code',
			'train_name' => 'Train Name',
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

		$criteria->compare('train_id',$this->train_id,true);
		$criteria->compare('train_code',$this->train_code,true);
		$criteria->compare('train_name',$this->train_name,true);
		$criteria->compare('remark',$this->remark,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}