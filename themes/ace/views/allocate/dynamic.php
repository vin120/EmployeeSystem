
<?php

    $this->pageTitle = Yii::t('vcos','船员动态管理');
    $theme_url = Yii::app()->theme->baseUrl;
    $menu_type = 'allocate_dynamic';
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








<link href="<?php echo $theme_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/font-awesome.min.css" />
			<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/jquery-ui-1.10.3.custom.min.css" />
		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/chosen.css" />
		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/datepicker.css" />
		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/daterangepicker.css" />
		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/colorpicker.css" />

		<!-- fonts -->

		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/ace-fonts.css" />

		<!-- ace styles -->

		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/ace-skins.min.css" />
<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/font-awesome.min.css" />

		

		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/ace-skins.min.css" />

<link href="<?php echo $theme_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/font-awesome.min.css" />

		

		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/dropzone.css" />

		<!-- fonts -->

		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/ace-fonts.css" />

		<!-- ace styles -->

		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/ace-skins.min.css" />

		
		<script src="<?php echo $theme_url; ?>/assets/js/ace-extra.min.js"></script>


<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo $theme_url; ?>/assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

	

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo $theme_url; ?>/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
	<script src="<?php echo $theme_url; ?>/assets/js/bootstrap.min.js"></script>
		<script src="<?php echo $theme_url; ?>/assets/js/typeahead-bs2.min.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/chosen.jquery.min.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/fuelux/fuelux.spinner.min.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/date-time/bootstrap-datepicker.min.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/date-time/bootstrap-timepicker.min.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/date-time/moment.min.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/date-time/daterangepicker.min.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/jquery.knob.min.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/jquery.autosize.min.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/bootstrap-tag.min.js"></script>




	<body>
	
	
	<div class="col-sm-6" style="width:100%">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												

												
                                                <li <?php echo $t==0?"class='active'":''?>>
													<a href="allocate_dynamic?t=0" >船员动态维护</a>
												</li>
												  <li <?php echo $t==1?"class='active'":''?>>
													<a href="allocate_dynamic?t=1" >船员动态查询</a>
												</li>
												
												
											</ul>

											<div class="tab-content">
												

												
											
													     
														
													
												
												
									
					<!--  第一个div-->
													<!-- 离职档案 -->
													<div id="protectresult" <?php echo $t==0?"class='tab-pane in active'":"class='tab-pane'" ?> style="height:2000px">
													
														<!-- 标题 -->
																<div class="page-header">
			                                    <h1> 
			                                        <?php echo Yii::t('vcos','员工调配管理');?>
			                                        <small>
			                                            <i class="icon-double-angle-right"></i>
			                                            <?php echo Yii::t('vcos','船员动态管理'); ?>
			                                        </small>
			                                    </h1>
			                            </div><!-- /.page-header -->
													
														 <form id='member_list' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Allocate/allocate_dynamic");?>" autocomplete="off" >
										 			<input type='hidden' name='page' value="<?php echo $page;?>">
                                                       <input type='hidden' name='isPage' value="1">
												
												
													<table width="748">
  <tr>
    <td width="26" height="52">&nbsp;</td>
    <td width="353">
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '员工编号:')?> </label>
        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="employee_code" value="<?php echo $employee_code; ?>"   id="form-field-3" placeholder="<?php echo yii::t('vcos', '员工编号')?>" class="col-xs-10 col-sm-5" />
          </div>
        </div>
      </td>
    <td width="353"><div class="form-group">
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
											<option selected='selected' value=""><?php echo yii::t('vcos', '全部：')?></option>
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
												<option selected='selected' value=""><?php echo yii::t('vcos', '全部：')?></option>
												<?php foreach ($postinfo as $k=>$v):?>				
																<option value="<?=$v['post_id']?>" <?=$v['post_id']==$post_id?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['post_cn_name'])?></option>
																<?php endforeach;?>
															</select>
											
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
										  <a href="profile">	<button class="btn" type="button" >
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
														<th>	<?php echo yii::t('vcos', '序号')?></th>
													
																<th>	<?php echo yii::t('vcos', '职务')?></th>
																	<th>	<?php echo yii::t('vcos', '员工编码')?></th>
																		<th>	<?php echo yii::t('vcos', '姓名')?></th>
																			<th>	<?php echo yii::t('vcos', '性别')?></th>
																			<th>	<?php echo yii::t('vcos', '入职时间')?></th>
																			<th>	<?php echo yii::t('vcos', '所学专业')?></th>
                                                                            <th>	<?php echo yii::t('vcos', '最高学历')?></th>
                                                                            <th>	<?php echo yii::t('vcos', '操作')?></th>
					
															
													</tr>
												</thead>

												<tbody>
													<?php foreach ($posts as $k=>$v):?>
													<?php if ($t==0){?>
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
                                                       	<?php echo yii::t('vcos',$v['post_cn_name'])?>
															
														</td>
                                                      
														 <td class="hidden-480">
                                                       	<?php echo yii::t('vcos',$v['employee_code'])?>
															
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['cn_name'])?>
															
														</td>
														<td class="hidden-480">
														<?php echo yii::t('vcos',$v['sex'])?>
														
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['date_of_entry'])?>
															
														</td>
														<td class="hidden-480">
														
															<?php echo yii::t('vcos',$v['major'])?>
															
														</td>
														<td class="hidden-480">
														<?php for($i=0;$i<sizeof($educate);$i++){
															
															if ($i==$v['education']){
															?>
															<?php echo yii::t('vcos',$educate[$i])?>
															<?php } }?>
															
														</td>
													<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																

																<button class="btn btn-xs btn-info" >
																	
																	<i class="icon-edit bigger-120"></i>
																	
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
												<?php } endforeach;?>
												</tbody>
												
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
												
														
													
														 <!-- 分页 -->
                                          <div class="center" id="page_div"></div> 
                                        
									</form>					
													
													
											  </div>
													
												
	<!-- 第二个div -->
		<div id="selectresult" <?php echo $t==1?"class='tab-pane in active'":"class='tab-pane'" ?> style="height:2000px">
		<!-- --------------------------------------------- -->
		
			<!-- 标题 -->
																<div class="page-header">
			                                    <h1> 
			                                        <?php echo Yii::t('vcos','员工调配管理');?>
			                                        <small>
			                                            <i class="icon-double-angle-right"></i>
			                                            <?php echo Yii::t('vcos','船员动态管理'); ?>
			                                        </small>
			                                    </h1>
			                            </div><!-- /.page-header -->
		
		 <form id='member_list1' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Allocate/allocate_dynamic");?>" autocomplete="off" >
										 		
										 		
										 			<input type='hidden' name='page' value="<?php echo $page;?>">
                                                       <input type='hidden' name='isPage' value="1">
			<?php if ($t==1){?>
			<table width="756">
  <tr>
    <td width="37" height="52">&nbsp;</td>
    <td width="349">
      <div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '员工编号:')?> </label>
        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="employee_code" value="<?php echo $employee_code; ?>"   id="form-field-3" placeholder="<?php echo yii::t('vcos', '员工编号')?>" class="col-xs-10 col-sm-5" />
          </div>
        </div>
      </td>
    <td width="354"><div class="form-group">
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
											<option selected='selected' value=""><?php echo yii::t('vcos', '全部：')?></option>
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
												<option selected='selected' value=""><?php echo yii::t('vcos', '全部：')?></option>
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
											<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '船舶名称:')?></label>

										<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1" name="ship_id">
												<option selected='selected' value=""><?php echo yii::t('vcos', '全部：')?></option>
												<?php foreach ($shipinfo as $k=>$v):?>				
																<option value="<?=$v['ship_id']?>" <?=$v['ship_id']==$post_id?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['ship_name'])?></option>
																<?php endforeach;?>
															</select>
											
										</div>
									</div></td>
    <td></td>
  </tr>
  
</table>
			

		<center>
											
											<button type="submit" class="btn btn-purple btn-sm"  style="width:80px;height:41px">
																		<?php echo yii::t('vcos', '搜索')?>	
																			<i class="icon-search icon-on-right bigger-110"></i>
		  </button> 


											&nbsp; &nbsp; &nbsp;
										  <a href="profile">	<button class="btn" type="button" >
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
													
																<th><?php echo yii::t('vcos', '员工编号')?></th>
																	<th><?php echo yii::t('vcos', '姓名')?></th>
																		<th><?php echo yii::t('vcos', '当前部门')?></th>
																			<th><?php echo yii::t('vcos', '当前职务')?></th>
																			<th><?php echo yii::t('vcos', '当前状态')?></th>
														                    <th><?php echo yii::t('vcos', '所在船舶')?></th>
 																			<th><?php echo yii::t('vcos', '动态开始时间')?></th>
 																			<th><?php echo yii::t('vcos', '动态结束时间')?></th>
					
															
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
                                                       	<?php echo yii::t('vcos',$v['employee_code'])?>
															
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
															<?php echo yii::t('vcos',$v['employee_status'])?>
															
														</td>
														<td class="hidden-480">
														
															<?php echo yii::t('vcos',$v['ship_name'])?>
															
														</td>
														<td class="hidden-480">
														
															<?php echo yii::t('vcos',$v['start_time'])?>
															
														</td>
														<td class="hidden-480">
														
															<?php echo yii::t('vcos',$v['end_time'])?>
															
														</td>
												
													</tr>
												<?php  endforeach;?>

												</tbody>
												
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
												
												<?php }?>
		<!-- --------------------------------------------------- -->
											 <!-- 分页 -->
											 <input type="hidden" name="t" value="1">
                                          <div class="center" id="page_div1"></div> 
                                        
									     </form>				
		</div>
		
			
	</div>
	
</div>
</div>


				

					
			
									
								
									
									
									<?php
   	//设置容器配置挂件
	$this->widget('settingsContainerWidget');
?>
<?php
    $this->widget('scrollUpWidget');
?>
      <script src="<?php echo $theme_url; ?>/assets/js/jqPaginator.js"></script>
									<script type="text/javascript">

			
									jQuery(function($) {
									
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
									