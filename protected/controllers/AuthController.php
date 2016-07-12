<?php
class AuthController extends Controller {
	public function actionPassword_edit() {
		$admin = VcosAdmin::model ();
		if ($_POST) {
			$admin_id = Yii::app ()->user->id;
			$admin_password = md5 ( $_POST ['old_password'] );
			$sql = "SELECT * FROM vcos_admin WHERE admin_id = {$admin_id} AND admin_password = '{$admin_password}'";
			$result = Yii::app ()->m_db->createCommand ( $sql )->queryRow ();
			if ($result) {
				$admin->admin_id = $admin_id;
				$admin->admin_password = md5 ( $_POST ['new_password'] );
				$count = $admin->update ( 'admin_id', 'admin_password' );
				if ($count > 0) {
					Helper::show_message ( yii::t ( 'vcos', '修改成功。' ), Yii::app ()->createUrl ( "site/index" ) );
				} else {
					Helper::show_message ( yii::t ( 'vcos', '修改失败。' ) );
				}
			} else {
				Helper::show_message ( yii::t ( 'vcos', '原密码不正确。' ) );
			}
		}
		$this->render ( 'password_edit' );
	}
	public function actionCheckpasswordajax() {
		$password = md5 ( $_POST ['password'] );
		$sql = "SELECT * FROM vcos_admin WHERE admin_password = '{$password}' AND admin_id = '{$_POST['id']}'";
		$name = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
		if ($name) {
			echo "false";
		} else {
			echo "true";
		}
	}
}