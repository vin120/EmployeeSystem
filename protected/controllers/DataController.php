<?php
header ( "content-type:text/html;charset=utf-8" );
class DataController extends Controller {
	public static $flag = TRUE;
	
	/*
	 * 数据注入过滤
	 */
	public function mytrim() {
		foreach ( $_POST as $key => $value ) {
			$_POST [$key] = trim ( $value ); // 去空格
			$_POST [$key] = htmlspecialchars ( $_POST [$key] ); // 专义html,js代码,防止前端代码注入
			$$_POST [$key] = addslashes ( $_POST [$key] ); // 过滤大部分的sql注入
		}
		
		foreach ( $_GET as $key => $value ) {
			
			$_GET [$key] = trim ( $value ); // 去空格
			$_GET [$key] = htmlspecialchars ( $_GET [$key] ); // 专义html,js代码,防止前端代码注入
			$_GET [$key] = addslashes ( $_GET [$key] ); // 过滤大部分的sql注入
		}
	}
	public function actionData_Material() {
		$this->mytrim ();
		$table_type = (isset ( $_GET ['table_type'] )) ? $_GET ['table_type'] : '1';
		
		switch ($table_type) {
			case '1' :
				
				if ($_POST) {
					$a = count ( $_POST ['ids'] );
					$result = certificate::model ()->count ();
					if ($a == $result) {
						die ( Helper::show_message ( yii::t ( 'vcos', '不能把所有记录删除！' ) ) );
					}
					$ids = implode ( '\',\'', $_POST ['ids'] );
					// 事务处理
					$transaction = Yii::app ()->db->beginTransaction ();
					try {
						$count = certificate::model ()->deleteAll ( "certificate_id  in('$ids')" ); // post_id 为post表主键
						$transaction->commit ();
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ), Yii::app ()->createUrl ( "data/data_material" ) );
					} catch ( Exception $e ) {
						$transaction->rollBack ();
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				
				// 单条删除
				if (isset ( $_GET ['id'] )) {
					$id = $_GET ['id']; // 职务表id
					$count = certificate::model ()->deleteByPk ( $id ); // moder删除方法
					                                                    
					// $sql = "DELETE FROM vcos_post WHERE post_id = {$id}";
					                                                    // $row = Yii::app ()->db->createCommand ()->delete ( 'vcos_post', "post_id=:post_id", array (
					                                                    // ':post_id' => $post_id
					                                                    // ) );
					                                                    // var_dump ( $row );
					                                                    // exit ();
					                                                    // exit ();
					                                                    // $count = Yii::app ()->m_db->createCommand ( $sql );
					
					if ($count) {
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ), Yii::app ()->createUrl ( "data/data_material" ) );
					} else {
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				
				// table1
				
				$countsql = "SELECT count(*) as count  FROM vcos_certificate";
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				$sql = "SELECT * FROM vcos_certificate  LIMIT {$criteria->offset}, $pager->pageSize";
				$certificate = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				
				// table1
				
				break;
			
			case '2' :
				
				if ($_POST) {
					
					$a = count ( $_POST ['id2s'] );
					$result = title::model ()->count ();
					if ($a == $result) {
						die ( Helper::show_message ( yii::t ( 'vcos', '不能把所有记录删除！' ) ) );
					}
					$ids = implode ( '\',\'', $_POST ['id2s'] );
					// 事务处理
					$transaction = Yii::app ()->db->beginTransaction ();
					try {
						$count = title::model ()->deleteAll ( "title_id  in('$ids')" ); // post_id 为post表主键
						$transaction->commit ();
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ), Yii::app ()->request->urlReferrer );
					} catch ( Exception $e ) {
						$transaction->rollBack ();
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				
				// 单条删除
				if (isset ( $_GET ['id'] )) {
					$id = $_GET ['id']; // 职务表id
					$count = title::model ()->deleteByPk ( $id ); // moder删除方法
					                                              
					// $sql = "DELETE FROM vcos_post WHERE post_id = {$id}";
					                                              // $row = Yii::app ()->db->createCommand ()->delete ( 'vcos_post', "post_id=:post_id", array (
					                                              // ':post_id' => $post_id
					                                              // ) );
					                                              // var_dump ( $row );
					                                              // exit ();
					                                              // exit ();
					                                              // $count = Yii::app ()->m_db->createCommand ( $sql );
					
					if ($count) {
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ), Yii::app ()->request->urlReferrer );
					} else {
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ), Yii::app ()->request->urlReferrer );
					}
				}
				
				$count_table2_sql = "SELECT count(*) as count FROM vcos_title ";
				$count = Yii::app ()->getDb ()->createCommand ( $count_table2_sql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				$sql = "SELECT * FROM vcos_title  LIMIT {$criteria->offset}, $pager->pageSize";
				$title = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				break;
			
			case '3' :
				if ($_POST) {
					
					$a = count ( $_POST ['id3s'] );
					$result = train::model ()->count ();
					if ($a == $result) {
						die ( Helper::show_message ( yii::t ( 'vcos', '不能把所有记录删除！' ) ) );
					}
					$ids = implode ( '\',\'', $_POST ['id3s'] );
					// 事务处理
					$transaction = Yii::app ()->db->beginTransaction ();
					try {
						$count = train::model ()->deleteAll ( "train_id  in('$ids')" ); // post_id 为post表主键
						$transaction->commit ();
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ), Yii::app ()->request->urlReferrer );
					} catch ( Exception $e ) {
						$transaction->rollBack ();
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				
				// 单条删除
				if (isset ( $_GET ['id'] )) {
					$id = $_GET ['id']; // 职务表id
					$count = train::model ()->deleteByPk ( $id ); // moder删除方法
					                                              
					// $sql = "DELETE FROM vcos_post WHERE post_id = {$id}";
					                                              // $row = Yii::app ()->db->createCommand ()->delete ( 'vcos_post', "post_id=:post_id", array (
					                                              // ':post_id' => $post_id
					                                              // ) );
					                                              // var_dump ( $row );
					                                              // exit ();
					                                              // exit ();
					                                              
					// $count = Yii::app ()->m_db->createCommand ( $sql );
					
					if ($count) {
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ), Yii::app ()->request->urlReferrer );
					} else {
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				
				// table1
				
				$countsql = "SELECT count(*) as count  FROM vcos_train ";
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				$sql = "SELECT * FROM vcos_train  LIMIT {$criteria->offset}, $pager->pageSize";
				$train = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				
				break;
			
			case '4' :
				
				if ($_POST) {
					
					$a = count ( $_POST ['id4s'] );
					$result = welfare::model ()->count ();
					if ($a == $result) {
						die ( Helper::show_message ( yii::t ( 'vcos', '不能把所有记录删除！' ) ) );
					}
					$ids = implode ( '\',\'', $_POST ['id4s'] );
					// 事务处理
					$transaction = Yii::app ()->db->beginTransaction ();
					try {
						$count = welfare::model ()->deleteAll ( "welfare_id  in('$ids')" ); // post_id 为post表主键
						$transaction->commit ();
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ), Yii::app ()->request->urlReferrer );
					} catch ( Exception $e ) {
						$transaction->rollBack ();
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				
				// 单条删除
				if (isset ( $_GET ['id'] )) {
					$id = $_GET ['id']; // 职务表id
					$count = welfare::model ()->deleteByPk ( $id ); // moder删除方法
					                                                
					// $sql = "DELETE FROM vcos_post WHERE post_id = {$id}";
					                                                // $row = Yii::app ()->db->createCommand ()->delete ( 'vcos_post', "post_id=:post_id", array (
					                                                // ':post_id' => $post_id
					                                                // ) );
					                                                // var_dump ( $row );
					                                                // exit ();
					                                                // exit ();
					                                                
					// $count = Yii::app ()->m_db->createCommand ( $sql );
					
					if ($count) {
						Helper::show_message ( yii::t ( 'vcos', '删除成功。' ), Yii::app ()->request->urlReferrer );
					} else {
						Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
					}
				}
				
				// table1
				
				$countsql = "SELECT count(*) as count  FROM vcos_welfare";
				$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
				$criteria = new CDbCriteria (); // AR的另一种写法
				$total = $count; // 统计总条数
				$pager = new CPagination ( $total );
				$pager->pageSize = 2; // 每页多少条记录
				$pager->applyLimit ( $criteria ); // 进行limit截取
				$sql = "SELECT * FROM vcos_welfare LIMIT {$criteria->offset}, $pager->pageSize";
				$welfare = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
				break;
			
			default :
				
				break;
		}
		
		if (! (isset ( $title )))
			$title = array ();
		if (! (isset ( $train )))
			$train = array ();
		if (! (isset ( $certificate )))
			$certificate = array ();
		if (! (isset ( $welfare )))
			$welfare = array ();
		if (! (isset ( $pager )))
			$pager = null;
		
		$this->render ( 'data_material', array (
				'certificate' => $certificate,
				'pages' => $pager,
				'table_type' => $table_type,
				
				'title' => $title,
				'train' => $train,
				'welfare' => $welfare 
		) );
		
		// table2
		
		// table2
		
		// var_dump ( $certificate );
		// exit ();
	}
	public function actionData_Material_certificate_edit() {
		$this->mytrim ();
		
		$id = (isset ( $_GET ['id'] )) ? $_GET ['id'] : FALSE;
		$certificate_code = (isset ( $_POST ['certificate_code'] )) ? $_POST ['certificate_code'] : FALSE;
		$certificate_type = (isset ( $_POST ['certificate_type'] )) ? $_POST ['certificate_type'] : FALSE;
		$remark = (isset ( $_POST ['remark'] )) ? $_POST ['remark'] : FALSE;
		
		$certificate = certificate::model ()->findByPk ( $id );
		$certificate->certificate_id = $id;
		$certificate->certificate_code = $certificate_code;
		$certificate->certificate_type = $certificate_type;
		$certificate->remark = $remark;
		
		$count = $certificate->save ();
		if ($count > 0) {
			Helper::show_message ( yii::t ( 'vcos', '修改成功。' ), Yii::app ()->createUrl ( "data/data_material" ) );
		} else {
			Helper::show_message ( yii::t ( 'vcos', '修改失败。' ), Yii::app ()->createUrl ( "data/data_material" ) );
		}
	}
	public function actionData_Material_certificate_add() {
		$this->mytrim ();
		$certificate_code = (isset ( $_POST ['certificate_code'] )) ? $_POST ['certificate_code'] : FALSE;
		$certificate_type = (isset ( $_POST ['certificate_type'] )) ? $_POST ['certificate_type'] : FALSE;
		$remark = (isset ( $_POST ['remark'] )) ? $_POST ['remark'] : FALSE;
		
		$certificate = new certificate ();
		$certificate->certificate_code = $certificate_code;
		$certificate->certificate_type = $certificate_type;
		$certificate->remark = $remark;
		
		$count = $certificate->save ();
		if ($count > 0) {
			Helper::show_message ( yii::t ( 'vcos', '添加成功。' ), Yii::app ()->createUrl ( "data/data_material" ) );
		} else {
			Helper::show_message ( yii::t ( 'vcos', '添加失败。' ), Yii::app ()->createUrl ( "data/data_material" ) );
		}
	}
	public function actionData_Material_title_add() {
		$this->mytrim ();
		$title_code = (isset ( $_POST ['title_code'] )) ? $_POST ['title_code'] : FALSE;
		$title_name = (isset ( $_POST ['title_name'] )) ? $_POST ['title_name'] : FALSE;
		$title_level = (isset ( $_POST ['title_level'] )) ? $_POST ['title_level'] : FALSE;
		$remark = (isset ( $_POST ['remark'] )) ? $_POST ['remark'] : FALSE;
		
		$title = new title ();
		
		$title->title_code = $title_code;
		$title->title_name = $title_name;
		$title->title_level = $title_level;
		$title->remark = $remark;
		
		$count = $title->save ();
		if ($count > 0) {
			Helper::show_message ( yii::t ( 'vcos', '修改成功。' ) );
		} else {
			Helper::show_message ( yii::t ( 'vcos', '修改失败。' ) );
		}
	}
	public function actionData_Material_title_edit() {
		$this->mytrim ();
		$id = (isset ( $_GET ['id'] )) ? $_GET ['id'] : FALSE;
		$title_code = (isset ( $_POST ['title_code'] )) ? $_POST ['title_code'] : FALSE;
		$title_name = (isset ( $_POST ['title_name'] )) ? $_POST ['title_name'] : FALSE;
		$title_level = (isset ( $_POST ['title_level'] )) ? $_POST ['title_level'] : FALSE;
		$remark = (isset ( $_POST ['remark'] )) ? $_POST ['remark'] : FALSE;
		
		$title = title::model ()->findByPk ( $id );
		$title->title_id = $id;
		$title->title_code = $title_code;
		$title->title_name = $title_name;
		$title->title_level = $title_level;
		$title->remark = $remark;
		
		$count = $title->save ();
		if ($count > 0) {
			Helper::show_message ( yii::t ( 'vcos', '添加成功。' ) );
		} else {
			Helper::show_message ( yii::t ( 'vcos', '添加失败。' ) );
		}
	}
	public function actionData_Material_train_add() {
		$this->mytrim ();
		$train_code = (isset ( $_POST ['train_code'] )) ? $_POST ['train_code'] : FALSE;
		$train_name = (isset ( $_POST ['train_name'] )) ? $_POST ['train_name'] : FALSE;
		$remark = (isset ( $_POST ['remark'] )) ? $_POST ['remark'] : FALSE;
		$train = new train ();
		
		$train->train_code = $train_code;
		$train->train_name = $train_name;
		$train->remark = $remark;
		
		$count = $train->save ();
		if ($count > 0) {
			Helper::show_message ( yii::t ( 'vcos', '添加成功。' ) );
		} else {
			Helper::show_message ( yii::t ( 'vcos', '修改失败。' ) );
		}
	}
	public function actionData_Material_train_edit() {
		$this->mytrim ();
		$id = (isset ( $_GET ['id'] )) ? $_GET ['id'] : FALSE;
		$train_code = (isset ( $_POST ['train_code'] )) ? $_POST ['train_code'] : FALSE;
		$train_name = (isset ( $_POST ['train_name'] )) ? $_POST ['train_name'] : FALSE;
		$remark = (isset ( $_POST ['remark'] )) ? $_POST ['remark'] : FALSE;
		$train = train::model ()->findByPk ( $id );
		$train->train_id = $id;
		$train->train_code = $train_code;
		$train->train_name = $train_name;
		$train->remark = $remark;
		
		$count = $train->save ();
		if ($count > 0) {
			Helper::show_message ( yii::t ( 'vcos', '修改成功。' ) );
		} else {
			Helper::show_message ( yii::t ( 'vcos', '修改失败。' ) );
		}
	}
	public function actionData_Material_welfare_edit() {
		$this->mytrim ();
		$id = (isset ( $_GET ['id'] )) ? $_GET ['id'] : FALSE;
		$welfare_code = (isset ( $_POST ['welfare_code'] )) ? $_POST ['welfare_code'] : FALSE;
		$welfare_name = (isset ( $_POST ['welfare_name'] )) ? $_POST ['welfare_name'] : FALSE;
		$welfare_status = (isset ( $_POST ['welfare_status'] )) ? $_POST ['welfare_status'] : FALSE;
		$remark = (isset ( $_POST ['remark'] )) ? $_POST ['remark'] : FALSE;
		$welfare = welfare::model ()->findByPk ( $id );
		$welfare->welfare_id = $id;
		$welfare->welfare_code = $welfare_code;
		$welfare->welfare_name = $welfare_name;
		$welfare->welfare_status = $welfare_status;
		$welfare->remark = $remark;
		
		$count = $welfare->save ();
		if ($count > 0) {
			Helper::show_message ( yii::t ( 'vcos', '修改成功。' ) );
		} else {
			Helper::show_message ( yii::t ( 'vcos', '修改失败。' ) );
		}
	}
	public function actionData_Material_welfare_add() {
		$this->mytrim ();
		$welfare_code = (isset ( $_POST ['welfare_code'] )) ? $_POST ['welfare_code'] : FALSE;
		$welfare_name = (isset ( $_POST ['welfare_name'] )) ? $_POST ['welfare_name'] : FALSE;
		$welfare_status = (isset ( $_POST ['welfare_status'] )) ? $_POST ['welfare_status'] : FALSE;
		$remark = (isset ( $_POST ['remark'] )) ? $_POST ['remark'] : FALSE;
		$welfare = new welfare ();
		
		$welfare->welfare_code = $welfare_code;
		$welfare->welfare_name = $welfare_name;
		$welfare->welfare_status = $welfare_status;
		$welfare->remark = $remark;
		
		$count = $welfare->save ();
		if ($count > 0) {
			Helper::show_message ( yii::t ( 'vcos', '修改成功。' ) );
		} else {
			Helper::show_message ( yii::t ( 'vcos', '修改失败。' ) );
		}
	}
	public function actionData_Structure() {
		$Alldepartment = $this->getAlldepartmentname ();
		$this->render ( 'data_structure', array (
				'Alldepartment' => $Alldepartment 
		) );
	}
	/*
	 * 用父$parent_department_id递归找$parent_department_id
	 */
	public function getAlldepartmentname($department_name = "", $parent_department_id = 0, &$data = array ()) {
		$sql = "SELECT  * from  vcos_department  WHERE parent_department_id=$parent_department_id";
		$post = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
		foreach ( $post as $row ) {
			// var_dump ( $post );
			$row ['department_name'] = $department_name . $row ['department_name'];
			$data [] = $row;
			$this->getALLdepartmentname ( $row ['department_name'] . '-', $row ['department_id'], $data );
		}
		
		return $data;
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
	public function getdepartmentnameid_and_name(&$department_name = NULL, $department_id = 0) {
		$sql = "SELECT  * from  vcos_department  WHERE department_id=$department_id";
		$post = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
		foreach ( $post as $row ) {
			
			$department_name = $row ['department_name'] . $department_name;
			$department_name = '-' . $department_name;
			$this->getdepartmentname ( $department_name, $row ['parent_department_id'] );
		}
		return $post;
	}
	public function actionData_Post() {
		$this->mytrim ();
		
		// 多条删除
		if ($_POST) {
			$a = count ( $_POST ['ids'] );
			$result = post::model ()->count ();
			if ($a == $result) {
				die ( Helper::show_message ( yii::t ( 'vcos', '不能把所有记录删除！' ) ) );
			}
			$ids = implode ( '\',\'', $_POST ['ids'] );
			// 事务处理
			$transaction = Yii::app ()->db->beginTransaction ();
			try {
				$count = post::model ()->deleteAll ( "post_id  in('$ids')" ); // post_id 为post表主键
				$transaction->commit ();
				Helper::show_message ( yii::t ( 'vcos', '删除成功。' ), Yii::app ()->createUrl ( "data/data_post" ) );
			} catch ( Exception $e ) {
				$transaction->rollBack ();
				Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
			}
		}
		
		// 单条删除
		if (isset ( $_GET ['id'] )) {
			$id = $_GET ['id']; // 职务表id
			$count = post::model ()->deleteByPk ( $id ); // moder删除方法
			                                             
			// $sql = "DELETE FROM vcos_post WHERE post_id = {$id}";
			                                             // $row = Yii::app ()->db->createCommand ()->delete ( 'vcos_post', "post_id=:post_id", array (
			                                             // ':post_id' => $post_id
			                                             // ) );
			                                             // var_dump ( $row );
			                                             // exit ();
			                                             // exit ();
			                                             // $count = Yii::app ()->m_db->createCommand ( $sql );
			
			if ($count) {
				Helper::show_message ( yii::t ( 'vcos', '删除成功。' ), Yii::app ()->createUrl ( "data/data_post" ) );
			} else {
				Helper::show_message ( yii::t ( 'vcos', '删除失败。' ) );
			}
		}
		
		$countsql = "SELECT count(*) as count  FROM vcos_post as a ,vcos_department as b WHERE a.department_id=b.department_id";
		$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
		
		$criteria = new CDbCriteria (); // AR的另一种写法
		$total = $count; // 统计总条数
		$pager = new CPagination ( $total );
		$pager->pageSize = 2;
		$pager->applyLimit ( $criteria ); // 进行limit截取
		$sql = "SELECT a.*, b.department_name   FROM vcos_post as a ,vcos_department as b WHERE a.department_id=b.department_id LIMIT {$criteria->offset}, $pager->pageSize ";
		$post = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
		$All_department_name = $this->getAlldepartmentname (); // 所有部门的名字
		foreach ( $post as $key => $row ) {
			$name = '';
			// newdepartmentname是部门名称的全路径
			$post [$key] ['newdepartmentname'] = substr ( $this->getdepartmentname ( $name, $row ['department_id'] ), 1 );
		}
		
		$this->render ( 'data_post', array (
				'post' => $post,
				'Alldepartment_name' => $All_department_name,
				'pages' => $pager 
		) );
	}
	public function actionData_Log() {
		$this->mytrim ();
		$operation_time = '';
		$operation_type = '';
		$operation_module = '';
		$Operator = '';
		
		if ($_POST) {
			$operation_time = (isset ( $_POST ['operation_time'] )) ? trim ( $_POST ['operation_time'] ) : '';
			$operation_type = (isset ( $_POST ['operation_type'] )) ? trim ( $_POST ['operation_type'] ) : '';
			$operation_module = (isset ( $_POST ['operation_module'] )) ? trim ( $_POST ['operation_module'] ) : '';
			$Operator = (isset ( $_POST ['Operator'] )) ? trim ( $_POST ['Operator'] ) : '';
		}
		
		$Searchdata = array ();
		$Searchdata ['operation_time'] = $operation_time;
		$Searchdata ['operation_type'] = $operation_type;
		$Searchdata ['operation_module'] = $operation_module;
		$Searchdata ['Operator'] = $Operator;
		$countsql = "SELECT count(*) as count  FROM vcos_employee as a ,vcos_log_management as b WHERE a.employee_code=b.employee_code AND b.operation_module LIKE '%{$operation_module}%' AND b.operation_time LIKE '%{$operation_time}%' AND b.operation_type LIKE '%{$operation_type}%' AND a.cn_name like'%{$Operator}%'  ";
		
		$count = Yii::app ()->getDb ()->createCommand ( $countsql )->queryScalar (); // 结果集的记录条数
		$criteria = new CDbCriteria (); // AR的另一种写法
		$total = $count; // 统计总条数
		$pager = new CPagination ( $total );
		$pager->pageSize = 1; // 每页多少条记录
		$pager->applyLimit ( $criteria ); // 进行limit截取
		$sql = "SELECT a.cn_name, b.* FROM vcos_employee as a ,vcos_log_management as b WHERE a.employee_code=b.employee_code AND b.operation_module LIKE '%{$operation_module}%' AND b.operation_time LIKE '%{$operation_time}%' AND b.operation_type LIKE '%{$operation_type}%' AND a.cn_name like'%{$Operator}%' ";
		
		$sql = $sql . "LIMIT {$criteria->offset}, {$pager->pageSize}";
		
		$log = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
		// var_dump ( $log );
		$this->render ( 'data_log', array (
				'log' => $log,
				'pages' => $pager,
				'Searchdata' => $Searchdata 
		) );
	}
	public function actionData_post_add() {
		$this->mytrim ();
		$department_id = (isset ( $_POST ['department_id'] )) ? $_POST ['department_id'] : FALSE;
		$post_cn_name = (isset ( $_POST ['post_cn_name'] )) ? $_POST ['post_cn_name'] : FALSE;
		$post_en_name = (isset ( $_POST ['post_en_name'] )) ? $_POST ['post_en_name'] : FALSE;
		$remark = (isset ( $_POST ['remark'] )) ? $_POST ['remark'] : FALSE;
		
		$post = new post ();
		$post->department_id = $department_id;
		$post->post_cn_name = $post_cn_name;
		$post->post_en_name = $post_en_name;
		$post->remark = $remark;
		
		$count = $post->save ();
		if ($count > 0) {
			Helper::show_message ( yii::t ( 'vcos', '添加成功。' ), Yii::app ()->createUrl ( "data/data_post" ) );
		} else {
			Helper::show_message ( yii::t ( 'vcos', '添加失败。' ), Yii::app ()->createUrl ( "data/data_post" ) );
		}
	}
	public function actionData_post_edit() {
		$this->mytrim ();
		$id = (isset ( $_GET ['id'] )) ? $_GET ['id'] : FALSE;
		$department_id = (isset ( $_POST ['department_id'] )) ? $_POST ['department_id'] : FALSE;
		$post_cn_name = (isset ( $_POST ['post_cn_name'] )) ? $_POST ['post_cn_name'] : FALSE;
		$post_en_name = (isset ( $_POST ['post_en_name'] )) ? $_POST ['post_en_name'] : FALSE;
		$remark = (isset ( $_POST ['remark'] )) ? $_POST ['remark'] : FALSE;
		
		// 去掉空格
		// $id=trim($id);
		// $department_id=trim($department_id);
		// $post_cn_name=trim($post_cn_name);
		// $post_en_name=trim($post_en_name);
		// $remark=trim($remark);
		
		// 专义，防止js注入
		// $id=htmlspecialchars($id);
		// $department_id=htmlspecialchars($department_id);
		// $post_en_name=htmlspecialchars($post_en_name);
		// $post_cn_name=htmlspecialchars($post_cn_name);
		// $remark=htmlspecialchars($remark);
		
		// 过滤大部分的sql注入
		
		// $id=addslashes($id);
		// $department_id=addslashes($department_id);
		// $post_en_name=addslashes($post_en_name);
		// $post_cn_name=addslashes($post_cn_name);
		// $remark=addslashes($remark);
		
		$post = post::model ()->findByPk ( $id );
		$post->post_id = $id;
		$post->post_cn_name = $post_cn_name;
		$post->post_en_name = $post_en_name;
		$post->remark = $remark;
		$post->department_id = $department_id;
		$count = $post->save ();
		if ($count > 0) {
			Helper::show_message ( yii::t ( 'vcos', '修改成功。' ), Yii::app ()->createUrl ( "data/data_post" ) );
		} else {
			Helper::show_message ( yii::t ( 'vcos', '修改失败。' ), Yii::app ()->createUrl ( "data/data_post" ) );
		}
	}
	public function actionData_Statistics() {
		$this->render ( 'data_statistics' );
	}
	public function actionGet_department() {
		$sql = " SELECT a.* ,(SELECT COUNT(*) FROM vcos_department b WHERE b.parent_department_id = a.department_id) as child FROM vcos_department a WHERE a.parent_department_id ={$_POST['id']} ";
		$menu = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
		$j = 1;
		$a = '';
		$i = count ( $menu );
		foreach ( $menu as $row ) {
			// 先找出父级菜单
			if ($row ['child'] > 0) {
				if ($j < $i) {
					$j ++; // 判断是否最后一个元素
					$a .= '"' . $row ['department_id'] . '":{"text" : "' . yii::t ( 'vcos', $row ['department_name'] ) . '","type" : "folder","additionalParameters":{"id":"' . $row ['department_id'] . '","children":true}},';
				} else {
					$a .= '"' . $row ['department_id'] . '":{"text" : "' . yii::t ( 'vcos', $row ['department_name'] ) . '","type" : "folder","additionalParameters":{"id":"' . $row ['department_id'] . '","children":true}}';
				}
			} else {
				// 子菜单
				if ($j < $i) {
					$j ++; // 判断是否最后一个元素
					$a .= '"' . $row ['department_id'] . '":{"text" : "' . yii::t ( 'vcos', $row ['department_name'] ) . '","type" : "item","additionalParameters":{"id":"' . $row ['department_id'] . '"}},';
				} else {
					$a .= '"' . $row ['department_id'] . '":{"text" : "' . yii::t ( 'vcos', $row ['department_name'] ) . '","type" : "item","additionalParameters":{"id":"' . $row ['department_id'] . '"}}';
				}
			}
		}
		
		$a = '{"status":"OK","data":{' . $a . '}}';
		echo $a;
	}
	public function actionData_Log_export() {
		$this->mytrim ();
		$operation_time = '';
		$operation_type = '';
		$operation_module = '';
		$Operator = '';
		
		if ($_POST) {
			$operation_time = (isset ( $_POST ['operation_time'] )) ? trim ( $_POST ['operation_time'] ) : '';
			$operation_type = (isset ( $_POST ['operation_type'] )) ? trim ( $_POST ['operation_type'] ) : '';
			$operation_module = (isset ( $_POST ['operation_module'] )) ? trim ( $_POST ['operation_module'] ) : '';
			$Operator = (isset ( $_POST ['Operator'] )) ? trim ( $_POST ['Operator'] ) : '';
		}
		
		$logexport = new export ();
		$logexport->log_export ( $Operator, $operation_time, $operation_type, $operation_module );
	}
	public function actionData_structure_getbumen_allpost() {
		$this->mytrim ();
		$department_id = isset ( $_POST ['department_id'] ) ? $_POST ['department_id'] : '3';
		
		$Data = array ();
		// 获取当前部门的部门名称，所有职务不包括子部门
		for($i = 0; $i < 1; $i ++) {
			$Data [] ['department_id'] = $department_id;
			$name = '';
			$department_name = substr ( $this->getdepartmentname ( $name, $department_id ), 1 );
			// var_dump($department_name);
			$sql = "SELECT post_id ,post_cn_name FROM vcos_post WHERE department_id={$department_id} ";
			$data = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
			foreach ( $data as $key => $value ) {
				$Data [$key] = array ();
				$Data [$key] ['department_id'] = $department_id;
				$Data [$key] ['department_quanname'] = $department_name;
				$Data [$key] ['post_id'] = $value ['post_id'];
				$Data [$key] ['post_name'] = $value ['post_cn_name'];
			}
		}
		
		// 获取当前部门的子部门的部门名称，所有职务
		$data1 = $this->getAlldepartmentname ( '', $department_id );
		
		$key1 = 2;
		foreach ( $data1 as $value ) {
			$sql = "SELECT post_id ,post_cn_name FROM vcos_post WHERE department_id={$value['department_id']} ";
			$data = Yii::app ()->m_db->createCommand ( $sql )->queryAll ();
			foreach ( $data as $key => $row ) {
				
				$Data [$key1] = array ();
				$Data [$key1] ['department_id'] = $value ['department_id'];
				$Data [$key1] ['department_quanname'] = $department_name . '-' . $value ['department_name'];
				$Data [$key1] ['post_id'] = $row ['post_id'];
				$Data [$key1] ['post_name'] = $row ['post_cn_name'];
				$key1 ++;
			}
		}
		
		// 获取当前部门的子部门的部门名称，所有职务 结束
		foreach ( $Data as $key => $value ) {
			$len = count ( $Data [$key] );
			break;
		}
		
		if ($len <= 1) {
			foreach ( $Data as $key => $value ) {
				
				$Data [$key] ['department_quanname'] = '';
				$Data [$key] ['post_id'] = '';
				$Data [$key] ['post_name'] = '';
			}
		}
		
		$data = json_encode ( $Data );
		echo $data;
	}
	public function actionData_structure_add() {
		$this->mytrim ();
		$department_name = (isset ( $_POST ['department_name'] )) ? $_POST ['department_name'] : '';
		$is_parentment = (isset ( $_POST ['is_parentment'] )) ? $_POST ['is_parentment'] : '';
		$parent_department_id = (isset ( $_POST ['parent_department_id'] )) ? $_POST ['parent_department_id'] : '';
		
		$remark = (isset ( $_POST ['remark'] )) ? $_POST ['remark'] : '';
		
		if ($department_name == '' && $is_parentment == '' && $parent_department_id == '') {
			Helper::show_message ( yii::t ( 'vcos', '请填写完整数据。' ) );
		}
		
		if ($is_parentment == 'yes') {
			
			$department = new department ();
			
			$department->department_name = $department_name;
			$department->parent_department_id = '0';
			$department->remark = $remark;
			
			$count = $department->save ();
			if ($count > 0) {
				Helper::show_message ( yii::t ( 'vcos', '添加成功。' ) );
			} else {
				Helper::show_message ( yii::t ( 'vcos', '添加失败。' ) );
			}
		} else {
			
			$department = new department ();
			
			$department->department_name = $department_name;
			$department->parent_department_id = $parent_department_id;
			$department->remark = $remark;
			
			$count = $department->save ();
			if ($count > 0) {
				Helper::show_message ( yii::t ( 'vcos', '添加成功。' ) );
			} else {
				Helper::show_message ( yii::t ( 'vcos', '添加失败。' ) );
			}
		}
	}
}