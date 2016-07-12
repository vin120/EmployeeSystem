<?php

/**
 * This is the model class for table "vcos_post".
 *
 * The followings are the available columns in table 'vcos_post':
 * @property string $post_id
 * @property string $post_code
 * @property string $department_code
 * @property string $post_cn_name
 * @property string $post_en_name
 * @property string $remark
 */
class post extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return post the static model class
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
		return 'vcos_post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('post_code, department_code', 'length', 'max'=>32),
			array('post_cn_name, post_en_name', 'length', 'max'=>50),
			array('remark', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('post_id, post_code, department_code, post_cn_name, post_en_name, remark', 'safe', 'on'=>'search'),
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
			'post_id' => 'Post',
			'post_code' => 'Post Code',
			'department_code' => 'Department Code',
			'post_cn_name' => 'Post Cn Name',
			'post_en_name' => 'Post En Name',
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

		$criteria->compare('post_id',$this->post_id,true);
		$criteria->compare('post_code',$this->post_code,true);
		$criteria->compare('department_code',$this->department_code,true);
		$criteria->compare('post_cn_name',$this->post_cn_name,true);
		$criteria->compare('post_en_name',$this->post_en_name,true);
		$criteria->compare('remark',$this->remark,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function selectAll(){
		$db = Yii::app()->m_db;
		$info="select * from vcos_post";
		$info = $db->createCommand($info)->queryAll();
		return $info;
	}
}