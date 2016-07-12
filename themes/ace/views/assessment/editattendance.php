
<?php

    $this->pageTitle = Yii::t('vcos','员工季度考核');
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
				<script src="<?php echo $theme_url; ?>/assets/js/My97DatePicker/WdatePicker.js"></script><!-- 日期选择 -->
				<script src="<?php echo $theme_url; ?>/assets/js/bootstrap.min.js"></script>
				<script src="<?php echo $theme_url; ?>/assets/js/date-time/bootstrap-datepicker.min.js"></script>
				<script src="<?php echo $theme_url; ?>/assets/js/date-time/bootstrap-timepicker.min.js"></script>
				<script src="<?php echo $theme_url; ?>/assets/js/date-time/daterangepicker.min.js"></script>
				<script src="<?php echo $theme_url; ?>/assets/js/bootstrap-colorpicker.min.js"></script>
                    
<?php  ?>
<script type="text/javascript">
$(function(){

	
});
</script>

	
		
		
	<body>
	

		<div class="col-sm-6" style="width:100%">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li class='active'>
													<a data-toggle="tab" >	<?php echo yii::t('vcos', '假期管理')?></a>
												</li>
											
                                               
											</ul>

											<div class="tab-content">
												<div id="adminstrator" class='tab-pane in active' style="height:2000px">
												
														<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工考核管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','员工出勤管理'); ?>
                                        </small>
                                    </h1>
                            		</div><!-- /.page-header -->
												
											<form id='member_list' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Assessment/editattendance");?>" autocomplete="off" >
										 <input type='hidden' name='page' value="<?php echo $page;?>">
                                        <input type='hidden' name='isPage' value="1">
	                                    <input type="hidden" name="employee_code" value="<?php echo $employee_code?>">
	                                   <table width=90% height="70px">
	                                   <tr>
	                                   <td width="5%"></td>
	                                   <td width="40%"> <?php echo Yii::t('vcos','<h5>员工编号:'.$posts[0]['employee_code'].'</h5>'); ?></td>
	                                   <td> <?php echo Yii::t('vcos','<h5>入职时间:'.$posts[0]['date_of_entry'].'</h5>'); ?></td>
	                                    <td> <?php echo Yii::t('vcos','<h5>姓名:'.$posts[0]['cn_name'].'</h5>'); ?></td>
	                                   </tr>
	                                    <tr>
	                                       <td></td>
	                                   <td> <?php echo Yii::t('vcos','<h5>性别:'); ?> <?php echo Yii::t('vcos',$posts[0]['sex']=='1'?'男':'女'); ?></td>
	                                   <td> <?php echo Yii::t('vcos','<h5>部门:'.$posts[0]['department_name'].'</h5>'); ?></td>
	                                    <td> <?php echo Yii::t('vcos','<h5>职务:'.$posts[0]['post_cn_name'].'</h5>'); ?></td>
	                                   </tr>
	                                   </table>
	                                    <div class="col-xs-12">
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>  <label>
                                                                            <input type="checkbox" class="ace" />
                                                                            <span class="lbl"></span>
                                                                    </label></th>
														<th><?php echo yii::t('vcos', '序号')?></th>
														<th><?php echo yii::t('vcos', '假期类型')?></th>
														<th class="hidden-480"><?php echo yii::t('vcos', '内容')?></th>
															<th>
															<?php echo yii::t('vcos', '天数')?>
															</th>
															<th><?php echo yii::t('vcos', '姓名')?></th>
															<th><?php echo yii::t('vcos', '开始时间')?></th>
															<th><?php echo yii::t('vcos', '结束时间')?></th>
															<th><?php echo yii::t('vcos', '操作')?></th>		
															</tr>
												</thead>

												<tbody>
													
													<?php foreach ($posts as $k=>$v):?>
												
														<tr>
															<td >													  												  				<label>
                                                                    <input type="checkbox" name="ids[]" value="<?php echo $v['id'];?>" class="ace isclick" />
                                                                    <span class="lbl"></span>
                                                                </label>
                                                              
                                                                </td>

														<td>
															<a href="#"><?=$k?></a>
														</td>
						
														<td class="hidden-480">
														<?php echo yii::t('vcos',$v['holiday_type'])?>
														
														</td>
                                                       <td class="hidden-480">
                                                       	<?php echo yii::t('vcos',$v['remark'])?>
															
														</td>
														 <td class="hidden-480">
                                                       	<?php echo yii::t('vcos',$v['count_day'])?>
															
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['cn_name'])?>
															
														</td>
														<td class="hidden-480">
														<?php echo yii::t('vcos',$v['date_of_start'])?>
														</td>
														<td class="hidden-480">
															<?php echo yii::t('vcos',$v['date_of_end'])?>
															
														</td>	
														<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																<button class="btn btn-xs btn-info" href="#modal-form" role="button"  data-toggle="modal" onclick="alertinfo('<?php echo  $v['id'].'/'.$v['holiday_id'].'/'.$v['count_day'].'/'.$v['date_of_start'].'/'.$v['date_of_end'].'/'.$v['remark']?>')">
																	<i class="icon-edit bigger-120"></i>
																</button>

																	 <?php
                                                                      
                                                                            $this->widget('ManipulateWidget',array(
                                                                                'ControllerName'=>'Assessment',
                                                                                'MethodName'=>'editattendance',
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
												<?php  endforeach; ?>
														
														
														
													

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
                                     <button class="btn btn-xs" href="#modal-form" role="button"  data-toggle="modal">
                                     <i class="icon-pencil align-top bigger-125"></i>
                                     <span class="bigger-110 no-text-shadow">添加</span>
                                      </button>
                                      </div>	
												 <!-- 分页 -->
                                          <div class="center" id="page_div"></div> 
                                        
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
			
			<form action="editattendanceUpdate" method="post">
			<input type="hidden" name="id" id='0'>
			<input type="hidden" name="employee_code" value="<?php echo  $employee_code?>">
			<div id="modal-form" class="modal" tabindex="-1">
									<div class="modal-dialog" style="width:640px">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" onclick="deleteinfo();" data-dismiss="modal">&times;</button>
												<h4 class="blue bigger">请编辑</h4>
											</div>
											<div class="modal-body overflow-visible">
											<!-- ------------------ -->
												<table width="600">
  <tr>
    <td width="10" height="52">&nbsp;</td>
    <td>
     <div class="form-group">
         <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '姓名:')?></label>
      <div class="col-sm-9" >
       <input type="text" style="width:90%" name="cn_name" readonly="readonly" value="<?php echo $posts[0]['cn_name']?>"  class="col-xs-10 col-sm-5" />
        </div>
        </div></td>
        <td></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td><div class="form-group">
      <label class="col-sm-3 control-label no-padding-right" for="form-field-2"><?php echo yii::t('vcos', '请假类型:')?></label>
      
      <div class="col-sm-9"  style="width:68%">
      	<select class="form-control" id="form-field-select-1" name="holiday_id">
												<?php foreach ($holidayinfo as $k=>$v):?>				
																<option value="<?=$v['holiday_id']?>" id="<?=$k?>c"><?php echo yii::t('vcos', $v['holiday_type'])?></option>
																<?php endforeach;?>
															</select>
        
        
        </div>
      </div></td>
    <td><div class="form-group">
     <label class="col-sm-3 control-label no-padding-right" for="form-field-3"><?php echo yii::t('vcos', '天数:')?> </label>

        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="count_day"   id="1"  class="col-xs-10 col-sm-5" />
          </div>
      </div></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
      <td><div class="form-group">
     <label class="col-sm-3 control-label no-padding-right"  for="form-field-3"><?php echo yii::t('vcos', '开始时间:')?> </label>

        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="date_of_start" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"  id="2"  class="col-xs-10 col-sm-5" />
          </div>
      </div></td>
    <td>
    <div class="form-group">
       <label class="col-sm-3 control-label no-padding-right"  for="form-field-3"><?php echo yii::t('vcos', '结束时间:')?> </label>

        <div class="col-sm-9" >
          <input type="text" style="width:90%" name="date_of_end" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"   id="3"  class="col-xs-10 col-sm-5" />
          </div>
        </div>
    </td>
  </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td colspan="2">
      <div>备注
        <textarea class="form-control" id="4" name="remark" placeholder="Default Text"></textarea>
        </div>
      </td>
  </tr>
                                              </table>
																						<!--  -->
										  </div>

											<div class="modal-footer">
												<button class="btn btn-sm" type="button" onclick="deleteinfo();" data-dismiss="modal">
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
									function alertinfo(myholiday){
										holiday=myholiday.split("/");
										for(var i=0;i<<?php echo sizeof($holidayinfo)?>;i++){
											if(document.getElementById(i+"c").value==holiday[1]){
												document.getElementById(i+"c").selected='selected';
												}
										}
										document.getElementById('0').value=holiday[0];
										document.getElementById('1').value=holiday[2];
										document.getElementById('2').value=holiday[3];
										document.getElementById('3').value=holiday[4];
										document.getElementById('4').value=holiday[5];
										}
									function deleteinfo(){
										document.getElementById("0c").selected='selected';
										document.getElementById('0').value='';
										document.getElementById('1').value='';
										document.getElementById('2').value='';
										document.getElementById('3').value='';
										document.getElementById('4').value='';
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
									                        	 location.href="<?php echo Yii::app()->createUrl("Assessment/editattendanceUpdate");?>"+"?del_id="+$a;
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

									});
									</script>   
                                           
                                      
									</body>
									