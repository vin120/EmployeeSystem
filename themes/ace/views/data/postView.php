<script type="text/javascript">
        window.jQuery || document.write("<script src='<?php echo $theme_url; ?>/assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
</script>
<!-- <![endif]-->
<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo $theme_url; ?>/assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
        if("ontouchend" in document) document.write("<script src='<?php echo $theme_url; ?>/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>

<style type="text/css">
    
    .error{
        color: red;

    }
</style>

<script
    src="<?php echo $theme_url; ?>/assets/js/jquery-ui-1.10.3.full.min.js"></script>
    <script
    src="<?php echo $theme_url; ?>/assets/personjs/jquery.validate.js"></script>


<div class="table-responsive">
    <form action="<?php echo Yii::app()->createUrl("data/data_post");?>"
        method="post">
        <table id="sample-table-2"
            class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th><label> <input class="ace" id="checkALL"
                            type="checkbox"> <span class="lbl"></span>
                    </label></th>
                    <th><?php echo Yii::t('vcos','序号');?></th>
                    <th><?php echo Yii::t('vcos','职务中文名称');?></th>
                    <th><?php echo Yii::t('vcos','职务英文名称');?></th>
                    <th><?php echo Yii::t('vcos','所属部门');?></th>
                    <th><?php echo Yii::t('vcos','操作');?></th>
                </tr>
            </thead>
            <tbody>
		<?php
		$i = 0;
		foreach ( $post as $row ) {
			$i ++;
			?>

				<tr>
                    <td><label> <input class="ace checkbox_button"
                            type="checkbox" name="ids[]"
                            value="<?php echo $row['post_id'];?>"> <span
                            class="lbl"></span>
                    </label></td>
                    <td><?php echo  $i;?></td>
                    <td id="table_contain2"><?php  echo $row['post_cn_name'];?></td>
                    <td id="table_contain3"><?php  echo $row['post_en_name'];?></td>
                    <td id="table_contain6"><?php  echo $row['newdepartmentname'];?></td>
                    <td id="table_contain4" style="display: none;"><?php  echo $row['department_id'];?> </td>
                    <td id="table_contain5" style="display: none;"> <?php  echo $row['remark'];?> </td>
                    <td>
                        <div
                            class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                            <a href="#modal-form" data-toggle="modal"
                                class="change"
                                id="<?php echo $row['post_id'];?>"
                                title="<?php echo Yii::t('vcos','编辑');?>">
                                <button type="button"
                                    class="btn btn-xs btn-info"
                                    role="button">
                                    <i class="icon-edit bigger-120"></i>
                                </button>
                            </a> <a  class="delete"
                                id="<?php echo $row['post_id'];?>"
                                title="<?php echo Yii::t('vcos','删除');?>">
                                <button class="btn btn-xs btn-warning">
                                    <i class="icon-trash bigger-120"></i>
                                </button>
                            </a>
                        </div>
                    </td>
                </tr>

			<?php    }  ?></tbody>
        </table>
    </form>
   
    <div class="center">
     <?php
					$this->widget ( 'MyCLinkPager', array (
							'pages' => $pages,
							'header' => false,
							'htmlOptions' => array (
									'class' => 'pagination' 
							),
							'firstPageLabel' => yii::t ( 'vcos', '首页' ),
							'lastPageLabel' => yii::t ( 'vcos', '尾页' ),
							'prevPageLabel' => '«',
							'nextPageLabel' => '»',
							'maxButtonCount' => 5,
							'cssFile' => false 
					) );
					?>
    </div>

     <div style="text-align: center; margin-top: 100px;">
        <button style="width: 85px;height: 42px;" class="btn btn-xs btn-warning"
            id="Batch_delete_records">
            <i class="icon-trash bigger-125"></i> <span
                class="bigger-110 no-text-shadow"><?php echo Yii::t('vcos','删除选中');?></span>
        </button>
        <a href="#modal-form1" data-toggle="modal">
            <button class="btn btn-info" type="button">
                <i class="icon-ok bigger-110"></i><?php echo Yii::t('vcos','新增');?> 
            </button>
        </a>
    </div>
</div>
<!-- 删除单条弹出框开始 -->
<div id="dialog-confirm" class="hide">
    <div class="alert alert-info bigger-110" id="dialog-confirm-content">
		<?php echo yii::t('vcos', '这条记录将被永久删除，并且无法恢复。')?></div>
    <div class="space-6"></div>
    <p class="bigger-110 bolder center grey" id="confirm">
        <i class="icon-hand-right blue bigger-120"></i> <?php echo Yii::t('vcos','确定吗？');?>
    </p>
</div>
<!-- 删除弹出框结束 -->
<!-- 选择批量删除却没有选到记录的警告弹出框开始 -->
<div id="dialog-confirm2" class="hide">
    <div class="alert alert-info bigger-110" id="dialog-confirm-content">
		<?php echo yii::t('vcos', '请选择删除项')?></div>
    <div class="space-6"></div>
</div>
<!-- 选择批量删除却没有选到记录的警告弹出框结束 -->
<!-- 多条删除弹出框开始 -->
<div id="dialog-confirm-multi" class="hide">
    <div class="alert alert-info bigger-110"
        id="dialog-confirm-multi-content">
		<?php echo yii::t('vcos', '这些选中的记录将被永久删除，并且无法恢复。')?></div>
    <div class="space-6"></div>
    <p class="bigger-110 bolder center grey" id="confirm_multi">
        <i class="icon-hand-right blue bigger-120"></i> <?php echo Yii::t('vcos','确定吗？');?>
    </p>
</div>
<!-- 多条删除弹出框结束 -->
<!-- 拿表格内容到编辑框js代码 -->
<!-- 弹出编辑框开始 -->
<div id="modal-form" class="modal" class="modal in"  tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger"><?php echo Yii::t('vcos','请填写以下内容');?></h4>
            </div>
            <div class="modal-body overflow-visible">
                <div class="center">
                    <form novalidate="novalidate"
                        class="form-horizontal" role="form"
                        method="post"
                        action="<?php echo Yii::app()->createUrl("data/data_post_add");?>"
                        id="change_edit" autocomplete="off">
                        <div class="form-group" style="overflow: hidden;">


                           <div style="float: left;width: 120px;height: 30px;line-height: 30px;text-align: right;margin-left: 20px;">
                            <spanfor="department_id"><?php echo Yii::t('vcos','部门');?>  </span>
                            </div>
                           <div style="float: left;margin-left: 20px;">
                                <select  
                                    id="department_id"
                                    name="department_id">
									<?php
									foreach ( $Alldepartment_name as $row ) {
											?>




									<option value="<?php echo $row['department_id'];?>"><?php  echo $row['department_name']; ?></option>



									<?php
									}
									
									?>
								</select>

                                </div>
                            
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group" style="overflow: hidden;">
                        <div style="float: left;width: 120px;height: 30px;line-height: 30px;text-align: right;margin-left: 20px;">

                             <label for="post_cn_name"><?php echo Yii::t('vcos','中文名称');?> </label> 
                        </div>


                        <div style="float: left;margin-left: 20px; height: 30px;">
                            <input  style="width: 229px;" placeholder="" id="post_cn_name" name="post_cn_name" type="text">

                        </div>
                           
                        </div>
                        <div class="space-6"></div>

                        <div class="form-group" style="overflow: hidden;">



                        <div style="float: left;width: 120px;height: 30px;line-height: 30px;text-align: right;margin-left: 20px;">
                            <label for="post_en_name"> <?php echo Yii::t('vcos','英文名称');?></label>

                        </div>

                        <div style="float: left;margin-left: 20px; height: 30px;">

                        <input placeholder="" id="post_en_name" style="width: 229px;" 
                             name="post_en_name" type="text">
                            

                        </div>
                             
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group" style="overflow: hidden;">

                        <div style="float: left;width: 120px;height: 68px;line-height: 30px;text-align: right;margin-left: 20px;">
                            <label for="remark"><?php echo Yii::t('vcos','备注');?></label>

                        </div>

                       <div style="float: left;margin-left: 20px; height: 30px;">

                         <textarea name="remark"
                         class="autosize-transition " id="remark"
                         style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 68px;width: 229px;overflow: visible;">
                         </textarea>
                            
                        </div>
                            
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="icon-remove"></i><?php echo Yii::t('vcos','取消');?> 
                    </button>
                    <button class="btn btn-sm btn-primary save">
                        <i class="icon-ok"></i> <?php echo Yii::t('vcos','保存');?>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE CONTENT ENDS -->
</div>
<!-- 弹出编辑框结束 -->
<!-- 新增弹出框 开始-->
<div id="modal-form1" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger"><?php echo Yii::t('vcos','请填写以下内容');?></h4>
            </div>
            <div class="modal-body overflow-visible">


                 <div class="center">
                   <form novalidate="novalidate"
                        class="form-horizontal" role="form"
                        method="post"
                        action="<?php echo Yii::app()->createUrl("data/data_post_add");?>"
                        id="form_add" autocomplete="off">
                        <div class="form-group" style="overflow: hidden;">


                           <div style="float: left;width: 120px;height: 30px;line-height: 30px;text-align: right;margin-left: 20px;">
                            <spanfor="department_id"><?php echo Yii::t('vcos','部门');?>  </span>
                            </div>
                           <div style="float: left;margin-left: 20px;">
                                <select  
                                    id="department_id"
                                    name="department_id">
                                    <?php
                                    foreach ( $Alldepartment_name as $row ) {
                                            ?>




                                    <option value="<?php echo $row['department_id'];?>"><?php  echo $row['department_name']; ?></option>



                                    <?php
                                    }
                                    
                                    ?>
                                </select>

                                </div>
                            
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group" style="overflow: hidden;">
                        <div style="float: left;width: 120px;height: 30px;line-height: 30px;text-align: right;margin-left: 20px;">

                             <label for="post_cn_name"><?php echo Yii::t('vcos','中文名称');?> </label> 
                        </div>


                        <div style="float: left;margin-left: 20px; height: 30px;">
                            <input  style="width: 229px;" placeholder="" id="post_cn_name" name="post_cn_name" type="text">

                        </div>
                           
                        </div>
                        <div class="space-6"></div>

                        <div class="form-group" style="overflow: hidden;">



                        <div style="float: left;width: 120px;height: 30px;line-height: 30px;text-align: right;margin-left: 20px;">
                            <label for="post_en_name"> <?php echo Yii::t('vcos','英文名称');?></label>

                        </div>

                        <div style="float: left;margin-left: 20px; height: 30px;">

                        <input placeholder="" id="post_en_name" style="width: 229px;" 
                             name="post_en_name" type="text">
                            

                        </div>
                             
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group" style="overflow: hidden;">

                        <div style="float: left;width: 120px;height: 68px;line-height: 30px;text-align: right;margin-left: 20px;">
                            <label for="remark"><?php echo Yii::t('vcos','备注');?></label>

                        </div>

                       <div style="float: left;margin-left: 20px; height: 30px;">

                         <textarea name="remark"
                         class="autosize-transition " id="remark"
                         style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 68px;width: 229px;overflow: visible;">
                         </textarea>
                            
                        </div>
                            
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="icon-remove"></i> <?php echo Yii::t('vcos','取消');?>
                    </button>
                    <button class="btn btn-sm btn-primary save1">
                        <i class="icon-ok"></i> <?php echo Yii::t('vcos','保存');?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 新增弹出框 结束-->
<!-- js代码开始 -->
<script type="text/javascript">
    jQuery(function($) {


        $(".save").click(function(){
            var $a = $(this).attr("id");

            $("#change_edit").attr("action", "<?php echo Yii::app()->createUrl("data/data_post_edit");?>"+"?id="+$a);




           jQuery("#change_edit").submit();
        });


        $(".save1").click(function(){

            jQuery("#form_add").submit();
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
                        "id" : "danger",
                        click: function() {
                            location.href="<?php echo Yii::app()->createUrl("data/data_post");?>"+"?id="+$a;
                            $( this ).dialog( "close" );
                        }
                    }
                    ,
                    {
                        html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
                        "class" : "btn btn-xs ",
                        click: function() {
                            $('.widget-header h4').html("<i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '删除这条记录？')?>");
                            $('#dialog-confirm-content').html("<?php echo yii::t('vcos', '这条记录将被永久删除，并且无法恢复。')?>");
                            $('#confirm').show();
                            $( this ).dialog( "close" );
                        }
                    }
                ]
            });

        





        });





     
    });
</script>
<!-- js代码结束 -->
<script type="text/javascript">
      var _thisTr = null; //记录table1中正在编辑的行

  $('#sample-table-2').find('.change').click(function(e) {
          _thisTr = $(this).parents('tr'); //记录table1中正在编辑的行
		 var table1Tr = _thisTr  // table1中当前操作的行
		 var contain1 = $.trim(table1Tr.find('#table_contain1').text()); 
          //获取内容1的值
		 var contain2 =$.trim(table1Tr.find('#table_contain2').text());  
         //获取内容2的值
		 var contain3 = $.trim(table1Tr.find('#table_contain3').text());  
         //获取内容3的值
		 var contain4 = $.trim(table1Tr.find('#table_contain4').text());  
         //获取内容4的值
		 var contain5 = $.trim(table1Tr.find('#table_contain5').text());  
         //获取内容5的值
		 var contain6 = $.trim(table1Tr.find('#table_contain6').text());  
         //获取内容6的值
		 var table2Tr = $('#change_edit');  //table2中当前操作的行
		 var $a = $.trim($(this).attr("id"));
		 var a=$(".save").attr("id",$a);

		  //显示被隐藏的编辑界面


		  //将table1中内容值显示到编辑页面上
        
		     
		    table2Tr.find('#post_cn_name').val(contain2);
			table2Tr.find('#post_en_name').val(contain3);

		    // table2Tr.find('#department_id').val(contain4);    
		    table2Tr.find('#remark').val(contain5);



//修改时默认拿表格的部门名被选中
			 $("#change_edit select#department_id option").each(function()
			     {

			        if ($.trim($(this).val())==contain4) {
			           $(this).prop('selected', 'selected');

			        }
			    });



   


    });
  </script>
<!-- 拿表格内容到编辑框js代码结束 -->
<!-- 选中按钮js开始 -->
<script type="text/javascript">
       $(document).ready(function(){
        $("#checkALL").click(function () {
            if($(this).prop('checked')==true)
            {
                $(".checkbox_button").prop("checked",true);
            }
            else {
                $(".checkbox_button").prop("checked",false);
            }

      });


    });
</script>
<!-- 选中按钮js结束 -->
<!-- 删除多条记录框js开始 -->
<script type="text/javascript">
jQuery(function($) {

    $( "#Batch_delete_records" ).on('click', function(e) {
        e.preventDefault();
        var ischeckbox=false;
        $(".checkbox_button").each(function(){
          if($(this).prop('checked')==true)
          {
              ischeckbox=true;
          }
        });

        if(ischeckbox==false)
        {

        	$( "#dialog-confirm2" ).removeClass('hide').dialog({
                closeOnEscape:false,
                open:function(event,ui){$(".ui-dialog-titlebar-close").hide();} ,
                resizable: false,
                modal: true,
                title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '没有选中 ！')?></h4></div>",
                title_html: true,
                buttons: [

                    {
                        html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
                        "class" : "btn btn-xs ",
                        click: function() {

                            $( this ).dialog( "close" );
                        }
                    }
                ]
            });
        }



        if(ischeckbox==true)
        {

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
                    "id" :"danger2",
                    click: function() {
                        $("form:first").submit();
                        $( this ).dialog( "close" );
                    }
                }
                ,
                {
                    html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
                    "class" : "btn btn-xs ",
                    click: function() {
                        $('#confirm_multi').show();

                        $( this ).dialog( "close" );
                    }
                }
            ]
        });


        }



    });
});
</script>
<!-- 删除多条记录框js结束-->


<script type="text/javascript">

$(document).ready(function() {


                // department_id
                // post_cn_name
                // post_cn_name
                
 jQuery.validator.addMethod("hanzi", function(value, element) {
    return this.optional(element) || /^[\u2E80-\u9FFF]+$/.test(value);
}, "只能是汉字");
    $("#change_edit").validate({
           rules: {
            department_id:{required:true},
            post_cn_name:{required:true,hanzi:true},
            post_en_name: { required : true}
            
          },
        messages: {

            department_id:{required:"<?php echo yii::t('vcos', '请选择部门')?>"},
            post_cn_name:{required:"<?php echo yii::t('vcos', '中文名称不能为空')?>"},
            post_en_name: { required :"<?php echo yii::t('vcos', '英文名称不能为空')?>"}
            
        },  
         


     });


    $("#form_add").validate({
           rules: {
            department_id:{required:true},
            post_cn_name:{required:true,hanzi:true},
            post_en_name: { required : true}
            
          },
        messages: {

            department_id:{required:"<?php echo yii::t('vcos', '请选择部门')?>"},
            post_cn_name:{required:"<?php echo yii::t('vcos', '中文名称不能为空')?>"},
            post_en_name: { required :"<?php echo yii::t('vcos', '英文名称不能为空')?>"}
            
        },  
         


     });


    


});

</script>
