<?php

/**
 * This is the model class for table "vcos_title_management".
 *
 * The followings are the available columns in table 'vcos_title_management':
 * @property string $id
 * @property string $employee_code
 * @property string $title_code
 * @property string $title_number
 * @property string $issue_organization
 * @property string $date_of_issue
 * @property string $date_of_start
 * @property string $date_of_audit
 * @property integer $audit_status
 * @property string $remark
 */
class title_management extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return title_management the static model class
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
		return 'vcos_title_management';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('audit_status', 'numerical', 'integerOnly'=>true),
			array('employee_code, title_code, title_number', 'length', 'max'=>32),
			array('issue_organization', 'length', 'max'=>80),
			array('remark', 'length', 'max'=>255),
			array('date_of_issue, date_of_start, date_of_audit', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_code, title_code, title_number, issue_organization, date_of_issue, date_of_start, date_of_audit, audit_status, remark', 'safe', 'on'=>'search'),
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
			'title_code' => 'Title Code',
			'title_number' => 'Title Number',
			'issue_organization' => 'Issue Organization',
			'date_of_issue' => 'Date Of Issue',
			'date_of_start' => 'Date Of Start',
			'date_of_audit' => 'Date Of Audit',
			'audit_status' => 'Audit Status',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('employee_code',$this->employee_code,true);
		$criteria->compare('title_code',$this->title_code,true);
		$criteria->compare('title_number',$this->title_number,true);
		$criteria->compare('issue_organization',$this->issue_organization,true);
		$criteria->compare('date_of_issue',$this->date_of_issue,true);
		$criteria->compare('date_of_start',$this->date_of_start,true);
		$criteria->compare('date_of_audit',$this->date_of_audit,true);
		$criteria->compare('audit_status',$this->audit_status);
		$criteria->compare('remark',$this->remark,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}