<?php
require dirname(dirname(__FILE__)).'/extensions/phpexcel/PHPExcel.php';
class seletedata 
{
	public function mydata(){
$data['country']=country::model()->findAll();//国籍
$data['nation']=nation::model()->findAll();//民族
$data['post']=post::model()->findAll();//职务
$data['department']=department::model()->findAll();//部门
$data['employee_status']=array(0=>'等待上船',1=>'已上船',2=>'休假中');//船员状态
$data['marrystatus']=array(0=>'未婚',1=>'已婚',2=>'离异',3=>'丧偶');//婚姻状况
$data['healthstatus']=array(0=>'健康',1=>'一般',2=>'较差');//健康状况
$data['bloodtype']=array(0=>'A型',1=>'B型',2=>'AB型',3=>'O型');//血型
$data['educat']=array(0=>'高中以下',1=>'中专',2=>'大专',3=>'本科',4=>'硕士',5=>'博士');//'学历
$data['cardtype']=array(0=>'护照',1=>'身份证',2=>'其他证件');//'证件类型
$data['employee_type']=array(0=>'自有船员',1=>'租赁船员',2=>'外聘船员');//'船员类型
$data['employeesource']=array(0=>'应届生招聘',1=>'社会招聘',2=>'内部招聘');//员工来源
$data['employee_job_status']=array(0=>'实习',1=>'试用',2=>'转正',3=>'离职');//在职状态
$data['politicalstatus']=array(0=>'群众',1=>'团员',2=>'党员',3=>'民主党派');//政治面貌

return $data;
}
public function selectLike($sql,$count_sql,$cn_name='',$employee_code='',$department_id='',$post_id='',$certificate_id='',$certificate_name='',$certificate_number='',$date_of_end='',$date_of_audit_s='',$date_of_audit_e='',$date_of_audit_st='',$date_of_audit_end='',$contract_number='',$contract_id=''){
	if($cn_name != '')
	{
		$sql .= " AND (cn_name LIKE '%{$cn_name}%' OR last_name LIKE '%{$cn_name}%' OR first_name LIKE '%{$cn_name}%') ";
		$count_sql .=" AND (cn_name LIKE '%{$cn_name}%' OR last_name LIKE '%{$cn_name}%' OR first_name LIKE '%{$cn_name}%') ";
	}
	
	if($employee_code != '')
	{
	
		$sql .= " and ve.employee_code LIKE '%$employee_code%' ";
		$count_sql .= " and ve.employee_code LIKE '%$employee_code%' ";
		
	
	}
	if (!empty($department_id)){
		$sql .= " and vep.department_id='$department_id' ";
		$count_sql .= " and vep.department_id='$department_id'";
	}

	if (!empty($post_id)){
		$sql .= " and vep.post_id='$post_id' ";
		$count_sql .= " and vep.post_id='$post_id'";
	}
	if (!empty($certificate_id)){
		
		$sql .= " and vcm.certificate_id='$certificate_id' ";
		$count_sql .= " and vcm.certificate_id='$certificate_id'";
	}
if($certificate_name != '')
	{
	
		$sql .= " and vcm.certificate_name LIKE '%$certificate_name%' ";
		$count_sql .= " and vcm.certificate_name LIKE '%$certificate_name%' ";
	
	}
if($certificate_number != '')
	{
		$sql .= " and vcm.certificate_number LIKE '%$certificate_number%' ";
		$count_sql .= " and vcm.certificate_number LIKE '%$certificate_number%' ";
	
	}
	if($date_of_end != '')
	{
		$sql .= " and vcm.date_of_audit LIKE '$date_of_end' ";
		$count_sql .= " and vcm.date_of_audit LIKE '$date_of_end' ";
	
	}
	if($date_of_audit_s != '')
	{
		$sql .= " and vcm.date_of_audit >= '$date_of_audit_s' ";
		$count_sql .= " and vcm.date_of_audit >= '$date_of_audit_s' ";
	
	}
	if($date_of_audit_e != '')
	{
		$sql .= " and vcm.date_of_end <= '$date_of_audit_e' ";
		$count_sql .= " and vcm.date_of_end <= '$date_of_audit_e' ";
	
	}
	if($date_of_audit_st != '')
	{
		
		$sql .= " and vtm.date_of_audit >= '$date_of_audit_st' ";
		$count_sql .= " and vtm.date_of_audit >= '$date_of_audit_st' ";
	
	}
	if($date_of_audit_end != '')
	{
		$sql .= " and vtm.date_of_audit <= '$date_of_audit_end' ";
		$count_sql .= " and vtm.date_of_audit <= '$date_of_audit_end' ";
	
	}
	if($contract_number != '')
	{
		$sql .= " and vconm.contract_number LIKE '%$contract_number%' ";
		$count_sql .= " and vconm.contract_number LIKE '%$contract_number%' ";
	
	}
	if($contract_id != '')
	{
		$sql .= " and vcon.contract_id <= '$contract_id' ";
		$count_sql .= " and vcon.contract_id <= '$contract_id' ";
	
	}

	
	$data=array('sql'=>$sql,'count_sql'=>$count_sql);
	return $data;
}
public function paging($sql,$count_sql,$page,$t,$cn_name='',$employee_code='',$department_id='',$post_id='',$date=''){
	$db = Yii::app()->m_db;
	$depinfo=department::model()->findAll();
	$postinfo=post::model()->findAll();
	$certificate=certificate_management::model()->findAll();
	$mydata=$this->selectLike($sql, $count_sql,$cn_name,$employee_code,$department_id,$post_id);
	/*  数据分页*/
	$sql=$mydata['sql'];
	$count_sql=$mydata['count_sql'];
	if($date != '')
	{
		$sql .= " and vls.date = '$date' ";
		$count_sql .= " and vls.date = '$date' ";
	
	}
	//如果post过来的内容为空，则使用默认值
	$_name = '';
	$_code = '';
	
	$_verification = '-1';
	$_isPage = 1;	//判断是否点击分页按钮(首页,1，2,..  1:表示点击查询按钮，2表示点击分页按钮)
	
	//分页
	$pageSize = 2 ;
	$page = isset($_POST['page']) ? $_POST['page'] : 1;
	$page1 = isset($_POST['page1']) ? $_POST['page1'] : 1;
	$page_s = $page == 1 ? 0 : ($page-1) * $pageSize ;
	
	//$page = isset($_POST['page']) ? $_POST['page'] == 1 ? 0 : ($_POST['page']-1)*10 : 0;
	
	
	if($_POST)
	{
	
	
		/*
		 SELECT * FROM vcos_member WHERE cn_name LIKE %$member_name% OR last_name LIKE %$member_name% OR first_name LIKE %$member%
		 AND member_code LIKE %$member_code%
		 AND sex = $sex
		 AND member_verification = $member_verification
		 */
	
	
	
		$isPage = (isset($_POST['isPage'])) ? $_POST['isPage'] : '1';
	
	
	
	
		$_isPage = $isPage;
	
		//如果post的内容不为默认值，拼接字符串进行模糊查询
	
	
	}
	
	//如果是点击查询按钮，重置页码为第一页
	if($_isPage == '1')
	{
		$page = 1;
		$page_s = 0;
	}
    
	/* $count_sql .= " ORDER BY employee_id ASC "; */
	$count = $db->createCommand($count_sql)->queryRow();

	$count = ceil( $count['count'] / $pageSize );
	if ($count==0){
		$count=1;
	
	}
	$sql .= " LIMIT $page_s , $pageSize ";/* ORDER BY employee_id ASC */

	$posts = $db->createCommand($sql)->queryAll();
    $data=array('posts'=>$posts,'count'=>$count,'name'=>$_name,'code'=>$_code,'verification'=>$_verification,'page'=>$page,'isPage'=>$_isPage,'depinfo'=>$depinfo,
			'postinfo'=>$postinfo,
    		'employee_code'=>$employee_code,
    		'cn_name'=>$cn_name,
    		'department_id'=>$department_id,
    		'post_id'=>$post_id,
    		'date'=>$date,
			't'=>$t,
	);
	return $data;
}
  public function informationpro($sql,$count_sql,$t,$page,$cn_name,$employee_code,$department_id,$post_id,$certificate_id,$certificate_name,$certificate_number,$date_of_end,$date_of_audit_s,$date_of_audit_e){
  	$db = Yii::app()->m_db;
  	$depinfo=department::model()->findAll();
  	$postinfo=post::model()->findAll();
  	$certificate=certificate_management::model()->findAll();
  	
  	
  
  	//如果post过来的内容为空，则使用默认值
  	$_name = '';
  	$_code = '';
  	
  	$_verification = '-1';
  	$_isPage = 1;	//判断是否点击分页按钮(首页,1，2,..  1:表示点击查询按钮，2表示点击分页按钮)
  	
  	//分页
  	$pageSize = 2 ;
  	
  
  	$page_s = $page == 1 ? 0 : ($page-1) * $pageSize ;
  	
  	//$page = isset($_POST['page']) ? $_POST['page'] == 1 ? 0 : ($_POST['page']-1)*10 : 0;
  
  	
  	
  	if($_POST)
  	{
  		$isPage = (isset($_POST['isPage'])) ? $_POST['isPage'] : '1';
  		$_name = $cn_name;
  		$_code = $employee_code;
  		$_isPage = $isPage;
  			
  		//如果post的内容不为默认值，拼接字符串进行模糊查询
  		
  		$data=$this->selectLike($sql, $count_sql,$cn_name,$employee_code,$department_id,$post_id,$certificate_id,$certificate_name,$certificate_number,$date_of_end,$date_of_audit_s,$date_of_audit_e);
  		$sql=$data['sql'];
  		$count_sql=$data['count_sql'];
  	
  	}
  	
  	//如果是点击查询按钮，重置页码为第一页
  	if($_isPage == '1')
  	{
  		$page = 1;
  		$page_s = 0;
  	}
  	
  
  	$count_sql .= " ORDER BY employee_id ASC ";
  	$count = $db->createCommand($count_sql)->queryRow();
  
  	$count = ceil( $count['count'] / $pageSize );
  
  	
  	$sql .= " ORDER BY employee_id ASC LIMIT $page_s , $pageSize ";
  	$posts = $db->createCommand($sql)->queryAll();
  	
  	//查找国家对应的中文名字
  	$country_sql = "SELECT `country_name` ,`country_short_code` FROM `vcos_country`  ORDER BY country_id ASC";
  	$country = Yii::app()->m_db->createCommand($country_sql)->queryAll();
  	
  return  array('posts'=>$posts,'count'=>$count,'name'=>$_name,'code'=>$_code,'verification'=>$_verification,'page'=>$page,'isPage'=>$_isPage,'country'=>$country,'depinfo'=>$depinfo,
  			'postinfo'=>$postinfo,
  			'certificate'=>$certificate,
  			'income'=>$posts,
  			'employee_code'=>$employee_code,
  			'cn_name'=>$cn_name,
  			'department_id'=>$department_id,
  			'post_id'=>$post_id,
  			
  			't'=>$t,
  	);
  		
  }
  /*  文件上传*/
  public function uploadfile($viewName){
  	$db = Yii::app()->m_db;
  	$employee_code = isset($_REQUEST['employee_code']) ? $_REQUEST['employee_code'] : '';
  	if ($employee_code==''){
  		Helper::show_message(yii::t('vcos', '请输入员工编码。。。'));
  		exit;
  	}
  	$employeesql="select count(*) as count from vcos_employee where employee_code ='$employee_code'";
  	$dataemployee= $db->createCommand($employeesql)->queryRow();
  	if($dataemployee['count']==0){//判断输入的用户编号是否存在
  		Helper::show_message(yii::t('vcos', '请输入正确的员工编码。。。'));
  		exit;
  	}
 
  	$dir = isset($_REQUEST['dir']) ? $_REQUEST['dir'] : '';
  	$myload=$dir;
  	$image = CUploadedFile::getInstanceByName('file');
  	if (!empty($image)){

  	$employeedir=Yii::getPathOfAlias('webroot').'/images/'.$employee_code.'/';
  	$dir=Yii::getPathOfAlias('webroot').'/images/'.$employee_code.'/'.$dir.'/';
  	//上传目录
  	if (!is_dir($employeedir)) {
  		mkdir($employeedir);
  		//目录不存在则创建
  	}
  	if (!is_dir($dir)) {
  		mkdir($dir);
  		//目录不存在则创建
  	}
  	
  	$name = $dir.$image->name;
  	
  	//文件名绝对路径
  /* 	$test=explode('.',$name);
  	$test=isset($test[1])?$test[1]:'';
  	if ($test=='jpg'||$test=='jepg'||$test=='png'){
  		$status = $image->saveAs($name,true);
  	}
  	else{
  		Helper::show_message(yii::t('vcos', '请输入正确的图片格式。。。'));
  		exit;
  	} */
  	
  	$status = $image->saveAs(iconv('utf-8','gb2312',$name),true);
  	//保存文件
  	if ($status) {
  		$filename_save=explode($myload.'/',$name);//文件保存名称
  		$path=explode('images',$name);
  		$path='/images'.$path[1];//文件保存路径
  		$file_data['employee_code']=$employee_code;
  		$file_data['filename']=$filename_save[1];
  		$file_data['path']=$path;
  		$file_data['filename_save']=$filename_save[1];
  		$sqlpath="select count(*) as count from vcos_file_path where path='$path'";
  		$pathcount= $db->createCommand($sqlpath)->queryRow();

  		if ($pathcount['count']==0){
      
  		$res=$db->createCommand()->insert("vcos_file_path",$file_data);
  		}
  	}else {
  		Helper::show_message(yii::t('vcos', '文件导入失败。。。'));
  		exit;
  	}
  		}
  }
  public function inputdata($iswhere){
  	$flag = 0;
  	if(!isset($_FILES['import_input']['tmp_name'])){
  		Helper::show_message("操作失败");
  		exit;
  	}
  
  	$filePath = $_FILES['import_input']['tmp_name'];
  	if($filePath){
  		
  		$objectPHPExcel = new PHPExcel();
  		$PHPExcel = PHPExcel_IOFactory::load($filePath);
  		$sheet = $PHPExcel->getSheet(0); // 读取第一個工作表(编号从 0 开始)
  		$highestRow = $sheet->getHighestRow(); // 取得总行数
  		$highestColumn = $sheet->getHighestColumn(); // 取得总列数
  		 
  		$arr = array(1=>'A',2=>'B',3=>'C',4=>'D',5=>'E',6=>'F',7=>'G',8=>'H',9=>'I',10=>'J',11=>'K',12=>'L',13=>'M', 14=>'N',15=>'O',16=>'P',17=>'Q',18=>'R',19=>'S',20=>'T',21=>'U',22=>'V',23=>'W',24=>'X',25=>'Y',26=>'Z');
  		// 一次读取一列
  		$data = array();
  		for ($row = 2; $row <= $highestRow; $row++) {
  			$data_child = array();
  			for ($column = 0;; $column++)  {
  				$val = $sheet->getCellByColumnAndRow($column, $row)->getValue();
  				if($val === null){
  					break;
  				}
  				$data_child[$iswhere[$column]] = $val;
  			}
  			if($data_child){
  				$data[] = $data_child;
  					
  			}
  			 
  		}
  		return $data;
  		 
  		 
  	}
  	else {
  		$data='';
  		return $data;
  	}
  } 

}