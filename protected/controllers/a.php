<?php

// $t1控制Calculate视图的父选项,$t2控制Calculate视图的父选项,
$t1 = (isset ( $_GET ['t1'] )) ? $_GET ['t1'] : '1';
$t2 = (isset ( $_GET ['t2'] )) ? $_GET ['t2'] : '1';

$Alldepartment = $this->getAlldepartmentname ();
$post = $this->get_post ();
$department_id = '';
$post_id = '';
$employee_code = '';
$cn_name = '';
$date = '';

// 变为空值，以免模糊查询出错

if ($_POST) {
	$department_id = (isset ( $_POST ['department_id'] )) ? trim ( $_POST ['department_id'] ) : '';
	$post_id = (isset ( $_POST ['post_id'] )) ? trim ( $_POST ['post_id'] ) : '';
	$employee_code = (isset ( $_POST ['employee_code'] )) ? trim ( $_POST ['employee_code'] ) : '';
	$cn_name = (isset ( $_POST ['cn_name'] )) ? trim ( $_POST ['cn_name'] ) : '';
	$date = (isset ( $_POST ['date'] )) ? trim ( $_POST ['date'] ) : '';
}

if ($department_id == '') {
	
	$search_department_name = '';
} else {
	$name = '';
	$search_department_name = $this->getdepartmentname ( $name, $department_id );
	$search_department_name = substr ( $search_department_name, 1 );
}
$post_cn_name = '';

if ($post_id == '') {
	$post_cn_name = '';
} else {
	$sql = "SELECT  post_cn_name FROM vcos_post where post_id={$post_id}";
	
	$post11 = Yii::app ()->db->createCommand ( $sql )->queryColumn ();
	
	$post_cn_name = $post11 [0];
	// exit ();
}

$search_form = array (
		'department_id' => $department_id,
		'post_id' => $post_id,
		'employee_code' => $employee_code,
		'cn_name' => $cn_name,
		'date' => $date,
		'search_department_name' => $search_department_name,
		'post_cn_name' => $post_cn_name 
);

switch ($t1) {
	case '1' :
		switch ($t2) {
			case '1' :
				
				break;
			case '2' :
				
				if (isset ( $_POST ['ids'] )) {
					$a = count ( $_POST ['ids'] );
					$result = salary_management::model ()->count ();
					if ($a == $result) {
						die ( Helper::show_message ( yii::t ( 'vcos', '不能把所有记录删除！' ) ) );
					}
					$ids = implode ( '\',\'', $_POST ['ids'] );
					// 事务处理
					$transaction = Yii::app ()->db->beginTransaction ();
					try {
						$count = salary_management::model ()->deleteAll ( "id  in('$ids')" ); // post_id 为post表主键
						$transaction->commit ();
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ) );
					} catch ( Exception $e ) {
						$transaction->rollBack ();
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				
				// 单条删除
				if (isset ( $_GET ['id'] )) {
					$id = $_GET ['id']; // 职务表id
					$count = salary_management::model ()->deleteByPk ( $id ); // moder删除方法
					
					if ($count) {
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ) );
					} else {
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				
				$countsql = 'SELECT count(*) as count    FROM vcos_salary_management as a ,vcos_employment_profiles as b,vcos_post as c,
			             vcos_employee  as d ';
				$countsql1 = 'WHERE a.employee_code=b.employee_code
			             AND  b.post_id=c.post_id
			              AND  a.employee_code=d.employee_code ';
				
				$selectsql = "AND a.employee_code LIKE '%{$employee_code}%'
						    AND b.department_id LIKE '%{$department_id}%'
						   AND b.post_id  LIKE '%{$post_id}%'
						   AND d.cn_name LIKE '%{$cn_name}%'
						   AND a.date  LIKE '%{$date}%'
						   ";
				
				$countsql = $countsql . $countsql1 . $selectsql;
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				
				$sql = "SELECT  a.*,  b.department_id,b.post_id,c.post_cn_name ,d.cn_name,(a.base_salary+a.skill_allowance) as moneycount  FROM vcos_salary_management as a ,
                         vcos_employment_profiles as b,vcos_post as c,vcos_employee  as d
                          WHERE a.employee_code=b.employee_code
                              AND   b.post_id=c.post_id
                          AND   a.employee_code=d.employee_code

                                 
                                  ";
				
				$sortsql = "ORDER BY  a.date asc ";
				
				$sql = $sql . $selectsql . $sortsql . "LIMIT {$criteria->offset}, $pager->pageSize";
				
				$salary_management = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				
				foreach ( $salary_management as $key => $row ) {
					$name = '';
					// newdepartmentname是部门名称的全路径
					$salary_management [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
				}
				
				// var_dump($salary_management);
				
				break;
			case '3' :
				
				$countsql = 'SELECT count(*) as count    FROM vcos_salary_management as a ,vcos_employment_profiles as b,vcos_post as c,
		                    vcos_employee  as d ';
				$countsql1 = 'WHERE a.employee_code=b.employee_code
		                        AND   b.post_id=c.post_id
		                      AND   a.employee_code=d.employee_code ';
				
				$selectsql = "AND a.employee_code LIKE '%{$employee_code}%'
				              	AND b.department_id LIKE '%{$department_id}%'
				           	AND b.post_id  LIKE '%{$post_id}%'
					         AND d.cn_name LIKE '%{$cn_name}%'
					         AND a.date  LIKE '%{$date}%'
					        ";
				
				$countsql = $countsql . $countsql1 . $selectsql;
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				
				$sql = "SELECT  a.*,  b.department_id,b.post_id,c.post_cn_name ,d.cn_name,(a.base_salary+a.skill_allowance) as moneycount  FROM vcos_salary_management as a ,
                           vcos_employment_profiles as b,vcos_post as c,vcos_employee  as d
                         WHERE a.employee_code=b.employee_code
                         AND   b.post_id=c.post_id
                         AND   a.employee_code=d.employee_code


                            ";
				
				$sortsql = "ORDER BY  a.date asc ";
				
				$sql = $sql . $selectsql . $sortsql . "LIMIT {$criteria->offset}, $pager->pageSize";
				
				$salary_management = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				
				foreach ( $salary_management as $key => $row ) {
					$name = '';
					// newdepartmentname是部门名称的全路径
					$salary_management [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
				}
				
				// code...
				break;
		}
		break;
	case '2' :
		
		switch ($t2) {
			case '1' :
				
				break;
			case '2' :
				
				if (isset ( $_POST ['ids'] )) {
					
					$a = count ( $_POST ['ids'] );
					
					$result = overtime_management::model ()->count ();
					if ($a == $result) {
						die ( Helper::show_message ( yii::t ( 'vcos', '不能把所有记录删除！' ) ) );
					}
					$ids = implode ( '\',\'', $_POST ['ids'] );
					// 事务处理
					$transaction = Yii::app ()->db->beginTransaction ();
					try {
						$count = overtime_management::model ()->deleteAll ( "id  in('$ids')" ); // post_id 为post表主键
						$transaction->commit ();
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ) );
					} catch ( Exception $e ) {
						$transaction->rollBack ();
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				
				// 单条删除
				if (isset ( $_GET ['id'] )) {
					$id = $_GET ['id']; // 职务表id
					
					$count = overtime_management::model ()->deleteByPk ( $id ); // moder删除方法
					if ($count) {
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ) );
					} else {
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				
				$countsql = 'SELECT count(*) as count
				   FROM vcos_overtime_management as a,
                   vcos_employment_profiles as b,vcos_post as c,vcos_employee  as d,vcos_overtime_salary as e ';
				$countsql1 = 'WHERE a.employee_code=b.employee_code
               AND   b.post_id=c.post_id
             AND   a.employee_code=d.employee_code 
             AND   b.department_id=e.department_id
             AND   b.post_id=e.post_id ';
				
				$selectsql = "AND a.employee_code LIKE '%{$employee_code}%'
					AND b.department_id LIKE '%{$department_id}%'
					AND b.post_id  LIKE '%{$post_id}%'
					AND d.cn_name LIKE '%{$cn_name}%'
					AND a.date  LIKE '%{$date}%'
					";
				
				$countsql = $countsql . $countsql1 . $selectsql;
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				
				$sql = "SELECT  a.*,  b.department_id,b.post_id,c.post_cn_name ,d.cn_name ,e.day_salary ,e.night_salary,(a.day_times*e.day_salary+a.night_times*e.night_salary) as jiabanheji 
                FROM vcos_overtime_management as a,
                vcos_employment_profiles as b,vcos_post as c,vcos_employee  as d,vcos_overtime_salary as e
                  WHERE a.employee_code=b.employee_code
                AND   b.post_id=c.post_id
                AND   a.employee_code=d.employee_code 
                AND   b.department_id=e.department_id
                  AND   b.post_id=e.post_id ";
				
				$sortsql = " ORDER BY  a.date asc ";
				
				$sql = $sql . $selectsql . $sortsql . "LIMIT {$criteria->offset}, $pager->pageSize";
				// LIMIT {$criteria->offset}, $pager->pageSize";
				
				$overtime_management = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				
				foreach ( $overtime_management as $key => $row ) {
					$name = '';
					// newdepartmentname是部门名称的全路径
					$overtime_management [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
				}
				
				break;
			case '3' :
				
				$countsql = 'SELECT count(*) as count
				   FROM vcos_overtime_management as a,
                   vcos_employment_profiles as b,vcos_post as c,vcos_employee  as d,vcos_overtime_salary as e ';
				$countsql1 = 'WHERE a.employee_code=b.employee_code
               AND   b.post_id=c.post_id
             AND   a.employee_code=d.employee_code 
             AND   b.department_id=e.department_id
             AND   b.post_id=e.post_id ';
				
				$selectsql = "AND a.employee_code LIKE '%{$employee_code}%'
					AND b.department_id LIKE '%{$department_id}%'
					AND b.post_id  LIKE '%{$post_id}%'
					AND d.cn_name LIKE '%{$cn_name}%'
					AND a.date  LIKE '%{$date}%'
					";
				
				$countsql = $countsql . $countsql1 . $selectsql;
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				
				$sql = "SELECT  a.*,  b.department_id,b.post_id,c.post_cn_name ,d.cn_name ,e.day_salary ,e.night_salary,(a.day_times*e.day_salary+a.night_times*e.night_salary) as jiabanheji 
                FROM vcos_overtime_management as a,
                vcos_employment_profiles as b,vcos_post as c,vcos_employee  as d,vcos_overtime_salary as e
                  WHERE a.employee_code=b.employee_code
                AND   b.post_id=c.post_id
                AND   a.employee_code=d.employee_code 
                AND   b.department_id=e.department_id
                  AND   b.post_id=e.post_id ";
				
				$sortsql = " ORDER BY  a.date asc ";
				
				$sql = $sql . $selectsql . $sortsql . "LIMIT {$criteria->offset}, $pager->pageSize";
				// LIMIT {$criteria->offset}, $pager->pageSize";
				
				$overtime_management = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				
				foreach ( $overtime_management as $key => $row ) {
					$name = '';
					// newdepartmentname是部门名称的全路径
					$overtime_management [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
				}
				// var_dump($overtime_management);
				
				break;
			default :
				// code...
				break;
		}
		
		break;
	case '3' :
		switch ($t2) {
			case '1' :
				
				break;
			case '2' :
				
				if (isset ( $_POST ['ids'] )) {
					$a = count ( $_POST ['ids'] );
					$result = fund_management::model ()->count ();
					if ($a == $result) {
						die ( Helper::show_message ( yii::t ( 'vcos', '不能把所有记录删除！' ) ) );
					}
					$ids = implode ( '\',\'', $_POST ['ids'] );
					// 事务处理
					$transaction = Yii::app ()->db->beginTransaction ();
					try {
						$count = fund_management::model ()->deleteAll ( "id  in('$ids')" ); // post_id 为post表主键
						$transaction->commit ();
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ) );
					} catch ( Exception $e ) {
						$transaction->rollBack ();
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				
				// 单条删除
				if (isset ( $_GET ['id'] )) {
					$id = $_GET ['id']; // 职务表id
					$count = fund_management::model ()->deleteByPk ( $id ); // moder删除方法
					
					if ($count) {
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ) );
					} else {
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				
				$countsql = 'SELECT count(*) as count
				    FROM  vcos_fund_management as a,
				    vcos_employment_profiles as b,vcos_post as c,
				    vcos_employee as d ';
				
				$countsql1 = 'WHERE a.employee_code=b.employee_code
								AND     b.post_id=c.post_id
								AND    a.employee_code=d.employee_code ';
				
				$selectsql = "AND a.employee_code LIKE '%{$employee_code}%'
						    AND b.department_id LIKE '%{$department_id}%'
						   AND b.post_id  LIKE '%{$post_id}%'
						   AND d.cn_name LIKE '%{$cn_name}%'
						   AND a.date  LIKE '%{$date}%'
						   ";
				
				$countsql = $countsql . $countsql1 . $selectsql;
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				
				$sql = " SELECT a.*,b.post_id,b.department_id,c.post_cn_name ,d.cn_name  FROM  vcos_fund_management as a,
							vcos_employment_profiles as b,vcos_post as c,vcos_employee as d
								WHERE a.employee_code=b.employee_code
								AND     b.post_id=c.post_id
								AND    a.employee_code=d.employee_code ";
				
				$sortsql = "ORDER BY  a.date  ASC ";
				
				$sql = $sql . $selectsql . $sortsql . "LIMIT {$criteria->offset}, $pager->pageSize";
				
				$fund_management = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				
				foreach ( $fund_management as $key => $row ) {
					$name = '';
					// newdepartmentname是部门名称的全路径
					$fund_management [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
				}
				
				// var_dump($fund_management );
				
				break;
			case '3' :
				
				$countsql = 'SELECT count(*) as count    FROM vcos_salary_management as a ,vcos_employment_profiles as b,vcos_post as c,
		                    vcos_employee  as d ';
				$countsql1 = 'WHERE a.employee_code=b.employee_code
		                        AND   b.post_id=c.post_id
		                      AND   a.employee_code=d.employee_code ';
				
				$selectsql = "AND a.employee_code LIKE '%{$employee_code}%'
				              	AND b.department_id LIKE '%{$department_id}%'
				           	AND b.post_id  LIKE '%{$post_id}%'
					         AND d.cn_name LIKE '%{$cn_name}%'
					         AND a.date  LIKE '%{$date}%'
					        ";
				
				$countsql = $countsql . $countsql1 . $selectsql;
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				
				$sql = "SELECT  a.*,  b.department_id,b.post_id,c.post_cn_name ,d.cn_name,(a.base_salary+a.skill_allowance) as moneycount  FROM vcos_salary_management as a ,
                           vcos_employment_profiles as b,vcos_post as c,vcos_employee  as d
                         WHERE a.employee_code=b.employee_code
                         AND   b.post_id=c.post_id
                         AND   a.employee_code=d.employee_code


                            ";
				
				$sortsql = "ORDER BY  a.date asc ";
				
				$sql = $sql . $selectsql . $sortsql . "LIMIT {$criteria->offset}, $pager->pageSize";
				
				$salary_management = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				
				foreach ( $salary_management as $key => $row ) {
					$name = '';
					// newdepartmentname是部门名称的全路径
					$salary_management [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
				}
				
				// code...
				break;
		}
		
		break;
	case '4' :
		
		switch ($t2) {
			case '1' :
				
				break;
			case '2' :
				
				if (isset ( $_POST ['ids'] )) {
					$a = count ( $_POST ['ids'] );
					$result = performance_management::model ()->count ();
					if ($a == $result) {
						die ( Helper::show_message ( yii::t ( 'vcos', '不能把所有记录删除！' ) ) );
					}
					$ids = implode ( '\',\'', $_POST ['ids'] );
					// 事务处理
					$transaction = Yii::app ()->db->beginTransaction ();
					try {
						$count = performance_management::model ()->deleteAll ( "id  in('$ids')" ); // post_id 为post表主键
						$transaction->commit ();
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ) );
					} catch ( Exception $e ) {
						$transaction->rollBack ();
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				
				// 单条删除
				if (isset ( $_GET ['id'] )) {
					$id = $_GET ['id']; // 职务表id
					$count = performance_management::model ()->deleteByPk ( $id ); // moder删除方法
					
					if ($count) {
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ) );
					} else {
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				
				$countsql = 'SELECT count(*) as count
				       FROM vcos_performance_management as a,vcos_employment_profiles as b,vcos_post as c,vcos_leave_charge as d,vcos_employee as f ';
				
				$countsql1 = 'WHERE a.employee_code=b.employee_code
                             AND   b.post_id=c.post_id
                             AND   b.department_id=d.department_id
                             AND   b.post_id=d.post_id
                             AND   a.employee_code=f.employee_code ';
				
				$selectsql = "AND a.employee_code LIKE '%{$employee_code}%'
						    AND b.department_id LIKE '%{$department_id}%'
						   AND b.post_id  LIKE '%{$post_id}%'
						   AND f.cn_name LIKE '%{$cn_name}%'
						   AND a.date  LIKE '%{$date}%'
						   ";
				
				$countsql = $countsql . $countsql1 . $selectsql;
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				
				$sql = " SELECT  a.*,b.department_id,b.post_id,c.post_cn_name,d.sick_charge,d.compassionate_charge,f.cn_name ,
                               (a.sick_times*d.sick_charge) as sick_kouqian  ,(a.compassionate_times*d.sick_charge) as shijiakouqian,
                         (a.sick_times*d.sick_charge+a.compassionate_times*d.sick_charge ) as cont
                        FROM vcos_performance_management as a,vcos_employment_profiles as b,vcos_post as c,vcos_leave_charge as d,vcos_employee as f WHERE a.employee_code=b.employee_code
                        AND   b.post_id=c.post_id
                        AND   b.department_id=d.department_id
                        AND   b.post_id=d.post_id
                        AND   a.employee_code=f.employee_code
                                  ";
				
				$sortsql = "ORDER BY  a.date  ASC ";
				
				$sql = $sql . $selectsql . $sortsql . "LIMIT {$criteria->offset}, $pager->pageSize";
				
				$performance_management = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				
				foreach ( $performance_management as $key => $row ) {
					$name = '';
					// newdepartmentname是部门名称的全路径
					$performance_management [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
				}
				
				// var_dump($performance_management);
				
				break;
			case '3' :
				
				$countsql = 'SELECT count(*) as count
				       FROM vcos_performance_management as a,vcos_employment_profiles as b,vcos_post as c,vcos_leave_charge as d,vcos_employee as f ';
				
				$countsql1 = 'WHERE a.employee_code=b.employee_code
                             AND   b.post_id=c.post_id
                             AND   b.department_id=d.department_id
                             AND   b.post_id=d.post_id
                             AND   a.employee_code=f.employee_code ';
				
				$selectsql = "AND a.employee_code LIKE '%{$employee_code}%'
						    AND b.department_id LIKE '%{$department_id}%'
						   AND b.post_id  LIKE '%{$post_id}%'
						   AND f.cn_name LIKE '%{$cn_name}%'
						   AND a.date  LIKE '%{$date}%'
						   ";
				
				$countsql = $countsql . $countsql1 . $selectsql;
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				
				$sql = " SELECT  a.*,b.department_id,b.post_id,c.post_cn_name,d.sick_charge,d.compassionate_charge,f.cn_name ,
                               (a.sick_times*d.sick_charge) as sick_kouqian  ,(a.compassionate_times*d.sick_charge) as shijiakouqian,
                         (a.sick_times*d.sick_charge+a.compassionate_times*d.sick_charge ) as cont
                        FROM vcos_performance_management as a,vcos_employment_profiles as b,vcos_post as c,vcos_leave_charge as d,vcos_employee as f WHERE a.employee_code=b.employee_code
                        AND   b.post_id=c.post_id
                        AND   b.department_id=d.department_id
                        AND   b.post_id=d.post_id
                        AND   a.employee_code=f.employee_code
                                  ";
				
				$sortsql = "ORDER BY  a.date  ASC ";
				
				$sql = $sql . $selectsql . $sortsql . "LIMIT {$criteria->offset}, $pager->pageSize";
				
				$performance_management = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				
				foreach ( $performance_management as $key => $row ) {
					$name = '';
					// newdepartmentname是部门名称的全路径
					$performance_management [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
				}
				
				// var_dump($performance_management);
				
				// code...
				break;
		}
		break;
	case '5' :
		
		switch ($t2) {
			case '1' :
				
				break;
			case '2' :
				
				if (isset ( $_POST ['ids'] )) {
					$a = count ( $_POST ['ids'] );
					$result = tax_management::model ()->count ();
					if ($a == $result) {
						die ( Helper::show_message ( yii::t ( 'vcos', '不能把所有记录删除！' ) ) );
					}
					$ids = implode ( '\',\'', $_POST ['ids'] );
					// 事务处理
					$transaction = Yii::app ()->db->beginTransaction ();
					try {
						$count = tax_management::model ()->deleteAll ( "id  in('$ids')" ); // post_id 为post表主键
						$transaction->commit ();
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ) );
					} catch ( Exception $e ) {
						$transaction->rollBack ();
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				
				// 单条删除
				if (isset ( $_GET ['id'] )) {
					$id = $_GET ['id']; // 职务表id
					$count = tax_management::model ()->deleteByPk ( $id ); // moder删除方法
					
					if ($count) {
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ) );
					} else {
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				
				$countsql = 'SELECT count(*) as count
				       FROM vcos_tax_management as a,
                        vcos_employment_profiles as b,vcos_post as c,
                        vcos_employee as d ';
				
				$countsql1 = ' WHERE a.employee_code=b.employee_code
                         AND   b.post_id=c.post_id
                         AND   a.employee_code=d.employee_code ';
				
				$selectsql = " AND a.employee_code LIKE '%{$employee_code}%'
						    AND b.department_id LIKE '%{$department_id}%'
						   AND b.post_id  LIKE '%{$post_id}%'
						   AND d.cn_name LIKE '%{$cn_name}%'
						   AND a.date  LIKE '%{$date}%'
						   ";
				
				$countsql = $countsql . $countsql1 . $selectsql;
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				
				$sql = " SELECT  a.*,b.department_id,b.post_id,c.post_cn_name,d.cn_name
                                  FROM 
                              vcos_tax_management as a,
                              vcos_employment_profiles as b,
                              vcos_post as c,
                              vcos_employee as d
                              WHERE a.employee_code=b.employee_code
                              AND   b.post_id=c.post_id
                              AND   a.employee_code=d.employee_code
                                  ";
				
				$sortsql = "ORDER BY  a.date  ASC ";
				
				$sql = $sql . $selectsql . $sortsql . "LIMIT {$criteria->offset}, $pager->pageSize";
				
				$tax_management = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				
				foreach ( $tax_management as $key => $row ) {
					$name = '';
					// newdepartmentname是部门名称的全路径
					$tax_management [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
				}
				
				// var_dump($tax_management);
				
				break;
			case '3' :
				
				$countsql = 'SELECT count(*) as count
				            FROM vcos_tax_management as a,
                         vcos_employment_profiles as b,vcos_post as c,
                         vcos_employee as d ';
				
				$countsql1 = ' WHERE a.employee_code=b.employee_code
                         AND   b.post_id=c.post_id
                         AND   a.employee_code=d.employee_code ';
				
				$selectsql = " AND a.employee_code LIKE '%{$employee_code}%'
						    AND b.department_id LIKE '%{$department_id}%'
						   AND b.post_id  LIKE '%{$post_id}%'
						   AND d.cn_name LIKE '%{$cn_name}%'
						   AND a.date  LIKE '%{$date}%'
						   ";
				
				$countsql = $countsql . $countsql1 . $selectsql;
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				
				$sql = " SELECT  a.*,b.department_id,b.post_id,c.post_cn_name,d.cn_name
                                  FROM 
                              vcos_tax_management as a,
                              vcos_employment_profiles as b,
                              vcos_post as c,
                              vcos_employee as d
                              WHERE a.employee_code=b.employee_code
                              AND   b.post_id=c.post_id
                              AND   a.employee_code=d.employee_code
                                  ";
				
				$sortsql = "ORDER BY  a.date  ASC ";
				
				$sql = $sql . $selectsql . $sortsql . "LIMIT {$criteria->offset}, $pager->pageSize";
				
				$tax_management = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				
				foreach ( $tax_management as $key => $row ) {
					$name = '';
					// newdepartmentname是部门名称的全路径
					$tax_management [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
				}
				
				// var_dump($tax_management);
				
				// code...
				break;
		}
		
		break;
	case '6' :
		switch ($t2) {
			case '1' :
				
				break;
			case '2' :
				
				if (isset ( $_POST ['ids'] )) {
					$a = count ( $_POST ['ids'] );
					$result = allowance_management::model ()->count ();
					if ($a == $result) {
						die ( Helper::show_message ( yii::t ( 'vcos', '不能把所有记录删除！' ) ) );
					}
					$ids = implode ( '\',\'', $_POST ['ids'] );
					// 事务处理
					$transaction = Yii::app ()->db->beginTransaction ();
					try {
						$count = allowance_management::model ()->deleteAll ( "id  in('$ids')" ); // post_id 为post表主键
						$transaction->commit ();
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ) );
					} catch ( Exception $e ) {
						$transaction->rollBack ();
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				
				// 单条删除
				if (isset ( $_GET ['id'] )) {
					$id = $_GET ['id']; // 职务表id
					$count = allowance_management::model ()->deleteByPk ( $id ); // moder删除方法
					
					if ($count) {
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ) );
					} else {
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				
				$countsql = 'SELECT count(*) as count
				       FROM vcos_allowance_management as a,
                        vcos_employment_profiles as b,
                       vcos_post as c,
                        vcos_employee as d ';
				
				$countsql1 = 'WHERE a.employee_code=b.employee_code
                           AND   b.post_id=c.post_id
                            AND   a.employee_code=d.employee_code ';
				$selectsql = " AND a.employee_code LIKE '%{$employee_code}%'
						    AND b.department_id LIKE '%{$department_id}%'
						   AND b.post_id  LIKE '%{$post_id}%'
						   AND d.cn_name LIKE '%{$cn_name}%'
						   AND a.date  LIKE '%{$date}%'
						   ";
				
				$countsql = $countsql . $countsql1 . $selectsql;
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				
				$sql = " SELECT  a.*,b.department_id,b.post_id,c.post_cn_name,d.cn_name   FROM  vcos_allowance_management as a,
                           vcos_employment_profiles as b,vcos_post as c,
                           vcos_employee as d   WHERE a.employee_code=b.employee_code
                               AND   b.post_id=c.post_id
                              AND   a.employee_code=d.employee_code
                                  ";
				
				$sortsql = "ORDER BY  a.date  ASC ";
				
				$sql = $sql . $selectsql . $sortsql . "LIMIT {$criteria->offset}, $pager->pageSize";
				
				$vcos_allowance_management = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				
				foreach ( $vcos_allowance_management as $key => $row ) {
					$name = '';
					// newdepartmentname是部门名称的全路径
					$vcos_allowance_management [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
				}
				
				// var_dump($vcos_allowance_management);
				
				break;
			case '3' :
				
				$countsql = 'SELECT count(*) as count
				       FROM vcos_allowance_management as a,
                        vcos_employment_profiles as b,
                       vcos_post as c,
                        vcos_employee as d ';
				
				$countsql1 = 'WHERE a.employee_code=b.employee_code
                           AND   b.post_id=c.post_id
                            AND   a.employee_code=d.employee_code ';
				$selectsql = " AND a.employee_code LIKE '%{$employee_code}%'
						    AND b.department_id LIKE '%{$department_id}%'
						   AND b.post_id  LIKE '%{$post_id}%'
						   AND d.cn_name LIKE '%{$cn_name}%'
						   AND a.date  LIKE '%{$date}%'
						   ";
				
				$countsql = $countsql . $countsql1 . $selectsql;
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				
				$sql = " SELECT  a.*,b.department_id,b.post_id,c.post_cn_name,d.cn_name   FROM  vcos_allowance_management as a,
                           vcos_employment_profiles as b,vcos_post as c,
                           vcos_employee as d   WHERE a.employee_code=b.employee_code
                               AND   b.post_id=c.post_id
                              AND   a.employee_code=d.employee_code
                                  ";
				
				$sortsql = "ORDER BY  a.date  ASC ";
				
				$sql = $sql . $selectsql . $sortsql . "LIMIT {$criteria->offset}, $pager->pageSize";
				
				$vcos_allowance_management = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				
				foreach ( $vcos_allowance_management as $key => $row ) {
					$name = '';
					// newdepartmentname是部门名称的全路径
					$vcos_allowance_management [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
				}
				
				// var_dump($vcos_allowance_management);
				
				// code...
				break;
		}
		
		break;
	case '7' :
		
		switch ($t2) {
			case '1' :
				
				break;
			case '2' :
				
				if (isset ( $_POST ['ids'] )) {
					$a = count ( $_POST ['ids'] );
					$result = otherallowance_management::model ()->count ();
					if ($a == $result) {
						die ( Helper::show_message ( yii::t ( 'vcos', '不能把所有记录删除！' ) ) );
					}
					$ids = implode ( '\',\'', $_POST ['ids'] );
					// 事务处理
					$transaction = Yii::app ()->db->beginTransaction ();
					try {
						$count = otherallowance_management::model ()->deleteAll ( "id  in('$ids')" ); // post_id 为post表主键
						$transaction->commit ();
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ) );
					} catch ( Exception $e ) {
						$transaction->rollBack ();
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				
				// 单条删除
				if (isset ( $_GET ['id'] )) {
					$id = $_GET ['id']; // 职务表id
					$count = otherallowance_management::model ()->deleteByPk ( $id ); // moder删除方法
					
					if ($count) {
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ) );
					} else {
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				
				$countsql = 'SELECT count(*) as count
				      FROM vcos_otherallowance_management as a,
                       vcos_employment_profiles as b,
                       vcos_post as c,
                       vcos_employee as d ';
				
				$countsql1 = 'WHERE a.employee_code=b.employee_code    AND   b.post_id=c.post_id
                         AND   a.employee_code=d.employee_code ';
				$selectsql = " AND a.employee_code LIKE '%{$employee_code}%'
						    AND b.department_id LIKE '%{$department_id}%'
						   AND b.post_id  LIKE '%{$post_id}%'
						   AND d.cn_name LIKE '%{$cn_name}%'
						   AND a.date  LIKE '%{$date}%'
						   ";
				
				$countsql = $countsql . $countsql1 . $selectsql;
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				
				$sql = "  SELECT  a.*,b.department_id,b.post_id,c.post_cn_name,d.cn_name
                         FROM vcos_otherallowance_management as a,
                         vcos_employment_profiles as b,
                          vcos_post as c,
                          vcos_employee as d
                         WHERE a.employee_code=b.employee_code
                         AND   b.post_id=c.post_id
                         AND   a.employee_code=d.employee_code
                          ";
				
				$sortsql = "ORDER BY  a.date  ASC ";
				
				$sql = $sql . $selectsql . $sortsql . "LIMIT {$criteria->offset}, $pager->pageSize";
				
				$otherallowance_management = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				
				foreach ( $otherallowance_management as $key => $row ) {
					$name = '';
					// newdepartmentname是部门名称的全路径
					$otherallowance_management [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
				}
				
				// var_dump($otherallowance_management);
				
				break;
			case '3' :
				
				$countsql = 'SELECT count(*) as count
				      FROM vcos_otherallowance_management as a,
                       vcos_employment_profiles as b,
                       vcos_post as c,
                       vcos_employee as d ';
				
				$countsql1 = 'WHERE a.employee_code=b.employee_code    AND   b.post_id=c.post_id
                         AND   a.employee_code=d.employee_code ';
				$selectsql = " AND a.employee_code LIKE '%{$employee_code}%'
						    AND b.department_id LIKE '%{$department_id}%'
						   AND b.post_id  LIKE '%{$post_id}%'
						   AND d.cn_name LIKE '%{$cn_name}%'
						   AND a.date  LIKE '%{$date}%'
						   ";
				
				$countsql = $countsql . $countsql1 . $selectsql;
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				
				$sql = "  SELECT  a.*,b.department_id,b.post_id,c.post_cn_name,d.cn_name
                         FROM vcos_otherallowance_management as a,
                         vcos_employment_profiles as b,
                          vcos_post as c,
                          vcos_employee as d
                         WHERE a.employee_code=b.employee_code
                         AND   b.post_id=c.post_id
                         AND   a.employee_code=d.employee_code
                          ";
				
				$sortsql = "ORDER BY  a.date  ASC ";
				
				$sql = $sql . $selectsql . $sortsql . "LIMIT {$criteria->offset}, $pager->pageSize";
				
				$otherallowance_management = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				
				foreach ( $otherallowance_management as $key => $row ) {
					$name = '';
					// newdepartmentname是部门名称的全路径
					$otherallowance_management [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
				}
				
				// var_dump($otherallowance_management);
				
				// code...
				break;
		}
		break;
	default :
		
		break;
}

if (! (isset ( $salary_management )))
	$salary_management = array ();

if (! (isset ( $performance_management )))
	$performance_management = array ();

if (! (isset ( $pager )))
	$pager = null;
if (! (isset ( $overtime_management )))
	$overtime_management = array ();

if (! (isset ( $tax_management )))
	$tax_management = array ();

if (! (isset ( $vcos_allowance_management )))
	$vcos_allowance_management = array ();

if (! (isset ( $otherallowance_management )))
	$otherallowance_management = array ();

if (! (isset ( $fund_management )))
	$fund_management = array ();

$this->render ( 'salary_calculate', array (
		'pages' => $pager,
		'post' => $post,
		'Alldepartment' => $Alldepartment,
		't1' => $t1,
		't2' => $t2,
		'search_form' => $search_form,
		'salary_management' => $salary_management,
		'overtime_management' => $overtime_management,
		'performance_management' => $performance_management,
		'tax_management' => $tax_management,
		'vcos_allowance_management' => $vcos_allowance_management,
		'otherallowance_management' => $otherallowance_management,
		'fund_management' => $fund_management 
) );
// $this->render ( 'salary_calculate' );

?>