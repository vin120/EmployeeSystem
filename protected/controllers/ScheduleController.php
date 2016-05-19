<?php
class ScheduleController extends Controller
{
	public function actionSchedule_search()
	{
		$this->render('schedule_search');
	}
	
	public function actionSchedule_edit()
	{
		$date = Yii::app()->request->getQuery('date','');

		$this->render('schedule_edit',array('date'=>$date));
	}
	
	public function actionGet_department()
	{
		$sql = " SELECT a.* ,(SELECT COUNT(*) FROM vcos_department b WHERE b.parent_depatment_id = a.department_id) as child FROM vcos_department a WHERE a.parent_depatment_id ={$_POST['id']} ";
		$menu = Yii::app()->m_db->createCommand($sql)->queryAll();
		$j=1;
		$a='';
		$i = count($menu);
		foreach ($menu as $row ){
			//先找出父级菜单
			if($row['child'] > 0){
				if($j<$i){
					$j++;  //判断是否最后一个元素
					$a .= '"'.$row['department_id'].'":{"text" : "'.yii::t('vcos',$row['department_name']).'","type" : "folder","additionalParameters":{"id":"'.$row['department_id'].'","children":true}},';
				}else{
					$a .= '"'.$row['department_id'].'":{"text" : "'.yii::t('vcos',$row['department_name']).'","type" : "folder","additionalParameters":{"id":"'.$row['department_id'].'","children":true}}';
				}
			}else {
				//子菜单
				if($j<$i){
					$j++;  //判断是否最后一个元素
					$a .= '"'.$row['department_id'].'":{"text" : "'.yii::t('vcos',$row['department_name']).'","type" : "item","additionalParameters":{"id":"'.$row['department_id'].'"}},';
				}else {
					$a .= '"'.$row['department_id'].'":{"text" : "'.yii::t('vcos',$row['department_name']).'","type" : "item","additionalParameters":{"id":"'.$row['department_id'].'"}}';
				}
			}
		}
		
		$a = '{"status":"OK","data":{'.$a.'}}';
		echo $a;
		
	}
	
}