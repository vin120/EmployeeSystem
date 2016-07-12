
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


<?php  ?>

<script type="text/javascript">
jQuery(function($) {
	
	
	
	


	

	/////////


});
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
		<link rel="stylesheet" href="<?php echo $theme_url; ?>/ssets/css/ace-rtl.min.css" />
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
<!-- ------------------------------------------ -->

	<link href="<?php echo $theme_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/font-awesome.min.css" />

	

		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/jquery-ui-1.10.3.full.min.css" />

		<!-- fonts -->

		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/ace-fonts.css" />

		<!-- ace styles -->

		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/ace-skins.min.css" />

	

		<script src="<?php echo $theme_url; ?>/assets/js/ace-extra.min.js"></script>


<!-- ----------------------------------------- -->
	<body>
		<!-- --------------------------------弹出框---------------------------------- -->
<div id="modal-form" class="modal" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="blue bigger">请编辑</h4>
											</div>

											<div class="modal-body overflow-visible">
											<!-- ------------------ -->
												<table width="559">
  <tr>
    <td width="10" height="52">&nbsp;</td>
    <td width="265">
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-2">请假类型：</label>
        
        <div class="col-sm-9"  style="width:68%">
          <select class="form-control" id="form-field-select-1">
            <option value="">&nbsp;</option>
            <option value="AL">Alabama</option>
            <option value="AK">Alaska</option>
            
            </select>
          
          
          </div>
        </div>
      </td>
    <td width="268"><div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-3">天数: </label>
      <div class="col-sm-9" >
        <input type="text" style="width:90%" name="employee_code" value="<?=empty($info[0]['employee_code'])?'':$info[0]['employee_code'] ?>"  id="form-field-3" placeholder="cn_name" class="col-xs-10 col-sm-5" />
        </div>
      </div></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-3">开始时间: </label>
      <div class="col-sm-9" >
        <input type="text" style="width:90%" name="employee_code" value="<?=empty($info[0]['employee_code'])?'':$info[0]['employee_code'] ?>"  id="form-field-3" placeholder="cn_name" class="col-xs-10 col-sm-5" />
        </div>
      </div></td>
    <td><div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-3">结束时间: </label>
      <div class="col-sm-9" >
        <input type="text" style="width:90%" name="employee_code" value="<?=empty($info[0]['employee_code'])?'':$info[0]['employee_code'] ?>"  id="form-field-3" placeholder="cn_name" class="col-xs-10 col-sm-5" />
        </div>
      </div></td>
  </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td colspan="2">
      <div>内容
        <textarea class="form-control" id="form-field-8" placeholder="Default Text"></textarea>
        </div>
      </td>
  </tr>
  
                                              </table>
																						<!--  -->
										  </div>

											<div class="modal-footer">
												<button class="btn btn-sm" data-dismiss="modal">
													<i class="icon-remove"></i>
													取消
												</button>

												<button class="btn btn-sm btn-primary">
													<i class="icon-ok"></i>
													
                                                   保存
												</button>
											</div>
										</div>
									</div>
								</div><!-- PAGE CONTENT ENDS -->
<!-- -------------------------------------------------------------------- -->
	
			
	<div class="col-sm-6" style="width:100%">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
		
												 
												  <li class="active">
													<a data-toggle="tab" href="#admindate">假期管理</a>
												</li>
												
											</ul>

											<div class="tab-content">
												

											
									
					
													<!-- 离职档案 -->
												
												
	

			<div id="admindate" class="tab-pane in active" style="height:2000px">
			
			
				<div class="page-content">
		
					<table width="748">
  <tr>
    <td width="36">&nbsp;</td>
    <td width="172"><span style="font-weight:bold">档案编号：</span>234</td>
    <td width="165"><span style="font-weight:bold">员工编码：</span>32423</td>
    <td width="181"><span style="font-weight:bold">入职时间：</span>342</td>
    <td width="160"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span style="font-weight:bold">姓名：</span>324</td>
    <td><span style="font-weight:bold">性别：</span>32352</td>
    <td><span style="font-weight:bold">部门：</span>2432</td>
    <td><span style="font-weight:bold">职务：</span>32423</td>
  </tr>
</table>

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
														<th>部门</th>
														<th class="hidden-480">职务</th>

														<th>
														
															员工编码
														</th>
															<th>姓名</th>
																<th>剩余天数</th>
																	<th>更新时间</th>
																		
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
														<td class="hidden-480">3</td>
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
													
														
														<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																

															<button class="btn btn-xs btn-info" href="#modal-form" role="button"  data-toggle="modal">
																	
																	<i class="icon-edit bigger-120"></i>
																	
																</button>

																<button class="btn btn-xs btn-danger">
																	<i class="icon-trash bigger-120"></i>
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
											<center>
											<button class="btn btn-sm btn-primary" href="#modal-form" role="button"  data-toggle="modal">新增</button>
											<button class="btn btn-sm btn-primary">保存</button>
											<button class="btn btn-sm btn-primary">返回</button>
											</center>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
									
			</div>
	
	


				

					
			
									
								
									
									
									<?php
   	//设置容器配置挂件
	$this->widget('settingsContainerWidget');
?>
<?php
    $this->widget('scrollUpWidget');
?>

                                           
                                      
									</body>
									