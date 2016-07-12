<?php

/**
 * This is the model class for table "vcos_certificate_management".
 *
 * The followings are the available columns in table 'vcos_certificate_management':
 * @property string $id
 * @property string $employee_code
 * @property string $certificate_code
 * @property string $certificate_number
 * @property string $certificate_name
 * @property string $training_institutions
 * @property string $issue_organization
 * @property string $issue_official
 * @property string $date_of_issue
 * @property string $date_of_start
 * @property string $date_of_end
 * @property string $date_of_audit
 * @property integer $audit_status
 * @property string $remark
 */
class certificate_management extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return certificate_management the static model class
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
		return 'vcos_certificate_management';
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
			array('employee_code, certificate_code', 'length', 'max'=>32),
			array('certificate_number', 'length', 'max'=>30),
			array('certificate_name, training_institutions, issue_organization', 'length', 'max'=>80),
			array('issue_official', 'length', 'max'=>50),
			array('remark', 'length', 'max'=>255),
			array('date_of_issue, date_of_start, date_of_end, date_of_audit', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_code, certificate_code, certificate_number, certificate_name, training_institutions, issue_organization, issue_official, date_of_issue, date_of_start, date_of_end, date_of_audit, audit_status, remark', 'safe', 'on'=>'search'),
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
			'certificate_code' => 'Certificate Code',
			'certificate_number' => 'Certificate Number',
			'certificate_name' => 'Certificate Name',
			'training_institutions' => 'Training Institutions',
			'issue_organization' => 'Issue Organization',
			'issue_official' => 'Issue Official',
			'date_of_issue' => 'Date Of Issue',
			'date_of_start' => 'Date Of Start',
			'date_of_end' => 'Date Of End',
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
		$criteria->compare('certificate_code',$this->certificate_code,true);
		$criteria->compare('certificate_number',$this->certificate_number,true);
		$criteria->compare('certificate_name',$this->certificate_name,true);
		$criteria->compare('training_institutions',$this->training_institutions,true);
		$criteria->compare('issue_organization',$this->issue_organization,true);
		$criteria->compare('issue_official',$this->issue_official,true);
		$criteria->compare('date_of_issue',$this->date_of_issue,true);
		$criteria->compare('date_of_start',$this->date_of_start,true);
		$criteria->compare('date_of_end',$this->date_of_end,true);
		$criteria->compare('date_of_audit',$this->date_of_audit,true);
		$criteria->compare('audit_status',$this->audit_status);
		$criteria->compare('remark',$this->remark,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}