
<?php

    $this->pageTitle = Yii::t('vcos','员工月度考核');
    $theme_url = Yii::app()->theme->baseUrl;
    $menu_type = 'assessment_month';
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


	<body>
	
	
	<div class="col-sm-6" style="width:100%">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												

												
                                                <li <?php echo $t==0?"class='active'":''?>>
													<a  href="assessment_month?t=0">考核结果维护</a>
												</li>
												  <li <?php echo $t==1?"class='active'":''?>>
													<a  href="assessment_month?t=1">考核结果查询</a>
												</li>
												 <li>
													<a  data-toggle="tab"  href="#inputresult">考核结果倒入</a>
												</li>
												
											</ul>

											<div class="tab-content">
												
											
													     
														
													
												
												
									
					
													<!-- 离职档案 -->
													<!-- -------------第一个div  -------------------------->
													<div id="protectresult" <?php echo $t==0?"class='tab-pane in active'":"class='tab-pane'" ?> style="height:2000px">
													
																	<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工考核管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工月度管理'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
													
														 <form id='member_list' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Assessment/assessment_month");?>" autocomplete="off" >
										 		<?php if ($t==0){?>
										 			<input type='hidden' name='page' value="<?php echo $page;?>">
                                                       <input type='hidden' name='isPage' value="1">
												
												
													<table width="760">
  <tr>
    <td width="30" height="52">&nbsp;</td>
    <td width="353">
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '员工编号:')?> </label>
        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="employee_code" value="<?php echo $employee_code; ?>"   id="form-field-3" placeholder="<?php echo yii::t('vcos', '员工编号')?>" class="col-xs-10 col-sm-5" />
          </div>
        </div>
      </td>
    <td width="361"><div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '姓名:')?> </label>
						          <div class="col-sm-9" >
						            <input type="text" style="width:90%"  name="cn_name" value="<?php echo $cn_name;?>"   id="form-field-3" placeholder="<?php echo yii::t('vcos', '姓名')?>" class="col-xs-10 col-sm-5" />
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
									<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '考核月份：')?></label>

										<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1" name="month_of_assessment">
												<option selected='selected' value=""><?php echo yii::t('vcos', '全部')?></option>
												<?php foreach ($month_assessmentinfo as $k=>$v):?>				
																<option value="<?=$v['month_of_assessment']?>" <?=$v['month_of_assessment']==$month_of_assessment?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['month_of_assessment'])?></option>
																<?php endforeach;?>
															</select>
											
										</div>
									</div></td>
    <td></td>
  </tr>
  
</table>
			

		<center>
											
											<button type="submit" class="btn btn-purple btn-sm" style="width:80px;height:41px">
																		<?php echo yii::t('vcos', '搜索')?>	
																			<i class="icon-search icon-on-right bigger-110"></i>
		  </button> 


											&nbsp; &nbsp; &nbsp;
										  <a href="assessment_month">	<button class="btn" type="button" >
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
														<th>  <label>
                                                                            <input type="checkbox" class="ace" />
                                                                            <span class="lbl"></span>
                                                                    </label></th>
														<th><?php echo yii::t('vcos', '序号')?>	</th>
														<th><?php echo yii::t('vcos', '姓名')?>	</th>
														<th><?php echo yii::t('vcos', '考核月份')?>	</th>
														

														<th>
														<?php echo yii::t('vcos', '部门')?>	
															
														</th>
															<th><?php echo yii::t('vcos', '职务')?>	</th>
																<th><?php echo yii::t('vcos', '员工编号')?>	</th>
																	
																		<th><?php echo yii::t('vcos', '总得分')?>	</th>
																			<th><?php echo yii::t('vcos', '绩效奖金')?>	</th>
																			
														

					
															<th><?php echo yii::t('vcos', '操作')?>	</th>
													</tr>
												</thead>

												<tbody>
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
															<?php echo yii::t('vcos',$v['cn_name'])?>
															
														</td>
														 <td class="hidden-480">
                                                       	<?php echo yii::t('vcos',$v['month_of_assessment'])?>
															
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
														<?php echo yii::t('vcos',$v['score'])?>
														
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['bonus'])?>
															
														</td>
													
										
														<td>
														<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																

															<button class="btn btn-xs btn-info" href="#modal-form" role="button"  data-toggle="modal" onclick="alertinfo('<?php echo  $v['department_id'].'/'.$v['post_id'].'/'.$v['cn_name'].'/'.$v['employee_code'].'/'.$v['month_of_assessment'].'/'.$v['score'].'/'.$v['bonus'].'/'.$v['remark']?>')">
																	
																	<i class="icon-edit bigger-120"></i>
																	
																</button>

																		 <?php
                                                                      
                                                                            $this->widget('ManipulateWidget',array(
                                                                                'ControllerName'=>'Information',
                                                                                'MethodName'=>'monthUpdate',
                                                                                'id'=>$v['id'],
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
												<?php endforeach;?>
											
														
													

												</tbody>
												
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
												  <input type="hidden" name="isdeleteall" class="isdeleteall" value="">
                                                  	 <div class="center">
                                                   <button name="deleteallbutton" class="btn btn-xs btn-warning">
													    <i class="icon-trash bigger-125"></i>
													    <span class="bigger-110 no-text-shadow"><?php echo yii::t('vcos', '删除选中')?></span>
													</button>
													</div>	
													<input type="hidden" name="t" value="0">
													
												 <!-- 分页 -->
                                          <div class="center" id="page_div"></div> 
                                        <?php }?>
									</form>					
													
											  </div>
													
												
	<!-- --------------------------------第二个div--------------------------- -->
		<div id="selectresult" <?php echo $t==1?"class='tab-pane in active'":"class='tab-pane'" ?> style="height:2000px">
		<!-- --------------------------------------------- -->
		
						<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工考核管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工月度管理'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
		
		 <form id='member_list1' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Assessment/assessment_month");?>" autocomplete="off" >
										 		<?php if ($t==1){?>
										 			<input type='hidden' name='page' value="<?php echo $page;?>">
                                                       <input type='hidden' name='isPage' value="1">
			<table width="757">
  <tr>
    <td width="38" height="52">&nbsp;</td>
    <td width="346">
      <div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '员工编号:')?> </label>
        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="employee_code" value="<?php echo $employee_code; ?>"   id="form-field-3" placeholder="<?php echo yii::t('vcos', '员工编号')?>" class="col-xs-10 col-sm-5" />
          </div>
        </div>
      </td>
    <td width="357"><div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '姓名:')?> </label>
						          <div class="col-sm-9" >
						            <input type="text" style="width:90%"  name="cn_name" value="<?php echo $cn_name;?>"   id="form-field-3" placeholder="<?php echo yii::t('vcos', '姓名')?>" class="col-xs-10 col-sm-5" />
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
											<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '考核月份：')?></label>

										<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1" name="month_of_assessment">
												<option selected='selected' value=""><?php echo yii::t('vcos', '全部')?></option>
												<?php foreach ($month_assessmentinfo as $k=>$v):?>				
																<option value="<?=$v['month_of_assessment']?>" <?=$v['month_of_assessment']==$month_of_assessment?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['month_of_assessment'])?></option>
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
										  <a href="assessment_month?t=1">	<button class="btn" type="button" >
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
														<th class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
														<th><?php echo yii::t('vcos', '序号')?>	</th>
														<th><?php echo yii::t('vcos', '考核月份')?>	</th>
														

														<th>
														<?php echo yii::t('vcos', '部门')?>	
															
														</th>
															<th><?php echo yii::t('vcos', '职务')?>	</th>
																<th><?php echo yii::t('vcos', '员工编号')?>	</th>
																	<th><?php echo yii::t('vcos', '姓名')?>	</th>
																		<th><?php echo yii::t('vcos', '总得分')?>	</th>
																			<th><?php echo yii::t('vcos', '绩效奖金')?>	</th>
																			
														

					
															
													</tr>
												</thead>

												<tbody>
													<?php foreach ($posts as $k=>$v):?>
													
														<tr>
														<td class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>

														<td>
															<a href="#"><?=$k?></a>
														</td>
														 <td class="hidden-480">
                                                       	<?php echo yii::t('vcos',$v['month_of_assessment'])?>
															
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
														<?php echo yii::t('vcos',$v['score'])?>
														
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['bonus'])?>
															
														</td>
													
										
													
													</tr>
												<?php endforeach;?>
											
														

												</tbody>
												
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
												
							<input type="hidden" name="t" value="1">
													
												 <!-- 分页 -->
                                          <div class="center" id="page_div1"></div> 
                                        <?php }?>
									</form>										
		<!-- --------------------------------------------------- -->
		</div>
			
			
			
				<!--------------- 第三个div ---------------------->
												<div id="inputresult" <?php echo $t==2?"class='tab-pane in active'":"class='tab-pane'" ?> style="height:2000px">
		<!-- --------------------------------------------- -->
		
						<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工考核管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工月度管理'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
			
					<form action="<?php echo $this->createUrl('/assessment/assessment_month/');?>" method="post" enctype="multipart/form-data">				              
							 <table >
							 <tr>
							<td  width='30%'></td>
							 <td height='70px' width='450px'><h3>月度考核导入</h3></td>		
							 </tr>
								<tr>
								<td ></td>
								<td ><input type="file" name="import_input" id="id-input-file-3"/>
									<input type="hidden" name='t' value="2">
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
								<td>点击<a href="<?php echo $this->createUrl('/assessment/downfile?name=month');?>">这里</a>下载模版,如果不按照这个模版将不能正常倒入数据,<br/>请不要在其他地方乱涂乱画，以免影响数据导入</td>
									</tr>
									</table> 
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
				
<!-- --------------------------------弹出框---------------------------------- -->
<div id="modal-form" class="modal" tabindex="-1">

<form action="MonthUpdate" method="post">
									<div class="modal-dialog" style="width: 640px">
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
     		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '部门:')?></label>

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
       <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '姓名:')?> </label>
						          <div class="col-sm-9" >
						            <input type="text" readonly="readonly"  style="width:90%"  name="cn_name"   id="a" class="col-xs-10 col-sm-5" />
					              </div>
        </div>
      </td>
    <td><div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '员工编号:')?> </label>
						          <div class="col-sm-9" >
						            <input type="text" readonly="readonly"  style="width:90%"  name="employee_code"   id="b" class="col-xs-10 col-sm-5" />
					              </div>
      </div></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
     	<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '考核月份:')?></label>

										<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1" name="month_of_assessment">
												
												<?php foreach ($month_assessmentinfo as $k=>$v):?>				
																<option value="<?=$v['month_of_assessment']?>" id="<?=$k?>c"><?php echo yii::t('vcos', $v['month_of_assessment'])?></option>
																<?php endforeach;?>
															</select>
        
        
        </div>
      </div></td>
  <td><div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '绩效奖金')?> </label>
						          <div class="col-sm-9" >
						            <input type="text" style="width:90%"  name="bonus"   id="d" class="col-xs-10 col-sm-5" />
					              </div>
        </div></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '考核分数:')?> </label>
						          <div class="col-sm-9" >
						            <input type="text" style="width:90%"  name="score"   id="c" class="col-xs-10 col-sm-5" />
					              </div>
        </div></td>
    <td></td>
  </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td colspan="2">
      <div>备注
        <textarea class="form-control" id="e" name='remark' placeholder="Default Text"></textarea>
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
									</form>
								</div><!-- PAGE CONTENT ENDS -->
<!-- -------------------------------------------------------------------- -->
	
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


									function alertinfo(post){
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
										for(var i=0;i<<?php echo sizeof($month_assessmentinfo)?>;i++){
											if(document.getElementById(i+"c").value==info[4]){
												document.getElementById(i+"c").selected='selected';
												}
										
										}
										
										
										document.getElementById('a').value=info[2];
										document.getElementById('b').value=info[3];
										document.getElementById('c').value=info[5];
										document.getElementById('d').value=info[6];
										document.getElementById('e').value=info[7];
										
										
										
										}
									jQuery(function($) {

										 $('table th input:checkbox').on('click' , function(){/* 批量删除jq */
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
									                        click: function() {
									                        	 location.href="<?php echo Yii::app()->createUrl("Assessment/monthUpdate");?>"+"?del_id="+$a;
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
									                        	$(".isdeleteall").val("1");           
									                            $("form#member_list").submit();
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




										        $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
										            _title: function(title) {
										                var $title = this.options.title || '&nbsp;'
										                if( ("title_html" in this.options) && this.options.title_html == true )
										                        title.html($title);
										                else title.text($title);
										            }
										        }));
											
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
									