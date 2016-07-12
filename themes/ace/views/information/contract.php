
<?php

    $this->pageTitle = Yii::t('vcos','员工合同管理');
    $theme_url = Yii::app()->theme->baseUrl;
    $menu_type = 'information_contract';
?>
<?php 
    //navbar 挂件
    $this->widget('navbarWidget');
?>
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url; ?>/assets/css/profile.css">
<style type="text/css">
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
<script type="text/javascript" src="<?php echo $theme_url; ?>/assets/js/jquery-1.10.2.min.js">

</script>
<div class="main-container" id="main-container">
        <script type="text/javascript">
			try{ace.settings.check('main-container' , 'fixed')}catch(e){}
        </script>

        <div class="main-container-inner">
                <a class="menu-toggler" id="menu-toggler" href="#">
                        <span class="menu-text"></span>
                </a>
                <?php
                //菜单挂件
                 $this->widget('menuWidget', array('menu_type'=>$menu_type));
                ?>
                <div class="main-content"> 
                    <?php
                        //面包屑挂件
                        $this->widget('breadcrumbWidget');
                    ?>

				<script src="<?php echo $theme_url; ?>/assets/js/My97DatePicker/WdatePicker.js"></script><!-- 日期选择 -->
				<script src="<?php echo $theme_url; ?>/assets/js/bootstrap.min.js"></script>
				<script src="<?php echo $theme_url; ?>/assets/js/date-time/bootstrap-datepicker.min.js"></script>
				<script src="<?php echo $theme_url; ?>/assets/js/date-time/bootstrap-timepicker.min.js"></script>
				<script src="<?php echo $theme_url; ?>/assets/js/date-time/daterangepicker.min.js"></script>
				<script src="<?php echo $theme_url; ?>/assets/js/bootstrap-colorpicker.min.js"></script>
	
<!--  -->
	<body>
		
	
	<div class="col-sm-6" style="width:100%">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li <?php echo $t==0?"class='active'":"" ?>>
													<a href="information_contract?t=0"><?php echo yii::t('vcos', '合同信息查询')?></a>
												</li>

												<li <?php echo $t==1?"class='active'":"" ?>>
													<a href="information_contract?t=1"><?php echo yii::t('vcos', '即将到期合同')?></a>
												</li>
                                               
												
											</ul>

											<div class="tab-content">
												<div id="selecthe" <?php echo $t==0?"class='tab-pane in active'":"class='tab-pane'" ?> style="height:2000px">
										
												<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工信息管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工合同管理'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
										
										<form id='member_list' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Information/information_contract");?>" autocomplete="off" >
										<table width="757">
								  <tr>
								    <td width="45" height="52">  <input type='hidden' name='page' value="<?php echo $page;?>">
                                                        <input type='hidden' name='isPage' value="1"></td>
    <td width="346">
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '员工编号:')?> </label>
        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="employee_code" value="<?php echo $employee_code; ?>"   id="form-field-3" placeholder="<?php echo yii::t('vcos', '员工编号')?>" class="col-xs-10 col-sm-5" />
          </div>
        </div>
      </td>
    <td width="350"><div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '合同号:')?> </label>
      <div class="col-sm-9" >
        <input type="text" style="width:90%" name="contract_number" value="<?php echo $contract_number; ?>"  id="form-field-3" placeholder="<?php echo yii::t('vcos', '合同号')?>" class="col-xs-10 col-sm-5" />
        </div>
      </div></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td>
  <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '部门:')?></label>

										<div class="col-sm-9"  style="width:68%">
										<select class="form-control" id="form-field-select-1" name="department_id">
											<option selected='selected' value=""><?php echo yii::t('vcos', '全部')?></option>
											<?php foreach ($depinfo as $k=>$v):?>				
																<option value="<?=$v['department_id']?>" <?=$v['department_id']==$department_id?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['department_name'])?></option>
																<?php endforeach;?>
															</select>
											
										</div>
									</div>
    </td>
    
    <td><div class="form-group">
						          <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '姓名:')?> </label>
						          <div class="col-sm-9" >
						            <input type="text" style="width:90%"  name="cn_name" value="<?php echo $cn_name;?>"   id="form-field-3" placeholder="<?php echo yii::t('vcos', '姓名')?>" class="col-xs-10 col-sm-5" />
					              </div>
						          </div></td>
    
    <!--  -->
   
  </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '职务：')?></label>

										<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1" name="post_id">
												<option selected='selected' value=""><?php echo yii::t('vcos', '全部')?></option>
												<?php foreach ($postinfo as $k=>$v):?>				
																<option value="<?=$v['post_id']?>" <?=$v['post_id']==$post_id?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['post_cn_name'])?></option>
																<?php endforeach;?>
															</select>
											
										</div>
									</div></td>
    
     <td><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '合同类型：')?></label>

										<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1" name="contract_id">
												<option selected='selected' value=""><?php echo yii::t('vcos', '全部')?></option>
												<?php foreach ($contractinfo as $k=>$v):?>				
																<option value="<?=$v['contract_id']?>" <?=$v['contract_id']==$contract_id?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['contract_type'])?></option>
																<?php endforeach;?>
															</select>
											
										</div>
									</div></td>

    
  </tr>
  <tr>
    <td height="47">&nbsp;</td>
    <td><div class="form-group">
						          <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '证书编号:')?> </label>
						          <div class="col-sm-9" >
						            <input type="text" style="width:90%" name="certificate_number" value="<?php echo $certificate_number?>"  id="form-field-3" placeholder="<?php echo yii::t('vcos', '证书编号:')?>" class="col-xs-10 col-sm-5" />
					              </div>
						          </div></td>
    <td></td>
  </tr>
</table>
			

		<center>
											
											<button type="submit" class="btn btn-purple btn-sm" name="soso" value="搜索" style="width:80px;height:41px">
																		<?php echo yii::t('vcos', '搜索')?>	
																			<i class="icon-search icon-on-right bigger-110"></i>
		  </button> 


											&nbsp; &nbsp; &nbsp;
										  <a href="information_contract">	<button class="btn" type="button" value="清空">
												<i class="icon-undo bigger-110"></i>
												<?php echo yii::t('vcos', '清空')?>
											</button>
		  </a>
										</center>

	<br/>				
	
	<div class="col-xs-12">
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														
														<th><?php echo yii::t('vcos', '序号')?></th>
														

														<th>
														
															<?php echo yii::t('vcos', '姓名')?>
														</th>
														
																<th><?php echo yii::t('vcos', '部门')?></th>
																	<th><?php echo yii::t('vcos', '职务')?></th>
																		<th><?php echo yii::t('vcos', '员工编号')?></th>
																			<th><?php echo yii::t('vcos', '合同号')?></th>
																				<th><?php echo yii::t('vcos', '合同签订日期')?></th>
																					<th><?php echo yii::t('vcos', '合同生效日期')?></th>
														

														<th><?php echo yii::t('vcos', '合同截至日期')?></th>
														<th><?php echo yii::t('vcos', '是否有效')?></th>
													</tr>
												</thead>

												<tbody>
													<?php foreach ($posts as $k=>$v):?>
													<tr>
															
														<td>
															<a href="#"><?=$k?></a>
														</td>
														
														
														<td><?php echo yii::t('vcos', $v['cn_name'])?></td>

													
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['department_name'])?>
														</td>
                                                       <td class="hidden-480">
															<?php echo yii::t('vcos', $v['post_cn_name'])?>
													  </td>
													  <td><?php echo yii::t('vcos', $v['employee_code'])?></td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['contract_number'])?>
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos', $v['date_of_sign'])?>
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['date_of_start'])?>
														</td>
														<td class="hidden-480">
															<?=$v['date_of_end']?>
														</td>
														<td>
														<?php echo $v['contract_status']==1?yii::t('vcos','是'):yii::t('vcos','否')?>
															
														</td>
														
													</tr>
													<?php endforeach;?>
												</tbody>
												
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
											 <!-- 分页 -->
                                          <div class="center" id="page_div"></div> 
                                        
									</form>	
																				
											  </div>

												<div id="comehe" <?php echo $t==1?"class='tab-pane in active'":"class='tab-pane'" ?> style="height:2000px">
												
												<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工信息管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工合同管理'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
												
												 <form id='member_list1' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Information/information_contract");?>" autocomplete="off" >
													<table width="761">
													 <tr>
													 <td width="35" height="53"> 
													 <input type='hidden' name='page' value="<?php echo $page;?>">
                                                        <input type='hidden' name='isPage' value="1"></td>
    <td width="357">
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '部门：')?></label>
        
        <div class="col-sm-9"  style="width:68%">
           <select class="form-control" id="form-field-select-1" name="department_id">
											<option selected='selected' value=""><?php echo yii::t('vcos', '全部')?></option>
											<?php foreach ($depinfo as $k=>$v):?>				
																<option value="<?=$v['department_id']?>" <?=$v['department_id']==$department_id?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['department_name'])?></option>
																<?php endforeach;?>
															</select>
          
          </div>
        </div>
      </td>
    <td width="353"><div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '职务：')?></label>
      
      <div class="col-sm-9"  style="width:68%">
         <select class="form-control" id="form-field-select-1" name="post_id">
												<option selected='selected' value=""><?php echo yii::t('vcos', '全部')?></option>
												<?php foreach ($postinfo as $k=>$v):?>				
																<option value="<?=$v['post_id']?>" <?=$v['post_id']==$post_id?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['post_cn_name'])?></option>
																<?php endforeach;?>
															</select>
        
        </div>
      </div></td>
  </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td><div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '合同类型：')?></label>
      
      <div class="col-sm-9"  style="width:68%">
      <select class="form-control" id="form-field-select-1" name="contract_id">
												<option selected='selected' value=""><?php echo yii::t('vcos', '全部')?></option>
												<?php foreach ($contractinfo as $k=>$v):?>				
																<option value="<?=$v['contract_id']?>" <?=$v['contract_id']==$contract_id?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['contract_type'])?></option>
																<?php endforeach;?>
															</select>
        
        </div>
      </div></td>
    <td><div class="form-group">
						          <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', ' 到期天数:')?> </label>
						          <div class="col-sm-9" >
						            <input type="text" style="width:90%" name="comedate" value="<?php echo $comedate;?>"  id="form-field-3" placeholder="<?php echo yii::t('vcos', ' 到期天数')?>" class="col-xs-10 col-sm-5" />
					              </div>
						          </div></td>
  </tr>
  </table>
			

		<center>
											
											<button type="submit" class="btn btn-purple btn-sm" style="width:80px;height:41px">
																			<?php echo yii::t('vcos', '搜索')?>
																			<i class="icon-search icon-on-right bigger-110"></i>
																		</button> 


											&nbsp; &nbsp; &nbsp;
										  <a href="information_contract?t=1">	<button class="btn" type="button" value="清空">
												<i class="icon-undo bigger-110"></i>
												<?php echo yii::t('vcos', '清空')?>
											</button>
											</a>
										</center>

	<br/>				
	
	<div class="col-xs-12">
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
														<th><?php echo yii::t('vcos', '序号')?></th>
														
																<th><?php echo yii::t('vcos', '姓名')?></th>
																	<th><?php echo yii::t('vcos', '部门')?></th>
																		<th><?php echo yii::t('vcos', '职务')?></th>
																			<th><?php echo yii::t('vcos', '员工编号')?></th>
																				<th><?php echo yii::t('vcos', '合同号')?></th>
																					<th><?php echo yii::t('vcos', '合同签订日期')?></th>
														

														<th><?php echo yii::t('vcos', '合同生效日期')?></th>
														<th><?php echo yii::t('vcos', '合同截至日期')?></th>
														<th><?php echo yii::t('vcos', '合同类型')?></th>
															<th><?php echo yii::t('vcos', '操作')?></th>
													</tr>
												</thead>

												<tbody>
														<?php foreach ($posts as $k=>$v):?>
														<?php 
														$datetime1 = new DateTime($v['date_of_end']);
														$datetime2 = new DateTime($v['date_of_start']);
														$interval = $datetime1->diff($datetime2);
														$comed= $interval->format('%a');
														
														if (!empty($comedate)){
														if ($comed==$comedate){
														?>
													<tr>
															<th class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>	
														<td>
															<a href="#"><?=$k?></a>
														</td>
														
														
														<td><?php echo yii::t('vcos', $v['cn_name'])?></td>

													
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['department_name'])?>
														</td>
                                                       <td class="hidden-480">
															<?php echo yii::t('vcos', $v['post_cn_name'])?>
													  </td>
													  <td><?php echo yii::t('vcos', $v['employee_code'])?></td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['contract_number'])?>
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos', $v['date_of_sign'])?>
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['date_of_start'])?>
														</td>
														<td class="hidden-480">
															<?=$v['date_of_end']?>
														</td>
														<td>
															<?php echo yii::t('vcos',$v['contract_type'])?>
														</td>
														<td>
													
														 <button class="btn btn-xs btn-pink" type="button"  href="#modal-form" role="button"  data-toggle="modal" onclick="alertinfo('<?php echo  $v['employee_code'].'/'.$v['cn_name'].'/'.$v['contract_id'].'/'.$v['contract_number'].'/'.$v['date_of_start'].'/'.$v['date_of_end'].'/'.$v['date_of_sign'].'/'.$v['remark'].'/'.$v['id']?>');">
												
												<?php echo yii::t('vcos','续约')?>
											</button>
														</td>
													</tr>
													<?php 
														}}
														else {
													?>
													<tr>
															<th class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>	
														<td>
															<a href="#"><?=$k?></a>
														</td>
														
														
														<td><?php echo yii::t('vcos', $v['cn_name'])?></td>

													
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['department_name'])?>
														</td>
                                                       <td class="hidden-480">
															<?php echo yii::t('vcos', $v['post_cn_name'])?>
													  </td>
													  <td><?php echo yii::t('vcos', $v['employee_code'])?></td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['contract_number'])?>
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos', $v['date_of_sign'])?>
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['date_of_start'])?>
														</td>
														<td class="hidden-480">
															<?=$v['date_of_end']?>
														</td>
														<td>
															<?php echo yii::t('vcos',$v['contract_type'])?>
														</td>
														<td>
													
														  <button class="btn btn-xs btn-pink" type="button"  href="#modal-form" role="button"  data-toggle="modal" onclick="alertinfo('<?php echo  $v['employee_code'].'/'.$v['cn_name'].'/'.$v['contract_id'].'/'.$v['contract_number'].'/'.$v['date_of_start'].'/'.$v['date_of_end'].'/'.$v['date_of_sign'].'/'.$v['remark'].'/'.$v['id']?>')">
												
													<?php echo yii::t('vcos','续约')?>
														</button>
														</td>
													</tr>
													<?php } endforeach;?>
														
													

												</tbody>
												
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
												
												<input type="hidden" name="t" value="1">		
											 <!-- 分页 -->
                                          <div class="center" id="page_div1"></div> 
                                        
									</form>			
											
										
												</div>
									
					</div>
					</div>
					</div>
						<!-- --------------------------------弹出框---------------------------------- -->
<div id="modal-form" class="modal" tabindex="-1">
<form action="contractUpdate" method="post">
<input type="hidden" name="cid" id="cid">
									<div class="modal-dialog" style="width:640px">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="blue bigger"><?php echo yii::t('vcos', '请编辑')?></h4>
											</div>

											<div class="modal-body overflow-visible">
											<!-- ------------------ -->
												<table width="600">
  <tr>
    <td width="1" height="40">&nbsp;</td>
    <td width="300">
  
      <label class="col-sm-3 control-label no-padding-right" for="form-field-2"style="width:100%"><?php echo yii::t('vcos', '员工编号：')?><label id="a"></label></label>
      
    <input type="hidden" name="employee_code" id="z">
      </td>
    <td width="300">  <label class="col-sm-3 control-label no-padding-right" for="form-field-2"style="width:100%"><?php echo yii::t('vcos', '姓名：')?><label id="b"></label></label>
      </td>
    <td></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '合同类型:')?></label>
      
      <div class="col-sm-9"  style="width:68%">
      <select class="form-control" id="form-field-select-1" name="contract_id">
											
												<?php foreach ($contractinfo as $k=>$v):?>				
																<option id='<?php echo $k?>' selected='' value="<?=$v['contract_id']?>" ><?php echo yii::t('vcos', $v['contract_type'])?></option>
																<?php endforeach;?>
															</select>
        
        
        </div>
      </div></td>
    <td>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '合同号:')?> </label>
        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="contract_number"  id="c"  class="col-xs-10 col-sm-5" />
          </div>
        </div>
    </td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3">开始时间: </label>
        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="date_of_start"  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" id="d" class="col-xs-10 col-sm-5" />
          </div>
        </div></td>
    <td><div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3">结束时间: </label>
        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="date_of_end"  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"  id="e"  class="col-xs-10 col-sm-5" />
          </div>
        </div></td>
  </tr>
  <tr>
    <td height="47">&nbsp;</td>
    <td><div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '签订日期:')?> </label>
        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="date_of_sign"   id="f" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="col-xs-10 col-sm-5" />
          </div>
        </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td colspan="2">
      <div><?php echo yii::t('vcos', '备注')?>
        <textarea class="form-control" name='remark' id="g" ></textarea>
        </div>
      </td>
  </tr>
  
                                              </table>
            
    <h4>附件</h4>                                       <div id="fujiantable" tyle="margin-left:20px">
			
	</div>																		<!--  -->
										  </div>

											<div class="modal-footer">
												<button type="button" class="btn btn-sm" data-dismiss="modal">
													<i class="icon-remove"></i>
													取消
												</button>

												<button class="btn btn-sm btn-primary" type="submit">
													<i class="icon-ok"></i>
													
                                                                                                                            保存
												</button>
											</div>
										</div>
									</div>
								</form>
								</div><!-- PAGE CONTENT ENDS -->
<!-- -------------------------------------------------------------------- -->
													<!-- 离职档案 -->
 <div id="dialog-confirm" class="hide"><!-- 删除按钮弹出框 -->
                    <div class="alert alert-info bigger-110" id="dialog-confirm-content">
                        <?php echo yii::t('vcos', '这条记录将被永久删除，并且无法恢复。')?>
                    </div>
                    <div class="space-6"></div>
                    <p class="bigger-110 bolder center grey" id="confirm">
                        <i class="icon-hand-right blue bigger-120"></i>
                        <?php echo yii::t('vcos', '确定吗？')?>
                    </p>
                </div><!-- #dialog-confirm -->
                <input id="attachdelete" type="hidden" ><!-- 附件删除 -->
					
			
									
								
									
									
									<?php
   	//设置容器配置挂件
	$this->widget('settingsContainerWidget');
?>
<?php
    $this->widget('scrollUpWidget');
?>
			<!-- jq -->
			<script src="<?php echo $theme_url; ?>/assets/js/jquery-ui-1.10.3.full.min.js"></script><!-- 弹出删除  -->
             <script src="<?php echo $theme_url; ?>/assets/js/jqPaginator.js"></script>
									<script type="text/javascript">
							
									function alertinfo(post){
										info=post.split("/");
									
										document.getElementById('a').innerHTML=info[0];
										
										document.getElementById('b').innerHTML=info[1];
										document.getElementById('z').value=info[0];
										for(var i=0;i<<?php echo sizeof($contractinfo)?>;i++){
											if(document.getElementById(i).value==info[2]){
												document.getElementById(i).selected='selected';
										}
										}	
										document.getElementById('c').value=info[3];
										document.getElementById('d').value=info[4];
										document.getElementById('e').value=info[5];
										document.getElementById('f').value=info[6];
										document.getElementById('g').value=info[7];
										document.getElementById('cid').value=info[8];
										var xmlhttp;/* 使用ajax */
								        var str=info[0];
										  xmlhttp=new XMLHttpRequest();
										/*   }
										else
										  {// code for IE6, IE5
										  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
										  } */
										xmlhttp.onreadystatechange=function()
										  {
										  if (xmlhttp.readyState==4 && xmlhttp.status==200)
										    { 
											  document.getElementById("fujiantable").innerHTML=xmlhttp.responseText;
											 /*  var dataObj = eval("("+xmlhttp.responseText+")");
											  $.each(dataObj,function(idx,item){  
												   //输出 
												   alert(item.id+"哈哈"+item.name);  
												}) */
										    }
										  }
										xmlhttp.open("GET","/information/fujiantable?employee_code="+str,true);
										xmlhttp.send();
										}
									jQuery(function($) {
										 $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
									            _title: function(title) {
									                var $title = this.options.title || '&nbsp;'
									                if( ("title_html" in this.options) && this.options.title_html == true )
									                        title.html($title);
									                else title.text($title);
									            }
									        }));
										
								        $( "#fujiandelete" ).on('click', function(e) {/*附件删除  */
									        
								        	  var $a = $(this).attr("name");
								            e.preventDefault();
								            $( "#dialog-confirm" ).removeClass('hide').dialog({
								                closeOnEscape:false, 
								                open:function(event,ui){$(".ui-dialog-titlebar-close").hide();} ,
								                resizable: false,
								                modal: true,
								                title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '删除这条记录？')?></h4></div>",
								                title_html: true,
								                buttons: [
								                    {
								                        html: "<i class='icon-trash bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '删除？')?>",
								                        "class" : "btn btn-danger btn-xs ",
								                        "id" : "danger",
								                        click: function() {
									                      
								                            location.href="<?php echo Yii::app()->createUrl("Information/attachment");?>"+"?del_id="+$a;
								                            $( this ).dialog( "close" );
								                        }
								                    }
								                    ,
								                    {
								                        html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
								                        "class" : "btn btn-xs ",
								                        click: function() {
								                            $( this ).dialog( "close" );
								                        }
								                    }
								                ]
								            });
								        });	
									/* 获取参数 */
										
									var certificate_code= $("#certificate_code").val();
										//分页
									     var page = <?php echo $page;?>;
									        $('#page_div').jqPaginator({
									            totalPages: <?php echo $count;?>,
									            visiblePages: 5,
									            currentPage: page,
									            wrapper:'<ul class="pagination"></ul>',
									            first:  '<li class="first"><a href="javascript:void(0);">首页</a></li>',
									            prev:   '<li class="prev"><a href="javascript:void(0);">«</a></li>',
									            next:   '<li class="next"><a href="javascript:void(0);">»</a></li>',
									            last:   '<li class="last"><a href="javascript:void(0);">尾页</a></li>',
									            page:   '<li class="page"><a href="javascript:void(0);">{{page}}</a></li>',
									            onPageChange: function (num) {
									                var val = $("input[name='page']").val();
									                if(num != val)
									                {
									                    $("input[name='page']").val(num);
									                    $("input[name='isPage']").val(2);
									                    $("form#member_list").submit();
									                }
									            }
									        });
									        $('#page_div1').jqPaginator({
									            totalPages: <?php echo $count;?>,
									            visiblePages: 5,
									            currentPage: page,
									            wrapper:'<ul class="pagination"></ul>',
									            first:  '<li class="first"><a href="javascript:void(0);">首页</a></li>',
									            prev:   '<li class="prev"><a href="javascript:void(0);">«</a></li>',
									            next:   '<li class="next"><a href="javascript:void(0);">»</a></li>',
									            last:   '<li class="last"><a href="javascript:void(0);">尾页</a></li>',
									            page:   '<li class="page"><a href="javascript:void(0);">{{page}}</a></li>',
									            onPageChange: function (num) {
									                var val = $("input[name='page']").val();
									                if(num != val)
									                {
									                    $("input[name='page']").val(num);
									                    $("input[name='isPage']").val(2);
									                    $("form#member_list1").submit();
									                }
									            }
									        });

									     
									/* 日期选择框 */
										$('.date-picker').datepicker({autoclose:true}).next().on(ace.click_event, function(){
											$(this).prev().focus();
										});
											$('input[name=date-range-picker]').daterangepicker().prev().on(ace.click_event, function(){
												$(this).next().focus();
											});
									
												$('#timepicker1').timepicker({
													minuteStep: 1,
													showSeconds: true,
													showMeridian: false
												}).next().on(ace.click_event, function(){
													$(this).prev().focus();
												});
									
													$('#colorpicker1').colorpicker();
													$('#simple-colorpicker-1').ace_colorpicker();
														
									
													
																
									});
									</script>                              
                                      
									</body>
									