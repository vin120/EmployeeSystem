
<?php

    $this->pageTitle = Yii::t('vcos','员工出勤考核');
    $theme_url = Yii::app()->theme->baseUrl;
    $menu_type = 'information_train';
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
	<!--  -->


				

	
	<div class="col-sm-6" style="width:100%">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li <?php echo $t==0?"class='active'":"" ?>>
													<a href="information_train?t=0" >培训信息维护</a>
												</li>

												<li <?php echo $t==1?"class='active'":"" ?>>
													<a href="information_train?t=1">培训信息查询</a>
												</li>

												
											</ul>

											<div class="tab-content">
												<div id="protectinfo" <?php echo $t==0?"class='tab-pane in active'":"class='tab-pane'" ?> style="height:2000px">
													
													<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工信息管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工培训管理'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
													
													
													<form id='member_list' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Information/information_train");?>" autocomplete="off" >
													 <input type='hidden' name='page' value="<?php echo $page;?>">
                                    				  <input type='hidden' name='isPage' value="1">	
													<div class="page-content">
						

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

							
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <?php echo yii::t('vcos', '员工编号：')?> </label>

										<div class="col-sm-9">
											<input type="text" name="employee_code" value="<?php echo $employee_code; ?>"   id="form-field-3" placeholder="<?php echo yii::t('vcos', '员工编号')?>"  id="form-field-1" class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <?php echo yii::t('vcos', '姓名：')?> </label>

										<div class="col-sm-9">
											<input type="text"  name="cn_name" value="<?php echo $cn_name;?>"  placeholder="<?php echo yii::t('vcos', '姓名')?>" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									
									
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 培训类型：</label>

										<div class="col-sm-9" style="width: 33%;">
												<select class="form-control" id="form-field-select-1" name="train_id">
											<option selected='selected' value=""><?php echo yii::t('vcos', '全部')?></option>
											<?php foreach ($traininfo as $k=>$v):?>				
																<option value="<?=$v['train_id']?>" <?=$v['train_id']==$train_id?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['train_name'])?></option>
																<?php endforeach;?>
															</select>
											
										</div>
									</div>
			


									<center>
											
											<button type="submit" class="btn btn-purple btn-sm" name="soso" value="搜索" style="width:80px;height:41px">
																		<?php echo yii::t('vcos', '搜索')?> 	
																			<i class="icon-search icon-on-right bigger-110"></i>
																		</button> 


											&nbsp; &nbsp; &nbsp;
										  <a href="information_train">	<button class="btn" type="button" value="清空">
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
														<th>  <label>
                                                                            <input type="checkbox" class="ace" />
                                                                            <span class="lbl"></span>
                                                                    </label></th>
														<th>	<?php echo yii::t('vcos', '序号')?> </th>
														<th>	<?php echo yii::t('vcos', '部门')?> </th>
														<th class="hidden-480">	<?php echo yii::t('vcos', '职务')?> </th>

														<th>
														
															<?php echo yii::t('vcos', '员工编码')?> 
														</th>
															<th>	<?php echo yii::t('vcos', '姓名')?> </th>
																<th>	<?php echo yii::t('vcos', '培训类型')?> </th>
																	<th>	<?php echo yii::t('vcos', '培训单位')?> </th>
																		<th>	<?php echo yii::t('vcos', '培训时间')?> </th>
																			<th>	<?php echo yii::t('vcos', '培训内容')?> </th>
																				<th>	<?php echo yii::t('vcos', '培训效果')?> </th>
																					
														

														<th><?php echo yii::t('vcos', '操作')?></th>
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
															<?php echo yii::t('vcos', $v['department_name'])?>
														</td>
														<td class="hidden-480">
														<?php echo yii::t('vcos', $v['post_cn_name'])?>	
													  </td>
														<td><?=$v['employee_code']?></td>
														
														<td><?php echo yii::t('vcos', $v['cn_name'])?></td>

														
                                                       
														<td class="hidden-480">
														<?php echo yii::t('vcos', $v['train_name'])?>	
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos', $v['train_organization'])?>
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos', $v['date_of_train'])?>
														</td>
														<td class="hidden-480">
														<?php echo yii::t('vcos', $v['train_content'])?>
														</td>
														<td>
															<?php echo yii::t('vcos', $v['train_effect'])?>
														</td>
															<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																
															
																<button class="btn btn-xs btn-info" href="#modal-form" role="button"  data-toggle="modal" onclick="alertinfo('<?php echo $v['employee_code'].','.$v['cn_name'].','.$v['date_of_train'].','.$v['train_id'] .','.$v['train_organization'].','.$v['train_content'].','.$v['train_effect'].','.$v['id']?>');">
																	
																	<i class="icon-edit bigger-120"></i>
																	
																</button>
																	
																	 <?php
                                                                      
                                                                            $this->widget('ManipulateWidget',array(
                                                                                'ControllerName'=>'Information',
                                                                                'MethodName'=>'trainUpdate',
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
									 <div class="center">
												   <input type="hidden" name="isdeleteall" class="isdeleteall" value="">
                                                     <button name="deleteallbutton" class="btn btn-xs btn-warning">
													    <i class="icon-trash bigger-125"></i>
													    <span class="bigger-110 no-text-shadow"><?php echo yii::t('vcos', '删除选中')?></span>
													</button>
                                                     <button class="btn btn-xs" href="#modal-form2" role="button"  data-toggle="modal">
                                                                <i class="icon-pencil align-top bigger-125"></i>
                                                                <span class="bigger-110 no-text-shadow">添加</span>
                                                            </button>
                                                </div>        
									 <!-- 分页 -->
											  <input type="hidden" name="t" value="0">
                                          <div class="center" id="page_div"></div> 
									</form>
									
										<!-- ------------------------------------------------------------------ -->

												</div>

												<div id="selectinfo" <?php echo $t==1?"class='tab-pane in active'":"class='tab-pane'" ?> style="height:2000px">
													
															<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工信息管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工培训管理'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
													
													<form id='member_list1' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Information/information_train");?>" autocomplete="off" >
													 <input type='hidden' name='page' value="<?php echo $page;?>">
                                    				  <input type='hidden' name='isPage' value="1">	
												<div class="page-content">
						

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <?php echo yii::t('vcos', '员工编号：')?> </label>

										<div class="col-sm-9">
											<input type="text" name="employee_code" value="<?php echo $employee_code; ?>"   id="form-field-3" placeholder="<?php echo yii::t('vcos', '员工编号')?>"  id="form-field-1" class="col-xs-10 col-sm-5" />
										</div>
									</div>

						<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <?php echo yii::t('vcos', '姓名：')?> </label>

										<div class="col-sm-9">
											<input type="text"  name="cn_name" value="<?php echo $cn_name;?>"  placeholder="<?php echo yii::t('vcos', '姓名')?>" class="col-xs-10 col-sm-5" />
										</div>
									</div>						
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '培训类型：')?></label>

										<div class="col-sm-9"  style="width:33%">
											  <select class="form-control" id="form-field-select-1" name="train_code">
												<option selected='selected' value=""><?php echo yii::t('vcos', '全部')?></option>
												<?php foreach ($traininfo as $k=>$v):?>				
																<option id='<?php echo $k?>' value="<?=$v['train_code']?>" ><?php echo yii::t('vcos', $v['train_name'])?></option>
																<?php endforeach;?>
															</select>
										</div>
									</div>
							
							
							
						
								
							
												


									<center>
											
											<button type="submit" class="btn btn-purple btn-sm" name="soso" value="搜索" style="width:80px;height:41px">
																		<?php echo yii::t('vcos', '	搜索')?>
																			<i class="icon-search icon-on-right bigger-110"></i>
																		</button> 


											&nbsp; &nbsp; &nbsp;
										  <a href="information_train?t=1">	<button class="btn" type="button" value="清空">
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
														<th class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
														<th><?php echo yii::t('vcos', '序号')?></th>
														<th><?php echo yii::t('vcos', '部门')?></th>
														<th class="hidden-480"><?php echo yii::t('vcos', '职务')?></th>

														<th>
														
														<?php echo yii::t('vcos', '员工编码')?>
														</th>
															<th><?php echo yii::t('vcos', '姓名')?></th>
																<th><?php echo yii::t('vcos', '培训类型')?></th>
																	<th><?php echo yii::t('vcos', '培训单位')?></th>
																		<th><?php echo yii::t('vcos', '培训时间')?></th>
																			<th><?php echo yii::t('vcos', '培训内容')?></th>
																				<th><?php echo yii::t('vcos', '培训内容')?></th>
																					
														

													
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
														<td class="hidden-480">
															<?php echo yii::t('vcos', $v['department_name'])?>
														</td>
														<td class="hidden-480">
														<?php echo yii::t('vcos', $v['post_cn_name'])?>	
													  </td>
														<td><?=$v['employee_code']?></td>
														
														<td><?php echo yii::t('vcos', $v['cn_name'])?></td>

														
                                                       
														<td class="hidden-480">
														<?php echo yii::t('vcos', $v['train_name'])?>	
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos', $v['train_organization'])?>
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos', $v['date_of_train'])?>
														</td>
														<td class="hidden-480">
														<?php echo yii::t('vcos', $v['train_content'])?>
														</td>
														<td>
															<?php echo yii::t('vcos', $v['train_effect'])?>
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
								
								</div><!-- /row -->
								
									
	</div>
	</div>
	

							

		<!-- --------------------------------弹出框---------------------------------- -->
<div id="modal-form" class="modal" tabindex="-1">
<form action='trainUpdate' method="post">
<input type="hidden" name="tid" id="tid">
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
  
      <label class="col-sm-3 control-label no-padding-right" for="form-field-2"style="width:100%"><?php echo yii::t('vcos', '员工编号：')?><label id="a"></label></label>
      <input type="hidden" name="employee_code" id='z'>
    
      </td>
    <td width="300">  <label class="col-sm-3 control-label no-padding-right" for="form-field-2"style="width:100%"><?php echo yii::t('vcos', '姓名：')?><label id="b"></label></label>
      </td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3">培训时间: </label>
        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="date_of_train" id="c" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="col-xs-10 col-sm-5" />
          </div>
        </div>
    </td>
    <td><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '培训类型:')?></label>

										<div class="col-sm-9"  style="width:68%">
											   <select class="form-control" id="form-field-select-1" name="train_id">
											
												<?php foreach ($traininfo as $k=>$v):?>				
																<option id='<?php echo $k?>' selected='' value="<?=$v['train_id']?>" ><?php echo yii::t('vcos', $v['train_name'])?></option>
																<?php endforeach;?>
															</select>
											
											
										</div>
									</div></td>
  </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td colspan="2"> <div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-3" style="width:90px">培训单位: </label>
      <div class="col-sm-9" >
        <input type="text" style="width:90%" name="train_organization"   id="d"  class="col-xs-10 col-sm-5" />
        </div>
    </div></td>
    </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td colspan="2">
    <div>
															<label for="form-field-8">培训内容</label>

															<textarea class="form-control" id="e" name="train_content"></textarea>
														</div>
    </td>
  </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td colspan="2">
       <div>培训效果
         <textarea class="form-control" id="f" name="train_effect"></textarea>
			  </div>
    </td>
  </tr>
  
                                              </table>
											<!--  -->
											</div>

											<div class="modal-footer">
												<button class="btn btn-sm" data-dismiss="modal" type="button">
													<i class="icon-remove"></i>
													取消
												</button>

												<button type="submit" class="btn btn-sm btn-primary">
													<i class="icon-ok"></i>
													
                                                   保存
												</button>
											</div>
										</div>
									</div>
									</form>
								</div><!-- PAGE CONTENT ENDS -->
<!-- -------------------------------------------------------------------- -->	


<!-- --------------------------------新增弹出框---------------------------------- -->
<div id="modal-form2" class="modal" tabindex="-1">
<form action='trainAdd' method="post">
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
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '姓名：')?> </label>
       <div class="col-sm-9"  style="width:68%">
											   <select class="form-control" id="cn_name" name="cn_name" onchange="showHint()">
											<option  value="<?=$nameinfo[0]['employee_code']?>" selected="selected" ><?php echo yii::t('vcos', $nameinfo[0]['cn_name'])?></option>
												<?php foreach ($nameinfo as $k=>$v):?>	
											              <?php if($k!=0){?>			
																<option  value="<?=$v['employee_code']?>" ><?php echo yii::t('vcos', $v['cn_name'])?></option>
																<?php }?>
																<?php endforeach;?>
															</select>
											
											
										</div>
        </div>
     
    
      </td>
    <td width="300">  
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '员工编号:')?>  </label>
        <div class="col-sm-9" >
          <input type="text" id='employee_code' style="width:90%" name="employee_code"  readonly="readonly" value="<?php echo $nameinfo[0]['employee_code']?>"   class="col-xs-10 col-sm-5" />
          </div>
        </div>
      </td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3">培训时间: </label>							 <div class="col-sm-9" >
          <input type="text" style="width:90%" name="date_of_train" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"  class="col-xs-10 col-sm-5" />
          </div>
        </div>
    </td>
    <td><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '培训类型:')?></label>

										<div class="col-sm-9"  style="width:68%">
											   <select class="form-control" id="form-field-select-1" name="train_id">
											
												<?php foreach ($traininfo as $k=>$v):?>				
																<option  value="<?=$v['train_id']?>" ><?php echo yii::t('vcos', $v['train_name'])?></option>
																<?php endforeach;?>
															</select>
											
											
										</div>
									</div></td>
  </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td colspan="2"> <div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-3" style="width:90px">培训单位: </label>
      <div class="col-sm-9" >
        <input type="text" style="width:90%" name="train_organization"   class="col-xs-10 col-sm-5" />
        </div>
    </div></td>
    </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td colspan="2">
    <div>
															<label for="form-field-8">培训内容</label>

															<textarea class="form-control" name="train_content"></textarea>
														</div>
    </td>
  </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td colspan="2">
       <div>培训效果
         <textarea class="form-control"  name="train_effect"></textarea>
			  </div>
    </td>
  </tr>
  
                                              </table>
											<!--  -->
											</div>

											<div class="modal-footer">
												<button class="btn btn-sm" data-dismiss="modal" type="button">
													<i class="icon-remove"></i>
													取消
												</button>

												<button type="submit" class="btn btn-sm btn-primary">
													<i class="icon-ok"></i>
													
                                                   保存
												</button>
											</div>
										</div>
									</div>
									</form>
								</div><!-- PAGE CONTENT ENDS -->
<!-- -------------------------------------------------------------------- -->				

			
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
<script src="<?php echo $theme_url; ?>/assets/js/jqPaginator.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/jquery-ui-1.10.3.full.min.js"></script><!-- 弹出删除  -->
<script type="text/javascript">

/* 新增弹出框 ，使用ajax */
function showHint()
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


								/* 弹出框参数 */
								function alertinfo(post){
										info=post.split(",");
										
										document.getElementById('a').innerHTML=info[0];
										document.getElementById('b').innerHTML=info[1];
										document.getElementById('c').value=info[2];
										document.getElementById('z').value=info[0];
										for(var i=0;i<<?php echo sizeof($traininfo)?>;i++){
											
											if(document.getElementById(i).value==info[3]){
											     alert(document.getElementById(i).value)
												document.getElementById(i).selected ='selected'; 
												}
										
										}	
										document.getElementById('d').value=info[4];
										document.getElementById('e').value=info[5];
										document.getElementById('f').value=info[6];
										document.getElementById('tid').value=info[7];
										
										
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
									                        	 location.href="<?php echo Yii::app()->createUrl("Information/trainUpdate");?>"+"?del_id="+$a;
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
														


													  $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
												            _title: function(title) {
												                var $title = this.options.title || '&nbsp;'
												                if( ("title_html" in this.options) && this.options.title_html == true )
												                        title.html($title);
												                else title.text($title);
												            }
												        }));
												
																
														});
									</script>
                                           
                                      
									</body>
									