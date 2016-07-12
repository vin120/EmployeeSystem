<?php

/**
 * This is the model class for table "vcos_base_salary".
 *
 * The followings are the available columns in table 'vcos_base_salary':
 * @property string $id
 * @property string $depatment_code
 * @property string $post_code
 * @property integer $month_salary
 * @property integer $day_salary
 */
class base_salary extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return base_salary the static model class
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
		return 'vcos_base_salary';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('month_salary, day_salary', 'numerical', 'integerOnly'=>true),
			array('depatment_code, post_code', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, depatment_code, post_code, month_salary, day_salary', 'safe', 'on'=>'search'),
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
			'month_salary' => 'Month Salary',
			'day_salary' => 'Day Salary',
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
		$criteria->compare('month_salary',$this->month_salary);
		$criteria->compare('day_salary',$this->day_salary);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}