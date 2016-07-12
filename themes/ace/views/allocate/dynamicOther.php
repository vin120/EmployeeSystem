
<?php

    $this->pageTitle = Yii::t('vcos','员工月度考核');
    $theme_url = Yii::app()->theme->baseUrl;
    $menu_type = 'assessment_month';
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
												

												
                                                <li class='active'>
													<a >考核结果维护</a>
												</li>
												
												
											</ul>

											<div class="tab-content">
												
											
													     
														
													
												
												
									
					
													<!-- 离职档案 -->
													<!-- -------------第一个div  -------------------------->
													<div id="protectresult" class='tab-pane in active' style="height:2000px">
													
																	<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工考核管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工月度管理'); ?>
                                        </small>
                                    </h1>
                            </div><!-- /.page-header -->
													
														 <form id='member_list' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Assessment/assessment_month");?>" autocomplete="off" >
										 		<?php if ($t==0){?>
										 			<input type='hidden' name='page' value="<?php echo $page;?>">
                                                       <input type='hidden' name='isPage' value="1">
												
												
												
			

	

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
														<th><?php echo yii::t('vcos', '序号')?>	</th>
														<th>
														<?php echo yii::t('vcos', '当前部门')?>	
														<th><?php echo yii::t('vcos', '当前职务')?>	</th>
														</th>
														<th><?php echo yii::t('vcos', '当前动态')?>	</th>
														<th><?php echo yii::t('vcos', '所在船舶')?>	</th>							
														<th><?php echo yii::t('vcos', '动态开始时间')?>	</th>			
														<th><?php echo yii::t('vcos', '动态结束时间')?>	</th>
															<th><?php echo yii::t('vcos', '操作')?>	</th>
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
															<?php echo yii::t('vcos',$v['cn_name'])?>
															
														</td>
														 <td class="hidden-480">
                                                       	<?php echo yii::t('vcos',$v['month_of_assessment'])?>
															
														</td>
														<td class="hidden-480">
														<?php echo yii::t('vcos',$v['department_name'])?>
														
														</td>
                                                       <td class="hidden-480">
                                                       	<?php echo yii::t('vcos',$v['post_cn_name'])?>
															
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['employee_code'])?>
															
														</td>
														
														
														
														
														<td class="hidden-480">
														<?php echo yii::t('vcos',$v['score'])?>
														
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['bonus'])?>
															
														</td>
													
										
														<td>
														<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																

															<button class="btn btn-xs btn-info" href="#modal-form" role="button"  data-toggle="modal" onclick="alertinfo('<?php echo  $v['department_id'].'/'.$v['post_id'].'/'.$v['cn_name'].'/'.$v['employee_code'].'/'.$v['month_of_assessment'].'/'.$v['score'].'/'.$v['bonus'].'/'.$v['remark']?>')">
																	
																	<i class="icon-edit bigger-120"></i>
																	
																</button>

																		 <?php
                                                                      
                                                                            $this->widget('ManipulateWidget',array(
                                                                                'ControllerName'=>'Information',
                                                                                'MethodName'=>'monthUpdate',
                                                                                'id'=>$v['employee_code'],
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
												
														
													<input type="hidden" name="t" value="0">
													
												 <!-- 分页 -->
                                          <div class="center" id="page_div"></div> 
                                        <?php }?>
									</form>					
													
											  </div>
													
												

	</div>
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
				
<!-- --------------------------------弹出框---------------------------------- -->
<div id="modal-form" class="modal" tabindex="-1">

<form action="MonthUpdate" method="post">
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
     		<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '部门:')?></label>

										<div class="col-sm-9"  style="width:68%">
										<select class="form-control" id="form-field-select-1" name="department_id">
										
											<?php foreach ($depinfo as $k=>$v):?>				
																<option value="<?=$v['department_id']?>" id="<?=$k?>a"><?php echo yii::t('vcos', $v['department_name'])?></option>
																<?php endforeach;?>
															</select>
											
										</div>
									</div>
      </td>
    <td width="300"><div class="form-group">
     	<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '职务：')?></label>

										<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1" name="post_id">
												
												<?php foreach ($postinfo as $k=>$v):?>				
																<option value="<?=$v['post_id']?>" id="<?=$k?>b"><?php echo yii::t('vcos', $v['post_cn_name'])?></option>
																<?php endforeach;?>
															</select>
        
        
        </div>
      </div></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td>
<div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '姓名:')?> </label>
						          <div class="col-sm-9" >
						            <input type="text" readonly="readonly"  style="width:90%"  name="cn_name"   id="a" class="col-xs-10 col-sm-5" />
					              </div>
        </div>
      </td>
    <td><div class="form-group">
       <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '员工编号:')?> </label>
						          <div class="col-sm-9" >
						            <input type="text" readonly="readonly"  style="width:90%"  name="employee_code"   id="b" class="col-xs-10 col-sm-5" />
					              </div>
      </div></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
     	<label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '考核月份:')?></label>

										<div class="col-sm-9"  style="width:68%">
											<select class="form-control" id="form-field-select-1" name="month_of_assessment">
												
												<?php foreach ($month_assessmentinfo as $k=>$v):?>				
																<option value="<?=$v['month_of_assessment']?>" id="<?=$k?>c"><?php echo yii::t('vcos', $v['month_of_assessment'])?></option>
																<?php endforeach;?>
															</select>
        
        
        </div>
      </div></td>
  <td><div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '绩效奖金')?> </label>
						          <div class="col-sm-9" >
						            <input type="text" style="width:90%"  name="bonus"   id="d" class="col-xs-10 col-sm-5" />
					              </div>
        </div></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '考核分数:')?> </label>
						          <div class="col-sm-9" >
						            <input type="text" style="width:90%"  name="score"   id="c" class="col-xs-10 col-sm-5" />
					              </div>
        </div></td>
    <td></td>
  </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td colspan="2">
      <div>备注
        <textarea class="form-control" id="e" name='remark' placeholder="Default Text"></textarea>
        </div>
      </td>
  </tr>
  
                                              </table>
																						<!--  -->
										  </div>

											<div class="modal-footer">
												<button class="btn btn-sm" type="button" data-dismiss="modal">
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
									</form>
								</div><!-- PAGE CONTENT ENDS -->
<!-- -------------------------------------------------------------------- -->
	
					
			
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


									function alertinfo(post){
										info=post.split("/");
										
										
										for(var i=0;i<<?php echo sizeof($depinfo)?>;i++){
											if(document.getElementById(i+"a").value==info[0]){
												document.getElementById(i+"a").selected='selected';
												}
										
										}
										for(var i=0;i<<?php echo sizeof($postinfo)?>;i++){
											if(document.getElementById(i+"b").value==info[1]){
												document.getElementById(i+"b").selected='selected';
												}
										
										}
										for(var i=0;i<<?php echo sizeof($month_assessmentinfo)?>;i++){
											if(document.getElementById(i+"c").value==info[4]){
												document.getElementById(i+"c").selected='selected';
												}
										
										}
										
										
										document.getElementById('a').value=info[2];
										document.getElementById('b').value=info[3];
										document.getElementById('c').value=info[5];
										document.getElementById('d').value=info[6];
										document.getElementById('e').value=info[7];
										
										
										
										}
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
										                      
									                            location.href="<?php echo Yii::app()->createUrl("Assessment/monthUpdate");?>"+"?del_id="+$a;
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
									