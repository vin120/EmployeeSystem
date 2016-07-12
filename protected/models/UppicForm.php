<?php

class UppicForm extends CActiveRecord
{    public $id;
	public $avatar;
	public $file_name;
	public $file_type;
	public $file_size;
	public $file_content;
	public function rules()
	{
		return array(
	   array('avatar',   
        'file',   
        'allowEmpty'=>true,  
        'types'=>'jpg,gif,png',  
        'maxSize'=>1024 * 1024 * 1,  
        'tooLarge'=>'头像最大不超过1MB，请重新上传!',  
    ),  
		);
	}
	
	public function beforeSave()
	{
		if($file=CUploadedFile::getInstance($this,'avatar'))
		{
			$this->file_name=$file->name;
			$this->file_type=$file->type;
			$this->file_size=$file->size;
			$this->file_content=file_get_contents($file->tempName);
		}
		return parent::beforeSave();
	}
	
}
