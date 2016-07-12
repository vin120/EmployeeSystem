<?php
header ( "content-type:text/html;charset=utf=8" );
class ExportController extends Controller {
	public function actionBase_salary() {
		$page_size = 50;
		// 数据的取出
		// $model = Yii::app ()->session ['printdata'];
		
		// $dataProvider = $model->search ();
		
		// $dataProvider->setPagination ( false );
		// $data = $dataProvider->getData ();
		
		$countsql = 'SELECT count(*) as count   FROM vcos_base_salary AS a , vcos_post AS b ,vcos_department AS c ';
		$countsql1 = 'WHERE a.post_id=b.post_id AND  a.department_id=c.department_id ';
		$selectsql = "AND a.department_id LIKE '%{$department_id}%' AND b.post_id  LIKE '%{$post_id}%'";
		
		$countsql = $countsql . $countsql1 . $selectsql;
		
		$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
		
		$sql = "SELECT a.* ,b.post_cn_name,c.department_name  FROM vcos_base_salary AS a , vcos_post AS b ,vcos_department AS c  WHERE a.post_id=b.post_id AND  a.department_id=c.department_id ";
		$selectsql = "  AND a.department_id LIKE '%{$department_id}%' AND b.post_id  LIKE '%{$post_id}%'";
		
		$sql = $sql . $selectsql;
		
		$base_salary = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
		
		foreach ( $base_salary as $key => $row ) {
			$name = '';
			// newdepartmentname是部门名称的全路径
			$base_salary [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
		}
		$data = $base_salary;
		var_dump ( $data );
		exit ();
		$export = new export ();
		$export->base_salary_export ();
	}
}