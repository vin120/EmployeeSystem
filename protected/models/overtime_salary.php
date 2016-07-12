<?php

/**
 * This is the model class for table "vcos_overtime_salary".
 *
 * The followings are the available columns in table 'vcos_overtime_salary':
 * @property string $id
 * @property string $depatment_code
 * @property string $post_code
 * @property string $date_of_start
 * @property string $date_of_end
 * @property integer $day_salary
 * @property integer $night_salary
 */
class overtime_salary extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return overtime_salary the static model class
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
		return 'vcos_overtime_salary';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('day_salary, night_salary', 'numerical', 'integerOnly'=>true),
			array('depatment_code, post_code', 'length', 'max'=>32),
			array('date_of_start, date_of_end', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, depatment_code, post_code, date_of_start, date_of_end, day_salary, night_salary', 'safe', 'on'=>'search'),
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
			'date_of_start' => 'Date Of Start',
			'date_of_end' => 'Date Of End',
			'day_salary' => 'Day Salary',
			'night_salary' => 'Night Salary',
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
		$criteria->compare('date_of_start',$this->date_of_start,true);
		$criteria->compare('date_of_end',$this->date_of_end,true);
		$criteria->compare('day_salary',$this->day_salary);
		$criteria->compare('night_salary',$this->night_salary);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}