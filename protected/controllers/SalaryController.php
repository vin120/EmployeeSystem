<?php
header ( "content-type:text/html;charset=utf8" );
class SalaryController extends Controller {


	/*
	 *数据注入过滤
	 */public function  mytrim()
   {
   	
   	   foreach ($_POST as $key => $value) {
   	   	$_POST[$key]=trim($value);//去空格
   	   	$_POST[$key]=htmlspecialchars($_POST[$key]);//专义html,js代码,防止前端代码注入
   	   	$$_POST[$key]=addslashhes($_POST[$key]);//  过滤大部分的sql注入
   	   	
   	   }
   	   
   	   foreach ($_GET as $key => $value) {
   	
   	    $_GET[$key]=trim($value);//去空格
   	   	$_GET[$key]=htmlspecialchars($_GET[$key]);//专义html,js代码,防止前端代码注入
   	   	$_GET[$key]=addslashes($_GET[$key]);//  过滤大部分的sql注入
   	   
   	   }
   	
   }



   /*
	 *数据注入过滤
	 */public function  jsontrim($data)
     {
   	
   	   foreach ($_POST as $key => $value) {
   	   	$_POST[$key]=trim($value);//去空格
   	   	$_POST[$key]=htmlspecialchars($_POST[$key]);//专义html,js代码,防止前端代码注入
   	   	$_POST[$key]=addslashes($_POST[$key]);//  过滤大部分的sql注入
   	   	
   	   }
   	   
   	   foreach ($_GET as $key => $value) {
   	
   	    $_GET[$key]=trim($value);//去空格
   	   	$_GET[$key]=htmlspecialchars($_GET[$key]);//专义html,js代码,防止前端代码注入
   	   	$_GET[$key]=addslashes($_GET[$key]);//  过滤大部分的sql注入
   	   
   	   }
   	
   }
	
	/*
	 * 获取部门名字
	 */
	
	/*
	 * 获取所以职务的id，职务名称，返回一个二维数组
	 */
	public function get_post() {
		$sql = "SELECT * FROM vcos_post";
		$post = Yii::app ()->db->createCommand ( $sql )->queryAll ();
		return $post;
	}

	public function get_gonzidate() {
		$sql = "SELECT date FROM vcos_salary_pay";
		$date = Yii::app ()->db->createCommand ( $sql )->queryAll ();
		return $date;
	}
	public function getdepartmentname(&$department_name = NULL, $department_id = 0) {
		$sql = "SELECT  * from  vcos_department  WHERE department_id=$department_id";
		$post = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
		foreach ( $post as $row ) {
			
			$department_name = $row ['department_name'] . $department_name;
			$department_name = '-' . $department_name;
			$this->getdepartmentname ( $department_name, $row ['parent_department_id'] );
		}
		
		return $department_name;
	}
	
	/**
	 *
	 * @param string $department_name        	
	 * @param number $parent_department_id        	
	 * @param array $data        	
	 * @return string 获取所有部门名称
	 */
	public function getAlldepartmentname($department_name = "", $parent_department_id = 0, &$data = array ()) {
		$sql = "SELECT  * from  vcos_department  WHERE parent_department_id=$parent_department_id";
		$post = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
		foreach ( $post as $row ) {
			
			$row ['department_name'] = $department_name . $row ['department_name'];
			$data [] = $row;
			$this->getALLdepartmentname ( $row ['department_name'] . '-', $row ['department_id'], $data );
		}
		
		return $data;
	}
	public function actionSalary_Set_base_salary() {
		
		// if($_POST)
		$temp = $_POST ["base_salary"];
		$base_salary_data = json_decode ( $temp );
		$data = array ();
		$flag = '1';
		
		foreach ( $base_salary_data as $key => $row ) {
			
			$base_salary = base_salary::model ()->findByPk ( $row->id );
			$base_salary->id = $row->id;
			$base_salary->month_salary = $row->month_salary;
			$base_salary->day_salary = $row->day_salary;
			$count = $base_salary->save (); // 这句出错
			
			if ($count < 0) {
				$flag = '0';
			}
		}
		$data = array (
				'code' => $flag 
		);
		$request = json_encode ( $data );
		echo $request;
	}
	public function actionSalary_Set() {
		$this->mytrim();
		$table_type = (isset ( $_GET ['table_type'] )) ? $_GET ['table_type'] : '1';
		$department_id = '';
		$post_id = '';
		
		if ($_POST) {
			$department_id = (isset ( $_POST ['department_id'] )) ? trim ( $_POST ['department_id'] ) : '';
			$post_id = (isset ( $_POST ['post_id'] )) ? trim ( $_POST ['post_id'] ) : '';
		}
		
		$sql2 = "SELECT post_cn_name,post_id FROM vcos_post";
		$post = Yii::app ()->m_db->createCommand ( $sql2 )->queryAll (); // 获取所以职务名字
		                                                                 // var_dump ( $post );
		$Alldepartment = $this->getAlldepartmentname ();
		switch ($table_type) {
			case '1' :
				
				$countsql = 'SELECT count(*) as count   FROM vcos_base_salary AS a , vcos_post AS b ,vcos_department AS c ';
				$countsql1 = 'WHERE a.post_id=b.post_id AND  b.department_id=c.department_id ';
				$selectsql = "AND a.department_id LIKE '%{$department_id}%' AND b.post_id  LIKE '%{$post_id}%'";
				
				$countsql = $countsql . $countsql1 . $selectsql;
				
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				
				$sql = "SELECT a.* ,b.post_cn_name,c.department_name  FROM vcos_base_salary AS a , vcos_post AS b ,vcos_department AS c  WHERE a.post_id=b.post_id AND  b.department_id=c.department_id ";
				$selectsql = "  AND a.department_id LIKE '%{$department_id}%' AND b.post_id  LIKE '%{$post_id}%'";
				
				$sql = $sql . $selectsql . "LIMIT {$criteria->offset}, $pager->pageSize";
				// LIMIT {$criteria->offset}, $pager->pageSize";
				/**
				 * $sql = "SELECT a.cn_name, b.* FROM vcos_employee as a ,vcos_log_management as b WHERE a.employee_code=b.employee_code LIMIT {$criteria->offset}, $pager->pageSize";
				 */
				$base_salary = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				
				foreach ( $base_salary as $key => $row ) {
					$name = '';
					// newdepartmentname是部门名称的全路径
					$base_salary [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
				}
				
				break;
			
			case '2' :
				
				if (isset ( $_POST ['id2s'] )) {
					
					$a = count ( $_POST ['id2s'] );
					
					$result = skill_allowance::model ()->count ();
					if ($a == $result) {
						die ( Helper::show_message ( yii::t ( 'vcos', '不能把所有记录删除！' ) ) );
					}
					$ids = implode ( '\',\'', $_POST ['id2s'] );
					// 事务处理
					$transaction = Yii::app ()->db->beginTransaction ();
					try {
						$count = skill_allowance::model ()->deleteAll ( "id  in('$ids')" ); // post_id 为post表主键
						$transaction->commit ();
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ), Yii::app ()->request->urlReferrer );
					} catch ( Exception $e ) {
						$transaction->rollBack ();
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				$sql1 = " FROM vcos_skill_allowance as a,vcos_title as b, vcos_post as c,vcos_department AS d  ";
				$sql2 = "WHERE  a.title_id=b.title_id AND a.post_id=c.post_id AND a.department_id=d.department_id ";
				$selectsql = " AND a.department_id LIKE '%{$department_id}%'  AND a.post_id  LIKE '%{$post_id}%'";
				
				$countsql = "SELECT count(*) as count " . $sql1 . $sql2 . $selectsql;
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				$sql = "SELECT a.*,b.title_name ,c.post_cn_name" . $sql1 . $sql2 . $selectsql . " LIMIT {$criteria->offset}, $pager->pageSize";
			
				// $sql = "SELECT * FROM vcos_title LIMIT {$criteria->offset}, $pager->pageSize";
				$skill_allowance = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				foreach ( $skill_allowance as $key => $row ) {
					$name = '';
					// newdepartmentname是部门名称的全路径
					$skill_allowance [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
				}
				
				break;
			
			case '3' :
				
				//
				if (isset ( $_POST ['id3s'] )) {
					
					$a = count ( $_POST ['id3s'] );
					
					$result = overtime_salary::model ()->count ();
					if ($a == $result) {
						die ( Helper::show_message ( yii::t ( 'vcos', '不能把所有记录删除！' ) ) );
					}
					$ids = implode ( '\',\'', $_POST ['id3s'] );
					// 事务处理
					$transaction = Yii::app ()->db->beginTransaction ();
					try {
						$count = overtime_salary::model ()->deleteAll ( "id  in('$ids')" ); // post_id 为post表主键
						$transaction->commit ();
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ), Yii::app ()->request->urlReferrer );
					} catch ( Exception $e ) {
						$transaction->rollBack ();
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				
				$sql1 = " FROM vcos_overtime_salary as a,vcos_post as b,vcos_department AS c ";
				$sql2 = "WHERE  a.post_id=b.post_id AND a.department_id=c.department_id ";
				$selectsql = " AND a.department_id LIKE '%{$department_id}%' AND b.post_id  LIKE '%{$post_id}%'";
				
				$countsql = "SELECT count(*) as count " . $sql1 . $sql2 . $selectsql;
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				$sql = "SELECT a.*,b.post_cn_name " . $sql1 . $sql2 . $selectsql . " LIMIT {$criteria->offset}, $pager->pageSize";
				
				// var_dump ( $sql );
				// exit ();
				// $sql = "SELECT * FROM vcos_title LIMIT {$criteria->offset}, $pager->pageSize";
				$overtime_salary = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				foreach ( $overtime_salary as $key => $row ) {
					$name = '';
					// newdepartmentname是部门名称的全路径
					$overtime_salary [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
				}
			
			// var_dump ( $overtime_salary );
			case '4' :
				$sql1 = "  FROM vcos_leave_charge as a,vcos_post as b,vcos_department AS c ";
				$sql2 = "WHERE  a.post_id=b.post_id AND a.department_id=c.department_id ";
				$selectsql = " AND a.department_id LIKE '%{$department_id}%'  AND a.post_id  LIKE '%{$post_id}%'";
				
				$countsql = "SELECT count(*) as count " . $sql1 . $sql2 . $selectsql;
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				$sql = "SELECT a.*,b.post_cn_name" . $sql1 . $sql2 . $selectsql . " LIMIT {$criteria->offset}, $pager->pageSize";
				
				// var_dump ( $sql );
				// exit ();
				// $sql = "SELECT * FROM vcos_title LIMIT {$criteria->offset}, $pager->pageSize";
				$leave_charge = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				foreach ( $leave_charge as $key => $row ) {
					$name = '';
					// newdepartmentname是部门名称的全路径
					$leave_charge [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
				}
				
				// var_dump ( $leave_charge );
				
				break;
			
			case '5' :
				$sql1 = " FROM vcos_housing_fund AS a, vcos_employment_profiles AS b,vcos_post AS c,vcos_employee as d  ";
				$sql2 = "WHERE   a.employee_code=b.employee_code  AND  b.post_id=c.post_id  AND a.employee_code=d.employee_code  ";
				$selectsql = " AND b.department_id  LIKE '%{$department_id}%' AND  c.post_id  LIKE '%{$post_id}%'";
				
				$countsql = "SELECT count(*) as count " . $sql1 . $sql2 . $selectsql;
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				$sql = "SELECT a.*, d.cn_name,b.department_id,c.post_cn_name  " . $sql1 . $sql2 . $selectsql . " LIMIT {$criteria->offset}, $pager->pageSize";
				
				// var_dump ( $sql );
				// exit ();
				// $sql = "SELECT * FROM vcos_title LIMIT {$criteria->offset}, $pager->pageSize";
				
				$housing_fund = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				foreach ( $housing_fund as $key => $row ) {
					$name = '';
					// newdepartmentname是部门名称的全路径
					$housing_fund [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
				}
				
				
				break;
			
			case '6' :
				
				$sql1 = " FROM vcos_traffic_allowance as a ,vcos_post as b WHERE a.post_id=b.post_id  ";
				$selectsql = " AND a.department_id LIKE '%{$department_id}%' AND b.post_id  LIKE '%{$post_id}%'";
				
				$countsql = "SELECT count(*) as count " . $sql1 . $selectsql;
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				$sql = "SELECT a.*,b.post_cn_name   " . $sql1 . $selectsql . " LIMIT {$criteria->offset}, $pager->pageSize";
				
				// var_dump ( $sql );
				// exit ();
				// $sql = "SELECT * FROM vcos_title LIMIT {$criteria->offset}, $pager->pageSize";
				$traffic_allowance = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				foreach ( $traffic_allowance as $key => $row ) {
					$name = '';
					// newdepartmentname是部门名称的全路径
					$traffic_allowance [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
				}
				
				break;
			
			default :
				
				break;
		}
		
		$sql = "SELECT title_id ,title_name FROM vcos_title";
		$title = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
		
		if (! (isset ( $base_salary )))
			$base_salary = array ();
		if (! (isset ( $skill_allowance )))
			$skill_allowance = array ();
		if (! (isset ( $traffic_allowance )))
			$traffic_allowance = array ();
		if (! (isset ( $overtime_salary )))
			$overtime_salary = array ();
		
		if (! (isset ( $leave_charge )))
			$leave_charge = array ();
		if (! (isset ( $housing_fund )))
			$housing_fund = array ();
		
		if (! (isset ( $pager )))
			$pager = null;
		
		
		$this->render ( 'salary_set', array (
				'base_salary' => $base_salary,
				'skill_allowance' => $skill_allowance,
				'traffic_allowance' => $traffic_allowance,
				'overtime_salary' => $overtime_salary,
				'leave_charge' => $leave_charge,
				'housing_fund' => $housing_fund,
				'pages' => $pager,
				'post' => $post,
				'Alldepartment' => $Alldepartment,
				'title' => $title,
				'table_type' => $table_type,
				'department_id_search' => $department_id,
				'post_id_search' => $post_id 
		) );
	}
	public function actionleave_charge_update() {
		
		$temp = $_POST ['skill'];
		$data = json_decode ( $temp );
		// $a = json_encode ( $data );
		$data1 = array ();
		$flag = '1';
		foreach ( $data as $key => $row ) {
			$leave_charge = leave_charge::model ()->findByPk ( $row->id );
			$leave_charge->id = $row->id;
			$leave_charge->sick_charge = $row->sick_charge;
			$leave_charge->compassionate_charge = $row->compassionate_charge;
			$count = $leave_charge->save ();
			if ($count < 0) {
				$flag = '0';
			}
		}
		$data1 = array (
				'code' => $flag 
		);
		$request = json_encode ( $data1 );
		echo $request;
	}
	public function actiontraffic_allowance_update() {
		
		$temp = $_POST ['allowance'];
		$data = json_decode ( $temp );
		$data1 = array ();
		$flag = '1';
		
		foreach ( $data as $key => $row ) {
			$traffic_allowance = traffic_allowance::model ()->findByPk ( $row->id );
			$traffic_allowance->id = $row->id;
			$traffic_allowance->allowance_base = $row->allowance_base;
			
			$count = $traffic_allowance->save ();
			if ($count < 0) {
				$flag = '0';
			}
		}
		$data1 = array (
				'code' => $flag 
		);
		$request = json_encode ( $data1 );
		echo $request;
	}
	public function actionSkill_allowance() {
		// $this->mytrim();
		$temp = $_POST ['skill'];
		$data = json_decode ( $temp );
		$data1 = array ();
		$flag = '1';
		foreach ( $data as $key => $row ) {
			$skill_allowance = skill_allowance::model ()->findByPk ( $row->id );
			$skill_allowance->id = $row->id;
			$skill_allowance->title_id = $row->title_id;
			$skill_allowance->allowance = $row->allowance;
			
			$count = $skill_allowance->save ();
			if ($count < 0) {
				$flag = '0';
			}
		}
		$data1 = array (
				'code' => $flag 
		);
		$request = json_encode ( $data1 );
		echo $request;
	}
	public function actionHousing_fund_update() 

	{

		$this->mytrim();
		$temp = $_POST ['housing_fund'];
		$data = json_decode ( $temp );
		$data1 = array ();
		$flag = '1';
		
		foreach ( $data as $row ) {
			$housing_fund = housing_fund::model ()->findByPk ( $row->id );
			$housing_fund->id = $row->id;
			$housing_fund->title_id = $row->title_id;
			$housing_fund->allowance = $row->allowance;
			
			$count = $housing_fund->save ();
			if ($count < 0) {
				$flag = '0';
			}
		}
		$data1 = array (
				'code' => $flag 
		);
		$request = json_encode ( $data1 );
		echo $request;
	}
	public function actionHousing_fund_edit() {
		
		$temp = $_POST ['housing_fund'];
		$data = json_decode ( $temp );
		$data1 = array ();
		$flag = '1';
		
		foreach ( $data as $row ) {
			$housing_fund = housing_fund::model ()->findByPk ( $row->id );
			$housing_fund->id = $row->id;
			$housing_fund->fund_base = $row->fund_base;
			$housing_fund->fund_person_percent = $row->fund_person_percent;
			$housing_fund->fund_compony_percent = $row->fund_compony_percent;
			$housing_fund->security_base = $row->security_base;
			$housing_fund->unemployment = $row->unemployment;
			$housing_fund->maternity = $row->maternity;
			$housing_fund->endowment_person = $row->endowment_person;
			$housing_fund->endowment_compony = $row->endowment_compony;
			$housing_fund->medical_person = $row->medical_person;
			$housing_fund->medical_compony = $row->medical_compony;
			$housing_fund->injury_person = $row->injury_person;
			$housing_fund->injury_compony = $row->injury_compony;
			
			$count = $housing_fund->save ();
			if ($count < 0) {
				$flag = '0';
			}
		}
		$data1 = array (
				'code' => $flag 
		);
		$request = json_encode ( $data1 );
		echo $request;
	}
	public function actionSkill_allowance_add() {
		
		$department_id = isset ( $_POST ['department_id'] ) ? $_POST ['department_id'] : 'false';
		if ($department_id =='false') {
			echo 'error';
			return;
		}
		
		$sql = "SELECT post_id ,post_cn_name FROM vcos_post WHERE department_id={$department_id} ";
		$data = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
		$data = json_encode ( $data );
		echo $data;
	}
	public function actionSkill_allowance_addinsert() {
		
		$department_id = (isset ( $_POST ['department_id'] )) ? $_POST ['department_id'] : FALSE;
		$post_id = (isset ( $_POST ['post_id'] )) ? $_POST ['post_id'] : FALSE;
		$title_id = (isset ( $_POST ['title_id'] )) ? $_POST ['title_id'] : FALSE;
		$allowance = (isset ( $_POST ['allowance'] )) ? $_POST ['allowance'] : FALSE;
		
		$skill_allowance = new skill_allowance ();
		$skill_allowance->department_id = $department_id;
		$skill_allowance->post_id = $post_id;
		$skill_allowance->title_id = $title_id;
		$skill_allowance->allowance = $allowance;
		
		$count = $skill_allowance->save ();
		if ($count > 0) {
			Helper::show_message ( yii::t ( 'vcos', '添加成功。' ) );
		} else {
			Helper::show_message ( yii::t ( 'vcos', '添加失败。' ) );
		}
	}
	public function actionOvertime_salary_update() {
		
		$temp = $_POST ['overtime_salary'];
		$data = json_decode ( $temp );
		$data1 = array ();
		$flag = '1';
		
		foreach ( $data as $row ) {
			$overtime_salary = overtime_salary::model ()->findByPk ( $row->id );
			$overtime_salary->id = $row->id;
			$overtime_salary->date_of_start = $row->date_of_start;
			$overtime_salary->date_of_end = $row->date_of_end;
			$overtime_salary->day_salary = $row->day_salary;
			$overtime_salary->night_salary = $row->night_salary;
			
			$count = $overtime_salary->save ();
			if ($count < 0) {
				$flag = '0';
			}
		}
		$data1 = array (
				'code' => $flag 
		);
		$request = json_encode ( $data1 );
		echo $request;
	}
	public function actionOvertime_salary_add() {
		$this->mytrim();
		$department_id = (isset ( $_POST ['department_id'] )) ? $_POST ['department_id'] : FALSE;
		$post_id = (isset ( $_POST ['post_id'] )) ? $_POST ['post_id'] : FALSE;
		$date_of_start = (isset ( $_POST ['date_of_start'] )) ? $_POST ['date_of_start'] : FALSE;
		$date_of_end = (isset ( $_POST ['date_of_end'] )) ? $_POST ['date_of_end'] : FALSE;
		$day_salary = (isset ( $_POST ['day_salary'] )) ? $_POST ['day_salary'] : FALSE;
		$night_salary = (isset ( $_POST ['night_salary'] )) ? $_POST ['night_salary'] : FALSE;
		
		$overtime_salary = new overtime_salary ();
		
		$overtime_salary->department_id = $department_id;
		$overtime_salary->post_id = $post_id;
		$overtime_salary->date_of_start = $date_of_start;
		$overtime_salary->date_of_end = $date_of_end;
		$overtime_salary->day_salary = $day_salary;
		$overtime_salary->night_salary = $night_salary;
		
		$count = $overtime_salary->save ();
		if ($count > 0) {
			Helper::show_message ( yii::t ( 'vcos', '添加成功。' ) );
		} else {
			Helper::show_message ( yii::t ( 'vcos', '添加失败。' ) );
		}
	}
	public function actionBase_salary_export() {
		$this->mytrim();
		$department_id = isset ( $_POST ['department_id'] ) ? $_POST ['department_id'] : '';
		$post_id = isset ( $_POST ['post_id'] ) ? $_POST ['post_id'] : '';
		$export = new export ();
		$export->base_salary_export ( $department_id, $post_id );
	}
	public function actionSalary_Grant() {
		$this->mytrim();
		$table_type = (isset ( $_GET ['table_type'] )) ? $_GET ['table_type'] : '1';
		
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
			// var_dump ( $post [0] );
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
		
		switch ($table_type) {
			case '1' :
				if (isset ( $_POST ['gongzi'] )) {
					
					$data = $_POST ['gongzi'];
					$year = $data ['year'];
					$month = $data ['month'];
					$yuangongbianhao = trim ( $data ['employee_code'] );
					$datetemp = $year . "-" . $month;
				
					
					if ($yuangongbianhao == '') 

					{
						
						$count = Yii::app ()->db->createCommand ()->delete ( 'vcos_salary_pay', "date='{$datetemp}'" );
					} else {
						$sql = "DELETE FROM vcos_salary_pay WHERE date='{$datetemp}' AND employee_code='{$yuangongbianhao}'";
						
						$conditon = "date='{$datetemp}' AND employee_code='{$yuangongbianhao}'";
						
						$count = Yii::app ()->db->createCommand ()->delete ( 'vcos_salary_pay', $conditon );
					}
					
					if ($count) {
						Helper::show_message ( yii::t ( 'vcos', '生成成功。' ) );
					} else {
						Helper::show_message ( yii::t ( 'vcos', '生成失败。' ) );
					}
				}
				
				break;
			
			case '2' :
				
				$selectsql = "SELECT e.remark_base_salary,e.remark_skill_allowance,g.remark as jiabanremark,i.remark as fulihejiremark,k.remark as wuxianyijin_remark,j.remark as tax_remark,
h.remark as jixiaoremark,m.remark AS feiyongbutie_remark,
 a.*, b.department_id,b.post_id ,b.bank_card_number,b.bank_name,c.cn_name,d.post_cn_name,e.base_salary,
e.skill_allowance,f.day_salary,f.night_salary,g.night_times, g.day_times,h.month_performance,i.total_amount as fuliheji,
j.tax_amount,
k.person_total,
m.allowance_amount  ";
				
				$whereSql = " FROM vcos_salary_pay as a, vcos_employment_profiles as b ,vcos_employee as c,
 vcos_post as d ,
 vcos_salary_management AS e
,vcos_overtime_salary AS f,
 vcos_overtime_management AS g,
vcos_performance_management as h,
 vcos_otherallowance_management as i,
 vcos_tax_management as j,
vcos_fund_management AS k,
vcos_allowance_management AS m
				WHERE a.employee_code=b.employee_code AND
				a.employee_code=c.employee_code
				AND b.post_id=d.post_id AND
				a.employee_code=e.employee_code AND
				a.date=e.date and b.department_id=f.department_id and
				b.post_id=f.post_id AND a.employee_code=g.employee_code
				and a.date=g.date and a.employee_code=h.employee_code
				AND a.date=h.date
				AND a.employee_code=i.employee_code
				AND a.date=i.date
				and a.employee_code=j.employee_code
				AND a.date=j.date and a.employee_code=k.employee_code
				AND a.date=m.date
				AND a.date=m.date
				and a.employee_code=m.employee_code
				AND a.employee_code LIKE '%{$employee_code}%'
				AND b.department_id LIKE '%{$department_id}%'
				AND c.cn_name LIKE '%{$cn_name}%'
				AND a.date  LIKE '%{$date}%'
				AND d.post_id LIKE '%{$post_id}%'
				and a.status='0' ";
				$countsql = "SELECT count(*) as count " . $whereSql;
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				$sql = $selectsql . $whereSql . " LIMIT {$criteria->offset}, $pager->pageSize";
				
				$gongzifafang = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				foreach ( $gongzifafang as $key => $row ) {
					$name = '';
					// newdepartmentname是部门名称的全路径
					$gongzifafang [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
					$gongzifafang [$key] ['jiabangongzi'] = $row ['day_salary'] * $row ['day_times'] + $row ['night_salary'] * $row ['night_times'];
				}
				
				
				
				break;
			
			case '3' :
				
				$selectsql = "SELECT e.remark_base_salary,e.remark_skill_allowance,g.remark as jiabanremark,i.remark as fulihejiremark,k.remark as wuxianyijin_remark,j.remark as tax_remark,
h.remark as jixiaoremark,m.remark AS feiyongbutie_remark,
 a.*, b.department_id,b.post_id ,b.bank_card_number,b.bank_name,c.cn_name,d.post_cn_name,e.base_salary,
e.skill_allowance,f.day_salary,f.night_salary,g.night_times, g.day_times,h.month_performance,i.total_amount as fuliheji,
j.tax_amount,
k.person_total,
m.allowance_amount  ";
				
				$whereSql = " FROM vcos_salary_pay as a, vcos_employment_profiles as b ,vcos_employee as c,
 vcos_post as d ,
 vcos_salary_management AS e
,vcos_overtime_salary AS f,
 vcos_overtime_management AS g,
vcos_performance_management as h,
 vcos_otherallowance_management as i,
 vcos_tax_management as j,
vcos_fund_management AS k,
vcos_allowance_management AS m
				WHERE a.employee_code=b.employee_code AND
				a.employee_code=c.employee_code
				AND b.post_id=d.post_id AND
				a.employee_code=e.employee_code AND
				a.date=e.date and b.department_id=f.department_id and
				b.post_id=f.post_id AND a.employee_code=g.employee_code
				and a.date=g.date and a.employee_code=h.employee_code
				AND a.date=h.date
				AND a.employee_code=i.employee_code
				AND a.date=i.date
				and a.employee_code=j.employee_code
				AND a.date=j.date and a.employee_code=k.employee_code
				AND a.date=m.date
				AND a.date=m.date
				and a.employee_code=m.employee_code
				AND a.employee_code LIKE '%{$employee_code}%'
				AND b.department_id LIKE '%{$department_id}%'
				AND c.cn_name LIKE '%{$cn_name}%'
				AND a.date  LIKE '%{$date}%'

				AND d.post_id LIKE '%{$post_id}%'
				and a.status='1' ";
				
				$countsql = "SELECT count(*) as count " . $whereSql;
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				$sql = $selectsql . $whereSql . " LIMIT {$criteria->offset}, $pager->pageSize";
				
				$gongzifafang = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				
				foreach ( $gongzifafang as $key => $row ) {
					$name = '';
					// newdepartmentname是部门名称的全路径
					$gongzifafang [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
					
					$gongzifafang [$key] ['jiabangongzi'] = $row ['day_salary'] * $row ['day_times'] + $row ['night_salary'] * $row ['night_times'];
				}
			default :
				
				break;
		}
		
		if (! (isset ( $pager )))
			$pager = null;
		if (! (isset ( $gongzifafang )))
			$gongzifafang = array ();
		
		$gongzi_date = $this->get_gonzidate ();
		
		$this->render ( 'salary_grant', array (
				'gongzifafang' => $gongzifafang,
				'pages' => $pager,
				'post' => $post,
				'Alldepartment' => $Alldepartment,
				'table_type' => $table_type,
				'gongzi_date' => $gongzi_date,
				'search_form' => $search_form 
		) );
	}
	public function actionGongzifafang() {
		$this->mytrim();
		if (isset ( $_POST ['ids'] )) {
			$ids = $_POST ['ids'];
			
			foreach ( $ids as $value ) {
				$id = $value;
				
				$salary_pay = salary_pay::model ()->findByPk ( $id );
				$salary_pay->id = $id;
				$salary_pay->status = '1';
				$count = $salary_pay->save ();
				if ($count > 0) {
					;
				} else {
					Helper::show_message ( yii::t ( 'vcos', '发放失败。' ) );
				}
			}
			Helper::show_message ( yii::t ( 'vcos', '发放成功。' ) );
			return;
		}
		$id = (isset ( $_POST ['id'] )) ? $_POST ['id'] : FALSE;
		$bank_card_number = (isset ( $_POST ['bank_card_number'] )) ? $_POST ['bank_card_number'] : FALSE;
		$bank_name = (isset ( $_POST ['bank_name'] )) ? $_POST ['bank_name'] : FALSE;
		
		$salary_pay = salary_pay::model ()->findByPk ( $id );
		$salary_pay->id = $id;
		$salary_pay->status = '1';
		
		$count = $salary_pay->save ();
		if ($count > 0) {
			Helper::show_message ( yii::t ( 'vcos', '发放成功。' ) );
		} else {
			Helper::show_message ( yii::t ( 'vcos', '发放失败。' ) );
		}
	}
	public function actionSalary_pay_not_export() {
		$this->mytrim();
		if ($_POST) {
			$department_id = (isset ( $_POST ['department_id'] )) ? trim ( $_POST ['department_id'] ) : '';
			$post_id = (isset ( $_POST ['post_id'] )) ? trim ( $_POST ['post_id'] ) : '';
			$employee_code = (isset ( $_POST ['employee_code'] )) ? trim ( $_POST ['employee_code'] ) : '';
			$cn_name = (isset ( $_POST ['cn_name'] )) ? trim ( $_POST ['cn_name'] ) : '';
			$date = (isset ( $_POST ['date'] )) ? trim ( $_POST ['date'] ) : '';
			$status = '0';
			$export1 = new export ();
			$export1->GongziWeifafang ( $employee_code, $department_id, $cn_name, $date, $post_id, $status );
		}
	}
	public function actionSalary_pay_export() {
		$this->mytrim();
		if ($_POST) {
			$department_id = (isset ( $_POST ['department_id'] )) ? trim ( $_POST ['department_id'] ) : '';
			$post_id = (isset ( $_POST ['post_id'] )) ? trim ( $_POST ['post_id'] ) : '';
			$employee_code = (isset ( $_POST ['employee_code'] )) ? trim ( $_POST ['employee_code'] ) : '';
			$cn_name = (isset ( $_POST ['cn_name'] )) ? trim ( $_POST ['cn_name'] ) : '';
			$date = (isset ( $_POST ['date'] )) ? trim ( $_POST ['date'] ) : '';
			$status = '1';
			$export1 = new export ();
			$export1->GongziWeifafang ( $employee_code, $department_id, $cn_name, $date, $post_id, $status );
		}
	}
	public function actionSalary_Statistics() {
		$this->mytrim();
		$table_type = (isset ( $_GET ['table_type'] )) ? $_GET ['table_type'] : '1';
		
		switch ($table_type) {
			case '1' :
				// 设置默认值
				
				$smalleryear = 2015;
				$smallermonth = 1;
				
				if ($_POST) {
					if ($_POST ['smalleryear'] == '') {
						$smalleryear = 2015;
					} else {
						$smalleryear = (isset ( $_POST ['smalleryear'] )) ? trim ( $_POST ['smalleryear'] ) : '2015';
						$smalleryear = intval ( $smalleryear );
					}
					
					if ($_POST ['smallermonth'] == '') {
						$smallermonth = 1;
					} else {
						
						$smallermonth = (isset ( $_POST ['smallermonth'] )) ? trim ( $_POST ['smallermonth'] ) : '1';
						$smallermonth = intval ( $smallermonth );
					}
				}
				
				$smallertime = '2015-06';
				$biggertime = '2016-06';
				$timedata = array ();
				for($i = 0; $i < 12; $i ++) {
					
					if ($smallermonth > 12) {
						$smallermonth = $smallermonth % 12;
						$smalleryear ++;
					}
					if (($smallermonth) < 10) {
						$datastr = strval ( $smalleryear ) . '-' . '0' . strval ( $smallermonth );
						$timedata [] = $datastr;
					} else {
						$datastr = strval ( $smalleryear ) . '-' . strval ( $smallermonth );
						$timedata [] = $datastr;
					}
					$smallermonth ++;
				}
				
				// 获取已发工资的所有部门
				
				$sql1 = "SELECT  b.post_id,c.post_cn_name ";
				$sql2 = "FROM vcos_salary_pay as a ,
			     vcos_employment_profiles as b, vcos_post AS c
                WHERE a.status='1'  AND a.employee_code=b.employee_code
                AND    b.post_id=c.post_id  GROUP BY b.post_id ";
				
				$countsql = "SELECT count(*) as count   FROM (SELECT count(*) as a FROM vcos_salary_pay as a , vcos_employment_profiles as b, vcos_post AS c WHERE a.status='0' AND
 a.employee_code=b.employee_code AND b.post_id=c.post_id GROUP BY b.post_id) aa";
				
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				$sql = $sql1 . $sql2 . " LIMIT {$criteria->offset}, $pager->pageSize";
				$tongji = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				
				// 遍历部门的12个月份
				foreach ( $tongji as $key => $row ) {
					
					$i = 0;
					
					foreach ( $timedata as $value ) {
						$i ++;
						$temp = 'month' . strval ( $i );
						$money = $this->getpost_monthmoney ( $row ['post_id'], $value );
						$tongji [$key] [$temp] = $money;
					}
				}
				
				$month_salary_tongji = array ();
				foreach ( $timedata as $value ) {
					$money_count = $this->getMonth_allpost ( $value );
					$month_salary_tongji [] = $money_count;
				}
				
				break;
			
			case '2' :
				// 设置默认值
				
				$smalleryear = 2012;
				$biggeryear = 2016;
				if ($_POST) {
					if ($_POST ['smalleryear'] == '') {
						$smalleryear = 2012;
					} else {
						$smalleryear = (isset ( $_POST ['$smalleryear'] )) ? trim ( $_POST ['$smalleryear'] ) : '2012';
						$smalleryear = intval ( $smalleryear );
					}
					
					if ($_POST ['biggeryear'] == '') {
						$biggeryear = 2016;
					} else {
						$biggeryear = (isset ( $_POST ['$biggeryear'] )) ? trim ( $_POST ['$biggeryear'] ) : '2016';
						$biggeryear = intval ( $biggeryear );
					}
				}
				$yearsum = $biggeryear - $smalleryear;
				$yeartimedata = array ();
				
				for($year = $smalleryear; $year <= $biggeryear; $year ++) {
					$yearstr = strval ( $year );
					$yeartimedata [$yearstr] = array ();
					for($i = 1; $i <= 12; $i ++) {
						if (($i) < 10) {
							$datastr = strval ( $year ) . '-' . '0' . strval ( $i );
							$yeartimedata [$yearstr] [] = $datastr;
						} else {
							$datastr = strval ( $year ) . '-' . strval ( $i );
							$yeartimedata [$yearstr] [] = $datastr;
						}
					}
				}
				
				// 获取已发工资的所有部门
				
				$sql1 = "SELECT  b.post_id,c.post_cn_name ";
				$sql2 = "FROM vcos_salary_pay as a ,
			     vcos_employment_profiles as b, vcos_post AS c
                WHERE a.status='1'  AND a.employee_code=b.employee_code
                AND    b.post_id=c.post_id  GROUP BY b.post_id ";
				
				$countsql = "SELECT count(*) as count   FROM (SELECT count(*) as a FROM vcos_salary_pay as a , vcos_employment_profiles as b, vcos_post AS c WHERE a.status='1' AND
 a.employee_code=b.employee_code AND b.post_id=c.post_id GROUP BY b.post_id) aa";
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				$sql = $sql1 . $sql2 . " LIMIT {$criteria->offset}, $pager->pageSize";
				$yeartongji = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				
				foreach ( $yeartongji as $key => $row ) {
					
					$post_year_money = 0;
					$i = 1;
					foreach ( $yeartimedata as $row1 ) {
						
						$yearmoney = 0;
						// 遍历部门的12个月份
						foreach ( $row1 as $value ) {
							$money = $this->getpost_monthmoney ( $row ['post_id'], $value );
							$yearmoney += $money;
						}
						
						$yeartongji [$key] ['year' . strval ( $i )] = $yearmoney;
						$i ++;
					}
				}
				
				$year_salary_tongji = array ();
				
				for($year = $smalleryear; $year <= $biggeryear; $year ++) {
					$value = strval ( $year );
					$year_count = $this->getyear_post ( $value );
					$year_salary_tongji [] = $year_count;
				}
				
				break;
			
			default :
				
				break;
		}
		
		if (! (isset ( $timedata )))
			$timedata = array ();
		if (! (isset ( $tongji )))
			$tongji = array ();
		if (! (isset ( $certificate )))
			$certificate = array ();
		if (! (isset ( $month_salary_tongji )))
			$month_salary_tongji = array ();
		if (! (isset ( $pager )))
			$pager = null;
		
		if (! (isset ( $yearsum )))
			$yearsum = 0;
		
		if (! (isset ( $yeartongji )))
			$yeartongji = array ();
		if (! (isset ( $year_salary_tongji )))
			$year_salary_tongji = array ();
		
		if (! (isset ( $smalleryear )))
			$smalleryear = null;
		
		$this->render ( 'salary_statistics', array (
				'timedata' => $timedata,
				'tongji' => $tongji,
				'month_salary_tongji' => $month_salary_tongji,
				'certificate' => $certificate,
				'pages' => $pager,
				'table_type' => $table_type,
				'yearsum' => $yearsum,
				'yeartongji' => $yeartongji,
				'year_salary_tongji' => $year_salary_tongji,
				'smalleryear' => $smalleryear 
		) );
	}
	public function getpost_monthmoney($post_id = '', $monthtime = '') {
		$sql = "SELECT  a.* ,b.post_id,c.post_cn_name,SUM(a.total_amount) as sum FROM
		vcos_salary_pay as a ,vcos_employment_profiles as b, vcos_post AS c
           WHERE a.status='1'  AND a.employee_code=b.employee_code
          AND    b.post_id=c.post_id
          AND    a.date='{$monthtime}'
          AND   b.post_id='{$post_id}'";
		
		$post = Yii::app ()->db->createCommand ( $sql )->queryRow ();
		return $post ['sum']; // 返回得到的这个职务这个月的合计工资
	}
	
	/*
	 * 获取某个月份的发放工资统计
	 *
	 */
	public function getMonth_allpost($monthtime = '') {
		$sql = "SELECT a.* ,b.post_id,c.post_cn_name,SUM(a.total_amount)
	 as monthcount FROM vcos_salary_pay as a ,
	  vcos_employment_profiles as b, vcos_post AS c WHERE
	a.status='1' AND a.employee_code=b.employee_code AND
    b.post_id=c.post_id
	AND a.date='{$monthtime}'";
		$post = Yii::app ()->db->createCommand ( $sql )->queryRow ();
		return $post ['monthcount']; // 返回得到的所有职务这个月的合计工资
	}
	public function getyear_post($year) {
		if ($year == '') {
			return null;
		}
		
		$sql = "SELECT  a.* ,b.post_id,c.post_cn_name,SUM(a.total_amount)
		as yearcount
		FROM vcos_salary_pay as a ,vcos_employment_profiles as b, vcos_post AS c
		WHERE a.status='1'  AND a.employee_code=b.employee_code
		AND    b.post_id=c.post_id
		AND    a.date>='{$year}-01'
		AND    a.date<='{$year}-12' ";
		$post = Yii::app ()->db->createCommand ( $sql )->queryRow ();
		return $post ['yearcount']; // 返回得到的所有职务这个月的合计工资
	}
	public function actionStatistics_month_export() {
		$this->mytrim();
		// 设置默认值
		$smalleryear = 2015;
		$smallermonth = 1;
		
		if ($_POST) {
			if ($_POST ['smalleryear'] == '') {
				$smalleryear = 2015;
			} else {
				$smalleryear = (isset ( $_POST ['smalleryear'] )) ? trim ( $_POST ['smalleryear'] ) : '2015';
				$smalleryear = intval ( $smalleryear );
			}
			
			if ($_POST ['smallermonth'] == '') {
				$smallermonth = 1;
			} else {
				
				$smallermonth = (isset ( $_POST ['smallermonth'] )) ? trim ( $_POST ['smallermonth'] ) : '1';
				$smallermonth = intval ( $smallermonth );
			}
		}
		
		$export = new export ();
		$export->Employee_month_salary_export ( $smalleryear, $smallermonth );
	}
	public function actionStatistics_year_export() {
		$this->mytrim();
		$smalleryear = 2012;
		$biggeryear = 2016;
		if ($_POST) {
			if ($_POST ['smalleryear'] == '') {
				$smalleryear = 2012;
			} else {
				$smalleryear = (isset ( $_POST ['$smalleryear'] )) ? trim ( $_POST ['$smalleryear'] ) : '2012';
				$smalleryear = intval ( $smalleryear );
			}
			
			if ($_POST ['biggeryear'] == '') {
				$biggeryear = 2016;
			} else {
				$biggeryear = (isset ( $_POST ['$biggeryear'] )) ? trim ( $_POST ['$biggeryear'] ) : '2016';
				$biggeryear = intval ( $biggeryear );
			}
		}
		
		$export = new export ();
		$export->Employee_year_salary_export ( $smalleryear, $biggeryear );
	}
	public function actionSkill_allowance_export() {
		$this->mytrim();
		if ($_POST) {
			
			$department_id = isset ( $_POST ['department_id'] ) ? $_POST ['department_id'] : '';
			$post_id = isset ( $_POST ['post_id'] ) ? $_POST ['post_id'] : '';
			$filename = "技能工龄津贴标准表";
			$export = new export ();
			$export->skill_allowance_export( $department_id, $post_id, $filename );
		}
	}
	public function actionLeave_charge_export() {
		$this->mytrim();
		if ($_POST) {
			
			$department_id = isset ( $_POST ['department_id'] ) ? $_POST ['department_id'] : '';
			$post_id = isset ( $_POST ['post_id'] ) ? $_POST ['post_id'] : '';
			$filename = "加班工资标准表";
			$export = new export ();
			$export->leave_charge_export ( $department_id, $post_id, $filename );
		}
	}
	public function actionHousing_fund_export() {
		$this->mytrim();
		if ($_POST) {
			
			$department_id = isset ( $_POST ['department_id'] ) ? $_POST ['department_id'] : '';
			$post_id = isset ( $_POST ['post_id'] ) ? $_POST ['post_id'] : '';
			$filename = "住房公积金标准表";
			$export = new export ();
			$export->housing_fund_export ( $department_id, $post_id, $filename );
		}
	}
	public function actionTraffic_allowance_export() {
		$this->mytrim();
		if ($_POST) {
			
			$department_id = isset ( $_POST ['department_id'] ) ? $_POST ['department_id'] : '';
			$post_id = isset ( $_POST ['post_id'] ) ? $_POST ['post_id'] : '';
			$filename = "交通通讯补贴标准表";
			$export = new export ();
			$export->traffic_allowance_export ( $department_id, $post_id, $filename );
		}
	}
	public function actionOvertime_salary_export() {
		$this->mytrim();
		if ($_POST) {
			$department_id = isset ( $_POST ['department_id'] ) ? $_POST ['department_id'] : '';
			$post_id = isset ( $_POST ['post_id'] ) ? $_POST ['post_id'] : '';
			$filename = "加班工资标准表";
			$export = new export ();
			
			$export->overtime_salary_export ( $department_id, $post_id, $filename );
		}
	}
	public function actionDownload() {
		$this->mytrim();
		$file_path = './download/';
		
		$filename = $_GET ['filename'];
		$file_path .= $filename;

		header('Content-Type:application/octet-stream');
		header ('content-disposition:attachment;filename='.basename($file_path));
		header ('content-length:'.filesize($file_path));
		readfile ($file_path);
	}
	public function actionImport_basesalary() {
		$this->mytrim();


		
		if (! isset ( $_FILES ['myFile'] ['tmp_name'] )) {
			Helper::show_message ( yii::t ( 'vcos', '请上传文件。' ) );
			exit ();
		}
		
		header ( "Content-Type:text/html;charset=utf-8" );
		$filename = $_FILES ['myFile'] ['tmp_name'];
		$fileType = PHPExcel_IOFactory::identify ( $filename ); // 自动获取文件的类型提供给phpexcel用
		$objReader = PHPExcel_IOFactory::createReader ( $fileType ); // 获取文件读取操作对象
		$objPHPExcel = $objReader->load ( $filename ); // 加载文件
		
		$sheetCount = $objPHPExcel->getSheetCount (); // 获取excel文件里有多少个sheet
		                                              
		// $objReader->setLoadSheetsOnly ( $sheetName ); // 只加载指定的sheet
		$Data = array ();
		foreach ( $objPHPExcel->getWorksheetIterator () as $sheet ) { // 循环取sheet
			$i = 0;
			foreach ( $sheet->getRowIterator () as $row ) {
			 // 逐行处理
	            // echo '$row->getRowIndex ()';
	            // var_dump ( $row->getRowIndex () );
				if ($row->getRowIndex () < 3) { // 从第三行开始读，不要标题，不要列名
					continue;
				}
				
				$Data [$i] = array ();
				$j = 0;
				
				foreach ( $row->getCellIterator () as $cell ) { // 逐列读取
					$Data [$i] [$j] = $cell->getValue (); // 获取单元格数据
	                  $data = $cell->getValue (); // 获取单元格数据
	                
					$j ++;
				}

			     
				$i ++;
				
				
			}
			
			
		}
		




        $models=array();
		foreach ($Data as  $row) {


			$overtime_management=new overtime_management ();

			foreach ($row as $key => $value)
			 {



				switch ($key)
				 {
				case '0':
					$overtime_management ->date = $value;
					if($value=='')
					{
						Helper::show_message ( yii::t ( 'vcos', '月份不能为空。' ) );
						exit();

					}
					break;
				case '1':
					$overtime_management ->employee_code= $value;
					if($value=='')
					{
						Helper::show_message ( yii::t ( 'vcos', '员工编码不能为空。' ) );
						exit();

					}
					break;
				case '2':
				    if($value=='')
					{
						$value='0';

					}
					$overtime_management ->day_times= $value;

					break;
				case '3':
				     if($value=='')
					{
						$value='0';

					}
					$overtime_management ->night_times= $value;
					break;
				case '4':
					$overtime_management ->remark= $value;
					break;
				
				default:
					# code...
					break;
			    }
			
			}

			$models[]=$overtime_management;

			// $count = $overtime_management->save ();

				
			}





			$transaction=Yii::app()->db->beginTransaction();
					try{
					 foreach ($models as $model) {
					 if (!$model->save()) {
					 throw new Exception();
					}
					}
					$transaction->commit();

					Helper::show_message ( yii::t ( 'vcos', '导入成功。' ) );
					} catch(Exception $e){
					$transaction->rollBack();//回滚事务

					Helper::show_message ( yii::t ( 'vcos', '导入失败，请注意格式。' ) );





					}
			

		


		exit ();
	}
	


	/*

     其他福利导入
	*/
	public function actionImport_otherallowance_management() {
		$this->mytrim();
		
		if (! isset ( $_FILES ['myFile'] ['tmp_name'] )) {
			Helper::show_message ( yii::t ( 'vcos', '请上传文件。' ) );
			exit ();
		}
		
		header ( "Content-Type:text/html;charset=utf-8" );
		$filename = $_FILES ['myFile'] ['tmp_name'];
		$fileType = PHPExcel_IOFactory::identify ( $filename ); // 自动获取文件的类型提供给phpexcel用
		$objReader = PHPExcel_IOFactory::createReader ( $fileType ); // 获取文件读取操作对象
		$objPHPExcel = $objReader->load ( $filename ); // 加载文件
		
		$sheetCount = $objPHPExcel->getSheetCount (); // 获取excel文件里有多少个sheet
		                                              
		// $objReader->setLoadSheetsOnly ( $sheetName ); // 只加载指定的sheet
		$Data = array ();
		foreach ( $objPHPExcel->getWorksheetIterator () as $sheet ) { // 循环取sheet
			$i = 0;
			foreach ( $sheet->getRowIterator () as $row ) {
			 // 逐行处理
	            // echo '$row->getRowIndex ()';
	            // var_dump ( $row->getRowIndex () );
				if ($row->getRowIndex () < 3) { // 从第三行开始读，不要标题，不要列名
					continue;
				}
				
				$Data [$i] = array ();
				$j = 0;
				
				foreach ( $row->getCellIterator () as $cell ) { // 逐列读取
					$Data [$i] [$j] = $cell->getValue (); // 获取单元格数据
	                  // $data = $cell->getValue (); // 获取单元格数据
	                  if($j==0 || $j==1)
	                  {
	                  	if($Data [$i] [$j]=='')
	                  	{
	                  	Helper::show_message ( yii::t ( 'vcos', '导入失败。' ) );
	                  		exit();
	                  	}
	                  }
	                
					$j ++;
				}

			     
				$i ++;
				
				
			}
			
			
		}
		


	




        $models=array();
		foreach ($Data as  $row) {


			$otherallowance_management=new otherallowance_management ();

			foreach ($row as $key => $value)
			 {



				switch ($key)
				 {
				case '0':
					$otherallowance_management ->date = $value;
					if($value=='')
					{
						Helper::show_message ( yii::t ( 'vcos', '月份不能为空。' ) );
						exit();

					}
					break;
				case '1':
					$otherallowance_management ->employee_code= $value;
					if($value=='')
					{
						Helper::show_message ( yii::t ( 'vcos', '员工编码不能为空。' ) );
						exit();

					}
					break;
				case '2':
				    if($value=='')
					{
						$value='0';

					}
					$otherallowance_management ->total_amount= $value;

					break;
				case '3':
				  
					$otherallowance_management->remark= $value;
					break;
				
				default:
					# code...
					break;
			    }
			
			}

			$models[]=$otherallowance_management;

			// $count = $overtime_management->save ();

				
			}





			$transaction=Yii::app()->db->beginTransaction();
					try{
					 foreach ($models as $model) {
					 if (!$model->save()) {
					 throw new Exception();
					}
					}
					$transaction->commit();

					Helper::show_message ( yii::t ( 'vcos', '导入成功。' ) );
					} catch(Exception $e){
					$transaction->rollBack();//回滚事务

					Helper::show_message ( yii::t ( 'vcos', '导入失败，请注意格式。' ) );





					}
			

		


		exit ();
	}


	


	/*

     税收导入
	*/
	public function actionImport_tax_management() {
		$this->mytrim();
		
		
		
		if (! isset ( $_FILES ['myFile'] ['tmp_name'] )) {
			Helper::show_message ( yii::t ( 'vcos', '请上传文件。' ) );
			exit ();
		}
		
		header ( "Content-Type:text/html;charset=utf-8" );
		$filename = $_FILES ['myFile'] ['tmp_name'];
		$fileType = PHPExcel_IOFactory::identify ( $filename ); // 自动获取文件的类型提供给phpexcel用
		$objReader = PHPExcel_IOFactory::createReader ( $fileType ); // 获取文件读取操作对象
		$objPHPExcel = $objReader->load ( $filename ); // 加载文件
		
		$sheetCount = $objPHPExcel->getSheetCount (); // 获取excel文件里有多少个sheet
		                                              
		// $objReader->setLoadSheetsOnly ( $sheetName ); // 只加载指定的sheet
		$Data = array ();
		foreach ( $objPHPExcel->getWorksheetIterator () as $sheet ) { // 循环取sheet
			$i = 0;
			foreach ( $sheet->getRowIterator () as $row ) {
			 // 逐行处理
	            // echo '$row->getRowIndex ()';
	            // var_dump ( $row->getRowIndex () );
				if ($row->getRowIndex () < 3) { // 从第三行开始读，不要标题，不要列名
					continue;
				}
				
				$Data [$i] = array ();
				$j = 0;
				
				foreach ( $row->getCellIterator () as $cell ) { // 逐列读取
					$Data [$i] [$j] = $cell->getValue (); // 获取单元格数据
	                  // $data = $cell->getValue (); // 获取单元格数据
	                  if($j==0 || $j==1)
	                  {
	                  	if($Data [$i] [$j]=='')
	                  	{
	                  	Helper::show_message ( yii::t ( 'vcos', '导入失败。' ) );
	                  		exit();
	                  	}
	                  }
	                
					$j ++;
				}

			     
				$i ++;
				
				
			}
			
			
		}
		


	




        $models=array();
		foreach ($Data as  $row) {


			$otherallowance_management=new otherallowance_management ();

			foreach ($row as $key => $value)
			 {



				switch ($key)
				 {
				case '0':
					$otherallowance_management ->date = $value;
					if($value=='')
					{
						Helper::show_message ( yii::t ( 'vcos', '月份不能为空。' ) );
						exit();

					}
					break;
				case '1':
					$otherallowance_management ->employee_code= $value;
					if($value=='')
					{
						Helper::show_message ( yii::t ( 'vcos', '员工编码不能为空。' ) );
						exit();

					}
					break;
				case '2':
				    if($value=='')
					{
						$value='0';

					}
					$otherallowance_management ->total_amount= $value;

					break;
				case '3':
				  
					$otherallowance_management->remark= $value;
					break;
				
				default:
					# code...
					break;
			    }
			
			}

			$models[]=$otherallowance_management;

			// $count = $overtime_management->save ();

				
			}





			$transaction=Yii::app()->db->beginTransaction();
					try{
					 foreach ($models as $model) {
					 if (!$model->save()) {
					 throw new Exception();
					}
					}
					$transaction->commit();

					Helper::show_message ( yii::t ( 'vcos', '导入成功。' ) );
					} catch(Exception $e){
					$transaction->rollBack();//回滚事务

					Helper::show_message ( yii::t ( 'vcos', '导入失败，请注意格式。' ) );





					}
			

		


		exit ();
	}




	/**
	 * 工资计算 基本工资查询导出
	 */
    public function actionOvertime_managment_export()
    {
    	$this->mytrim();

    	
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
		$filename = '加班明细查询表';
		$export = new export ();
		$export->Overtime_managment_export ( $department_id, $post_id, $employee_code, $cn_name, $date, $filename );

    }

	public function actionSalary_managment_export() {
		$this->mytrim();
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
		$filename = '基本工资查询表';
		$export = new export ();
		$export->Salary_managment_export ( $department_id, $post_id, $employee_code, $cn_name, $date, $filename );
	}
	public function actionSalary_Calculate() {
		require_once 'a.php';
	}

	
	public function actionPerformance_management_export() {
		$this->mytrim();
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
		$filename = '绩效工资查询表';
		$export = new export ();
		$export->Performance_management_export ( $department_id, $post_id, $employee_code, $cn_name, $date, $filename );
	}

	
	public function actionTax_management_export() {

     $this->mytrim();

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
		$filename = '个人所得税查询表';
		$export = new export ();
		$export->Tax_management_export ( $department_id, $post_id, $employee_code, $cn_name, $date, $filename );
	}


	

	public function actionAllowance_management_export() {


        $this->mytrim();
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
		$filename = '费用补贴查询表';
		$export = new export ();
		$export->Allowance_management_export ( $department_id, $post_id, $employee_code, $cn_name, $date, $filename );
	}

	
	public function actionOtherallowance_management_export() {
         $this->mytrim();
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
		$filename = '其他福利查询表';
		$export = new export ();
		$export->Otherallowance_management_export ( $department_id, $post_id, $employee_code, $cn_name, $date, $filename );
	}


	public function actionGetpost_bydepartment()
	{
		$this->mytrim();
		$department_id = isset ( $_POST ['department_id'] ) ? $_POST ['department_id'] : 'false';
		if ($department_id == false) {
			echo 'error';
			return;
		}
		$sql = "SELECT post_id ,post_cn_name FROM vcos_post WHERE department_id={$department_id} ";
		$data = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
		$data = json_encode ( $data );
		echo $data;
	}

//通过部门，职务，名字确定员工编号
	public function actionGet_employee_code()
	{
        $this->mytrim();
		$department_id = isset ( $_POST ['department_id'] ) ? $_POST ['department_id'] : 'false';
		if ($department_id =='false') {
			echo 'error';
			return;
		}

		$post_id = isset ( $_POST ['post_id'] ) ? $_POST ['post_id'] : 'false';


		if ($post_id=='false') {
			echo 'post_error';
			return;
		}

		$cn_name = isset ( $_POST ['cn_name'] ) ? $_POST ['cn_name'] : 'false';

		if ($cn_name=='false') {
			echo 'cn_name_error';
			return;
		}


		$sql="SELECT b.employee_code  FROM  vcos_employment_profiles as a ,vcos_employee as b
				WHERE a.department_id='{$department_id}'
				and a.post_id='{$post_id}'
				and a.employee_code=b.employee_code
				and b.cn_name='{$cn_name}'
		";

		
		$data = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
		$data = json_encode ( $data );
		echo $data;


	}


   public function actionGetcn_name()
   {

       $this->mytrim();

		$department_id = isset ( $_POST ['department_id'] ) ? $_POST ['department_id'] : 'false';
		if ($department_id =='false') {
			echo 'error';
			return;
		}


		$post_id = isset ( $_POST ['post_id'] ) ? $_POST ['post_id'] : 'false';


		if ($post_id=='false') {
			echo 'post_error';
			return;
		}

		$sql="SELECT  a.cn_name FROM vcos_employee as a,  vcos_employment_profiles   as b
				WHERE   b.department_id={$department_id}
				AND  b.post_id={$post_id}
				and a.employee_code=b.employee_code
		";
		$data = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
		
		$data = json_encode ( $data );
		echo $data;

   }



   public function actionOtherallowance_edit() {
   	$this->mytrim();
        $id = (isset ( $_GET ['id'] )) ? $_GET ['id'] : FALSE;
		$employee_code = (isset ( $_POST ['employee_code'] )) ? $_POST ['employee_code'] : FALSE;
		$total_amount = (isset ( $_POST ['total_amount'] )) ? $_POST ['total_amount'] : FALSE;
		$remark = (isset ( $_POST ['remark'] )) ? $_POST ['remark'] : FALSE;
		$date = (isset ( $_POST ['date'] )) ? $_POST ['date'] : FALSE;
		$status='0';
        $total_amount=trim($total_amount);
        $remark=trim($remark);
		
		$otherallowance_management = otherallowance_management::model ()->findByPk ( $id );
		$otherallowance_management->id=$id;
		$otherallowance_management->employee_code = $employee_code;
		$otherallowance_management->total_amount = $total_amount;
		$otherallowance_management->remark = $remark;
		$otherallowance_management->date  = $date ;
		$otherallowance_management->status = $status;
		
		$count = $otherallowance_management->save ();
		if ($count > 0) {
			Helper::show_message ( yii::t ( 'vcos', '修改成功。' ) );
		} else {
			Helper::show_message ( yii::t ( 'vcos', '添加失败。' ) );
		}
	}




public function actionOtherallowance_add() 
	  {
	  	$this->mytrim();
        
		$employee_code = (isset ( $_POST ['employee_code'] )) ? $_POST ['employee_code'] : FALSE;
		$total_amount = (isset ( $_POST ['total_amount'] )) ? $_POST ['total_amount'] : FALSE;
		$remark = (isset ( $_POST ['remark'] )) ? $_POST ['remark'] : FALSE;
		$date = (isset ( $_POST ['date'] )) ? $_POST ['date'] : FALSE;
		$status='0';
        $total_amount=trim($total_amount);
        $remark=trim($remark);
		
		$otherallowance_management = new otherallowance_management();
		
		$otherallowance_management->employee_code =$employee_code;
		$otherallowance_management->total_amount = $total_amount;
		$otherallowance_management->remark = $remark;
		$otherallowance_management->date  = $date ;
		$otherallowance_management->status = $status;
		
		$count = $otherallowance_management->save ();
		if ($count > 0) {
			Helper::show_message ( yii::t ( 'vcos', '添加成功。' ) );
		} else {
			Helper::show_message ( yii::t ( 'vcos', '添加失败。' ) );
		}
	}



	public function actionAllowance_management_edit() {
		$this->mytrim();
        $id = (isset ( $_GET ['id'] )) ? $_GET ['id'] : FALSE;
		$employee_code = (isset ( $_POST ['employee_code'] )) ? $_POST ['employee_code'] : FALSE;
		$allowance_amount = (isset ( $_POST ['allowance_amount'] )) ? $_POST ['allowance_amount'] : FALSE;
		$remark = (isset ( $_POST ['remark'] )) ? $_POST ['remark'] : FALSE;
		$date = (isset ( $_POST ['date'] )) ? $_POST ['date'] : FALSE;
		$date =trim($date );
        $allowance_amount=trim($allowance_amount);
        $remark=trim($remark);
		
		$allowance_management = allowance_management::model ()->findByPk ( $id );
		$allowance_management->id=$id;
		$allowance_management->employee_code = $employee_code;
		$allowance_management->allowance_amount = $allowance_amount;
		$allowance_management->remark = $remark;
		$allowance_management->date  = $date ;
		
		
		$count = $allowance_management->save ();
		if ($count > 0) {
			Helper::show_message ( yii::t ( 'vcos', '修改成功。' ) );
		} else {
			Helper::show_message ( yii::t ( 'vcos', '添加失败。' ) );
		}
	}

	public function actionAllowance_management_add() 
	  {
        $this->mytrim();
		$employee_code = (isset ( $_POST ['employee_code'] )) ? $_POST ['employee_code'] : FALSE;
		$allowance_amount = (isset ( $_POST ['allowance_amount'] )) ? $_POST ['allowance_amount'] : FALSE;
		$remark = (isset ( $_POST ['remark'] )) ? $_POST ['remark'] : FALSE;
		$date = (isset ( $_POST ['date'] )) ? $_POST ['date'] : FALSE;
		$date=trim($date);
        $allowance_amount=trim($allowance_amount);
        $remark=trim($remark);


		$allowance_management = new allowance_management();
		
		
		$allowance_management->employee_code = $employee_code;
		$allowance_management->allowance_amount = $allowance_amount;
		$allowance_management->remark = $remark;
		$allowance_management->date  = $date ;
		
		$count = $allowance_management->save ();
		if ($count > 0) {
			Helper::show_message ( yii::t ( 'vcos', '添加成功。' ) );
		} else {
			Helper::show_message ( yii::t ( 'vcos', '添加失败。' ) );
		}
	}

	public function actionTax_management_add() 
	  {
        $this->mytrim();
		$employee_code = (isset ( $_POST ['employee_code'] )) ? $_POST ['employee_code'] : FALSE;
		$tax_amount = (isset ( $_POST ['tax_amount'] )) ? $_POST ['tax_amount'] : FALSE;
		$remark = (isset ( $_POST ['remark'] )) ? $_POST ['remark'] : FALSE;
		$date = (isset ( $_POST ['date'] )) ? $_POST ['date'] : FALSE;
		$date=trim($date);
        $tax_amount=trim($tax_amount);
        $remark=trim($remark);
        $status='0';

    
		$tax_management = new tax_management();
		$tax_management->employee_code = $employee_code;
		$tax_management->tax_amount = $tax_amount;
		$tax_management->remark = $remark;
		$tax_management->date  = $date ;
		$tax_management->status  = $status;
		
		$count = $tax_management->save ();
		if ($count > 0) {
			Helper::show_message ( yii::t ( 'vcos', '添加成功。' ) );
		} else {
			Helper::show_message ( yii::t ( 'vcos', '添加失败。' ) );
		}
	}


	public function actionTax_management_edit() 
	  {
	  	$this->mytrim();
          $id = (isset ( $_GET ['id'] )) ? $_GET ['id'] : FALSE;
		$employee_code = (isset ( $_POST ['employee_code'] )) ? $_POST ['employee_code'] : FALSE;
		$tax_amount = (isset ( $_POST ['tax_amount'] )) ? $_POST ['tax_amount'] : FALSE;
		$remark = (isset ( $_POST ['remark'] )) ? $_POST ['remark'] : FALSE;
		$date = (isset ( $_POST ['date'] )) ? $_POST ['date'] : FALSE;
		$date=trim($date);
        $tax_amount=trim($tax_amount);
        $remark=trim($remark);
    
		$tax_management = tax_management::model ()->findByPk ( $id );
		$tax_management->id=$id;
		$tax_management->employee_code = $employee_code;
		$tax_management->tax_amount = $tax_amount;
		$tax_management->remark = $remark;
		$tax_management->date  = $date ;
		
		$count = $tax_management->save ();
		if ($count > 0) {
			Helper::show_message ( yii::t ( 'vcos', '修改成功。' ) );
		} else {
			Helper::show_message ( yii::t ( 'vcos', '添加失败。' ) );
		}
	}





	public function actionOvertime_management_edit() 
	  {
        $this->mytrim();
         $id = (isset ( $_GET ['id'] )) ? $_GET ['id'] : FALSE;
		$employee_code = (isset ( $_POST ['employee_code'] )) ? $_POST ['employee_code'] :'';

		if($employee_code=='')
		{
			Helper::show_message ( yii::t ( 'vcos', '员工编号不能为空。' ) );

			return ;
		}


		$day_times = (isset ( $_POST ['day_times'] )) ? $_POST ['day_times'] : FALSE;
		$night_times = (isset ( $_POST ['night_times'] )) ? $_POST ['night_times'] : FALSE;
		$remark = (isset ( $_POST ['remark'] )) ? $_POST ['remark'] : FALSE;
		$date = (isset ( $_POST ['date'] )) ? $_POST ['date'] : FALSE;
		
		$date=trim($date);
		$day_times=trim($day_times);
		$night_times=trim($night_times);
        $remark=trim($remark);
		$overtime_management = overtime_management::model ()->findByPk ( $id );
		$overtime_management->id=$id;
		$overtime_management->employee_code = $employee_code;
		$overtime_management->day_times = $day_times;
		$overtime_management->night_times = $night_times ;
		$overtime_management->remark = $remark;
		$overtime_management->date = $date ;
		
		$count = $overtime_management->save ();
		if ($count > 0) {
			Helper::show_message ( yii::t ( 'vcos', '修改成功。' ) );
		} else {
			Helper::show_message ( yii::t ( 'vcos', '添加失败。' ) );
		}
	}


	public function actionOvertime_management_add() 
	  {

	  
           $this->mytrim();
          
		$employee_code = (isset ( $_POST ['employee_code'] )) ? $_POST ['employee_code'] : '';

		if($employee_code=='')
		{
			Helper::show_message ( yii::t ( 'vcos', '员工编号不能为空。' ) );

			return ;
		}
		$day_times = (isset ( $_POST ['day_times'] )) ? $_POST ['day_times'] : FALSE;
		$night_times = (isset ( $_POST ['night_times'] )) ? $_POST ['night_times'] : FALSE;
		$remark = (isset ( $_POST ['remark'] )) ? $_POST ['remark'] : FALSE;
		$date = (isset ( $_POST ['date'] )) ? $_POST ['date'] : FALSE;
		$status='0';
		$date=trim($date);
		$day_times=trim($day_times);
		$night_times=trim($night_times);
        $remark=trim($remark);
		$overtime_management = new overtime_management();
	
		$overtime_management->employee_code = $employee_code;
		$overtime_management->day_times = $day_times;
		$overtime_management->night_times = $night_times ;
		$overtime_management->remark = $remark;
		$overtime_management->date = $date ;
		$overtime_management->status = $status;
		
		$count = $overtime_management->save ();
		if ($count > 0) {
			Helper::show_message ( yii::t ( 'vcos', '修改成功。' ) );
		} else {
			Helper::show_message ( yii::t ( 'vcos', '添加失败。' ) );
		}
	}


	public function actionAllowance_management_generate()
	{


		//   'year' => string '2015' (length=4)
  // 'month' => string '01' (length=2)
  // 'employee_code' => string '' (length=0)

		$this->mytrim();

		$year = (isset ( $_POST ['department_id'] )) ? $_POST ['department_id'] : FALSE;
		$month = (isset ( $_POST ['post_cn_name'] )) ? $_POST ['post_cn_name'] : FALSE;
		$employee_code = (isset ( $_POST ['post_en_name'] )) ? $_POST ['post_en_name'] : FALSE;


	    if ((preg_match('/^[1-9]\d{3}/', $year))==false) 

	    {
                Helper::show_message ( yii::t ( 'vcos', '年份不对' ) );

	    }

	    //匹配月份

	    if(preg_match('/^[0][1-9]$/', $month) || preg_match('/^[1][1-2]$/', $month))
      {


      }
      else{
      	
      }


	    



		exit();

		$whereSql="where employee_code='{}'";

		$sql="SELECT b.employee_code  FROM  vcos_employment_profiles as a ,vcos_employee as b
				WHERE a.department_id='{$department_id}'
				and a.post_id='{$post_id}'
				and a.employee_code=b.employee_code
				and b.cn_name='{$cn_name}'
		";

		
		$data = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
		$data = json_encode ( $data );

	}
   
}

?>


