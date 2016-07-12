
<?php

    $this->pageTitle = Yii::t('vcos','在船名单管理');
    $theme_url = Yii::app()->theme->baseUrl;
    $menu_type = 'allocate_list';
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
	
	
	<div class="col-sm-6" style="width:100%">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												

												
                                                <li class="active">
													<a data-toggle="tab" href="#protectresult">在船名单查询</a>
												</li>
												 
												
												
											</ul>

											<div class="tab-content">
												
<div style="float:left;width:11%;height:1000px;background-color:#e9e9e7;"></div>
	
												
												
									
													
													<!-- 离职档案 -->
													<div id="protectresult" class="tab-pane in active" style="height:2000px">
													
															<!-- 标题 -->
																<div class="page-header">
			                                    <h1> 
			                                        <?php echo Yii::t('vcos','员工调配管理');?>
			                                        <small>
			                                            <i class="icon-double-angle-right"></i>
			                                            <?php echo Yii::t('vcos','在船名单管理'); ?>
			                                        </small>
			                                    </h1>
			                            </div><!-- /.page-header -->
												
												<div style="margin-left:15%"><span  style="font-weight: bold;font-size:12px;">船舶名称：</span>东方神州号&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight: bold;font-size:12px;">实际在船人数：</span>5</div>
												<div id="line" style="margin-left:11%"></div>
													
													<table width="618">

  <tr>
    <td width="33" height="53">&nbsp;</td>
    <td width="288">
  <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"  style="width:60px">部门：</label>

										<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1">
																<option value="">&nbsp;</option>
																<option value="AL">Alabama</option>
																<option value="AK">Alaska</option>
																
															</select>
											
										</div>
									</div>
    </td>
    <td width="281"><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2" style="width:60px">职务：</label>

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
			



					
	
	
										<div style="margin-left:12%">
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
													
																<th>职务</th>
																	<th>员工编码</th>
																		<th>姓名</th>
																			<th>性别</th>
																			<th>入职时间</th>
																			<th>所学专业</th>
                                                                            <th>最高学历</th>
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

                                           
                                      
									</body>
									