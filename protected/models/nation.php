<?php

/**
 * This is the model class for table "vcos_nation".
 *
 * The followings are the available columns in table 'vcos_nation':
 * @property integer $nation_id
 * @property string $nation_code
 * @property string $nation_name
 */
class nation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return nation the static model class
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
		return 'vcos_nation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nation_code', 'length', 'max'=>2),
			array('nation_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('nation_id, nation_code, nation_name', 'safe', 'on'=>'search'),
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
			'nation_id' => 'Nation',
			'nation_code' => 'Nation Code',
			'nation_name' => 'Nation Name',
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

		$criteria->compare('nation_id',$this->nation_id);
		$criteria->compare('nation_code',$this->nation_code,true);
		$criteria->compare('nation_name',$this->nation_name,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}