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

<script
    src="<?php echo $theme_url; ?>/assets/js/jquery-ui-1.10.3.full.min.js"></script>
<!-- tree begin -->
<div class="col-sm-6">
    <div class="widget-box transparent ">
        <div class="widget-header  widget-header-small ">
            <h4 class="lighter smaller">公司组织</h4>
        </div>
        <div class="widget-body" style="float: left; min-width: 200px;">
            <div class="widget-main padding-2">
                <div id="tree" class="tree"></div>
            </div>
        </div>
        <div id="department_list"
            style="overflow: hidden; margin-left: 100px;">
            <ul
                style="list-style: none; width: 480px; height: 40px; line-height: 40px; border: 1px solid; text-align: center; font-size: 16px; color: #ffffff; margin: 0px;">
                <li id="add"
                    style="float: left; height: 40px; width: 80px; border: 1px solid; cursor: pointer; background-color: #7DB4D8;">
                    新增部门</li>
                <li
                    style="float: left; height: 40px; width: 80px; border: 1px solid; cursor: pointer; margin-left: 20px; background-color: #7DB4D8;">
                    编辑部门</li>
                <li
                    style="float: left; height: 40px; width: 80px; border: 1px solid; cursor: pointer; margin-left: 20px; background-color: #7DB4D8;">删除部门</li>
            </ul>
            <table
                class="table table-striped table-bordered table-hover"
                id="sample-table-1">
                <thead>
                    <tr>
                        <th class="center">序号</th>
                        <th class="center">部门</th>
                        <th class="center">职务</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- tree end -->
<!-- 新增弹出框 开始-->
<div id="modal-form1" class="modal" tabindex="-1">
    <div class="modal-dialog"
        style="position: absolute; left: 30%; top: 20%; width: 450px; height: 500px;">
        <div class="modal-content">
            <div class="modal-body overflow-visible">
                <div class="center">
                    <form novalidate="novalidate"
                        class="form-horizontal" role="form"
                        method="post" id="form_add" autocomplete="off">
                        <div class="form-group"
                            style="height: 40px; line-height: 40px; width: 300px; margin-left: 60px; font-size: 16px; text-align: left;">
                            <span>部门名称</span> <input type="text"
                                style="margin-left: 30px;"
                                name="department_name"></input>
                        </div>
                        <div class="form-group"
                            style="height: 40px; line-height: 40px; width: 300px; margin-left: 60px; font-size: 16px; text-align: left;">


                            <div class="radio">
                            <label> 是否父级部门 </label> <label> <input name="is_parentment" class="ace" value="yes" type="radio"> <span class="lbl">是</span>
                            </label> <label> <input checked="checked" name="is_parentment" class="ace" value="no" type="radio"> <span class="lbl"> 否</span>
                            </label>
                        </div>




        
                        </div>
                        <div class="form-group"
                            style="width: 300px; height: 40px; line-height: 40px; margin-left: 60px; font-size: 16px;">
                            <span>上级部门</span> <select
                                style="width: 200px; margin-left: 30px;"
                                id="parent_department_id"
                                name="parent_department_id">
                                <option value="" selected="selected"></option>
                    <?php
																				
																				foreach ( $Alldepartment as $row ) {
																					
																					?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php
																				}
																				
																				?>



                                </select>
                        </div>
                        <div class="form-group"
                            style="width: 300px; margin-left: 60px; font-size: 16px; text-align: right;">
                            <span style="margin-right: 20px;"> 备注 </span>
                            <textarea name="remark"
                                class="autosize-transition " id="remark"
                                style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 70px; width: 200px"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <button class="btn btn-sm btn-primary " id="save">
                        <i class="icon-ok"></i> 保存
                    </button>
                    <button id="cancel_1" class="btn btn-sm "
                        style="margin-left: 20px;">
                        <i class="icon-remove"></i> 取消
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 新增弹出框 结束-->
<script type="text/javascript">
  $(document).ready(function() {


$('#add').click(function(event) {


 $('#modal-form1').show();


});

// $("#modal-form1")


$('#cancel_1').click(function(event) {


$('#modal-form1').hide();


});



$('#save').click(function(event) {

  var url="<?php echo Yii::app()->createUrl("data/data_structure_add");?>";

  $('#form_add').attr('action', url);
  $('#form_add').submit();

});















  });


</script>