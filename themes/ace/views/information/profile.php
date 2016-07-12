
<?php

    $this->pageTitle = Yii::t('vcos','员工档案管理');
    $this->pageTag = 'index';
    $theme_url = Yii::app()->theme->baseUrl;
    $menu_type = 'information_profile';
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
	<body>
	

	<div class="col-sm-6" style="width:100%">
	
										<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li <?php echo $t==0?"class='active'":"" ?>>
													<a href="information_profile?t=0" >  <?php echo yii::t('vcos', '档案查询')?> </a>
												</li>
												<li <?php echo $t==1?"class='active'":"" ?>>
													<a href="information_profile?t=1"><?php echo yii::t('vcos', '离职档案')?></a>
												</li>

												
											</ul>
										
											<div class="tab-content">
												<div id="selectdang" <?php echo $t==0?"class='tab-pane in active'":"class='tab-pane'" ?> >
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
													 <form id='member_list' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Information/information_profile");?>" autocomplete="off" >
													 <input type='hidden' name='page' value="<?php echo $page;?>">
                                                       <input type='hidden' name='isPage' value="1">
													<div class="page-content">
						

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <?php echo yii::t('vcos', '员工编号：')?> </label>

										<div class="col-sm-9">
											<input type="text" name="employee_code" value="<?php echo $employee_code; ?>"  id="form-field-1" placeholder="员工编号"  class="col-xs-10 col-sm-5" />
										</div>
									</div>

						<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">姓名： </label>

										<div class="col-sm-9">
											<input type="text" name="cn_name" value="<?php echo $cn_name;?>" class="col-xs-10 col-sm-5" placeholder="姓名"/>
										</div>
									</div>
									
									
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', ' 部门：')?>  </label>

										<div class="col-sm-9" style="width: 33%;">
											<select class="form-control" id="form-field-select-1" name="department_id">
										<option value="" selected='selected'><?php echo yii::t('vcos', '全部')?></option>
											<?php foreach ($depinfo as $k=>$v):?>				
																<option value="<?=$v['department_id']?>" <?=$v['department_id']==$department_id?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['department_name'])?></option>
																<?php endforeach;?>
															</select>
											
										</div>
									</div>
							
							
							
							<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', ' 职业：')?>   </label>

										<div class="col-sm-9" style="width: 33%;">
											<select class="form-control" id="form-field-select-1" name="post_id">
												<option value="" selected='selected'><?php echo yii::t('vcos', '全部')?></option>
												<?php foreach ($postinfo as $k=>$v):?>				
																<option value="<?=$v['post_id']?>" <?=$v['post_id']==$post_id?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['post_cn_name'])?></option>
																<?php endforeach;?>
															</select>
											
											
										</div>
									</div>
									<center>
											
											<button type="submit" class="btn btn-purple btn-sm"  style="width:80px;height:41px">
																			<?php echo yii::t('vcos', ' 搜索')?>
																			<i class="icon-search icon-on-right bigger-110"></i>
																		</button> 


											&nbsp; &nbsp; &nbsp;
										  <a href="information_profile">	<button class="btn" type="button" >
												<i class="icon-undo bigger-110"></i>
												<?php echo yii::t('vcos', ' 清空')?>
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
														<th><?php echo yii::t('vcos', ' 序号')?></th>
														<th><?php echo yii::t('vcos', ' 员工编号')?></th>
														<th class="hidden-480"><?php echo yii::t('vcos', ' 员工卡号')?></th>

														<th>
														<?php echo yii::t('vcos', ' 姓名')?>
															
														</th>
															<th><?php echo yii::t('vcos', ' 性别')?></th>
																<th><?php echo yii::t('vcos', ' 部门')?></th>
																	<th><?php echo yii::t('vcos', ' 职务')?></th>
																		<th><?php echo yii::t('vcos', ' 宿舍号')?></th>
																			<th><?php echo yii::t('vcos', ' 办公电话')?></th>
																				<th><?php echo yii::t('vcos', ' 手机号码')?></th>
																					<th><?php echo yii::t('vcos', ' 入职时间')?></th>
														

														<th>操作</th>
													</tr>
												</thead>

												<tbody>
												
													<?php foreach ($posts as $k=>$v):?>
														<tr>
													  	<td >
													  	
													  				<label>
                                                                    <input type="checkbox" name="ids[]" value="<?php echo $v['employee_code'];?>" class="ace isclick" />
                                                                    <span class="lbl"></span>
                                                                </label>
                                                              
                                                                </td>
														<td>
															<a href="#"><?=$k?></a>
														</td>
														<td><?php echo yii::t('vcos',$v['employee_code'])?></td>
														<td class="hidden-480"><?php echo yii::t('vcos',$v['employee_card_number'])?></td>
														<td><?php echo yii::t('vcos',$v['cn_name'])?></td>

														<td class="hidden-480">
														<?php echo yii::t('vcos',$v['sex'])?>
															
														</td>
														<td class="hidden-480">
														<?php echo yii::t('vcos',$v['department_name'])?>
														
														</td>
                                                       <td class="hidden-480">
                                                       	<?php echo yii::t('vcos',$v['post_cn_name'])?>
															
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['dormitory_num'])?>
															
														</td>
														<td class="hidden-480">
														<?php echo yii::t('vcos',$v['telephone_num'])?>
														
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['mobile_num'])?>
															
														</td>
														<td class="hidden-480">
														
															<?php echo yii::t('vcos',$v['date_of_entry'])?>
															
														</td>
														<td>
																		 <?php
                                                                      
                                                                            $this->widget('ManipulateWidget',array(
                                                                                'ControllerName'=>'Information',
                                                                                'MethodName'=>'profileUpdate',
                                                                                'id'=>$v['employee_code'],
                                                                            
                                                                                'canedit'=>true,
                                                                                'candelete'=>TRUE,
                                                                                'canchange'=>FALSE,
                                                                                'canreset'=>FALSE,
                                                                            ));

                                                                        ?>
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
                                                </div>
												 <!-- 分页 -->
		                                          <div class="center" id="page_div"></div> 
                                        
												</form>		
												</div>

												<div id="outdang" <?php echo $t==1?"class='tab-pane in active'":"class='tab-pane'" ?> >
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
													 <form id='member_list1' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Information/information_profile");?>" autocomplete="off" >
												 	<input type='hidden' name='page' value="<?php echo $page;?>">
                                                     <input type='hidden' name='isPage' value="1">
												
												<div class="page-content">
						

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> <?php echo yii::t('vcos', '员工编号：')?> </label>

										<div class="col-sm-9">
											<input type="text" name="employee_code" value="<?php echo $employee_code; ?>"  id="form-field-1" placeholder="员工编号" class="col-xs-10 col-sm-5" />
										</div>
									</div>

						<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">姓名： </label>

										<div class="col-sm-9">
											<input type="text" name="cn_name" value="<?php echo $cn_name;?>" placeholder="姓名" class="col-xs-10 col-sm-5" />
										</div>
									</div>
									
									
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', ' 部门：')?>  </label>

										<div class="col-sm-9" style="width: 33%;">
											<select class="form-control" id="form-field-select-1" name="department_id">
											<option value="" selected='selected'><?php echo yii::t('vcos', '全部')?></option>
											<?php foreach ($depinfo as $k=>$v):?>				
																<option value="<?=$v['department_id']?>" <?=$v['department_id']==$department_id?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['department_name'])?></option>
																<?php endforeach;?>
															</select>
											
										</div>
									</div>
							<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', ' 职业：')?>   </label>

										<div class="col-sm-9" style="width: 33%;">
											<select class="form-control" id="form-field-select-1" name="post_id">
												<option value="" selected='selected'><?php echo yii::t('vcos', '全部')?></option>
												<?php foreach ($postinfo as $k=>$v):?>				
																<option value="<?=$v['post_id']?>" <?=$v['post_id']==$post_id?"selected='selected'":'' ?>><?php echo yii::t('vcos', $v['post_cn_name'])?></option>
																<?php endforeach;?>
															</select>
											
											
										</div>
									</div>
							
												


									<center>
											
											<button type="submit" class="btn btn-purple btn-sm" name="soso" value="搜索" style="width:80px;height:41px">
																			<?php echo yii::t('vcos', ' 搜索')?>
																			<i class="icon-search icon-on-right bigger-110"></i>
																		</button> 


											&nbsp; &nbsp; &nbsp;
										  <a href="information_profile">	<button class="btn" type="button" value="清空">
												<i class="icon-undo bigger-110"></i>
												<?php echo yii::t('vcos', ' 清空')?>
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
														<th><?php echo yii::t('vcos', ' 序号')?></th>
														<th><?php echo yii::t('vcos', ' 员工编号')?></th>
														<th class="hidden-480"><?php echo yii::t('vcos', ' 员工卡号')?></th>

														<th>
														<?php echo yii::t('vcos', ' 姓名')?>
															
														</th>
															<th><?php echo yii::t('vcos', ' 性别')?></th>
																<th><?php echo yii::t('vcos', ' 部门')?></th>
																	<th><?php echo yii::t('vcos', ' 职务')?></th>
																		<th><?php echo yii::t('vcos', ' 宿舍号')?></th>
																			<th><?php echo yii::t('vcos', ' 办公电话')?></th>
																				<th><?php echo yii::t('vcos', ' 手机号码')?></th>
																					<th><?php echo yii::t('vcos', ' 离职时间')?></th>
														

														<th><?php echo yii::t('vcos', '操作')?></th>
													</tr>
												</thead>

												<tbody>
													<tr>
													<?php foreach ($posts as $k=>$v):?>
													<?php if ($v['employee_status']==3){?>
															<td >
													  				<label>
                                                                    <input type="checkbox" name="ids[]" value="<?php echo $v['employee_code'];?>" class="ace isclick" />
                                                                    <span class="lbl"></span>
                                                                </label>
                                                              
                                                                </td>
														<td>
															<a href="#"><?=$k?></a>
														</td>
														<td><?php echo yii::t('vcos',$v['employee_code'])?></td>
														<td class="hidden-480"><?php echo yii::t('vcos',$v['employee_card_number'])?></td>
														<td><?php echo yii::t('vcos',$v['cn_name'])?></td>

														<td class="hidden-480">
														<?php echo yii::t('vcos',$v['sex'])?>
															
														</td>
														<td class="hidden-480">
														<?php echo yii::t('vcos',$v['department_name'])?>
														
														</td>
                                                       <td class="hidden-480">
                                                       	<?php echo yii::t('vcos',$v['post_cn_name'])?>
															
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['dormitory_num'])?>
															
														</td>
														<td class="hidden-480">
														<?php echo yii::t('vcos',$v['telephone_num'])?>
														
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['mobile_num'])?>
															
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['date_of_entry'])?>
															
														</td>
														<td>
															 <?php
                                                                      
                                                                            $this->widget('ManipulateWidget',array(
                                                                                'ControllerName'=>'Information',
                                                                                'MethodName'=>'profileUpdate',
                                                                                'id'=>$v['employee_code'],
                                                                            
                                                                                'canedit'=>true,
                                                                                'candelete'=>TRUE,
                                                                                'canchange'=>FALSE,
                                                                                'canreset'=>FALSE,
                                                                            ));

                                                                        ?>
														</td>
													</tr>
													<?php }?>
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
                                                </div>
													<input type="hidden" name="t" value="1">		
											 <!-- 分页 -->
                                          <div class="center" id="page_div1"></div> 
                                        
									</form>			
													
													<!-- 离职档案 -->			
												</div>

												
											</div>
										</div>
									</div><!-- /span -->
								</div><!-- /row -->
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
                
					 <input type="hidden" id="whereform" value="<?php echo $t?>"><!-- 按全部删除的时候，，检测时档案查询的还是离职档案的 -->
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
								 
									jQuery(function($) {
									
										   $('table th input:checkbox').on('click' , function(){
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
									                        	 location.href="<?php echo Yii::app()->createUrl("Information/profileUpdate");?>"+"?del_id="+$a;
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
									                        	var whereform=$("#whereform").val();
									                        if(whereform==0){
									                            $("form#member_list").submit();
									                        }
									                        else if(whereform==1){
									                            $("form:nth-child(2)").submit();
									                        }
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
									                    $("form:first").submit();
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
									                    $("form:nth-child(2)").submit();
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
												
														});
									</script>   
                                           
                                      
									</body>
									