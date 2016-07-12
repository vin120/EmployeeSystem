
<?php

    $this->pageTitle = Yii::t('vcos','员工添加管理');
    $theme_url = Yii::app()->theme->baseUrl;
    $menu_type = 'information_profile';
?>
<?php 
    //navbar 挂件
    $disable = 1;
    $this->widget('navbarWidget',array('disable'=>$disable));
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
		<script src="<?php echo $theme_url; ?>/assets/js/My97DatePicker/WdatePicker.js"></script>
		<script src="<?php echo $theme_url; ?>/assets/js/bootstrap.min.js"></script>
		<script src="<?php echo $theme_url; ?>/assets/js/typeahead-bs2.min.js"></script>
		<script src="<?php echo $theme_url; ?>/assets/js/ace-elements.min.js"></script>
		<script src="<?php echo $theme_url; ?>/assets/js/ace.min.js"></script>	
									<body>
									<div class="col-sm-6" style="width:1100px">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li class="active">
													<a data-toggle="tab" href="#baseinfo"><?php echo yii::t('vcos', '员工基本资料')?></a>
												</li>

												<li>
													<a data-toggle="tab" href="#credential"><?php echo yii::t('vcos', '员工证书')?></a>
												</li>

												<li>
													<a data-toggle="tab" href="#callofwork"><?php echo yii::t('vcos', '员工职称')?></a>
												</li>
												<li>
													<a data-toggle="tab" href="#contract"><?php echo yii::t('vcos', '员工合同')?></a>
												</li>
												<li>
													<a data-toggle="tab" href="#ageofwork"><?php echo yii::t('vcos', '员工资历')?></a>
												</li>
											</ul>
											<div class="tab-content">
											<!-- --------员工基本资料------------------------- -->
																
												<div id="baseinfo" class="tab-pane in active">
												<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工信息管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工档案管理'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
												
												<form action="addsave" method="post" enctype="multipart/form-data">
												<input type="hidden" name="employee_id" value="<?php echo isset($_GET['employee_id'])?$_GET['employee_id']:0?>">
													<div style="margin-left:30px"><h3><?php echo yii::t('vcos', '基本信息')?></h3></div>

						<table width="1836">
						<tr>
						  <td width="598"><div class="form-group">
						    <table width="1069" >
						      <tr height="40px">
						        <td width="17">&nbsp;</td>
						        <td width="343"><div class="form-group">
						          <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '员工编号:')?>  </label>
						          <div class="col-sm-9" >
						            <input type="text" readonly="true" style="width:90%" name="employee_code" value="<?=empty($info['employee_code'])?'':$info['employee_code'] ?>"  id="form-field-3" placeholder="<?php echo yii::t('vcos', '员工编号')?>" class="col-xs-10 col-sm-5" />
					              </div>
						          </div></td>
						        <td width="342"><div class="form-group">
						          <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '员工卡号:')?> </label>
						          <div class="col-sm-9">
						            <input type="text" style="width:90%" name="employee_card_number"  value="<?=empty($info['employee_card_number'])?'':$info['employee_card_number'] ?>"  placeholder="<?php echo yii::t('vcos', '员工卡号')?>" class="col-xs-10 col-sm-5" />
					              </div>
						          </div></td>
						        <td width="347" rowspan="5">
	  							<!-- 文件上传 -->
 								<span class="profile-picture">
													<img id="avatar" name='file'  class="editable img-responsive" alt="Alex's Avatar" src="<?php echo $theme_url; ?>/assets/avatars/profile-pic.jpg" />
												<input type="hidden" name="dir" value="addfile"/>
												</span>

												<div class="space-4"></div>
                                                                </td>
					          </tr>
						    <tr height="40px">
						        <td>&nbsp;</td>
						        <td><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> <?php echo yii::t('vcos', '船 员 状 态:')?> 	</label>
										<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1" name="employee_status">
															<?php foreach ($employee_status as $k=>$v):?>				
																<option value="<?=$k?>"  <?= isset($info['employee_status'])&&($k==$info['employee_status'])?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v);?></option>
																<?php endforeach;?>
															</select>
																
															
										</div>
										
									</div></td>
						        <td><div class="form-group">
						          <label class="col-sm-3 control-label no-padding-right" for="form-field-3"> <?php echo yii::t('vcos', '中文名：')?> </label>
						          <div class="col-sm-9" >
						            <input type="text" style="width:90%" name="cn_name" value="<?=empty($info['cn_name'])?'':$info['cn_name'] ?>"  id="form-field-3" placeholder="<?php echo yii::t('vcos', '中文名')?>" class="col-xs-10 col-sm-5" />
					              </div>
						          </div></td>
					          </tr>
						    <tr height="40px">
						        <td>&nbsp;</td>
						        <td>
                                       				<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                        FirstName: </label>

										<div class="col-sm-9" >
											<input type="text" style="width:90%" name="first_name" value="<?=empty($info['first_name'])?'':$info['first_name'] ?>"  id="form-field-1" placeholder="first_name" class="col-xs-10 col-sm-5" />
										</div>
									</div>   
                                </td>
						        <td><div class="form-group">
						          <label class="col-sm-3 control-label no-padding-right" for="form-field-3"> LastName: </label>
						          <div class="col-sm-9" >
						            <input type="text" style="width:90%" name="last_name" value="<?=empty($info['last_name'])?'':$info['last_name'] ?>"  id="form-field-3" placeholder="LastName" class="col-xs-10 col-sm-5" />
					              </div>
						          </div></td>
					          </tr>
						     <tr height="40px">
						        <td>&nbsp;</td>
						        <td>
                                       				<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                               <?php echo yii::t('vcos', '国籍：')?>     </label>

										<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1" name="country_code">
															<?php foreach ($country as $k=>$v):?>				
																<option value="<?=$v['country_code']?>" <?=isset($info['country_code'])&&($v['country_code']==$info['country_code'])?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['country_name'])?></option>
																<?php endforeach;?>
															</select>
														
											
										</div>
									</div>   
                                </td>
						        <td>       				<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
										<?php echo yii::t('vcos', '民族：')?>
                                     </label>

										<div class="col-sm-9"  style="width:68%">
										<select class="form-control" id="form-field-select-1" name="nation_code">
															<?php foreach ($nation as $k=>$v):?>				
																<option value="<?=$v['nation_code']?>" <?=isset($info['nation_code'])&&($v['nation_code']==$info['nation_code'])?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['nation_name'])?></option>
																<?php endforeach;?>
															</select>
											
										</div>
									</div>   </td>
					          </tr>
						      <tr height="40px">
						        <td>&nbsp;</td>
						        <td>       				<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '政治面貌：')?>  <span class="col-sm-9">                                   </span></label>

									<div class="col-sm-9"  style="width:68%">
									<select class="form-control" id="form-field-select-1" name="political_status">
															<?php foreach ($politicalstatus as $k=>$v):?>				
																<option value="<?=$k?>" <?=isset($info['political_status'])&&($k==$info['political_status'])?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v)?></option>
																<?php endforeach;?>
															</select>
																
										</div>
												
									</div>   </td>
						        <td>
						          <div class="radio">
						            <label>
						              <input name="sex" value="1" type="radio" class="ace" checked='checked'/>
						              <span class="lbl"> 	<?php echo yii::t('vcos', '男')?></span>
						              </label>
						            <label>
						              <input name="sex" type="radio" value="2" class="ace"  <?=isset($info['sex'])&&(2==$info['sex'])?"checked='checked'":'' ?>/>
						              <span class="lbl"> <?php echo yii::t('vcos', '女')?></span>
						              </label>
					              </div>                     
					            </td>
					          </tr>
						      <tr height="40px">
						        <td>&nbsp;</td>
						        <td> 				<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                         <?php echo yii::t('vcos', ' 证件类型：')?></label>

										<div class="col-sm-9"  style="width:68%">
												<select class="form-control" id="form-field-select-1" name="card_type">
															<?php foreach ($cardtype as $k=>$v):?>				
																<option value="<?=$k?>" <?=isset($info['card_type'])&&($k==$info['card_type'])?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v)?></option>
																<?php endforeach;?>
															</select>
											
										</div>
									</div>   </td>
						        <td>       				<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                       <?php echo yii::t('vcos', ' 证件号码：')?> </label>

										<div class="col-sm-9" >
											<input type="text" style="width:90%" name="resident_id_card" value="<?=empty($info['resident_id_card'])?'':$info['resident_id_card'] ?>"  id="form-field-1" placeholder=" <?php echo yii::t('vcos', ' 证件号码')?>"  <?php echo yii::t('vcos', ' 证件号码：')?>" class="col-xs-10 col-sm-5" />
										</div>
									</div>   </td>
						        <td> 				<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                <?php echo yii::t('vcos', ' 婚姻状态：')?>       <span class="col-sm-9">                                   </span></label>

<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1" name=marry_status>
															<?php foreach ($marrystatus as $k=>$v):?>				
																<option value="<?=$k?>" <?=isset($info['marry_status'])&&($k==$info['marry_status'])?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v)?></option>
																<?php endforeach;?>
															</select>
											
										</div>
												
									</div>  </td>
					          </tr>
						      <tr height="40px">
						        <td>&nbsp;</td>
						        <td><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                            <?php echo yii::t('vcos', '健康情况：')?></label>

										<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1" name=health_status>
															<?php foreach ($healthstatus as $k=>$v):?>				
																<option value="<?=$k?>" <?=isset($info['health_status'])&&($k==$info['health_status'])?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v)?></option>
																<?php endforeach;?>
															</select>
											
										</div>
									</div>   </td>
						        <td>       				<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                      <?php echo yii::t('vcos', '身高(CM): ')?>   </label>

										<div class="col-sm-9" >
											<input type="text" style="width:90%" name="height"  value="<?=empty($info['height'])?'':$info['height'] ?>"  id="form-field-1" placeholder=" <?php echo yii::t('vcos', '身高(CM) ')?>" class="col-xs-10 col-sm-5" />
										</div>
									</div>   </td>
						        <td>       				<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                    <?php echo yii::t('vcos', '体重(KG): ')?>   </label>

										<div class="col-sm-9" >
											<input type="text" style="width:90%" name="weight"  value="<?=empty($info['weight'])?'':$info['weight'] ?>"  id="form-field-1" placeholder="   <?php echo yii::t('vcos', '体重(KG) ')?>" class="col-xs-10 col-sm-5" />
										</div>
									</div>  </td>
					          </tr>
						     <tr height="40px">
						        <td>&nbsp;</td>
						        <td>       				<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                        <?php echo yii::t('vcos', '鞋码: ')?>  </label>

										<div class="col-sm-9" >
											<input type="text" style="width:90%" name="shoe_size"  value="<?=empty($info['shoe_size'])?'':$info['shoe_size'] ?>"  id="form-field-1" placeholder="<?php echo yii::t('vcos', '鞋码 ')?>" class="col-xs-10 col-sm-5" />
										</div>
									</div>  </td>
						        <td>       				<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                       <?php echo yii::t('vcos', '血型: ')?>  </label>

										<div class="col-sm-9"  style="width:68%">
												<select class="form-control" id="form-field-select-1" name="blood_type">
															<?php foreach ($bloodtype as $k=>$v):?>				
																<option value="<?=$k?>" <?=isset($info['blood_type'])&&($k==$info['blood_type'])?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v)?></option>
																<?php endforeach;?>
															</select>
											
										</div>
									</div> </td>
						        <td>       				<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                       <?php echo yii::t('vcos', '工作年限:  ')?>    </label>
					<div class="col-sm-9" >
											<input type="text" style="width:90%" name='working_life'  value="<?=empty($info['working_life'])?'':$info['working_life'] ?>"  id="form-field-1" placeholder=" <?php echo yii::t('vcos', '工作年限  ')?>" class="col-xs-10 col-sm-5" />
										</div>
									</div>  </td>
					          </tr>
						      <tr height="40px">
						        <td>&nbsp;</td>
						        <td>       				<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '所学专业:  ')?>  </label>

										<div class="col-sm-9" >
											<input type="text" style="width:90%" name='major'  value="<?=empty($info['major'])?'':$info['major'] ?>"  id="form-field-1" placeholder="<?php echo yii::t('vcos', '所学专业 ')?> " class="col-xs-10 col-sm-5" />
										</div>
									</div>  </td>
						        <td>          				<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                  <?php echo yii::t('vcos', '最高学历:  ')?>     </label>

										<div class="col-sm-9"  style="width:68%">
										<select class="form-control" id="form-field-select-1" name="education">
															<?php foreach ($educat as $k=>$v):?>				
																<option value="<?=$k?>" <?=isset($info['education'])&&($k==$info['education'])?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v)?></option>
																<?php endforeach;?>
															</select>
											
										</div>
									</div>  </td>
						        <td>                 			<div class="form-group">
						          <label class="col-sm-3 control-label no-padding-right" for="form-field-3">  <?php echo yii::t('vcos', '外语等级:  ')?>  	 </label>
						          <div class="col-sm-9" >
						            <input type="text" style="width:90%" name="foreign_language" value="<?=empty($info['foreign_language'])?'':$info['foreign_language'] ?>"  id="form-field-3" placeholder=" <?php echo yii::t('vcos', '外语等级  ')?>  " class="col-xs-10 col-sm-5" />
					              </div>
						          </div></td>
					          </tr>
						      <tr height="40px">
						        <td>&nbsp;</td>
						        <td><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '出生地:  ')?>  </label>

										<div class="col-sm-9" >
											<input type="text" style="width:90%" name="birth_place" value="<?=empty($info['birth_place'])?'':$info['birth_place'] ?>"  id="form-field-1" placeholder="  <?php echo yii::t('vcos', '出生地  ')?>" class="col-xs-10 col-sm-5" />
										</div>
								</div></td>
						        <td>	<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '出生日期:  ')?>  </label>

										<div class="col-sm-9" >
										<input  name="date_of_birth" value="<?=empty($info['date_of_birth'])?'':$info['date_of_birth'] ?>" class="col-xs-10 col-sm-5" style="width:90%" id="id-date-picker-1" type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" />
											
										</div>
								</div>
 								</td>
						        <td>&nbsp;</td>
					          </tr>
					        </table>
						    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>
						  </div></td>
						</tr>
		</table>
		<div id="line"></div>
		<div style="margin-left:30px"><h3>  <?php echo yii::t('vcos', '通讯信息:  ')?></h3></div>
        <table width="1064" >
  <tr>
    <td width="27">&nbsp;</td>
    <td colspan="2"><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="width:95px">
                                      <?php echo yii::t('vcos', ' 通讯地址:  ')?>  </label>

										<div class="col-sm-9" >
											<input type="text" style="width:100%" name="mailing_address"   value="<?=empty($info['mailing_address'])?'':$info['mailing_address'] ?>"  id="form-field-1" placeholder="  <?php echo yii::t('vcos', ' 通讯地址  ')?>" class="col-xs-10 col-sm-5" />
										</div>
									</div></td>
    <td width="339"><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '   手机号码：  ')?>   </label>

										<div class="col-sm-9" >
											<input type="text" style="width:90%" name="mobile_num" value="<?=empty($info['mobile_num'])?'':$info['mobile_num'] ?>"  id="form-field-1" placeholder="<?php echo yii::t('vcos', '   手机号码  ')?>" class="col-xs-10 col-sm-5" />
										</div>
									</div></td>
  </tr>
  <tr height="40px">
    <td>&nbsp;</td>
    <td width="341"><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                    <?php echo yii::t('vcos', '   宿舍号：  ')?>   </label>

										<div class="col-sm-9" >
											<input type="text" style="width:90%" name="dormitory_num"   value="<?=empty($info['dormitory_num'])?'':$info['dormitory_num'] ?>"  id="form-field-1" placeholder="    <?php echo yii::t('vcos', '   宿舍号 ')?> " class="col-xs-10 col-sm-5" />
										</div>
									</div></td>
    <td width="337"><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                      <?php echo yii::t('vcos', '   办公电话：')?>      </label>

										<div class="col-sm-9" >
											<input type="text" style="width:90%" name="telephone_num" value="<?=empty($info['telephone_num'])?'':$info['telephone_num'] ?>"  id="form-field-1" placeholder="<?php echo yii::t('vcos', '   办公电话')?> " class="col-xs-10 col-sm-5" />
										</div>
									</div></td>
    <td><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                        <?php echo yii::t('vcos', '   紧急联系人:')?>   </label>

										<div class="col-sm-9" >
											<input type="text" style="width:90%" name="emergency_contact" value="<?=empty($info['emergency_contact'])?'':$info['emergency_contact'] ?>"  id="form-field-1" placeholder=" <?php echo yii::t('vcos', '   紧急联系人')?>" class="col-xs-10 col-sm-5" />
										</div>
									</div></td>
  </tr>
   <tr height="40px">
    <td>&nbsp;</td>
    <td><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                      <?php echo yii::t('vcos', '    联系人电话:')?>   <span class="col-sm-9">
                                        
                                        </span></label>

										<div class="col-sm-9" >
											<input type="text" style="width:90%"  name="emergency_contact_phone" value="<?=empty($info['emergency_contact_phone'])?'':$info['emergency_contact_phone'] ?>"  id="form-field-1" placeholder=" <?php echo yii::t('vcos', '    联系人电话')?> " class="col-xs-10 col-sm-5" />
										</div>
									</div></td>
    <td></td>
    <td></td>
  </tr>
</table>
<div id="line"></div>
<div style="margin-left:30px"><h3> <?php echo yii::t('vcos', '   在职信息:')?> </h3></div>
<table width="1072">
  <tr>
    <td width="23">&nbsp;</td>
    <td width="347"><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
      <?php echo yii::t('vcos', '    船员类型：')?>  </label>

										<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1" name="employee_type">
															<?php foreach ($employee_type as $k=>$v):?>				
																<option value="<?=$k?>" <?=isset($info['employee_type'])&&($k==$info['employee_type'])?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v)?></option>
																<?php endforeach;?>
															</select>
											
										</div>
									</div> </td>
    <td width="343"><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
      <?php echo yii::t('vcos', '    员工来源：')?> </label>

										<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1" name="employee_source">
															<?php foreach ($employeesource as $k=>$v):?>				
																<option value="<?=$k?>" <?=isset($info['employee_source'])&&($k==$info['employee_source'])?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v)?></option>
																<?php endforeach;?>
															</select>
											
										</div>
									</div> </td>
    <td width="339"><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
         <?php echo yii::t('vcos', '     所属部门：')?> </label>

										<div class="col-sm-9"  style="width:68%">
										<select class="form-control" id="form-field-select-1" name="department_id">
															<?php foreach ($department as $k=>$v):?>				
																<option value="<?=$v['department_id']?>" <?=isset($info['department_id'])&&($v['department_id']==$info['department_id'])?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['department_name'])?></option>
																<?php endforeach;?>
															</select>
											
										</div>
									</div> </td>
  </tr>
   <tr height="40px">
    <td>&nbsp;</td>
    <td><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '入职时间:  ')?>  </label>

										<div class="col-sm-9" >
										<input  name="date_of_entry" value="<?=empty($info['date_of_entry'])?'':$info['date_of_entry'] ?>" class="col-xs-10 col-sm-5" style="width:90%" type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" />
											
										</div>
								</div></td>
    <td><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                    <?php echo yii::t('vcos', '     职务:')?>     </label>

										<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1" name="post_id">
															<?php foreach ($post as $k=>$v):?>				
																<option value="<?=$v['post_id']?>" <?=isset($info['post_id'])&&($v['post_id']==$info['post_id'])?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['post_cn_name'])?></option>
																<?php endforeach;?>
															</select>
											
										</div>
	</div> </td>
    <td><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                    <?php echo yii::t('vcos', '    在职状态:')?>    </label>

										<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1" name="employee_status">
															<?php foreach ($employee_job_status as $k=>$v):?>				
																<option value="<?=$k?>" <?=isset($info['employee_job_status'])&&($k==$info['employee_job_status'])?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v)?></option>
																<?php endforeach;?>
															</select>
											
										</div>
	</div> </td>
  </tr>
  <tr height="40px">
    <td>&nbsp;</td>
    <td><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '转正时间:  ')?>  </label>

										<div class="col-sm-9" >
										<input  name="date_of_positive" value="<?=empty($info['date_of_positive'])?'':$info['date_of_positive'] ?>" class="col-xs-10 col-sm-5" style="width:90%"  type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" />
											
										</div>
								</div>
</td>
    <td><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '离职时间:  ')?>  </label>

										<div class="col-sm-9" >
										<input  name="date_of_departure" value="<?=empty($info['date_of_departure'])?'':$info['date_of_departure'] ?>" class="col-xs-10 col-sm-5" style="width:90%"  type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" />
											
										</div>
								</div></td>
    <td><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                  <?php echo yii::t('vcos', '       银行卡:')?>      <span class="col-sm-9">
                                        
                                        </span></label>

										<div class="col-sm-9" >
											<input type="text" style="width:90%"  name="bank_name"  value="<?=empty($info['bank_name'])?'':$info['bank_name'] ?>"  id="form-field-1" placeholder=" <?php echo yii::t('vcos', '银行卡')?> " class="col-xs-10 col-sm-5" />
										</div>
	</div></td>
  </tr>
  <tr height="40px">
    <td>&nbsp;</td>
    <td><div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                        <?php echo yii::t('vcos', '      银行卡账号:')?>   <span class="col-sm-9">
                                        
                                        </span></label>

										<div class="col-sm-9" >
											<input type="text" style="width:90%"  name="bank_card_number"  value="<?=empty($info['bank_card_number'])?'':$info['bank_card_number'] ?>"  id="form-field-1" placeholder=" <?php echo yii::t('vcos', '      银行卡账号')?> " class="col-xs-10 col-sm-5" />
										</div>
	</div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<div id="line"></div>
<div style="margin-left:30px"><h3><?php echo yii::t('vcos', '附件')?> </h3></div>
<table border="1">
  <tr align="center">
 
    <td width="92"><?php echo yii::t('vcos', '  序号')?></td>
    <td width="640"><?php echo yii::t('vcos', ' 标题')?></td>
    <td width="248"><?php echo yii::t('vcos', ' 操作')?></td>
  </tr>
  <?php 
  $employee_code=empty($info['employee_code'])?'':$info['employee_code'];
 $sql="select * from vcos_file_path where employee_code='$employee_code'";
 $filepath = Yii::app()->db->createCommand($sql)->queryAll();
  ?>
  <?php foreach ($filepath as $k=>$v):?>
  <tr align="center">
    <td><?php echo $k+1?></td>
    <td><?php echo yii::t('vcos', $v['filename'])?></td>
    <td><a type="button" href="downfile?id=<?php echo $v['id']?>" class="btn btn-xs btn-danger">
	<?php echo yii::t('vcos', ' 下载')?>	
	<i class="icon-arrow-right icon-on-right bigger-110"></i>
 	</a>                                                    
	&nbsp; &nbsp; &nbsp;
	<button type="button" class="btn btn-xs btn-danger" id="<?php echo "f1,".$v['id']?>"  name="fujiandelete" >
	<?php echo yii::t('vcos', ' 删除')?>
	<i class="icon-arrow-right icon-on-right bigger-110"></i>
	</button>
	 </td>
  </tr>
  <?php endforeach;?>
</table>
<center>
<input type="hidden" name="employee_id" value="<?=$employee_id?>">
<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												<?php echo yii::t('vcos', ' 保存')?>
											</button>

											&nbsp; &nbsp; &nbsp;
											<a href="information_addfile">
											<button class="btn" type="button">
												<i class="icon-undo bigger-110"></i>
												<?php echo yii::t('vcos', ' 取消')?>
											</button>
											</a>
											</center>
											</form>
												</div>

												<!-------------- 员工证书------------------- -->
													<div id="credential" class="tab-pane" style="height: 2000px">
														
														<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工信息管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工档案管理'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
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
														<th><?php echo yii::t('vcos', ' 证书类型')?></th>
														<th class="hidden-480"><?php echo yii::t('vcos', ' 证书编号')?></th>

														<th>
														
															<?php echo yii::t('vcos', '签发日期')?>
														</th>
															<th><?php echo yii::t('vcos', ' 有效期至')?></th>
																
														

														<th><?php echo yii::t('vcos', '操作')?></th>
													</tr>
												</thead>

												<tbody>
												 <?php if (!empty($employee_id)){ foreach ( $sqlcer as $k=>$v):?>
													<tr>
														<td class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>

														<td>
															<a href="#"><?=$k+1?></a>
														</td>
														<td><?php echo yii::t('vcos',$v['certificate_code'])?></td>
														<td class="hidden-480"><?php echo yii::t('vcos',$v['certificate_number'])?></td>
														<td><?php echo yii::t('vcos',$v['date_of_issue'])?></td>

														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['date_of_end'])?>
														</td>
													
														<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																

																<button class="btn btn-xs btn-info" href="#modal-form" role="button"  data-toggle="modal" onclick="certificateinfo('<?php echo  $v['employee_code'].'/'.$v['certificate_number'].'/'.$v['certificate_name'].'/'.$v['certificate_id'].'/'.$v['issue_official'].'/'.$v['training_institutions'].'/'.$v['issue_organization'].'/'.$v['issue_official'].'/'.$v['date_of_start'].'/'.$v['date_of_end'].'/'.$v['audit_status'].'/'.$v['date_of_audit'].'/'.$v['date_of_issue'].'/'.$v['remark'].'/'.$v['cid']?>')">
																	
																	<i class="icon-edit bigger-120"></i>
																	
																</button>

															 <?php
                                                                      
                                                                            $this->widget('ManipulateWidget',array(
                                                                                'ControllerName'=>'Information',
                                                                                'MethodName'=>'addDelete',
                                                                                'id'=>$v['cid'].'/certificate',
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
												  <?php endforeach;}?>
												</tbody>
										
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
												<!--添加按钮  -->
												<div class="center">					
                                                            <button class="btn btn-xs" href="#modal-form" role="button"  data-toggle="modal" onclick="insertOrUpdate('<?php echo  isset($info['employee_code'])?$info['employee_code']:''?>')">
                                                                <i class="icon-pencil align-top bigger-125"></i>
                                                                <span class="bigger-110 no-text-shadow">添加</span>
                                                            </button>
                                                        </div>	
												</div>
												<!-- -------------员工职称----------------  -->
												<div id="callofwork" class="tab-pane" style="height: 2000px">
													
													<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工信息管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工档案管理'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
													
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
														<th><?php echo yii::t('vcos', ' 管理编码')?></th>
														<th class="hidden-480"><?php echo yii::t('vcos', ' 职称名称')?></th>

														<th>
														
															<?php echo yii::t('vcos', ' 职称等级')?>
														</th>
															<th><?php echo yii::t('vcos', ' 生效时间')?></th>
																
														<th><?php echo yii::t('vcos', ' 操作')?></th>
													</tr>
												</thead>

												<tbody>
												 <?php if (!empty($employee_id)){ foreach ( $sqltit as $k=>$v):?>
													<tr>
												
														<td class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>

														<td>
															<a href="#"><?=$k+1?></a>
														</td>
														<td><?php echo yii::t('vcos',$v['title_number'])?></td>
														<td class="hidden-480"><?php echo yii::t('vcos',$v['title_name'])?></td>
														<td><?php echo yii::t('vcos',$v['title_level'])?></td>

														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['date_of_start'])?>
														</td>
													
														<td>
																<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																

																<button class="btn btn-xs btn-info" href="#modal-form1" role="button"  data-toggle="modal" onclick="titleinfo('<?php echo  $v['employee_code'].'/'.$v['title_id'].'/'.$v['title_level'].'/'.$v['title_number'].'/'.$v['issue_organization'].'/'.$v['date_of_issue'].'/'.$v['date_of_start'].'/'.$v['audit_status'].'/'.$v['date_of_audit'].'/'.$v['remark'].'/'.$v['tid']?>')">
																	
																	<i class="icon-edit bigger-120"></i>
																	
																</button>

															 <?php
                                                                      
                                                                            $this->widget('ManipulateWidget',array(
                                                                                'ControllerName'=>'Information',
                                                                                'MethodName'=>'addDelete',
                                                                                'id'=>$v['tid'].'/title',
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
												<?php endforeach;}?>
												</tbody>
										
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
												<!--添加按钮  -->
												<div class="center">
                                                            <button class="btn btn-xs" href="#modal-form1" role="button"  data-toggle="modal" onclick="insertOrUpdate('<?php echo isset($info['employee_code'])?$info['employee_code']:''?>')">
                                                                <i class="icon-pencil align-top bigger-125"></i>
                                                                <span class="bigger-110 no-text-shadow">添加</span>
                                                            </button>
                                                        </div>		
													
												</div>
												<!-- -------------------员工合同-------------------- -->
												<div id="contract" class="tab-pane" style="height: 2000px">
												
												
												<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工信息管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工档案管理'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
												
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
														<th><?php echo yii::t('vcos', ' 序号')?></th>
														<th><?php echo yii::t('vcos', ' 员工编码')?></th>
														<th class="hidden-480"><?php echo yii::t('vcos', '姓名')?></th>

														<th>
														
															<?php echo yii::t('vcos', ' 合同号')?>
														</th>
															<th><?php echo yii::t('vcos', ' 合同生效日期')?></th>
																<th><?php echo yii::t('vcos', ' 合同截止日期')?></th>
																	<th><?php echo yii::t('vcos', '合同类型')?></th>
																		<th><?php echo yii::t('vcos', '是否有效')?></th>
																			
														

														<th><?php echo yii::t('vcos', '操作')?></th>
													</tr>
												</thead>

												<tbody>
												<?php if (!empty($employee_id)){ foreach ( $sqlcon as $k=>$v):?>
													<tr>
												
														<td class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>

														<td>
															<a href="#"><?=$k+1?></a>
														</td>
														<td><?php echo yii::t('vcos',$v['employee_code'])?></td>
														<td class="hidden-480"><?php echo yii::t('vcos',$v['cn_name'])?></td>
														<td><?php echo yii::t('vcos',$v['contract_number'])?></td>

														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['date_of_start'])?>
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['date_of_end'])?>
														</td>
                                                       <td class="hidden-480">
															<?php echo yii::t('vcos',$v['date_of_start'])?>
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['contract_status']==0?"未生效":"生效")?>
														</td>
													
														<td>
																<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																<button href="#modal-form3" role="button"  data-toggle="modal" class="btn btn-xs btn-info" onclick="contractinfo('<?php echo  $v['employee_code'].'/'.$v['contract_number'].'/'.$v['contract_id'].'/'.$v['date_of_start'].'/'.$v['date_of_end'].'/'.$v['date_of_sign'].'/'.$v['remark'].'/'.$v['cid']?>')">
																	<i class="icon-edit bigger-120"></i>
																	
																</button>

															 <?php
                                                                      
                                                                            $this->widget('ManipulateWidget',array(
                                                                                'ControllerName'=>'Information',
                                                                                'MethodName'=>'addDelete',
                                                                                'id'=>$v['cid'].'/contract',
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
													<?php endforeach;}?>
												</tbody>
										
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
												<!--添加按钮  -->
												<div class="center">
                                                            <button class="btn btn-xs" href="#modal-form3" role="button"  data-toggle="modal" onclick="insertOrUpdate('<?php echo isset($info['employee_code'])?$info['employee_code']:''?>')">
                                                                <i class="icon-pencil align-top bigger-125"></i>
                                                                <span class="bigger-110 no-text-shadow">添加</span>
                                                            </button>
                                                        </div>	
												</div>
												<!-- --------------员工资历--------------------- -->
											<div id="ageofwork" class="tab-pane" style="height: 2000px">
													
													<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工信息管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工档案管理'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
													
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
														<th><?php echo yii::t('vcos', ' 序号')?></th>
														<th><?php echo yii::t('vcos', ' 船舶名称')?></th>
														<th class="hidden-480"><?php echo yii::t('vcos', ' 在船职务')?></th>

														<th>
														
															<?php echo yii::t('vcos', '上船时间')?>
														</th>
															<th><?php echo yii::t('vcos', '下船时间')?></th>
																<th><?php echo yii::t('vcos', '在船天数')?></th>
																	
														

														<th><?php echo yii::t('vcos', ' 操作')?></th>
													</tr>
												</thead>

												<tbody>
												<?php if (!empty($employee_id)){ foreach (  $sqlqua as $k=>$v):?>
													<tr>
												
														<td class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>

														<td>
															<a href="#"><?=$k+1?></a>
														</td>
														<td> <?php echo yii::t('vcos',$v['ship_name'])?></td>
														<td class="hidden-480"><?php echo yii::t('vcos',$v['post_cn_name'])?></td>
														

														<td class="hidden-480">
														<?php echo yii::t('vcos',$v['date_of_start'])?>	
														</td>
														<td class="hidden-480">
														<?php echo yii::t('vcos',$v['date_of_end'])?>
														</td>
                                                     <td class="hidden-480">
                                                  <?php  $startdate=strtotime($v['date_of_start']);
													$enddate=strtotime($v['date_of_end']);					
													$days=round(($enddate-$startdate)/3600/24); ?>
														<?php echo yii::t('vcos',$days)?>
														</td>
														<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																

																<button class="btn btn-xs btn-info" href="#modal-form4"  role="button"  data-toggle="modal"  onclick="qualificationinfo('<?php echo  $v['employee_code'].'/'.$v['ship_id'].'/'.$v['department_id'].'/'.$v['post_id'].'/'.$v['date_of_start'].'/'.$v['date_of_end'].'/'.$v['remark'].'/'.$v['id']?>')" >
																	
																	<i class="icon-edit bigger-120"></i>
																	
																</button>

															 <?php
                                                                      
                                                                            $this->widget('ManipulateWidget',array(
                                                                                'ControllerName'=>'Information',
                                                                                'MethodName'=>'addDelete',
                                                                                'id'=>$v['id'].'/qualification',
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
													<?php endforeach;}?>
												</tbody>
										
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
											<!--添加按钮  -->
												<div class="center">
                                                            <button class="btn btn-xs" href="#modal-form4" role="button"  data-toggle="modal" onclick="insertOrUpdate('<?php echo isset($info['employee_code'])?$info['employee_code']:''?>')">
                                                                <i class="icon-pencil align-top bigger-125"></i>
                                                                <span class="bigger-110 no-text-shadow">添加</span>
                                                            </button>
                                                        </div>			
													
												</div>
											</div>
											
										
										</div>
									</div><!-- /span -->	
		
		
			<!-- --------------------------------员工证书弹出框---------------------------------- -->
			
			<form action="addUpdate" method="post">
			<input type="hidden" name="employee_id" value="<?php echo isset($_GET['employee_id'])?$_GET['employee_id']:0?>">
			<input type="hidden" name="mytype" value="certificate">
			<input type="hidden" name="employee_code" id='0'>
			<input type="hidden" name="insertOrUpdate" id='insertOrUpdate1'>
			<input type="hidden" name="id" id='id'>
<div id="modal-form" class="modal" tabindex="-1">
									<div class="modal-dialog" style="width:640px">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" onclick="certificateuninfo();" data-dismiss="modal">&times;</button>
												<h4 class="blue bigger">请编辑</h4>
											</div>

											<div class="modal-body overflow-visible">
											<!-- ------------------ -->
												<table width="600">
  <tr>
    <td width="10" height="52">&nbsp;</td>
    <td width="300">
    <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '证书编号:')?></label>
      <div class="col-sm-9" >
       <input type="text" style="width:90%" name="certificate_number"   id="1" class="col-xs-10 col-sm-5" />
        </div>
        
        
      </div>
      </td>
    <td width="300"><div class="form-group">
     		 <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '证书名称:')?></label>
      <div class="col-sm-9" >
       <input type="text" style="width:90%" name="certificate_name"  id="2" class="col-xs-10 col-sm-5" />
        </div>
        
        
       
      </div></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td>
<div class="form-group">
  <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '证书类型:')?></label>
        <div class="col-sm-9"  style="width:68%">
      	<select class="form-control" id="form-field-select-1" name="certificate_id">
												
												<?php foreach ($certificateinfo as $k=>$v):?>				
																<option value="<?=$v['certificate_id']?>" id="<?=$k?>a"><?php echo yii::t('vcos', $v['certificate_type'])?></option>
																<?php endforeach;?>
															</select>
        </div>
        </div>
      </td>
    <td><div class="form-group">
     <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '签发官员:')?> </label>

        <div class="col-sm-9" >
          <input type="text"  style="width:90%" name="issue_official"   id="3"  class="col-xs-10 col-sm-5" />
          </div>
      </div></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
     <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '培训机构:')?></label>
      <div class="col-sm-9" >
       <input type="text" style="width:90%" name="training_institutions" id="4" class="col-xs-10 col-sm-5" />
        </div>
      </div></td>
    <td>
    <div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '签发机关:')?> </label>

        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="issue_organization"   id="5"  class="col-xs-10 col-sm-5" />
          </div>
        </div>
    </td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '签发日期:')?>  </label>

										<div class="col-sm-9" >
										
											 <input type="text" style="width:90%" name="date_of_issue"  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"  id='6'  class="col-xs-10 col-sm-5" />
										</div>
        </div></td>
    <td><div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '有效期始:')?>  </label>

										<div class="col-sm-9" >
										
										 <input type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" style="width:90%" name="date_of_start"   id='7'  class="col-xs-10 col-sm-5" />	
										</div>
        </div></td>
  </tr>
    <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '有效期至:')?>  </label>

										<div class="col-sm-9">
									
											<input type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" style="width:90%" name="date_of_end"   id='8'  class="col-xs-10 col-sm-5" />	
										</div>
        </div></td>
    <td> 
    <div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '是否年审:')?>  </label>
    							<div class="radio">
						            <label>
						              <input name="audit_status" value="1" type="radio" class="ace" id='b1' checked="checked" />
						              <span class="lbl"> 	<?php echo yii::t('vcos', '是')?></span>
						              </label>
						            <label>
						              <input name="audit_status" type="radio" value="0" class="ace" id='b2'/>
						              <span class="lbl"> <?php echo yii::t('vcos', '否')?></span>
						              </label>
					              </div> 
					              </div>
					               </td>
  </tr>
  
      <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '年审时间:')?>  </label>

										<div class="col-sm-9" style="width:68%">
									
										<input type="text" style="width:90%" name="date_of_audit"  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"  id='9'  class="col-xs-10 col-sm-5" />		
										</div>
        </div></td>
    <td> 
     </td>
  </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td colspan="2">
      <div>备注
        <textarea class="form-control" id="10" name="remark" placeholder="Default Text"></textarea>
        </div>
      </td>
  </tr>
  
                                              </table>
																						<!--  -->
										  </div>

											<div class="modal-footer">
												<button class="btn btn-sm" type="button" onclick="certificateuninfo();" data-dismiss="modal">
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
							
<!-- -------------------------------------------------------------------- -->
			<!-- --------------------------------员工职称弹出框---------------------------------- -->
			
			<form action="addUpdate" method="post">
			<input type="hidden" name="employee_id" value="<?php echo isset($_GET['employee_id'])?$_GET['employee_id']:0?>">
			<input type="hidden" name="mytype" value="title">
			<input type="hidden" name="employee_code" id='title0'>
			<input type="hidden" name="insertOrUpdate" id='insertOrUpdate2'>
			<input type="hidden" name="id" id='tid'>
<div id="modal-form1" class="modal" tabindex="-1">
									<div class="modal-dialog" style="width:640px">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" onclick="titleuninfo();" data-dismiss="modal">&times;</button>
												<h4 class="blue bigger">请编辑</h4>
											</div>

											<div class="modal-body overflow-visible">
											<!-- ------------------ -->
												<table width="600">
  <tr>
    <td width="10" height="52">&nbsp;</td>
    <td width="300">
    <div class="form-group">
   
     <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '职称名称:')?></label>
        <div class="col-sm-9"  style="width:68%">
      	<select class="form-control" id="form-field-select-1" name="title_id">
												
												<?php foreach ($titleinfo as $k=>$v):?>				
																<option value="<?=$v['title_id']?>" id="<?=$k?>c"><?php echo yii::t('vcos', $v['title_name'])?></option>
																<?php endforeach;?>
															</select>
        </div>
        
        </div>
      
      </td>
    <td width="300"><div class="form-group">
     		 <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '职称等级:')?></label>
      <div class="col-sm-9" >
       <input type="text" style="width:90%" name="title_level"  id="title1" class="col-xs-10 col-sm-5" />
        </div>
        
        
      
      </div></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td>
<div class="form-group">
   <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '管理编号:')?></label>
      <div class="col-sm-9" >
       <input type="text" style="width:90%" name="title_number"  id="title2" class="col-xs-10 col-sm-5" />
        </div>
      
        </div>
      </td>
    <td><div class="form-group">
     <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '签发单位:')?> </label>

        <div class="col-sm-9" >
          <input type="text"  style="width:90%" name="issue_organization"   id="title3"  class="col-xs-10 col-sm-5" />
          </div>
      </div></td>
  </tr>

  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '签发日期:')?>  </label>

										<div class="col-sm-9" style="width:68%">
										
											<input type="text" style="width:90%" name="date_of_issue"  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"  id='title4'  class="col-xs-10 col-sm-5" />		
										</div>
        </div></td>
    <td><div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '生效日期:')?>  </label>

										<div class="col-sm-9" style="width:68%">
									
											<input type="text" style="width:90%" name="date_of_start"  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"  id='title5'  class="col-xs-10 col-sm-5" />		
										</div>
        </div></td>
  </tr>
    <tr>
    <td height="53">&nbsp;</td>
    
       <td> 
    <div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '是否年审:')?>  </label>
    							<div class="radio">
						            <label>
						              <input name="audit_status" value="1" type="radio" class="ace" id='d1' checked="checked" />
						              <span class="lbl"> 	<?php echo yii::t('vcos', '是')?></span>
						              </label>
						            <label>
						              <input name="audit_status" type="radio" value="0" class="ace" id='d2'/>
						              <span class="lbl"> <?php echo yii::t('vcos', '否')?></span>
						              </label>
					              </div> 
					              </div>
					               </td>
    
   <td><div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-1">
                                     <?php echo yii::t('vcos', '年审时间:')?>  </label>

										<div class="col-sm-9" style="width:68%">
									
											<input type="text" style="width:90%" name="date_of_audit"  onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"  id='title6'  class="col-xs-10 col-sm-5" />		
										</div>
        </div></td>
 
  </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td colspan="2">
      <div>备注
        <textarea class="form-control" id="title7" name="remark" placeholder="Default Text"></textarea>
        </div>
      </td>
  </tr>
  
                                              </table>
																						<!--  -->
										  </div>

											<div class="modal-footer">
												<button class="btn btn-sm" type="button" onclick="titleuninfo();" data-dismiss="modal">
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
							
<!-- -------------------------------------------------------------------- -->

			<!-- --------------------------------员工合同弹出框---------------------------------- -->
			
			<form action="addUpdate" method="post" enctype="multipart/form-data">
			<input type="hidden" name="employee_id" value="<?php echo isset($_GET['employee_id'])?$_GET['employee_id']:0?>">
			<input type="hidden" name="mytype" value="contract">
			<input type="hidden" name="employee_code" id='contract0'>
			<input type="hidden" name="insertOrUpdate" id='insertOrUpdate3'>
			<input type="hidden" name="id" id='ccid'>
<div id="modal-form3" class="modal" tabindex="-1">
									<div class="modal-dialog" style="width:640px">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" onclick="contractuninfo();" data-dismiss="modal">&times;</button>
												<h4 class="blue bigger">请编辑</h4>
											</div>

											<div class="modal-body overflow-visible">
											<!-- ------------------ -->
												<table width="600">
  <tr>
    <td width="10" height="52">&nbsp;</td>
    
       <td width="300"><div class="form-group">
     		 <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '合同号:')?></label>
      <div class="col-sm-9" >
       <input type="text" style="width:90%" name="contract_number"  id="contract1" class="col-xs-10 col-sm-5" />
</div>
      </div></td>
    <td width="300">
    <div class="form-group">
   
     <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '职称名称:')?></label>
        <div class="col-sm-9"  style="width:68%">
      	<select class="form-control" id="form-field-select-1" name="contract_id">
												
		<?php foreach ($contractinfo as $k=>$v):?>				
		<option value="<?=$v['contract_id']?>" id="<?=$k?>e"><?php echo yii::t('vcos', $v['contract_type'])?></option>
		<?php endforeach;?>
		</select>
		</div>
		</div>
		</td>
	  </tr>
	  <tr>
    <td height="53">&nbsp;</td>
    <td>
<div class="form-group">
   <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '开始时间:')?></label>
      <div class="col-sm-9" >
       <input type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" style="width:90%" name="date_of_start"  id="contract2" class="col-xs-10 col-sm-5" />
        </div>
        </div>
      </td>
    <td><div class="form-group">
     <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '结束时间:')?> </label>

        <div class="col-sm-9" >
          <input type="text"  style="width:90%" name="date_of_end" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"  id="contract3"  class="col-xs-10 col-sm-5" />
          </div>
      </div></td>
  </tr>

  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
     <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '签订日期:')?> </label>

        <div class="col-sm-9" >
          <input type="text"  style="width:90%" name="date_of_sign" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"   id="contract4"  class="col-xs-10 col-sm-5" />
          </div>
      
        </div></td>
    <td></td>
  </tr>
   
  <tr>
    <td height="49">&nbsp;</td>
    <td colspan="2">
      <div>备注
        <textarea class="form-control" id="contract5" name="remark" placeholder="Default Text"></textarea>
        </div>
      </td>
 	 </tr>
     </table>						
<div style="margin-left:30px"><h3><?php echo yii::t('vcos', '   附件')?> </h3></div>
<input type="file" name="file">
<input type="hidden" name="dir" value="addfile">
<table width="600" border="1">
  <tr align="center">
    <td width="92"><?php echo yii::t('vcos', '  序号')?></td>
    <td width="640"><?php echo yii::t('vcos', ' 标题')?></td>
    <td width="248"><?php echo yii::t('vcos', ' 操作')?></td>
  </tr>
  <?php foreach ($filepath as $k=>$v):?>
  <tr align="center">
    <td><?php echo $k+1?></td>
    <td><?php echo yii::t('vcos', $v['filename'])?></td>
    <td><a type="button" href="downfile?id=<?php echo $v['id']?>" class="btn btn-xs btn-danger">
	<?php echo yii::t('vcos', ' 下载')?>	
	<i class="icon-arrow-right icon-on-right bigger-110"></i>
 	</a>                                                    
	&nbsp; &nbsp; &nbsp;
<button type="button" class="btn btn-xs btn-danger" id="<?php echo "f2,".$v['id']?>"  name="fujiandelete" >
	<?php echo yii::t('vcos', ' 删除')?>
	<i class="icon-arrow-right icon-on-right bigger-110"></i>
	</button>
	 </td>
  </tr>
  <?php endforeach;?>
</table>
																			<!--  -->
										  </div>

											<div class="modal-footer">
												<button class="btn btn-sm" type="button"  onclick="contractuninfo();" data-dismiss="modal">
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
							
<!-- -------------------------------------------------------------------- -->

			<!-- --------------------------------员工资历弹出框---------------------------------- -->
			
			<form action="addUpdate" method="post">
			<input type="hidden" name="employee_id" value="<?php echo isset($_GET['employee_id'])?$_GET['employee_id']:0?>">
			<input type="hidden" name="mytype" value="qualification">
			<input type="hidden" name="employee_code" id='qualification0'>
			<input type="hidden" name="insertOrUpdate" id='insertOrUpdate'>
			<input type="hidden" name="qid" id='qid'>
<div id="modal-form4" class="modal" tabindex="-1">
									<div class="modal-dialog" style="width:640px">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" onclick="qualificationuninfo();" data-dismiss="modal">&times;</button>
												<h4 class="blue bigger">请编辑</h4>
											</div>
											<div class="modal-body overflow-visible">
											<!-- ------------------ -->
												<table width="600">
  <tr>
    <td width="10" height="52">&nbsp;</td>
    
       <td width="300"><div class="form-group">
     		 <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '船舶名称:')?></label>
        <div class="col-sm-9"  style="width:68%">
      	<select class="form-control" id="form-field-select-1" name=ship_id>
												
												<?php foreach ($shipinfo as $k=>$v):?>				
																<option value="<?=$v['ship_id']?>" id="<?=$k?>f"><?php echo yii::t('vcos', $v['ship_name'])?></option>
																<?php endforeach;?>
															</select>
</div>
      </div></td>
    <td width="300">
    <div class="form-group">
   
     <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '在船部门:')?></label>
        <div class="col-sm-9"  style="width:68%">
      	<select class="form-control" id="form-field-select-1" name="department_id">
												
												<?php foreach ($departmentinfo as $k=>$v):?>				
																<option value="<?=$v['department_id']?>" id="<?=$k?>g"><?php echo yii::t('vcos', $v['department_name'])?></option>
																<?php endforeach;?>
															</select>
        </div>
        
       
      </div>
      </td>
 
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '在船职务:')?></label>
        <div class="col-sm-9"  style="width:68%">
      	<select class="form-control" id="form-field-select-1" name="post_id">
												
												<?php foreach ($postinfo as $k=>$v):?>				
																<option value="<?=$v['post_id']?>" id="<?=$k?>h"><?php echo yii::t('vcos', $v['post_cn_name'])?></option>
																<?php endforeach;?>
															</select>
        </div>
      
        </div>
      </td>
    <td><div class="form-group">
     <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '上船时间:')?> </label>

        <div class="col-sm-9" >
          <input type="text"  style="width:90%" name="date_of_start" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" id="qualification1"  class="col-xs-10 col-sm-5" />
          </div>
      </div></td>
  </tr>

  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
     <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '下船时间:')?> </label>

        <div class="col-sm-9" >
          <input type="text"  style="width:90%" name="date_of_end" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"  id="qualification2"  class="col-xs-10 col-sm-5" />
          </div>
      
        </div></td>
    <td></td>
  </tr>
   
  <tr>
    <td height="49">&nbsp;</td>
    <td colspan="2">
      <div>备注
        <textarea class="form-control" id="qualification3" name="remark" placeholder="Default Text"></textarea>
        </div>
      </td>
  </tr>
  
                                              </table>
									

																						<!--  -->
										  </div>

											<div class="modal-footer">
												<button class="btn btn-sm" type="button" onclick="qualificationuninfo();" data-dismiss="modal">
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
                <input id="attachdelete" type="hidden" ><!-- 附件删除 -->
<!-- -------------------------------------------------------------------- -->
					<?php
   	//设置容器配置挂件
	$this->widget('settingsContainerWidget');
?>
<?php
    $this->widget('scrollUpWidget');
?>

		<!-- 头像上传 -->
		<script src="<?php echo $theme_url; ?>/assets/js/jquery.gritter.min.js"></script>
		<script src="<?php echo $theme_url; ?>/assets/js/x-editable/bootstrap-editable.min.js"></script>
		<script src="<?php echo $theme_url; ?>/assets/js/x-editable/ace-editable.min.js"></script>
	<script src="<?php echo $theme_url; ?>/assets/js/jquery-ui-1.10.3.full.min.js"></script><!-- 弹出删除  -->
	
		<script type="text/javascript">
  
    /* 弹出框是插入数据还是更新 */
   function insertOrUpdate(r){
		document.getElementById('0').value=r;
		document.getElementById('title0').value=r;
		document.getElementById('contract0').value=r;
		document.getElementById('qualification0').value=r;
		document.getElementById('insertOrUpdate').value='1';/* 弹出框是插入数据还是更新 */
    	document.getElementById('insertOrUpdate1').value='1';/* 弹出框是插入数据还是更新 */
    	document.getElementById('insertOrUpdate2').value='1';/* 弹出框是插入数据还是更新 */
    	document.getElementById('insertOrUpdate3').value='1';/* 弹出框是插入数据还是更新 */
        }
		/* 员工证书弹出框 */
		function certificateinfo(certificate){
			var certificate=certificate.split("/");

			
			for(var i=0;i<<?php echo sizeof($certificateinfo)?>;i++){
				if(document.getElementById(i+"a").value==certificate[3]){
					document.getElementById(i+"a").selected='selected';
					}
			
			}

			if(document.getElementById("b1").value==certificate[10]){
				document.getElementById("b1").checked='checked';
				}
			else{
				document.getElementById("b2").checked='checked';
				}
			document.getElementById('0').value=certificate[0];
			document.getElementById('1').value=certificate[1];
			document.getElementById('2').value=certificate[2];
			document.getElementById('3').value=certificate[4];
			document.getElementById('4').value=certificate[5];
			document.getElementById('5').value=certificate[6];
			document.getElementById('6').value=certificate[12];
			document.getElementById('7').value=certificate[8];
			document.getElementById('8').value=certificate[9];
			document.getElementById('9').value=certificate[11];
			document.getElementById('10').value=certificate[13];
			document.getElementById('id').value=certificate[14];
			}
		function certificateuninfo(){//消除赋值
			
			document.getElementById("0a").selected='';
			document.getElementById("b1").checked='';
			document.getElementById('0').value='';
			document.getElementById('1').value='';
			document.getElementById('2').value='';
			document.getElementById('3').value='';
			document.getElementById('4').value='';
			document.getElementById('5').value='';
			document.getElementById('6').value='';
			document.getElementById('7').value='';
			document.getElementById('8').value='';
			document.getElementById('9').value='';
			document.getElementById('10').value='';
			document.getElementById('id').value='';

			
			document.getElementById('0').value='';
			document.getElementById('title0').value='';
			document.getElementById('contract0').value='';
			document.getElementById('qualification0').value='';
	    	document.getElementById('insertOrUpdate1').value='';/* 弹出框是插入数据还是更新 */
	    	document.getElementById('insertOrUpdate2').value='';/* 弹出框是插入数据还是更新 */
	    	document.getElementById('insertOrUpdate3').value='';/* 弹出框是插入数据还是更新 */
			}
	
		/* 员工职称弹出框 */
		function titleinfo(title){
			
			var title=title.split("/");
	
			
			for(var i=0;i<<?php echo sizeof($titleinfo)?>;i++){
				if(document.getElementById(i+"c").value==title[1]){
					
					document.getElementById(i+"c").selected='selected';
					}
			
			}

			if(document.getElementById("d1").value==title[7]){
		
				document.getElementById("d1").checked='checked';
				}
			else{
				document.getElementById("d2").checked='checked';
				}
			document.getElementById('title0').value=title[0];
			document.getElementById('title1').value=title[2];
			document.getElementById('title2').value=title[3];
			document.getElementById('title3').value=title[4];
			document.getElementById('title4').value=title[5];
			document.getElementById('title5').value=title[6];
			document.getElementById('title6').value=title[8];
			document.getElementById('title7').value=title[9];
			document.getElementById('tid').value=title[10];
			}
		/* 消除赋值员工职称弹出框 */
		function titleuninfo(){
			document.getElementById("0c").selected='';
			document.getElementById("d1").checked='checked';
			document.getElementById('title0').value='';
			document.getElementById('title1').value='';
			document.getElementById('title2').value='';
			document.getElementById('title3').value='';
			document.getElementById('title4').value='';
			document.getElementById('title5').value='';
			document.getElementById('title6').value='';
			document.getElementById('title7').value='';
			document.getElementById('tid').value='';

			document.getElementById('0').value='';
			document.getElementById('title0').value='';
			document.getElementById('contract0').value='';
			document.getElementById('qualification0').value='';
	    	document.getElementById('insertOrUpdate1').value='';/* 弹出框是插入数据还是更新 */
	    	document.getElementById('insertOrUpdate2').value='';/* 弹出框是插入数据还是更新 */
	    	document.getElementById('insertOrUpdate3').value='';/* 弹出框是插入数据还是更新 */
			}
		/* 员工合同弹出框 */
		function contractinfo(contract){
		var contract=contract.split("/");
		for(var i=0;i<<?php echo sizeof($contractinfo)?>;i++){
			if(document.getElementById(i+"e").value==contract[2]){
				document.getElementById(i+"e").selected='selected';
				}
				}
			document.getElementById('contract0').value=contract[0];
			document.getElementById('contract1').value=contract[1];
			document.getElementById('contract2').value=contract[3];
			document.getElementById('contract3').value=contract[4];
			document.getElementById('contract4').value=contract[5];
			document.getElementById('contract5').value=contract[6]; 
			document.getElementById('ccid').value=contract[7];
			}

		/* 消除赋值员工合同弹出框 */
		function contractuninfo(){
			document.getElementById("0e").selected='';
			document.getElementById('contract0').value='';
			document.getElementById('contract1').value='';
			document.getElementById('contract2').value='';
			document.getElementById('contract3').value='';
			document.getElementById('contract4').value='';
			document.getElementById('contract5').value='';
			document.getElementById('ccid').value='';
			document.getElementById('0').value='';
			document.getElementById('title0').value='';
			document.getElementById('contract0').value='';
			document.getElementById('qualification0').value='';
	    	document.getElementById('insertOrUpdate1').value='';/* 弹出框是插入数据还是更新 */
	    	document.getElementById('insertOrUpdate2').value='';/* 弹出框是插入数据还是更新 */
	    	document.getElementById('insertOrUpdate3').value='';/* 弹出框是插入数据还是更新 */
			}
		
		/* 员工资历弹出框 */
		function qualificationinfo(qualification){
		
			var qualification=qualification.split("/");

			
	
		for(var i=0;i<<?php echo sizeof($shipinfo)?>;i++){
			
			if(document.getElementById(i+"f").value==qualification[1]){
				document.getElementById(i+"f").selected='selected';
				}
		
		}
	for(var i=0;i<<?php echo sizeof($departmentinfo)?>;i++){
			
			if(document.getElementById(i+"g").value==qualification[2]){
				document.getElementById(i+"g").selected='selected';
				}
		
		}
	for(var i=0;i<<?php echo sizeof($postinfo)?>;i++){
		
		if(document.getElementById(i+"h").value==qualification[3]){
			document.getElementById(i+"h").selected='selected';
			}
	
	}
			document.getElementById('qualification0').value=qualification[0];
			document.getElementById('qualification1').value=qualification[4];
			document.getElementById('qualification2').value=qualification[5];
			document.getElementById('qualification3').value=qualification[6];
			document.getElementById('qid').value=qualification[7];
			}
		/* 员工资历弹出框 */
		function qualificationuninfo(){
		
			document.getElementById("0f").selected='';
			document.getElementById("0g").selected='';	
			document.getElementById("0h").selected='';
			document.getElementById('qualification0').value='';	
			document.getElementById('qualification1').value='';	
			document.getElementById('qualification2').value='';	
			document.getElementById('qualification3').value='';	
			document.getElementById('0').value='';
			document.getElementById('title0').value='';
			document.getElementById('contract0').value='';
			document.getElementById('qualification0').value='';
			document.getElementById('insertOrUpdate').value='';/* 弹出框是插入数据还是更新 */
	    	document.getElementById('insertOrUpdate1').value='';/* 弹出框是插入数据还是更新 */
	    	document.getElementById('insertOrUpdate2').value='';/* 弹出框是插入数据还是更新 */
	    	document.getElementById('insertOrUpdate3').value='';/* 弹出框是插入数据还是更新 */
	    	document.getElementById('qid').value='';
			}
															jQuery(function($) {
															
															 $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
												            _title: function(title) {
												                var $title = this.options.title || '&nbsp;'
												                if( ("title_html" in this.options) && this.options.title_html == true )
												                        title.html($title);
												                else title.text($title);
												            }
												        }));
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
												                      
											                            location.href="<?php echo Yii::app()->createUrl("Information/addDelete");?>"+"?del_id="+$a;
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
											        $( "button[name=fujiandelete]" ).on('click', function(e) {/*附件删除  */
											        	  var $a = $(this).attr("id");
											        	  $x=$a.split(",");
											        	  $a=$x[1];
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
												                      
											                            location.href="<?php echo Yii::app()->createUrl("Information/attachment");?>"+"?del_id="+$a;
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
											        $( "#fujiandelete1" ).on('click', function(e) {/*附件删除  */
												        
											        	  var $a = $(this).attr("name");
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
												                      
											                            location.href="<?php echo Yii::app()->createUrl("Information/attachment");?>"+"?del_id="+$a;
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
											        /* 文件上传  */


													//editables on first profile page
													$.fn.editable.defaults.mode = 'inline';
													$.fn.editableform.loading = "<div class='editableform-loading'><i class='light-blue icon-2x icon-spinner icon-spin'></i></div>";
												    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="icon-ok icon-white"></i></button>'+
												                                '<button type="button" class="btn editable-cancel"><i class="icon-remove"></i></button>';    
													
												
												
													$('#about').editable({
														mode: 'inline',
												        type: 'wysiwyg',
														name : 'about',
														wysiwyg : {
															//css : {'max-width':'300px'}
														},
														success: function(response, newValue) {
														}
													});
													
													
													
													// *** editable avatar *** //
													try {//ie8 throws some harmless exception, so let's catch it
												
														//it seems that editable plugin calls appendChild, and as Image doesn't have it, it causes errors on IE at unpredicted points
														//so let's have a fake appendChild for it!
														if( /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ) Image.prototype.appendChild = function(el){}
												
														var last_gritter
														$('#avatar').editable({
															type: 'image',
															name: 'avatar',
															value: null,
															image: {
																//specify ace file input plugin's options here
																btn_choose: 'Change Avatar',
																droppable: true,
																/**
																//this will override the default before_change that only accepts image files
																before_change: function(files, dropped) {
																	return true;
																},
																*/
												
																//and a few extra ones here
																name: 'avatar',//put the field name here as well, will be used inside the custom plugin
																max_size: 1100000,//~100Kb
																on_error : function(code) {//on_error function will be called when the selected file has a problem
																	if(last_gritter) $.gritter.remove(last_gritter);
																	if(code == 1) {//file format error
																		last_gritter = $.gritter.add({
																			title: 'File is not an image!',
																			text: 'Please choose a jpg|gif|png image!',
																			class_name: 'gritter-error gritter-center'
																		});
																	} else if(code == 2) {//file size rror
																		last_gritter = $.gritter.add({
																			title: 'File too big!',
																			text: 'Image size should not exceed 100Kb!',
																			class_name: 'gritter-error gritter-center'
																		});
																	}
																	else {//other error
																	}
																},
																on_success : function() {
																	$.gritter.removeAll();
																}
															},
														    url: function(params) {
																// ***UPDATE AVATAR HERE*** //
																//You can replace the contents of this function with examples/profile-avatar-update.js for actual upload
												
												
																var deferred = new $.Deferred
												
																//if value is empty, means no valid files were selected
																//but it may still be submitted by the plugin, because "" (empty string) is different from previous non-empty value whatever it was
																//so we return just here to prevent problems
																var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
																if(!value || value.length == 0) {
																	deferred.resolve();
																	return deferred.promise();
																}
												
												
																//dummy upload
																setTimeout(function(){
																	if("FileReader" in window) {
																		//for browsers that have a thumbnail of selected image
																		var thumb = $('#avatar').next().find('img').data('thumb');
																		if(thumb) $('#avatar').get(0).src = thumb;
																	}
																	
																	deferred.resolve({'status':'OK'});
												
																	if(last_gritter) $.gritter.remove(last_gritter);
																	last_gritter = $.gritter.add({
																		title: 'Avatar Updated!',
																		text: 'Uploading to server can be easily implemented. A working example is included with the template.',
																		class_name: 'gritter-info gritter-center'
																	});
																	
																 } , parseInt(Math.random() * 800 + 800))
												
																return deferred.promise();
															},
															
															success: function(response, newValue) {
															}
														})
													}catch(e) {}
													
													
												
													//another option is using modals
													$('#avatar2').on('click', function(){
														var modal = 
														'<div class="modal hide fade">\
															<div class="modal-header">\
																<button type="button" class="close" data-dismiss="modal">&times;</button>\
																<h4 class="blue">Change Avatar</h4>\
															</div>\
															\
															<form class="no-margin">\
															<div class="modal-body">\
																<div class="space-4"></div>\
																<div style="width:75%;margin-left:12%;"><input type="file" name="file-input" /></div>\
															</div>\
															\
															<div class="modal-footer center">\
																<button type="submit" class="btn btn-small btn-success"><i class="icon-ok"></i> Submit</button>\
																<button type="button" class="btn btn-small" data-dismiss="modal"><i class="icon-remove"></i> Cancel</button>\
															</div>\
															</form>\
														</div>';
														
														
														var modal = $(modal);
														modal.modal("show").on("hidden", function(){
															modal.remove();
														});
												
														var working = false;
												
														var form = modal.find('form:eq(0)');
														var file = form.find('input[type=file]').eq(0);
														file.ace_file_input({
															style:'well',
															btn_choose:'Click to choose new avatar',
															btn_change:null,
															no_icon:'icon-picture',
															thumbnail:'small',
															before_remove: function() {
																//don't remove/reset files while being uploaded
																return !working;
															},
															before_change: function(files, dropped) {
																var file = files[0];
																if(typeof file === "string") {
																	//file is just a file name here (in browsers that don't support FileReader API)
																	if(! (/\.(jpe?g|png|gif)$/i).test(file) ) return false;
																}
																else {//file is a File object
																	var type = $.trim(file.type);
																	if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif)$/i).test(type) )
																			|| ( type.length == 0 && ! (/\.(jpe?g|png|gif)$/i).test(file.name) )//for android default browser!
																		) return false;
												
																	if( file.size > 11000000 ) {//~100Kb
																		return false;
																	}
																}
												
																return true;
															}
														});
												
														form.on('submit', function(){
															if(!file.data('ace_input_files')) return false;
															
															file.ace_file_input('disable');
															form.find('button').attr('disabled', 'disabled');
															form.find('.modal-body').append("<div class='center'><i class='icon-spinner icon-spin bigger-150 orange'></i></div>");
															
															var deferred = new $.Deferred;
															working = true;
															deferred.done(function() {
																form.find('button').removeAttr('disabled');
																form.find('input[type=file]').ace_file_input('enable');
																form.find('.modal-body > :last-child').remove();
																
																modal.modal("hide");
												
																var thumb = file.next().find('img').data('thumb');
																if(thumb) $('#avatar2').get(0).src = thumb;
												
																working = false;
															});
															
															
															setTimeout(function(){
																deferred.resolve();
															} , parseInt(Math.random() * 800 + 800));
												
															return false;
														});
																
													});
												
													
												
											
													////////////////////
													//change profile
													$('[data-toggle="buttons"] .btn').on('click', function(e){
														var target = $(this).find('input[type=radio]');
														var which = parseInt(target.val());
														$('.user-profile').parent().addClass('hide');
														$('#user-profile-'+which).parent().removeClass('hide');
													});
												
										/* 数据库删除操作 */		
										   $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
									            _title: function(title) {
									                var $title = this.options.title || '&nbsp;'
									                if( ("title_html" in this.options) && this.options.title_html == true )
									                        title.html($title);
									                else title.text($title);
									            }
									        }));
										 //删除
								        $( "#delete" ).on('click', function(e) {//附件删除
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
								                        	 location.href="<?php echo Yii::app()->createUrl("Information/attachment");?>"+"?del_id="+$a;
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
											        
		  });	
		</script>   
	
	

	
		</body>
									