<?php

/**
 * This is the model class for table "vcos_admin_role".
 *
 * The followings are the available columns in table 'vcos_admin_role':
 * @property string $role_id
 * @property string $role_name
 * @property string $role_desc
 * @property string $permission_menu
 * @property integer $role_state
 */
class admin_role extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return admin_role the static model class
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
		return 'vcos_admin_role';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('role_name, role_desc, permission_menu', 'required'),
			array('role_state', 'numerical', 'integerOnly'=>true),
			array('role_name, role_desc', 'length', 'max'=>255),
			array('permission_menu', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('role_id, role_name, role_desc, permission_menu, role_state', 'safe', 'on'=>'search'),
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
			'role_id' => 'Role',
			'role_name' => 'Role Name',
			'role_desc' => 'Role Desc',
			'permission_menu' => 'Permission Menu',
			'role_state' => 'Role State',
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

		$criteria->compare('role_id',$this->role_id,true);
		$criteria->compare('role_name',$this->role_name,true);
		$criteria->compare('role_desc',$this->role_desc,true);
		$criteria->compare('permission_menu',$this->permission_menu,true);
		$criteria->compare('role_state',$this->role_state);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}