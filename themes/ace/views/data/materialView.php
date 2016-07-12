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
<div id="table_type" style="display: none"><?php echo $table_type;?></div>
<div class="tabbable">
    <ul id="myTab4"
        class="nav nav-tabs padding-12 tab-color-blue background-blue">
        <li class="<?php if($table_type=='1') echo "active";?>"><a
            href="#table_middle_1" data-toggle="tab"><?php echo Yii::t('vcos','常规证书'); ?> </a></li>
        <li class="<?php if($table_type=='2') echo "active";?>"><a
            href="#table_middle_2" data-toggle="tab"><?php echo Yii::t('vcos','职称证书'); ?></a></li>
        <li class="<?php if($table_type=='3') echo "active";?>"><a
            href="#table_middle_3" data-toggle="tab"> <?php echo Yii::t('vcos','培训合格证书 '); ?></a></li>
        <li class="<?php if($table_type=='4') echo "active";?>"><a
            href="#table_middle_4" data-toggle="tab"> <?php echo Yii::t('vcos','福利费用类型'); ?> </a></li>
    </ul>
</div>
<div class="tab-content">
    <div class="tab-pane  <?php if($table_type=='1') echo "active";?>"
        id="table_middle_1">
        <div class="table-responsive">
            <form
                action="<?php echo Yii::app()->createUrl("data/data_material");?>"
                method="post">
                <table id="sample-table-1"
                    class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><label> <input class="ace" id="checkALL"
                                    type="checkbox"> <span class="lbl"></span>
                            </label></th>
                            <th><?php echo Yii::t('vcos','序号'); ?></th>
                            <th><?php echo Yii::t('vcos','证书类型编码'); ?></th>
                            <th><?php echo Yii::t('vcos','证书类型名称'); ?></th>
                            <th><?php echo Yii::t('vcos','操作'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
				<?php
				$i = 0;
				foreach ( $certificate as $row ) {
					$i ++;
					
					?>

					<tr>
                            <td><label> <input
                                    class="ace checkbox_button"
                                    type="checkbox" name="ids[]"
                                    value="<?php echo $row['certificate_id'];?>">
                                    <span class="lbl"></span>
                            </label></td>
                            <td> <?php echo $i; ?></td>
                            <td id="table1_contain1"><?php  echo $row['certificate_code'];?></td>
                            <td id="table1_contain2"><?php  echo $row['certificate_type'];?></td>
                            <td id="table1_contain3"
                                style="display: none;"><?php  echo $row['remark'];?></td>
                            <td>
                                <div
                                    class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                    <a href="#modal-form-table1_edit"
                                        data-toggle="modal"
                                        class="table1_change"
                                        id="<?php echo $row['certificate_id'];?>"
                                        title="<?php echo Yii::t('vcos','编辑'); ?>">
                                        <button type="button"
                                            class="btn btn-xs btn-info"
                                            role="button">
                                            <i
                                                class="icon-edit bigger-120"></i>
                                        </button>
                                    </a> 
                                    <a href="#" class="delete"
                                        id="<?php echo $row['certificate_id'];?>"
                                        title="<?php echo Yii::t('vcos','删除'); ?>">
                                        <button
                                            class="btn btn-xs btn-warning">
                                            <i
                                                class="icon-trash bigger-120"></i>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
					<?php
				}
				
				?>
				</tbody>
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
                        class="bigger-110 no-text-shadow"><?php echo Yii::t('vcos','删除选中'); ?></span>
                </button>
                <a href="#modal-form-table1_add" data-toggle="modal">
                    <button class="btn btn-info" type="button">
                        <i class="icon-ok bigger-110"></i> <?php echo Yii::t('vcos','新增'); ?>
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div class="tab-pane   <?php if($table_type=='2') echo "active";?>"
        id="table_middle_2">
        <div class="table-responsive">
            <form action="" method="post" id="table2_form">
                <table id="sample-table-2"
                    class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><label> <input class="ace checkALL2"
                                    type="checkbox"> <span class="lbl"></span>
                            </label></th>
                            <th><?php echo Yii::t('vcos','序号'); ?></th>
                            <th><?php echo Yii::t('vcos','职称编码'); ?></th>
                            <th><?php echo Yii::t('vcos','职称名称'); ?></th>
                            <th><?php echo Yii::t('vcos','职称级别'); ?></th>
                            <th><?php echo Yii::t('vcos','操作'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                <?php			
                $i = 0;			
                foreach ( $title as $row ) {	
                    $i ++;
                    ?>
                    <tr>
                            <td><label> <input
                                    class="ace checkbox_button2"
                                    type="checkbox" name="id2s[]"
                                    value="<?php echo $row['title_id'];?>">
                                    <span class="lbl"></span>
                            </label></td>
                            <td><?php echo $i;?></td>
                            <td id="table2_contain1"><?php echo $row['title_code']?></td>
                            <td id="table2_contain2"><?php echo $row['title_name']?></td>
                            <td id="table2_contain3"><?php echo  $row['title_level']?></td>
                            <td id="table2_contain4"
                                style="display: none;"><?php echo  $row['remark']?></td>
                            <td>
                                <div
                                    class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                    <a href="#modal-form-table2_edit"
                                        data-toggle="modal"
                                        class="table2_change"
                                        id="<?php echo $row['title_id'];?>"
                                        title="<?php echo Yii::t('vcos','编辑'); ?>">
                                        <button type="button"
                                            class="btn btn-xs btn-info"
                                            role="button">
                                            <i
                                                class="icon-edit bigger-120"></i>
                                        </button>
                                    </a> <a href="#"
                                        class="table2_delete"
                                        id="<?php echo $row['title_id'];?>"
                                        title="<?php echo Yii::t('vcos','删除'); ?>">
                                        <button
                                            class="btn btn-xs btn-warning">
                                            <i
                                                class="icon-trash bigger-120"></i>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    
                    
                    <?php
																}
																
																?>
                </tbody>
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
                    id="Batch_delete_records_2">
                    <i class="icon-trash bigger-125"></i> <span
                        class="bigger-110 no-text-shadow"><?php echo Yii::t('vcos','删除选中'); ?></span>
                </button>
                <a href="#modal-form-table2_add" data-toggle="modal">
                    <button class="btn btn-info" type="button">
                        <i class="icon-ok bigger-110"></i> <?php echo Yii::t('vcos','新增'); ?>
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div class="tab-pane  <?php if($table_type=='3') echo "active";?>"
        id="table_middle_3">
        <div class="table-responsive">
            <form action="" method="post" id="table3_form">
                <table id="sample-table-3"
                    class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><label> <input class="ace checkALL3"
                                    type="checkbox"> <span class="lbl"></span>
                            </label></th>
                            <th><?php echo Yii::t('vcos','序号'); ?></th>
                            <th><?php echo Yii::t('vcos','证书类型编号'); ?></th>
                            <th class="hidden-480"><?php echo Yii::t('vcos','证书类型名称'); ?></th>
                            <th><?php echo Yii::t('vcos','操作'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                
                <?php					
                $i = 0;	
                foreach ( $train as $row ) 
                {	

            		$i ++;
                	?>
                    <tr>
                            <td><label> <input
                                    class="ace checkbox_button3"
                                    type="checkbox" name="id3s[]"
                                    value="<?php echo $row['train_id']; ?>">
                                    <span class="lbl"></span>
                            </label></td>
                            <td><?php echo $i;?></td>
                            <td id="table3_contain1"><?php echo $row['train_code']; ?></td>
                            <td id="table3_contain2"><?php echo $row['train_name']; ?></td>
                            <td id="table3_contain3"
                                style="display: none;"><?php echo $row['remark']; ?></td>
                            <td>
                                <div
                                    class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                    <a href="#modal-form-table3_edit"
                                        data-toggle="modal"
                                        class="table3_change"
                                        id="<?php echo $row['train_id']; ?>"
                                        title="<?php echo Yii::t('vcos','编辑'); ?>">
                                        <button type="button"
                                            class="btn btn-xs btn-info"
                                            role="button">
                                            <i
                                                class="icon-edit bigger-120"></i>
                                        </button>
                                    </a> <a href="#"
                                        class="table3_delete"
                                        id="<?php echo $row['train_id']; ?>"
                                        title="<?php echo Yii::t('vcos','删除'); ?>">
                                        <button
                                            class="btn btn-xs btn-warning">
                                            <i
                                                class="icon-trash bigger-120"></i>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php	
                    }?>
                </tbody>
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
                    id="Batch_delete_records_3">
                    <i class="icon-trash bigger-125"></i> <span
                        class="bigger-110 no-text-shadow"><?php echo Yii::t('vcos','删除选中'); ?></span>
                </button>
                <a href="#modal-form-table3_add" data-toggle="modal">
                    <button class="btn btn-info" type="button">
                        <i class="icon-ok bigger-110"></i><?php echo Yii::t('vcos','新增'); ?> 
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div class="tab-pane  <?php if($table_type=='4') echo "active";?> "
        id="table_middle_4">
        <div class="table-responsive">
            <form action="" method="post" id="table4_form">
                <table id="sample-table-4"
                    class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><label> <input class="ace checkALL4"
                                    type="checkbox"> <span class="lbl"></span>
                            </label></th>
                            <th><?php echo Yii::t('vcos','序号'); ?></th>
                            <th><?php echo Yii::t('vcos','类型编码'); ?></th>
                            <th class="hidden-480"><?php echo Yii::t('vcos','类型名称'); ?></th>
                            <th class="hidden-480"><?php echo Yii::t('vcos','是否月固定福利'); ?></th>
                            <th><?php echo Yii::t('vcos','操作'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                
                     <?php	
                	$i = 0;	
                	foreach ( $welfare as $row ) 
                    {												$i ++;										?>
                    <tr>
                            <td><label> <input
                                    class="ace checkbox_button4"
                                    type="checkbox" name="id4s[]"
                                    value="<?php echo $row['welfare_id']; ?>">
                                    <span class="lbl"></span>
                            </label></td>
                            <td><?php echo $i;?></td>
                            <td id="table4_contain1"><?php echo $row['welfare_code'];?></td>
                            <td id="table4_contain2"><?php echo $row['welfare_name'];?></td>
                            <td id="table4_contain3"><?php  if($row['welfare_status']=='1') echo Yii::t('vcos','是');else echo Yii::t('vcos','否');?></td>
                            <td id="table4_contain4"
                                style="display: none;"><?php echo $row['remark'];?></td>
                            <td>
                                <div
                                    class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                    <a href="#modal-form-table4_edit"
                                        data-toggle="modal"
                                        class="table4_change"
                                        id="<?php echo $row['welfare_id']; ?>"
                                        title="<?php echo Yii::t('vcos','编辑'); ?>">
                                        <button type="button"
                                            class="btn btn-xs btn-info"
                                            role="button">
                                            <i
                                                class="icon-edit bigger-120"></i>
                                        </button>
                                    </a> <a href="#"
                                        class="table4_delete"
                                        id="<?php echo $row['welfare_id']; ?>"
                                        title="<?php echo Yii::t('vcos','删除'); ?>">
                                        <button
                                            class="btn btn-xs btn-warning">
                                            <i
                                                class="icon-trash bigger-120"></i>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    
                    <?php		
                    	}	
                   	?>
                </tbody>
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
                    id="Batch_delete_records_4">
                    <i class="icon-trash bigger-125"></i> <span
                        class="bigger-110 no-text-shadow"><?php echo Yii::t('vcos','删除选中'); ?></span>
                </button>
                <a href="#modal-form-table4_add" data-toggle="modal">
                    <button class="btn btn-info" type="button">
                        <i class="icon-ok bigger-110"></i> <?php echo Yii::t('vcos','新增'); ?>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- 删除单条弹出框开始 -->
<div id="dialog-confirm" class="hide">
    <div class="alert alert-info bigger-110" id="dialog-confirm-content">
		<?php echo yii::t('vcos', '这条记录将被永久删除，并且无法恢复。')?></div>
    <div class="space-6"></div>
    <p class="bigger-110 bolder center grey" id="confirm">
        <i class="icon-hand-right blue bigger-120"></i><?php echo Yii::t('vcos','确定吗？'); ?> 
    </p>
</div>
<!-- 删除弹出框结束 -->
<!-- 第二个表格单条删除弹出框 -->
<!-- <div id="dialog-confirm_table2" class="hide"> -->
<!--     <div class="alert alert-info bigger-110" -->
<!--         id="dialog-confirm_table2-content"> -->
<!--     <div class="space-6"></div> -->
<!--     <p class="bigger-110 bolder center grey" id="confirm"> -->
<!--         <i class="icon-hand-right blue bigger-120"></i> 确定吗？ -->
<!--     </p> -->
<!-- </div> -->
<!-- 第二个表格单条删除弹出框结束-->
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
        <i class="icon-hand-right blue bigger-120"></i><?php echo Yii::t('vcos','确定吗？'); ?>
    </p>
</div>
<!-- 多条删除弹出框结束 -->

<!-- 弹出编辑框开始 -->
<div id="modal-form-table1_edit" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger"><?php echo Yii::t('vcos','请编辑以下内容'); ?></h4>
            </div>
            <div class="modal-body overflow-visible">
                <div class="center">
                    <form novalidate="novalidate"
                        class="form-horizontal" role="form"
                        method="post"
                        action="<?php echo Yii::app()->createUrl("data/data_data_material_add");?>"
                        id="table1_edit" autocomplete="off">
                       
                        <div class="form-group" style="overflow: hidden;">
                            <div style="float: left;width: 120px;height: 30px;line-height: 30px;text-align: right;margin-left: 40px;">
                                <label for="certificate_code"> <?php echo Yii::t('vcos','证书类型编码'); ?> </label>

                            </div>

                            <div style="float: left;margin-left: 20px; height: 30px;">

                             <input placeholder="" id="certificate_code"
                                    name="certificate_code" type="text">
                                
                            </div>
                             
                        </div>

                        <div class="space-6"></div>
                   
                        <div class="form-group" style="overflow: hidden;">
                            <div style="float: left;width: 120px;height: 30px;line-height: 30px;text-align: right;margin-left: 40px;">
                               <label for="certificate_type"> <?php echo Yii::t('vcos','证书类型名称'); ?></label>

                            </div>

                            <div style="float: left;margin-left: 20px; height: 30px;">

                             <input placeholder="" id="certificate_type"
                                name="certificate_type" type="text">
                                
                            </div>
                             
                        </div>

                        <div class="space-6"></div>
                             <div class="form-group" style="overflow: hidden;">
                            <div style="float: left;width: 120px;height: 68px;line-height: 30px;text-align: right;margin-left: 40px;">
                               <label for="remark"><?php echo Yii::t('vcos','备 注'); ?>  </label>
                            </div>

                            <div style="float: left;margin-left: 20px; height: 30px;">

                             <textarea name="remark"
                                class="autosize-transition " id="remark"
                                style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 68px;"></textarea>
                          
                            </div>                           
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="icon-remove"></i> <?php echo Yii::t('vcos','取消'); ?>
                    </button>
                    <button
                        class="btn btn-sm btn-primary table_save_edit">
                        <i class="icon-ok"></i> <?php echo Yii::t('vcos','保存'); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE CONTENT ENDS -->
</div>
<!-- 弹出编辑框结束 -->
<!-- table1弹出增加框开始 -->
<div id="modal-form-table1_add" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger"><?php echo Yii::t('vcos','请填写以下内容'); ?></h4>
            </div>
            <div class="modal-body overflow-visible">
                <div class="center">
                    <form novalidate="novalidate"
                        class="form-horizontal" role="form"
                        method="post"
                        action="<?php echo Yii::app()->createUrl("data/data_material_certificate_add");?>"
                        id="table1_add" autocomplete="off">
                        <div class="form-group" style="overflow: hidden;">
                            <div style="float: left;width: 120px;height: 30px;line-height: 30px;text-align: right;margin-left: 40px;">
                                <label for="certificate_code"> <?php echo Yii::t('vcos','证书类型编码'); ?> </label>

                            </div>

                            <div style="float: left;margin-left: 20px; height: 30px;">

                             <input placeholder="" id="certificate_code"
                                    name="certificate_code" type="text">
                                

                            </div>
                             
                        </div>

                        <div class="space-6"></div>
                   
                        <div class="form-group" style="overflow: hidden;">
                            <div style="float: left;width: 120px;height: 30px;line-height: 30px;text-align: right;margin-left: 40px;">
                               <label for="certificate_type"> <?php echo Yii::t('vcos','证书类型名称'); ?></label>

                            </div>

                            <div style="float: left;margin-left: 20px; height: 30px;">

                             <input placeholder="" id="certificate_type"
                                name="certificate_type" type="text">
                                
                            </div>
                             
                        </div>

                        <div class="space-6"></div>
                             <div class="form-group" style="overflow: hidden;">
                            <div style="float: left;width: 120px;height: 68px;line-height: 30px;text-align: right;margin-left: 40px;">
                               <label for="remark"><?php echo Yii::t('vcos','备 注'); ?>  </label>
                            </div>

                            <div style="float: left;margin-left: 20px; height: 30px;">

                             <textarea name="remark"
                                class="autosize-transition " id="remark"
                                style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 68px;"></textarea>
                          
                            </div>                           
                        </div>                                                                                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="icon-remove"></i> <?php echo Yii::t('vcos','取消'); ?>
                    </button>
                    <button
                        class="btn btn-sm btn-primary table1_save_add">
                        <i class="icon-ok"></i> <?php echo Yii::t('vcos','保存'); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- table1弹出增加框结束 -->
<!-- table2弹出编辑框开始 -->
<div id="modal-form-table2_edit" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger"><?php echo Yii::t('vcos','请编辑以下内容'); ?></h4>
            </div>
            <div class="modal-body overflow-visible">
                <div class="center">
                    <form novalidate="novalidate"
                        class="form-horizontal" role="form"
                        method="post"
                        action="<?php echo Yii::app()->createUrl("data/data_data_material_title_edit");?>"
                        id="table2_edit" autocomplete="off">
                        <div class="form-group">
                            <label for="title_code"> <?php echo Yii::t('vcos','职称编码'); ?> </label> <input
                                placeholder="" id="title_code"
                                name="title_code" type="text">
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group">
                            <label for="title_name"> <?php echo Yii::t('vcos','职称名称'); ?></label> <input
                                placeholder="" id="title_name"
                                name="title_name" type="text">
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group">
                            <label for="title_level"> <?php echo Yii::t('vcos','职称级别'); ?></label> <input
                                placeholder="" id="title_level"
                                name="title_level" type="text">
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group">
                            <label for="remark"> <?php echo Yii::t('vcos','备 注'); ?> </label>
                            <textarea name="remark"
                                class="autosize-transition " id="remark"
                                style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 68px;"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="icon-remove"></i> <?php echo Yii::t('vcos','取消'); ?>
                    </button>
                    <button
                        class="btn btn-sm btn-primary table2_save_edit">
                        <i class="icon-ok"></i> <?php echo Yii::t('vcos','保存'); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE CONTENT ENDS -->
</div>
<!-- table2弹出编辑框结束 -->
<!-- table2弹出增加框开始 -->
<div id="modal-form-table2_add" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger"><?php echo Yii::t('vcos','请填写以下内容'); ?></h4>
            </div>
            <div class="modal-body overflow-visible">
                <div class="center">
                    <form novalidate="novalidate"
                        class="form-horizontal" role="form"
                        method="post"
                        action="<?php echo Yii::app()->createUrl("data/data_data_material_title_edit");?>"
                        id="table2_add" autocomplete="off">
                        <div class="form-group">
                            <label for="title_code"> <?php echo Yii::t('vcos','职称编码'); ?> </label> <input
                                placeholder="" id="title_code"
                                name="title_code" type="text">
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group">
                            <label for="title_name"> <?php echo Yii::t('vcos','职称名称'); ?></label> <input
                                placeholder="" id="title_name"
                                name="title_name" type="text">
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group">
                            <label for="title_level"> <?php echo Yii::t('vcos','职称级别'); ?></label> <input
                                placeholder="" id="title_level"
                                name="title_level" type="text">
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group">
                            <label for="remark"> <?php echo Yii::t('vcos','备 注'); ?> </label>
                            <textarea name="remark"
                                class="autosize-transition " id="remark"
                                style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 68px;"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="icon-remove"></i> <?php echo Yii::t('vcos','取消'); ?>
                    </button>
                    <button
                        class="btn btn-sm btn-primary table2_save_add">
                        <i class="icon-ok"></i> <?php echo Yii::t('vcos','保存'); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE CONTENT ENDS -->
</div>
<!-- table2弹出增加框结束 -->
<!-- table3弹出编辑框开始 -->
<div id="modal-form-table3_edit" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger"><?php echo Yii::t('vcos','请编辑以下内容'); ?></h4>
            </div>
            <div class="modal-body overflow-visible">
                <div class="center">
                    <form novalidate="novalidate"
                        class="form-horizontal" role="form"
                        method="post"
                        action="<?php echo Yii::app()->createUrl("data/data_data_material_add");?>"
                        id="table3_edit" autocomplete="off">
                        <div class="form-group">
                            <label for="train_code"> <?php echo Yii::t('vcos','证书类型编码'); ?> </label> <input
                                placeholder="" id="train_code"
                                name="train_code" type="text">
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group">
                            <label for="train_name"> <?php echo Yii::t('vcos','证书类型名称'); ?></label> <input
                                placeholder="" id="train_name"
                                name="train_name" type="text">
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group">
                            <label for="remark"> <?php echo Yii::t('vcos','备 注'); ?> </label>
                            <textarea name="remark"
                                class="autosize-transition " id="remark"
                                style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 68px;"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="icon-remove"></i> <?php echo Yii::t('vcos','取消'); ?>
                    </button>
                    <button
                        class="btn btn-sm btn-primary table3_save_edit">
                        <i class="icon-ok"></i> <?php echo Yii::t('vcos','保存'); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- table3弹出编辑框结束 -->
<!-- table3弹出增加框开始 -->
<div id="modal-form-table3_add" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger"><?php echo Yii::t('vcos','请填写以下内容'); ?></h4>
            </div>
            <div class="modal-body overflow-visible">
                <div class="center">
                    <form novalidate="novalidate"
                        class="form-horizontal" role="form"
                        method="post"
                        action="<?php echo Yii::app()->createUrl("data/data_data_material_add");?>"
                        id="table3_add" autocomplete="off">
                        <div class="form-group">
                            <label for="train_code"><?php echo Yii::t('vcos','证书类型编码'); ?>  </label> <input
                                placeholder="" id="train_code"
                                name="train_code" type="text">
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group">
                            <label for="train_name"> <?php echo Yii::t('vcos','证书类型名称'); ?></label> <input
                                placeholder="" id="train_name"
                                name="train_name" type="text">
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group">
                            <label for="remark"> <?php echo Yii::t('vcos','备 注'); ?> </label>
                            <textarea name="remark"
                                class="autosize-transition " id="remark"
                                style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 68px;"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="icon-remove"></i> <?php echo Yii::t('vcos','取消'); ?>
                    </button>
                    <button
                        class="btn btn-sm btn-primary table3_save_add">
                        <i class="icon-ok"></i> <?php echo Yii::t('vcos','保存'); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- table3弹出增加框结束 -->
<!-- table4弹出编辑框开始 -->
<div id="modal-form-table4_edit" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger"><?php echo Yii::t('vcos','请编辑以下内容'); ?></h4>
            </div>
            <div class="modal-body overflow-visible">
                <div class="center">
                    <form novalidate="novalidate"
                        class="form-horizontal" role="form"
                        method="post"
                        action="<?php echo Yii::app()->createUrl("data/data_data_material_add");?>"
                        id="table4_edit" autocomplete="off">
                        <div class="form-group">
                            <label for="welfare_code"><?php echo Yii::t('vcos','证书类型编码 '); ?> </label> <input
                                placeholder="" id="welfare_code"
                                name="welfare_code" type="text">
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group">
                            <label for="welfare_name"> <?php echo Yii::t('vcos','证书类型名称'); ?></label> <input
                                placeholder="" id="welfare_name"
                                name="welfare_name" type="text">
                        </div>
                        <div class="space-6"></div>
                        <div class="radio">
                            <label> <?php echo Yii::t('vcos','是否月固定福利:'); ?> </label> <label> <input
                                name="welfare_status" class="ace"
                                value="1" type="radio"> <span
                                class="lbl"><?php echo Yii::t('vcos','是'); ?></span>
                            </label> <label> <input
                                name="welfare_status" class="ace"
                                value="0" type="radio"> <span
                                class="lbl"> <?php echo Yii::t('vcos','否'); ?></span>
                            </label>
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group">
                            <label for="remark"> <?php echo Yii::t('vcos','备 注'); ?> </label>
                            <textarea name="remark"
                                class="autosize-transition " id="remark"
                                style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 68px;"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="icon-remove"></i> <?php echo Yii::t('vcos','取消'); ?>
                    </button>
                    <button
                        class="btn btn-sm btn-primary table4_save_edit">
                        <i class="icon-ok"></i> <?php echo Yii::t('vcos','保存'); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- table4弹出编辑框结束 -->
<!-- table4弹出编辑框开始 -->
<div id="modal-form-table4_add" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger"><?php echo Yii::t('vcos','请填写以下内容'); ?></h4>
            </div>
            <div class="modal-body overflow-visible">
                <div class="center">
                    <form novalidate="novalidate"
                        class="form-horizontal" role="form"
                        method="post"
                        action="<?php echo Yii::app()->createUrl("data/data_data_material_add");?>"
                        id="table4_add" autocomplete="off">
                        <div class="form-group">
                            <label for="welfare_code"> <?php echo Yii::t('vcos','证书类型编码'); ?> </label> <input
                                placeholder="" id="welfare_code"
                                name="welfare_code" type="text">
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group">
                            <label for="welfare_name"><?php echo Yii::t('vcos','证书类型名称'); ?> </label> <input
                                placeholder="" id="welfare_name"
                                name="welfare_name" type="text">
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group">
                            <label> <?php echo Yii::t('vcos','是否月固定福利:'); ?> </label> <label> <input
                                name="welfare_status" class="ace"
                                value="1" type="radio"> <span
                                class="lbl"><?php echo Yii::t('vcos','是'); ?></span>
                            </label> <label> <input
                                name="welfare_status" class="ace"
                                value="0" type="radio"> <span
                                class="lbl"> <?php echo Yii::t('vcos','否'); ?></span>
                            </label>
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group">
                            <label for="remark"> <?php echo Yii::t('vcos','备 注'); ?> </label>
                            <textarea name="remark"
                                class="autosize-transition " id="remark"
                                style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 68px;"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="icon-remove"></i> <?php echo Yii::t('vcos','取消'); ?>
                    </button>
                    <button
                        class="btn btn-sm btn-primary table4_save_add">
                        <i class="icon-ok"></i> <?php echo Yii::t('vcos','保存'); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- table4弹出编辑框结束 -->
<script type="text/javascript">
    jQuery(function($) {


    // table1弹出修改框的保存按钮开始
        $(".table_save_edit").click(function(){
            var $a = $(this).attr("id");
            $("#table1_edit").attr("action", "<?php echo Yii::app()->createUrl("data/data_material_certificate_edit");?>"+"?id="+$a);

           jQuery("#table1_edit").submit();
           $('#modal-form-table1_edit').hide();
        });
 $   (".table1_save_add").click(function(){
            $("#table1_add").attr("action", "<?php echo Yii::app()->createUrl("data/data_material_certificate_add");?>");
           jQuery("#table1_add").submit();
           $('#modal-form-table1_add').hide();
        });

    // table1弹出修改框的保存按钮结束

    // table2弹出修改框的保存按钮开始
     $(".table2_save_edit").click(function(){
         var $a = $(this).attr("id");
            $("#table2_edit").attr("action", "<?php echo Yii::app()->createUrl("data/data_material_title_edit");?>"+"?id="+$a);
           jQuery("#table2_edit").submit();
           $('#modal-form-table2_edit').hide();
        });



    // table2弹出修改框的保存按钮开始

    // table1弹出增加框的保存按钮开始
        $(".table2_save_add").click(function(){
            $("#table2_add").attr("action", "<?php echo Yii::app()->createUrl("data/data_material_title_add");?>");
           jQuery("#table2_add").submit();
           $('#modal-form-table2_add').hide();
        });
   // table1弹出增加框的保存按钮开始
   
   
 $(".table3_save_edit").click(function(){
         var $a = $(this).attr("id");
            $("#table3_edit").attr("action", "<?php echo Yii::app()->createUrl("data/data_material_train_edit");?>"+"?id="+$a);
           jQuery("#table3_edit").submit();
           $('#modal-form-table3_edit').hide();
        });



    // table2弹出修改框的保存按钮开始

    // table1弹出增加框的保存按钮开始
        $(".table3_save_add").click(function(){
            $("#table3_add").attr("action", "<?php echo Yii::app()->createUrl("data/data_material_train_add");?>");
           jQuery("#table3_add").submit();
           $('#modal-form-table3_add').hide();
        });
  
 $(".table4_save_edit").click(function(){
         var $a = $(this).attr("id");
            $("#table4_edit").attr("action", "<?php echo Yii::app()->createUrl("data/data_material_welfare_edit");?>"+"?id="+$a);
           jQuery("#table4_edit").submit();
           $('#modal-form-table3_edit').hide();
        });



    // table2弹出修改框的保存按钮开始

    // table1弹出增加框的保存按钮开始
        $(".table4_save_add").click(function(){
            $("#table4_add").attr("action", "<?php echo Yii::app()->createUrl("data/data_material_welfare_add");?>");
           jQuery("#table4_add").submit();
           $('#modal-form-table4_add').hide();
        });

 



// table

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
                            location.href="<?php echo Yii::app()->createUrl("data/data_material");?>"+"?id="+$a;
                            $( this ).dialog( "close" );
                        }
                    }
                    ,
                    {
                        html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
                        "class" : "btn btn-xs ",
                        click: function() {
                            // $('.widget-header h4').html("<i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '删除这条记录？')?>");
                            // $('#dialog-confirm-content').html("<?php echo yii::t('vcos', '这条记录将被永久删除，并且无法恢复。')?>");
                            // $('#confirm').show();
                            $( this ).dialog( "close" );
                        }
                    }
                ]
            });
        });




        // table2_delete


        $( ".table2_delete" ).on('click', function(e) {
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
                            // location.href="<?php echo Yii::app()->createUrl("data/data_material");?>"+"?id="+$a;
                             location.href="<?php echo Yii::app()->createUrl("data/data_material");?>"+"/table_type/<?php echo  $table_type?>"+"?id="+$a;
                            $( this ).dialog( "close" );
                        }
                    }
                    ,
                    {
                        html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
                        "class" : "btn btn-xs ",
                        click: function() {
                            // $('.widget-header h4').html("<i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '删除这条记录？')?>");
                            // $('#dialog-confirm-content').html("<?php echo yii::t('vcos', '这条记录将被永久删除，并且无法恢复。')?>");
                            // $('#confirm').show();
                            $( this ).dialog( "close" );
                        }
                    }
                ]
            });
        });



//         table3单条删除

        $( ".table3_delete" ).on('click', function(e) {
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
                            // location.href="<?php echo Yii::app()->createUrl("data/data_material");?>"+"?id="+$a;
                       
                             location.href="<?php echo Yii::app()->request->url;?>"+"?id="+$a;
                            $( this ).dialog( "close" );
                        }
                    }
                    ,
                    {
                        html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
                        "class" : "btn btn-xs ",
                        click: function() {
                            // $('.widget-header h4').html("<i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '删除这条记录？')?>");
                            // $('#dialog-confirm-content').html("<?php echo yii::t('vcos', '这条记录将被永久删除，并且无法恢复。')?>");
                            // $('#confirm').show();
                            $( this ).dialog( "close" );
                        }
                    }
                ]
            });
        });


//         table4单条删除

        $( ".table4_delete" ).on('click', function(e) {
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
                            // location.href="<?php echo Yii::app()->createUrl("data/data_material");?>"+"?id="+$a;
                            
                             location.href="<?php echo Yii::app()->request->url;?>"+"?id="+$a;
                            $( this ).dialog( "close" );
                        }
                    }
                    ,
                    {
                        html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
                        "class" : "btn btn-xs ",
                        click: function() {
                            // $('.widget-header h4').html("<i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '删除这条记录？')?>");
                            // $('#dialog-confirm-content').html("<?php echo yii::t('vcos', '这条记录将被永久删除，并且无法恢复。')?>");
                            // $('#confirm').show();
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
  $('#table_middle_1').find('.table1_change').click(function(e) {
          _thisTr = $(this).parents('tr'); //记录table1中正在编辑的行
		 var table1Tr = _thisTr  // table1中当前操作的行
		 var contain1 = table1Tr.find('#table1_contain1').text();  //获取内容1的值
		 var contain2 = table1Tr.find('#table1_contain2').text();  //获取内容2的值
		 var contain3 = table1Tr.find('#table1_contain3').text();  //获取内容3的值
		 var table2Tr = $('#table1_edit');  //table2中当前操作的行
		 var $a = $(this).attr("id");
        
		 var a=$(".table_save_edit").attr("id",$a);

		  //显示被隐藏的编辑界面


		  //将table1中内容值显示到编辑页面上
		  table2Tr.find('#certificate_code').val(contain1);
		    table2Tr.find('#certificate_type').val(contain2);
			 table2Tr.find('#remark').val(contain3);
// 		 table2Tr.find('#department_code').val(contain4);
			


//修改时默认拿表格的部门名被选中
			 $("#table1_edit select#department_code option").each(function()
			     {


			        if ($(this).text()==contain6) {
			            $(this).attr("selected", "selected");


			        }
			    });


 });


			
			  $('#table_middle_2').find('.table2_change').click(function(e) {
                 var _thisTr2 = null; //记录table2中正在编辑的行
			          _thisTr = $(this).parents('tr'); //记录table2中正在编辑的行
					 var table1Tr= _thisTr  // table1中当前操作的行
					 var contain1 = table1Tr.find('#table2_contain1').text();  //获取内容1的值
					 var contain2 = table1Tr.find('#table2_contain2').text();  //获取内容2的值
					 var contain3 = table1Tr.find('#table2_contain3').text();  //获取内容3的值
					 var contain4 = table1Tr.find('#table2_contain4').text();  //获取内容3的值
					 var table2Tr = $('#table2_edit');  //table2中当前操作的行
					 var $a = $(this).attr("id");
					 var a=$(".table2_save_edit").attr("id",$a);



					  //将table1中内容值显示到编辑页面上
					  table2Tr.find('#title_code').val(contain1);
					    table2Tr.find('#title_name').val(contain2);
                        table2Tr.find('#title_level').val(contain3);
						 table2Tr.find('#remark').val(contain4);
//			 		 table2Tr.find('#department_code').val(contain4);
						






    });





  $('#table_middle_3').find('.table3_change').click(function(e) {

                 var _thisTr2 = null; //记录table2中正在编辑的行
                      _thisTr = $(this).parents('tr'); //记录table2中正在编辑的行
                     var table1Tr= _thisTr  // table1中当前操作的行
                     var contain1 = table1Tr.find('#table3_contain1').text();  //获取内容1的值
                     var contain2 = table1Tr.find('#table3_contain2').text();  //获取内容2的值
                     var contain3 = table1Tr.find('#table3_contain3').text();  //获取内容3的值
                    
                     var table2Tr = $('#table3_edit');  //table2中当前操作的行
                     var $a = $(this).attr("id");
                     var a=$(".table3_save_edit").attr("id",$a);



                      //将table1中内容值显示到编辑页面上
                      table2Tr.find('#train_code').val(contain1);
                        table2Tr.find('#train_name').val(contain2);
                     table2Tr.find('#remark').val(contain3);
                
                    



    });


    



  $('#table_middle_4').find('.table4_change').click(function(e) {

                 var _thisTr2 = null; //记录table2中正在编辑的行
                      _thisTr = $(this).parents('tr'); //记录table2中正在编辑的行
                     var table1Tr= _thisTr  // table1中当前操作的行
                     var contain1 = table1Tr.find('#table4_contain1').text();  //获取内容1的值
                     var contain2 = table1Tr.find('#table4_contain2').text();  //获取内容2的值
                     var contain3 = table1Tr.find('#table4_contain3').text();  //获取内容3的值
                      var contain4 = table1Tr.find('#table4_contain4').text();  //获取内容3的值
                      var welfare_status=null;
                      if(contain3=='是')
                    {
                          welfare_status='1';

                    }
                    else{
                        welfare_status='0'

                    }
                      

                    
                     var table2Tr = $('#table4_edit');  //table2中当前操作的行
                     var $a = $(this).attr("id");
                     var a=$(".table4_save_edit").attr("id",$a);



                      //将table1中内容值显示到编辑页面上
                      table2Tr.find('#welfare_code').val(contain1);
                        table2Tr.find('#welfare_name').val(contain2);
                    
                     table2Tr.find('#remark').val(contain4);
                     $('#table4_edit input:radio').each(function(){
                    
                        if($(this).val()==welfare_status)
                        {
                            $(this).attr("checked",true);
                        

                    }
        
            
                     });
                
                    



    });

  </script>
<!-- 拿表格内容到编辑框js代码结束 -->
<!-- 选中按钮js开始 -->
<script type="text/javascript">
       
        $("#checkALL").click(function () {
            if($(this).prop('checked')==true)
            {
                $(".checkbox_button").prop("checked",true);
            }
            else {
                $(".checkbox_button").prop("checked",false);
            }


      });


          $("#table_middle_2 .table-responsive #sample-table-2 thead tr th ").find('.checkALL2').click(function () {
          
            if($(this).prop('checked')==true)
            {
                

                $(".checkbox_button2").prop("checked",true);
            }
            else {
                $(".checkbox_button2").prop("checked",false);
            }


      });


            $('.checkALL3').click(function () {
   
            if($(this).prop('checked')==true)
            {
                

                $(".checkbox_button3").prop("checked",true);
            }
            else {
                $(".checkbox_button3").prop("checked",false);
            }

      });


$('.checkALL4').click(function () {
   
            if($(this).prop('checked')==true)
            {
                

                $(".checkbox_button4").prop("checked",true);
            }
            else {
                $(".checkbox_button4").prop("checked",false);
            }

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


//     第二个表格多条删除

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



//  第二个表格多条删除

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


//     第二个表格多条删除

    $( "#Batch_delete_records_2" ).on('click', function(e) {
        e.preventDefault();


        var ischeckbox=false;
        $(".checkbox_button2").each(function(){
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
                        
                  	  
                    	$('#table2_form').attr("action", "<?php echo Yii::app()->request->url;?>");

                       
                        $('#table2_form').submit();
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


    // table3的多行删除
      $( "#Batch_delete_records_3" ).on('click', function(e) {
        e.preventDefault();


        var ischeckbox=false;
        $(".checkbox_button3").each(function(){
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
                        
                      
                        $('#table3_form').attr("action", "<?php echo Yii::app()->request->url;?>");

                       
                        $('#table3_form').submit();
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
    

    // table4的多行删除

     $( "#Batch_delete_records_4" ).on('click', function(e) {
        e.preventDefault();
  


        var ischeckbox=false;
        $(".checkbox_button4").each(function(){
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
                        
                      
                        $('#table4_form').attr("action", "<?php echo Yii::app()->request->url;?>");

                       
                        $('#table4_form').submit();
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


$('.tabbable ul li ').find('a').click(function(){
//     alert($(this).attr("href"));

	switch ($(this).attr("href")) {
    case  "#table_middle_1":
     location.href="<?php echo Yii::app()->createUrl("data/data_material");?>"+"/table_type/"+"1";
        break;
    case "#table_middle_2":
                location.href="<?php echo Yii::app()->createUrl("data/data_material");?>"+"/table_type/"+"2";
        break;
     case "#table_middle_3":
        location.href="<?php echo Yii::app()->createUrl("data/data_material");?>"+"/table_type/"+"3";
        break;
      case "#table_middle_4":
          location.href="<?php echo Yii::app()->createUrl("data/data_material");?>"+"/table_type/"+"4";
        break;
    default:
      
        break;
}
    return false;
	

});

</script>
<script type="text/javascript">
    
        $('.pagination li a').click(
         function () {
              var url=$(this).attr("href");
//               alert(url);
            
//               $(this).attr("href",url);
//               alert($(this).attr("href"));
              
//              $("form").attr("action", url);
//              $("form").submit();//将form表单跳转到<a>的href的地址
//              return false;//退出不让啊<a>标签跳转链接
            
        

      });

</script>
