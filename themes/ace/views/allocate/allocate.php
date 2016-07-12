
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
													<a href="allocate_allocate?t=0">船员预调配</a>
												</li>
                                                <li <?php echo $t==1?"class='active'":''?>>
													<a href="allocate_allocate?t=1">船员调配确认</a>
												</li>
												  <li <?php echo $t==2?"class='active'":''?>>
													<a href="allocate_allocate?t=2">船员调配查询</a>
												</li>
											</ul>
											<div class="tab-content">				
												<!-- 第一个div -->
												<div id="inputresult" <?php echo $t==0?"class='tab-pane in active'":"class='tab-pane'" ?> style="height:2000px">
																<!-- 标题 -->
																<div class="page-header">
			                                    <h1> 
			                                        <?php echo Yii::t('vcos','员工调配管理');?>
			                                        <small>
			                                            <i class="icon-double-angle-right"></i>
			                                            <?php echo Yii::t('vcos','船员调配管理'); ?>
			                                        </small>
			                                    </h1>
			                            </div><!-- /.page-header -->
												 <form id='member_list' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Allocate/allocate_allocate");?>" autocomplete="off" >
										 			<input type='hidden' name='page' value="<?php echo $page;?>">
                                                       <input type='hidden' name='isPage' value="1">
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
														<th><?php echo yii::t('vcos','序号')?></th>
														<th><?php echo yii::t('vcos','船舶名称')?></th>
														<th>
															<?php echo yii::t('vcos','船舶编码')?>
														</th>
															<th><?php echo yii::t('vcos','在船名单')?></th>
																<th><?php echo yii::t('vcos','船员最近调配')?></th>
																	<th><?php echo yii::t('vcos','船员调配')?></th>
																		
													</tr>
												</thead>

												<tbody>
												<?php if ($t==0){?>
													<?php foreach ($posts as $k=>$v):?>
													
													<tr>
													
														<td class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>

														<td>
															<a href="#"><?php echo $k?></a>
														</td>
														<td>	<?php echo yii::t('vcos',$v['ship_name'])?></td>
														
														<td>	<?php echo yii::t('vcos',$v['ship_code'])?></td>

														<td class="hidden-480">
						
															<a href="<?php echo Yii::app()->createUrl("Allocate/shipList?ship_id=".$v['ship_id']);?>"><button type="button" class="btn btn-sm btn-success">
																	<?php echo yii::t('vcos','查看在船名单')?>
																<i class="icon-arrow-right icon-on-right bigger-110"></i>
															</button></a>
															
														</td>
														<td class="hidden-480">
															<button type="button" class="btn btn-sm btn-success">
																	<?php echo yii::t('vcos','查看调配计划')?>
																<i class="icon-arrow-right icon-on-right bigger-110"></i>
															</button>
														 
														</td>
                                                       <td class="hidden-480">
                                                       	<button type="button" class="btn btn-sm btn-success">
																		<?php echo yii::t('vcos','新增调配')?>
																<i class="icon-arrow-right icon-on-right bigger-110"></i>
															</button>
														
													  </td>
														
													</tr>
													<?php endforeach; } ?>
												</tbody>
												
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
												
												<!-- ------------------------------- -->
													 <!-- 分页 -->
                                          <div class="center" id="page_div"></div> 
                                        
									</form>			     
														
													
												
												</div>
									
					
													<!-- 离职档案 -->
													<div id="protectresult" <?php echo $t==1?"class='tab-pane in active'":"class='tab-pane'" ?> style="height:2000px">
														<!-- 标题 -->
																<div class="page-header">
			                                    <h1> 
			                                        <?php echo Yii::t('vcos','员工调配管理');?>
			                                        <small>
			                                            <i class="icon-double-angle-right"></i>
			                                            <?php echo Yii::t('vcos','船员调配管理'); ?>
			                                        </small>
			                                    </h1>
			                            </div><!-- /.page-header -->
													
													 <form id='member_list1' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Allocate/allocate_allocate");?>" autocomplete="off" >
										 			<input type='hidden' name='page' value="<?php echo $page;?>">
                                                       <input type='hidden' name='isPage' value="1">
														
												
											<table width="768">
  <tr>
    <td width="45" height="52">&nbsp;</td>
    <td width="352">
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos','调令号: ')?></label>
        <div class="col-sm-9" >
           <input type="text"  name="cn_name" value="调令号"  id="form-field-3" placeholder="调令号" class="col-xs-10 col-sm-5" />
          </div>
        </div>
      </td>
    <td width="355"><div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos','船舶名称： ')?></label>
      
    	<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1" name="ship_id">
												<option selected='selected' value=""><?php echo yii::t('vcos', '全部：')?></option>
											
															
															</select>
        
        </div>
      </div></td>
  </tr>
  </table>

		<center>
											
											<button type="submit" class="btn btn-purple btn-sm"  style="width:80px;height:41px">
																		<?php echo yii::t('vcos','搜索 ')?>	
																			<i class="icon-search icon-on-right bigger-110"></i>
		  </button> 


											&nbsp; &nbsp; &nbsp;
										  <a href="profile">	<button class="btn" type="button" >
												<i class="icon-undo bigger-110"></i>
												<?php echo yii::t('vcos','清空')?>
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
														<th><?php echo yii::t('vcos','序号')?></th>
														<th><?php echo yii::t('vcos','调令号')?></th>
														

														<th>
														
															<?php echo yii::t('vcos','船舶名称')?>
														</th>
															<th><?php echo yii::t('vcos','船舶编码')?></th>
																<th><?php echo yii::t('vcos','预调配日期')?></th>
																	<th><?php echo yii::t('vcos','调配人员')?></th>
																		<th><?php echo yii::t('vcos','状态')?></th>
																			
																			
														

					
															<th><?php echo yii::t('vcos','操作')?></th>
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
												
														
												<!-- ------------------------------- -->
													 <!-- 分页 -->
													 <input type="hidden" name="t" value="1">
                                          <div class="center" id="page_div1"></div> 		
												</form>	
													
													
											  </div>
													
												
	<!-- 第二个div -->
		<div id="selectresult" <?php echo $t==2?"class='tab-pane in active'":"class='tab-pane'" ?> style="height:2000px">
			<!-- 标题 -->
																<div class="page-header">
			                                    <h1> 
			                                        <?php echo Yii::t('vcos','员工调配管理');?>
			                                        <small>
			                                            <i class="icon-double-angle-right"></i>
			                                            <?php echo Yii::t('vcos','船员调配管理'); ?>
			                                        </small>
			                                    </h1>
			                            </div><!-- /.page-header -->
		<!-- --------------------------------------------- -->
			 <form id='member_list2' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Allocate/allocate_allocate");?>" autocomplete="off" >
										 			<input type='hidden' name='page' value="<?php echo $page;?>">
                                                       <input type='hidden' name='isPage' value="1">
			<table width="755">
  <tr>
    <td width="38" height="52">&nbsp;</td>
    <td width="346">
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3">调令号: </label>
        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="employee_code" value="<?=empty($info[0]['employee_code'])?'':$info[0]['employee_code'] ?>"  id="form-field-3" placeholder="cn_name" class="col-xs-10 col-sm-5" />
          </div>
        </div>
      </td>
    <td width="355"><div class="form-group">
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
												
									 <!-- 分页 -->
													 <input type="hidden" name="t" value="2">
                                          <div class="center" id="page_div2"></div> 		
												</form>					
		<!-- --------------------------------------------------- -->
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
									     
			
																
									});
									</script>                                               
                                      
									</body>
									