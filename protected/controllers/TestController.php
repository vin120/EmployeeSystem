<?php
header ( "Content-Type:text/html;   charset=utf-8" );
class TestController extends Controller {
	public function actionTest() {
		$this->render ( "test" );
	}
	public function actionUpload() {
		$dir = isset ( $_REQUEST ['dir'] ) ? $_REQUEST ['dir'] : '';
		$image = CUploadedFile::getInstanceByName ( 'file' );
		$dir = Yii::getPathOfAlias ( 'webroot' ) . '/images/' . $dir . '/';
		// 上传目录
		if (! is_dir ( $dir )) {
			mkdir ( $dir );
			// 目录不存在则创建
		}
		$name = $dir . $image->name;
		// 文件名绝对路径
		$test = explode ( '.', $name );
		$test = isset ( $test [1] ) ? $test [1] : '';
		if ($test == 'jpg' || $test == 'jepg' || $test == 'png') {
			$status = $image->saveAs ( $name, true );
		} else {
			Helper::show_message ( yii::t ( 'vcos', '请输入正确的图片格式。。。' ) );
			exit ();
		}
		// 保存文件
		if ($status) {
			$name = explode ( 'images', $name );
			$name = '/images' . $name [1];
			
			echo $name;
		} else {
			echo 'fail';
		}
	}
	public function actionmytest() {
		$model->attributes = $_POST ['AdMemberinfo'];
		$model->adImg = CUploadedFile::getInstance ( $model, 'adImg' );
		
		if ($model->save ())
			$model->adImg->saveAs ( Yii::app ()->basePath . '/../images/shop/' . $model->adImg );
		$this->redirect ( array (
				'view',
				'id' => $model->id 
		) );
	}
}