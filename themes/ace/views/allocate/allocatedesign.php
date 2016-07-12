
<?php

    $this->pageTitle = Yii::t('vcos','船员调配管理');
    $theme_url = Yii::app()->theme->baseUrl;
    $menu_type = 'allocate_allocate';
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


<?php  ?>
<script type="text/javascript">
$(function(){

	
	
	
})；
</script>


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



	<body>
	<!-- ---------------------------弹出框2---------------------------------- -->
	
								<!--  -->
								<div id="modal-table" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													查看
												</div>
											</div>
                                        
											<div class="modal-body no-padding">
											   <div><span style="font-weight:bold">船舶名称：</span style="font-weight:bold">3411322&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight:bold">船舶编码：</span>fdsfsa&nbsp;&nbsp;</div>
											<div id="line" style="margin-left: 0px"></div>
												<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
													<thead>
														<tr>
															<th width="32">序号</th>
															<th width="34">部门</th>
															<th width="40">职务</th>

															<th width="60">员工编码</th>
																<th width="45">姓名</th>
																<th width="44">性别</th>
																<th width="70">上船时间</th>
																<th width="77">在船天数</th>
																<th width="81">累积假期(天)</th>
														</tr>
													</thead>

													<tbody>
														<tr>
															<td>
																1
															</td>
															<td>2</td>
															<td>3</td>
															<td>4</td>
															<td>5</td>
															<td>6</td>
															<td>7</td>
															<td>8</td>
															<td>9</td>
														</tr>	
													</tbody>
												</table>
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
	
	<div class="col-sm-6" style="width:100%">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												

												<li class="active">
													<a data-toggle="tab" href="#inputresult">船员预调配</a>
												</li>
                                                <li>
													<a data-toggle="tab" href="#protectresult">船员调配确认</a>
												</li>
												  <li>
													<a data-toggle="tab" href="#selectresult">船员调配查询</a>
												</li>
												
												
											</ul>

											<div class="tab-content">
												

												<div id="inputresult" class="tab-pane in active" style="height:2000px">
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
														<th>序号</th>
														<th>船舶名称</th>
														

														<th>
														
															船舶编码
														</th>
															<th>在船名单</th>
																<th>船员最近调配</th>
																	<th>船员调配</th>
																		
													</tr>
												</thead>

												<tbody>
													<tr>
													
														<td class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>

														<td>
															<a href="#">1</a>
														</td>
														<td>2</td>
														
														<td>4</td>

														<td class="hidden-480">
						
															<button type="button" class="btn btn-sm btn-success"  href="#modal-table" role="button" class="green" data-toggle="modal">
																查看在船名单
																<i class="icon-arrow-right icon-on-right bigger-110"></i>
															</button>
															
														</td>
														<td class="hidden-480">
															<button type="button" class="btn btn-sm btn-success">
																查看调配计划
																<i class="icon-arrow-right icon-on-right bigger-110"></i>
															</button>
														 
														</td>
                                                       <td class="hidden-480">
                                                       	<button type="button" class="btn btn-sm btn-success">
																	新增调配
																<i class="icon-arrow-right icon-on-right bigger-110"></i>
															</button>
														
													  </td>
														
													</tr>

												</tbody>
												
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
												
												<!-- ------------------------------- -->
													     
														
													
												
												</div>
									
					
													<!-- 离职档案 -->
													<div id="protectresult" class="tab-pane" style="height:2000px">
													
														
												
											<table width="1086">
  <tr>
    <td width="120" height="52">&nbsp;</td>
    <td width="476">
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3">调令号: </label>
        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="employee_code" value="<?=empty($info[0]['employee_code'])?'':$info[0]['employee_code'] ?>"  id="form-field-3" placeholder="cn_name" class="col-xs-10 col-sm-5" />
          </div>
        </div>
      </td>
    <td width="468"><div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-2">船舶名称：</label>
      
      <div class="col-sm-9"  style="width:68%">
        <select class="form-control" id="form-field-select-1">
          <option value="">&nbsp;</option>
          <option value="AL">Alabama</option>
          <option value="AK">Alaska</option>
          
          </select>
        
        </div>
      </div></td>
  </tr>
  </table>

		<center>
											
											<button type="submit" class="btn btn-purple btn-sm" name="soso" value="搜索" style="width:80px;height:41px">
																			搜索
																			<i class="icon-search icon-on-right bigger-110"></i>
		  </button> 


											&nbsp; &nbsp; &nbsp;
										  <a href="profile">	<button class="btn" type="button" value="清空">
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
														<th>序号</th>
														<th>调令号</th>
														

														<th>
														
															船舶名称
														</th>
															<th>船舶编码</th>
																<th>预调配日期</th>
																	<th>调配人员</th>
																		<th>状态</th>
																			
																			
														

					
															<th>操作</th>
													</tr>
												</thead>

												<tbody>
													<tr>
													
														<td class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>

														<td>
															<a href="#">1</a>
														</td>
														<td>2</td>
														
														<td>4</td>

														<td class="hidden-480">
															5
														</td>
														<td class="hidden-480">
															6
														</td>
                                                       <td class="hidden-480">
															7
													  </td>
														<td class="hidden-480">
															8
														</td>
														
														
														
														<td>
														<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																

																<button class="btn btn-xs btn-info">
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

												</tbody>
												
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
												
														
													
													
													
													
											  </div>
													
												
	
		<div id="selectresult" class="tab-pane" style="height:2000px">
		<!-- --------------------------------------------- -->
			<table width="1086">
  <tr>
    <td width="120" height="52">&nbsp;</td>
    <td width="476">
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3">调令号: </label>
        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="employee_code" value="<?=empty($info[0]['employee_code'])?'':$info[0]['employee_code'] ?>"  id="form-field-3" placeholder="cn_name" class="col-xs-10 col-sm-5" />
          </div>
        </div>
      </td>
    <td width="468"><div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-2">船舶名称：</label>
      
      <div class="col-sm-9"  style="width:68%">
        <select class="form-control" id="form-field-select-1">
          <option value="">&nbsp;</option>
          <option value="AL">Alabama</option>
          <option value="AK">Alaska</option>
          
          </select>
        
        </div>
      </div></td>
  </tr>
  </table>
			

		<center>
											
											<button type="submit" class="btn btn-purple btn-sm" name="soso" value="搜索" style="width:80px;height:41px">
																			搜索
																			<i class="icon-search icon-on-right bigger-110"></i>
		  </button> 


											&nbsp; &nbsp; &nbsp;
										  <a href="profile">	<button class="btn" type="button" value="清空">
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
														<th>序号</th>
														<th>调令号</th>
														

														<th>
														
															船舶名称
														</th>
															<th>船舶编码</th>
																<th>预调配日期</th>
																	<th>确认日期</th>
																		<th>调配人员</th>
																			<th>状态</th>
																			
														<th>操作</th>

					
															
													</tr>
												</thead>

												<tbody>
													<tr>
													
														<td class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>

														<td>
															<a href="#">1</a>
														</td>
														<td>2</td>
														
														<td>4</td>

														<td class="hidden-480">
															5
														</td>
														<td class="hidden-480">
															6
														</td>
                                                       <td class="hidden-480">
															7
													  </td>
														<td class="hidden-480">
															8
														</td>
														<td class="hidden-480">
															9
														</td>
														<td>
														<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																

																<button class="btn btn-xs btn-info">
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

												</tbody>
												
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
												
												
		<!-- --------------------------------------------------- -->
		</div>
			
	
	


				

					
			
									
								
									
									
									<?php
   	//设置容器配置挂件
	$this->widget('settingsContainerWidget');
?>
<?php
    $this->widget('scrollUpWidget');
?>

                                           
                                      
									</body>
									