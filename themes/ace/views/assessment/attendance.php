
<?php

    $this->pageTitle = Yii::t('vcos','员工出勤考核');
    $theme_url = Yii::app()->theme->baseUrl;
    $menu_type = 'assessment_attendance';
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


<!-- ----------------------------------------- -->
	<body>

	
	<div class="col-sm-6" style="width:100%">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li <?php echo $t==0?"class='active'":''?>>	
											
													<a href="assessment_attendance?t=0" >
														 <?php echo yii::t('vcos', ' 请假维护')?> 
														</a>
												</li>
											
												
												<li <?php echo  $t==1?"class='active'":''?>>
													<a  href="assessment_attendance?t=1">	<?php echo yii::t('vcos', '休假维护')?></a>
												</li>
											
                                                <li <?php echo $t==2?"class='active'":''?>>
													<a  href="assessment_attendance?t=2">	<?php echo yii::t('vcos', '考勤统计')?></a>
												</li>
												  <li <?php echo $t==3?"class='active'":''?>>
													<a  href="assessment_attendance?t=3">	<?php echo yii::t('vcos', ' 缺勤导入')?></a>
												</li>
												  <li <?php echo $t==4?"class='active'":''?>>
													<a  href="assessment_attendance?t=4">	<?php echo yii::t('vcos', '假期管理')?></a>
												</li>
												
											</ul>

											<div class="tab-content">
												<div id="protectdatereq" <?php echo $t==0?"class='tab-pane in active'":"class='tab-pane'" ?> style="height:2000px">
												
														<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工考核管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工出勤管理'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
												
													 <form id='member_list' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Assessment/assessment_attendance");?>" autocomplete="off" >
										 			<input type='hidden' name='page' value="<?php echo $page;?>">
                                                       <input type='hidden' name='isPage' value="1">
	                                    <div class="col-xs-12">
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
															<th>  <label>
                                                                            <input type="checkbox" class="ace" />
                                                                            <span class="lbl"></span>
                                                                    </label></th>
														<th><?php echo yii::t('vcos', '序号')?></th>
														<th><?php echo yii::t('vcos', '部门')?></th>
														<th class="hidden-480"><?php echo yii::t('vcos', '职务')?></th>

														<th>
														
															<?php echo yii::t('vcos', '员工编码')?>
														</th>
															<th><?php echo yii::t('vcos', '姓名')?></th>
																<th><?php echo yii::t('vcos', '请假类型')?></th>
																	<th><?php echo yii::t('vcos', '请假开始时间')?></th>
																		<th><?php echo yii::t('vcos', '请假结束时间')?></th>
																			<th><?php echo yii::t('vcos', '累积天数')?></th>
																		<th><?php echo yii::t('vcos', '操作')?></th>		
													</tr>
												</thead>

												<tbody>
													<?php if ($t==0){?>
													<?php foreach ($posts as $k=>$v):?>
												
														<tr>
														  	<td >
													  				<label>
                                                                    <input type="checkbox" name="ids[]" value="<?php echo $v['id'];?>" class="ace isclick" />
                                                                    <span class="lbl"></span>
                                                                </label>
                                                              
                                                                </td>

														<td>
															<a href="#"><?=$k?></a>
														</td>
						
														<td class="hidden-480">
														<?php echo yii::t('vcos',$v['department_name'])?>
														
														</td>
                                                       <td class="hidden-480">
                                                       	<?php echo yii::t('vcos',$v['post_cn_name'])?>
															
														</td>
														 <td class="hidden-480">
                                                       	<?php echo yii::t('vcos',$v['employee_code'])?>
															
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['cn_name'])?>
															
														</td>
														<td class="hidden-480">
														<?php echo yii::t('vcos',$v['leave_type'])?>
														
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['date_of_start'])?>
															
														</td>
														<td class="hidden-480">
														
															<?php echo yii::t('vcos',$v['date_of_end'])?>
															
														</td>
														<td class="hidden-480">
														
															<?php echo yii::t('vcos',$v['count_day'])?>
															
														</td>
													<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																

																<button class="btn btn-xs btn-info" href="#modal-form" role="button"  data-toggle="modal" onclick="alertinfo('<?php echo  $v['department_id'].'/'.$v['post_id'].'/'.$v['cn_name'].'/'.$v['employee_code'].'/'.$v['leave_id'].'/'.$v['count_day'].'/'.$v['date_of_start'].'/'.$v['date_of_end'].'/'.$v['remark'].'/'.$v['id']?>')">
																	
																	<i class="icon-edit bigger-120"></i>
																	
																</button>

															 <?php
                                                                      
                                                                            $this->widget('ManipulateWidget',array(
                                                                                'ControllerName'=>'Information',
                                                                                'MethodName'=>'attendanceUpdate',
                                                                                'id'=>$v['id'].'/leave',
                                                                                'canedit'=>FALSE,
                                                                                'candelete'=>TRUE,
                                                                                'canchange'=>FALSE,
                                                                                'canreset'=>FALSE,
                                                                            ));

                                                                        ?>

															
															</div>

															<div class="visible-xs visible-sm hidden-md hidden-lg">
																<div class="inline position-relative">
																	<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
																		<i class="icon-cog icon-only bigger-110"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
																		<li>
																			<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>
													</tr>
												<?php  endforeach; }?>
														
														
														
													

												</tbody>
												
											</table>
											</div><!-- /.table-responsive -->
													</div><!-- /span -->
													 <div class="center">
												   <input type="hidden" name="isdeleteall" class="isdeleteall" value="">
                                                   <button name="deleteallbutton" class="btn btn-xs btn-warning">
													    <i class="icon-trash bigger-125"></i>
													    <span class="bigger-110 no-text-shadow"><?php echo yii::t('vcos', '删除选中')?></span>
													</button>
                                                            <button class="btn btn-xs" href="#modal-form1add" role="button"  data-toggle="modal">
                                                                <i class="icon-pencil align-top bigger-125"></i>
                                                                <span class="bigger-110 no-text-shadow">添加</span>
                                                            </button>
                                                        </div>
												 <!-- 分页 -->
                                          <div class="center" id="page_div"></div> 
                                        
									</form>									
											  </div>
													<!-- 休假 -->
												<div id="protectdate" <?php echo $t==1?"class='tab-pane in active'":"class='tab-pane'" ?> style="height:2000px">
												 
												 				<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工考核管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工出勤管理'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
												 
												 <form id='member_list1' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Assessment/assessment_attendance");?>" autocomplete="off" >
										 			<input type='hidden' name='page' value="<?php echo $page;?>">
                                                       <input type='hidden' name='isPage' value="1">
												
													        <div class="col-xs-12">
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
														<tr>
														<th>  <label>
                                                                            <input type="checkbox" class="ace" />
                                                                            <span class="lbl"></span>
                                                                    </label></th>
														<th><?php echo yii::t('vcos', '序号')?></th>
														<th><?php echo yii::t('vcos', '部门')?></th>
														<th class="hidden-480"><?php echo yii::t('vcos', '职务')?></th>

														<th>
														
															<?php echo yii::t('vcos', '员工编码')?>
														</th>
															<th><?php echo yii::t('vcos', '姓名')?></th>
																<th><?php echo yii::t('vcos', '休假类型')?></th>
																	<th><?php echo yii::t('vcos', '休假开始时间')?></th>
																		<th><?php echo yii::t('vcos', '休假结束时间')?></th>
																			<th><?php echo yii::t('vcos', '累积天数')?></th>
																		<th><?php echo yii::t('vcos', '操作')?></th>		
													</tr>
												</thead>

												<tbody>
												<?php if ($t==1){?>
													<?php foreach ($posts as $k=>$v):?>
													
														<tr>
													<td >
													  				<label>
                                                                    <input type="checkbox" name="ids[]" value="<?php echo $v['id'];?>" class="ace isclick" />
                                                                    <span class="lbl"></span>
                                                                </label>
                                                              
                                                                </td>

														<td>
															<a href="#"><?=$k?></a>
														</td>
						
														<td class="hidden-480">
														<?php echo yii::t('vcos',$v['department_name'])?>
														
														</td>
                                                       <td class="hidden-480">
                                                       	<?php echo yii::t('vcos',$v['post_cn_name'])?>
															
														</td>
														 <td class="hidden-480">
                                                       	<?php echo yii::t('vcos',$v['employee_code'])?>
															
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['cn_name'])?>
															
														</td>
														<td class="hidden-480">
														<?php echo yii::t('vcos',$v['holiday_type'])?>
														
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['date_of_start'])?>
															
														</td>
														<td class="hidden-480">
														
															<?php echo yii::t('vcos',$v['date_of_end'])?>
															
														</td>
														<td class="hidden-480">
														
															<?php echo yii::t('vcos',$v['count_day'])?>
															
														</td>
													<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																

																<button class="btn btn-xs btn-info" href="#modal-form1" role="button"  data-toggle="modal" onclick="alertholiday('<?php echo  $v['department_id'].'/'.$v['post_id'].'/'.$v['cn_name'].'/'.$v['employee_code'].'/'.$v['holiday_id'].'/'.$v['count_day'].'/'.$v['date_of_start'].'/'.$v['date_of_end'].'/'.$v['remark'].'/'.$v['id']?>')">
																	
																	<i class="icon-edit bigger-120"></i>
																	
																</button>

																 <?php
                                                                      
                                                                            $this->widget('ManipulateWidget',array(
                                                                                'ControllerName'=>'Information',
                                                                                'MethodName'=>'attendanceUpdate',
                                                                                'id'=>$v['id'].'/holiday',
                                                                                'canedit'=>FALSE,
                                                                                'candelete'=>TRUE,
                                                                                'canchange'=>FALSE,
                                                                                'canreset'=>FALSE,
                                                                            ));

                                                                        ?>
															</div>
															<div class="visible-xs visible-sm hidden-md hidden-lg">
																<div class="inline position-relative">
																	<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
																		<i class="icon-cog icon-only bigger-110"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
																		<li>
																			<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>
													</tr>
												<?php  endforeach; }?>
												</tbody>
												
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
										  <div class="center">
												   <input type="hidden" name="isdeleteall" class="isdeleteall" value="">
                                                   	 <button name="deleteallbutton" class="btn btn-xs btn-warning">
													    <i class="icon-trash bigger-125"></i>
													    <span class="bigger-110 no-text-shadow"><?php echo yii::t('vcos', '删除选中')?></span>
														</button>
                                                            <button class="btn btn-xs" href="#modal-form2add" role="button"  data-toggle="modal">
                                                                <i class="icon-pencil align-top bigger-125"></i>
                                                                <span class="bigger-110 no-text-shadow">添加</span>
                                                            </button>
                                                        </div>
									
												<input type="hidden" name="t" value="1">
													 <!-- 分页 -->
													
                                          <div class="center" id="page_div1"></div> 		
													
												</form>
												</div>
									
					                   <!--  第三个div-->
													<!-- 离职档案 -->
													<div id="statisticcheck" <?php echo $t==2?"class='tab-pane in active'":"class='tab-pane'" ?> style="height:2000px">
																	<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工考核管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工出勤管理'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
													
													
												 <form id='member_list2' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Assessment/assessment_attendance");?>" autocomplete="off" >
										 			<input type='hidden' name='page' value="<?php echo $page;?>">
                                                       <input type='hidden' name='isPage' value="1">
													<?php if ($t==2){?>
													<table width="751">
  <tr>
    <td width="43" height="52">&nbsp;</td>
    <td width="371">
      <div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '员工编号')?> </label>

        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="employee_code" value="<?php echo $employee_code; ?>"   id="form-field-3" placeholder="员工编号" class="col-xs-10 col-sm-5" />
          </div>
        </div>
      </td>
    <td width="321"><div class="form-group">
     <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '姓名')?></label>
      <div class="col-sm-9" >
       <input type="text" style="width:90%" name="cn_name" value="<?php echo $cn_name;?>"  id="form-field-3" placeholder="姓名" class="col-xs-10 col-sm-5" />
        </div>
      </div></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td>
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
  </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td><div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '考勤月份：')?></label>

										<div class="col-sm-9"  style="width:68%">
										
												<select class="form-control" id="form-field-select-1" name="post_id">
												<option selected='selected' value=""><?php echo yii::t('vcos', '全部')?></option>
												<?php foreach ($dateinfo as $k=>$v):?>				
																<option value="<?=$v['date']?>" <?=$v['date']==$date?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['date'])?></option>
																<?php endforeach;?>
															</select>
											
											
										</div>
									</div></td>
    <td></td>
  </tr>
  
</table>
			

		<center>
											
											<button type="submit" class="btn btn-purple btn-sm"  style="width:80px;height:41px">
																			搜索
																			<i class="icon-search icon-on-right bigger-110"></i>
		  </button> 


											&nbsp; &nbsp; &nbsp;
										  <a href="assessment_attendance?t=2">	<button class="btn" type="button" >
												<i class="icon-undo bigger-110"></i>
												清空
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
															<?php echo yii::t('vcos', '员工编码')?>
														</th>
															<th><?php echo yii::t('vcos', '姓名')?></th>
															<th><?php echo yii::t('vcos', '性别')?></th>
														<th><?php echo yii::t('vcos', '部门')?></th>
														<th class="hidden-480"><?php echo yii::t('vcos', '职务')?></th>
																<th><?php echo yii::t('vcos', '证书类型')?></th>
																	<th><?php echo yii::t('vcos', '证书名称')?></th>
																		<th><?php echo yii::t('vcos', '证书编号')?></th>
																			<th><?php echo yii::t('vcos', '年审日期')?></th>
																		<th><?php echo yii::t('vcos', '操作')?></th>		
													</tr>
												</thead>

												<tbody>
													<?php foreach ($posts as $k=>$v):?>
													
														<tr>
													
														<td>
															<a href="#"><?=$k?></a>
														</td>
														 <td class="hidden-480">
                                                       	<?php echo yii::t('vcos',$v['employee_code'])?>
															
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['cn_name'])?>
															
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['sex']==1?"男":"女")?>
															
														</td>
														<td class="hidden-480">
														<?php echo yii::t('vcos',$v['department_name'])?>
														
														</td>
                                                       <td class="hidden-480">
                                                       	<?php echo yii::t('vcos',$v['post_cn_name'])?>
															
														</td>
														
														<td class="hidden-480">
														<?php echo yii::t('vcos',$v['certificate_type'])?>
														
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['certificate_name'])?>
															
														</td>
														<td class="hidden-480">
														
															<?php echo yii::t('vcos',$v['certificate_number'])?>
															
														</td>
														<td class="hidden-480">
														
															<?php echo yii::t('vcos',$v['date_of_audit'])?>
															
														</td>
																<td>
														
														 <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																

																<button class="btn btn-xs btn-info active" href="#modal-table" role="button" class="green" data-toggle="modal" onclick="showHint('<?=$v['employee_code']?>')">
																	查看
																</button>

															

															
															</div>

															<div class="visible-xs visible-sm hidden-md hidden-lg">
																<div class="inline position-relative">
																	<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
																		<i class="icon-cog icon-only bigger-110"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
																		<li>
																			<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>
													</tr>
												<?php endforeach;?>
											
													

												</tbody>
												
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->	
												<?php }?>	 
													<input type="hidden" name="t" value="2">
													 <!-- 分页 -->
													
                                          <div class="center" id="page_div2"></div>
                                          </form>
                                          		
											  </div>
													
												
	<!-- 第四个div -->
		<div id="inputabsence" <?php echo $t==3?"class='tab-pane in active'":"class='tab-pane'" ?> style="height:2000px">
		<!-- --------------------------------------------- -->
							<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工考核管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工出勤考核'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
			
			
													
													
											
											
												
								<form action="<?php echo $this->createUrl('/assessment/assessment_attendance/');?>" method="post" enctype="multipart/form-data">				              
							 <table >
							 <tr>
							<td  width='30%'></td>
							 <td height='70px' width='450px'><div class="form-group">
									 
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><h3> <?php echo yii::t('vcos', '数据导入:')?></h3> </label>

										
									</div></td>
								
							 </tr>
							 
								<tr>
								<td ></td>
								<td ><input type="file" name="import_input" id="id-input-file-3"/>
									
									<input type="hidden" name='t' value="3">
								</td>
								
									</tr>
									<tr>
								<td></td>
								<td> <input type="submit" value="<?php echo yii::t('vcos', '提交')?>" id="submit" class="btn btn-primary" style="margin-left: 45%"/></td>
								
									</tr>
									<tr>
								<td></td>
								<td> <h3>模版下载</h3></td>
									</tr>
									<tr>
								<td></td>
								<td>点击<a href="<?php echo $this->createUrl('/assessment/downfile?name=leaveOrHoliday');?>">这里</a>下载模版,如果不按照这个模版将不能正常倒入数据,<br/>请不要在其他地方乱涂乱画，以免影响数据导入</td>
									</tr>
									</table> 
								</form> 
								
		
		<!-- --------------------------------------------------- -->
		</div>
			<div id="admindate" <?php echo $t==4?"class='tab-pane in active'":"class='tab-pane'" ?> style="height:2000px">
		
						<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工考核管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工出勤管理'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
		<!-- 第五个div -->
			<form id='member_list4' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Assessment/assessment_attendance");?>" autocomplete="off" >
										 			<input type='hidden' name='page' value="<?php echo $page;?>">
                                                       <input type='hidden' name='isPage' value="1">
													<?php if ($t==4){?>
			
				<div class="page-content">
						

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

							
									<div class="form-group">
									    <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '员工编号')?> </label>

										<div class="col-sm-9">
											 <input type="text" name="employee_code" value="<?php echo $employee_code; ?>"   id="form-field-3" placeholder="员工编号" class="col-xs-10 col-sm-5" />
										</div>
									</div>

						<div class="form-group">
										  <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '姓名')?></label>
						      <div class="col-sm-9" >
						       <input type="text"  name="cn_name" value="<?php echo $cn_name;?>"  id="form-field-3" placeholder="姓名" class="col-xs-10 col-sm-5" />
						        </div>
									</div>
									
									
									<div class="space-4"></div>

									<div class="form-group">
									 <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '部门：')?></label>

										<div class="col-sm-9"  style="width:33%">
											<select class="form-control" id="form-field-select-1" name="department_id">
												<option selected='selected' value=""><?php echo yii::t('vcos', '全部')?></option>
											<?php foreach ($depinfo as $k=>$v):?>				
																<option value="<?=$v['department_id']?>" <?=$v['department_id']==$department_id?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['department_name'])?></option>
																<?php endforeach;?>
															
															</select>
											
										</div>
									</div>
							
							
							
							<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '职务：')?></label>
										
										<div class="col-sm-9"  style="width:33%">
												<select class="form-control" id="form-field-select-1" name="post_id">
												<option selected='selected' value=""><?php echo yii::t('vcos', '全部')?></option>
												<?php foreach ($postinfo as $k=>$v):?>				
																<option value="<?=$v['post_id']?>" <?=$v['post_id']==$post_id?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['post_cn_name'])?></option>
																<?php endforeach;?>
															</select>
											
										</div>
									</div>
							
												


									<center>
											
											<button type="submit" class="btn btn-purple btn-sm"  style="width:80px;height:41px">
																		<?php echo yii::t('vcos', '搜索')?>	
																			<i class="icon-search icon-on-right bigger-110"></i>
																		</button> 


											&nbsp; &nbsp; &nbsp;
										  <a href="assessment_attendance?t=4">	<button class="btn" type="button">
												<i class="icon-undo bigger-110"></i>
												<?php echo yii::t('vcos', '清空')?>
											</button>
											</a>
										</center>

								
									</div>
									</div>
									
									</div>
									
									    <div class="col-xs-12">
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
													
														<th><?php echo yii::t('vcos', '序号')?></th>
															<th><?php echo yii::t('vcos', '姓名')?></th>
														<th><?php echo yii::t('vcos', '部门')?></th>
														<th class="hidden-480"><?php echo yii::t('vcos', '职务')?></th>

														<th>
														
															<?php echo yii::t('vcos', '员工编码')?>
														</th>
														
																<th><?php echo yii::t('vcos', '剩余天数')?></th>
																	<th><?php echo yii::t('vcos', '更新时间')?></th>
																		
																		<th><?php echo yii::t('vcos', '操作')?></th>		
													</tr>
												</thead>

												<tbody>
													<?php foreach ($posts as $k=>$v):?>
													
														<tr>
														
														<td>
															<a href="#"><?=$k?></a>
														</td>
														
														 <td class="hidden-480">
                                                       	<?php echo yii::t('vcos',$v['cn_name'])?>
															
														</td>
														
														<td class="hidden-480">
														<?php echo yii::t('vcos',$v['department_name'])?>
														
														</td>
                                                       <td class="hidden-480">
                                                       	<?php echo yii::t('vcos',$v['post_cn_name'])?>
															
														</td>
														 <td class="hidden-480">
                                                       	<?php echo yii::t('vcos',$v['employee_code'])?>
															
														</td>
														
														<td class="hidden-480">
														<?php echo yii::t('vcos',$v['count_day'])?>
														
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['update_time'])?>
															
														</td>
														
												<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																
															
																<a class="btn btn-xs btn-info" href="editattendance?employee_code=<?php echo $v['employee_code']?>">
																	<i class="icon-edit bigger-120"></i>
																</a>
																	
															

															
															</div>

															<div class="visible-xs visible-sm hidden-md hidden-lg">
																<div class="inline position-relative">
																	<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
																		<i class="icon-cog icon-only bigger-110"></i>
																	</button>

																	<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
																		<li>
																			<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
																			</a>
																		</li>

																		<li>
																			<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>
														
													</tr>
												<?php endforeach;?>
											
													
														
												

												</tbody>
												
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
									<?php }?>	 
													<input type="hidden" name="t" value="4">
													 <!-- 分页 -->
													
                                          <div class="center" id="page_div4"></div>
                                          </form>
			</div>
	
	
</div>
</div>
</div>
	
		
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

			<!-- ---------------------------弹出框2---------------------------------- -->
	
								<!--  -->
								<div id="modal-table" class="modal fade" tabindex="-1">
									<div class="modal-dialog" style="width:690px">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													查看
												</div>
											</div>
                                        
											<div class="modal-body no-padding" id='ajaxinput'>
											  
												
											</div>

											<div class="modal-footer no-margin-top">
												<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
													<i class="icon-remove"></i>
													Close
												</button>

											
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- PAGE CONTENT ENDS -->
	<!-- ----------------------------------------------- -->
			<!-- --------------------------------请假弹出框---------------------------------- -->
			<?php if ($t==0){?>
			<form action="attendanceUpdate" method="post">
			<input type="hidden" name="mytype" value="leave">
				<input type="hidden" name="l_id" id="l_id">
<div id="modal-form" class="modal" tabindex="-1">
									<div class="modal-dialog" style="width:640px">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="blue bigger">请编辑</h4>
											</div>

											<div class="modal-body overflow-visible">
											<!-- ------------------ -->
												<table width="600">
  <tr>
    <td width="10" height="52">&nbsp;</td>
    <td width="300">
    <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '部门：')?></label>

										<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1" name="department_id">
												
											<?php foreach ($depinfo as $k=>$v):?>				
																<option value="<?=$v['department_id']?>" id="<?=$k?>a"><?php echo yii::t('vcos', $v['department_name'])?></option>
																<?php endforeach;?>
															
															</select>
        
        </div>
      </div>
      </td>
    <td width="300"><div class="form-group">
     		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '职务：')?></label>

										<div class="col-sm-9"  style="width:68%">
												<select class="form-control" id="form-field-select-1" name="post_id">
												
												<?php foreach ($postinfo as $k=>$v):?>				
																<option value="<?=$v['post_id']?>" id="<?=$k?>b"><?php echo yii::t('vcos', $v['post_cn_name'])?></option>
																<?php endforeach;?>
															</select>
        
        
        </div>
      </div></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td>
<div class="form-group">
         <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '姓名:')?></label>
      <div class="col-sm-9" >
       <input type="text" style="width:90%" name="cn_name" readonly="readonly"  id="1" class="col-xs-10 col-sm-5" />
        </div>
        </div>
      </td>
    <td><div class="form-group">
     <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '员工编号:')?> </label>

        <div class="col-sm-9" >
          <input type="text"  readonly="readonly" style="width:90%" name="employee_code"   id="2"  class="col-xs-10 col-sm-5" />
          </div>
      </div></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '请假类型:')?></label>
      
      <div class="col-sm-9"  style="width:68%">
      	<select class="form-control" id="form-field-select-1" name="leave_id">
												
												<?php foreach ($leaveinfo as $k=>$v):?>				
																<option value="<?=$v['leave_id']?>" id="<?=$k?>c"><?php echo yii::t('vcos', $v['leave_type'])?></option>
																<?php endforeach;?>
															</select>
        
        
        </div>
      </div></td>
    <td>
    <div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '累计天数:')?> </label>

        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="count_day"   id="3"  class="col-xs-10 col-sm-5" />
          </div>
        </div>
    </td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '开始时间:')?>  </label>

										<div class="col-sm-9" style="width:68%">
										<input  name="date_of_start" id='4'  class="col-xs-10 col-sm-5" style="width:90%"  type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" />
											
										</div>
        </div></td>
    <td><div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '结束时间:')?>  </label>

										<div class="col-sm-9" style="width:68%">
										<input  name="date_of_end" id="5" class="col-xs-10 col-sm-5" style="width:90%"  type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"/>
											
										</div>
        </div></td>
  </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td colspan="2">
      <div>备注
        <textarea class="form-control" id="6" name="remark" placeholder="Default Text"></textarea>
        </div>
      </td>
  </tr>
  
                                              </table>
																						<!--  -->
										  </div>

											<div class="modal-footer">
												<button class="btn btn-sm" type="button" data-dismiss="modal">
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
								</div><!-- PAGE CONTENT ENDS -->
								</form>
								<?php }?>
<!-- -------------------------------------------------------------------- -->
			
<!-- --------------------------------休假弹出框---------------------------------- -->
			<?php if ($t==1){?>
			<form action="attendanceUpdate" method="post">
			<input type="hidden" name="mytype" value="holiday">
			<input type="hidden" name="h_id" id="h_id">
<div id="modal-form1" class="modal" tabindex="-1">
									<div class="modal-dialog" style="width:640px">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="blue bigger">请编辑</h4>
											</div>

											<div class="modal-body overflow-visible">
											<!-- ------------------ -->
												<table width="600">
  <tr>
    <td width="10" height="52">&nbsp;</td>
    <td width="300">
    <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '部门：')?></label>

										<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1" name="department_id">
												
											<?php foreach ($depinfo as $k=>$v):?>				
																<option value="<?=$v['department_id']?>" id="<?=$k?>a"><?php echo yii::t('vcos', $v['department_name'])?></option>
																<?php endforeach;?>
															
															</select>
        
        </div>
      </div>
      </td>
    <td width="300"><div class="form-group">
     		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '职务:')?></label>

										<div class="col-sm-9"  style="width:68%">
												<select class="form-control" id="form-field-select-1" name="post_id">
												
												<?php foreach ($postinfo as $k=>$v):?>				
																<option value="<?=$v['post_id']?>" id="<?=$k?>b"><?php echo yii::t('vcos', $v['post_cn_name'])?></option>
																<?php endforeach;?>
															</select>
        
        
        </div>
      </div></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td>
<div class="form-group">
         <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '姓名:')?></label>
      <div class="col-sm-9" >
       <input type="text" style="width:90%" name="cn_name" readonly="readonly"  id="1" class="col-xs-10 col-sm-5" />
        </div>
        </div>
      </td>
    <td><div class="form-group">
     <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '员工编号:')?> </label>

        <div class="col-sm-9" >
          <input type="text"  readonly="readonly" style="width:90%" name="employee_code"   id="2"  class="col-xs-10 col-sm-5" />
          </div>
      </div></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '休假类型:')?></label>
      
      <div class="col-sm-9"  style="width:68%">
      	<select class="form-control" id="form-field-select-1" name="holiday_id">
												
												<?php foreach ($holidayinfo as $k=>$v):?>				
																<option value="<?=$v['holiday_id']?>" id="<?=$k?>c"><?php echo yii::t('vcos', $v['holiday_type'])?></option>
																<?php endforeach;?>
															</select>
        
        
        </div>
      </div></td>
    <td>
    <div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '累计天数:')?> </label>

        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="count_day"   id="3"  class="col-xs-10 col-sm-5" />
          </div>
        </div>
    </td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '开始时间:')?>  </label>

										<div class="col-sm-9" style="width:68%">
										<input  name="date_of_start" id='4'  class="col-xs-10 col-sm-5" style="width:90%"  type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" />
											
										</div>
        </div></td>
    <td><div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '结束时间:')?>  </label>

										<div class="col-sm-9" style="width:68%">
										<input  name="date_of_end" id="5"  class="col-xs-10 col-sm-5" style="width:90%" type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" />
											
										</div>
        </div></td>
  </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td colspan="2">
      <div>备注
        <textarea class="form-control" id="6" name="remark" placeholder="Default Text"></textarea>
        </div>
      </td>
  </tr>
  
                                              </table>
																						<!--  -->
										  </div>

											<div class="modal-footer">
												<button class="btn btn-sm" type="button" data-dismiss="modal">
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
								</div><!-- PAGE CONTENT ENDS -->
								</form>
								<?php }?>
<!-- -------------------------------------------------------------------- -->
			<!-- --------------------------------添加请假弹出框---------------------------------- -->
			<?php if ($t==0){?>
			<form action="attendanceAdd" method="post">
		
			<input type="hidden" name="mytype" value="leave">
<div id="modal-form1add" class="modal" tabindex="-1">
									<div class="modal-dialog" style="width:640px">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="blue bigger">请编辑</h4>
											</div>

											<div class="modal-body overflow-visible">
											<!-- ------------------ -->
												<table width="600">
  <tr>
    <td width="10" height="52">&nbsp;</td>
    <td width="300">
    <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '部门：')?></label>

										<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1" name="department_id">
												
											<?php foreach ($depinfo as $k=>$v):?>				
																<option value="<?=$v['department_id']?>" ><?php echo yii::t('vcos', $v['department_name'])?></option>
																<?php endforeach;?>
															
															</select>
        
        </div>
      </div>
      </td>
    <td width="300"><div class="form-group">
     		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '职务：')?></label>

										<div class="col-sm-9"  style="width:68%">
												<select class="form-control" id="form-field-select-1" name="post_id">
												
												<?php foreach ($postinfo as $k=>$v):?>				
																<option value="<?=$v['post_id']?>"><?php echo yii::t('vcos', $v['post_cn_name'])?></option>
																<?php endforeach;?>
															</select>
        
        
        </div>
      </div></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td>
<div class="form-group">
         <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '姓名:')?></label>
     <div class="col-sm-9"  style="width:68%">
												<select class="form-control" id="cn_name" name="cn_name" onchange="showHin()">
												<option  value="<?=$nameinfo[0]['employee_code']?>" selected="selected" ><?php echo yii::t('vcos', $nameinfo[0]['cn_name'])?></option>
												<?php foreach ($nameinfo as $k=>$v):?>
												<?php if($k!=0){?>				
																<option value="<?=$v['employee_code']?>"><?php echo yii::t('vcos', $v['cn_name'])?></option>
																<?php }?>
																<?php endforeach;?>
															</select>
        </div>
      </td>
    <td><div class="form-group">
     <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '员工编号:')?> </label>

        <div class="col-sm-9" >
          <input type="text" id='employee_code' readonly="readonly" style="width:90%" name="employee_code" value="<?php echo $nameinfo[0]['employee_code']?>"  class="col-xs-10 col-sm-5" />
          </div>
      </div></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '请假类型:')?></label>
      
      <div class="col-sm-9"  style="width:68%">
      	<select class="form-control" id="form-field-select-1" name="leave_id">
												
												<?php foreach ($leaveinfo as $k=>$v):?>				
																<option value="<?=$v['leave_id']?>" ><?php echo yii::t('vcos', $v['leave_type'])?></option>
																<?php endforeach;?>
															</select>
        
        
        </div>
      </div></td>
    <td>
    <div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '累计天数:')?> </label>

        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="count_day"    class="col-xs-10 col-sm-5" />
          </div>
        </div>
    </td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '开始时间:')?>  </label>

										
														 <div class="col-sm-9" >
          <input type="text" style="width:90%" name="date_of_start" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"  class="col-xs-10 col-sm-5" />
          </div>
        </div></td>
    <td><div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '结束时间:')?>  </label>
										 <div class="col-sm-9" >
          <input type="text" style="width:90%" name="date_of_end" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"  class="col-xs-10 col-sm-5" />
          </div>
        </div></td>
  </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td colspan="2">
      <div>备注
        <textarea class="form-control"  name="remark" placeholder="Default Text"></textarea>
        </div>
      </td>
  </tr>
  
                                              </table>
																						<!--  -->
										  </div>

											<div class="modal-footer">
												<button class="btn btn-sm" type="button" data-dismiss="modal">
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
								</div><!-- PAGE CONTENT ENDS -->
								</form>
								<?php }?>
<!-- -------------------------------------------------------------------- -->
			
<!-- --------------------------------添加休假弹出框---------------------------------- -->
			<?php if ($t==1){?>
			<form action="attendanceAdd" method="post">
			<input type="hidden" name="mytype" value="holiday">
<div id="modal-form2add" class="modal" tabindex="-1">
									<div class="modal-dialog" style="width:640px">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="blue bigger">请编辑</h4>
											</div>

											<div class="modal-body overflow-visible">
											<!-- ------------------ -->
												<table width="600">
  <tr>
    <td width="10" height="52">&nbsp;</td>
    <td width="300">
    <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '部门：')?></label>

										<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1" name="department_id">
												
											<?php foreach ($depinfo as $k=>$v):?>				
																<option value="<?=$v['department_id']?>" ><?php echo yii::t('vcos', $v['department_name'])?></option>
																<?php endforeach;?>
															
															</select>
        
        </div>
      </div>
      </td>
    <td width="300"><div class="form-group">
     		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '职务：')?></label>

										<div class="col-sm-9"  style="width:68%">
												<select class="form-control" id="form-field-select-1" name="post_id">
												
												<?php foreach ($postinfo as $k=>$v):?>				
																<option value="<?=$v['post_id']?>"><?php echo yii::t('vcos', $v['post_cn_name'])?></option>
																<?php endforeach;?>
															</select>
        
        
        </div>
      </div></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td>
<div class="form-group">
         <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '姓名:')?></label>
     <div class="col-sm-9"  style="width:68%">
												<select class="form-control" id="cn_name" name="cn_name" onchange="showHin()">
												<option  value="<?=$nameinfo[0]['employee_code']?>" selected="selected" ><?php echo yii::t('vcos', $nameinfo[0]['cn_name'])?></option>
												<?php foreach ($nameinfo as $k=>$v):?>
												<?php if($k!=0){?>				
																<option value="<?=$v['employee_code']?>"><?php echo yii::t('vcos', $v['cn_name'])?></option>
																<?php }?>
																<?php endforeach;?>
															</select>
        </div>
      </td>
    <td><div class="form-group">
     <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '员工编号:')?> </label>

        <div class="col-sm-9" >
          <input type="text" id='employee_code' readonly="readonly" style="width:90%" name="employee_code" value="<?php echo $nameinfo[0]['employee_code']?>"  class="col-xs-10 col-sm-5" />
          </div>
      </div></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '休假类型:')?></label>
      
      <div class="col-sm-9"  style="width:68%">
      	<select class="form-control" id="form-field-select-1" name="holiday_id">
												
												<?php foreach ($holidayinfo as $k=>$v):?>				
																<option value="<?=$v['holiday_id']?>" ><?php echo yii::t('vcos', $v['holiday_type'])?></option>
																<?php endforeach;?>
															</select>
        
        
        </div>
      </div></td>
    <td>
    <div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '累计天数:')?> </label>

        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="count_day"    class="col-xs-10 col-sm-5" />
          </div>
        </div>
    </td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '开始时间:')?>  </label>

										
														 <div class="col-sm-9" >
          <input type="text" style="width:90%" name="date_of_start" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"  class="col-xs-10 col-sm-5" />
          </div>
        </div></td>
    <td><div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '结束时间:')?>  </label>
										 <div class="col-sm-9" >
          <input type="text" style="width:90%" name="date_of_end" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"  class="col-xs-10 col-sm-5" />
          </div>
        </div></td>
  </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td colspan="2">
      <div>备注
        <textarea class="form-control"  name="remark" placeholder="Default Text"></textarea>
        </div>
      </td>
  </tr>
  
                                              </table>
																						<!--  -->
										  </div>

											<div class="modal-footer">
												<button class="btn btn-sm" type="button" data-dismiss="modal">
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
								</div><!-- PAGE CONTENT ENDS -->
								</form>
								<?php }?>
<!-- -------------------------------------------------------------------- -->	
   <input type="hidden" id="whereform" value="<?php echo $t?>"><!-- 按全部删除的时候，，检测时档案查询的还是离职档案的 -->
		  <?php
                    //批量删除确认框
                    $this->widget('ConfirmWidget',array(
                        'div_id'=>'dialog-confirm-multi',
                        'title_id'=>'isempty1',
                        'title_content'=>yii::t('vcos', '这些选中的记录将被永久删除，并且无法恢复。'),
                        'confirm_id'=>'isempty2',
                    ));
                ?>	
							
								
									
									
									<?php
   	//设置容器配置挂件
	$this->widget('settingsContainerWidget');
?>
<?php
    $this->widget('scrollUpWidget');
?>
 
<script src="<?php echo $theme_url; ?>/assets/js/jquery-ui-1.10.3.full.min.js"></script><!-- 弹出删除  -->
      <script src="<?php echo $theme_url; ?>/assets/js/jqPaginator.js"></script>
									<script type="text/javascript">
									/* 新增弹出框 ，使用ajax */
									function showHin()
									{
										 var str=document.getElementById("cn_name").value;
										
										
									var xmlhttp;
									if (str.length==0)
									  { 
									  document.getElementById("employee_code").value="";
									  return;
									  }
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
										   
										  document.getElementById("employee_code").value=xmlhttp.responseText;
										 /*  var dataObj = eval("("+xmlhttp.responseText+")");
										  $.each(dataObj,function(idx,item){  
											   //输出 
											   alert(item.id+"哈哈"+item.name);  
											}) */
									    }
									  }
									xmlhttp.open("GET","/information/ajaxtrain?employee_code="+str,true);
									xmlhttp.send();
									}


									/* 弹出框2 ，使用ajax */
									function showHint(str)
									{
									
									var xmlhttp;
									if (str.length==0)
									  { 
									  document.getElementById("txtHint").innerHTML="";
									  return;
									  }
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
										 
										   
										  document.getElementById("ajaxinput").innerHTML=xmlhttp.responseText;
										 /*  var dataObj = eval("("+xmlhttp.responseText+")");
										  $.each(dataObj,function(idx,item){  
											   //输出 
											   alert(item.id+"哈哈"+item.name);  
											}) */
									    }
									  }
									xmlhttp.open("GET","/assessment/ajaxdata?employee_code="+str,true);
									xmlhttp.send();
									}


									function alertinfo(post){//请假弹出框
										info=post.split("/");
										
										
										for(var i=0;i<<?php echo sizeof($depinfo)?>;i++){
											if(document.getElementById(i+"a").value==info[0]){
												document.getElementById(i+"a").selected='selected';
												}
										
										}
										for(var i=0;i<<?php echo sizeof($postinfo)?>;i++){
											if(document.getElementById(i+"b").value==info[1]){
												document.getElementById(i+"b").selected='selected';
												}
										
										}
										for(var i=0;i<<?php echo sizeof($leaveinfo)?>;i++){
										if(document.getElementById(i+"c").value==info[4]){
										document.getElementById(i+"c").selected='selected';
										}
										}
										document.getElementById('1').value=info[2];
										document.getElementById('2').value=info[3];
										document.getElementById('3').value=info[5];
										document.getElementById('4').value=info[6];
										document.getElementById('5').value=info[7];
										document.getElementById('6').value=info[8];
										document.getElementById('l_id').value=info[9];
										}
									
									/* 休假弹出框 */
									function alertholiday(myholiday){
										holiday=myholiday.split("/");
									
										
										for(var i=0;i<<?php echo sizeof($depinfo)?>;i++){
											if(document.getElementById(i+"a").value==holiday[0]){
												document.getElementById(i+"a").selected='selected';
												}
										
										}
										for(var i=0;i<<?php echo sizeof($postinfo)?>;i++){
											if(document.getElementById(i+"b").value==holiday[1]){
												document.getElementById(i+"b").selected='selected';
												}
										
										}
										for(var i=0;i<<?php echo sizeof($leaveinfo)?>;i++){
											if(document.getElementById(i+"c").value==holiday[4]){
												document.getElementById(i+"c").selected='selected';
												}
										
										}
										
										
										document.getElementById('1').value=holiday[2];
										document.getElementById('2').value=holiday[3];
										document.getElementById('3').value=holiday[5];
										document.getElementById('4').value=holiday[6];
										document.getElementById('5').value=holiday[7];
										document.getElementById('6').value=holiday[8];
										document.getElementById('h_id').value=holiday[9];
										
										
										}
									jQuery(function($) {
										   $('table th input:checkbox').on('click' , function(){//批量删除
									            var that = this;
									            $(this).closest('table').find('tr > td:first-child input:checkbox')
									            .each(function(){
									                this.checked = that.checked;
									                $(this).closest('tr').toggleClass('selected');
									            });
									        });
									        $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
									            _title: function(title) {
									                var $title = this.options.title || '&nbsp;'
									                if( ("title_html" in this.options) && this.options.title_html == true )
									                    title.html($title);
									                else title.text($title);
									            }
									        }));
									        $( "button[name=deleteallbutton]" ).on('click', function(e) {
										       
									            e.preventDefault();
									            $( "#dialog-confirm-multi").removeClass('hide').dialog({
									                closeOnEscape:false, 
									                open:function(event,ui){$(".ui-dialog-titlebar-close").hide();} ,
									                resizable: false,
									                modal: true,
									                title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '删除选中的记录？')?></h4></div>",
									                title_html: true,
									                buttons: [
									                    {
									                        html: "<i class='icon-trash bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '删除？')?>",
									                        "class" : "btn btn-danger btn-xs ",
									                        "id" :"danger",
									                        click: function() {
									                        	var whereform=$("#whereform").val();
									                        if(whereform==0){
									                        	$(".isdeleteall").val("1");
									                            $("form#member_list").submit();
									                        }
									                        else if(whereform==1){
									                        	$(".isdeleteall").val("2");
									                            $("form#member_list1").submit();
									                        }
									                            $( this ).dialog( "close" );
									                        }
									                    }
									                    ,
									                    {
									                        html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
									                        "class" : "btn btn-xs ",
									                        click: function() {
									                            $('#danger').show();
									                            $('.widget-header h4').html("<i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '删除选中的记录！')?>");
									                            $('#isempty1').html("<?php echo yii::t('vcos', '这些选中的记录将被永久删除，并且无法恢复。')?>");
									                            $('#isempty2').show();
									                            $( this ).dialog( "close" );
									                        }
									                    }
									                ]
									            });
									            if(!$('.isclick').is(':checked')){
									                $('#danger').hide();
									                $('.widget-header h4').html("<i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '没有选中！')?>");
									                $('#isempty1').html("<?php echo yii::t('vcos', '请选择删除项。')?>");
									                $('#isempty2').hide();
									            }
									            
									        });
									/* 获取参数 */
										
									
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
									      //分页
										     var page = <?php echo $page;?>;
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

										        //分页
											     var page = <?php echo $page;?>;
											        $('#page_div2').jqPaginator({
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
											                    $("form#member_list2").submit();
											                }
											            }
											        });
											        //分页
												     var page = <?php echo $page;?>;
												        $('#page_div4').jqPaginator({
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
												                    $("form#member_list4").submit();
												                }
												            }
												        });
													 //删除
											        $( ".delete" ).on('click', function(e) {
											            var $a = $(this).attr("id");
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
												                      
											                            location.href="<?php echo Yii::app()->createUrl("Assessment/attendanceUpdate");?>"+"?del_id="+$a;
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
					 							/*  文件上传*/	
			
													
													$('#id-input-file-1 , #id-input-file-2').ace_file_input({
														no_file:'No File ...',
													
														droppable:false,
														onchange:null,
														thumbnail:false //| true | large
													
													});
													
													$('#id-input-file-3').ace_file_input({
														style:'well',
														btn_choose:'Drop files here or click to choose',
														btn_change:null,
														
														droppable:true,
														thumbnail:'small'//large | fit
													
														,
														preview_error : function(filename, error_code) {
															
														}
												
													}).on('change', function(){
													
														
													});
													
												
													//dynamically change allowed formats by changing before_change callback function
													$('#id-file-format').removeAttr('checked');
													$('#modal-form input[type=file]').ace_file_input({
														style:'well',
														btn_choose:'Drop files here or click to choose',
														btn_change:null,
													
														droppable:true,
														thumbnail:'large'
													})
													
													
													$('#modal-form').on('shown.bs.modal', function () {
														$(this).find('.chosen-container').each(function(){
															$(this).find('a:first-child').css('width' , '210px');
															$(this).find('.chosen-drop').css('width' , '210px');
															$(this).find('.chosen-search input').css('width' , '200px');
														});
													})
											
													
												
												
													 //监听文件域选中文件
												    $("input[name='import_input']").change(function(){
												        
												        var fileName = $(this).val();
												        var extStart  = fileName.lastIndexOf(".")+1;
												        var fileext1 = fileName.substring(extStart,fileName.length).toLowerCase(); 
												        var allowtype =  ["xls","xlsx"];
												        if ($.inArray(fileext1,allowtype) == -1)
												        {
												            alert("请输入正确格式的excel文件!");
												            return false;
												        }
												       
												    });
																									
												
												
												
												
												
												
												});
									</script>                                         

									</body>
									