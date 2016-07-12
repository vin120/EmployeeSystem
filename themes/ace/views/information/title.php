
<?php

    $this->pageTitle = Yii::t('vcos','员工职称管理');
    $theme_url = Yii::app()->theme->baseUrl;
    $menu_type = 'information_title';
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
												<li <?php echo $t==0?"class='active'":"" ?>>
													<a href="information_title?t=0" ><?php echo yii::t('vcos', '职称信息查询')?></a>
												</li>

												<li <?php echo $t==1?"class='active'":"" ?>>
													<a href="information_title?t=1"><?php echo yii::t('vcos', '职称年审')?></a>
												</li>
                                               
												
											</ul>

											<div class="tab-content">
												<div id="selectwork" <?php echo $t==0?"class='tab-pane in active'":"class='tab-pane'" ?> style="height:2000px">
												
															<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工信息管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工职称管理'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
												
							<form id='member_list' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Information/information_title");?>" autocomplete="off" >
							<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
									 <input type='hidden' name='page' value="<?php echo $page;?>">
                                      <input type='hidden' name='isPage' value="1">	
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <?php echo yii::t('vcos', '员工编号：')?> </label>

										<div class="col-sm-9">
											<input type="text" name="employee_code" value="<?php echo $employee_code; ?>"   id="form-field-3" placeholder="<?php echo yii::t('vcos', '员工编号：')?>"  id="form-field-1" class="col-xs-10 col-sm-5" />
										</div>
									</div>

						<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <?php echo yii::t('vcos', '姓名：')?> </label>

										<div class="col-sm-9">
											<input type="text"  name="cn_name" value="<?php echo $cn_name;?>"  placeholder="<?php echo yii::t('vcos', '姓名：')?>" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									
									
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> <?php echo yii::t('vcos', '部门：')?>  </label>

										<div class="col-sm-9" style="width: 33%;">
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
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2">   <?php echo yii::t('vcos', ' 职务：')?> </label>

										<div class="col-sm-9" style="width: 33%;">
										<select class="form-control" id="form-field-select-1" name="post_id">
												<option selected='selected' value=""><?php echo yii::t('vcos', '全部')?></option>
												<?php foreach ($postinfo as $k=>$v):?>				
																<option value="<?=$v['post_id']?>" <?=$v['post_id']==$post_id?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['post_cn_name'])?></option>
																<?php endforeach;?>
															</select>
											
										</div>
									</div>
									<center>
											
											<button type="submit" class="btn btn-purple btn-sm" style="width:80px;height:41px">
																			<?php echo yii::t('vcos', ' 搜索')?>
																			<i class="icon-search icon-on-right bigger-110"></i>
																		</button> 


											&nbsp; &nbsp; &nbsp;
										 <a href="information_title">	<button class="btn" type="button" value="清空">
												<i class="icon-undo bigger-110"></i>
												<?php echo yii::t('vcos', '清空')?>
											</button>
											</a>
										</center>
									</div>
									</div>
									
								
									

									<br/>				
	
										<div class="col-xs-12">
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th><?php echo yii::t('vcos', '序号')?></th>
														<th><?php echo yii::t('vcos', '员工编码')?></th>
														

														<th>
														
															<?php echo yii::t('vcos', '姓名')?>
														</th>
															<th><?php echo yii::t('vcos', '性别')?></th>
																<th><?php echo yii::t('vcos', '部门')?></th>
																	<th><?php echo yii::t('vcos', '职务')?></th>
																		<th><?php echo yii::t('vcos', '职称名称')?></th>
																			<th><?php echo yii::t('vcos', '职称等级')?></th>
																				<th><?php echo yii::t('vcos', '管理编码')?></th>
																					<th><?php echo yii::t('vcos', '签发日期')?></th>
														

														<th><?php echo yii::t('vcos', '生效日期')?></th>
													</tr>
												</thead>

												<tbody>
												<?php foreach ($posts as $k=>$v):?>
													<tr>
														<td>
															<a href="#"><?=$k?></a>
														</td>
														<td><?=$v['employee_code']?></td>
														
														<td><?php echo yii::t('vcos', $v['cn_name'])?></td>

														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['sex'])?>
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos', $v['department_name'])?>
														</td>
                                                       <td class="hidden-480">
														<?php echo yii::t('vcos', $v['post_cn_name'])?>	
													  </td>
														<td class="hidden-480">
														<?php echo yii::t('vcos', $v['title_name'])?>	
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos', $v['title_level'])?>
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos', $v['title_number'])?>
														</td>
														<td class="hidden-480">
														<?php echo yii::t('vcos', $v['date_of_issue'])?>
														</td>
														<td>
															<?php echo yii::t('vcos', $v['date_of_start'])?>
														</td>
													</tr>
													<?php endforeach;?>
												</tbody>
												
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
											  <!-- 分页 -->
											  <input type="hidden" name="t" value="0">
                                          <div class="center" id="page_div"></div> 
                                        
								       	</form>	
																				
											  </div>

												<div id="adjudgework" <?php echo $t==1?"class='tab-pane in active'":"class='tab-pane'" ?> style="height:2000px">
												<form id='member_list1' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Information/information_title");?>" autocomplete="off" >
													
															<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工信息管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工职称管理'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
													
														<table width="862">
  <tr>
    <td width="27" height="52">
    <input type='hidden' name='page' value="<?php echo $page;?>">
     <input type='hidden' name='isPage' value="1">
    </td>
    <td width="350">
        <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '证书类型：')?></label>
        
        <div class="col-sm-9"  style="width:68%">
        <select class="form-control" id="form-field-select-1" name="certificate_id">
												<option selected='selected' value=""><?php echo yii::t('vcos', '全部')?></option>
												<?php foreach ($certificate as $k=>$v):?>				
																<option value="<?=$v['certificate_id']?>" <?=$v['certificate_id']==$certificate_id?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['certificate_name'])?></option>
																<?php endforeach;?>
															</select>
          
          </div>
        </div>
      </td>
    <td >	<label style="font-size:14;margin-top:-27%;margin-left:10%">
                                     <?php echo yii::t('vcos', '年审时间: ')?>  </label></td>
    <td width="200"> <div class="form-group">
										<label style="width:10%" class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '从 ')?>  </label>

										<div class="col-sm-9" style="width:90%">
										<input  name="date_of_audit_st" value="<?php echo $date_of_audit_st;?>"  class="form-control date-picker" class="col-xs-10 col-sm-5" style="width:90%" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" />
											
										</div>
								</div></td>
    <td width="207">
    <div class="form-group">
										<label style="width:10%" class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '至 ')?>  </label>

										<div class="col-sm-9" style="width:90%">
										<input  name="date_of_audit_end" value="<?php echo $date_of_audit_end;?>"  class="form-control date-picker" class="col-xs-10 col-sm-5" style="width:90%" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" />
											
										</div>
								</div>
    </td>
  </tr>
  </table>
			

		<center>
											
											<button type="submit" class="btn btn-purple btn-sm" name="soso" value="搜索" style="width:80px;height:41px">
																		 <?php echo yii::t('vcos', '搜索 ')?>	
																			<i class="icon-search icon-on-right bigger-110"></i>
		  </button> 


											&nbsp; &nbsp; &nbsp;
										  <a href="information_title?t=1">	<button class="btn" type="button" value="清空">
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
														<th> <?php echo yii::t('vcos', '序号')?></th>
														<th> <?php echo yii::t('vcos', '员工编码')?></th>
														

														<th>
														 <?php echo yii::t('vcos', '姓名')?>
															
														</th>
															<th> <?php echo yii::t('vcos', '性别')?></th>
																<th> <?php echo yii::t('vcos', '部门')?></th>
																	<th> <?php echo yii::t('vcos', '职务')?></th>
																		<th> <?php echo yii::t('vcos', '职称名称')?></th>
																			<th> <?php echo yii::t('vcos', '职称等级')?></th>
																				<th> <?php echo yii::t('vcos', '职称编号')?></th>
																					<th> <?php echo yii::t('vcos', '年审日期')?></th>
														

														
															<th> <?php echo yii::t('vcos', '操作')?></th>
													</tr>
												</thead>

												<tbody>
													<?php foreach ($posts as $k=>$v):?>
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
														<td><?=$v['employee_code']?></td>
														
														<td><?php echo yii::t('vcos', $v['cn_name'])?></td>

														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['sex'])?>
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos', $v['department_name'])?>
														</td>
                                                       <td class="hidden-480">
														<?php echo yii::t('vcos', $v['post_cn_name'])?>	
													  </td>
														<td class="hidden-480">
														<?php echo yii::t('vcos', $v['title_name'])?>	
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos', $v['title_level'])?>
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos', $v['title_number'])?>
														</td>
														<td class="hidden-480">
														<?php echo yii::t('vcos', $v['date_of_audit'])?>
														</td>
														
														<td>
														 <a class="btn btn-xs btn-pink" href="titleoption?id=<?php echo $v['id']?>&t=<?php echo $t?>" type="button">
												
												<?php echo yii::t('vcos', '年审')?>
											</a>
														</td>
													</tr>
													<?php endforeach;?>
														
													

												</tbody>
												
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
												
														
											 <!-- 分页 -->
											 <input type="hidden" name="t" value="1">
                                          <div class="center" id="page_div1"></div> 
                                        
									</form>			
												
												</div>
									
					
													<!-- 离职档案 -->
													
	
	


				

					
			
									
								
									
									
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
									