<?php

/**
 * This is the model class for table "vcos_month_assessment".
 *
 * The followings are the available columns in table 'vcos_month_assessment':
 * @property string $id
 * @property string $employee_code
 * @property string $month_of_assessment
 * @property integer $score
 * @property integer $bonus
 * @property string $remark
 * @property integer $status
 */
class month_assessment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return month_assessment the static model class
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
		return 'vcos_month_assessment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('score, bonus, status', 'numerical', 'integerOnly'=>true),
			array('employee_code', 'length', 'max'=>32),
			array('month_of_assessment', 'length', 'max'=>20),
			array('remark', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_code, month_of_assessment, score, bonus, remark, status', 'safe', 'on'=>'search'),
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
			'month_of_assessment' => 'Month Of Assessment',
			'score' => 'Score',
			'bonus' => 'Bonus',
			'remark' => 'Remark',
			'status' => 'Status',
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
		$criteria->compare('month_of_assessment',$this->month_of_assessment,true);
		$criteria->compare('score',$this->score);
		$criteria->compare('bonus',$this->bonus);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}