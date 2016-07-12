
<?php

    $this->pageTitle = Yii::t('vcos','员工证书管理');
    $theme_url = Yii::app()->theme->baseUrl;
    $menu_type = 'information_certificate';
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
												<li <?php echo $t==0?"class='active'":"" ?>>
													<a href="information_certificate?t=0" >证书信息查询</a>
												</li>

												<li <?php echo $t==1?"class='active'":"" ?>>
													<a href="information_certificate?t=1">即将到期证书</a>
												</li>
                                                <li <?php echo $t==2?"class='active'":"" ?>>
													<a href="information_certificate?t=2">证书年审</a>
												</li>
												
											</ul>

											<div class="tab-content">
												<div id="selectzheng" <?php echo $t==0?"class='tab-pane in active'":"class='tab-pane'" ?> style="height:2000px">
												<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工信息管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工证书管理'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
												
												
												 <form id='member_list' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Information/information_certificate");?>" autocomplete="off" >
                                                     
										<table width="764">
										  <tr>
										    <td width="40" height="52">   <input type='hidden' name='page' value="<?php echo $page;?>">
                                                        <input type='hidden' name='isPage' value="1">	</td>
										    <td width="355">
										     <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '员工编号')?> </label>
        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="employee_code" value="<?php echo $employee_code; ?>"   id="form-field-3" placeholder="员工编号" class="col-xs-10 col-sm-5" />
          </div>
        </div>
						      </td>
						    <td width="353"> <div class="form-group">
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
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '证书类型：')?></label>

										<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1" name="certificate_id">
												<option selected='selected' value=""><?php echo yii::t('vcos', '全部')?></option>
												<?php foreach ($certificate as $k=>$v):?>				
																<option value="<?=$v['certificate_id']?>" <?=$v['certificate_id']==$certificate_id?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['certificate_name'])?></option>
																<?php endforeach;?>
															</select>
											
										</div>
									</div></td>
    <td><div class="form-group">
						          <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '证书名称：')?> </label>
						          <div class="col-sm-9" >
						            <input type="text" style="width:90%" name="certificate_name" value="<?php echo $certificate_name?>"  id="form-field-3" placeholder="<?php echo yii::t('vcos', '证书名称')?> " class="col-xs-10 col-sm-5" />
					              </div>
						          </div></td>
  </tr>
  <tr>
    <td height="47">&nbsp;</td>
    <td><div class="form-group">
						          <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '证书编号：')?></label>
						          <div class="col-sm-9" >
						            <input type="text" style="width:90%" name="certificate_number" value="<?php echo $certificate_number?>"  id="form-field-3" placeholder="<?php echo yii::t('vcos', '证书编号')?>" class="col-xs-10 col-sm-5" />
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
										  <a href="information_certificate">	<button class="btn" type="button" value="清空">
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
														
														<th> <?php echo yii::t('vcos', '序号')?></th>
														<th> <?php echo yii::t('vcos', '员工编码')?></th>
														<th class="hidden-480"> <?php echo yii::t('vcos', '员工卡号')?></th>

														<th>
														
															 <?php echo yii::t('vcos', '姓名')?>
														</th>
															<th> <?php echo yii::t('vcos', '性别')?></th>
																<th> <?php echo yii::t('vcos', '部门')?></th>
																	<th> <?php echo yii::t('vcos', '职务')?></th>
																		<th> <?php echo yii::t('vcos', '证书类型')?></th>
																			<th> <?php echo yii::t('vcos', '证书名称')?></th>
																				<th> <?php echo yii::t('vcos', '证书编号')?></th>
																					<th> <?php echo yii::t('vcos', '签发日期')?></th>
														

														<th> <?php echo yii::t('vcos', '有效期至')?></th>
													</tr>
												</thead>

												<tbody>
												<?php foreach ($posts as $k=>$v):?>
													<tr>
														<td>
															<a href="#"><?=$k?></a>
														</td>
														<td><?=$v['employee_code']?></td>
														<td class="hidden-480"><?=$v['employee_card_number']?></td>
														<td><?=$v['cn_name']?></td>

														<td class="hidden-480">
															<?=$v['sex']?>
														</td>
														<td class="hidden-480">
															<?=$v['department_name']?>
														</td>
                                                       <td class="hidden-480">
															<?=$v['post_cn_name']?>
													  </td>
														<td class="hidden-480">
															<?=$v['certificate_type']?>
														</td>
														<td class="hidden-480">
															<?=$v['certificate_name']?>
														</td>
														<td class="hidden-480">
															<?=$v['certificate_number']?>
														</td>
														<td class="hidden-480">
															<?=$v['date_of_issue']?>
														</td>
														<td>
															<?=$v['date_of_end']?>		
														</td>
													</tr>
													<?php endforeach;?>
												</tbody>
												
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
											
										
                                                 <!--    $this->widget('MyCLinkPager',array(
                                                        'pages'=>$pages,
                                                        'header'=>false,
                                                        'htmlOptions'=>array('class'=>'pagination'),
                                                        'firstPageLabel'=>yii::t('vcos', '首页'),
                                                        'lastPageLabel'=>yii::t('vcos', '尾页'),
                                                        'prevPageLabel'=>'«',
                                                        'nextPageLabel'=>'»',
                                                        'maxButtonCount'=>5,
                                                        'cssFile'=>false,
                                                        )); 
                                                    -->
                                         <!-- 分页 -->
                                          <div class="center" id="page_div"></div> 
                                        
									</form>
												     <center>	
																				
											  </div>
 												
												<div id="comeshu" <?php echo $t==1?"class='tab-pane in active'":"class='tab-pane'" ?> style="height:2000px">
												
															<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工信息管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工证书管理'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
												
												 <form id='member_list1' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Information/information_certificate");?>" autocomplete="off" >
													<table width="766">
  <tr>
    <td width="39" height="53">
    <input type='hidden' name='page' value="<?php echo $page;?>">
     <input type='hidden' name='isPage' value="1">
    </td>
    <td width="352">
      <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> <?php echo yii::t('vcos', '部门：')?></label>
        
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
    <td width="359"><div class="form-group">
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
      <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '证书类型：')?></label>
      
      <div class="col-sm-9"  style="width:68%">
      <select class="form-control" id="form-field-select-1" name="certificate_id">
												<option selected='selected' value=""><?php echo yii::t('vcos', '全部')?></option>
												<?php foreach ($certificate as $k=>$v):?>				
																<option value="<?=$v['certificate_id']?>" <?=$v['certificate_id']==$certificate_id?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['certificate_name'])?></option>
																<?php endforeach;?>
															</select>
        
        </div>
      </div></td>
    <td>
    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '到期时间:  ')?>  </label>

										<div class="col-sm-9" style="width:68%">
										<input  name="date_of_end"  class="form-control date-picker" class="col-xs-10 col-sm-5" style="width:90%" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" />
											
										</div>
								</div>
								    <!--  -->
								    </td>
								  </tr>
								  </table>
											
								
										<center>
											
											<button type="submit" class="btn btn-purple btn-sm" name="soso" value="搜索" style="width:80px;height:41px">
																			搜索
																			<i class="icon-search icon-on-right bigger-110"></i>
																		</button> 


											&nbsp; &nbsp; &nbsp;
										  <a href="information_certificate?t=1">	<button class="btn" type="button" value="清空">
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
													
														<th> <?php echo yii::t('vcos', '序号')?></th>
														<th> <?php echo yii::t('vcos', '员工编码')?></th>
														

														<th>
														
															 <?php echo yii::t('vcos', '姓名')?>
														</th>
															<th> <?php echo yii::t('vcos', '性别')?></th>
																<th> <?php echo yii::t('vcos', '部门')?></th>
																	<th> <?php echo yii::t('vcos', '职务')?></th>
																		<th> <?php echo yii::t('vcos', '证书类型')?></th>
																			<th> <?php echo yii::t('vcos', '证书名称')?></th>
																				<th> <?php echo yii::t('vcos', '证书编号')?></th>
																					<th> <?php echo yii::t('vcos', '签发日期')?></th>
														

														<th> <?php echo yii::t('vcos', '有效期至')?></th>
														<th>操作</th>
													</tr>
												</thead>

												<tbody>
													<?php foreach ($posts as $k=>$v):?>
													<tr>
															
														<td>
															<a href="#"><?=$k?></a>
														</td>
														<td><?php echo yii::t('vcos', $v['employee_code'])?></td>
														
														<td><?php echo yii::t('vcos', $v['cn_name'])?></td>

														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['sex'])?>
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['department_name'])?>
														</td>
                                                       <td class="hidden-480">
															<?php echo yii::t('vcos', $v['post_cn_name'])?>
													  </td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['certificate_code'])?>
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos', $v['certificate_name'])?>
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['certificate_number'])?>
														</td>
														<td class="hidden-480">
															<?=$v['date_of_issue']?>
														</td>
														<td>
															<?=$v['date_of_end']?>
														</td>
														<td>
														 <button class="btn btn-xs btn-pink" onclick="alertinfo('<?php echo $v['cn_name'].','.$v['certificate_code'].','.$v['certificate_name'].','.$v['certificate_number'] .','.$v['train_organization'].','.$v['issue_organization'].','.$v['issue_official'].','.$v['date_of_issue'].','.$v['date_of_start'].','.$v['date_of_end'].','. $v['employee_code'].','. $v['id'];?>');" type="button" href="#modal-form" role="button"   data-toggle="modal">
												
												换证
											</button>
										
														</td>
													</tr>
													<?php endforeach;?>
												</tbody>
												
											</table>
														
												
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
												<input type="hidden" name="t" value="1"><!--  在哪个div的标识 -->
													<!-- 分页 -->
												<div class="center" id="page_div1"></div> 	
												</form>
												</div>
									
					
													<!-- 离职档案 -->
													<div id="adjudgezheng" <?php echo $t==2?"class='tab-pane in active'":"class='tab-pane'" ?> style="height:2000px">
													
																	<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工信息管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工证书管理'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
														
														 <form id='member_list2' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Information/information_certificate");?>" autocomplete="off" >
												
												
													<table width="862">
  <tr>
    <td width="27" height="52">
    <input type='hidden' name='page' value="<?php echo $page;?>">
     <input type='hidden' name='isPage' value="1">
    </td>
    <td width="325">
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
    <td >	<label style="font-size:14;margin-top:-20%;margin-left:30%">
                                     <?php echo yii::t('vcos', '年审时间: ')?>  </label></td>
    <td width="200"> <div class="form-group">
										<label style="width:10%" class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '从 ')?>  </label>

										<div class="col-sm-9" style="width:90%">
										<input  name="date_of_audit_s"  class="form-control date-picker" class="col-xs-10 col-sm-5" style="width:90%" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" />
											
										</div>
								</div></td>
    <td width="207">
    <div class="form-group">
										<label style="width:10%" class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '至 ')?>  </label>

										<div class="col-sm-9" style="width:90%">
										<input  name="date_of_audit_e"  class="form-control date-picker" class="col-xs-10 col-sm-5" style="width:90%" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" />
											
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
										  <a href="information_certificate?t=2">	<button class="btn" type="button" value="清空">
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
														<th>  <?php echo yii::t('vcos', '序号')?></th>
														<th>  <?php echo yii::t('vcos', '员工编码')?></th>
														

														<th>
														
															  <?php echo yii::t('vcos', '姓名')?>
														</th>
															<th>  <?php echo yii::t('vcos', '性别')?></th>
																<th>  <?php echo yii::t('vcos', '部门')?></th>
																	<th>  <?php echo yii::t('vcos', '职务')?></th>
																		<th>  <?php echo yii::t('vcos', '证书类型')?></th>
																			<th>  <?php echo yii::t('vcos', '证书名称')?></th>
																				<th>  <?php echo yii::t('vcos', '证书编号')?></th>
																					<th>  <?php echo yii::t('vcos', '年审日期')?></th>
														

					
															<th>操作</th>
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
														<td><?php echo yii::t('vcos', $v['employee_code'])?></td>
														
														<td><?php echo yii::t('vcos', $v['cn_name'])?></td>

														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['sex'])?>
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['department_name'])?>
														</td>
                                                       <td class="hidden-480">
															<?php echo yii::t('vcos', $v['post_cn_name'])?>
													  </td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['certificate_code'])?>
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos', $v['certificate_name'])?>
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['certificate_number'])?>
														</td>
														<td class="hidden-480">
															<?=$v['date_of_audit']?>
														</td>
														
														
														<td>
														 <a class="btn btn-xs btn-pink" href="certificateoption?id=<?php echo $v['id']?>&t=<?php echo $t?>">
												
															年审
														</a>
														</td>
										
														
													</tr>
													<?php endforeach;?>
														
													

												</tbody>
												
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
												
											<input type="hidden" name="t" value="2"><!--  在哪个div的标识 -->
													<!-- 分页 -->
												<div class="center" id="page_div2"></div> 	
												</form>			
													
													
													
													
											  </div>
													
												</div>

												
											</div>
										</div>
									</div><!-- /span -->
							</div>
	
	
	
	


				

					
			
									
								
									
									
									<?php
   	//设置容器配置挂件
	$this->widget('settingsContainerWidget');
?>
<?php
    $this->widget('scrollUpWidget');
?>

          	<!-- --------------------------------弹出框---------------------------------- -->

<div id="modal-form" class="modal" tabindex="-1">
<form method="post" action="certificate_alert">
<input type="hidden" name="cid" id="cid">
									<div class="modal-dialog" style="width:630px">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="blue bigger">请编辑</h4>
											</div>

											<div class="modal-body overflow-visible">
											<!-- ------------------ -->
												<table width="600">
  <tr>
    <td width="1" >&nbsp;</td>
    <td width="265">  <label class="col-sm-3 control-label no-padding-right" for="form-field-3" style="width:100%">姓名：<label id='0'></label>
   <input type="hidden"  name="employee_code" id=10>
      </td>
    <td width="268">  <label class="col-sm-3 control-label no-padding-right" for="form-field-3" style="width:100%">证书类型：<label id='1'></label></label></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td>  <label class="col-sm-3 control-label no-padding-right" for="form-field-3" style="width:100%">证书名称

      ：<label id='2'></label></label></td>
    <td><div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3" >证书编号: </label>
        <div class="col-sm-9" >
          <input type="text" style="width:90%"  name="certificate_number"   id="3" class="col-xs-10 col-sm-5" />
          </div>
        </div></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3">培训机构: </label>
        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="train_organization"  id="4"  class="col-xs-10 col-sm-5" />
          </div>
        </div></td>
    <td>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3">签发机关: </label>
        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="issue_organization"   id="5"  class="col-xs-10 col-sm-5" />
          </div>
        </div>
    </td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3">签发官员: </label>
        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="issue_official"   id="6"  class="col-xs-10 col-sm-5" />
          </div>
        </div></td>
    <td><div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3">签发日期: </label>
        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="date_of_issue"  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"  id="7"  class="col-xs-10 col-sm-5" />
          </div>
        </div></td>
  </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td>
     <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3">有效时始: </label>
        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="date_of_start" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"  id="8"  class="col-xs-10 col-sm-5" />
          </div>
        </div>
      </td>
    <td><div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3">有效期至: </label>
        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="date_of_end" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"   id="9"  class="col-xs-10 col-sm-5" />
          </div>
        </div></td>
  </tr>
  
                                              </table>
																						<!--  -->
										  </div>

											<div class="modal-footer">
												<button type="button" class="btn btn-sm" data-dismiss="modal">
													<i class="icon-remove"></i>
													取消
												</button>

												<button  class="btn btn-sm btn-primary">
													<i class="icon-ok"></i>
													
                                                                                                                           保存
												</button>
											</div>
										</div>
									</div>
									<div class="center" id="page_div2"></div> 
									 </form>
								</div><!-- PAGE CONTENT ENDS -->
								
								<!-- -------------------------------------------------------------------- -->
									<script src="<?php echo $theme_url; ?>/assets/js/jqPaginator.js"></script>
									<script type="text/javascript">
									function alertinfo(post){
										info=post.split(",");
										document.getElementById('0').innerHTML=info[0];
										document.getElementById('1').innerHTML=info[1];
										document.getElementById('2').innerHTML=info[2];
										document.getElementById('cid').value=info[11];
										for(var i=0;i<info.length-1;i++){
											if(i>2){
										document.getElementById(i).value=info[i];
											}
										}
										}
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
									                    $("input[name='isPage'").val(2);
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
									                    $("input[name='isPage'").val(2);
									                    $("form#member_list1").submit();
									                }
									            }
									        });

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
									                    $("input[name='isPage'").val(2);
									                    $("form#member_list2").submit();
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
									