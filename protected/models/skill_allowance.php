<?php

/**
 * This is the model class for table "vcos_skill_allowance".
 *
 * The followings are the available columns in table 'vcos_skill_allowance':
 * @property string $id
 * @property string $depatment_code
 * @property string $post_code
 * @property string $title_code
 * @property integer $allowance
 */
class skill_allowance extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return skill_allowance the static model class
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
		return 'vcos_skill_allowance';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('allowance', 'numerical', 'integerOnly'=>true),
			array('depatment_code, post_code, title_code', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, depatment_code, post_code, title_code, allowance', 'safe', 'on'=>'search'),
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
			'depatment_code' => 'Depatment Code',
			'post_code' => 'Post Code',
			'title_code' => 'Title Code',
			'allowance' => 'Allowance',
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
		$criteria->compare('depatment_code',$this->depatment_code,true);
		$criteria->compare('post_code',$this->post_code,true);
		$criteria->compare('title_code',$this->title_code,true);
		$criteria->compare('allowance',$this->allowance);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}