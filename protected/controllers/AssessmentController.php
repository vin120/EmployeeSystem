<?php
header ( "Content-Type:text/html;   charset=utf-8" );
class AssessmentController extends Controller {
	public function actionAssessment_attendance() {
		$db = Yii::app ()->m_db;
		$isdeleteall = isset ( $_POST ['isdeleteall'] ) ? $_POST ['isdeleteall'] : ''; // 判断是否是按全部删除提交过来的
		if ($_POST && ($isdeleteall == 1)) {
			$t = isset ( $_POST ['t'] ) ? $_POST ['t'] : 0;
			$ids = isset ( $_POST ['ids'] ) ? $_POST ['ids'] : '';
			if (! empty ( $ids )) {
				$ids = implode ( '\',\'', $ids );
				$sql1 = "delete from vcos_leave_log where id in('$ids')";
				$transaction = $db->beginTransaction ();
				try {
					$data = $db->createCommand ( $sql1 )->execute ();
					$transaction->commit ();
					Helper::show_message ( "删除成功", "assessment_attendance?t=0" );
				} catch ( Exception $e ) {
					$transaction->rollBack ();
					Helper::show_message ( yii::t ( 'vcos', '删除失败' ), "assessment_attendance?t=0" );
				}
			}
		} elseif ($_POST && ($isdeleteall == 2)) {
			
			$t = isset ( $_POST ['t'] ) ? $_POST ['t'] : 0;
			$ids = isset ( $_POST ['ids'] ) ? $_POST ['ids'] : '';
			if (! empty ( $ids )) {
				$ids = implode ( '\',\'', $ids );
				$sql1 = "delete from vcos_holiday_log where id in('$ids')";
				$transaction = $db->beginTransaction ();
				try {
					$data = $db->createCommand ( $sql1 )->execute ();
					$transaction->commit ();
					Helper::show_message ( "删除成功", "assessment_attendance?t=1" );
				} catch ( Exception $e ) {
					$transaction->rollBack ();
					Helper::show_message ( yii::t ( 'vcos', '删除失败' ), "assessment_attendance?t=1" );
				}
			}
		}
		$depinfo = department::model ()->findAll ();
		$postinfo = post::model ()->findAll ();
		$dateinfo = leave_statistic::model ()->findAll (); // 下拉列表数据
		$leaveinfo = leave::model ()->findAll ();
		$holidayinfo = holiday::model ()->findAll ();
		$nameinfo = employee::model ()->findAll ();
		$t = isset ( $_GET ['t'] ) ? $_GET ['t'] : 0;
		if ($t == 0) {
			$t = isset ( $_POST ['t'] ) ? $_POST ['t'] : 0;
		}
		if ($t == 0) { // 第一个div
			$sql = ' select *,vll.id as id from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id join vcos_leave_log vll on vll.employee_code=ve.employee_code join vcos_leave vl on vl.leave_id=vll.leave_id';
			$count_sql = ' select count(*) as count from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id join vcos_leave_log vll on vll.employee_code=ve.employee_code join vcos_leave vl on vl.leave_id=vll.leave_id';
			$page = isset ( $_POST ['page'] ) ? $_POST ['page'] : 1;
			$seletedata = new seletedata ();
			$data = $seletedata->paging ( $sql, $count_sql, $page, $t );
			$data ['depinfo'] = $depinfo;
			$data ['postinfo'] = $postinfo;
			$data ['leaveinfo'] = $leaveinfo;
			$data ['nameinfo'] = $nameinfo;
			$this->render ( "attendance", $data );
		} elseif ($t == 1) { // 第二个div
			$sql = ' select *,vhl.id as id from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id join vcos_holiday_log vhl on vhl.employee_code=ve.employee_code join vcos_holiday vh on vh.holiday_id=vhl.holiday_id';
			$count_sql = ' select count(*) as count from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id join vcos_holiday_log vhl on vhl.employee_code=ve.employee_code join vcos_holiday vh on vh.holiday_id=vhl.holiday_id';
			$page = isset ( $_POST ['page'] ) ? $_POST ['page'] : 1;
			
			$seletedata = new seletedata ();
			$data = $seletedata->paging ( $sql, $count_sql, $page, $t );
			$data ['depinfo'] = $depinfo;
			$data ['postinfo'] = $postinfo;
			$data ['leaveinfo'] = $leaveinfo;
			$data ['holidayinfo'] = $holidayinfo;
			$data ['nameinfo'] = $nameinfo;
			$this->render ( "attendance", $data );
		} elseif ($t == 2) { // 第三个div
			
			$employee_code = (isset ( $_POST ['employee_code'] )) ? $_POST ['employee_code'] : '';
			$cn_name = (isset ( $_POST ['cn_name'] )) ? $_POST ['cn_name'] : '';
			$department_id = (isset ( $_POST ['department_id'] )) ? $_POST ['department_id'] : '';
			$post_id = (isset ( $_POST ['post_id'] )) ? $_POST ['post_id'] : '';
			$date = (isset ( $_POST ['date'] )) ? $_POST ['date'] : '';
			$sql = ' select * from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id join vcos_certificate_management vcm on vcm.employee_code=ve.employee_code join vcos_certificate vc on vc.certificate_id=vcm.certificate_id join vcos_leave_statistic vls on vls.employee_code=ve.employee_code';
			$count_sql = ' select count(*) as count from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id join vcos_certificate_management vcm on vcm.employee_code=ve.employee_code join vcos_certificate vc on vc.certificate_id=vcm.certificate_id join vcos_leave_statistic vls on vls.employee_code=ve.employee_code';
			$page = isset ( $_POST ['page'] ) ? $_POST ['page'] : 1;
			
			$seletedata = new seletedata ();
			$data = $seletedata->paging ( $sql, $count_sql, $page, $t, $cn_name, $employee_code, $department_id, $post_id, $date );
			$data ['depinfo'] = $depinfo;
			$data ['postinfo'] = $postinfo;
			$data ['leaveinfo'] = $leaveinfo;
			$data ['holidayinfo'] = $holidayinfo;
			$data ['dateinfo'] = $dateinfo;
			$data ['nameinfo'] = $nameinfo;
			$this->render ( "attendance", $data );
		} elseif ($t == 3) { // 第四个div
			$viewName = $this->getAction ()->getId ();
			
			/*
			 * if ($_POST){
			 * $selectdata=new seletedata();
			 * $save_data=$selectdata->uploadfile($viewName);
			 * }
			 */
			if ($_POST) {
				$iswhere = array (
						0 => "employee_code",
						1 => "type",
						2 => "leaveorholiday_id",
						3 => "date_of_start",
						4 => "date_of_end",
						5 => "count_day",
						6 => "remark" 
				);
				$selectdata = new seletedata ();
				$data = $selectdata->inputdata ( $iswhere );
				
				if ($data == '') {
					$this->render ( "attendance", array (
							't' => $t,
							'page' => 1,
							'count' => 1,
							'depinfo' => array (),
							'leaveinfo' => array (),
							'postinfo' => array () 
					) );
				} else {
					try {
						$transaction = $db->beginTransaction ();
						foreach ( $data as $k => $v ) { // 判断输入的exal格式是否按要求
							$g = $k + 1;
							$id = employment_profiles::model ()->find ( "employee_code=:employee_code", [ 
									':employee_code' => $v ['employee_code'] 
							] );
							if (empty ( $id )) {
								Helper::show_message ( "第" . $g . "行没有对应的employee_code" );
								exit ();
							}
							if (empty ( $v ['type'] )) {
								Helper::show_message ( "第" . $g . "行请/休假不能为空" );
								exit ();
							} else if ($v ['type'] != 1 && $v ['type'] != 2) {
								Helper::show_message ( "第" . $g . "行请/休假格式不正确" );
								exit ();
							}
						}
						foreach ( $data as $k => $v ) { // 数据插入
							if ($v ['type'] == 1) {
								$leave_log = $db->createCommand ()->insert ( 'vcos_leave_log', array (
										'employee_code' => $v ['employee_code'],
										'leave_id' => $v ['leaveorholiday_id'],
										'date_of_start' => $v ['date_of_start'],
										'date_of_end' => $v ['date_of_end'],
										'count_day' => $v ['count_day'],
										'remark' => $v ['remark'],
										'status' => '1' 
								) );
							} elseif ($v ['type'] == 2) {
								$holiday_log = $db->createCommand ()->insert ( 'vcos_holiday_log', array (
										'employee_code' => $v ['employee_code'],
										'holiday_id' => $v ['leaveorholiday_id'],
										'date_of_start' => $v ['date_of_start'],
										'date_of_end' => $v ['date_of_end'],
										'count_day' => $v ['count_day'],
										'remark' => $v ['remark'],
										'status' => '1' 
								) );
							}
						}
						$transaction->commit ();
						Helper::show_message ( yii::t ( 'vcos', '操作成功。' ) );
					} catch ( Exception $e ) {
						$transaction->rollBack ();
						Helper::show_message ( yii::t ( 'vcos', '操作失败。' ) );
					}
				}
			} else {
				$this->render ( "attendance", array (
						't' => $t,
						'page' => 1,
						'count' => 1,
						'depinfo' => array (),
						'leaveinfo' => array (),
						'postinfo' => array () 
				) );
			}
		} elseif ($t == 4) { // 第五个div
			$employee_code = (isset ( $_POST ['employee_code'] )) ? $_POST ['employee_code'] : '';
			$cn_name = (isset ( $_POST ['cn_name'] )) ? $_POST ['cn_name'] : '';
			$department_id = (isset ( $_POST ['department_id'] )) ? $_POST ['department_id'] : '';
			$post_id = (isset ( $_POST ['post_id'] )) ? $_POST ['post_id'] : ''; // 搜索框提交过来的数据
			$sql = ' select * from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id join vcos_holiday_management_detail vhmd on vhmd.employee_code=ve.employee_code join vcos_holiday vh on vh.holiday_id=vhmd.holiday_id join vcos_holiday_management vhm on vhm.employee_code=ve.employee_code';
			$count_sql = ' select count(*) as count from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id join vcos_holiday_management_detail vhmd on vhmd.employee_code=ve.employee_code join vcos_holiday vh on vh.holiday_id=vhmd.holiday_id join vcos_holiday_management vhm on vhm.employee_code=ve.employee_code';
			$page = isset ( $_POST ['page'] ) ? $_POST ['page'] : 1;
			
			$seletedata = new seletedata ();
			$data = $seletedata->paging ( $sql, $count_sql, $page, $t, $cn_name, $employee_code, $department_id, $post_id );
			$data ['depinfo'] = $depinfo;
			$data ['postinfo'] = $postinfo;
			$data ['leaveinfo'] = $leaveinfo;
			$data ['holidayinfo'] = $holidayinfo;
			$data ['nameinfo'] = $nameinfo;
			$this->render ( "attendance", $data );
		}
	}
	public function actionAttendanceAdd() {
		$db = Yii::app ()->m_db;
		$employee_code = isset ( $_POST ['employee_code'] ) ? $_POST ['employee_code'] : '';
		$mytype = $_POST ['mytype'];
		$transaction = $db->beginTransaction ();
		if ($employee_code == '') {
			Helper::show_message ( yii::t ( 'vcos', '请选择添加的姓名' ), 'assessment_attendance' );
			exit ();
		}
		if ($mytype == 'leave') {
			
			try {
				$leave_log = $db->createCommand ()->insert ( 'vcos_leave_log', array (
						'employee_code' => $_POST ['employee_code'],
						'leave_id' => $_POST ['leave_id'],
						'date_of_start' => $_POST ['date_of_start'],
						'date_of_end' => $_POST ['date_of_end'],
						'count_day' => $_POST ['count_day'],
						'remark' => $_POST ['remark'] 
				)
				 );
				
				$transaction->commit ();
				Helper::show_message ( yii::t ( 'vcos', '操作成功。' ), 'assessment_attendance' );
			} catch ( Exception $e ) {
				$transaction->rollBack ();
				Helper::show_message ( yii::t ( 'vcos', '操作失败。' ), 'assessment_attendance' );
			}
		} else {
			
			try {
				$holiday_log = $db->createCommand ()->insert ( 'vcos_holiday_log', array (
						'employee_code' => $_POST ['employee_code'],
						'holiday_id' => $_POST ['holiday_id'],
						'date_of_start' => $_POST ['date_of_start'],
						'date_of_end' => $_POST ['date_of_end'],
						'count_day' => $_POST ['count_day'],
						'remark' => $_POST ['remark'] 
				) );
				$transaction->commit ();
				Helper::show_message ( yii::t ( 'vcos', '操作成功。' ), 'assessment_attendance' );
			} catch ( Exception $e ) {
				$transaction->rollBack ();
				Helper::show_message ( yii::t ( 'vcos', '操作失败。' ), 'assessment_attendance' );
			}
		}
	}
	public function actionAttendanceUpdate() {
		$db = Yii::app ()->m_db;
		$del_id = isset ( $_GET ['del_id'] ) ? $_GET ['del_id'] : '';
		$transaction = $db->beginTransaction ();
		if ($del_id != '') {
			$data = explode ( "/", $del_id );
			if ($data [1] == 'leave') { // leave提交过来的数据进行删除
				try {
					$leave_log = $db->createCommand ()->delete ( 'vcos_leave_log', "id=:id", [ 
							':id' => $data [0] 
					] );
					
					$transaction->commit ();
					Helper::show_message ( yii::t ( 'vcos', '操作成功。' ), 'assessment_attendance' );
				} catch ( Exception $e ) {
					$transaction->rollBack ();
					Helper::show_message ( yii::t ( 'vcos', '操作失败。' ), 'assessment_attendance' );
				}
			} elseif ($data [1] == 'holiday') { // holiday提交过来的数据进行删除
				try {
					$holiday_log = $db->createCommand ()->delete ( 'vcos_holiday_log', "id=:id", [ 
							':id' => $data [0] 
					] );
					
					$transaction->commit ();
					Helper::show_message ( yii::t ( 'vcos', '操作成功。' ), 'assessment_attendance' );
				} catch ( Exception $e ) {
					$transaction->rollBack ();
					Helper::show_message ( yii::t ( 'vcos', '操作失败。' ), 'assessment_attendance' );
				}
			} elseif ($data [1] == 'attendance') { // editattendance提交过来的数据进行删除
				try {
					$leave_log = $db->createCommand ()->delete ( 'vcos_leave_log', "id=:id", [ 
							':id' => $data [0] 
					] );
					
					$transaction->commit ();
					Helper::show_message ( yii::t ( 'vcos', '操作成功。' ), "editattendance?employee_code=$employee_code" );
				} catch ( Exception $e ) {
					$transaction->rollBack ();
					Helper::show_message ( yii::t ( 'vcos', '操作失败。' ), "editattendance?employee_code=$employee_code" );
				}
			}
		} elseif ($_POST) {
			if ($_POST ['mytype'] == 'leave') {
				$info = $_POST;
				
				try {
					$leave_log = $db->createCommand ()->update ( 'vcos_leave_log', [ 
							'count_day' => $info ['count_day'],
							'date_of_start' => $info ['date_of_start'],
							'date_of_end' => $info ['date_of_end'],
							'remark' => $info ['remark'],
							'leave_id' => $info ['leave_id'] 
					]
					, "id=:id", [ 
							':id' => $info ['l_id'] 
					] );
					
					$employment_profiles = $db->createCommand ()->update ( 'vcos_employment_profiles', [ 
							'department_id' => $info ['department_id'],
							'post_id' => $info ['post_id'] 
					], "employee_code=:employee_code", [ 
							':employee_code' => $info ['employee_code'] 
					] );
					$transaction->commit ();
					Helper::show_message ( yii::t ( 'vcos', '操作成功。' ), 'assessment_attendance' );
				} catch ( Exception $e ) {
					
					$transaction->rollBack ();
					Helper::show_message ( yii::t ( 'vcos', '操作失败。' ), 'assessment_attendance' );
				}
			} 

			elseif ($_POST ['mytype'] == 'holiday') { /* 休假更新数据 */
				$info = $_POST;
				try {
					$holiday_management_detail = $db->createCommand ()->update ( 'vcos_holiday_log', [ 
							'count_day' => $info ['count_day'],
							'date_of_start' => $info ['date_of_start'],
							'date_of_end' => $info ['date_of_end'],
							'remark' => $info ['remark'],
							'holiday_id' => $info ['holiday_id'] 
					]
					, "id=:id", [ 
							':id' => $info ['h_id'] 
					] );
					
					$employment_profiles = $db->createCommand ()->update ( 'vcos_employment_profiles', [ 
							'department_id' => $info ['department_id'],
							'post_id' => $info ['post_id'] 
					], "employee_code=:employee_code", [ 
							':employee_code' => $info ['employee_code'] 
					] );
					$transaction->commit ();
					
					Helper::show_message ( yii::t ( 'vcos', '操作成功。' ), 'assessment_attendance' );
				} catch ( Exception $e ) {
					
					$transaction->rollBack ();
					Helper::show_message ( yii::t ( 'vcos', '操作失败。' ), 'assessment_attendance' );
				}
			} elseif ($_POST ['mytype'] == 'attendance') {
				$info = $_POST;
				$employee_code = $_POST ['employee_code'];
				try {
					$leave_log = $db->createCommand ()->update ( 'vcos_leave_log', [ 
							'leave_id' => $info ['leave_id'],
							'count_day' => $info ['count_day'],
							'date_of_start' => $info ['date_of_start'],
							'date_of_end' => $info ['date_of_end'],
							'remark' => $info ['remark'] 
					]
					, "id=:id", [ 
							':id' => $info ['id'] 
					] );
					$transaction->commit ();
					
					Helper::show_message ( yii::t ( 'vcos', '操作成功。' ), "editattendance?employee_code=$employee_code" );
				} catch ( Exception $e ) {
					
					$transaction->rollBack ();
					Helper::show_message ( yii::t ( 'vcos', '操作失败。' ), "editattendance?employee_code=$employee_code" );
				}
			}
		}
	}
	/* 假期管理 */
	public function actionEditattendance() {
		$db = Yii::app ()->m_db;
		$isdeleteall = isset ( $_POST ['isdeleteall'] ) ? $_POST ['isdeleteall'] : ''; // 判断是否是按全部删除提交过来的
		if ($_POST && ($isdeleteall == 1)) { // 批量删除
			$employee_code = $_POST ['employee_code'];
			$ids = isset ( $_POST ['ids'] ) ? $_POST ['ids'] : '';
			if (! empty ( $ids )) {
				$ids = implode ( '\',\'', $ids );
				
				$sql1 = "delete from vcos_holiday_log where id in('$ids')";
				
				$transaction = $db->beginTransaction ();
				try {
					$data = $db->createCommand ( $sql1 )->execute ();
					
					$transaction->commit ();
					Helper::show_message ( "删除成功", "editattendance?employee_code=$employee_code" );
				} catch ( Exception $e ) {
					$transaction->rollBack ();
					Helper::show_message ( yii::t ( 'vcos', '删除失败' ), "editattendance?employee_code=$employee_code" );
				}
			}
		}
		$holidayinfo = holiday::model ()->findAll ();
		$employee_code = isset ( $_GET ['employee_code'] ) ? $_GET ['employee_code'] : '';
		if ($employee_code == '') {
			$employee_code = isset ( $_POST ['employee_code'] ) ? $_POST ['employee_code'] : '';
		}
		if ($employee_code != '') {
			$sql = " select *,vhl.id as id  from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id join vcos_holiday_log vhl on vhl.employee_code=ve.employee_code join vcos_holiday vh on vh.holiday_id=vhl.holiday_id where ve.employee_code='$employee_code'";
			$count_sql = " select count(*) as count from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id join vcos_holiday_log vhl on vhl.employee_code=ve.employee_code join vcos_holiday vh on vh.holiday_id=vhl.holiday_id where ve.employee_code='$employee_code'";
			$page = isset ( $_POST ['page'] ) ? $_POST ['page'] : 1;
			$t = 1;
			$seletedata = new seletedata ();
			$data = $seletedata->paging ( $sql, $count_sql, $page, $t );
			$data ['employee_code'] = $employee_code;
			$data ['holidayinfo'] = $holidayinfo;
			$this->render ( "editattendance", $data );
		}
	}
	public function actionEditattendanceUpdate() {
		$db = Yii::app ()->m_db;
		$del_id = isset ( $_GET ['del_id'] ) ? $_GET ['del_id'] : '';
		
		$transaction = $db->beginTransaction ();
		if ($del_id != '') {
			$employee_code = holiday_log::model ()->find ( "id=:id", [ 
					':id' => $del_id 
			] );
			$employee_code = $employee_code ['employee_code'];
			try {
				$holiday_log = $db->createCommand ()->delete ( 'vcos_holiday_log', "id=:id", [ 
						':id' => $del_id 
				] );
				
				$transaction->commit ();
				Helper::show_message ( yii::t ( 'vcos', '操作成功。' ), "editattendance?employee_code=$employee_code" );
			} catch ( Exception $e ) {
				
				$transaction->rollBack ();
				Helper::show_message ( yii::t ( 'vcos', '操作成功。' ), "editattendance?employee_code=$employee_code" );
			}
		} elseif ($_POST) {
			$id = isset ( $_POST ['id'] ) ? $_POST ['id'] : '';
			$info = $_POST;
			if ($id == '') {
				try {
					$holiday_log = $db->createCommand ()->insert ( 'vcos_holiday_log', [ 
							'employee_code' => $info ['employee_code'],
							'holiday_id' => $info ['holiday_id'],
							'count_day' => $info ['count_day'],
							'date_of_start' => $info ['date_of_start'],
							'date_of_end' => $info ['date_of_end'],
							'remark' => $info ['remark'] 
					] );
					$transaction->commit ();
					Helper::show_message ( yii::t ( 'vcos', '操作成功。' ) );
				} catch ( Exception $e ) {
					$transaction->rollBack ();
					Helper::show_message ( yii::t ( 'vcos', '操作失败。' ) );
				}
			} else {
				try {
					
					$holiday_log = $db->createCommand ()->update ( 'vcos_holiday_log', [ 
							'employee_code' => $info ['employee_code'],
							'holiday_id' => $info ['holiday_id'],
							'count_day' => $info ['count_day'],
							'date_of_start' => $info ['date_of_start'],
							'date_of_end' => $info ['date_of_end'],
							'remark' => $info ['remark'] 
					], "id=:id", [ 
							':id' => $info ['id'] 
					] );
					$transaction->commit ();
					Helper::show_message ( yii::t ( 'vcos', '操作成功。' ) );
				} catch ( Exception $e ) {
					$transaction->rollBack ();
					Helper::show_message ( yii::t ( 'vcos', '操作失败。' ) );
				}
			}
		} else {
			Helper::show_message ( yii::t ( 'vcos', '无法执行操作' ), "information_attendance" );
		}
	}
	/* 员工月度考核 */
	public function actionAssessment_month() {
		$db = Yii::app ()->m_db;
		$isdeleteall = isset ( $_POST ['isdeleteall'] ) ? $_POST ['isdeleteall'] : ''; // 判断是否是按全部删除提交过来的
		if ($_POST && ($isdeleteall == 1)) { // 批量删除
			$ids = isset ( $_POST ['ids'] ) ? $_POST ['ids'] : '';
			if (! empty ( $ids )) {
				$ids = implode ( '\',\'', $ids );
				$sql1 = "delete from vcos_month_assessment where id in('$ids')";
				$transaction = $db->beginTransaction ();
				try {
					$data = $db->createCommand ( $sql1 )->execute ();
					
					$transaction->commit ();
					Helper::show_message ( "删除成功", "assessment_month" );
				} catch ( Exception $e ) {
					$transaction->rollBack ();
					Helper::show_message ( yii::t ( 'vcos', '删除失败' ), "assessment_month" );
				}
			}
		}
		$depinfo = department::model ()->findAll ();
		$postinfo = post::model ()->findAll ();
		$dateinfo = leave_statistic::model ()->findAll (); // 下拉列表数据
		$month_assessmentinfo = month_assessment::model ()->findAll ();
		$t = isset ( $_GET ['t'] ) ? $_GET ['t'] : 0;
		if ($t == 0) {
			$t = isset ( $_POST ['t'] ) ? $_POST ['t'] : 0;
		}
		if ($t == 0) { // 第一个div
			$sql = ' select *,vma.id as id from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id join vcos_month_assessment vma on vma.employee_code=ve.employee_code ';
			$count_sql = ' select count(*) as count from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id join vcos_month_assessment vma on vma.employee_code=ve.employee_code ';
			$employee_code = (isset ( $_POST ['employee_code'] )) ? $_POST ['employee_code'] : '';
			$cn_name = (isset ( $_POST ['cn_name'] )) ? $_POST ['cn_name'] : '';
			$department_id = (isset ( $_POST ['department_id'] )) ? $_POST ['department_id'] : ''; // 搜索提交过来的参数
			$post_id = (isset ( $_POST ['post_id'] )) ? $_POST ['post_id'] : '';
			$month_of_assessment = (isset ( $_POST ['month_of_assessment'] )) ? $_POST ['month_of_assessment'] : ''; // 考核月份
			$page = isset ( $_POST ['page'] ) ? $_POST ['page'] : 1;
			if ($month_of_assessment != '') {
				$sql .= " and vma.month_of_assessment = '$month_of_assessment' ";
				$count_sql .= " and vma.month_of_assessment = '$month_of_assessment' ";
			}
			$seletedata = new seletedata ();
			$data = $seletedata->paging ( $sql, $count_sql, $page, $t, $cn_name, $employee_code, $department_id, $post_id );
			$data ['depinfo'] = $depinfo;
			$data ['postinfo'] = $postinfo;
			$data ['month_assessmentinfo'] = $month_assessmentinfo;
			$data ['month_of_assessment'] = $month_of_assessment;
			
			$this->render ( "month", $data );
		} elseif ($t == 1) { // 第二个div
			
			$sql = ' select * from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id join vcos_month_assessment vma on vma.employee_code=ve.employee_code ';
			$count_sql = ' select count(*) as count from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id join vcos_month_assessment vma on vma.employee_code=ve.employee_code ';
			$employee_code = (isset ( $_POST ['employee_code'] )) ? $_POST ['employee_code'] : '';
			$cn_name = (isset ( $_POST ['cn_name'] )) ? $_POST ['cn_name'] : '';
			$department_id = (isset ( $_POST ['department_id'] )) ? $_POST ['department_id'] : ''; // 搜索提交过来的参数
			$post_id = (isset ( $_POST ['post_id'] )) ? $_POST ['post_id'] : '';
			$month_of_assessment = (isset ( $_POST ['month_of_assessment'] )) ? $_POST ['month_of_assessment'] : ''; // 考核月份
			$page = isset ( $_POST ['page'] ) ? $_POST ['page'] : 1;
			if ($month_of_assessment != '') {
				$sql .= " and vma.month_of_assessment = '$month_of_assessment' ";
				$count_sql .= " and vma.month_of_assessment = '$month_of_assessment' ";
			}
			$seletedata = new seletedata ();
			$data = $seletedata->paging ( $sql, $count_sql, $page, $t, $cn_name, $employee_code, $department_id, $post_id );
			$data ['depinfo'] = $depinfo;
			$data ['postinfo'] = $postinfo;
			$data ['month_assessmentinfo'] = $month_assessmentinfo;
			$data ['month_of_assessment'] = $month_of_assessment;
			
			$this->render ( "month", $data );
		} 

		elseif ($t == 2) { // 第三个div
			
			/*
			 * $controllerName= $this->getId();
			 * $viewName= $this->getAction()->getId();
			 */
			$viewName = $this->getAction ()->getId ();
			if ($_POST) {
				$iswhere = array (
						0 => "employee_code",
						1 => "month_of_assessment",
						2 => "score",
						3 => "bonus",
						4 => "remark" 
				);
				$selectdata = new seletedata ();
				$data = $selectdata->inputdata ( $iswhere );
				
				if ($data == '') {
					Helper::show_message ( "表格没数据" );
				} 

				else {
					try {
						
						foreach ( $data as $k => $v ) { // 判断输入的exal格式是否按要求
							$g = $k + 1;
							$id = employment_profiles::model ()->find ( "employee_code=:employee_code", [ 
									':employee_code' => $v ['employee_code'] 
							] );
							if (empty ( $id )) {
								Helper::show_message ( "第" . $g . "行没有对应的员工编号" );
								exit ();
							}
						}
						$transaction = $db->beginTransaction ();
						foreach ( $data as $k => $v ) { // 数据插入
							$month_assessment = $db->createCommand ()->insert ( 'vcos_month_assessment', array (
									'employee_code' => $v ['employee_code'],
									'month_of_assessment' => $v ['month_of_assessment'],
									'score' => $v ['score'],
									'bonus' => $v ['bonus'],
									'remark' => $v ['remark'],
									'status' => '1' 
							) );
						}
						$transaction->commit ();
						Helper::show_message ( yii::t ( 'vcos', '操作成功。' ) );
					} catch ( Exception $e ) {
						$transaction->rollBack ();
						Helper::show_message ( yii::t ( 'vcos', '操作失败。' ) );
					}
				}
			}
			
			$this->render ( "month", array (
					't' => $t,
					'page' => 1,
					'count' => 1,
					'depinfo' => array (),
					'leaveinfo' => array (),
					'postinfo' => array (),
					'month_assessmentinfo' => array () 
			) );
		}
	}
	/* 月份考核插入或更新数据 */
	public function actionMonthUpdate() {
		$db = Yii::app ()->m_db;
		$del_id = isset ( $_GET ['del_id'] ) ? $_GET ['del_id'] : '';
		$transaction = $db->beginTransaction ();
		if ($del_id != '') {
			try {
				$month_assessment = $db->createCommand ()->delete ( 'vcos_month_assessment', "id=:id", [ 
						':id' => $del_id 
				] );
				
				$transaction->commit ();
				Helper::show_message ( yii::t ( 'vcos', '操作成功。' ), 'assessment_month' );
			} catch ( Exception $e ) {
				$transaction->rollBack ();
				Helper::show_message ( yii::t ( 'vcos', '操作失败。' ), 'assessment_month' );
			}
		} elseif ($_POST) {
			$info = $_POST;
			try {
				
				$month_assessment = $db->createCommand ()->update ( 'vcos_month_assessment', [ 
						'month_of_assessment' => $info ['month_of_assessment'],
						'score' => $info ['score'],
						'bonus' => $info ['bonus'],
						'remark' => $info ['remark'] 
				]
				, "employee_code=:employee_code", [ 
						':employee_code' => $info ['employee_code'] 
				] );
				
				$employment_profiles = $db->createCommand ()->update ( 'vcos_employment_profiles', [ 
						'department_id' => $info ['department_id'],
						'post_id' => $info ['post_id'] 
				], "employee_code=:employee_code", [ 
						':employee_code' => $info ['employee_code'] 
				] );
				
				$transaction->commit ();
				
				Helper::show_message ( yii::t ( 'vcos', '操作成功。' ), 'assessment_month' );
			} catch ( Exception $e ) {
				
				$transaction->rollBack ();
				Helper::show_message ( yii::t ( 'vcos', '操作失败。' ), 'assessment_month' );
			}
		}
	}
	/* 季度考核 */
	public function actionAssessment_quarter() {
		$db = Yii::app ()->m_db;
		$isdeleteall = isset ( $_POST ['isdeleteall'] ) ? $_POST ['isdeleteall'] : ''; // 判断是否是按全部删除提交过来的
		if ($_POST && ($isdeleteall == 1)) { // 批量删除
			$ids = isset ( $_POST ['ids'] ) ? $_POST ['ids'] : '';
			if (! empty ( $ids )) {
				$ids = implode ( '\',\'', $ids );
				$sql1 = "delete from vcos_season_assessment where id in('$ids')";
				$transaction = $db->beginTransaction ();
				try {
					$data = $db->createCommand ( $sql1 )->execute ();
					
					$transaction->commit ();
					Helper::show_message ( "删除成功", "assessment_quarter" );
				} catch ( Exception $e ) {
					$transaction->rollBack ();
					Helper::show_message ( yii::t ( 'vcos', '删除失败' ), "assessment_quarter" );
				}
			}
		}
		$depinfo = department::model ()->findAll ();
		$postinfo = post::model ()->findAll ();
		$dateinfo = leave_statistic::model ()->findAll (); // 下拉列表数据
		$season_assessmentinfo = season_assessment::model ()->findAll ();
		$t = isset ( $_GET ['t'] ) ? $_GET ['t'] : 0;
		if ($t == 0) {
			$t = isset ( $_POST ['t'] ) ? $_POST ['t'] : 0;
		}
		
		if ($t == 0) { // 第二个div
			$sql = ' select *,vsa.id from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id join vcos_season_assessment vsa on vsa.employee_code=ve.employee_code ';
			$count_sql = ' select count(*) as count from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id join vcos_season_assessment vsa on vsa.employee_code=ve.employee_code ';
			$employee_code = (isset ( $_POST ['employee_code'] )) ? $_POST ['employee_code'] : '';
			$cn_name = (isset ( $_POST ['cn_name'] )) ? $_POST ['cn_name'] : '';
			$department_id = (isset ( $_POST ['department_id'] )) ? $_POST ['department_id'] : ''; // 搜索提交过来的参数
			$post_id = (isset ( $_POST ['post_id'] )) ? $_POST ['post_id'] : '';
			$season_of_assessment = (isset ( $_POST ['season_of_assessment'] )) ? $_POST ['season_of_assessment'] : ''; // 考核月份
			$page = isset ( $_POST ['page'] ) ? $_POST ['page'] : 1;
			if ($season_of_assessment != '') {
				$sql .= " and vsa.season_of_assessment = '$season_of_assessment' ";
				$count_sql .= " and vsa.season_of_assessment = '$season_of_assessment' ";
			}
			$seletedata = new seletedata ();
			$data = $seletedata->paging ( $sql, $count_sql, $page, $t, $cn_name, $employee_code, $department_id, $post_id );
			$data ['depinfo'] = $depinfo;
			$data ['postinfo'] = $postinfo;
			$data ['season_assessmentinfo'] = $season_assessmentinfo;
			$data ['season_of_assessment'] = $season_of_assessment;
			
			$this->render ( "quarter", $data );
		} elseif ($t == 1) { // 第三个div
			
			$sql = ' select * from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id join vcos_season_assessment vsa on vsa.employee_code=ve.employee_code ';
			$count_sql = ' select count(*) as count from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id join vcos_season_assessment vsa on vsa.employee_code=ve.employee_code ';
			$employee_code = (isset ( $_POST ['employee_code'] )) ? $_POST ['employee_code'] : '';
			$cn_name = (isset ( $_POST ['cn_name'] )) ? $_POST ['cn_name'] : '';
			$department_id = (isset ( $_POST ['department_id'] )) ? $_POST ['department_id'] : ''; // 搜索提交过来的参数
			$post_id = (isset ( $_POST ['post_id'] )) ? $_POST ['post_id'] : '';
			$season_of_assessment = (isset ( $_POST ['season_of_assessment'] )) ? $_POST ['season_of_assessment'] : ''; // 考核月份
			$page = isset ( $_POST ['page'] ) ? $_POST ['page'] : 1;
			if ($season_of_assessment != '') {
				$sql .= " and vsa.season_of_assessment = '$season_of_assessment' ";
				$count_sql .= " and vsa.season_of_assessment = '$season_of_assessment' ";
			}
			$seletedata = new seletedata ();
			$data = $seletedata->paging ( $sql, $count_sql, $page, $t, $cn_name, $employee_code, $department_id, $post_id );
			$data ['depinfo'] = $depinfo;
			$data ['postinfo'] = $postinfo;
			$data ['season_assessmentinfo'] = $season_assessmentinfo;
			$data ['season_of_assessment'] = $season_of_assessment;
			$this->render ( "quarter", $data );
		} elseif ($t == 2) { // 第三个div
			$viewName = $this->getAction ()->getId ();
			if ($_POST) {
				$iswhere = array (
						0 => "employee_code",
						1 => "season_of_assessment",
						2 => "score",
						3 => "bonus",
						4 => "remark" 
				);
				$selectdata = new seletedata ();
				$data = $selectdata->inputdata ( $iswhere );
				
				if ($data == '') {
					Helper::show_message ( "表格没数据" );
				} 

				else {
					try {
						
						foreach ( $data as $k => $v ) { // 判断输入的exal格式是否按要求
							$g = $k + 1;
							$id = employment_profiles::model ()->find ( "employee_code=:employee_code", [ 
									':employee_code' => $v ['employee_code'] 
							] );
							if (empty ( $id )) {
								Helper::show_message ( "第" . $g . "行没有对应的员工编号" );
								exit ();
							}
						}
						$transaction = $db->beginTransaction ();
						foreach ( $data as $k => $v ) { // 数据插入
							$season_assessment = $db->createCommand ()->insert ( 'vcos_season_assessment', array (
									'employee_code' => $v ['employee_code'],
									'season_of_assessment' => $v ['season_of_assessment'],
									'score' => $v ['score'],
									'bonus' => $v ['bonus'],
									'remark' => $v ['remark'],
									'status' => '1' 
							) );
						}
						$transaction->commit ();
						Helper::show_message ( yii::t ( 'vcos', '操作成功。' ) );
					} catch ( Exception $e ) {
						$transaction->rollBack ();
						Helper::show_message ( yii::t ( 'vcos', '操作失败。' ) );
					}
				}
			}
			$this->render ( "quarter", array (
					't' => $t,
					'page' => 1,
					'count' => 1,
					'depinfo' => array (),
					'leaveinfo' => array (),
					'postinfo' => array (),
					'season_assessmentinfo' => array () 
			) );
		}
	}
	
	/* 季度考核插入或更新数据 */
	public function actionSeasonUpdate() {
		$db = Yii::app ()->m_db;
		$del_id = isset ( $_GET ['del_id'] ) ? $_GET ['del_id'] : '';
		$transaction = $db->beginTransaction ();
		if ($del_id != '') {
			try {
				$season_assessment = $db->createCommand ()->delete ( 'vcos_season_assessment', "id=:id", [ 
						':id' => $del_id 
				] );
				
				$transaction->commit ();
				Helper::show_message ( yii::t ( 'vcos', '操作成功。' ), 'assessment_quarter' );
			} catch ( Exception $e ) {
				$transaction->rollBack ();
				Helper::show_message ( yii::t ( 'vcos', '操作失败。' ), 'assessment_quarter' );
			}
		} elseif ($_POST) {
			$info = $_POST;
			try {
				
				$season_assessment = $db->createCommand ()->update ( 'vcos_season_assessment', [ 
						'season_of_assessment' => $info ['season_of_assessment'],
						'score' => $info ['score'],
						'bonus' => $info ['bonus'],
						'remark' => $info ['remark'] 
				]
				, "employee_code=:employee_code", [ 
						':employee_code' => $info ['employee_code'] 
				] );
				
				$employment_profiles = $db->createCommand ()->update ( 'vcos_employment_profiles', [ 
						'department_id' => $info ['department_id'],
						'post_id' => $info ['post_id'] 
				], "employee_code=:employee_code", [ 
						':employee_code' => $info ['employee_code'] 
				] );
				$transaction->commit ();
				
				Helper::show_message ( yii::t ( 'vcos', '操作成功。' ), 'assessment_quarter' );
			} catch ( Exception $e ) {
				
				$transaction->rollBack ();
				Helper::show_message ( yii::t ( 'vcos', '操作失败。' ), 'assessment_quarter' );
			}
		}
	}
	public function actionAdministractdate() {
		$this->render ( "administractdate" );
	}
	public function actionAjaxdata() {
		$db = Yii::app ()->m_db;
		$employee_code = isset ( $_GET ['employee_code'] ) ? $_GET ['employee_code'] : 0;
		
		$leave = " select * from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id join vcos_leave_log vll on vll.employee_code=ve.employee_code join vcos_leave vl on vl.leave_id=vll.leave_id where ve.employee_code='$employee_code'";
		$holiday = " select * from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id join vcos_holiday_log vhl on vhl.employee_code=ve.employee_code join vcos_holiday vh on vh.holiday_id=vhl.holiday_id where ve.employee_code='$employee_code'";
		$leaveajax = $db->createCommand ( $leave )->queryAll ();
		$holidayajax = $db->createCommand ( $holiday )->queryAll ();
		$infosql = " select * from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id  where ve.employee_code='$employee_code'";
		$info = $db->createCommand ( $infosql )->queryAll ();
		
		$data = " <div><span style='font-weight:bold'>员工编号：</span style='font-weight:bold'>$employee_code&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-weight:bold'>姓名：</span>" . $info [0] ['cn_name'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>部门：</span>" . $info [0] ['department_name'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-weight:bold'>职务：</span>" . $info [0] ['post_cn_name'] . "</div>
											<div id='line' style='margin-left: 0px'></div>";
		$data .= "<table class='table table-striped table-bordered table-hover no-margin-bottom no-border-top'>
													<thead>";
		
		$data .= "<tr>
															<th>序号</th>
															<th>缺勤类型</th>
															<th>请/修假类型</th>

															<th>
																开始时间
															</th>
																<th>
															结束时间
															</th>
																<th>
																累积天数
															</th>
																<th>
															备注
															</th>
														</tr>
													</thead>

													<tbody>";
		
		foreach ( $holidayajax as $k => $v ) {
			
			$data .= "<tr>
																	<td>
																$k
															</td>
															<td>休假</td>
															<td>" . $v ['holiday_type'] . "</td>
															<td>" . $v ['date_of_start'] . "</td>
															<td>" . $v ['date_of_end'] . "</td>
															<td>" . $v ['count_day'] . "</td>
															<td>" . $v ['remark'] . "</td>
														</tr>";
		}
		foreach ( $leaveajax as $k => $v ) {
			
			$data .= "<tr>
																	<td>
																	$k
																	</td>
																	<td>请假</td>
																	<td>" . $v ['leave_type'] . "</td>
															<td>" . $v ['date_of_start'] . "</td>
															<td>" . $v ['date_of_end'] . "</td>
															<td>" . $v ['count_day'] . "</td>
															<td>" . $v ['remark'] . "</td>
														</tr>";
		}
		
		$data .= "</tbody></table> ";
		
		echo $data;
	}
	/* 文件下载 */
	public function actionDownfile() {
		// $file_name="cookie.jpg";
		$name = isset ( $_GET ['name'] ) ? $_GET ['name'] : '';
		
		if ($name == '') {
			Helper::show_message ( "下载出错" );
		} else {
			$file_name = iconv ( "utf-8", "gb2312", "$name.xlsx" );
			$file_path = Yii::getPathOfAlias ( 'webroot' ) . "/images/xml/$name.xlsx";
		}
		/*
		 * $file_sub_path=Yii::getPathOfAlias('webroot').'/images/160322001/addfile/';
		 * $file_path=$file_sub_path.$file_name;
		 */
		// 首先要判断给定的文件存在与否
		if (! file_exists ( $file_path )) {
			echo "没有该文件";
			return;
		}
		$fp = fopen ( $file_path, "r" );
		$file_size = filesize ( $file_path );
		// 下载文件需要用到的头
		Header ( "Content-type: application/octet-stream" );
		Header ( "Accept-Ranges: bytes" );
		Header ( "Accept-Length:" . $file_size );
		Header ( "Content-Disposition: attachment; filename=" . $file_name );
		$buffer = 1024;
		$file_count = 0;
		// 向浏览器返回数据
		while ( ! feof ( $fp ) && $file_count < $file_size ) {
			$file_con = fread ( $fp, $buffer );
			$file_count += $buffer;
			echo $file_con;
		}
		fclose ( $fp );
	}
}