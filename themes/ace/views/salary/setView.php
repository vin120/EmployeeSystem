<style type="text/css">
#table_middle_5 input[type="text"] {
	max-width: 60px;
}

#table_middle_5 td {
	padding: 0px;
}

#table_middle_5 th {
	padding: 0px;
}
</style>





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

<script src="<?php echo $theme_url; ?>/assets/js/chosen.jquery.min.js"></script>
<script
    src="<?php echo $theme_url; ?>/assets/js/fuelux/fuelux.spinner.min.js"></script>
<script
    src="<?php echo $theme_url; ?>/assets/js/date-time/bootstrap-datepicker.min.js"></script>
<script
    src="<?php echo $theme_url; ?>/assets/js/date-time/bootstrap-timepicker.min.js"></script>
<script
    src="<?php echo $theme_url; ?>/assets/js/date-time/moment.min.js"></script>
<script
    src="<?php echo $theme_url; ?>/assets/js/date-time/daterangepicker.min.js"></script>
<script
    src="<?php echo $theme_url; ?>/assets/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/jquery.knob.min.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/jquery.autosize.min.js"></script>
<script
    src="<?php echo $theme_url; ?>/assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
<script
    src="<?php echo $theme_url; ?>/assets/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/bootstrap-tag.min.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/ace-elements.min.js"></script>
<div id="table_type" style="display: none"><?php echo $table_type;?></div>
<div id="department_id_search" style="display: none;"><?php echo $department_id_search;?></div>
<div id="post_id_search" style="display: none;"><?php echo $post_id_search;?></div>
<div class="tabbable">
    <ul class="nav nav-tabs padding-12 tab-color-blue background-blue"
        id="myTab4">
        <li class="<?php if($table_type=='1') echo "active";?>"><a
            data-toggle="tab" href="#table_middle_1">
                <?php  echo  Yii::t ( 'vcos', '基本工资标准' );?>
                   
                </a></li>
        <li class="<?php if($table_type=='2') echo "active";?>"><a
            data-toggle="tab" href="#table_middle_2">
                 <?php  echo  Yii::t ( 'vcos', '技能工龄津贴标准 ' );?>
                       </a></li>
        <li class="<?php if($table_type=='3') echo "active";?>"><a
            data-toggle="tab" href="#table_middle_3">
                <?php  echo  Yii::t ( 'vcos', '加班工资标准' );?>
                        </a></li>
        <li class="<?php if($table_type=='4') echo "active";?>"><a
            data-toggle="tab" href="#table_middle_4">
                <?php  echo  Yii::t ( 'vcos', '请假扣款标准' );?>
                        </a></li>
        <li class="<?php if($table_type=='5') echo "active";?>"><a
            data-toggle="tab" href="#table_middle_5">
                <?php  echo  Yii::t ( 'vcos', '住房公积金标准' );?>
                         </a></li>
        <li class="<?php if($table_type=='6') echo "active";?>"><a
            data-toggle="tab" href="#table_middle_6">
                <?php  echo  Yii::t ( 'vcos', ' 交通通讯补贴标准' );?>
                        </a></li>
    </ul>
</div>
<form id="search_form" method="post" action="">
    <div id="sample-table-2_length" class="dataTables_length"
        style="margin-top: 12px; margin-bottom: 10px;">
        <label style="margin-left: 5%;">  <?php  echo  Yii::t ( 'vcos', '部 门' );?><select
            id="department_search" style="width: 200px; height: 34px;"
            name="department_id" size="1" aria-controls="sample-table-2">
                <option value="" selected="selected"></option>
                    <?php			
                   foreach ( $Alldepartment as $row ) {							?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php	
                    }
                    	?>
                   
            </select>
        </label> <label style="margin-left: 10%"><?php  echo  Yii::t ( 'vcos', '职 务' );?>  <select
            id="post_search" name="post_id"
            style="width: 150px; height: 34px;" size="1"
            aria-controls="sample-table-2">
                <option value="" selected="selected"></option>
                    <?php	
                    foreach ( $post as $row ) {							?>
                    <option value="<?php echo $row['post_id']?>"><?php echo  Yii::t ( 'vcos', $row['post_cn_name'] );?></option>
                    <?php	
                    }	
                    	?>
                   
            </select>
        </label>
        <button style="margin-left: 20%" value="搜索" name="soso"
            class="btn btn-purple  " id="search_box" type="submit">
            <?php echo Yii::t ('vcos', '搜索');?> <i class="icon-search  bigger-110"> </i>
        </button>
    </div>
</form>
<div class="tab-content">
    <div id="table_middle_1"
        class="tab-pane <?php if($table_type=='1') echo "active";?>">
        <div class="table-responsive">
            <table
                class="table table-striped table-bordered table-hover"
                id="sample-table-1">
                <thead>
                    <tr>
                        <th class="center"><label> <input class="ace"
                                id="checkALL" type="checkbox"> <span
                                class="lbl"></span>
                        </label></th>
                        <th><?php  echo  Yii::t ( 'vcos', '部门' );?></th>
                        <th><?php  echo  Yii::t ( 'vcos', '职务' );?></th>
                        <th><?php  echo  Yii::t ( 'vcos', '月工资' );?></th>
                        <th><?php  echo  Yii::t ( 'vcos', '日工资' );?></th>
                    </tr>
                </thead>
                <tbody>
                        <?php	
                    foreach ( $base_salary as $row ) 
                        {	
                        	?>
                            <tr>
                        <td class="center"><label> <input
                                class="ace checkbox_button"
                                type="checkbox" name="ids[]"
                                value="<?php echo $row['id'];?>"> <span
                                class="lbl"></span>
                        </label></td>
                        <td><?php echo Yii::t ( 'vcos',$row['newdepartmentname']  );?></td>
                        <td><?php echo Yii::t ( 'vcos',$row['post_cn_name']  );?></td>
                        <td style="display: none;"><input name="id"
                            class="base_salary_id" type="text"
                            value="<?php echo Yii::t ( 'vcos',$row['id']  );?>"></td>
                        <td><input name="month_salary" type="text"
                            class="month_salary" disabled="disabled"
                            style="border: none;"
                            value="<?php echo Yii::t ( 'vcos',$row['month_salary']  );?>"></td>
                        <td><input name="day_salary" type="text"
                            disabled="disabled" class="day_salary"
                            style="border: none;"
                            value="<?php echo Yii::t ( 'vcos',$row['day_salary']  );?>"></td>
                    </tr>
                            <?php	
                            	}	
                           	?>
                        </tbody>
            </table>
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
                <button class="btn btn-primary" id="edit_1"
                    style="margin-right: 30px;"><?php  echo  Yii::t ( 'vcos', '编辑' );?></button>
                <button class="btn btn-primary "
                    style="margin-right: 30px;"><?php  echo  Yii::t ( 'vcos', '导入' );?></button>
                <button class="btn btn-primary " id="export1"
                    style="margin-right: 30px;"><?php echo Yii::t('vcos','导出');?></button>
            </div>
            <div
                style="text-align: center; margin-top: 100px; display: none;">
                <button class="btn btn-primary" id="save_1"
                    style="margin-right: 30px;"><?php echo Yii::t('vcos','保存');?></button>
                <button class="btn btn-primary" id="cancel_1"
                    style="margin-right: 30px;"><?php echo Yii::t('vcos','取消');?></button>
            </div>
        </div>
    </div>
    <div id="table_middle_2"
        class="tab-pane <?php if($table_type=='2') echo "active";?>">
        <div class="table-responsive">
            <form action="" method="post" id="table2_form">
                <table
                    class="table table-striped table-bordered table-hover"
                    id="sample-table-2">
                    <thead>
                        <tr>
                            <th class="center"><label> <input
                                    class="ace" id="checkALL2"
                                    type="checkbox"> <span class="lbl"></span>
                            </label></th>
                            <th><?php echo yii::t ( 'vcos', '部门' ); ?></th>
                            <th><?php echo yii::t ( 'vcos', '职务' ); ?></th>
                            <th><?php echo yii::t ( 'vcos', '职称/技能/工龄' ); ?></th>
                            <th><?php echo yii::t ( 'vcos', '津贴标准' ) ;?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php	

                    foreach ( $skill_allowance as $row ) {				?>
                            <tr>
                            <td class="center"><label> <input
                                    class="ace checkbox_button2"
                                    type="checkbox" name="id2s[]"
                                    value="<?php echo $row['id'];?>"> <span
                                    class="lbl"></span>
                            </label></td>
                            <td style="display: none;"><input name="id"
                                class="skill_allowance_id" type="text"
                                value="<?php echo Yii::t ( 'vcos',$row['id']  );?>"></td>
                            <td><?php echo yii::t ( 'vcos', $row['newdepartmentname'] ) ;?></td>
                            <td><?php echo yii::t ( 'vcos', $row['post_cn_name'] ) ;?></td>
                            <td class="title_id" style="display: none;"><select
                                class="form-control" id="title_id"
                                name="title_id">
                        <?php
                    	foreach ( $title as $row1 ) {

                        ?>
                             <option
                                        value="<?php echo $row1['title_id'];?>"><?php  echo $row1['title_name']; ?></option>



                                    <?php
                                    }	


                                    	?>
                                </select></td>
                            <td class="title_name"><?php echo yii::t ( 'vcos', $row['title_name'] ) ;?></td>
                            <td><input name="allowance" type="text"
                                disabled="disabled" class="allowance"
                                style="border: none;"
                                value="<?php echo Yii::t ( 'vcos',$row['allowance']  );?>"></td>
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
                <a href="#modal-form1" data-toggle="modal">
                    <button class="btn btn-primary"
                        style="margin-right: 30px;"><?php echo Yii::t('vcos','新增');?></button>
                </a>
                <button class="btn btn-primary" id="edit_2"
                    style="margin-right: 30px;"><?php echo Yii::t('vcos','编辑');?></button>
                <button class="btn btn-primary table2_delete"
                    style="margin-right: 30px; background-color: red !important; border-color: red !important;"><?php echo Yii::t('vcos','删除');?></button>
                <button class="btn btn-primary"
                    style="margin-right: 30px;"><?php echo Yii::t('vcos','导入');?></button>
                <button class="btn btn-primary" id="export2"
                    style="margin-right: 30px;"><?php echo Yii::t('vcos','导出');?></button>
            </div>
            <div
                style="text-align: center; margin-top: 100px; display: none;">
                <button class="btn btn-primary" id="save_2"
                    style="margin-right: 30px;"><?php echo Yii::t('vcos','保存');?></button>
                <button class="btn btn-primary" id="cancel_2"
                    style="margin-right: 30px;"><?php echo Yii::t('vcos','取消');?></button>
            </div>
        </div>
    </div>
    <div id="table_middle_3"
        class="tab-pane <?php if($table_type=='3') echo "active";?>">
        <div class="table-responsive">
            <form id="table3_form" action="" method="post">
                <table
                    class="table table-striped table-bordered table-hover"
                    id="sample-table-1">
                    <thead>
                        <tr>
                            <th class="center"><label> <input
                                    class="ace" id="checkALL3"
                                    type="checkbox"> <span class="lbl"></span>
                            </label></th>
                            <th><?php echo yii::t ( 'vcos', '部门' ) ;?></th>
                            <th><?php echo yii::t ( 'vcos', '职务' ) ;?></th>
                            <th><?php echo yii::t ( 'vcos', '开始时间' ) ;?></th>
                            <th><?php echo yii::t ( 'vcos', '结束时间' ) ;?></th>
                            <th><?php echo yii::t ( 'vcos', '日班工资' ) ;?></th>
                            <th><?php echo yii::t ( 'vcos', '夜班工资' ) ;?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php		
                	foreach ( $overtime_salary as $row ) {	
                    	?>
                            <tr>
                            <td class="center"><label> <input
                                    class="ace checkbox_button3"
                                    type="checkbox" name="id3s[]"
                                    value="<?php echo $row['id'];?>"> <span
                                    class="lbl"></span>
                            </label></td>
                            <td style="display: none;"><input name="id"
                                class="overtime_salary_id" type="text"
                                value="<?php echo Yii::t ( 'vcos',$row['id']  );?>"></td>
                            <td><?php echo yii::t ( 'vcos', $row['newdepartmentname'] ) ;?></td>
                            <td><?php echo yii::t ( 'vcos', $row['post_cn_name'] ) ; ?></td>
                            <td><input
                                class="form-control date-picker date_of_start"
                                name="operation_time"
                                disabled="disabled"
                                value="<?php echo yii::t ( 'vcos', $row['date_of_start'] ) ; ?>"
                                style="display: inline; width: 100%;"
                                id="id-date-picker-1"
                                data-date-format="yyyy-mm-dd"
                                type="text"></td>
                            <td><input
                                class="form-control date-picker date_of_end"
                                name="operation_time"
                                disabled="disabled"
                                value="<?php echo yii::t ( 'vcos', $row['date_of_end'] ) ; ?>"
                                style="display: inline; width: 100%;"
                                id="id-date-picker-2"
                                data-date-format="yyyy-mm-dd"
                                type="text"></td>
                            <td><input name="day_salary" type="text"
                                disabled="disabled" class="day_salary"
                                style="border: none;"
                                value="<?php echo yii::t ( 'vcos', $row['day_salary'] ) ; ?>">
                            </td>
                            <td><input name="night_salary" type="text"
                                disabled="disabled" class="night_salary"
                                style="border: none;"
                                value="<?php echo yii::t ( 'vcos', $row['night_salary'] ) ; ?>">
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
                <a href="#modal-form3" data-toggle="modal">
                    <button class="btn btn-primary"
                        style="margin-right: 30px;"><?php echo Yii::t ('vcos', '新增');?></button>
                </a>
                <button class="btn btn-primary" id="edit_3"
                    style="margin-right: 30px;"><?php echo Yii::t ('vcos', '编辑');?></button>
                <button class="btn btn-primary table3_delete"
                    style="margin-right: 30px; background-color: red !important; border-color: red !important;"><?php echo Yii::t ('vcos', '删除');?></button>
                <button class="btn btn-primary"
                    style="margin-right: 30px;"><?php echo Yii::t ('vcos', '导入');?></button>
                <button class="btn btn-primary " id="export3"
                    style="margin-right: 30px;"><?php echo Yii::t ('vcos', '导出');?></button>
            </div>
            <div
                style="text-align: center; margin-top: 100px; display: none;">
                <button class="btn btn-primary" id="save_3"
                    style="margin-right: 30px;"><?php echo Yii::t ('vcos', '保存');?></button>
                <button class="btn btn-primary" id="cancel_3"
                    style="margin-right: 30px;"><?php echo Yii::t ('vcos', '取消');?></button>
            </div>
        </div>
    </div>
    <div id="table_middle_4"
        class="tab-pane <?php if($table_type=='4') echo "active";?> ">
        <div class="table-responsive">
            <table
                class="table table-striped table-bordered table-hover"
                id="sample-table-2">
                <thead>
                    <tr>
                        <th class="center"><label> <input class="ace"
                                id="checkALL4" type="checkbox"> <span
                                class="lbl"></span>
                        </label></th>
                        <th><?php echo yii::t ( 'vcos', '部门' ) ; ?></th>
                        <th><?php echo yii::t ( 'vcos', '职务' ) ; ?></th>
                        <th><?php echo yii::t ( 'vcos', '请假扣款' ) ; ?></th>
                        <th><?php echo yii::t ( 'vcos', '事假扣款' ) ; ?></th>
                    </tr>
                </thead>
                <tbody>
                        <?php		
            	foreach ( $leave_charge as $row ) {							?>
                            <tr>
                        <td class="center"><label> <input
                                class="ace checkbox_button4"
                                type="checkbox" name="id4s[]"
                                value="<?php echo $row['id'];?>"> <span
                                class="lbl"></span>
                        </label></td>
                        <td class="table4_id" style="display: none;"><?php echo yii::t ( 'vcos', $row['id'] ) ;?></td>
                        <td><?php echo yii::t ( 'vcos', $row['newdepartmentname'] ) ; ?></td>
                        <td><?php echo yii::t ( 'vcos', $row['post_cn_name'] ) ; ?></td>
                        <td><input name="sick_charge"
                            class="sick_charge" type="text"
                            style="border: none;" disabled="disabled"
                            value="<?php echo Yii::t ( 'vcos',$row['sick_charge']  );?>">
                        </td>
                        <td><input name="compassionate_charge"
                            style="border: none;" disabled="disabled"
                            class="compassionate_charge" type="text"
                            value="<?php echo Yii::t ( 'vcos',$row['compassionate_charge'] );?>">
                        </td>
                    </tr>
                            <?php	
                            }	
                            ?>
                        </tbody>
            </table>
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
                <button class="btn btn-primary" id="edit_4"
                    style="margin-right: 30px;"><?php echo Yii::t ('vcos', '编辑');?></button>
                <button class="btn btn-primary"
                    style="margin-right: 30px;"><?php echo Yii::t ('vcos', '导入');?></button>
                <button class="btn btn-primary " id="export4"
                    style="margin-right: 30px;"><?php echo Yii::t ('vcos', '导出');?></button>
            </div>
            <div
                style="text-align: center; margin-top: 100px; display: none;">
                <button class="btn btn-primary" id="save_4"
                    style="margin-right: 30px;"><?php echo Yii::t ('vcos', '保存');?></button>
                <button class="btn btn-primary" id="cancel_4"
                    style="margin-right: 30px;"><?php echo Yii::t ('vcos', '取消');?></button>
            </div>
        </div>
    </div>
    <div id="table_middle_5"
        class="tab-pane <?php if($table_type=='5') echo "active";?>">
        <div class="table-responsive">
            <table
                class="table table-striped table-bordered table-hover"
                id="sample-table-1">
                <thead>
                    <tr>
                        <th class="center"><label> <input class="ace"
                                id="checkALL5" type="checkbox"> <span
                                class="lbl"></span>
                        </label></th>
                        <th><?php echo yii::t ( 'vcos', '部门' ) ; ?></th>
                        <th><?php echo yii::t ( 'vcos', '职务' ) ; ?></th>
                        <th><?php echo yii::t ( 'vcos', '员工编码' ) ; ?></th>
                        <th><?php echo yii::t ( 'vcos', '姓名' ) ; ?></th>
                        <th><?php echo yii::t ( 'vcos', '公积金基数' ) ; ?></th>
                        <th colspan="2" style="padding: 0;">
                            <div style="">
                                <div class='top'
                                    style="border-bottom: solid 1px; text-align: center;"><?php echo yii::t ( 'vcos', '公积金比例' ) ; ?></div>
                                <div class='bot'
                                    style="text-align: center;">
                                    <span class="center"
                                        style="border-right: solid 1px;"><?php echo yii::t ( 'vcos', '个人' ) ; ?></span>
                                    <span class=""><?php echo yii::t ( 'vcos', '单位' ) ; ?></span>
                                </div>
                            </div>
                        </th>
                        <th><?php echo yii::t ( 'vcos', '社保基数' ) ; ?></th>
                        <th><?php echo yii::t ( 'vcos', '失业保险比例' ) ; ?></th>
                        <th><?php echo yii::t ( 'vcos', '生育保险比例' ) ; ?></th>
                        <th colspan="2" style="padding: 0;">
                            <div class='top'
                                style="border-bottom: solid 1px; text-align: center;"><?php echo yii::t ( 'vcos', '养老保险比例' ) ; ?></div>
                            <div class='bot' style="text-align: center;">
                                <span style="border-right: solid 1px;"><?php echo yii::t ( 'vcos', '个人' ) ; ?></span>
                                <span><?php echo yii::t ( 'vcos', '单位' ) ; ?></span>
                            </div>
                        </th>
                        <th colspan="2" style="padding: 0;">
                            <div class='top'
                                style="border-bottom: solid 1px; text-align: center;"><?php echo yii::t ( 'vcos', '医疗保险比例' ) ; ?></div>
                            <div class='bot' style="text-align: center;">
                                <span style="border-right: solid 1px;"><?php echo yii::t ( 'vcos', '个人' ) ; ?></span>
                                <span><?php echo yii::t ( 'vcos', '单位' ) ; ?></span>
                            </div>
                        </th>
                        <th colspan="2" style="padding: 0;">
                            <div class='top'
                                style="border-bottom: solid 1px; text-align: center;"><?php echo yii::t ( 'vcos', '工商保险比例' ) ; ?></div>
                            <div class='bot' style="text-align: center;">
                                <span style="border-right: solid 1px;"><?php echo yii::t ( 'vcos', '个人' ) ; ?></span>
                                <span><?php echo yii::t ( 'vcos', '单位' ) ; ?></span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                        <?php		
                    foreach ( $housing_fund as $row ) {					?>
                            <tr>
                        <td class="center"><label> <input
                                class="ace checkbox_button5"
                                type="checkbox" name="id5s[]"
                                value="<?php echo $row['id'];?>"> <span
                                class="lbl"></span>
                        </label></td>
                        <td class="table5_id" style="display: none;"><?php echo yii::t ( 'vcos', $row['id'] ) ;?></td>
                        <td><?php  echo yii::t ( 'vcos', $row['newdepartmentname'] ) ;  ?></td>
                        <td><?php  echo yii::t ( 'vcos', $row['post_cn_name'] ) ;  ?></td>
                        <td><?php  echo yii::t ( 'vcos', $row['employee_code'] ) ;  ?></td>
                        <td><?php  echo yii::t ( 'vcos', $row['cn_name'] ) ;  ?></td>
                        <td><input name="fund_base" class="fund_base"
                            type="text" disabled="disabled"
                            style="border: none;"
                            value="<?php echo Yii::t ( 'vcos',$row['fund_base']  );?>">
                        </td>
                        <td><input name="fund_person_percent"
                            class="fund_person_percent" type="text"
                            disabled="disabled" style="border: none;"
                            value="<?php echo Yii::t ( 'vcos',$row['fund_person_percent']  );?>">
                        </td>
                        <td><input name="fund_compony_percent"
                            class="fund_compony_percent" type="text"
                            disabled="disabled" style="border: none;"
                            value="<?php echo Yii::t ( 'vcos',$row['fund_compony_percent']  );?>">
                        </td>
                        <td><input name="security_base"
                            class="security_base" type="text"
                            disabled="disabled" style="border: none;"
                            value="<?php echo Yii::t ( 'vcos',$row['security_base']  );?>">
                        </td>
                        <td><input name="unemployment"
                            class="unemployment" type="text"
                            disabled="disabled" style="border: none;"
                            value="<?php echo Yii::t ( 'vcos',$row['unemployment']  );?>">
                        </td>
                        <td><input name="maternity" class="maternity"
                            type="text" disabled="disabled"
                            style="border: none;"
                            value="<?php echo Yii::t ( 'vcos',$row['maternity']  );?>">
                        </td>
                        <td><input name="endowment_person"
                            class="endowment_person" type="text"
                            disabled="disabled" style="border: none;"
                            value="<?php echo Yii::t ( 'vcos',$row['endowment_person']  );?>">
                        </td>
                        <td><input name="endowment_compony"
                            class="endowment_compony" type="text"
                            disabled="disabled" style="border: none;"
                            value="<?php echo Yii::t ( 'vcos',$row['endowment_compony']  );?>">
                        </td>
                        <td><input name="medical_person"
                            class="medical_person" type="text"
                            disabled="disabled" style="border: none;"
                            value="<?php echo Yii::t ( 'vcos',$row['medical_person']  );?>">
                        </td>
                        <td><input name="medical_compony"
                            class="medical_compony" type="text"
                            disabled="disabled" style="border: none;"
                            value="<?php echo Yii::t ( 'vcos',$row['medical_compony']  );?>">
                        </td>
                        <td><input name="injury_person"
                            class="injury_person" type="text"
                            disabled="disabled" style="border: none;"
                            value="<?php echo Yii::t ( 'vcos',$row['injury_person']  );?>">
                        </td>
                        <td><input name="injury_compony"
                            class="injury_compony" type="text"
                            disabled="disabled" style="border: none;"
                            value="<?php echo Yii::t ( 'vcos',$row['injury_compony']  );?>">
                        </td>
                    </tr>
                            <?php	
                            	}
                           ?>
                        </tbody>
            </table>
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
                <button class="btn btn-primary" id="edit_5"
                    style="margin-right: 30px;"><?php echo yii::t ('vcos', '编辑');?></button>
                <button class="btn btn-primary"
                    style="margin-right: 30px;"><?php echo yii::t ('vcos', '导入');?></button>
                <button class="btn btn-primary " id="export5"
                    style="margin-right: 30px;"><?php echo yii::t ('vcos', '导出');?></button>
            </div>
            <div
                style="text-align: center; margin-top: 100px; display: none;">
                <button class="btn btn-primary" id="save_5"
                    style="margin-right: 30px;"><?php echo yii::t ('vcos', '保存');?></button>
                <button class="btn btn-primary" id="cancel_5"
                    style="margin-right: 30px;"><?php echo yii::t ('vcos', '取消');?></button>
            </div>
        </div>
    </div>
    <div id="table_middle_6"
        class="tab-pane  <?php if($table_type=='6') echo "active";?>">
        <div class="table-responsive">
            <table
                class="table table-striped table-bordered table-hover"
                id="sample-table-2">
                <thead>
                    <tr>
                        <th class="center"><label> <input class="ace"
                                id="checkALL6" type="checkbox"> <span
                                class="lbl"></span>
                        </label></th>
                        <th><?php  echo yii::t ( 'vcos', '部门' ) ;  ?></th>
                        <th><?php  echo yii::t ( 'vcos', '职务' ) ;  ?></th>
                        <th><?php  echo yii::t ( 'vcos', '补贴名称' ) ;  ?></th>
                        <th><?php  echo yii::t ( 'vcos', '标准补贴' ) ;  ?></th>
                    </tr>
                </thead>
                <tbody>
                        <?php			
                     foreach ( $traffic_allowance as $row ) {	
                        ?>

			                <tr>
                        <td class="center"><label> <input
                                class="ace checkbox_button6"
                                type="checkbox" name="id6s[]"
                                value="<?php echo $row['id'];?>"> <span
                                class="lbl"></span>
                        </label></td>
                        <td class="table6_id" style="display: none;"><?php echo yii::t ( 'vcos', $row['id'] ) ;?></td>
                        <td><?php  echo yii::t ( 'vcos', $row['newdepartmentname'] ) ;  ?></td>
                        <td><?php  echo yii::t ( 'vcos', $row['post_cn_name'] ) ;  ?></td>
                        <td><?php  echo yii::t ( 'vcos', $row['allowance_name'] ) ;  ?></td>
                        <td><input name="allowance_base"
                            class="allowance_base" type="text"
                            disabled="disabled" style="border: none;"
                            value="<?php echo Yii::t ( 'vcos',$row['allowance_base']  );?>">
                        </td>
                    </tr>
                            <?php	
                            	}	
                            ?>
                        </tbody>
            </table>
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
                <button class="btn btn-primary" id="edit_6"
                    style="margin-right: 30px;"><?php echo yii::t ('vcos', '编辑');?></button>
                <button class="btn btn-primary "
                    style="margin-right: 30px;"><?php echo yii::t ('vcos', '导入');?></button>
                <button class="btn btn-primary " id="export6"
                    style="margin-right: 30px;"><?php echo yii::t ('vcos', '导出');?></button>
            </div>
            <div
                style="text-align: center; margin-top: 100px; display: none;">
                <button class="btn btn-primary" id="save_6"
                    style="margin-right: 30px;"><?php echo yii::t ('vcos', '保存');?></button>
                <button class="btn btn-primary" id="cancel_6"
                    style="margin-right: 30px;"><?php echo yii::t ('vcos', '取消');?></button>
            </div>
        </div>
    </div>
</div>
<div id="dialog-confirm_export" class="hide">
    <div class="alert alert-info bigger-110" id="dialog-confirm-content">
        <?php echo yii::t('vcos', '请选择导出记录')?></div>
    <div class="space-6"></div>
</div>
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
        <i class="icon-hand-right blue bigger-120"></i> <?php echo yii::t('vcos', '确定吗？')?>
    </p>
</div>
<!-- 多条删除弹出框结束 -->
<!-- 新增弹出框 开始-->
<div id="modal-form1" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger"><?php echo yii::t('vcos', '请填写以下内容')?></h4>
            </div>
            <div class="modal-body overflow-visible">
                <div class="center">
                    <form novalidate="novalidate"
                        class="form-horizontal" role="form"
                        method="post"
                        action="<?php echo Yii::app()->createUrl("data/data_post_add");?>"
                        id="table2_form_add" autocomplete="off">
                        <div class="form-group">
                            <label
                                class="col-sm-3 control-label no-padding-right"
                                for="select_department_id"
                                style="margin-left: 10%;"> <?php echo yii::t('vcos', '部门：')?> </label>
                            <div class="col-sm-9" style="width: 33%;">
                                <select class="form-control"
                                    id="select_department_id"
                                    name="department_id">
                                    <option value="" selected="selected"></option>
                    <?php											foreach ( $Alldepartment as $row ) {							?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php	
                    	}	
                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group">
                            <label
                                class="col-sm-3 control-label no-padding-right"
                                for="department_post_id"
                                style="margin-left: 10%;"> <?php echo yii::t('vcos', '职务：')?> </label>
                            <div class="col-sm-9" style="width: 33%;">
                                <select class="form-control"
                                    id="department_post_id"
                                    name="post_id">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group">
                            <label
                                class="col-sm-3 control-label no-padding-right"
                                for="department_id"
                                style="margin-left: 10%;"> <?php echo yii::t('vcos', '职称：')?> </label>
                            <div class="col-sm-9" style="width: 33%;">
                                <select class="form-control"
                                    id="title_id" name="title_id">
                                    <option value=""></option>
                            <?php
                        foreach ( $title as $row1 ) {					?>
                                    
                                    <option
                                        value="<?php echo $row1['title_id'];?>"><?php  echo $row1['title_name']; ?></option>
                      
                                    <?php		
                                    }	
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group">
                            <label for="allowance"><?php echo yii::t('vcos', '津贴标准')?></label> <input
                                placeholder="" id="allowance"
                                name="allowance" type="text">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="icon-remove"></i> <?php echo yii::t('vcos', '取消')?>
                    </button>
                    <button class="btn btn-sm btn-primary table2_add">
                        <i class="icon-ok"></i> <?php echo yii::t('vcos', '保存')?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 新增弹出框 结束-->
<!-- table3新增弹出框 开始-->
<div id="modal-form3" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger"><?php echo yii::t('vcos', '保存')?>请填写以下内容</h4>
            </div>
            <div class="modal-body overflow-visible">
                <div class="center">
                    <form novalidate="novalidate"
                        class="form-horizontal" role="form"
                        method="post"
                        action="<?php echo Yii::app()->createUrl("data/data_post_add");?>"
                        id="table3_form_add" autocomplete="off">
                        <div class="form-group">
                            <label
                                class="col-sm-3 control-label no-padding-right"
                                for="select_department_id"
                                style="margin-left: 10%;"><?php echo yii::t('vcos', '保存')?> 部门： </label>
                            <div class="col-sm-9" style="width: 35%;">
                                <select class="form-control"
                                    id="select_department_id1"
                                    name="department_id">
                                    <option value="" selected="selected"></option>
                    <?php											foreach ( $Alldepartment as $row ) {
						?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php		
                     }									
						?>
                                </select>
                            </div>
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group">
                            <label
                                class="col-sm-3 control-label no-padding-right"
                                for="department_post_id"
                                style="margin-left: 10%;"> <?php echo yii::t('vcos', '保存')?>职务： </label>
                            <div class="col-sm-9" style="width: 35%;">
                                <select class="form-control"
                                    id="department_post_id1"
                                    name="post_id">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group">
                            <label for="id-date-picker-3"> <?php  echo yii::t ( 'vcos', '开始时间' ) ;  ?>&nbsp;&nbsp; &nbsp;
                    &nbsp; </label> <input
                                class="form-control date-picker"
                                name="date_of_start" value=""
                                style="display: inline; width: 35%; border: 1px solid #D5D5D5;"
                                id="id-date-picker-3"
                                data-date-format="yyyy-mm-dd"
                                type="text">
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group">
                            <label for="id-date-picker-4"> <?php  echo yii::t ( 'vcos', '结束时间' ) ;  ?>&nbsp;&nbsp; &nbsp;
                    &nbsp; </label> <input
                                class="form-control date-picker"
                                name="date_of_end" value=""
                                style="display: inline; width: 35%; border: 1px solid #D5D5D5;"
                                id="id-date-picker-4"
                                data-date-format="yyyy-mm-dd"
                                type="text">
                        </div>



                        <div class="space-6"></div>
                        <div class="form-group">
                            <label style="" for="form-field-1">
                                日班工资<?php echo yii::t('vcos', '保存')?>&nbsp;&nbsp; &nbsp; &nbsp; </label>
                            <input placeholder="" id="form-field-1"
                                style="height: 34px;" type="text"
                                name="day_salary" value="">
                        </div>
                        <div class="space-6"></div>
                        <div class="form-group">
                            <label style="" for="form-field-1">
                                <?php echo yii::t('vcos', '夜班工资')?>&nbsp;&nbsp; &nbsp; &nbsp; </label>
                            <input placeholder="" id="form-field-1"
                                style="height: 34px;" type="text"
                                name="night_salary" value="">
                        </div>
                        <div class="space-6"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="icon-remove"></i> <?php echo yii::t('vcos', '取消')?>
                    </button>
                    <button class="btn btn-sm btn-primary table3_add">
                        <i class="icon-ok"></i> <?php echo yii::t('vcos', '保存')?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 新增弹出框 结束-->
<!-- table1导出开始 -->
<div id="table1_export" style="display: none;">
    <form method="post" id="export_form">
        <div class="center"
            style="border: 1px solid; width: 50%; margin-top: 50px; margin-left: auto; margin-right: auto; border-radius: 10px ! important;">
            <div style="text-align: left;">
                <h2 style=""><?php echo yii::t('vcos', '基本工资标准导出')?></h2>
            </div>
            <div
                style="border-top: 1px solid; border-bottom: 1px solid; overflow: hidden;">
                <div
                    style="margin-bottom: 20px; font-size: 20px; margin-top: 10px;">
                    <label style="font-size: 20px;"><?php echo yii::t('vcos', '选择部门')?> <select
                        style="width: 200px; height: 34px;"
                        id="select_department_id2"
                        aria-controls="sample-table-2" size="1"
                        name="department_id">
                            <option value="" selected="selected"></option>
                    <?php											foreach ( $Alldepartment as $row ) {						?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php		
                    }	
                    ?>
                             
                      
                </select>
                    </label>
                </div>
                <div style="margin-bottom: 10px;">
                    <label style="font-size: 20px;"> <?php echo yii::t('vcos', '选择职务')?><select
                        style="width: 200px; height: 34px;"
                        aria-controls="sample-table-2" size="1"
                        id="department_post_id2" name="post_id">
                            <option selected="selected" value=""></option>
                    </select>
                    </label>
                </div>
            </div>
            <div
                style="text-align: center; margin-top: 50px; overflow: hidden; box-sizing: border-box; margin-bottom: 20px;">
                <button class="btn btn-info export" type="button">
                    <i class="icon-ok bigger-130"></i> <?php echo yii::t('vcos', '导出')?>
                </button>
            </div>
        </div>
        <div style="" class="center">
            <button style="margin-left: 45%; margin-top: 30px;"
                class="btn  btn-warning returnback">
                <i class="icon-undo bigger-130"></i> <?php echo yii::t('vcos', '返回')?>
            </button>
        </div>
    </form>
</div>
<!-- table1导出 -->
<script>
$(document).ready(function() {
	$('#edit_1').click(function(){
		$('#table_middle_1').find('input:text').attr({
			disabled: false
		});

        $(this).parent('div').hide();
        $('#save_1').parent('div').show();
		$('input:text').css('border', '1px solid');
        
	});


    $('#save_1').click(function(){

        var data1= new Array();
        var a=$('#table_middle_1 table tbody').find('tr').length;
        

       $('#table_middle_1 table tbody').find('tr').each(function() {
        var id=$(this).find('.base_salary_id').val();

        var month_salary=$(this).find('.month_salary').val();
        var day_salary=$(this).find('.day_salary').val();

       temp={
            id:id,
            month_salary:month_salary,
            day_salary : day_salary
        };
        data1.push(temp);

           
       });



       $.ajax({
           url: "<?php echo Yii::app()->createUrl("salary/salary_set_base_salary");?>",
           type: 'post',
           dataType: 'text',
           // data: "base_salary="+data1,
           data: "base_salary="+JSON.stringify(data1),
           success:function(data){  //成功返回数据时的回调函数
                //输出返回的文本
                var a= eval("("+data+")");
                // var a=JSON.parse(data);
                if(a.code=='1')
                {
                    alert('修改成功');
                    $('input:text').css('border', 'none');
                }
                else{
                    alert('修改失败');

                }

                

             },
             error:function(e){
               alert('请求错误或失败');
             }
       });


       $('#table_middle_1').find('input:text').attr({
            disabled: true
        });
       // $('#table_middle_1').find('input:text').css('border', 'none');
       $('input:text').css('border', 'none');
$(this).parent('div').hide();
 $('#edit_1').parent('div').show();



    });




    $('#cancel_1').click(function(){
        $(this).parent('div').hide();
        $('#edit_1').parent('div').show();

        $('#table_middle_1').find('input:text').attr({
            disabled: true
        });
         $('input:text').css('border', 'none');
$(this).parent('div').hide();
 $('#edit_1').parent('div').show();





    
        
    });


    // 第二个页面开始


   $('#edit_2').click(function(){


        // $('#table_middle_2').find('input:text').attr({
        //     disabled: false
        // });

        $(this).parent('div').hide();
        // $('.title_name').css('display', 'none');
        $('.title_name').hide();
        // $('.title_id').css('display', 'blocked');
        $('.title_id').show();

        $('#save_2').parent('div').show();
        // $('input:text').css('border', '1px solid');
        $('#table_middle_2').find('input:text').attr({
            disabled: false
        });


        $('#table_middle_2 table tbody').find('tr').each(function()
        {
           var temp1=$(this).find('.title_name').html()
        
        $(this).find(".title_id option").each(function()
        {
             if ($(this).text()==temp1)
             {
                
                        $(this).attr("selected", "selected");

             }
            
        });
      

           
       });




        
    });


$('#save_2').click(function(){



  




$('.title_id').hide();
$('.title_name').show();
  $('#table_middle_2').find('input:text').attr({
            disabled: true
        });


 var data1= new Array();
        
       $('#table_middle_2 table tbody').find('tr').each(function() {


        var id=$(this).find('.skill_allowance_id').val();
        var title_id=$(this).find(".title_id option:selected").val();
        b=$(this).find(".title_id option:selected").text();
        $(this).find('.title_name').html(b);
    
        // $(this).find('.title_name').attr('html', $(this).find(".title_id option:selected").text());
        var allowance=$(this).find('.allowance').val();
     
       temp={
            id:id,
            title_id:title_id,
            allowance:allowance
           
        };
      
        data1.push(temp);
           
       });


   
  $.ajax({
           url: "<?php echo Yii::app()->createUrl("salary/skill_allowance");?>",
           type: 'post',
           dataType: 'text',
           // data: "base_salary="+data1,
           data: "skill="+JSON.stringify(data1),
           success:function(data){  //成功返回数据时的回调函数
                //输出返回的文本
                var a= eval("("+data+")");
                // var a=JSON.parse(data);
                if(a.code=='1')
                {
                    alert('修改成功');
                    $('input:text').css('border', 'none');

                }
                else{
                    alert('修改失败');
                    location.reload();

                }

                

             },
             error:function(e){
               alert('请求错误或失败');
             }
       });



    $(this).parent('div').hide();
 $('#edit_2').parent('div').show();







});



$('#cancel_2').click(function(){

     $('.title_id').hide();
$('.title_name').show();
  $('#table_middle_2').find('input:text').attr({
            disabled: true
        });

       
 $(this).parent('div').hide();
 $('#edit_2').parent('div').show();





    
        
    });






// 第二个页面结束



// 第三个页面开始


   $('#edit_3').click(function(){


        // $('#table_middle_2').find('input:text').attr({
        //     disabled: false
        // });

        $(this).parent('div').hide();
        $('#save_3').parent('div').show();

        $('#table_middle_3').find('input:text').attr({
            disabled: false
        });
       $('#table_middle_3 input:text').css('border', '1px solid');

       


        // $('input:text').css('border', '1px solid');
        
    });


$('#save_3').click(function(){





 var data1= new Array();
     

       $('#table_middle_3 table tbody').find('tr').each(function() {
        var id=$(this).find('.overtime_salary_id').val();

        var date_of_start=$(this).find('.date_of_start').val();
        var date_of_end=$(this).find('.date_of_end').val();
        var day_salary=$(this).find('.day_salary').val();
        var night_salary=$(this).find('.night_salary').val();

       temp={
            id:id,
            date_of_start:date_of_start,
            date_of_end:date_of_end,
            day_salary:day_salary,
            night_salary:night_salary,
            
        };
        data1.push(temp);

           
       });

alert(JSON.stringify(data1));

       $.ajax({
           url: "<?php echo Yii::app()->createUrl("salary/overtime_salary_update");?>",
           type: 'post',
           dataType: 'text',
           // data: "base_salary="+data1,
           data: "overtime_salary="+JSON.stringify(data1),
           success:function(data){  //成功返回数据时的回调函数
                //输出返回的文本
                var a= eval("("+data+")");
                // var a=JSON.parse(data);
                if(a.code=='1')
                {
                    alert('修改成功');
                    $('#table_middle_3 input:text').css('border', 'none');
                }
                else{
                    alert('修改失败');

                }

                

             },
             error:function(e){
               alert('请求错误或失败');
             }
       });


       $('#table_middle_3').find('input:text').attr({
            disabled: true
        });
       // $('#table_middle_1').find('input:text').css('border', 'none');
       $('input:text').css('border', 'none');
$(this).parent('div').hide();
 $('#edit_3').parent('div').show();



});



$('#cancel_3').click(function(){
        $('#table_middle_3').find('input:text').attr({
            disabled: true
        });
         $('#table_middle_3 input:text').css('border', 'none');
 $(this).parent('div').hide();
 $('#edit_3').parent('div').show();





    
        
    });






// 第三个页面结束

// 第四个页面开始




   





// 第四个页面结束



// 第五个页面开始


   $('#edit_5').click(function(){


        // $('#table_middle_2').find('input:text').attr({
        //     disabled: false
        // });

        $(this).parent('div').hide();
        $('#save_5').parent('div').show();
        // $('input:text').css('border', '1px solid');
        
    });


$('#save_5').click(function(){


    $(this).parent('div').hide();
 $('#edit_5').parent('div').show();

});



$('#cancel_5').click(function(){
       
 $(this).parent('div').hide();
 $('#edit_5').parent('div').show();





    
        
    });






// 第五个页面结束


// 第六个页面开始


   $('#edit_6').click(function(){


        // $('#table_middle_2').find('input:text').attr({
        //     disabled: false
        // });

        $(this).parent('div').hide();
        $('#save_6').parent('div').show();
        // $('input:text').css('border', '1px solid');
        
    });


$('#save_6').click(function(){


    $(this).parent('div').hide();
 $('#edit_6').parent('div').show();

});



$('#cancel_6').click(function(){
       
 $(this).parent('div').hide();
 $('#edit_6').parent('div').show();





        
    });






// 第六个页面结束



















    
	
});
</script>
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

$("#checkALL2").click(function () {
            if($(this).prop('checked')==true)
            {
                $(".checkbox_button2").prop("checked",true);
            }
            else {
                $(".checkbox_button2").prop("checked",false);
            }


      });
$("#checkALL3").click(function () {
            if($(this).prop('checked')==true)
            {
                $(".checkbox_button3").prop("checked",true);
            }
            else {
                $(".checkbox_button3").prop("checked",false);
            }


      });
$("#checkALL4").click(function () {
            if($(this).prop('checked')==true)
            {
                $(".checkbox_button4").prop("checked",true);
            }
            else {
                $(".checkbox_button4").prop("checked",false);
            }


      });
$("#checkALL5").click(function () {
            if($(this).prop('checked')==true)
            {
                $(".checkbox_button5").prop("checked",true);
            }
            else {
                $(".checkbox_button5").prop("checked",false);
            }


      });
$("#checkALL6").click(function () {
            if($(this).prop('checked')==true)
            {
                $(".checkbox_button6").prop("checked",true);
            }
            else {
                $(".checkbox_button6").prop("checked",false);
            }


      });



</script>
<script type="text/javascript">


     $( ".table2_delete" ).on('click', function(e) {
        e.preventDefault();
         var ischeck=false;
    $(this).parents('.table-responsive').find('table tbody ').find('input:checkbox').each(function(){
      
    if($(this).prop('checked')==true)
          {
              ischeck=true;
          }

    }) ;

 

        if(ischeck==false)
        {

            $( "#dialog-confirm2" ).removeClass('hide').dialog({
                closeOnEscape:false,
                open:function(event,ui){$(".ui-dialog-titlebar-close").hide();} ,
                resizable: false,
                modal: true,
                title: "<?php echo yii::t('vcos', '没有选中 ！')?>",
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



        if(ischeck==true)
        {
        $( "#dialog-confirm-multi").removeClass('hide').dialog({
            closeOnEscape:false,
            open:function(event,ui){$(".ui-dialog-titlebar-close").hide();} ,
            resizable: false,
            modal: true,
            title: "<?php echo yii::t('vcos', '删除选中的记录？')?>",
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
// table3的删除开始


     $( ".table3_delete" ).on('click', function(e) {
        e.preventDefault();
         var ischeck=false;
    $(this).parents('.table-responsive').find('table tbody ').find('input:checkbox').each(function(){
      
    if($(this).prop('checked')==true)
          {
              ischeck=true;
          }

    }) ;

 

        if(ischeck==false)
        {

            $( "#dialog-confirm2" ).removeClass('hide').dialog({
                closeOnEscape:false,
                open:function(event,ui){$(".ui-dialog-titlebar-close").hide();} ,
                resizable: false,
                modal: true,
                title: "<?php echo yii::t('vcos', '没有选中 ！')?>",
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



        if(ischeck==true)
        {
        $( "#dialog-confirm-multi").removeClass('hide').dialog({
            closeOnEscape:false,
            open:function(event,ui){$(".ui-dialog-titlebar-close").hide();} ,
            resizable: false,
            modal: true,
            title: "<?php echo yii::t('vcos', '删除选中的记录？')?>",
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







</script>
<script type="text/javascript">
    
$('.tabbable ul li ').find('a').click(function(){
//     alert($(this).attr("href"));

    switch ($(this).attr("href")) {
    case  "#table_middle_1":
     location.href="<?php echo Yii::app()->createUrl("salary/salary_set");?>"+"/table_type/"+"1";
        break;
    case "#table_middle_2":
                location.href="<?php echo Yii::app()->createUrl("salary/salary_set");?>"+"/table_type/"+"2";
        break;
     case "#table_middle_3":
        location.href="<?php echo Yii::app()->createUrl("salary/salary_set");?>"+"/table_type/"+"3";
        break;
      case "#table_middle_4":
          location.href="<?php echo Yii::app()->createUrl("salary/salary_set");?>"+"/table_type/"+"4";
        break;
             case "#table_middle_5":
        location.href="<?php echo Yii::app()->createUrl("salary/salary_set");?>"+"/table_type/"+"5";
        break;
      case "#table_middle_6":
          location.href="<?php echo Yii::app()->createUrl("salary/salary_set");?>"+"/table_type/"+"6";
        break;
    default:
      
        break;
}
    return false;
    

});




// 点击导出开始

// export
$('#export1').click(function(){
   $('#search_form').hide();
   $('.tab-content').hide();
   $('#table1_export').show();
   
   $('#table1_export').find('.export').click(function(event) {
        var url="<?php echo Yii::app()->createUrl("salary/base_salary_export");?>";
       $("#export_form").attr('action', url);
       $("#export_form").submit();

   });
   


   

});


$('#export2').click(function(){

$('#search_form').hide();
   $('.tab-content').hide();
   $('#table1_export').find('h2').html('技能工龄津贴标准导出');
    $('#table1_export').show();
    $('#table1_export').find('.export').click(function(event) {


         var url="<?php echo Yii::app()->createUrl("salary/skill_allowance_export");?>";
       $("#export_form").attr('action', url);
       $("#export_form").submit();


   
       /* Act on the event */
   });

   

});


$('#export3').click(function(){
$('#search_form').hide();
   $('.tab-content').hide();
    $('#table1_export').find('h2').html('加班工资标准导出');

    $('#table1_export').show();
    $('#table1_export').find('.export').click(function(event) {
        
     var url="<?php echo Yii::app()->createUrl("salary/overtime_salary_export");?>";
       $("#export_form").attr('action', url);
       $("#export_form").submit();
       /* Act on the event */
   });

   

});

$('#export4').click(function(){
$('#search_form').hide();
   $('.tab-content').hide();
   $('#table1_export').find('h2').html('请假扣款标准导出');
    $('#table1_export').show();
    $('#table1_export').find('.export').click(function(event) {

          var url="<?php echo Yii::app()->createUrl("salary/leave_charge_export");?>";
       $("#export_form").attr('action', url);
       $("#export_form").submit();
   
       /* Act on the event */
   });

   

});


$('#export5').click(function(){
$('#search_form').hide();
   $('.tab-content').hide();
   $('#table1_export').find('h2').html('住房公积金标准导出');
    $('#table1_export').show();
    $('#table1_export').find('.export').click(function(event) {


      
        var url="<?php echo Yii::app()->createUrl("salary/housing_fund_export");?>";
       $("#export_form").attr('action', url);
       $("#export_form").submit();



        
  
       /* Act on the event */
   });

   

});


$('#export6').click(function(){
$('#search_form').hide();
   $('.tab-content').hide();
   $('#table1_export').find('h2').html('交通通讯标准导出');
    $('#table1_export').show();
    $('#table1_export').find('.export').click(function(event) {
  
         var url="<?php echo Yii::app()->createUrl("salary/traffic_allowance_export");?>";
       $("#export_form").attr('action', url);
       $("#export_form").submit();
   });

   

});




$('#table1_export').find('.returnback').click(function(event) {

      $('#table1_export').hide();
      $('#search_form').show();
   $('.tab-content').show();
   return false;

   });

    </script>
<!-- 点击导出结束 -->
<script type="text/javascript">
    



    $('#edit_4').click(function() {

  $(this).parent('div').hide();
  // $('.title_name').css('display', 'none');

  // $('.title_id').css('display', 'blocked');
  $('#save_4').parent('div').show();
  // $('input:text').css('border', '1px solid');
  $('#table_middle_4').find('input:text').attr({
    disabled: false
  });

  // $('#table_middle4').find('input:text').css('border', '1px solid');
  $('input:text').css('border', '1px solid');



});


$('#save_4').click(function() {


  $('#table_middle_4').find('input:text').attr({
    disabled: true
  });
  $('#table_middle_4').find('input:text').css('border', 'none');

  var data1 = new Array();


  $('#table_middle_4 table tbody').find('tr').each(function() {

    var id = $(this).find('.table4_id').text();
    var sick_charge = $(this).find(".sick_charge").val();
    var compassionate_charge = $(this).find(".compassionate_charge").val();

    temp = {
      id:id,
      sick_charge: sick_charge,
      compassionate_charge: compassionate_charge

    };

    data1.push(temp);
  });

  alert(JSON.stringify(data1));

  $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/leave_charge_update");?>",
    type: 'post',
    dataType: 'text',
    // data: "base_salary="+data1,
    data: "skill="+JSON.stringify(data1),
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本
      // alert(data);
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      // for (var i = 0; i < a.length; i++) {
      //     alert(a[i].id);
      // }
 
      // var a=JSON.parse(data);
      if (a.code == '1') {
        alert('修改成功');
        $('input:text').css('border', 'none');

      } else {
        alert('修改失败');
        location.reload();

      }

    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });

  $(this).parent('div').hide();
  $('#edit_4').parent('div').show();

});

$('#cancel_4').click(function() {

  $('#table_middle_4').find('input:text').attr({
    disabled: true
  });
  $('#table_middle_4').find('input:text').css('border', 'none');
  $(this).parent('div').hide();
  $('#edit_4').parent('div').show();
});





// 第五个页面修改
    $('#edit_5').click(function() {

  $(this).parent('div').hide();
  // $('.title_name').css('display', 'none');

  // $('.title_id').css('display', 'blocked');
  $('#save_5').parent('div').show();
  // $('input:text').css('border', '1px solid');
  $('#table_middle_5').find('input:text').attr({
    disabled: false
  });

  // $('#table_middle4').find('input:text').css('border', '1px solid');
  $('input:text').css('border', '1px solid');



});


$('#save_5').click(function() {


  $('#table_middle_5').find('input:text').attr({
    disabled: true
  });
  $('#table_middle_5').find('input:text').css('border', 'none');

  var data1 = new Array();


  $('#table_middle_5 table tbody').find('tr').each(function() {

    var id = $(this).find('.table5_id').text();
    var fund_base = $(this).find(".fund_base").val();
    var fund_person_percent = $(this).find(".fund_person_percent").val();
    var fund_compony_percent = $(this).find(".fund_compony_percent").val();
    var security_base = $(this).find(".security_base").val();
    var unemployment = $(this).find(".unemployment").val();
    var maternity = $(this).find(".maternity").val();
    var endowment_person = $(this).find(".endowment_person").val();
    var endowment_compony = $(this).find(".endowment_compony").val();
    var medical_person = $(this).find(".medical_person").val();
    var medical_compony = $(this).find(".medical_compony").val();
     var injury_person = $(this).find(".injury_person").val();
    var injury_compony = $(this).find(".injury_compony").val();

    

    temp = {
      id:id,
    fund_base:fund_base,
 fund_person_percent:fund_person_percent,
  fund_compony_percent:fund_compony_percent,
 security_base:security_base,
  unemployment:unemployment,
 maternity:maternity,
 endowment_person:endowment_person,
 endowment_compony:endowment_compony,
 medical_person:medical_person,
 medical_compony:medical_compony,
 injury_person:injury_person,
 injury_compony:injury_compony

    };

    data1.push(temp);
  });

  // alert(JSON.stringify(data1));

  $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/housing_fund_edit");?>",
    type: 'post',
    dataType: 'text',
    // data: "base_salary="+data1,
    data: "housing_fund="+JSON.stringify(data1),
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本
      // alert(data);
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
   
 
      // var a=JSON.parse(data);
      if (a.code == '1') {
        alert('修改成功');
        $('input:text').css('border', 'none');

      } else {
        alert('修改失败');
        location.reload();

      }

    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });

  $(this).parent('div').hide();
  $('#edit_5').parent('div').show();

});

$('#cancel_5').click(function() {

  $('#table_middle_5').find('input:text').attr({
    disabled: true
  });
  $('#table_middle_5').find('input:text').css('border', 'none');
  $(this).parent('div').hide();
  $('#edit_5').parent('div').show();
});



// 第五个页面修改结束




  $('#edit_6').click(function() {

  $(this).parent('div').hide();
  // $('.title_name').css('display', 'none');

  // $('.title_id').css('display', 'blocked');
  $('#save_6').parent('div').show();
  // $('input:text').css('border', '1px solid');
  $('#table_middle_6').find('input:text').attr({
    disabled: false
  });

  // $('#table_middle4').find('input:text').css('border', '1px solid');
  $('input:text').css('border', '1px solid');



});


$('#save_6').click(function() {


  $('#table_middle_6').find('input:text').attr({
    disabled: true
  });
  $('#table_middle_6').find('input:text').css('border', 'none');

  var data1 = new Array();


  $('#table_middle_6 table tbody').find('tr').each(function() {

    var id = $(this).find('.table6_id').text();
    var allowance_base = $(this).find(".allowance_base").val();

    temp = {
      id:id,
      allowance_base: allowance_base

    };

    data1.push(temp);
  });

  $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/traffic_allowance_update");?>",
    type: 'post',
    dataType: 'text',
    // data: "base_salary="+data1,
    data: "allowance="+JSON.stringify(data1),
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本
 
      var a = eval("(" + data + ")");
      // var a=JSON.parse(data);
      if (a.code == '1') {
        alert('修改成功');
        $('input:text').css('border', 'none');

      } else {
        alert('修改失败');
        location.reload();

      }
    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });

  $(this).parent('div').hide();
  $('#edit_6').parent('div').show();

});

$('#cancel_6').click(function() {

  $('#table_middle_6').find('input:text').attr({
    disabled: true
  });
  $('#table_middle_6').find('input:text').css('border', 'none');
  $(this).parent('div').hide();
  $('#edit_6').parent('div').show();
});

$('#search_box').click(function () {
     // body...
});


     $("#department_search  option").each(function()
                 {

                     
                    if ($(this).val()==$('#department_id_search').text()) {
                        $(this).attr("selected", "selected");

                    }
                });

     $("#post_search  option").each(function()
             {

                if ($(this).val()==$('#post_id_search').text()) {
                    $(this).attr("selected", "selected");

                }
            });


     $('.pagination li a').click( function () {
                  var url=$(this).attr("href");
//                   alert(url);
                
//                   $(this).attr("href",url);
//                   alert($(this).attr("href"));
                  
                 $("form:first").attr("action", url);
                 $("form:first").submit();//将form表单跳转到<a>的href的地址
                 return false;//退出不让啊<a>标签跳转链接
                
            

          });


// table2新增
// 部门的下拉列表改变，职务的下拉列表也改变


$('#select_department_id').change(function(event) {

              var department_id=$(this).val();
              if(department_id=='')
              {
                $('#department_post_id').html('');
                return;

              }
  
            

    $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/skill_allowance_add");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var post='<option value=""></option>';

      var post='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {    post=post+'<option value="'+a[i].post_id+'">'+a[i].post_cn_name+'</option>'
         
      }
      
      $('#department_post_id').html(post);
      //  alert(a);
      // var a=JSON.parse(data);
    
    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });




    
});



 $('#select_department_id1').change(function(event) {

              var department_id=$(this).val();
              if(department_id=='')
              {
                $('#department_post_id1').html('');
                return;

              }       

    $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/skill_allowance_add");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        $('#department_post_id').html('');
        return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var post='<option value=""></option>';

      var post='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {    post=post+'<option value="'+a[i].post_id+'">'+a[i].post_cn_name+'</option>'
         
      }
      

      $('#department_post_id1').html(post);
      //  alert(a);
      // var a=JSON.parse(data);
    

    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });
});



  $('#select_department_id2').change(function(event) {
        

              
              var department_id=$(this).val();
              if(department_id=='')
              {
                $('#department_post_id2').html('');
                return;

              }
    
             

    $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/skill_allowance_add");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        $('#department_post_id2').html('');
        return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var post='<option value=""></option>';

      var post='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {    post=post+'<option value="'+a[i].post_id+'">'+a[i].post_cn_name+'</option>'
         
      }
      

      $('#department_post_id2').html(post);
      //  alert(a);
      // var a=JSON.parse(data);
    

    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });
});



// table2增加


$('.table2_add').click(function(){
   
var url="<?php   echo Yii::app ()->createUrl ( "salary/skill_allowance_addinsert" );  ?>";
$('#table2_form_add').attr('action', url);
$('#table2_form_add').submit();



});


// table3增加


$('.table3_add').click(function(){
   
    var url="<?php echo Yii::app ()->createUrl("salary/overtime_salary_add" );  ?>";

$('#table3_form_add').attr('action', url);
$('#table3_form_add').submit();



});




</script>
<script type="text/javascript">
            jQuery(function($) {
                $('#id-disable-check').on('click', function() {
                    var inp = $('#form-input-readonly').get(0);
                    if(inp.hasAttribute('disabled')) {
                        inp.setAttribute('readonly' , 'true');
                        inp.removeAttribute('disabled');
                        inp.value="This text field is readonly!";
                    }
                    else {
                        inp.setAttribute('disabled' , 'disabled');
                        inp.removeAttribute('readonly');
                        inp.value="This text field is disabled!";
                    }
                });
            
            
                $(".chosen-select").chosen();
                $('#chosen-multiple-style').on('click', function(e){
                    var target = $(e.target).find('input[type=radio]');
                    var which = parseInt(target.val());
                    if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
                     else $('#form-field-select-4').removeClass('tag-input-style');
                });
            
            
                $('[data-rel=tooltip]').tooltip({container:'body'});
                $('[data-rel=popover]').popover({container:'body'});
                
                $('textarea[class*=autosize]').autosize({append: "\n"});
                $('textarea.limited').inputlimiter({
                    remText: '%n character%s remaining...',
                    limitText: 'max allowed : %n.'
                });
            
                $.mask.definitions['~']='[+-]';
                $('.input-mask-date').mask('99/99/9999');
                $('.input-mask-phone').mask('(999) 999-9999');
                $('.input-mask-eyescript').mask('~9.99 ~9.99 999');
                $(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
            
            
            
                $( "#input-size-slider" ).css('width','200px').slider({
                    value:1,
                    range: "min",
                    min: 1,
                    max: 8,
                    step: 1,
                    slide: function( event, ui ) {
                        var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
                        var val = parseInt(ui.value);
                        $('#form-field-4').attr('class', sizing[val]).val('.'+sizing[val]);
                    }
                });
            
                $( "#input-span-slider" ).slider({
                    value:1,
                    range: "min",
                    min: 1,
                    max: 12,
                    step: 1,
                    slide: function( event, ui ) {
                        var val = parseInt(ui.value);
                        $('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
                    }
                });
                
                
                $( "#slider-range" ).css('height','200px').slider({
                    orientation: "vertical",
                    range: true,
                    min: 0,
                    max: 100,
                    values: [ 17, 67 ],
                    slide: function( event, ui ) {
                        var val = ui.values[$(ui.handle).index()-1]+"";
            
                        if(! ui.handle.firstChild ) {
                            $(ui.handle).append("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>");
                        }
                        $(ui.handle.firstChild).show().children().eq(1).text(val);
                    }
                }).find('a').on('blur', function(){
                    $(this.firstChild).hide();
                });
                
                $( "#slider-range-max" ).slider({
                    range: "max",
                    min: 1,
                    max: 10,
                    value: 2
                });
                
                $( "#eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
                    // read initial values from markup and remove that
                    var value = parseInt( $( this ).text(), 10 );
                    $( this ).empty().slider({
                        value: value,
                        range: "min",
                        animate: true
                        
                    });
                });
            
                
                $('#id-input-file-1 , #id-input-file-2').ace_file_input({
                    no_file:'No File ...',
                    btn_choose:'Choose',
                    btn_change:'Change',
                    droppable:false,
                    onchange:null,
                    thumbnail:false //| true | large
                    //whitelist:'gif|png|jpg|jpeg'
                    //blacklist:'exe|php'
                    //onchange:''
                    //
                });
                
                $('#id-input-file-3').ace_file_input({
                    style:'well',
                    btn_choose:'Drop files here or click to choose',
                    btn_change:null,
                    no_icon:'icon-cloud-upload',
                    droppable:true,
                    thumbnail:'small'//large | fit
                    //,icon_remove:null//set null, to hide remove/reset button
                    /**,before_change:function(files, dropped) {
                        //Check an example below
                        //or examples/file-upload.html
                        return true;
                    }*/
                    /**,before_remove : function() {
                        return true;
                    }*/
                    ,
                    preview_error : function(filename, error_code) {
                        //name of the file that failed
                        //error_code values
                        //1 = 'FILE_LOAD_FAILED',
                        //2 = 'IMAGE_LOAD_FAILED',
                        //3 = 'THUMBNAIL_FAILED'
                        //alert(error_code);
                    }
            
                }).on('change', function(){
                    //console.log($(this).data('ace_input_files'));
                    //console.log($(this).data('ace_input_method'));
                });
                
            
                //dynamically change allowed formats by changing before_change callback function
                $('#id-file-format').removeAttr('checked').on('change', function() {
                    var before_change
                    var btn_choose
                    var no_icon
                    if(this.checked) {
                        btn_choose = "Drop images here or click to choose";
                        no_icon = "icon-picture";
                        before_change = function(files, dropped) {
                            var allowed_files = [];
                            for(var i = 0 ; i < files.length; i++) {
                                var file = files[i];
                                if(typeof file === "string") {
                                    //IE8 and browsers that don't support File Object
                                    if(! (/\.(jpe?g|png|gif|bmp)$/i).test(file) ) return false;
                                }
                                else {
                                    var type = $.trim(file.type);
                                    if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif|bmp)$/i).test(type) )
                                            || ( type.length == 0 && ! (/\.(jpe?g|png|gif|bmp)$/i).test(file.name) )//for android's default browser which gives an empty string for file.type
                                        ) continue;//not an image so don't keep this file
                                }
                                
                                allowed_files.push(file);
                            }
                            if(allowed_files.length == 0) return false;
            
                            return allowed_files;
                        }
                    }
                    else {
                        btn_choose = "Drop files here or click to choose";
                        no_icon = "icon-cloud-upload";
                        before_change = function(files, dropped) {
                            return files;
                        }
                    }
                    var file_input = $('#id-input-file-3');
                    file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
                    file_input.ace_file_input('reset_input');
                });
            
            
            
            
                $('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
                .on('change', function(){
                    //alert(this.value)
                });
                $('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'icon-caret-up', icon_down:'icon-caret-down'});
                $('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'icon-plus smaller-75', icon_down:'icon-minus smaller-75', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
            
            
                
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
            
                
                $(".knob").knob();
                
                
                //we could just set the data-provide="tag" of the element inside HTML, but IE8 fails!
                var tag_input = $('#form-field-tags');
                if(! ( /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase())) )
                {
                    tag_input.tag(
                      {
                        placeholder:tag_input.attr('placeholder'),
                        //enable typeahead by specifying the source array
                        source: ace.variable_US_STATES,//defined in ace.js >> ace.enable_search_ahead
                      }
                    );
                }
                else {
                    //display a textarea for old IE, because it doesn't support this plugin or another one I tried!
                    tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
                    //$('#form-field-tags').autosize({append: "\n"});
                }
                
                
                
            
                /////////
                $('#modal-form input[type=file]').ace_file_input({
                    style:'well',
                    btn_choose:'Drop files here or click to choose',
                    btn_change:null,
                    no_icon:'icon-cloud-upload',
                    droppable:true,
                    thumbnail:'large'
                })
                
                //chosen plugin inside a modal will have a zero width because the select element is originally hidden
                //and its width cannot be determined.
                //so we set the width after modal is show
                $('#modal-form').on('shown.bs.modal', function () {
                    $(this).find('.chosen-container').each(function(){
                        $(this).find('a:first-child').css('width' , '210px');
                        $(this).find('.chosen-drop').css('width' , '210px');
                        $(this).find('.chosen-search input').css('width' , '200px');
                    });
                })
                /**
                //or you can activate the chosen plugin after modal is shown
                //this way select element becomes visible with dimensions and chosen works as expected
                $('#modal-form').on('shown', function () {
                    $(this).find('.modal-chosen').chosen();
                })
                */
            
            });
        </script>
        <script type="text/javascript">

        // 解决谷歌浏览器弹出对话框的日期文本弹出不显示问题
        $(document).ready(function() {
         

             $('#id-date-picker-3').click(function(event) {
                 $('.datepicker').css('z-index','9999');
               
             });
             $('#id-date-picker-4').click(function(event) {
                 $('.datepicker').css('z-index','9999');
               
             });
            
        });
            
            
        </script>