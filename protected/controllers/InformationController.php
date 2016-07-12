<?php
header ( "Content-Type:text/html;   charset=utf-8" );
class InformationController extends Controller {
	public function actionInformation_profile() {
		$db = Yii::app ()->m_db;
		$isdeleteall = isset ( $_POST ['isdeleteall'] ) ? $_POST ['isdeleteall'] : ''; // 判断是否是按全部删除提交过来的
		if ($_POST && ($isdeleteall == 1)) {
			$ids = isset ( $_POST ['ids'] ) ? $_POST ['ids'] : '';
			if (! empty ( $ids )) {
				$ids = implode ( '\',\'', $ids );
				$sql1 = "delete from vcos_employee where employee_code in('$ids')";
				$sql2 = "delete from vcos_employment_profiles where employee_code in('$ids')";
				$transaction = $db->beginTransaction ();
				try {
					$data = $db->createCommand ( $sql1 )->execute ();
					$data = $db->createCommand ( $sql2 )->execute ();
					$transaction->commit ();
					Helper::show_message ( "删除成功", "information_profile" );
				} catch ( Exception $e ) {
					$transaction->rollBack ();
					Helper::show_message ( yii::t ( 'vcos', '删除失败' ), "information_profile" );
				}
			}
		}
		
		$sql = " select * from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id ";
		$count_sql = " select count(*) as count from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id ";
		// 分页
		$page = isset ( $_POST ['page'] ) ? $_POST ['page'] : 1;
		$cn_name = (isset ( $_POST ['cn_name'] )) ? $_POST ['cn_name'] : '';
		$employee_code = (isset ( $_POST ['employee_code'] )) ? $_POST ['employee_code'] : '';
		$department_id = (isset ( $_POST ['department_id'] )) ? $_POST ['department_id'] : '';
		$post_id = (isset ( $_POST ['$post_id'] )) ? $_POST ['$post_id'] : '';
		$certificate_id = (isset ( $_POST ['certificate_id'] )) ? $_POST ['certificate_id'] : '';
		$certificate_name = (isset ( $_POST ['certificate_name'] )) ? $_POST ['certificate_name'] : '';
		$certificate_number = (isset ( $_POST ['certificate_number'] )) ? $_POST ['certificate_number'] : '';
		$date_of_end = (isset ( $_POST ['date_of_end'] )) ? $_POST ['date_of_end'] : '';
		$date_of_audit_s = (isset ( $_POST ['date_of_audit_s'] )) ? $_POST ['date_of_audit_s'] : '';
		$date_of_audit_e = (isset ( $_POST ['date_of_audit_e'] )) ? $_POST ['date_of_audit_e'] : '';
		
		$t = isset ( $_GET ['t'] ) ? $_GET ['t'] : 0;
		if ($t == 0) {
			$t = isset ( $_POST ['t'] ) ? $_POST ['t'] : 0;
		}
		if ($t == 0) {
			$seletedata = new seletedata ();
			$data = $seletedata->informationpro ( $sql, $count_sql, $t, $page, $cn_name, $employee_code, $department_id, $post_id, $certificate_id, $certificate_name, $certificate_number, $date_of_end, $date_of_audit_s, $date_of_audit_e );
			$this->render ( "profile", $data );
		} elseif ($t == 1) {
			$sql .= " and vep.employee_status =3";
			$count_sql .= " and vep.employee_status =3 ";
			$seletedata = new seletedata ();
			$data = $seletedata->informationpro ( $sql, $count_sql, $t, $page, $cn_name, $employee_code, $department_id, $post_id, $certificate_id, $certificate_name, $certificate_number, $date_of_end, $date_of_audit_s, $date_of_audit_e );
			$this->render ( "profile", $data );
		}
	}
	public function actionProfileUpdate() {
		$db = Yii::app ()->m_db;
		$del_id = isset ( $_GET ['del_id'] ) ? $_GET ['del_id'] : '';
		$edit_id = isset ( $_GET ['id'] ) ? $_GET ['id'] : '';
		$transaction = $db->beginTransaction ();
		if ($edit_id != '') { // 如果按编辑
			$employee_id = employee::model ()->find ( "employee_code=:employee_code", [ 
					':employee_code' => $edit_id 
			] );
			$employee_id = $employee_id ['employee_id'];
			$this->redirect ( "Information_addfile?employee_id=$employee_id" );
		} elseif ($del_id != '') { // 如果按删除
			try {
				$employment_profiles = $db->createCommand ()->delete ( 'vcos_employment_profiles', "employee_code=:employee_code", [ 
						':employee_code' => $del_id 
				] );
				$employee = $db->createCommand ()->delete ( 'vcos_employee', "employee_code=:employee_code", [ 
						':employee_code' => $del_id 
				] );
				$transaction->commit ();
				Helper::show_message ( yii::t ( 'vcos', '操作成功。' ), 'information_profile' );
			} catch ( Exception $e ) {
				$transaction->rollBack ();
				Helper::show_message ( yii::t ( 'vcos', '操作失败。' ), 'information_profile' );
			}
		}
	}
	public function actionInformation_addfile() {
		$db = Yii::app ()->m_db;
		$certificateinfo = certificate::model ()->findAll ();
		$titleinfo = title::model ()->findAll ();
		$contractinfo = contract::model ()->findAll ();
		$shipinfo = ship::model ()->findAll ();
		$departmentinfo = department::model ()->findAll ();
		$postinfo = post::model ()->findAll ();
		$selete = new seletedata ();
		$data = $selete->mydata ();
		$employee_job_status = $data ['employee_job_status'];
		$politicalstatus = $data ['politicalstatus'];
		$marrystatus = $data ['marrystatus'];
		$healthstatus = $data ['healthstatus'];
		$bloodtype = $data ['bloodtype'];
		$educat = $data ['educat'];
		$cardtype = $data ['cardtype'];
		$employee_type = $data ['employee_type'];
		$employeesource = $data ['employeesource'];
		$employee_status = $data ['employee_status'];
		$country = $data ['country'];
		$nation = $data ['nation'];
		$post = $data ['post'];
		$department = $data ['department'];
		if (isset ( $_GET ['employee_id'] )) {
			$employee_id = $_GET ['employee_id'];
			$sql = "select*from vcos_employee ve join vcos_employment_profiles vp on ve.employee_code=vp.employee_code where employee_id=$employee_id";
			$info = $db->createCommand ( $sql )->queryRow ();
			$info ['employee_code'] = $info ['employee_code'];
			/* 员工证书 */
			$sqlzheng = "select *,vc.id as cid,vc.remark from vcos_employee ve join vcos_certificate_management vc on ve.employee_code=vc.employee_code join vcos_certificate vcer on vcer.certificate_id=vc.certificate_id where ve.employee_id=$employee_id";
			$sqlzhi = "select *,vtm.id as tid,vtm.remark from vcos_employee ve join vcos_title_management vtm on vtm.employee_code=ve.employee_code join vcos_title vt on vt.title_id=vtm.title_id where ve.employee_id=$employee_id";
			$sqlhe = "select *,vcm.id as cid,vcm.remark from vcos_employee ve join vcos_contract_management vcm on vcm.employee_code=ve.employee_code join vcos_contract vc on vc.contract_id=vcm.contract_id where ve.employee_id=$employee_id";
			$sqlqual = "select *,vqm.id,vqm.department_id,vqm.remark from vcos_employee ve join vcos_qualification_management vqm on vqm.employee_code=ve.employee_code join vcos_department vd on vd.department_id=vqm.department_id join vcos_post vp on vp.post_id=vqm.post_id join vcos_ship vs on vs.ship_id=vqm.ship_id  where ve.employee_id=$employee_id";
			/* 员工证书 */
			$sqlcer = $db->createCommand ( $sqlzheng )->queryAll ();
			/* 员工职称 */
			$sqltit = $db->createCommand ( $sqlzhi )->queryAll ();
			/* 员工合同 */
			$sqlcon = $db->createCommand ( $sqlhe )->queryAll ();
			/* 员工资历 */
			$sqlqua = $db->createCommand ( $sqlqual )->queryAll ();
		}
		
		/*
		 * $employee=$db->createCommand()
		 * ->from('vcos_employee')
		 * ->join('tbl_profile p', 'u.id=p.user_id')
		 * ->where('id=:id', array(':id'=>$id))
		 * ->queryRow();
		 */
		$this->render ( "addfile", array (
				
				'employee_job_status' => $employee_job_status,
				'politicalstatus' => $politicalstatus,
				'marrystatus' => $marrystatus,
				'healthstatus' => $healthstatus,
				'bloodtype' => $bloodtype,
				'educat' => $educat,
				'cardtype' => $cardtype,
				'employee_type' => $employee_type,
				'employeesource' => $employeesource,
				'employee_status' => $employee_status,
				'country' => $country,
				'nation' => $nation,
				'post' => $post,
				'department' => $department,
				'info' => isset ( $info ) ? $info : '',
				'employee_id' => isset ( $employee_id ) ? $employee_id : '',
				'sqlcer' => isset ( $sqlcer ) ? $sqlcer : array (),
				'sqltit' => isset ( $sqltit ) ? $sqltit : array (),
				'sqlcon' => isset ( $sqlcon ) ? $sqlcon : array (),
				'sqlqua' => isset ( $sqlqua ) ? $sqlqua : array (),
				'certificateinfo' => $certificateinfo,
				'titleinfo' => $titleinfo,
				'contractinfo' => $contractinfo,
				'shipinfo' => $shipinfo,
				'departmentinfo' => $departmentinfo,
				'postinfo' => $postinfo 
		) );
	}
	public function actionAddUpdate() {
		$db = Yii::app ()->m_db;
		$employee_id = $_POST ['employee_id'];
		$employee_code = $_POST ['employee_code'];
		$mytype = $_POST ['mytype'];
		$transaction = $db->beginTransaction ();
		$insertOrUpdate = $_POST ['insertOrUpdate'];
		if ($insertOrUpdate == 1) { // 判断是更新还是插入
			try {
				if ($mytype == 'certificate') {
					$info = $_POST;
					$certificate_management = $db->createCommand ()->insert ( 'vcos_certificate_management', [ 
							'employee_code' => $info ['employee_code'],
							'certificate_id' => $info ['certificate_id'],
							'certificate_number' => $info ['certificate_number'],
							'certificate_name' => $info ['certificate_name'],
							'training_institutions' => $info ['training_institutions'],
							'issue_organization' => $info ['issue_organization'],
							'issue_official' => $info ['issue_official'],
							'date_of_issue' => $info ['date_of_issue'],
							'date_of_start' => $info ['date_of_start'],
							'date_of_end' => $info ['date_of_end'],
							'date_of_audit' => $info ['date_of_audit'],
							'audit_status' => $info ['audit_status'],
							'remark' => $info ['remark'] 
					] );
				} elseif ($mytype == 'title') {
					$info = $_POST;
					$title_management = $db->createCommand ()->insert ( 'vcos_title_management', [ 
							'employee_code' => $info ['employee_code'],
							'title_id' => $info ['title_id'],
							'title_number' => $info ['title_number'],
							'issue_organization' => $info ['issue_organization'],
							'date_of_issue' => $info ['date_of_issue'],
							'date_of_start' => $info ['date_of_start'],
							'date_of_audit' => $info ['date_of_audit'],
							'audit_status' => $info ['audit_status'],
							'remark' => $info ['remark'] 
					] );
				} elseif ($mytype == 'contract') {
					$info = $_POST;
					$selectdata = new seletedata ();
					$upfile = $selectdata->uploadfile ( "addfile" ); // 文件上传
					$contract_management = $db->createCommand ()->insert ( 'vcos_contract_management', [ 
							'employee_code' => $info ['employee_code'],
							'contract_id' => $info ['contract_id'],
							'contract_number' => $info ['contract_number'],
							'date_of_sign' => $info ['date_of_sign'],
							'date_of_start' => $info ['date_of_start'],
							'date_of_end' => $info ['date_of_end'],
							'remark' => $info ['remark'] 
					]
					 );
				} elseif ($mytype == 'qualification') {
					$info = $_POST;
					$qualification_management = $db->createCommand ()->insert ( 'vcos_qualification_management', [ 
							'employee_code' => $info ['employee_code'],
							'date_of_start' => $info ['date_of_start'],
							'date_of_end' => $info ['date_of_end'],
							'ship_id' => $info ['ship_id'],
							'department_id' => $info ['department_id'],
							'post_id' => $info ['post_id'],
							'remark' => $info ['remark'] 
					]
					 );
				}
				$transaction->commit ();
				Helper::show_message ( yii::t ( 'vcos', '操作成功。' ), "/Information/information_addfile?employee_id=$employee_id" );
			} catch ( Exception $e ) {
				$transaction->rollBack ();
				Helper::show_message ( yii::t ( 'vcos', '操作失败。' ), "/Information/information_addfile?employee_id=$employee_id" );
			}
			
			/* 更新 */
		} else {
			try {
				if ($mytype == 'certificate') {
					$info = $_POST;
					$certificate_management = $db->createCommand ()->update ( 'vcos_certificate_management', [ 
							'certificate_id' => $info ['certificate_id'],
							'certificate_number' => $info ['certificate_number'],
							'certificate_name' => $info ['certificate_name'],
							'training_institutions' => $info ['training_institutions'],
							'issue_organization' => $info ['issue_organization'],
							'issue_official' => $info ['issue_official'],
							'date_of_issue' => $info ['date_of_issue'],
							'date_of_start' => $info ['date_of_start'],
							'date_of_end' => $info ['date_of_end'],
							'date_of_audit' => $info ['date_of_audit'],
							'audit_status' => $info ['audit_status'],
							'remark' => $info ['remark'] 
					], "id=:id", [ 
							':id' => $info ['id'] 
					] );
				} elseif ($mytype == 'title') {
					$info = $_POST;
					$title_management = $db->createCommand ()->update ( 'vcos_title_management', [ 
							'title_id' => $info ['title_id'],
							'title_number' => $info ['title_number'],
							'issue_organization' => $info ['issue_organization'],
							'date_of_issue' => $info ['date_of_issue'],
							'date_of_start' => $info ['date_of_start'],
							'date_of_audit' => $info ['date_of_audit'],
							'audit_status' => $info ['audit_status'],
							'remark' => $info ['remark'] 
					], "id=:id", [ 
							':id' => $info ['id'] 
					] );
				} elseif ($mytype == 'contract') {
					$info = $_POST;
					$selectdata = new seletedata ();
					$upfile = $selectdata->uploadfile ( "addfile" ); // 文件上传
					
					$contract_management = $db->createCommand ()->update ( 'vcos_contract_management', [ 
							'contract_id' => $info ['contract_id'],
							'contract_number' => $info ['contract_number'],
							'date_of_sign' => $info ['date_of_sign'],
							'date_of_start' => $info ['date_of_start'],
							'date_of_end' => $info ['date_of_end'],
							
							'remark' => $info ['remark'] 
					]
					, "id=:id", [ 
							':id' => $info ['id'] 
					] );
				} elseif ($mytype == 'qualification') {
					
					$info = $_POST;
					$qualification_management = $db->createCommand ()->update ( 'vcos_qualification_management', [ 
							'ship_id' => $info ['ship_id'],
							'department_id' => $info ['department_id'],
							'post_id' => $info ['post_id'],
							'date_of_start' => $info ['date_of_start'],
							'date_of_end' => $info ['date_of_end'],
							'remark' => $info ['remark'] 
					], "id=:id", [ 
							':id' => $info ['qid'] 
					] );
				}
				$transaction->commit ();
				Helper::show_message ( yii::t ( 'vcos', '操作成功。' ), "/Information/information_addfile?employee_id=$employee_id" );
			} catch ( Exception $e ) {
				$transaction->rollBack ();
				Helper::show_message ( yii::t ( 'vcos', '操作失败。' ), "/Information/information_addfile?employee_id=$employee_id" );
			}
		}
	}
	public function actionInformation_certificate() {
		$db = Yii::app ()->m_db;
		$depinfo = department::model ()->findAll ();
		$postinfo = post::model ()->findAll ();
		$certificate = certificate_management::model ()->findAll ();
		
		/* 数据分页 */
		$sql = " select *,vcm.id as id from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_certificate_management vcm on vcm.employee_code=ve.employee_code JOIN vcos_certificate vcer on vcm.certificate_id=vcer.certificate_id JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id  JOIN vcos_train_management vtma on vtma.employee_code=ve.employee_code";
		$count_sql = "select count(*) as count from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_certificate_management vcm on vcm.employee_code=ve.employee_code JOIN vcos_certificate vcer on vcm.certificate_id=vcer.certificate_id JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id  JOIN vcos_train_management vtma on vtma.employee_code=ve.employee_code";
		
		// 如果post过来的内容为空，则使用默认值
		$_name = '';
		$_code = '';
		
		$_verification = '-1';
		$_isPage = 1; // 判断是否点击分页按钮(首页,1，2,.. 1:表示点击查询按钮，2表示点击分页按钮)
		              
		// 分页
		$pageSize = 2;
		$page = isset ( $_POST ['page'] ) ? $_POST ['page'] : 1;
		$page_s = $page == 1 ? 0 : ($page - 1) * $pageSize;
		
		// $page = isset($_POST['page']) ? $_POST['page'] == 1 ? 0 : ($_POST['page']-1)*10 : 0;
		$cn_name = (isset ( $_POST ['cn_name'] )) ? $_POST ['cn_name'] : '';
		$employee_code = (isset ( $_POST ['employee_code'] )) ? $_POST ['employee_code'] : '';
		$department_id = (isset ( $_POST ['department_id'] )) ? $_POST ['department_id'] : '';
		$post_id = (isset ( $_POST ['$post_id'] )) ? $_POST ['$post_id'] : '';
		$certificate_id = (isset ( $_POST ['certificate_id'] )) ? $_POST ['certificate_id'] : '';
		$certificate_name = (isset ( $_POST ['certificate_name'] )) ? $_POST ['certificate_name'] : '';
		$certificate_number = (isset ( $_POST ['certificate_number'] )) ? $_POST ['certificate_number'] : '';
		$date_of_end = (isset ( $_POST ['date_of_end'] )) ? $_POST ['date_of_end'] : '';
		$date_of_audit_s = (isset ( $_POST ['date_of_audit_s'] )) ? $_POST ['date_of_audit_s'] : '';
		$date_of_audit_e = (isset ( $_POST ['date_of_audit_e'] )) ? $_POST ['date_of_audit_e'] : '';
		$t = isset ( $_GET ['t'] ) ? $_GET ['t'] : 0; // 识别哪个div
		if ($t == 0) {
			$t = isset ( $_POST ['t'] ) ? $_POST ['t'] : 0;
		}
		if ($_POST) {
			
			/*
			 * SELECT * FROM vcos_member WHERE cn_name LIKE %$member_name% OR last_name LIKE %$member_name% OR first_name LIKE %$member%
			 * AND member_code LIKE %$member_code%
			 * AND sex = $sex
			 * AND member_verification = $member_verification
			 */
			
			$isPage = (isset ( $_POST ['isPage'] )) ? $_POST ['isPage'] : '1';
			
			$_name = $cn_name;
			$_code = $employee_code;
			
			$_isPage = $isPage;
			
			// 如果post的内容不为默认值，拼接字符串进行模糊查询
			$selecedata = new seletedata ();
			$data = $selecedata->selectLike ( $sql, $count_sql, $cn_name, $employee_code, $department_id, $post_id, $certificate_id, $certificate_name, $certificate_number, $date_of_end, $date_of_audit_s, $date_of_audit_e );
			$sql = $data ['sql'];
			$count_sql = $data ['count_sql'];
		}
		
		// 如果是点击查询按钮，重置页码为第一页
		if ($_isPage == '1') {
			$page = 1;
			$page_s = 0;
		}
		
		$count_sql .= " ORDER BY employee_id ASC ";
		$count = $db->createCommand ( $count_sql )->queryRow ();
		
		$count = ceil ( $count ['count'] / $pageSize );
		if ($count == 0) {
			$count = 1;
		}
		$sql .= " ORDER BY employee_id ASC LIMIT $page_s , $pageSize ";
		$posts = $db->createCommand ( $sql )->queryAll ();
		
		// 查找国家对应的中文名字
		$country_sql = "SELECT `country_name` ,`country_short_code` FROM `vcos_country`  ORDER BY country_id ASC";
		$country = Yii::app ()->m_db->createCommand ( $country_sql )->queryAll ();
		
		$this->render ( 'certificate', array (
				'posts' => $posts,
				'count' => $count,
				'name' => $_name,
				'code' => $_code,
				'verification' => $_verification,
				'page' => $page,
				'isPage' => $_isPage,
				'country' => $country,
				'depinfo' => $depinfo,
				'postinfo' => $postinfo,
				'certificate' => $certificate,
				'income' => $posts,
				'employee_code' => $employee_code,
				'cn_name' => $cn_name,
				'department_id' => $department_id,
				'post_id' => $post_id,
				'certificate_id' => $certificate_id,
				'certificate_name' => $certificate_name,
				'certificate_number' => $certificate_number,
				'date_of_end' => $date_of_end,
				'date_of_audit_s' => $date_of_audit_s, // 证书开始时间
				'date_of_audit_e' => $date_of_audit_e, // 证书结束时间
				't' => $t 
		) );
	}
	/* 证书年审 */
	public function actionCertificateoption() {
		$db = Yii::app ()->m_db;
		$t = isset ( $_GET ['t'] ) ? $_GET ['t'] : '';
		$id = isset ( $_GET ['id'] ) ? $_GET ['id'] : '';
		$statustime = date ( "y-m-d", time () ); // 2010-08-29
		if ($id != '') {
			$sql = "select audit_status from vcos_certificate_management where id=$id";
			$audit_status = $db->createCommand ( $sql )->queryAll ();
			if ($audit_status [0] ['audit_status'] == 1) {
				Helper::show_message ( "已年审，不能重复年审", "information_certificate?t=2" );
				exit ();
			}
			
			$transaction = $db->beginTransaction ();
			try {
				$certificate_management = $db->createCommand ()->update ( 'vcos_certificate_management', [ 
						'audit_status' => 1,
						'date_of_audit' => $statustime 
				], "id=:id", [ 
						':id' => $id 
				] );
				
				$transaction->commit ();
				Helper::show_message ( yii::t ( 'vcos', '年审成功。' ), "information_certificate?t=$t" );
			} catch ( Exception $e ) {
				$transaction->rollBack ();
				Helper::show_message ( yii::t ( 'vcos', '年审失败。' ), "information_certificate?t=$t" );
			}
		}
	}
	/* 弹出框递交过来的数据进行数据更新 */
	public function actionCertificate_alert() {
		$db = Yii::app ()->m_db;
		
		if ($_POST) {
			$info = $_POST;
			$transaction = $db->beginTransaction ();
			try {
				
				$certificate_management = $db->createCommand ()->update ( 'vcos_certificate_management', [ 
						'certificate_number' => $info ['certificate_number'],
						'issue_official' => $info ['issue_official'],
						'issue_organization' => $info ['issue_organization'],
						'date_of_issue' => $info ['date_of_issue'],
						'date_of_start' => $info ['date_of_start'],
						'date_of_end' => $info ['date_of_end'] 
				], "id=:id", [ 
						':id' => $info ['cid'] 
				] );
				$train_management = $db->createCommand ()->update ( 'vcos_train_management', [ 
						
						'train_organization' => $info ['train_organization'] 
				], "employee_code=:employee_code", [ 
						':employee_code' => $info ['employee_code'] 
				] );
				$transaction->commit ();
				Helper::show_message ( yii::t ( 'vcos', '操作成功。' ), 'information_certificate' );
			} catch ( Exception $e ) {
				$transaction->rollBack ();
				Helper::show_message ( yii::t ( 'vcos', '操作失败。' ), 'information_certificate' );
			}
		}
	}
	public function actionInformation_title() {
		$db = Yii::app ()->m_db;
		$depinfo = department::model ()->findAll ();
		$postinfo = post::model ()->findAll ();
		$certificate = certificate_management::model ()->findAll ();
		/* 数据分页 */
		$sql = " select * from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_title_management vtm on vtm.employee_code=ve.employee_code JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id  JOIN vcos_title vt on vt.title_id=vtm.title_id ";
		$count_sql = "  select count(*) as count from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_title_management vtm on vtm.employee_code=ve.employee_code JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id  JOIN vcos_title vt on vt.title_id=vtm.title_id ";
		
		// 如果post过来的内容为空，则使用默认值
		$_name = '';
		$_code = '';
		
		$_verification = '-1';
		$_isPage = 1; // 判断是否点击分页按钮(首页,1，2,.. 1:表示点击查询按钮，2表示点击分页按钮)
		              
		// 分页
		$pageSize = 2;
		$page = isset ( $_POST ['page'] ) ? $_POST ['page'] : 1;
		$page_s = $page == 1 ? 0 : ($page - 1) * $pageSize;
		
		// $page = isset($_POST['page']) ? $_POST['page'] == 1 ? 0 : ($_POST['page']-1)*10 : 0;
		$cn_name = (isset ( $_POST ['cn_name'] )) ? $_POST ['cn_name'] : '';
		$employee_code = (isset ( $_POST ['employee_code'] )) ? $_POST ['employee_code'] : '';
		$department_id = (isset ( $_POST ['department_id'] )) ? $_POST ['department_id'] : '';
		$post_id = (isset ( $_POST ['post_id'] )) ? $_POST ['post_id'] : '';
		$certificate_id = (isset ( $_POST ['$certificate_id'] )) ? $_POST ['$certificate_id'] : '';
		$certificate_name = (isset ( $_POST ['certificate_name'] )) ? $_POST ['certificate_name'] : '';
		$certificate_number = (isset ( $_POST ['certificate_number'] )) ? $_POST ['certificate_number'] : '';
		$date_of_end = (isset ( $_POST ['date_of_end'] )) ? $_POST ['date_of_end'] : '';
		$date_of_audit_s = (isset ( $_POST ['date_of_audit_s'] )) ? $_POST ['date_of_audit_s'] : '';
		$date_of_audit_e = (isset ( $_POST ['date_of_audit_e'] )) ? $_POST ['date_of_audit_e'] : '';
		$date_of_audit_st = (isset ( $_POST ['date_of_audit_st'] )) ? $_POST ['date_of_audit_st'] : '';
		$date_of_audit_end = (isset ( $_POST ['date_of_audit_end'] )) ? $_POST ['date_of_audit_end'] : '';
		$date_of_audit_end = (isset ( $_POST ['date_of_audit_end'] )) ? $_POST ['date_of_audit_end'] : '';
		$t = isset ( $_GET ['t'] ) ? $_GET ['t'] : 0; // 识别哪个div
		if ($t == 0) {
			$t = isset ( $_POST ['t'] ) ? $_POST ['t'] : 0;
		}
		
		if ($_POST) {
			
			/*
			 * SELECT * FROM vcos_member WHERE cn_name LIKE %$member_name% OR last_name LIKE %$member_name% OR first_name LIKE %$member%
			 * AND member_code LIKE %$member_code%
			 * AND sex = $sex
			 * AND member_verification = $member_verification
			 */
			
			$isPage = (isset ( $_POST ['isPage'] )) ? $_POST ['isPage'] : '1';
			
			$_isPage = $isPage;
			
			// 如果post的内容不为默认值，拼接字符串进行模糊查询
			$selecedata = new seletedata ();
			$data = $selecedata->selectLike ( $sql, $count_sql, $cn_name, $employee_code, $department_id, $post_id, $certificate_id, $certificate_name, $certificate_number, $date_of_end, $date_of_audit_s, $date_of_audit_e, $date_of_audit_st, $date_of_audit_end );
			$sql = $data ['sql'];
			$count_sql = $data ['count_sql'];
		}
		
		// 如果是点击查询按钮，重置页码为第一页
		if ($_isPage == '1') {
			$page = 1;
			$page_s = 0;
		}
		
		$count = $db->createCommand ( $sql )->queryAll ();
		$count = sizeof ( $count );
		$count = ceil ( $count / $pageSize );
		if ($count == 0) {
			$count = 1;
		}
		$sql .= " ORDER BY employee_id ASC LIMIT $page_s , $pageSize ";
		$posts = $db->createCommand ( $sql )->queryAll ();
		
		// 查找国家对应的中文名字
		
		$this->render ( 'title', array (
				'posts' => $posts,
				'count' => $count,
				'verification' => $_verification,
				'page' => $page,
				'isPage' => $_isPage,
				'depinfo' => $depinfo,
				'postinfo' => $postinfo,
				'certificate' => $certificate,
				'income' => $posts,
				'employee_code' => $employee_code,
				'cn_name' => $cn_name,
				'department_id' => $department_id,
				'post_id' => $post_id,
				'certificate_id' => $certificate_id,
				'certificate_name' => $certificate_name,
				'certificate_number' => $certificate_number,
				'date_of_end' => $date_of_end,
				'date_of_audit_st' => $date_of_audit_st, // 职称开始时间
				'date_of_audit_end' => $date_of_audit_end, // 职称结束时间
				't' => $t 
		) );
	}
	/* 职称年审 */
	public function actionTitleoption() {
		$db = Yii::app ()->m_db;
		$t = isset ( $_GET ['t'] ) ? $_GET ['t'] : '';
		$id = isset ( $_GET ['id'] ) ? $_GET ['id'] : '';
		$statustime = date ( "y-m-d", time () ); // 2010-08-29
		if ($id != '') {
			$sql = "select audit_status from vcos_title_management where id=$id";
			$audit_status = $db->createCommand ( $sql )->queryAll ();
			if ($audit_status [0] ['audit_status'] == 1) {
				Helper::show_message ( "已年审，不能重复年审", "information_title?t=1" );
				exit ();
			}
			$transaction = $db->beginTransaction ();
			try {
				$title_management = $db->createCommand ()->update ( 'vcos_title_management', [ 
						'audit_status' => 1,
						'date_of_audit' => $statustime 
				], "id=:id", [ 
						':id' => $id 
				] );
				
				$transaction->commit ();
				Helper::show_message ( yii::t ( 'vcos', '年审成功。' ), "information_title?t=$t" );
			} catch ( Exception $e ) {
				$transaction->rollBack ();
				Helper::show_message ( yii::t ( 'vcos', '年审失败。' ), "information_title?t=$t" );
			}
		}
	}
	public function actionInformation_contract() {
		$db = Yii::app ()->m_db;
		
		/*
		 * $datetime1 = new DateTime('2002-10-11');
		 * $datetime2 = new DateTime('2009-10-13');
		 * $interval = $datetime1->diff($datetime2);
		 * echo $interval->format('%a');
		 * $db = Yii::app()->m_db; 时间戳
		 */
		/* echo $interval->format('%R%a days'); */
		$db = Yii::app ()->m_db;
		$depinfo = department::model ()->findAll ();
		$postinfo = post::model ()->findAll ();
		$certificate = certificate_management::model ()->findAll ();
		$contractinfo = contract::model ()->findAll ();
		/* 数据分页 */
		
		$sql = " select *,vconm.id from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id  join vcos_contract_management vconm on vconm.employee_code=ve.employee_code join vcos_contract vcon on vcon.contract_id=vconm.contract_id";
		$count_sql = "select count(*) as count from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id  join vcos_contract_management vconm on vconm.employee_code=ve.employee_code join vcos_contract vcon on vcon.contract_id=vconm.contract_id";
		
		// 如果post过来的内容为空，则使用默认值
		$_name = '';
		$_code = '';
		
		$_verification = '-1';
		$_isPage = 1; // 判断是否点击分页按钮(首页,1，2,.. 1:表示点击查询按钮，2表示点击分页按钮)
		              
		// 分页
		$pageSize = 2;
		$page = isset ( $_POST ['page'] ) ? $_POST ['page'] : 1;
		$page_s = $page == 1 ? 0 : ($page - 1) * $pageSize;
		
		// $page = isset($_POST['page']) ? $_POST['page'] == 1 ? 0 : ($_POST['page']-1)*10 : 0;
		$cn_name = (isset ( $_POST ['cn_name'] )) ? $_POST ['cn_name'] : '';
		$employee_code = (isset ( $_POST ['employee_code'] )) ? $_POST ['employee_code'] : '';
		$department_id = (isset ( $_POST ['department_id'] )) ? $_POST ['department_id'] : '';
		$post_id = (isset ( $_POST ['post_id'] )) ? $_POST ['post_id'] : '';
		$certificate_id = (isset ( $_POST ['certificate_id'] )) ? $_POST ['certificate_id'] : '';
		$certificate_name = (isset ( $_POST ['certificate_name'] )) ? $_POST ['certificate_name'] : '';
		$certificate_number = (isset ( $_POST ['certificate_number'] )) ? $_POST ['certificate_number'] : '';
		$date_of_end = (isset ( $_POST ['date_of_end'] )) ? $_POST ['date_of_end'] : '';
		$date_of_audit_s = (isset ( $_POST ['date_of_audit_s'] )) ? $_POST ['date_of_audit_s'] : '';
		$date_of_audit_e = (isset ( $_POST ['date_of_audit_e'] )) ? $_POST ['date_of_audit_e'] : '';
		$contract_number = (isset ( $_POST ['contract_number'] )) ? $_POST ['contract_number'] : '';
		$contract_id = (isset ( $_POST ['contract_id'] )) ? $_POST ['contract_id'] : ''; // 合同类型的id
		$comedate = (isset ( $_POST ['comedate'] )) ? $_POST ['comedate'] : ''; // 到期天数
		$t = isset ( $_GET ['t'] ) ? $_GET ['t'] : 0; // 识别哪个div
		if ($t == 0) {
			$t = isset ( $_POST ['t'] ) ? $_POST ['t'] : 0;
		}
		if ($_POST) {
			
			/*
			 * SELECT * FROM vcos_member WHERE cn_name LIKE %$member_name% OR last_name LIKE %$member_name% OR first_name LIKE %$member%
			 * AND member_code LIKE %$member_code%
			 * AND sex = $sex
			 * AND member_verification = $member_verification
			 */
			
			$isPage = (isset ( $_POST ['isPage'] )) ? $_POST ['isPage'] : '1';
			
			$_name = $cn_name;
			$_code = $employee_code;
			
			$_isPage = $isPage;
			
			// 如果post的内容不为默认值，拼接字符串进行模糊查询
			$selecedata = new seletedata ();
			$data = $selecedata->selectLike ( $sql, $count_sql, $cn_name, $employee_code, $department_id, $post_id, $certificate_id, $certificate_name, $certificate_number, $date_of_end, $date_of_audit_s, $date_of_audit_e, $contract_number, $contract_id );
			$sql = $data ['sql'];
			$count_sql = $data ['count_sql'];
		}
		
		// 如果是点击查询按钮，重置页码为第一页
		if ($_isPage == '1') {
			$page = 1;
			$page_s = 0;
		}
		
		$count = $db->createCommand ( $sql )->queryAll ();
		$count = sizeof ( $count );
		
		$count = ceil ( $count / $pageSize );
		if ($count == 0) {
			$count = 1;
		}
		$sql .= " ORDER BY employee_id ASC LIMIT $page_s , $pageSize ";
		$posts = $db->createCommand ( $sql )->queryAll ();
		
		// 查找国家对应的中文名字
		$country_sql = "SELECT `country_name` ,`country_short_code` FROM `vcos_country`  ORDER BY country_id ASC";
		$country = Yii::app ()->m_db->createCommand ( $country_sql )->queryAll ();
		
		$this->render ( 'contract', array (
				'posts' => $posts,
				'count' => $count,
				'name' => $_name,
				'code' => $_code,
				'verification' => $_verification,
				'page' => $page,
				'isPage' => $_isPage,
				'country' => $country,
				'depinfo' => $depinfo,
				'postinfo' => $postinfo,
				'certificate' => $certificate,
				'income' => $posts,
				'employee_code' => $employee_code,
				'cn_name' => $cn_name,
				'department_id' => $department_id,
				'post_id' => $post_id,
				'certificate_id' => $certificate_id,
				'certificate_name' => $certificate_name,
				'certificate_number' => $certificate_number,
				'date_of_end' => $date_of_end,
				'date_of_audit_s' => $date_of_audit_s, // 证书开始时间
				'date_of_audit_e' => $date_of_audit_e, // 证书结束时间
				'contractinfo' => $contractinfo, // 合同信息
				'contract_number' => $contract_number,
				'contract_id' => $contract_id,
				'comedate' => $comedate, // 到期天数
				't' => $t 
		) );
	}
	/* contract试图中弹出框的数据更新 */
	public function actionContractUpdate() {
		$db = Yii::app ()->m_db;
		
		if ($_POST) {
			$info = $_POST;
			$transaction = $db->beginTransaction ();
			try {
				
				$contract_management = $db->createCommand ()->update ( 'vcos_contract_management', [ 
						'contract_id' => $info ['contract_id'],
						'contract_number' => $info ['contract_number'],
						'date_of_start' => $info ['date_of_start'],
						'date_of_end' => $info ['date_of_end'],
						'date_of_sign' => $info ['date_of_sign'],
						'remark' => $info ['remark'] 
				]
				, "id=:id", [ 
						':id' => $info ['cid'] 
				] );
				
				$transaction->commit ();
				Helper::show_message ( yii::t ( 'vcos', '操作成功。' ), 'information_contract?t=1' );
			} catch ( Exception $e ) {
				$transaction->rollBack ();
				Helper::show_message ( yii::t ( 'vcos', '操作失败。' ), 'information_contract?t=1' );
			}
		}
	}
	public function actionInformation_train() {
		$db = Yii::app ()->m_db;
		$isdeleteall = isset ( $_POST ['isdeleteall'] ) ? $_POST ['isdeleteall'] : ''; // 判断是否是按全部删除提交过来的
		if ($_POST && ($isdeleteall == 1)) { // 批量删除
			$ids = isset ( $_POST ['ids'] ) ? $_POST ['ids'] : '';
			if (! empty ( $ids )) {
				$ids = implode ( '\',\'', $ids );
				
				$sql1 = "delete from vcos_train_management where id in('$ids')";
				
				$transaction = $db->beginTransaction ();
				try {
					$data = $db->createCommand ( $sql1 )->execute ();
					
					$transaction->commit ();
					Helper::show_message ( "删除成功", "information_train" );
				} catch ( Exception $e ) {
					$transaction->rollBack ();
					Helper::show_message ( yii::t ( 'vcos', '删除失败' ), "information_train" );
				}
			}
		}
		$depinfo = department::model ()->findAll ();
		$postinfo = post::model ()->findAll ();
		$certificate = certificate_management::model ()->findAll ();
		$traininfo = train::model ()->findAll ();
		$nameinfo = employee::model ()->findAll ();
		/* 数据分页 */
		$sql = " select *,vtrm.id as id from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id  join vcos_train_management vtrm on vtrm.employee_code=ve.employee_code join vcos_train vtra on vtra.train_id=vtrm.train_id";
		$count_sql = " select count(*) as count from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id  join vcos_train_management vtrm on vtrm.employee_code=ve.employee_code join vcos_train vtra on vtra.train_id=vtrm.train_id";
		
		// 如果post过来的内容为空，则使用默认值
		$_name = '';
		$_code = '';
		
		$_verification = '-1';
		$_isPage = 1; // 判断是否点击分页按钮(首页,1，2,.. 1:表示点击查询按钮，2表示点击分页按钮)
		              
		// 分页
		$pageSize = 2;
		$page = isset ( $_POST ['page'] ) ? $_POST ['page'] : 1;
		$page_s = $page == 1 ? 0 : ($page - 1) * $pageSize;
		
		// $page = isset($_POST['page']) ? $_POST['page'] == 1 ? 0 : ($_POST['page']-1)*10 : 0;
		$cn_name = (isset ( $_POST ['cn_name'] )) ? $_POST ['cn_name'] : '';
		$employee_code = (isset ( $_POST ['employee_code'] )) ? $_POST ['employee_code'] : '';
		$department_id = (isset ( $_POST ['department_id'] )) ? $_POST ['department_id'] : '';
		$post_id = (isset ( $_POST ['post_id'] )) ? $_POST ['post_id'] : '';
		$certificate_id = (isset ( $_POST ['certificate_id'] )) ? $_POST ['certificate_id'] : '';
		$certificate_name = (isset ( $_POST ['certificate_name'] )) ? $_POST ['certificate_name'] : '';
		$certificate_number = (isset ( $_POST ['certificate_number'] )) ? $_POST ['certificate_number'] : '';
		$date_of_end = (isset ( $_POST ['date_of_end'] )) ? $_POST ['date_of_end'] : '';
		$date_of_audit_s = (isset ( $_POST ['date_of_audit_s'] )) ? $_POST ['date_of_audit_s'] : '';
		$date_of_audit_e = (isset ( $_POST ['date_of_audit_e'] )) ? $_POST ['date_of_audit_e'] : '';
		$date_of_audit_st = (isset ( $_POST ['date_of_audit_st'] )) ? $_POST ['date_of_audit_st'] : '';
		$date_of_audit_end = (isset ( $_POST ['date_of_audit_end'] )) ? $_POST ['date_of_audit_end'] : '';
		$date_of_audit_end = (isset ( $_POST ['date_of_audit_end'] )) ? $_POST ['date_of_audit_end'] : '';
		$train_id = (isset ( $_POST ['train_id'] )) ? $_POST ['train_id'] : '';
		$t = isset ( $_GET ['t'] ) ? $_GET ['t'] : 0; // 识别哪个div
		if ($t == 0) {
			$t = isset ( $_POST ['t'] ) ? $_POST ['t'] : 0;
		}
		
		if ($_POST) {
			
			/*
			 * SELECT * FROM vcos_member WHERE cn_name LIKE %$member_name% OR last_name LIKE %$member_name% OR first_name LIKE %$member%
			 * AND member_code LIKE %$member_code%
			 * AND sex = $sex
			 * AND member_verification = $member_verification
			 */
			
			$isPage = (isset ( $_POST ['isPage'] )) ? $_POST ['isPage'] : '1';
			
			$_isPage = $isPage;
			
			// 如果post的内容不为默认值，拼接字符串进行模糊查询
			$selecedata = new seletedata ();
			$data = $selecedata->selectLike ( $sql, $count_sql, $cn_name, $employee_code, $department_id, $post_id, $certificate_id, $certificate_name, $certificate_number, $date_of_end, $date_of_audit_s, $date_of_audit_e, $date_of_audit_st, $date_of_audit_end );
			$sql = $data ['sql'];
			$count_sql = $data ['count_sql'];
			
			if ($train_id != '') {
				$sql .= " and vtrm.train_id = '$train_id' ";
				$count_sql .= " and vtrm.train_id = '$train_id' ";
			}
		}
		
		// 如果是点击查询按钮，重置页码为第一页
		if ($_isPage == '1') {
			$page = 1;
			$page_s = 0;
		}
		
		$count = $db->createCommand ( $sql )->queryAll ();
		$count = sizeof ( $count );
		$count = ceil ( $count / $pageSize );
		if ($count == 0) {
			$count = 1;
		}
		$sql .= " ORDER BY employee_id ASC LIMIT $page_s , $pageSize ";
		$posts = $db->createCommand ( $sql )->queryAll ();
		
		// 查找国家对应的中文名字
		
		$this->render ( 'train', array (
				'posts' => $posts,
				'count' => $count,
				'verification' => $_verification,
				'page' => $page,
				'isPage' => $_isPage,
				'depinfo' => $depinfo,
				'postinfo' => $postinfo,
				'certificate' => $certificate,
				'income' => $posts,
				'employee_code' => $employee_code,
				'cn_name' => $cn_name,
				'department_id' => $department_id,
				'post_id' => $post_id,
				'certificate_id' => $certificate_id,
				'certificate_name' => $certificate_name,
				'certificate_number' => $certificate_number,
				'date_of_end' => $date_of_end,
				'date_of_audit_st' => $date_of_audit_st, // 职称开始时间
				'date_of_audit_end' => $date_of_audit_end, // 职称结束时间
				'traininfo' => $traininfo,
				'train_id' => $train_id,
				'nameinfo' => $nameinfo,
				't' => $t 
		) );
	}
	public function actionTrainAdd() {
		$db = Yii::app ()->m_db;
		$employee_code = isset ( $_POST ['employee_code'] ) ? $_POST ['employee_code'] : '';
		if ($employee_code == '') {
			Helper::show_message ( yii::t ( 'vcos', '请选择添加的姓名' ), 'information_train' );
		} else {
			$transaction = $db->beginTransaction ();
			
			try {
				$train_management = $db->createCommand ()->insert ( 'vcos_train_management', array (
						'employee_code' => $_POST ['employee_code'],
						'train_id' => $_POST ['train_id'],
						'date_of_train' => $_POST ['date_of_train'],
						'train_organization' => $_POST ['train_organization'],
						'train_content' => $_POST ['train_content'],
						'train_effect' => $_POST ['train_effect'] 
				)
				 );
				
				$transaction->commit ();
				Helper::show_message ( yii::t ( 'vcos', '操作成功。' ) );
			} catch ( Exception $e ) {
				$transaction->rollBack ();
				Helper::show_message ( yii::t ( 'vcos', '操作失败。' ) );
			}
		}
	}
	public function actionTrainUpdate() {
		$db = Yii::app ()->m_db;
		$del_id = isset ( $_GET ['del_id'] ) ? $_GET ['del_id'] : '';
		$transaction = $db->beginTransaction ();
		if ($del_id != '') {
			try {
				$train_management = $db->createCommand ()->delete ( 'vcos_train_management', "id=:id", [ 
						':id' => $del_id 
				] );
				$transaction->commit ();
				Helper::show_message ( yii::t ( 'vcos', '操作成功。' ), 'information_train' );
			} catch ( Exception $e ) {
				$transaction->rollBack ();
				Helper::show_message ( yii::t ( 'vcos', '操作失败。' ), 'information_train' );
			}
		} elseif ($_POST) {
			
			$info = $_POST;
			
			try {
				
				$train_management = $db->createCommand ()->update ( 'vcos_train_management', [ 
						'date_of_train' => $info ['date_of_train'],
						'train_id' => $info ['train_id'],
						'train_organization' => $info ['train_organization'],
						'train_content' => $info ['train_content'],
						'train_effect' => $info ['train_effect'] 
				], "id=:id", [ 
						':id' => $info ['tid'] 
				] );
				
				$transaction->commit ();
				Helper::show_message ( yii::t ( 'vcos', '操作成功。' ), 'information_train' );
			} catch ( Exception $e ) {
				$transaction->rollBack ();
				Helper::show_message ( yii::t ( 'vcos', '操作失败。' ), 'information_train' );
			}
		}
	}
	/* addfile中的删除 */
	public function actionAddDelete() {
		$db = Yii::app ()->m_db;
		$del_code = isset ( $_GET ['del_id'] ) ? $_GET ['del_id'] : '';
		$del_id = explode ( "/", $del_code );
		
		$transaction = $db->beginTransaction ();
		if ($del_code != '') {
			
			try {
				if ($del_id [1] == 'certificate') {
					$certificate_management = $db->createCommand ()->delete ( 'vcos_certificate_management', "id=:id", [ 
							':id' => $del_id [0] 
					] );
				} elseif ($del_id [1] == 'title') {
					$title_management = $db->createCommand ()->delete ( 'vcos_title_management', "id=:id", [ 
							':id' => $del_id [0] 
					] );
				} elseif ($del_id [1] == 'contract') {
					$contract_management = $db->createCommand ()->delete ( 'vcos_contract_management', "id=:id", [ 
							':id' => $del_id [0] 
					] );
				} elseif ($del_id [1] == 'qualification') {
					$contract_management = $db->createCommand ()->delete ( 'vcos_qualification_management', "id=:id", [ 
							':id' => $del_id [0] 
					] );
				}
				$transaction->commit ();
				Helper::show_message ( yii::t ( 'vcos', '操作成功。' ) );
			} catch ( Exception $e ) {
				$transaction->rollBack ();
				Helper::show_message ( yii::t ( 'vcos', '操作失败。' ) );
			}
		}
	}
	/* addfile页面中的保存上数据 */
	public function actionAddsave() {
		$db = Yii::app ()->m_db;
		$data ['employee_card_number'] = $_POST ['employee_card_number'];
		$data ['employee_status'] = $_POST ['employee_status'];
		$data ['cn_name'] = $_POST ['cn_name'];
		$data ['first_name'] = $_POST ['first_name'];
		$data ['last_name'] = $_POST ['last_name'];
		$data ['country_code'] = $_POST ['country_code'];
		$data ['nation_code'] = $_POST ['nation_code'];
		$data ['political_status'] = $_POST ['political_status'];
		$data ['sex'] = $_POST ['sex'];
		$data ['date_of_birth'] = $_POST ['date_of_birth'];
		$data ['birth_place'] = $_POST ['birth_place'];
		$data ['card_type'] = $_POST ['card_type'];
		$data ['resident_id_card'] = $_POST ['resident_id_card'];
		
		$data ['marry_status'] = $_POST ['marry_status'];
		$data ['health_status'] = $_POST ['health_status'];
		$data ['height'] = $_POST ['height'];
		$data ['weight'] = $_POST ['weight'];
		$data ['shoe_size'] = $_POST ['shoe_size'];
		$data ['blood_type'] = $_POST ['blood_type'];
		$data ['working_life'] = $_POST ['working_life'];
		$data ['major'] = $_POST ['major'];
		$data ['education'] = $_POST ['education'];
		$data ['foreign_language'] = $_POST ['foreign_language'];
		$data ['mailing_address'] = $_POST ['mailing_address'];
		$data ['dormitory_num'] = $_POST ['dormitory_num'];
		$data ['telephone_num'] = $_POST ['telephone_num'];
		$data ['mobile_num'] = $_POST ['mobile_num'];
		$data ['emergency_contact'] = $_POST ['emergency_contact'];
		
		$data ['emergency_contact_phone'] = $_POST ['emergency_contact_phone'];
		
		/* employee表数据封装 */
		
		$data_p ['department_id'] = $_POST ['department_id'];
		$data_p ['post_id'] = $_POST ['post_id'];
		$data_p ['employee_type'] = $_POST ['employee_type'];
		$data_p ['employee_source'] = $_POST ['employee_source'];
		$data_p ['employee_status'] = $_POST ['employee_status'];
		$data_p ['bank_name'] = $_POST ['bank_name'];
		$data_p ['bank_card_number'] = $_POST ['bank_card_number'];
		$data_p ['date_of_entry'] = $_POST ['date_of_entry'];
		$data_p ['date_of_positive'] = $_POST ['date_of_positive'];
		$data_p ['date_of_departure'] = $_POST ['date_of_departure'];
		/* employment_profiles表数据封装 */
		$transaction = $db->beginTransaction ();
		try {
			/* 文件上传 */
			
			if (empty ( $_POST ['employee_id'] )) {
				$data ['employee_code'] = mb_substr ( $data_p ['department_id'], 0, 2, 'utf-8' ) . strtotime ( $data_p ['date_of_entry'] ) . mt_rand ( 100, 999 );
				$data_p ['employee_code'] = $data ['employee_code'];
				$res = $db->createCommand ()->insert ( "vcos_employee", $data );
				$res = $db->createCommand ()->insert ( "vcos_employment_profiles", $data_p );
			} else {
				$res = $db->createCommand ()->update ( "vcos_employee", $data, "employee_code=:employee_code", [ 
						':employee_code' => $_POST ['employee_code'] 
				] );
				$res = $db->createCommand ()->update ( "vcos_employment_profiles", $data_p, "employee_code=:employee_code", [ 
						':employee_code' => $_POST ['employee_code'] 
				] );
			}
			$transaction->commit ();
			Helper::show_message ( yii::t ( 'vcos', '操作成功。' ) );
		} catch ( Exception $e ) {
			$transaction->rollBack ();
			Helper::show_message ( yii::t ( 'vcos', '操作失败。' ) );
		}
	}
	/* 文件 */
	public function actionDownfile() {
		header ( "Content-type:text/html;charset=utf-8" );
		// $file_name="cookie.jpg";
		$id = isset ( $_GET ['id'] ) ? $_GET ['id'] : '';
		
		if ($id != '') {
			
			$sql = "select * from vcos_file_path where id=$id";
			$data = Yii::app ()->db->createCommand ( $sql )->queryAll ();
			$file_name = $data [0] ['filename'];
			// 用以解决中文不能显示出来的问题
			$file_name = iconv ( "utf-8", "gb2312", $file_name );
			$file_path = Yii::getPathOfAlias ( 'webroot' ) . $data [0] ['path'];
			/*
			 * $file_sub_path=Yii::getPathOfAlias('webroot').'/images/160322001/addfile/';
			 * $file_path=$file_sub_path.$file_name;
			 */
			// 首先要判断给定的文件存在与否
			if (! file_exists ( $file_path )) {
				echo "没有该文件文件";
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
	/* 附件操作 */
	public function actionAttachment() {
		$db = Yii::app ()->m_db;
		$id = isset ( $_GET ['del_id'] ) ? $_GET ['del_id'] : '';
		$transaction = $db->beginTransaction ();
		try {
			$res = $db->createCommand ()->delete ( "vcos_file_path", "id=:id", [ 
					':id' => $id 
			] );
			$transaction->commit ();
			Helper::show_message ( yii::t ( 'vcos', '操作成功。' ) );
		} catch ( Exception $e ) {
			$transaction->rollBack ();
			Helper::show_message ( yii::t ( 'vcos', '操作失败。' ) );
		}
	}
	public function ActionAa() {
		$model = new UppicForm ();
		$image = CUploadedFile::getInstance ( $model, 'avatar' );
		if (is_object ( $image ) && get_class ( $image ) === 'CUploadedFile') {
			$model->avatar = '1' . '.jpg';
		} else {
			$model->avatar = 'NoPic.jpg';
		}
		if ($model->save ()) {
			if (is_object ( $image ) && get_class ( $image ) === 'CUploadedFile') {
				$image->saveAs ( Yii::getPathOfAlias ( 'webroot' ) . '/images/' . $model->avatar );
			}
			$this->render ( 'aa', array (
					'model' => $model 
			) );
		}
	}
	public function actionFujiantable() {
		$employee_code = $_GET ['employee_code'];
		$sql = "select * from vcos_file_path where employee_code='$employee_code'";
		$filepath = Yii::app ()->db->createCommand ( $sql )->queryAll ();
		$fujiandiv = "<table width='549' border='1'>
  <tr>
    <td width='56'>序号</td>
    <td width='376'>标题</td>
    <td width='95'>操作</td>
  </tr>";
		foreach ( $filepath as $k => $v ) {
			$r = $k + 1;
			$fujiandiv .= "<tr align='center'>
		<td>" . $r . "</td>
		    <td>" . yii::t ( 'vcos', $v ['filename'] ) . "</td>
		    <td>	<a type='button' class='btn btn-xs btn-danger'  href='downfile?id=" . $v ['id'] . "' >
			" . yii::t ( 'vcos', ' 下载' ) . "
			<i class='icon-arrow-right icon-on-right bigger-110'></i>
			</a>                                                   
			&nbsp; &nbsp; &nbsp;
			<a type='button' class='btn btn-xs btn-danger'  id='fujiandelete'  href=/information/attachment?del_id=" . $v ['id'] . " >
			" . yii::t ( 'vcos', ' 删除' ) . "
			<i class='icon-arrow-right icon-on-right bigger-110'></i>
			</a>
			 </td>
		  </tr>";
		}
		$fujiandiv .= "</table>";
		echo $fujiandiv;
	}
	public function actionAjaxtrain() {
		$employee_code = $_GET ['employee_code'];
		echo $employee_code;
	}
}