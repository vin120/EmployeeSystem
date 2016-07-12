<?php
class EmailController extends Controller {
	public function actionSend() {
		$message = 'Hello , It is a test mail!';
		
		Yii::app ()->mailer->Host = 'smtp.163.com';
		Yii::app ()->mailer->SMTPAuth = true;
		Yii::app ()->mailer->IsSMTP ();
		
		Yii::app ()->mailer->Username = 'XXX@163.com';
		Yii::app ()->mailer->Password = 'XXX';
		Yii::app ()->mailer->Subject = 'This is a test mail!';
		
		Yii::app ()->mailer->From = 'XXX@163.com';
		Yii::app ()->mailer->FromName = 'cc';
		
		Yii::app ()->mailer->AddAddress ( 'XXX@qq.com' );
		Yii::app ()->mailer->AddReplyTo ( 'XXX@163.com' );
		
		Yii::app ()->mailer->SMTPDebug = true;
		Yii::app ()->mailer->CharSet = 'UTF-8';
		
		Yii::app ()->mailer->Body = $message;
		Yii::app ()->mailer->Send ();
	}
}