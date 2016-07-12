<?php
class Upload extends CFormModel {

	public $file;

	public function rules() {
	return array('adImg', 'file', 'types'=>'jpg, gif, png' , 'maxSize'=>1024 * 1024 * 1,'tooLarge'=>'图片最大不超过1MB，请重新上传!',);
	}
}