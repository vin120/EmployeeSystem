<?php

/**
 * This is the model class for table "vcos_department".
 *
 * The followings are the available columns in table 'vcos_department':
 * @property string $department_id
 * @property string $depatment_code
 * @property string $department_name
 * @property string $parent_depatment_code
 * @property string $remark
 */
class department extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return department the static model class
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
		return 'vcos_department';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('depatment_code, parent_depatment_code', 'length', 'max'=>32),
			array('department_name', 'length', 'max'=>50),
			array('remark', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('department_id, depatment_code, department_name, parent_depatment_code, remark', 'safe', 'on'=>'search'),
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
			'department_id' => 'Department',
			'depatment_code' => 'Depatment Code',
			'department_name' => 'Department Name',
			'parent_depatment_code' => 'Parent Depatment Code',
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

		$criteria->compare('department_id',$this->department_id,true);
		$criteria->compare('depatment_code',$this->depatment_code,true);
		$criteria->compare('department_name',$this->department_name,true);
		$criteria->compare('parent_depatment_code',$this->parent_depatment_code,true);
		$criteria->compare('remark',$this->remark,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function selectAll(){
		$db = Yii::app()->m_db;
		$info="select * from vcos_department";
		$info = $db->createCommand($info)->queryAll();
		return $info;
	}
}