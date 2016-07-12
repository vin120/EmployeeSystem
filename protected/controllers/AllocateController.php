<?php
header ( "Content-Type:text/html;   charset=utf-8" );
class AllocateController extends Controller {
	public function actionAllocate_allocate() {
		$db = Yii::app ()->m_db;
		$t = isset ( $_GET ['t'] ) ? $_GET ['t'] : 0;
		if ($t == 0) {
			$t = isset ( $_POST ['t'] ) ? $_POST ['t'] : 0;
		}
		if ($t == 0) {
			$sql = "select * from vcos_ship";
			$count_sql = "select count(*) as count from vcos_ship";
			$page = isset ( $_POST ['page'] ) ? $_POST ['page'] : 1;
			
			$seletedata = new seletedata ();
			$data = $seletedata->paging ( $sql, $count_sql, $page, $t );
			$this->render ( "allocate", array (
					'data' => $data 
			) );
		} 		/*
		 * elseif ($t==1){
		 * $shipinfo=ship::model()->findAll();
		 * $sql="select * from vcos_ship";
		 * $count_sql="select count(*) as count from vcos_ship";
		 * $page=isset($_POST['page'])?$_POST['page']:1;
		 * $ship_id = (isset($_POST['ship_id'])) ? $_POST['ship_id'] : '';
		 * if($ship_id != '')
		 * {
		 * $sql .= " and vcon.contract_id <= '$ship_id' ";
		 * $count_sql .= " and vcon.contract_id <= '$ship_id' ";
		 *
		 * }
		 * $seletedata=new seletedata();
		 * $data=$seletedata->paging($sql, $count_sql, $page, $t);
		 * $data['shipinfo']=$shipinfo;
		 * $this->render("allocate",$data);
		 * }
		 */
		else {
			$data ['page'] = 1;
			$data ['count'] = 1;
			$data ['t'] = $t;
			$this->render ( "allocate", array (
					'data' => $data 
			) );
		}
	}
	public function actionShipList() {
		$this->render ( "shipList" );
	}
	public function actionAllocate_list() {
		$this->render ( "list" );
	}
	public function actionAllocate_dynamic() {
		$depinfo = department::model ()->findAll ();
		$postinfo = post::model ()->findAll ();
		$shipinfo = ship::model ()->findAll ();
		$t = isset ( $_GET ['t'] ) ? $_GET ['t'] : 0;
		if ($t == 0) {
			$t = isset ( $_POST ['t'] ) ? $_POST ['t'] : 0;
		}
		if ($t == 0) {
			$sql = ' select * from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id ';
			$count_sql = ' select count(*) as count from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id ';
			$page = isset ( $_POST ['page'] ) ? $_POST ['page'] : 1;
			$employee_code = (isset ( $_POST ['employee_code'] )) ? $_POST ['employee_code'] : '';
			$cn_name = (isset ( $_POST ['cn_name'] )) ? $_POST ['cn_name'] : '';
			$department_id = (isset ( $_POST ['department_id'] )) ? $_POST ['department_id'] : '';
			$post_id = (isset ( $_POST ['post_id'] )) ? $_POST ['post_id'] : ''; // 表单提交过来的数据进行模糊查寻
			$seletedata = new seletedata ();
			$data = $seletedata->paging ( $sql, $count_sql, $page, $t, $cn_name, $employee_code, $department_id, $post_id );
			$data ['depinfo'] = $depinfo;
			$data ['postinfo'] = $postinfo;
			$educate = $seletedata->mydata ();
			$data ['educate'] = $educate ['educat'];
			$this->render ( "dynamic", $data );
		} elseif ($t == 1) {
			$sql = ' select * from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id join vcos_ship vs on vs.ship_id=vep.ship_id join vcos_schedule_management vsm on vsm.employee_code=ve.employee_code join vcos_schedule_detail vsd on vsd.schedule_detail_id=vsm.schedule_detail_id';
			$count_sql = 'select count(*) as count from vcos_employee ve JOIN vcos_employment_profiles vep on vep.employee_code=ve.employee_code  JOIN vcos_department vd on vd.department_id=vep.department_id  JOIN vcos_post vpo on vpo.post_id=vep.post_id join vcos_ship vs on vs.ship_id=vep.ship_id join vcos_schedule_management vsm on vsm.employee_code=ve.employee_code join vcos_schedule_detail vsd on vsd.schedule_detail_id=vsm.schedule_detail_id';
			$page = isset ( $_POST ['page'] ) ? $_POST ['page'] : 1;
			$employee_code = (isset ( $_POST ['employee_code'] )) ? $_POST ['employee_code'] : '';
			$cn_name = (isset ( $_POST ['cn_name'] )) ? $_POST ['cn_name'] : '';
			$department_id = (isset ( $_POST ['department_id'] )) ? $_POST ['department_id'] : '';
			$post_id = (isset ( $_POST ['post_id'] )) ? $_POST ['post_id'] : ''; // 表单提交过来的数据进行模糊查寻
			$seletedata = new seletedata ();
			$data = $seletedata->paging ( $sql, $count_sql, $page, $t, $cn_name, $employee_code, $department_id, $post_id );
			$data ['depinfo'] = $depinfo;
			$data ['postinfo'] = $postinfo;
			$data ['shipinfo'] = $shipinfo;
			
			$this->render ( "dynamic", $data );
		}
	}
	public function actionAllocate_allocatedesign() {
		$this->render ( "allocatedesign" );
	}
}