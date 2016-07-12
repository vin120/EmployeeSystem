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
<div id="t1" style="display: none"><?php echo $t1;?></div>
<div id="t2" style="display: none"><?php echo $t2;?></div>
<div class="tabbable1">
    <ul id="myTab"

        class="nav nav-tabs padding-12 tab-color-blue background-blue">
        <li class="<?php if($t1=='1') echo "active";?>"><a
            href="#table_1" data-toggle="tab"> <?php  echo  Yii::t ( 'vcos', '基本工资' );?> </a></li>
        <li class="<?php if($t1=='2') echo "active";?>"><a
            href="#table_2" data-toggle="tab">  <?php  echo  Yii::t ( 'vcos', '加班工资' );?></a></li>
        <li class="<?php if($t1=='3') echo "active";?>"><a
            href="#table_3" data-toggle="tab"> <?php  echo  Yii::t ( 'vcos', '社保公积金' );?> </a></li>
        <li class="<?php if($t1=='4') echo "active";?>"><a
            href="#table_4" data-toggle="tab">  <?php  echo  Yii::t ( 'vcos', '绩效工资' );?></a></li>
        <li class="<?php if($t1=='5') echo "active";?>"><a
            href="#table_5" data-toggle="tab"> <?php  echo  Yii::t ( 'vcos', '税收' );?> </a></li>
        <li class="<?php if($t1=='6') echo "active";?>"><a
            href="#table_6" data-toggle="tab">  <?php  echo  Yii::t ( 'vcos', '费用补贴' );?></a></li>
        <li class="<?php if($t1=='7') echo "active";?>"><a
            href="#table_7" data-toggle="tab">  <?php  echo  Yii::t ( 'vcos', '其他福利' );?></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane <?php if($t1=='1') echo "active";?>"
            id="table_1">
            <div class="tabbable">
                <ul
                    class="nav nav-tabs padding-12 tab-color-blue background-blue myTab4">
                    <li class="<?php if($t2=='1') echo "active";?>"><a
                        href="#table_1_1" data-toggle="tab"> <?php  echo  Yii::t ( 'vcos', '基本工资生成' );?> </a></li>
                    <li class="<?php if($t2=='2') echo "active";?>"><a
                        href="#table_1_2" data-toggle="tab"> <?php  echo  Yii::t ( 'vcos', '基本工资维护' );?> </a></li>
                    <li class="<?php if($t2=='3') echo "active";?>"><a
                        href="#table_1_3" data-toggle="tab"> <?php  echo  Yii::t ( 'vcos', '基本工资查询' );?> </a></li>
                </ul>
                <div class="tab-content">
                    <div
                        class="tab-pane <?php if($t2=='1') echo "active";?>"
                        id="table_1_1">
                        <div
                            style="border: 1px solid; width: 50%; margin-left: auto; margin-right: auto; border-radius: 10px ! important;">
                            <div style="border-bottom: 1px solid;">
                                <h3><?php  echo  Yii::t ( 'vcos', '基本工资生成' );?></h3>
                            </div>
                            <div>
                                <table id="sample-table-2"
                                    class="table table-striped table-bordered ">
                                    <tbody>
                                        <tr>
                                            <td
                                                style="text-align: right; line-height: 35px;"><label>
                                                    <?php  echo  Yii::t ( 'vcos', '选择年月：' );?></label></td>
                                            <td><label> <select
                                                    name="sample-table-2_length"
                                                    size="1"
                                                    aria-controls="sample-table-2">
                                                        <option>2015</option>
                                                        <option>2014</option>
                                                        <option>2013</option>
                                                        <option>2012</option>
                                                        <option>2011</option>
                                                </select><?php  echo  Yii::t ( 'vcos', '年' );?>
                                            </label> <label> <select
                                                    name="sample-table-2_length"
                                                    size="1"
                                                    aria-controls="sample-table-2">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                        <option>10</option>
                                                        <option>11</option>
                                                        <option>12</option>
                                                </select><?php  echo  Yii::t ( 'vcos', '月' );?>
                                            </label></td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="text-align: right; line-height: 35px;"><?php  echo  Yii::t ( 'vcos', '选择员工编码：' );?></td>
                                            <td><input placeholder=""
                                                id="form-field-1"
                                                name="Operator" value=""
                                                type="text"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div style="margin-bottom: 10px;"
                                class="center">
                                <button class="btn btn-primary"><?php  echo  Yii::t ( 'vcos', '生成' );?></button>
                            </div>
                            <div style="margin-left: 5%;">
                                <table id="sample-table-2"
                                    class="table table-striped table-bordered ">
                                    <tbody>
                                        <tr>
                                            <td><?php  echo  Yii::t ( 'vcos', '1、年月项为必填项；' );?></td>
                                        </tr>
                                        <tr>
                                            <td><?php  echo  Yii::t ( 'vcos', '2、员工编码为可选项；' );?></td>
                                        </tr>
                                        <tr>
                                            <td><?php  echo  Yii::t ( 'vcos', '3、重新生成工资将删除该月份（或指定员工）原有的记录，生成新的记录；' );?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tab-pane <?php if($t2=='2') echo "active";?> "
                        id="table_1_2">
                        <form method="post" action=""
                            class="search_form">
                            <div style="overflow: hidden;">
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1"><?php  echo  Yii::t ( 'vcos', '员工编码');?>
                                        </label> <input placeholder=""
                                        id="form-field-1"
                                        style="height: 34px; width: 190px;"
                                        name="employee_code"
                                        value="<?php echo $search_form['employee_code']?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        <?php  echo  Yii::t ( 'vcos', '姓名' );?> </label> <input
                                        placeholder="" id="form-field-1"
                                        style="height: 34px; width: 180px;"
                                        name="cn_name"
                                        value="<?php  echo  Yii::t ( 'vcos', $search_form['cn_name']);?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label><?php  echo  Yii::t ( 'vcos', '工资月份');?>  <select
                                        style="width: 150px; height: 34px;"
                                        name="date" size="1"
                                        aria-controls="sample-table-2">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['date'];?>"
                                                selected="selected"><?php echo $search_form['date'];?></option>
                                <?php																						foreach ( $salary_management as $value ) {
																																	?>
                                <option
                                                value="<?php echo  $value['date']?>"><?php echo  $value['date']?></option>
                                <?php																							}																						?>
                        </select> </label>
                                </div>
                            </div>
                            <div
                                style="overflow: hidden; margin-top: 20px;">
                                <div
                                    style="float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '部门 ');?> <select
                                        style="width: 200px; height: 34px; margin-left: 20px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="department_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['department_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['search_department_name']);?></option>

                    <?php													foreach ( $Alldepartment as $row ) {
																					?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php		}												?>

            </select> </label>
                                </div>
                                <div
                                    style="text-align: left; float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '职务' );?>  <select
                                        style="display: inline; width: 180px; height: 34px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="post_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['post_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['post_cn_name'] );?></option>
                               <?php																						foreach ( $post as $row ) {					
																																?>
                    <option value="<?php echo $row['post_id']?>"><?php echo  Yii::t ( 'vcos', $row['post_cn_name'] );?></option>
                    <?php		
                    }		
                    	?>
                        </select> </label>
                                </div>
                            </div>
                            <div
                                style="margin-top: 20px; margin-bottom: 20px;"
                                class="center">
                                <button 
                                    value="<?php echo  Yii::t ( 'vcos', '搜索' );?>"
                                    name="soso"
                                    class="btn btn-purple search "
                                    type="submit">
                                    <?php  echo  Yii::t ( 'vcos', '搜索' );?> <i
                                        class="icon-search  bigger-110">
                                    </i>
                                </button>
                                &nbsp; &nbsp; &nbsp;
                                <button
                                    value="<?php echo  Yii::t ( 'vcos', '清空' );?>"
                                    type="button" class="btn reset">
                                    <i class="icon-undo bigger-110"> </i>
                                    <?php  echo  Yii::t ( 'vcos', '清空' );?>
                                </button>
                            </div>
                        </form>
                        <form action="" method="post" class="form2">
                            <div id="table_middle_1"
                                class="tab-pane active"
                                style="margin-top: 10px;">
                                <div class="table-responsive">
                                    <table
                                        class="table table-striped table-bordered table-hover"
                                        id="sample-table-1">
                                        <thead>
                                            <tr>
                                                <th class="center"><label>
                                                        <input
                                                        class="ace checkALL"
                                                        type="checkbox">
                                                        <span
                                                        class="lbl"></span>
                                                </label></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '序号' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '工资月份' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '部门' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '>职务' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '员工编码' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '基本工资' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '技能补贴' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '金额合计' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '操作' );?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
								       <?php									
								       		$i = 0;														
								       		foreach ( $salary_management as $row ) {																							
								       			$i ++;													
								       	?>
                                        	<tr>
                                                <td class="center"><label>
                                                        <input
                                                        class="ace checkbox_button"
                                                        name="ids[]"
                                                        value="1"
                                                        type="checkbox">
                                                        <span
                                                        class="lbl"></span>
                                                </label></td>
                                                <td> <?php echo $i;?></td>
                                                <td><?php echo $row['date'];?></td>
                                                <td><?php echo $row['newdepartmentname'];?></td>
                                                <td><?php echo $row['post_cn_name'];?></td>
                                                <td><?php echo $row['employee_code'];?></td>
                                                <td><?php echo $row['cn_name'];?></td>
                                                <td><?php echo $row['base_salary'];?></td>
                                                <td><?php echo $row['skill_allowance'];?></td>
                                                <td><?php echo $row['moneycount'];?></td>
                                                <td>
                                                    <div
                                                        class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                        <a
                                                            href="#modal-form"
                                                            data-toggle="modal"
                                                            class="change"
                                                            id="<?php echo $row['id'];?>"
                                                            title="<?php  echo  Yii::t ( 'vcos', '编辑' );?>">
                                                            <button
                                                                type="button"
                                                                class="btn btn-xs btn-info"
                                                                role="button">
                                                                <i
                                                                    class="icon-edit bigger-120"></i>
                                                            </button>
                                                        </a> <a href="#"
                                                            class="delete"
                                                            id="<?php echo $row['id'];?>"
                                                            title="<?php  echo  Yii::t ( 'vcos', '删除' );?>">
                                                            <button
                                                                class="btn btn-xs btn-warning">
                                                                <i
                                                                    class="icon-trash bigger-120"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php										}										?>
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
                                    <div
                                        style="text-align: center; margin-top: 100px;">
                                        <button
                                            style="width: 85px; height: 42px;"
                                            class="btn btn-xs btn-warning  Batch_delete_records ">
                                            <i
                                                class="icon-trash bigger-125"></i>
                                            <span
                                                class="bigger-110 no-text-shadow"><?php  echo  Yii::t ( 'vcos', '删除选中' );?></span>
                                        </button>
                                        <a href="#modal-form1"
                                            data-toggle="modal">
                                            <button class="btn btn-info"
                                                type="button">
                                                <i
                                                    class="icon-ok bigger-110"></i>//
                                                <?php  echo  Yii::t ( 'vcos', '新增' );?>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div
                        class="tab-pane <?php if($t2=='3') echo "active";?> "
                        id="table_1_3">
                        <form method="post" action=""
                            class="search_form">
                            <div style="overflow: hidden;">
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        <?php  echo  Yii::t ( 'vcos', '员工编码' );?></label> <input
                                        placeholder="" id="form-field-1"
                                        style="height: 34px; width: 190px;"
                                        name="employee_code"
                                        value="<?php echo $search_form['employee_code']?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        <?php  echo  Yii::t ( 'vcos', '姓名' );?> </label> <input
                                        placeholder="" id="form-field-1"
                                        style="height: 34px; width: 180px;"
                                        name="cn_name"
                                        value="<?php echo $search_form['cn_name']?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label>  <?php  echo  Yii::t ( 'vcos', '工资月份' );?><select
                                        style="width: 150px; height: 34px;"
                                        name="date" size="1"
                                        aria-controls="sample-table-2">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['date'];?>"
                                                selected="selected"><?php echo $search_form['date'];?></option>
                                <?php																							foreach ( $salary_management as $value ) {
																																	?>
                                <option
                                                value="<?php echo  $value['date']?>"><?php echo  $value['date']?></option>
                                <?php																							}																					?>
                        </select>
                                    </label>
                                </div>
                            </div>
                            <div
                                style="overflow: hidden; margin-top: 20px;">
                                <div
                                    style="float: left; margin-left: 10%;">
                                    <label style=""> <?php  echo  Yii::t ( 'vcos', '部门' );?> <select
                                        style="width: 200px; height: 34px; margin-left: 20px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="department_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['department_id']?>"
                                                selected="selected"><?php echo $search_form['search_department_name']?></option>

                    <?php													foreach ( $Alldepartment as $row ) {
																					
																					?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php															}													?>

            </select>
                                    </label>
                                </div>
                                <div
                                    style="text-align: left; float: left; margin-left: 10%;">
                                    <label style=""> <?php  echo  Yii::t ( 'vcos', '新增' );?> <select
                                        style="display: inline; width: 180px; height: 34px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="post_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['post_id']?>"
                                                selected="selected"><?php echo $search_form['post_cn_name'];?></option>
                               <?php																						foreach ( $post as $row ) {
																																
																																?>
                    <option value="<?php echo $row['post_id']?>"><?php echo  Yii::t ( 'vcos', $row['post_cn_name'] );?></option>
                    <?php
																															}
																															?>
                        </select>
                                    </label>
                                </div>
                            </div>
                            <div
                                style="margin-top: 20px; margin-bottom: 20px;">
                                <button style="margin-left: 20%;"
                                    value="搜索" name="soso"
                                    class="btn btn-purple search "
                                    type="submit">
                                    <?php  echo  Yii::t ( 'vcos', '搜索' );?> <i
                                        class="icon-search  bigger-110">
                                    </i>
                                </button>
                                <button value="清空" type="button"
                                    style="margin-left: 10%;"
                                    class="btn reset">
                                    <i class="icon-undo bigger-110"> </i>
                                    <?php  echo  Yii::t ( 'vcos', '清空' );?>
                                </button>
                                <button class="btn btn-info export"
                                    style="margin-left: 10%;"
                                    type="button">
                                    <i class="icon-ok bigger-110"></i>
                                    <?php  echo  Yii::t ( 'vcos', '导出' );?>
                                </button>
                            </div>
                        </form>
                        <form action="" method="post" class="form2">
                            <div id="table_middle_1"
                                class="tab-pane active"
                                style="margin-top: 10px;">
                                <div class="table-responsive">
                                    <table
                                        class="table table-striped table-bordered table-hover"
                                        id="sample-table-1">
                                        <thead>
                                            <tr>
                                                <th><?php  echo  Yii::t ( 'vcos', '序号' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '工资月份' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '部门' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '职务' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '员工编码' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '基本工资' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '技能补贴' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '金额合计' );?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php	
                                    $i = 0;	
                                  foreach ( $salary_management as $row ) {		$i ++;	
                                  	?>
                                        <tr>
                                                <td> <?php echo $i;?></td>
                                                <td><?php echo $row['date'];?></td>
                                                <td><?php echo $row['newdepartmentname'];?></td>
                                                <td><?php echo $row['post_cn_name'];?></td>
                                                <td><?php echo $row['employee_code'];?></td>
                                                <td><?php echo $row['cn_name'];?></td>
                                                <td><?php echo $row['base_salary'];?></td>
                                                <td><?php echo $row['skill_allowance'];?></td>
                                                <td><?php echo $row['moneycount'];?></td>
                                            </tr>
                                        <?php																		}															?>
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
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane <?php if($t1=='2') echo "active";?> "
            id="table_2">
            <div class="tabbable">
                <ul
                    class="nav nav-tabs padding-12 tab-color-blue background-blue myTab4">
                    <li class="<?php if($t2=='1') echo "active";?>"><a
                        href="#table_2_1" data-toggle="tab"><?php  echo  Yii::t ( 'vcos', '加班明细导入 ' );?> </a></li>
                    <li class="<?php if($t2=='2') echo "active";?>"><a
                        href="#table_2_2" data-toggle="tab"> <?php  echo  Yii::t ( 'vcos', '加班明细维护' );?> </a></li>
                    <li class="<?php if($t2=='3') echo "active";?>"><a
                        href="#table_2_3" data-toggle="tab"> <?php  echo  Yii::t ( 'vcos', '加班明细查询' );?> </a></li>
                </ul>
                <div class="tab-content">
                    <div
                        class="tab-pane <?php if($t2=='1') echo "active";?>"
                        id="table_2_1">
                        <form id="import1" method="post"
                            enctype="multipart/form-data">
                            <div
                                style="width: 50%; height: 400px; border-color: blue; border-radius: 10px 10px 10px 10px; border: 1px solid; margin: 0 auto;">
                                <h2><?php  echo  Yii::t ( 'vcos', '请选择导入文件' );?></h2>
                                <div
                                    style="width: 100%; margin: 0 auto; text-align: center; overflow: hidden; margin-top: 20px;">
                                    <input style="margin: 0 auto;"
                                        type="file" name="myFile"
                                        id="table_2_1_import"
                                        class="id-input-file-3" />
                                </div>
                                <div
                                    style="text-align: center; margin-top: 60px;">
                                    <button
                                        class="btn btn-primary  daoru1">
                                        <i class="icon-ok bigger-110"></i><?php  echo  Yii::t ( 'vcos', '导入' );?>
                                    </button>
                                </div>
                                <div
                                    style="width: 100%; overflow: hidden;"></div>
                                <div
                                    style="overflow: hidden; width: 100%; margin-top: 40px; font-size: 16px;">
                                    <div
                                        style="width: 50%; text-align: left; margin-left: 35%;">
                                        <strong><?php  echo  Yii::t ( 'vcos', '模板下载' );?>:</strong>
                                    </div>
                                    <div
                                        style="width: 50%; text-align: left; margin-left: 40%;">
                                        <a
                                            href="../../../download/加班工资表.xlsx"
                                            style="cursor: pointer;"><?php  echo  Yii::t ( 'vcos', '加班工资表' );?>.xlsx</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div
                        class="tab-pane <?php if($t2=='2') echo "active";?>"
                        id="table_2_2">


                        <!-- 'id' => string '3' (length=1) -->
                            <!-- 'employee_code' => string '1' (length=1)  员工编号 -->
                               <!-- 'day_times' => string '1' (length=1)   日班次数 -->
                            <!-- 'night_times' => string '1' (length=1)      夜班次数 -->
                               <!-- 'remark' => null   员工加班工资备注 -->
                                <!-- 'date' => string '2015-07' (length=7)   月份 -->
                              <!-- 'status' => string '0' (length=1)   0系统生成 -->
                         <!-- 'department_id' => string '2' (length=1) -->
                              <!-- 'post_id' => string '1' (length=1) -->
                       <!-- 'post_cn_name' => string '大幅' (length=6) 职务名称 -->
                         <!-- 'cn_name' => string '我是谁' (length=9)  姓名 -->
                             <!-- 'day_salary' => string '100' (length=3)   日班加班工资 -->
                          <!-- 'night_salary' => string '200' (length=3)   夜班加班工资 -->
                          <!-- 'jiabanheji' => string '300' (length=3)        加班工资合计 -->
                                  <!-- 'newdepartmentname' => string '泰山号-自由女神号' (length=25)  部门名称 -->




                     <form method="post" action=""  class="search_form">
                          <div style="overflow: hidden;">
                           <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1"><?php  echo  Yii::t ( 'vcos', '员工编码');?>
                                        </label> <input placeholder=""
                                        id="form-field-1"
                                        style="height: 34px; width: 190px;"
                                        name="employee_code"
                                        value="<?php echo $search_form['employee_code']?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        <?php  echo  Yii::t ( 'vcos', '姓名' );?> </label> <input
                                        placeholder="" id="form-field-1"
                                        style="height: 34px; width: 180px;"
                                        name="cn_name"
                                        value="<?php  echo  Yii::t ( 'vcos', $search_form['cn_name']);?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label><?php  echo  Yii::t ( 'vcos', '工资月份');?>  <select
                                        style="width: 150px; height: 34px;"
                                        name="date" size="1"
                                        aria-controls="sample-table-2">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['date'];?>"
                                                selected="selected"><?php echo $search_form['date'];?></option>
                                <?php		
                                foreach ( $overtime_management as $value )
                                 {		
                                 ?>
                                <option
                                                value="<?php echo  $value['date']?>"><?php echo  $value['date']?></option>
                                <?php	


                                		}
                    			?>
                                  </select> </label>
                                  </div>
                                  </div>
                        <div
                                style="overflow: hidden; margin-top: 20px;">
                                <div
                                    style="float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '部门 ');?> <select
                                        style="width: 200px; height: 34px; margin-left: 20px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="department_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['department_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['search_department_name']);?></option>

                    <?php	
                    	foreach ( $Alldepartment as $row ) {
                    ?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php		
                    	}	
                        	?>

            </select> </label>
                                </div>
                                <div
                                    style="text-align: left; float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '职务' );?>  <select
                                        style="display: inline; width: 180px; height: 34px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="post_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['post_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['post_cn_name'] );?></option>
                               <?php				

                                foreach ( $post as $row ) {
                               ?>
                    <option value="<?php echo $row['post_id']?>"><?php echo  Yii::t ( 'vcos', $row['post_cn_name'] );?></option>
                    <?php	
                    		}	
                         ?>
                        </select> </label>
                                </div>
                            </div>
                            <div
                                style="margin-top: 20px; margin-bottom: 20px;"
                                class="center">
                                <button 
                                    value="<?php echo  Yii::t ( 'vcos', '搜索' );?>"
                                    name="soso"
                                    class="btn btn-purple search "
                                    type="submit">
                                    <?php  echo  Yii::t ( 'vcos', '搜索' );?> <i
                                        class="icon-search  bigger-110">
                                    </i>
                                </button>
                                &nbsp; &nbsp; &nbsp;
                                <button
                                    value="<?php echo  Yii::t ( 'vcos', '清空' );?>"
                                    type="button" class="btn reset">
                                    <i class="icon-undo bigger-110"> </i>
                                    <?php  echo  Yii::t ( 'vcos', '清空' );?>
                                </button>
                            </div>
                        </form>
                        <form action="" method="post" class="form2">
                            <div id="table_middle_1"
                                class="tab-pane active"
                                style="margin-top: 10px;">
                                <div class="table-responsive">
                                    <table
                                        class="table table-striped table-bordered table-hover"
                                        id="table2_table_2_2">
                                        <thead>
                                            <tr>
                                                <th class="center"><label>
                                                        <input
                                                        class="ace checkALL"
                                                        type="checkbox">
                                                        <span
                                                        class="lbl"></span>
                                                </label></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '序号' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '工资月份' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '部门' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '职务' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '员工编码' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '日班班数' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '日班工资' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '夜班班数' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '夜班工资' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '金额合计' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '操作' );?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
		
	
                                	$i = 0;
 							foreach ( $overtime_management as $row ) {
								$i ++;	

						          ?>
                                        <tr>
                                                <td class="center"><label>
                                                        <input
                                                        class="ace checkbox_button"
                                                        name="ids[]"
                                                        value="<?php echo $row['id'];?>"
                                                        type="checkbox">
                                                        <span
                                                        class="lbl"></span>
                                                </label></td>



                                  <td class="department_id" style="display: none;"><?php echo $row['department_id'];?></td>
                                  <td class="post_id" style="display: none;"><?php echo $row['post_id'];?></td>



                                                <td> <?php echo $i;?></td>
                                                <td class="date"><?php echo $row['date'];?></td>
                                                <td class="department_name"><?php echo $row['newdepartmentname'];?></td>
                                                <td class="post_cn_name"><?php echo $row['post_cn_name'];?></td>
                                                <td class="employee_code"><?php echo $row['employee_code'];?></td>
                                                <td class="cn_name"><?php echo $row['cn_name'];?></td>
                                                <td class="day_times"><?php echo $row['day_times'];?></td>
                                                <td class="day_salary"><?php echo $row['day_salary'];?></td>
                                                <td class="night_times"><?php echo $row['night_times'];?></td>
                                                <td class="night_salary"><?php echo $row['night_salary'];?></td>
                                                <td class="jiabanheji"><?php echo $row['jiabanheji'];?></td>
                                                <td class="remark" style="display: none;"><?php echo $row['remark'];?></td>
                                                <td style="display: none;"><?php echo $row['status'];?></td>
                                                <td>
                                                    <div
                                                        class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                        <a
                                                            href="#modal_table_2_form1"
                                                            data-toggle="modal"
                                                            class="change"
                                                            id="<?php echo $row['id'];?>"
                                                            title="<?php  echo  Yii::t ( 'vcos', '编辑' );?>">
                                                            <button
                                                                type="button"
                                                                class="btn btn-xs btn-info"
                                                                role="button">
                                                                <i
                                                                    class="icon-edit bigger-120"></i>
                                                            </button>
                                                 </a> <a href="#"
                                                            class="delete"
                                                            id="<?php echo $row['id'];?>"
                                                            title="<?php  echo  Yii::t ( 'vcos', '删除' );?>">
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
                                    <div
                                        style="text-align: center; margin-top: 100px;">
                                        <button
                                            style="width: 85px; height: 42px;"
                                            class="btn btn-xs btn-warning  Batch_delete_records ">
                                            <i
                                                class="icon-trash bigger-125"></i>
                                            <span
                                                class="bigger-110 no-text-shadow"><?php  echo  Yii::t ( 'vcos', '删除选中' );?></span>
                                        </button>
                                        <a href="#modal_table_2_form2"
                                            data-toggle="modal">
                                            <button class="btn btn-info"
                                                type="button">
                                                <i
                                                    class="icon-ok bigger-110"></i>
                                                <?php  echo  Yii::t ( 'vcos', '新增' );?>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div
                        class="tab-pane <?php if($t2=='3') echo "active";?> "
                        id="table_2_3">
                        <div style="">
                         <form method="post" action=""  class="search_form">
                                            <div style="overflow: hidden;">
                                            <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1"><?php  echo  Yii::t ( 'vcos', '员工编码');?>
                                        </label> <input placeholder=""
                                        id="form-field-1"
                                        style="height: 34px; width: 190px;"
                                        name="employee_code"
                                        value="<?php echo $search_form['employee_code']?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                         <?php  echo  Yii::t ( 'vcos', '姓名' );?> </label> <input
                                        placeholder="" id="form-field-1"
                                        style="height: 34px; width: 180px;"
                                        name="cn_name"
                                        value="<?php  echo  Yii::t ( 'vcos', $search_form['cn_name']);?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label><?php  echo  Yii::t ( 'vcos', '工资月份');?>  <select
                                        style="width: 150px; height: 34px;"
                                        name="date" size="1"
                                        aria-controls="sample-table-2">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['date'];?>"
                                                selected="selected"><?php echo $search_form['date'];?></option>
                                <?php       
                                foreach ( $overtime_management as $value )
                                 {      
                                 ?>
                                <option
                                                value="<?php echo  $value['date']?>"><?php echo  $value['date']?></option>
                                <?php   


                                        }
                                ?>
                                  </select> </label>
                                  </div>
                                  </div>
                             <div
                                style="overflow: hidden; margin-top: 20px;">
                                <div
                                    style="float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '部门 ');?> <select
                                        style="width: 200px; height: 34px; margin-left: 20px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="department_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['department_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['search_department_name']);?></option>

                    <?php   
                        foreach ( $Alldepartment as $row ) {
                    ?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php
                                                                                }
                                                                                
                                                                                ?>

            </select> </label>
                                </div>
                                <div
                                    style="text-align: left; float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '职务' );?>  <select
                                        style="display: inline; width: 180px; height: 34px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="post_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['post_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['post_cn_name'] );?></option>
                               <?php                

                                foreach ( $post as $row ) {
                               ?>
                    <option value="<?php echo $row['post_id']?>"><?php echo  Yii::t ( 'vcos', $row['post_cn_name'] );?></option>
                    <?php   
                            }   
                         ?>
                        </select> </label>
                                </div>
                            </div>
                               <div
                                style="margin-top: 20px; margin-bottom: 20px;">
                                <button style="margin-left: 20%;"
                                    value="搜索" name="soso"
                                    class="btn btn-purple search "
                                    type="submit">
                                    搜索 <?php  echo  Yii::t ( 'vcos', '姓名' );?><i
                                        class="icon-search  bigger-110">
                                    </i>
                                </button>
                                <button value="清空" type="button"
                                    style="margin-left: 10%;"
                                    class="btn reset">
                                    <i class="icon-undo bigger-110"> </i>
                                    清空<?php  echo  Yii::t ( 'vcos', '姓名' );?>
                                </button>
                                <button class="btn btn-info export"
                                    style="margin-left: 10%;"
                                    type="button">
                                    <i class="icon-ok bigger-110"></i>
                                    导出<?php  echo  Yii::t ( 'vcos', '姓名' );?>
                                </button>
                            </div>
                        </form>


                        <form action="" method="post" class="form2">
                            <div id="table_middle_1"
                                class="tab-pane active"
                                style="margin-top: 10px;">
                                <div class="table-responsive">
                                    <table
                                        class="table table-striped table-bordered table-hover"
                                        id="sample-table-1">
                                        <thead>
                                            <tr>
                                                
                                                <th>序号<?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                                <th>工资月份<?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                                <th>部门<?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                                <th>职务<?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                                <th>员工编码<?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                                <th>姓名<?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                                <th>日班班数<?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                                <th>日班工资<?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                                <th>夜班班数<?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                                <th>夜班工资<?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                                <th>金额合计<?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
        
    
                                    $i = 0;
                            foreach ( $overtime_management as $row ) {
                                $i ++;  

                                  ?>
                                        <tr>
                                                
                                                <td> <?php echo $i;?></td>
                                                <td><?php echo $row['date'];?></td>
                                                <td><?php echo $row['newdepartmentname'];?></td>
                                                <td><?php echo $row['post_cn_name'];?></td>
                                                <td><?php echo $row['employee_code'];?></td>
                                                <td><?php echo $row['cn_name'];?></td>
                                                <td><?php echo $row['day_times'];?></td>
                                                <td><?php echo $row['day_salary'];?></td>
                                                <td><?php echo $row['night_times'];?></td>
                                                <td><?php echo $row['night_salary'];?></td>
                                                <td><?php echo $row['jiabanheji'];?></td>
                                                <td style="display: none;"><?php echo $row['remark'];?></td>
                                                <td style="display: none;"><?php echo $row['status'];?></td>
                                                
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
                                    
                                </div>
                            </div>
                        </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane <?php if($t1=='3') echo "active";?> "
            id="table_3">
            <div class="tabbable">
                <ul
                    class="nav nav-tabs padding-12 tab-color-blue background-blue myTab4">
                    <li class="<?php if($t2=='1') echo "active";?>"><a
                        href="#table_3_1" data-toggle="tab"> <?php  echo  Yii::t ( 'vcos', '社保公积金生成' );?> </a></li>
                    <li class="<?php if($t2=='2') echo "active";?>"><a
                        href="#table_3_2" data-toggle="tab"> <?php  echo  Yii::t ( 'vcos', '社保公积金维护' );?> </a></li>
                    <li class="<?php if($t2=='3') echo "active";?>"><a
                        href="#table_3_3" data-toggle="tab"> <?php  echo  Yii::t ( 'vcos', '社保公积金查询' );?> </a></li>
                </ul>
                <div class="tab-content">
                    <div
                        class="tab-pane <?php if($t2=='1') echo "active";?> "
                        id="table_3_1">
                        <div
                            style="border: 1px solid; width: 50%; margin-left: auto; margin-right: auto; border-radius: 10px ! important;">
                            <div style="border-bottom: 1px solid;">
                                <h3><?php  echo  Yii::t ( 'vcos', '社保公积金生成' );?></h3>
                            </div>
                            <div>
                                <table id="sample-table-2"
                                    class="table table-striped table-bordered ">
                                    <tbody>
                                        <tr>
                                            <td
                                                style="text-align: right; line-height: 35px;"><label>
                                                    <?php  echo  Yii::t ( 'vcos', '选择年月：' );?></label></td>
                                            <td><label> <select
                                                    name="sample-table-2_length"
                                                    size="1"
                                                    aria-controls="sample-table-2">
                                                        <option>2015</option>
                                                        <option>2014</option>
                                                        <option>2013</option>
                                                        <option>2012</option>
                                                        <option>2011</option>
                                                </select><?php  echo  Yii::t ( 'vcos', '年' );?>
                                            </label> <label> <select
                                                    name="sample-table-2_length"
                                                    size="1"
                                                    aria-controls="sample-table-2">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                        <option>10</option>
                                                        <option>11</option>
                                                        <option>12</option>
                                                </select><?php  echo  Yii::t ( 'vcos', '月' );?>
                                            </label></td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="text-align: right; line-height: 35px;"><?php  echo  Yii::t ( 'vcos', '选择员工编码：' );?></td>
                                            <td><input placeholder=""
                                                id="form-field-1"
                                                name="Operator" value=""
                                                type="text"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div style="margin-bottom: 10px;"
                                class="center">
                                <button class="btn btn-primary"><?php  echo  Yii::t ( 'vcos', '生成' );?></button>
                            </div>
                            <div style="margin-left: 5%;">
                                <table id="sample-table-2"
                                    class="table table-striped table-bordered ">
                                    <tbody>
                                        <tr>
                                            <td><?php  echo  Yii::t ( 'vcos', '1、年月项为必填项；' );?></td>
                                        </tr>
                                        <tr>
                                            <td><?php  echo  Yii::t ( 'vcos', '2、员工编码为可选项；' );?></td>
                                        </tr>
                                        <tr>
                                            <td><?php  echo  Yii::t ( 'vcos', '3、重新生成工资将删除该月份（或指定员工）原有的记录，生成新的记录；' );?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tab-pane <?php if($t2=='2') echo "active";?> "
                        id="table_3_2">
                        

                     <form method="post" action=""  class="search_form">
                          <div style="overflow: hidden;">
                           <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1"><?php  echo  Yii::t ( 'vcos', '员工编码');?>
                                        </label> <input placeholder=""
                                        id="form-field-1"
                                        style="height: 34px; width: 190px;"
                                        name="employee_code"
                                        value="<?php echo $search_form['employee_code']?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        姓名<?php  echo  Yii::t ( 'vcos', '姓名' );?> </label> <input
                                        placeholder="" id="form-field-1"
                                        style="height: 34px; width: 180px;"
                                        name="cn_name"
                                        value="<?php  echo  Yii::t ( 'vcos', $search_form['cn_name']);?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label><?php  echo  Yii::t ( 'vcos', '工资月份');?>  <select
                                        style="width: 150px; height: 34px;"
                                        name="date" size="1"
                                        aria-controls="sample-table-2">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['date'];?>"
                                                selected="selected"><?php echo $search_form['date'];?></option>
                                <?php       
                                foreach ( $fund_management as $value )
                                 {      
                                 ?>
                                <option
                                                value="<?php echo  $value['date']?>"><?php echo  $value['date']?></option>
                                <?php   


                                        }
                                ?>
                                  </select> </label>
                                  </div>
                                  </div>
                        <div
                                style="overflow: hidden; margin-top: 20px;">
                                <div
                                    style="float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '部门 ');?> <select
                                        style="width: 200px; height: 34px; margin-left: 20px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="department_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['department_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['search_department_name']);?></option>

                    <?php   
                        foreach ( $Alldepartment as $row ) {
                    ?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php               }                                       ?>

            </select> </label>
                                </div>
                                <div
                                    style="text-align: left; float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '职务' );?>  <select
                                        style="display: inline; width: 180px; height: 34px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="post_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['post_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['post_cn_name'] );?></option>
                               <?php                

                                foreach ( $post as $row ) {
                               ?>
                    <option value="<?php echo $row['post_id']?>"><?php echo  Yii::t ( 'vcos', $row['post_cn_name'] );?></option>
                    <?php   
                            }   
                         ?>
                        </select> </label>
                                </div>
                            </div>
                            <div
                                style="margin-top: 20px; margin-bottom: 20px;"
                                class="center">
                                <button 
                                    value="<?php echo  Yii::t ( 'vcos', '搜索' );?>"
                                    name="soso"
                                    class="btn btn-purple search "
                                    type="submit">
                                    搜索<?php  echo  Yii::t ( 'vcos', '姓名' );?> <i
                                        class="icon-search  bigger-110">
                                    </i>
                                </button>
                                &nbsp; &nbsp; &nbsp;
                                <button
                                    value="<?php echo  Yii::t ( 'vcos', '清空' );?>"
                                    type="button" class="btn reset">
                                    <i class="icon-undo bigger-110"> </i>
                                    清空<?php  echo  Yii::t ( 'vcos', '姓名' );?>
                                </button>
                            </div>
                        </form>
                        <form action="" method="post" class="form2">
                            <div id="table_middle_1"
                                class="tab-pane active"
                                style="margin-top: 10px;">
                                <div class="table-responsive">
                                    <table
                                        class="table table-striped table-bordered table-hover"
                                        id="sample-table-1">
                                        <thead>
                                            <tr>
                                                <th class="center"><label>
                                                        <input
                                                        class="ace checkALL"
                                                        type="checkbox">
                                                        <span
                                                        class="lbl"></span>
                                                </label></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '序号' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '工资月份' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '部门' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '职务' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '员工编码' );?></th>
                                               
                                                
                                                <th><?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '日班班数' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '日班工资' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '夜班班数' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '夜班工资' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '金额合计' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '操作' );?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
        
    
                                    $i = 0;
                                
                            foreach ( $overtime_management as $row ) {
                                $i ++;  
                             


                                  ?>
                                        <tr>
                                                <td class="center"><label>
                                                        <input
                                                        class="ace checkbox_button"
                                                        name="ids[]"
                                                        value="<?php echo $row['id'];?>"
                                                        type="checkbox">
                                                        <span
                                                        class="lbl"></span>
                                                </label></td>
                                                <td> <?php echo $i;?></td>
                                                <td><?php echo $row['date'];?></td>
                                                <td><?php echo $row['newdepartmentname'];?></td>
                                                <td><?php echo $row['post_cn_name'];?></td>
                                                <td><?php echo $row['employee_code'];?></td>
                                                <td><?php echo $row['cn_name'];?></td>
                                                <td><?php echo $row['day_times'];?></td>
                                                <td><?php echo $row['day_salary'];?></td>
                                                <td><?php echo $row['night_times'];?></td>
                                                <td><?php echo $row['night_salary'];?></td>
                                                <td><?php echo $row['jiabanheji'];?></td>
                                                <td style="display: none;"><?php echo $row['remark'];?></td>
                                                <td style="display: none;"><?php echo $row['status'];?></td>
                                                <td>
                                                    <div
                                                        class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                        <a
                                                            href="#modal-form"
                                                            data-toggle="modal"
                                                            class="change"
                                                            id="<?php echo $row['id'];?>"
                                                            title="<?php  echo  Yii::t ( 'vcos', '编辑' );?>">
                                                            <button
                                                                type="button"
                                                                class="btn btn-xs btn-info"
                                                                role="button">
                                                                <i
                                                                    class="icon-edit bigger-120"></i>
                                                            </button>
                                                        </a> <a href="#"
                                                            class="delete"
                                                            id="<?php echo $row['id'];?>"
                                                            title="<?php  echo  Yii::t ( 'vcos', '删除' );?>">
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
                                    <div
                                        style="text-align: center; margin-top: 100px;">
                                        <button
                                            style="width: 85px; height: 42px;"
                                            class="btn btn-xs btn-warning  Batch_delete_records ">
                                            <i
                                                class="icon-trash bigger-125"></i>
                                            <span
                                                class="bigger-110 no-text-shadow"><?php  echo  Yii::t ( 'vcos', '删除选中' );?></span>
                                        </button>
                                        <a href="#modal-form1"
                                            data-toggle="modal">
                                            <button class="btn btn-info"
                                                type="button">
                                                <i
                                                    class="icon-ok bigger-110"></i>
                                                <?php  echo  Yii::t ( 'vcos', '新增' );?>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                    <div
                        class="tab-pane <?php if($t2=='3') echo "active";?>  "
                        id="table_3_3">
                       <form method="post" action=""  class="search_form">
                                            <div style="overflow: hidden;">
                                            <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1"><?php  echo  Yii::t ( 'vcos', '员工编码');?>
                                        </label> <input placeholder=""
                                        id="form-field-1"
                                        style="height: 34px; width: 190px;"
                                        name="employee_code"
                                        value="<?php echo $search_form['employee_code']?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        <?php  echo  Yii::t ( 'vcos', '姓名' );?> </label> <input
                                        placeholder="" id="form-field-1"
                                        style="height: 34px; width: 180px;"
                                        name="cn_name"
                                        value="<?php  echo  Yii::t ( 'vcos', $search_form['cn_name']);?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label><?php  echo  Yii::t ( 'vcos', '工资月份');?>  <select
                                        style="width: 150px; height: 34px;"
                                        name="date" size="1"
                                        aria-controls="sample-table-2">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['date'];?>"
                                                selected="selected"><?php echo $search_form['date'];?></option>
                                <?php       
                                foreach ( $overtime_management as $value )
                                 {      
                                 ?>
                                <option
                                                value="<?php echo  $value['date']?>"><?php echo  $value['date']?></option>
                                <?php   


                                        }
                                ?>
                                  </select> </label>
                                  </div>
                                  </div>
                             <div
                                style="overflow: hidden; margin-top: 20px;">
                                <div
                                    style="float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '部门 ');?> <select
                                        style="width: 200px; height: 34px; margin-left: 20px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="department_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['department_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['search_department_name']);?></option>

                    <?php   
                        foreach ( $Alldepartment as $row ) {
                    ?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php
                                                                                }
                                                                                
                                                                                ?>

            </select> </label>
                                </div>
                                <div
                                    style="text-align: left; float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '职务' );?>  <select
                                        style="display: inline; width: 180px; height: 34px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="post_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['post_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['post_cn_name'] );?></option>
                               <?php                

                                foreach ( $post as $row ) {
                               ?>
                    <option value="<?php echo $row['post_id']?>"><?php echo  Yii::t ( 'vcos', $row['post_cn_name'] );?></option>
                    <?php   
                            }   
                         ?>
                        </select> </label>
                                </div>
                            </div>
                               <div
                                style="margin-top: 20px; margin-bottom: 20px;">
                                <button style="margin-left: 20%;"
                                    value="搜索" name="soso"
                                    class="btn btn-purple search "
                                    type="submit">
                                    搜索 <i
                                        class="icon-search  bigger-110">
                                    </i>
                                </button>
                                <button value="清空" type="button"
                                    style="margin-left: 10%;"
                                    class="btn reset">
                                    <i class="icon-undo bigger-110"> </i>
                                    清空
                                </button>
                                <button class="btn btn-info export"
                                    style="margin-left: 10%;"
                                    type="button">
                                    <i class="icon-ok bigger-110"></i>
                                    导出
                                </button>
                            </div>
                        </form>


                        <form action="" method="post" class="form2">
                            <div id="table_middle_1"
                                class="tab-pane active"
                                style="margin-top: 10px;">
                                <div class="table-responsive">
                                    <table
                                        class="table table-striped table-bordered table-hover"
                                        id="sample-table-1">
                                        <thead>
                                            <tr>
                                                
                                                <th>序号</th>
                                                <th>工资月份</th>
                                                <th>部门</th>
                                                <th>职务</th>
                                                <th>员工编码</th>
                                                <th>姓名</th>
                                                <th>日班班数</th>
                                                <th>日班工资</th>
                                                <th>夜班班数</th>
                                                <th>夜班工资</th>
                                                <th>金额合计</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
        
    
                                    $i = 0;
                            foreach ( $overtime_management as $row ) {
                                $i ++;  

                                  ?>
                                        <tr>
                                                
                                                <td> <?php echo $i;?></td>
                                                <td><?php echo $row['date'];?></td>
                                                <td><?php echo $row['newdepartmentname'];?></td>
                                                <td><?php echo $row['post_cn_name'];?></td>
                                                <td><?php echo $row['employee_code'];?></td>
                                                <td><?php echo $row['cn_name'];?></td>
                                                <td><?php echo $row['day_times'];?></td>
                                                <td><?php echo $row['day_salary'];?></td>
                                                <td><?php echo $row['night_times'];?></td>
                                                <td><?php echo $row['night_salary'];?></td>
                                                <td><?php echo $row['jiabanheji'];?></td>
                                                <td style="display: none;"><?php echo $row['remark'];?></td>
                                                <td style="display: none;"><?php echo $row['status'];?></td>
                                                
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
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane <?php if($t1=='4') echo "active";?> "
            id="table_4">
            <div class="tabbable">
                <ul
                    class="nav nav-tabs padding-12 tab-color-blue background-blue myTab4">


                    <li class="<?php if($t2=='1') echo "active";?>"><a
                        href="#table_4_1" data-toggle="tab"> <?php  echo  Yii::t ( 'vcos', '绩效工资生成' );?> </a></li>
                    <li class="<?php if($t2=='2') echo "active";?>"><a
                        href="#table_4_2" data-toggle="tab"> <?php  echo  Yii::t ( 'vcos', '绩效工资编辑' );?> </a></li>
                    <li class="<?php if($t2=='3') echo "active";?>"><a
                        href="#table_4_3" data-toggle="tab"> <?php  echo  Yii::t ( 'vcos', '绩效工资查询' );?> </a></li>
                </ul>
                <div class="tab-content">
                    <div
                        class="tab-pane <?php if($t2=='1') echo "active";?> "
                        id="table_4_1">
                        <div
                            style="border: 1px solid; width: 50%; margin-left: auto; margin-right: auto; border-radius: 10px ! important;">
                            <div style="border-bottom: 1px solid;">
                                <h3>绩效工资生成<?php  echo  Yii::t ( 'vcos', '绩效' );?></h3>
                            </div>
                            <div>
                                <table id="sample-table-2"
                                    class="table table-striped table-bordered ">
                                    <tbody>
                                        <tr>
                                            <td
                                                style="text-align: right; line-height: 35px;"><label>
                                                    选择年月：</label></td>
                                            <td><label> <select
                                                    name="sample-table-2_length"
                                                    size="1"
                                                    aria-controls="sample-table-2">
                                                        <option>2015</option>
                                                        <option>2014</option>
                                                        <option>2013</option>
                                                        <option>2012</option>
                                                        <option>2011</option>
                                                </select>年
                                            </label> <label> <select
                                                    name="sample-table-2_length"
                                                    size="1"
                                                    aria-controls="sample-table-2">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                        <option>10</option>
                                                        <option>11</option>
                                                        <option>12</option>
                                                </select>月
                                            </label></td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="text-align: right; line-height: 35px;">选择员工编码：</td>
                                            <td><input placeholder=""
                                                id="form-field-1"
                                                name="Operator" value=""
                                                type="text"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div style="margin-bottom: 10px;"
                                class="center">
                                <button class="btn btn-primary">生成</button>
                            </div>
                            <div style="margin-left: 5%;">
                                <table id="sample-table-2"
                                    class="table table-striped table-bordered ">
                                    <tbody>
                                        <tr>
                                            <td>1、年月项为必填项；</td>
                                        </tr>
                                        <tr>
                                            <td>2、员工编码为可选项；</td>
                                        </tr>
                                        <tr>
                                            <td>3、重新生成工资将删除该月份（或指定员工）原有的记录，生成新的记录；</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tab-pane <?php if($t2=='2') echo "active";?>  "
                        id="table_4_2">
                     <form method="post" action=""  class="search_form">
                          <div style="overflow: hidden;">
                           <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1"><?php  echo  Yii::t ( 'vcos', '员工编码');?>
                                        </label> <input placeholder=""
                                        id="form-field-1"
                                        style="height: 34px; width: 190px;"
                                        name="employee_code"
                                        value="<?php echo $search_form['employee_code']?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        <?php  echo  Yii::t ( 'vcos', '姓名' );?> </label> <input
                                        placeholder="" id="form-field-1"
                                        style="height: 34px; width: 180px;"
                                        name="cn_name"
                                        value="<?php  echo  Yii::t ( 'vcos', $search_form['cn_name']);?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label><?php  echo  Yii::t ( 'vcos', '工资月份');?>  <select
                                        style="width: 150px; height: 34px;"
                                        name="date" size="1"
                                        aria-controls="sample-table-2">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['date'];?>"
                                                selected="selected"><?php echo $search_form['date'];?></option>
                                <?php       
                                foreach ( $performance_management as $value )
                                 {      
                                 ?>
                                <option
                                                value="<?php echo  $value['date']?>"><?php echo  $value['date']?></option>
                                <?php   


                                        }
                                ?>
                                  </select> </label>
                                  </div>
                                  </div>
                        <div
                                style="overflow: hidden; margin-top: 20px;">
                                <div
                                    style="float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '部门 ');?> <select
                                        style="width: 200px; height: 34px; margin-left: 20px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="department_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['department_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['search_department_name']);?></option>

                    <?php   
                        foreach ( $Alldepartment as $row ) {
                    ?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php
                                                                                }
                                                                                
                                                                                ?>

            </select> </label>
                                </div>
                                <div
                                    style="text-align: left; float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '职务' );?>  <select
                                        style="display: inline; width: 180px; height: 34px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="post_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['post_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['post_cn_name'] );?></option>
                               <?php                

                                foreach ( $post as $row ) {
                               ?>
                    <option value="<?php echo $row['post_id']?>"><?php echo  Yii::t ( 'vcos', $row['post_cn_name'] );?></option>
                    <?php   
                            }   
                         ?>
                        </select> </label>
                                </div>
                            </div>
                            <div
                                style="margin-top: 20px; margin-bottom: 20px;"
                                class="center">
                                <button 
                                    value="<?php echo  Yii::t ( 'vcos', '搜索' );?>"
                                    name="soso"
                                    class="btn btn-purple search "
                                    type="submit">
                                     <?php  echo  Yii::t ( 'vcos', '搜索' );?><i
                                        class="icon-search  bigger-110">
                                    </i>
                                </button>
                                &nbsp; &nbsp; &nbsp;
                                <button
                                    value="<?php echo  Yii::t ( 'vcos', '清空' );?>"
                                    type="button" class="btn reset">
                                    <i class="icon-undo bigger-110"> </i>
                                    <?php  echo  Yii::t ( 'vcos', '清空' );?>
                                </button>
                            </div>
                        </form>
                        <form action="" method="post" class="form2">
                            <div id="table_middle_1"
                                class="tab-pane active"
                                style="margin-top: 10px;">
                                <div class="table-responsive">
                                    <table
                                        class="table table-striped table-bordered table-hover"
                                        id="sample-table-1">
                                        <thead>
                                            <tr>
                                                <th class="center"><label>
                                                        <input
                                                        class="ace checkALL"
                                                        type="checkbox">
                                                        <span
                                                        class="lbl"></span>
                                                </label></th>


<!--                                                 'employee_code' => string '1' (length=1)  员工编号
      'month_performance' => string '1000' (length=4)  月度绩效
      'season_performance' => string '2' (length=1)  季度绩效
      'sick_times' => string '3' (length=1)  病假次数
      'compassionate_times' => string '3' (length=1)  事假次数
      'remark' => null    备注
      'date' => string '2015-12' (length=7)  工资月份
      'department_id' => string '1' (length=1)  部门id
      'post_id' => string '1' (length=1)   职务id
      'post_cn_name' => string '大幅' (length=6)  职务名字
      'sick_charge' => string '1' (length=1)     病假扣款每次金额
      'compassionate_charge' => string '1' (length=1)   事假扣款每次金额
      'cn_name' => string '我是谁' (length=9)     姓名
      'sick_kouqian' => string '3' (length=1)   病假扣款      
      'shijiakouqian' => string '3' (length=1)   事假扣款
      'cont' => string '6' (length=1)         扣款金额合计
      'newdepartmentname' => string '泰山号' (length=9)  部门名字 -->


                                                <th><?php  echo  Yii::t ( 'vcos', '序号' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '工资月份' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '部门' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '职务' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '员工编码' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '月度绩效' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '季度绩效' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '病假扣款' );?> </th>
                                                <th><?php  echo  Yii::t ( 'vcos', '事假扣款' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '金额合计' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '操作' );?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
        
    
                                    $i = 0;
                            foreach ( $performance_management as $row ) {
                                $i ++;  

                                  ?>
                                        <tr>
                                                <td class="center"><label>
                                                        <input
                                                        class="ace checkbox_button"
                                                        name="ids[]"
                                                        value="<?php echo $row['id'];?>"
                                                        type="checkbox">
                                                        <span
                                                        class="lbl"></span>
                                                </label></td>
                                                <td> <?php echo $i;?></td>
                                                <td><?php echo $row['date'];?></td>
                                                <td><?php echo $row['newdepartmentname'];?></td>
                                                <td><?php echo $row['post_cn_name'];?></td>
                                                <td><?php echo $row['employee_code'];?></td>
                                                <td><?php echo $row['cn_name'];?></td>
                                                <td><?php echo $row['month_performance'];?></td>
                                                <td><?php echo $row['season_performance'];?></td>
                                                <td><?php echo $row['sick_kouqian'];?></td>
                                                <td><?php echo $row['shijiakouqian'];?></td>
                                                <td><?php echo $row['cont'];?></td>
                                                <td style="display: none;"><?php echo $row['remark'];?></td>
                                                <td>
                                                    <div
                                                        class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                        <a
                                                            href="#modal_table_4_form1"
                                                            data-toggle="modal"
                                                            class="change"
                                                            id="<?php echo $row['id'];?>"
                                                            title="<?php  echo  Yii::t ( 'vcos', '编辑' );?>">
                                                            <button
                                                                type="button"
                                                                class="btn btn-xs btn-info"
                                                                role="button">
                                                                <i
                                                                    class="icon-edit bigger-120"></i>
                                                            </button>
                                                        </a> <a href="#"
                                                            class="delete"
                                                            id="<?php echo $row['id'];?>"
                                                            title="<?php  echo  Yii::t ( 'vcos', '删除' );?>">
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
                                         }                                                                                           ?>
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
                                    <div
                                        style="text-align: center; margin-top: 100px;">
                                        <button
                                            style="width: 85px; height: 42px;"
                                            class="btn btn-xs btn-warning  Batch_delete_records ">
                                            <i
                                                class="icon-trash bigger-125"></i>
                                            <span
                                                class="bigger-110 no-text-shadow"><?php  echo  Yii::t ( 'vcos', '删除选中' );?></span>
                                        </button>
                                        <a href="#modal-form1"
                                            data-toggle="modal">
                                            <button class="btn btn-info"
                                                type="button">
                                                <i
                                                    class="icon-ok bigger-110"></i>
                                                <?php  echo  Yii::t ( 'vcos', '新增' );?>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div
                        class="tab-pane <?php if($t2=='3') echo "active";?>  "
                        id="table_4_3">
                        <form method="post" action=""  class="search_form">
                                            <div style="overflow: hidden;">
                                            <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1"><?php  echo  Yii::t ( 'vcos', '员工编码');?>
                                        </label> <input placeholder=""
                                        id="form-field-1"
                                        style="height: 34px; width: 190px;"
                                        name="employee_code"
                                        value="<?php echo $search_form['employee_code']?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        <?php  echo  Yii::t ( 'vcos', '姓名' );?> </label> <input
                                        placeholder="" id="form-field-1"
                                        style="height: 34px; width: 180px;"
                                        name="cn_name"
                                        value="<?php  echo  Yii::t ( 'vcos', $search_form['cn_name']);?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label><?php  echo  Yii::t ( 'vcos', '工资月份');?>  <select
                                        style="width: 150px; height: 34px;"
                                        name="date" size="1"
                                        aria-controls="sample-table-2">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['date'];?>"
                                                selected="selected"><?php echo $search_form['date'];?></option>
                                <?php       
                                foreach ( $performance_management as $value )
                                 {      
                                 ?>
                                <option
                                                value="<?php echo  $value['date']?>"><?php echo  $value['date']?></option>
                                <?php   


                                        }
                                ?>
                                  </select> </label>
                                  </div>
                                  </div>
                             <div
                                style="overflow: hidden; margin-top: 20px;">
                                <div
                                    style="float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '部门 ');?> <select
                                        style="width: 200px; height: 34px; margin-left: 20px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="department_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['department_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['search_department_name']);?></option>

                    <?php   
                        foreach ( $Alldepartment as $row ) {
                    ?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php
                                                                                }
                                                                                
                                                                                ?>

            </select> </label>
                                </div>
                                <div
                                    style="text-align: left; float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '职务' );?>  <select
                                        style="display: inline; width: 180px; height: 34px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="post_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['post_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['post_cn_name'] );?></option>
                               <?php                

                                foreach ( $post as $row ) {
                               ?>
                    <option value="<?php echo $row['post_id']?>"><?php echo  Yii::t ( 'vcos', $row['post_cn_name'] );?></option>
                    <?php   
                            }   
                         ?>
                        </select> </label>
                                </div>
                            </div>
                               <div
                                style="margin-top: 20px; margin-bottom: 20px;">
                                <button style="margin-left: 20%;"
                                    value="搜索" name="soso"
                                    class="btn btn-purple search "
                                    type="submit">
                                    搜索<?php  echo  Yii::t ( 'vcos', '姓名' );?> <i
                                        class="icon-search  bigger-110">
                                    </i>
                                </button>
                                <button value="清空" type="button"
                                    style="margin-left: 10%;"
                                    class="btn reset">
                                    <i class="icon-undo bigger-110"> </i>
                                    清空<?php  echo  Yii::t ( 'vcos', '姓名' );?>
                                </button>
                                <button class="btn btn-info export"
                                    style="margin-left: 10%;"
                                    type="button">
                                    <i class="icon-ok bigger-110"></i>
                                    导出<?php  echo  Yii::t ( 'vcos', '姓名' );?>
                                </button>
                            </div>
                        </form>


                        <form action="" method="post" class="form2">
                            <div id="table_middle_1"
                                class="tab-pane active"
                                style="margin-top: 10px;">
                                <div class="table-responsive">
                                    <table
                                        class="table table-striped table-bordered table-hover"
                                        id="sample-table-1">
                                        <thead>
                                            <tr>
                                               

                                                <th><?php  echo  Yii::t ( 'vcos', '序号' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '工资月份' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '部门' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '职务' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '员工编码' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '月度绩效' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '季度绩效' );?></th>
                                                <th> <?php  echo  Yii::t ( 'vcos', '病假扣款' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '事假扣款' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '金额合计' );?></th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
        
    
                                    $i = 0;
                            foreach ( $performance_management as $row ) {
                                $i ++;  

                                  ?>
                                        <tr>
                    
                                                <td> <?php echo $i;?></td>
                                                <td><?php echo $row['date'];?></td>
                                                <td><?php echo $row['newdepartmentname'];?></td>
                                                <td><?php echo $row['post_cn_name'];?></td>
                                                <td><?php echo $row['employee_code'];?></td>
                                                <td><?php echo $row['cn_name'];?></td>
                                                <td><?php echo $row['month_performance'];?></td>
                                                <td><?php echo $row['season_performance'];?></td>
                                                <td><?php echo $row['sick_kouqian'];?></td>
                                                <td><?php echo $row['shijiakouqian'];?></td>
                                                <td><?php echo $row['cont'];?></td>
                                                <td style="display: none;"><?php echo $row['remark'];?></td>
                                               
                                            </tr>
                                        <?php           
                                         }                                                                                           ?>
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
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane <?php if($t1=='5') echo "active";?> "
            id="table_5">
            <div class="tabbable">
                <ul
                    class="nav nav-tabs padding-12 tab-color-blue background-blue myTab4">
                    <li class="<?php if($t2=='1') echo "active";?>"><a
                        href="#table_5_1" data-toggle="tab"> <?php  echo  Yii::t ( 'vcos', '个人所得税导入' );?> </a></li>
                    <li class="<?php if($t2=='2') echo "active";?>"><a
                        href="#table_5_2" data-toggle="tab"> <?php  echo  Yii::t ( 'vcos', '个人所得税维护' );?> </a></li>
                    <li class="<?php if($t2=='3') echo "active";?>"><a
                        href="#table_5_3" data-toggle="tab"> <?php  echo  Yii::t ( 'vcos', '个人所得税查询' );?> </a></li>
                </ul>
                <div class="tab-content">
                    <div
                        class="tab-pane <?php if($t2=='1') echo "active";?>"
                        id="table_5_1">

                          <form id="import_5_1" method="post"
                            enctype="multipart/form-data">
                        <div
                            style="border: 1px solid; width: 50%; margin-left: auto; margin-right: auto; border-radius: 10px ! important;">
                            <div style="border-bottom: 1px solid;">
                                <h3>个人所得税导入</h3>
                            </div>
                            <div>
                                <table id="sample-table-2"
                                    class="table table-striped table-bordered ">
                                    <tbody>
                                        <tr>
                                            <td
                                                style="text-align: right; line-height: 35px;"><label>
                                                    选择年月：</label></td>
                                            <td><label> <select
                                                    name="year"
                                                    size="1"
                                                    aria-controls="sample-table-2">
                                                        <option>2015</option>
                                                        <option>2014</option>
                                                        <option>2013</option>
                                                        <option>2012</option>
                                                        <option>2011</option>
                                                </select>年
                                            </label> <label> <select
                                                    name="month"
                                                    size="1"
                                                    aria-controls="sample-table-2">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                        <option>10</option>
                                                        <option>11</option>
                                                        <option>12</option>
                                                </select>月
                                            </label></td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="text-align: right; line-height: 35px;">文件位置：</td>
                                            <td> <input style="margin: 0 auto;"
                                        type="file" name="myFile"
                                        id="table_2_1_import"
                                        class="id-input-file-3" />
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div style="margin-bottom: 10px;"
                                class="center">
                                <button class="btn btn-primary daoru_5_1">导入</button>
                            </div>
                            <div style="margin-left: 5%;">
                                <table id="sample-table-2"
                                    class="table table-striped table-bordered ">
                                    <tbody>
                                        <tr>
                                            <td>1、年月项为必填项；</td>
                                        </tr>
                                        <tr>
                                            <td>2、员工编码为可选项；</td>
                                        </tr>
                                        <tr>
                                            <td>3、重新生成工资将删除该月份（或指定员工）原有的记录，生成新的记录；</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div
                        class="tab-pane  <?php if($t2=='2') echo "active";?> "
                        id="table_5_2">
                          <form method="post" action=""  class="search_form">
                          <div style="overflow: hidden;">
                           <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1"><?php  echo  Yii::t ( 'vcos', '员工编码');?>
                                        </label> <input placeholder=""
                                        id="form-field-1"
                                        style="height: 34px; width: 190px;"
                                        name="employee_code"
                                        value="<?php echo $search_form['employee_code']?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        <?php  echo  Yii::t ( 'vcos', '姓名' );?> </label> <input
                                        placeholder="" id="form-field-1"
                                        style="height: 34px; width: 180px;"
                                        name="cn_name"
                                        value="<?php  echo  Yii::t ( 'vcos', $search_form['cn_name']);?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label><?php  echo  Yii::t ( 'vcos', '工资月份');?>  <select
                                        style="width: 150px; height: 34px;"
                                        name="date" size="1"
                                        aria-controls="sample-table-2">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['date'];?>"
                                                selected="selected"><?php echo $search_form['date'];?></option>
                                <?php       
                                foreach ( $tax_management as $value )
                                 {      
                                 ?>
                                <option
                                                value="<?php echo  $value['date']?>"><?php echo  $value['date']?></option>
                                <?php   


                                        }
                                ?>
                                  </select> </label>
                                  </div>
                                  </div>
                        <div
                                style="overflow: hidden; margin-top: 20px;">
                                <div
                                    style="float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '部门 ');?> <select
                                        style="width: 200px; height: 34px; margin-left: 20px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="department_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['department_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['search_department_name']);?></option>

                    <?php   
                        foreach ( $Alldepartment as $row ) {
                    ?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php
                                                                                }
                                                                                
                                                                                ?>

            </select> </label>
                                </div>
                                <div
                                    style="text-align: left; float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '职务' );?>  <select
                                        style="display: inline; width: 180px; height: 34px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="post_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['post_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['post_cn_name'] );?></option>
                               <?php                

                                foreach ( $post as $row ) {
                               ?>
                    <option value="<?php echo $row['post_id']?>"><?php echo  Yii::t ( 'vcos', $row['post_cn_name'] );?></option>
                    <?php   
                            }   
                         ?>
                        </select> </label>
                                </div>
                            </div>
                            <div
                                style="margin-top: 20px; margin-bottom: 20px;"
                                class="center">
                                <button 
                                    value="<?php echo  Yii::t ( 'vcos', '搜索' );?>"
                                    name="soso"
                                    class="btn btn-purple search "
                                    type="submit">
                                     <?php  echo  Yii::t ( 'vcos', '搜索' );?><i
                                        class="icon-search  bigger-110">
                                    </i>
                                </button>
                                &nbsp; &nbsp; &nbsp;
                                <button
                                    value="<?php echo  Yii::t ( 'vcos', '清空' );?>"
                                    type="button" class="btn reset">
                                    <i class="icon-undo bigger-110"> </i>
                                    <?php  echo  Yii::t ( 'vcos', '清空' );?>
                                </button>
                            </div>
                        </form>
                        <form action="" method="post" class="form2">
                            <div id="table_middle_1"
                                class="tab-pane active"
                                style="margin-top: 10px;">
                                <div class="table-responsive">
                                    <table
                                        class="table table-striped table-bordered table-hover"
                                        id="table5_table_5_2">
                                        <thead>
                                            <tr>
                                                <th class="center"><label>
                                                        <input
                                                        class="ace checkALL"
                                                        type="checkbox">
                                                        <span
                                                        class="lbl"></span>
                                                </label></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '序号' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '工资月份' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '部门' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '职务' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '员工编码' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                             
                                                <th><?php  echo  Yii::t ( 'vcos', '税收合计' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '操作' );?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
        
    
                                    $i = 0;
                            foreach ( $tax_management as $row ) {
                                $i ++;  

                                  ?>
                                        <tr>
                                                <td class="center"><label>
                                                        <input
                                                        class="ace checkbox_button"
                                                        name="ids[]"
                                                        value="<?php echo $row['id'];?>"
                                                        type="checkbox">
                                                        <span
                                                        class="lbl"></span>
                                                </label></td>


                                                <td class="department_id" style="display: none;"> <?php echo $row['department_id'];?></td>


                                                  <td class="id" style="display: none;"><?php echo $row['id'];?></td>
                                                  <td class="post_id" style="display: none;"><?php echo $row['post_id'];?></td>
                                                
                                                



                                                <td  > <?php echo $i;?></td>
                                                <td class="date"><?php echo $row['date'];?></td>
                                                <td class="department_name"><?php echo $row['newdepartmentname'];?></td>
                                                <td class="post_cn_name"><?php echo $row['post_cn_name'];?></td>
                                                <td class="employee_code"><?php echo $row['employee_code'];?></td>
                                                <td class="cn_name"><?php echo $row['cn_name'];?></td>
                                                <td class="tax_amount"><?php echo $row['tax_amount'];?></td>
                                                
                                                <td style="display: none;"><?php echo $row['remark'];?></td>
                                                <td style="display: none;"><?php echo $row['status'];?></td>
                                                <td>
                                                    <div
                                                        class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                        <a
                                                            href="#modal_table_5_form1"
                                                            data-toggle="modal"
                                                            class="change"
                                                            id="<?php echo $row['id'];?>"
                                                            title="<?php  echo  Yii::t ( 'vcos', '编辑' );?>">
                                                            <button
                                                                type="button"
                                                                class="btn btn-xs btn-info"
                                                                role="button">
                                                                <i
                                                                    class="icon-edit bigger-120"></i>
                                                            </button>
                                                        </a> <a href="#"
                                                            class="delete"
                                                            id="<?php echo $row['id'];?>"
                                                            title="<?php  echo  Yii::t ( 'vcos', '删除' );?>">
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
                                           }                                           ?>
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
                                    <div
                                        style="text-align: center; margin-top: 100px;">
                                        <button
                                            style="width: 85px; height: 42px;"
                                            class="btn btn-xs btn-warning  Batch_delete_records ">
                                            <i
                                                class="icon-trash bigger-125"></i>
                                            <span
                                                class="bigger-110 no-text-shadow"><?php  echo  Yii::t ( 'vcos', '删除选中' );?></span>
                                        </button>
                                        <a href="#modal_table_5_form2"
                                            data-toggle="modal">
                                            <button class="btn btn-info"
                                                type="button">
                                                <i
                                                    class="icon-ok bigger-110"></i>
                                                <?php  echo  Yii::t ( 'vcos', '新增' );?>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div
                        class="tab-pane <?php if($t2=='3') echo "active";?> "
                        id="table_5_3">
                        <form method="post" action=""  class="search_form">
                                            <div style="overflow: hidden;">
                                            <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1"><?php  echo  Yii::t ( 'vcos', '员工编码');?>
                                        </label> <input placeholder=""
                                        id="form-field-1"
                                        style="height: 34px; width: 190px;"
                                        name="employee_code"
                                        value="<?php echo $search_form['employee_code']?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                         <?php  echo  Yii::t ( 'vcos', '姓名' );?></label> <input
                                        placeholder="" id="form-field-1"
                                        style="height: 34px; width: 180px;"
                                        name="cn_name"
                                        value="<?php  echo  Yii::t ( 'vcos', $search_form['cn_name']);?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label><?php  echo  Yii::t ( 'vcos', '工资月份');?>  <select
                                        style="width: 150px; height: 34px;"
                                        name="date" size="1"
                                        aria-controls="sample-table-2">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['date'];?>"
                                                selected="selected"><?php echo $search_form['date'];?></option>
                                <?php       
                                foreach ( $tax_management as $value )
                                 {      
                                 ?>
                                <option
                                                value="<?php echo  $value['date']?>"><?php echo  $value['date']?></option>
                                <?php   


                                        }
                                ?>
                                  </select> </label>
                                  </div>
                                  </div>
                             <div
                                style="overflow: hidden; margin-top: 20px;">
                                <div
                                    style="float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '部门 ');?> <select
                                        style="width: 200px; height: 34px; margin-left: 20px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="department_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['department_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['search_department_name']);?></option>

                    <?php   
                        foreach ( $Alldepartment as $row ) {
                    ?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php
                                                                                }
                                                                                
                                                                                ?>

            </select> </label>
                                </div>
                                <div
                                    style="text-align: left; float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '职务' );?>  <select
                                        style="display: inline; width: 180px; height: 34px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="post_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['post_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['post_cn_name'] );?></option>
                               <?php                

                                foreach ( $post as $row ) {
                               ?>
                    <option value="<?php echo $row['post_id']?>"><?php echo  Yii::t ( 'vcos', $row['post_cn_name'] );?></option>
                    <?php   
                            }   
                         ?>
                        </select> </label>
                                </div>
                            </div>
                               <div
                                style="margin-top: 20px; margin-bottom: 20px;">
                                <button style="margin-left: 20%;"
                                    value="搜索" name="soso"
                                    class="btn btn-purple search "
                                    type="submit">
                                    <?php  echo  Yii::t ( 'vcos', '搜索' );?> <i
                                        class="icon-search  bigger-110">
                                    </i>
                                </button>
                                <button value="清空" type="button"
                                    style="margin-left: 10%;"
                                    class="btn reset">
                                    <i class="icon-undo bigger-110"> </i>
                                    <?php  echo  Yii::t ( 'vcos', '清空' );?>
                                </button>
                                <button class="btn btn-info export"
                                    style="margin-left: 10%;"
                                    type="button">
                                    <i class="icon-ok bigger-110"></i>
                                    <?php  echo  Yii::t ( 'vcos', '导出' );?>
                                </button>
                            </div>
                        </form>


                        <form action="" method="post" class="form2">
                            <div id="table_middle_1"
                                class="tab-pane active"
                                style="margin-top: 10px;">
                                <div class="table-responsive">
                                    <table
                                        class="table table-striped table-bordered table-hover"
                                        id="sample-table-1">
                                        <thead>
                                            <tr>
                                                
                                                <th><?php  echo  Yii::t ( 'vcos', '序号' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '工资月份' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '部门' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '职务' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '员工编码' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                             
                                                <th><?php  echo  Yii::t ( 'vcos', '税收合计' );?></th>
                                               
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                           <?php
        
    
                                    $i = 0;
                            foreach ( $tax_management as $row ) {
                                $i ++;  

                                  ?>
                                        <tr>

                                                <td> <?php echo $i;?></td>
                                                <td><?php echo $row['date'];?></td>
                                                <td><?php echo $row['newdepartmentname'];?></td>
                                                <td><?php echo $row['post_cn_name'];?></td>
                                                <td><?php echo $row['employee_code'];?></td>
                                                <td><?php echo $row['cn_name'];?></td>
                                                <td><?php echo $row['tax_amount'];?></td>
 
                                                <td style="display: none;"><?php echo $row['remark'];?></td>
                                                <td style="display: none;"><?php echo $row['status'];?></td>
                                                
                                            </tr>
                                        <?php    
                                           }                                           ?>
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
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane <?php if($t1=='6') echo "active";?> "
            id="table_6">
            <div class="tabbable">
                <ul
                    class="nav nav-tabs padding-12 tab-color-blue background-blue myTab4">
                    <li class="<?php if($t2=='1') echo "active";?>"><a
                        href="#table_6_1" data-toggle="tab"> <?php  echo  Yii::t ( 'vcos', '搜索' );?>费用补贴生成 </a></li>
                    <li class="<?php if($t2=='2') echo "active";?>"><a
                        href="#table_6_2" data-toggle="tab"><?php  echo  Yii::t ( 'vcos', '搜索' );?> 费用补贴编辑 </a></li>
                    <li class="<?php if($t2=='3') echo "active";?>"><a
                        href="#table_6_3" data-toggle="tab"><?php  echo  Yii::t ( 'vcos', '搜索' );?> 费用补贴查询 </a></li>
                </ul>
                <div class="tab-content">
                    <div
                        class="tab-pane <?php if($t2=='1') echo "active";?>"
                        id="table_6_1">
                        <form method="post" id="table_6_1_form" >
                        <div
                            style="border: 1px solid; width: 50%; margin-left: auto; margin-right: auto; border-radius: 10px ! important;">
                            <div style="border-bottom: 1px solid;">
                                <h3>费用补贴生成<?php  echo  Yii::t ( 'vcos', '搜索' );?></h3>
                            </div>
                            <div>
                                <table id="sample-table-2"
                                    class="table table-striped table-bordered ">
                                    <tbody>
                                        <tr>
                                            <td
                                                style="text-align: right; line-height: 35px;"><label>
                                                    选择年月：</label></td>
                                            <td><label> <select
                                                    name="year"
                                                    size="1"
                                                    aria-controls="sample-table-2">
                                                        <option>2015</option>
                                                        <option>2014</option>
                                                        <option>2013</option>
                                                        <option>2012</option>
                                                        <option>2011</option>
                                                </select>年
                                            </label> <label> <select
                                                    name="month"
                                                    size="1"
                                                    aria-controls="sample-table-2">
                                                        <option>01</option>
                                                        <option>02</option>
                                                        <option>03</option>
                                                        <option>04</option>
                                                        <option>05</option>
                                                        <option>06</option>
                                                        <option>07</option>
                                                        <option>08</option>
                                                        <option>09</option>
                                                        <option>10</option>
                                                        <option>11</option>
                                                        <option>12</option>
                                                </select>月
                                            </label></td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="text-align: right; line-height: 35px;">选择员工编码：</td>
                                            <td><input placeholder=""
                                                id="form-field-1"
                                                name="employee_code" value=""
                                                type="text"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div style="margin-bottom: 10px;"
                                class="center">
                                <button class="btn btn-primary table_6_1_generate">生成</button>
                            </div>
                            <div style="margin-left: 5%;">
                                <table id="sample-table-2"
                                    class="table table-striped table-bordered ">
                                    <tbody>
                                        <tr>
                                            <td>1、年月项为必填项；</td>
                                        </tr>
                                        <tr>
                                            <td>2、员工编码为可选项；</td>
                                        </tr>
                                        <tr>
                                            <td>3、重新生成工资将删除该月份（或指定员工）原有的记录，生成新的记录；</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div
                        class="tab-pane  <?php if($t2=='2') echo "active";?>  "
                        id="table_6_2">
                          <form method="post" action=""  class="search_form">
                          <div style="overflow: hidden;">
                           <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1"><?php  echo  Yii::t ( 'vcos', '员工编码');?>
                                        </label> <input placeholder=""
                                        id="form-field-1"
                                        style="height: 34px; width: 190px;"
                                        name="employee_code"
                                        value="<?php echo $search_form['employee_code']?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        <?php  echo  Yii::t ( 'vcos', '姓名' );?> </label> <input
                                        placeholder="" id="form-field-1"
                                        style="height: 34px; width: 180px;"
                                        name="cn_name"
                                        value="<?php  echo  Yii::t ( 'vcos', $search_form['cn_name']);?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label><?php  echo  Yii::t ( 'vcos', '工资月份');?>  <select
                                        style="width: 150px; height: 34px;"
                                        name="date" size="1"
                                        aria-controls="sample-table-2">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['date'];?>"
                                                selected="selected"><?php echo $search_form['date'];?></option>
                                <?php       
                                foreach ( $vcos_allowance_management as $value )
                                 {      
                                 ?>
                                <option
                                                value="<?php echo  $value['date']?>"><?php echo  $value['date']?></option>
                                <?php   


                                        }
                                ?>
                                  </select> </label>
                                  </div>
                                  </div>
                        <div
                                style="overflow: hidden; margin-top: 20px;">
                                <div
                                    style="float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '部门 ');?> <select
                                        style="width: 200px; height: 34px; margin-left: 20px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="department_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['department_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['search_department_name']);?></option>

                    <?php   
                        foreach ( $Alldepartment as $row ) {
                    ?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php
                                                                                }
                                                                                
                                                                                ?>

            </select> </label>
                                </div>
                                <div
                                    style="text-align: left; float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '职务' );?>  <select
                                        style="display: inline; width: 180px; height: 34px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="post_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['post_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['post_cn_name'] );?></option>
                               <?php                

                                foreach ( $post as $row ) {
                               ?>
                    <option value="<?php echo $row['post_id']?>"><?php echo  Yii::t ( 'vcos', $row['post_cn_name'] );?></option>
                    <?php   
                            }   
                         ?>
                        </select> </label>
                                </div>
                            </div>
                            <div
                                style="margin-top: 20px; margin-bottom: 20px;"
                                class="center">
                                <button 
                                    value="<?php echo  Yii::t ( 'vcos', '搜索' );?>"
                                    name="soso"
                                    class="btn btn-purple search "
                                    type="submit">
                                    <?php  echo  Yii::t ( 'vcos', '搜索' );?> <i
                                        class="icon-search  bigger-110">
                                    </i>
                                </button>
                                &nbsp; &nbsp; &nbsp;
                                <button
                                    value="<?php echo  Yii::t ( 'vcos', '清空' );?>"
                                    type="button" class="btn reset">
                                    <i class="icon-undo bigger-110"> </i>
                                    <?php  echo  Yii::t ( 'vcos', '清空' );?>
                                </button>
                            </div>
                        </form>
                        <form action="" method="post" class="form2">
                            <div id="table_middle_1"
                                class="tab-pane active"
                                style="margin-top: 10px;">
                                <div class="table-responsive">
                                    <table
                                        class="table table-striped table-bordered table-hover"
                                        id="table6_table_6_2">
                                        <thead>
                                            <tr>
                                                <th class="center"><label>
                                                        <input
                                                        class="ace checkALL"
                                                        type="checkbox">
                                                        <span
                                                        class="lbl"></span>
                                                </label></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '序号' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '工资月份' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '部门' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '职务' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '员工编码' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '交通通讯补贴' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '金额合计' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '操作' );?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
        
    
                                    $i = 0;
                            foreach ( $vcos_allowance_management as $row ) {
                                $i ++;  

                                  ?>
                                        <tr>
                                                <td class="center"><label>
                                                        <input
                                                        class="ace checkbox_button"
                                                        name="ids[]"
                                                        value="<?php echo $row['id'];?>"
                                                        type="checkbox">
                                                        <span
                                                        class="lbl"></span>
                                                </label></td>

                                                 <td class="department_id" style="display: none;"> <?php echo $row['department_id'];?></td>


                                                  <td class="id" style="display: none;"><?php echo $row['id'];?></td>
                                                  <td class="post_id" style="display: none;"><?php echo $row['post_id'];?></td>
                                                
                                                <td> <?php echo $i;?></td>
                                                <td class="date"><?php echo $row['date'];?></td>
                                                <td class="department_name"><?php echo $row['newdepartmentname'];?></td>
                                                <td class="post_cn_name"><?php echo $row['post_cn_name'];?></td>
                                                <td class="employee_code"><?php echo $row['employee_code'];?></td>
                                                <td class="cn_name"><?php echo $row['cn_name'];?></td>
                                                <td class="allowance_amount"><?php echo $row['allowance_amount'];?></td>
                                                  <td><?php echo $row['allowance_amount'];?></td>
                                              
                                
                                          
                                                <td  class="remark"style="display: none;"><?php echo $row['remark'];?></td>
                                              
                                                <td>
                                                    <div
                                                        class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                        <a
                                                            href="#modal_table_6_form1"
                                                            data-toggle="modal"
                                                            class="change"
                                                            id="<?php echo $row['id'];?>"
                                                            title="<?php  echo  Yii::t ( 'vcos', '编辑' );?>">
                                                            <button
                                                                type="button"
                                                                class="btn btn-xs btn-info"
                                                                role="button">
                                                                <i
                                                                    class="icon-edit bigger-120"></i>
                                                            </button>
                                                        </a> <a href="#"
                                                            class="delete"
                                                            id="<?php echo $row['id'];?>"
                                                            title="<?php  echo  Yii::t ( 'vcos', '删除' );?>">
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
                                             } ?>
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
                                    <div
                                        style="text-align: center; margin-top: 100px;">
                                        <button
                                            style="width: 85px; height: 42px;"
                                            class="btn btn-xs btn-warning  Batch_delete_records ">
                                            <i
                                                class="icon-trash bigger-125"></i>
                                            <span
                                                class="bigger-110 no-text-shadow"><?php  echo  Yii::t ( 'vcos', '删除选中' );?>"></span>
                                        </button>
                                        <a href="#modal_table_6_form2"
                                            data-toggle="modal">
                                            <button class="btn btn-info"
                                                type="button">
                                                <i
                                                    class="icon-ok bigger-110"></i>
                                                <?php  echo  Yii::t ( 'vcos', '新增' );?>">
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div
                        class="tab-pane <?php if($t2=='3') echo "active";?>   "
                        id="table_6_3">
                        <form method="post" action=""  class="search_form">
                                            <div style="overflow: hidden;">
                                            <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1"><?php  echo  Yii::t ( 'vcos', '员工编码');?>
                                        </label> <input placeholder=""
                                        id="form-field-1"
                                        style="height: 34px; width: 190px;"
                                        name="employee_code"
                                        value="<?php echo $search_form['employee_code']?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        <?php  echo  Yii::t ( 'vcos', '姓名' );?> </label> <input
                                        placeholder="" id="form-field-1"
                                        style="height: 34px; width: 180px;"
                                        name="cn_name"
                                        value="<?php  echo  Yii::t ( 'vcos', $search_form['cn_name']);?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label><?php  echo  Yii::t ( 'vcos', '工资月份');?>  <select
                                        style="width: 150px; height: 34px;"
                                        name="date" size="1"
                                        aria-controls="sample-table-2">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['date'];?>"
                                                selected="selected"><?php echo $search_form['date'];?></option>
                                <?php       
                                foreach ( $vcos_allowance_management as $value )
                                 {      
                                 ?>
                                <option
                                                value="<?php echo  $value['date']?>"><?php echo  $value['date']?></option>
                                <?php   


                                        }
                                ?>
                                  </select> </label>
                                  </div>
                                  </div>
                             <div
                                style="overflow: hidden; margin-top: 20px;">
                                <div
                                    style="float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '部门 ');?> <select
                                        style="width: 200px; height: 34px; margin-left: 20px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="department_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['department_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['search_department_name']);?></option>

                    <?php   
                        foreach ( $Alldepartment as $row ) {
                    ?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php
                                                                                }
                                                                                
                                                                                ?>

            </select> </label>
                                </div>
                                <div
                                    style="text-align: left; float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '职务' );?>  <select
                                        style="display: inline; width: 180px; height: 34px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="post_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['post_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['post_cn_name'] );?></option>
                               <?php                

                                foreach ( $post as $row ) {
                               ?>
                    <option value="<?php echo $row['post_id']?>"><?php echo  Yii::t ( 'vcos', $row['post_cn_name'] );?></option>
                    <?php   
                            }   
                         ?>
                        </select> </label>
                                </div>
                            </div>
                               <div
                                style="margin-top: 20px; margin-bottom: 20px;">
                                <button style="margin-left: 20%;"
                                    value="搜索" name="soso"
                                    class="btn btn-purple search "
                                    type="submit">
                                    <?php  echo  Yii::t ( 'vcos', '搜索' );?> <i
                                        class="icon-search  bigger-110">
                                    </i>
                                </button>
                                <button value="清空" type="button"
                                    style="margin-left: 10%;"
                                    class="btn reset">
                                    <i class="icon-undo bigger-110"> </i>
                                    <?php  echo  Yii::t ( 'vcos', '清空' );?>
                                </button>
                                <button class="btn btn-info export"
                                    style="margin-left: 10%;"
                                    type="button">
                                    <i class="icon-ok bigger-110"></i>
                                    <?php  echo  Yii::t ( 'vcos', '导出' );?>
                                </button>
                            </div>
                        </form>


                        <form action="" method="post" class="form2">
                            <div id="table_middle_1"
                                class="tab-pane active"
                                style="margin-top: 10px;">
                                <div class="table-responsive">
                                    <table
                                        class="table table-striped table-bordered table-hover"
                                        id="sample-table-1">
                                         <thead>
                                            <tr>
                                               
                                                <th><?php  echo  Yii::t ( 'vcos', '序号' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '工资月份' );?>"></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '部门' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '职务' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '员工编码' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '交通通讯补贴' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '金额合计' );?></th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
        
    
                                    $i = 0;
                            foreach ( $vcos_allowance_management as $row ) {
                                $i ++;  

                                  ?>
                                        <tr>
                                               
                                                <td> <?php echo $i;?></td>
                                                <td><?php echo $row['date'];?></td>
                                                <td><?php echo $row['newdepartmentname'];?></td>
                                                <td><?php echo $row['post_cn_name'];?></td>
                                                <td><?php echo $row['employee_code'];?></td>
                                                <td><?php echo $row['cn_name'];?></td>
                                                <td><?php echo $row['allowance_amount'];?></td>
                                                  <td><?php echo $row['allowance_amount'];?></td>
                                              
                                                
                                          
                                                <td style="display: none;"><?php echo $row['remark'];?></td>
                                              
                                                
                                            </tr>
                                        <?php  
                                             } ?>
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
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane <?php if($t1=='7') echo "active";?> "
            id="table_7">
            <div class="tabbable">
                <ul
                    class="nav nav-tabs padding-12 tab-color-blue background-blue myTab4">
                    <li class="<?php if($t2=='1') echo "active";?>"><a
                        href="#table_7_1" data-toggle="tab"> <?php  echo  Yii::t ( 'vcos', '其他福利导入' );?> </a></li>
                    <li class="<?php if($t2=='2') echo "active";?>"><a
                        href="#table_7_2" data-toggle="tab"> <?php  echo  Yii::t ( 'vcos', '其他福利维护' );?> </a></li>
                    <li class="<?php if($t2=='3') echo "active";?>"><a
                        href="#table_7_3" data-toggle="tab"> <?php  echo  Yii::t ( 'vcos', '其他福利查询' );?> </a></li>
                </ul>
                <div class="tab-content">
                    <div
                        class="tab-pane <?php if($t2=='1') echo "active";?> "
                        id="table_7_1">

                        <form id="import_7_1" method="post"
                            enctype="multipart/form-data">
                            <div
                                style="width: 50%; height: 400px; border-color: blue; border-radius: 10px 10px 10px 10px; border: 1px solid; margin: 0 auto;">
                                <h2><?php  echo  Yii::t ( 'vcos', '请选择导入文件' );?></h2>
                                <div
                                    style="width: 100%; margin: 0 auto; text-align: center; overflow: hidden; margin-top: 20px;">
                                    <input style="margin: 0 auto;"
                                        type="file" name="myFile"
                                        id="table_2_1_import"
                                        class="id-input-file-3" />
                                </div>
                                <div
                                    style="text-align: center; margin-top: 60px;">
                                    <button
                                        class="btn btn-primary  daoru_7_1">
                                        <i class="icon-ok bigger-110"></i><?php  echo  Yii::t ( 'vcos', '导入' );?>
                                    </button>
                                </div>
                                <div
                                    style="width: 100%; overflow: hidden;"></div>
                                <div
                                    style="overflow: hidden; width: 100%; margin-top: 40px; font-size: 16px;">
                                    <div
                                        style="width: 50%; text-align: left; margin-left: 35%;">
                                        <strong><?php  echo  Yii::t ( 'vcos', '模板下载:' );?></strong>
                                    </div>
                                    <div
                                        style="width: 50%; text-align: left; margin-left: 40%;">
                                        <a
                                            href="../../../download/其他福利模板表.xlsx"
                                            style="cursor: pointer;"><?php  echo  Yii::t ( 'vcos', '其他福利模板表.xlsx' );?></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div
                        class="tab-pane  <?php if($t2=='2') echo "active";?> "
                        id="table_7_2">
                           <form method="post" action=""  class="search_form">
                          <div style="overflow: hidden;">
                           <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1"><?php  echo  Yii::t ( 'vcos', '员工编码');?>
                                        </label> <input placeholder=""
                                        id="form-field-1"
                                        style="height: 34px; width: 190px;"
                                        name="employee_code"
                                        value="<?php echo $search_form['employee_code']?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        <?php  echo  Yii::t ( 'vcos', '姓名' );?> </label> <input
                                        placeholder="" id="form-field-1"
                                        style="height: 34px; width: 180px;"
                                        name="cn_name"
                                        value="<?php  echo  Yii::t ( 'vcos', $search_form['cn_name']);?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label><?php  echo  Yii::t ( 'vcos', '工资月份');?>  <select
                                        style="width: 150px; height: 34px;"
                                        name="date" size="1"
                                        aria-controls="sample-table-2">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['date'];?>"
                                                selected="selected"><?php echo $search_form['date'];?></option>
                                <?php       
                                foreach ( $otherallowance_management as $value )
                                 {      
                                 ?>
                                <option
                                                value="<?php echo  $value['date']?>"><?php echo  $value['date']?></option>
                                <?php   


                                        }
                                ?>
                                  </select> </label>
                                  </div>
                                  </div>
                        <div
                                style="overflow: hidden; margin-top: 20px;">
                                <div
                                    style="float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '部门 ');?> <select
                                        style="width: 200px; height: 34px; margin-left: 20px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="department_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['department_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['search_department_name']);?></option>

                    <?php   
                        foreach ( $Alldepartment as $row ) {
                    ?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php
                                                                                }
                                                                                
                                                                                ?>

            </select> </label>
                                </div>
                                <div
                                    style="text-align: left; float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '职务' );?>  <select
                                        style="display: inline; width: 180px; height: 34px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="post_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['post_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['post_cn_name'] );?></option>
                               <?php                

                                foreach ( $post as $row ) {
                               ?>
                    <option value="<?php echo $row['post_id']?>"><?php echo  Yii::t ( 'vcos', $row['post_cn_name'] );?></option>
                    <?php   
                            }   
                         ?>
                        </select> </label>
                                </div>
                            </div>
                            <div
                                style="margin-top: 20px; margin-bottom: 20px;"
                                class="center">
                                <button 
                                    value="<?php echo  Yii::t ( 'vcos', '搜索' );?>"
                                    name="soso"
                                    class="btn btn-purple search "
                                    type="submit">
                                     <?php  echo  Yii::t ( 'vcos', '搜索' );?><i
                                        class="icon-search  bigger-110">
                                    </i>
                                </button>
                                &nbsp; &nbsp; &nbsp;
                                <button
                                    value="<?php echo  Yii::t ( 'vcos', '清空' );?>"
                                    type="button" class="btn reset">
                                    <i class="icon-undo bigger-110"> </i>
                                    <?php  echo  Yii::t ( 'vcos', '清空' );?>
                                </button>
                            </div>
                        </form>
                        <form action="" method="post" class="form2">
                            <div id="table_middle_1"
                                class="tab-pane active"
                                style="margin-top: 10px;">
                                <div class="table-responsive">
                                    <table
                                        class="table table-striped table-bordered table-hover"
                                        id="table7_table_7_2">
                                        <thead>
                                            <tr>
                                                <th class="center"><label>
                                                        <input
                                                        class="ace checkALL"
                                                        type="checkbox">
                                                        <span
                                                        class="lbl"></span>
                                                </label></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '序号' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '工资月份' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '部门' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '职务' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '员工编码' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                              
                                                <th><?php  echo  Yii::t ( 'vcos', '福利合计' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '备注' );?></th>
                                                
                                                <th><?php  echo  Yii::t ( 'vcos', '操作' );?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
        
    
                                    $i = 0;
                         foreach ( $otherallowance_management as $row ) {
                                $i ++;  

                                  ?>
                                        <tr>
                                                <td class="center"><label>
                                                        <input
                                                        class="ace checkbox_button"
                                                        name="ids[]"
                                                        value="<?php echo $row['id'];?>"
                                                        type="checkbox">
                                                        <span
                                                        class="lbl"></span>
                                                </label></td>

                                                <td> <?php echo $i;?></td>
                                                <td class="date"><?php echo $row['date'];?></td>
                                                <td class="department_name"><?php echo $row['newdepartmentname'];?></td>
                                                <td class="post_cn_name"><?php echo $row['post_cn_name'];?></td>
                                                <td class="employee_code"><?php echo $row['employee_code'];?></td>
                                                <td class="cn_name"><?php echo $row['cn_name'];?></td>
                                                 <td class="department_id" style="display: none;"> <?php echo $row['department_id'];?></td>


                                                  <td class="id" style="display: none;"><?php echo $row['id'];?></td>

                                                  <td class="post_id" style="display: none;"><?php echo $row['post_id'];?></td>
                                               
                                                
                                                
                                               
                                                <td class="total_amount" ><?php echo $row['total_amount'];?></td>
                                                <td class="remark"><?php echo $row['remark'];?></td>

                                                <td style="display: none;"><?php echo $row['status'];?></td>
                                                <td>
                                                    <div
                                                        class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                        <a
                                                            href="#modal_table_7_form1"
                                                            data-toggle="modal"
                                                            class="change"
                                                            id="<?php echo $row['id'];?>"
                                                            title="<?php  echo  Yii::t ( 'vcos', '编辑' );?>">
                                                            <button
                                                                type="button"
                                                                class="btn btn-xs btn-info"
                                                                role="button">
                                                                <i
                                                                    class="icon-edit bigger-120"></i>
                                                            </button>
                                                        </a> <a href="#"
                                                            class="delete"
                                                            id="<?php echo $row['id'];?>"
                                                            title="<?php  echo  Yii::t ( 'vcos', '删除' );?>">
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
                                    <div
                                        style="text-align: center; margin-top: 100px;">
                                        <button
                                            style="width: 85px; height: 42px;"
                                            class="btn btn-xs btn-warning  Batch_delete_records ">
                                            <i
                                                class="icon-trash bigger-125"></i>
                                            <span
                                                class="bigger-110 no-text-shadow"><?php  echo  Yii::t ( 'vcos', '删除选中' );?></span>
                                        </button>
                                        <a href="#modal_table_7_form2"
                                            data-toggle="modal">
                                            <button class="btn btn-info"
                                                type="button">
                                                <i
                                                    class="icon-ok bigger-110"></i>
                                                <?php  echo  Yii::t ( 'vcos', '新增' );?>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div
                        class="tab-pane  <?php if($t2=='3') echo "active";?>  "
                        id="table_7_3">
                        <form method="post" action=""  class="search_form">
                                            <div style="overflow: hidden;">
                                            <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1"><?php  echo  Yii::t ( 'vcos', '员工编码');?>
                                        </label> <input placeholder=""
                                        id="form-field-1"
                                        style="height: 34px; width: 190px;"
                                        name="employee_code"
                                        value="<?php echo $search_form['employee_code']?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        <?php  echo  Yii::t ( 'vcos', '姓名' );?> </label> <input
                                        placeholder="" id="form-field-1"
                                        style="height: 34px; width: 180px;"
                                        name="cn_name"
                                        value="<?php  echo  Yii::t ( 'vcos', $search_form['cn_name']);?>"
                                        type="text">
                                </div>
                                <div
                                    style="float: left; height: 34px; margin-left: 10%;">
                                    <label><?php  echo  Yii::t ( 'vcos', '工资月份');?>  <select
                                        style="width: 150px; height: 34px;"
                                        name="date" size="1"
                                        aria-controls="sample-table-2">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['date'];?>"
                                                selected="selected"><?php echo $search_form['date'];?></option>
                                <?php       
                                foreach ( $otherallowance_management as $value )
                                 {      
                                 ?>
                                <option
                                                value="<?php echo  $value['date']?>"><?php echo  $value['date']?></option>
                                <?php   


                                        }
                                ?>
                                  </select> </label>
                                  </div>
                                  </div>
                             <div
                                style="overflow: hidden; margin-top: 20px;">
                                <div
                                    style="float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '部门 ');?> <select
                                        style="width: 200px; height: 34px; margin-left: 20px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="department_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['department_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['search_department_name']);?></option>

                    <?php   
                        foreach ( $Alldepartment as $row ) {
                    ?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php
                                                                                }
                                                                                
                                                                                ?>

            </select> </label>
                                </div>
                                <div
                                    style="text-align: left; float: left; margin-left: 10%;">
                                    <label style=""><?php  echo  Yii::t ( 'vcos', '职务' );?>  <select
                                        style="display: inline; width: 180px; height: 34px;"
                                        aria-controls="sample-table-2"
                                        size="1" name="post_id">
                                            <option value=""></option>
                                            <option
                                                value="<?php echo $search_form['post_id']?>"
                                                selected="selected"><?php  echo  Yii::t ( 'vcos', $search_form['post_cn_name'] );?></option>
                               <?php                

                                foreach ( $post as $row ) {
                               ?>
                    <option value="<?php echo $row['post_id']?>"><?php echo  Yii::t ( 'vcos', $row['post_cn_name'] );?></option>
                    <?php   
                            }   
                         ?>
                        </select> </label>
                                </div>
                            </div>
                               <div
                                style="margin-top: 20px; margin-bottom: 20px;">
                                <button style="margin-left: 20%;"
                                    value="搜索" name="soso"
                                    class="btn btn-purple search "
                                    type="submit">
                                    <?php  echo  Yii::t ( 'vcos', '搜索' );?> <i
                                        class="icon-search  bigger-110">
                                    </i>
                                </button>
                                <button value="清空" type="button"
                                    style="margin-left: 10%;"
                                    class="btn reset">
                                    <i class="icon-undo bigger-110"> </i>
                                    <?php  echo  Yii::t ( 'vcos', '清空' );?>
                                </button>
                                <button class="btn btn-info export"
                                    style="margin-left: 10%;"
                                    type="button">
                                    <i class="icon-ok bigger-110"></i>
                                    <?php  echo  Yii::t ( 'vcos', '导出' );?>
                                </button>
                            </div>
                        </form>


                        <form action="" method="post" class="form2">
                            <div id="table_middle_1"
                                class="tab-pane active"
                                style="margin-top: 10px;">
                                <div class="table-responsive">
                                    <table
                                        class="table table-striped table-bordered table-hover"
                                        id="sample-table-1">
                                        <thead>
                                            <tr>
                                                
                                                <th><?php  echo  Yii::t ( 'vcos', '序号' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '工资月份' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '部门' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '职务' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '员工编码' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '姓名' );?></th>
                                              
                                                <th><?php  echo  Yii::t ( 'vcos', '福利合计' );?></th>
                                                <th><?php  echo  Yii::t ( 'vcos', '备注' );?></th>
                                                
                                            </tr>
                                        </thead>
                                   <tbody>

                                    <?php
        
    
                                    $i = 0;
                         foreach ( $otherallowance_management as $row ) {
                                $i ++;  

                                  ?>
                                        <tr>
                                                
                                                <td> <?php echo $i;?></td>
                                                <td><?php echo $row['date'];?></td>
                                                <td><?php echo $row['newdepartmentname'];?></td>
                                                <td><?php echo $row['post_cn_name'];?></td>
                                                <td><?php echo $row['employee_code'];?></td>
                                                <td><?php echo $row['cn_name'];?></td>
                                               
                                                
                                                
                                               
                                                <td><?php echo $row['total_amount'];?></td>
                                                <td ><?php echo $row['remark'];?></td>

                                                <td style="display: none;"><?php echo $row['status'];?></td>
                                                
                                            </tr>
                                        <?php     
                                        }     ?>
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
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
        <i class="icon-hand-right blue bigger-120"></i> 确定吗？
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
        <i class="icon-hand-right blue bigger-120"></i> 确定吗？
    </p>
</div>

<!-- 加班工资弹出编辑框  table_2_2  开始 -->

<div id="modal_table_2_form1" class="modal" tabindex="-1">
    <div class="modal-dialog" style="width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="blue bigger">请编辑以下内容</h4>
            </div>
            <div class="modal-body overflow-visible">
                <div class="center">
                    <form novalidate="novalidate" class="form-horizontal" role="form" method="post" action="/data/data_post_add" id="table3_form_add" autocomplete="off">
                        
                          <div style="overflow: hidden; ">
                                <div style="float: left; margin-left: 10%;">
                                    <label style=""> 部门 <select style="width: 200px; height: 34px; margin-left: 20px;" aria-controls="sample-table-2" size="1" 
                                    class="department_id"
                                    name="department_id"
                                    >
                                    <option value=""></option>

                                      <?php   
                        foreach ( $Alldepartment as $row ) {
                    ?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php                                                       }    ?>
                                                   
                 
                    
                                     </select>
                                    </label>
                                </div>
                                <div style="text-align: left; float: left; margin-left: 10%;">
                                    <label style=""> 职务 <select style="display: inline; width: 200px; height: 34px;" aria-controls="sample-table-2" size="1"name="post_id"  class="post_id" 
                                    >

                                   

                                        
                                            </select>
                                    </label>
                                </div>
                            </div>
                            <div style="overflow: hidden; margin-top: 20px;">
                                <div style="float: left; margin-left: 10%;">
                                    <label style=""> 员工姓名 <select style="width: 200px; height: 34px; " aria-controls="sample-table-2" size="1" name="cn_name"  class="cn_name" >
                                            <option value="" selected="selected"></option>
                                      
                                     </select>
                                    </label>
                                </div>
                                <div style="float: left; height: 34px; margin-left: 9%;">
                                    <label style="" for="form-field-1">
                                        员工编码 </label> <input placeholder="" readonly="readonly" class="employee_code" style="height: 34px; width: 180px;" name="employee_code" value="" type="text">
                                </div>
                            </div>

                            <div style="float: left; height: 34px; margin-left: 10%;margin-bottom: 20px;margin-top: 20px;">

                               <label style="" for="form-field-1">
                                        工资月份  </label> <input placeholder="" id="form-field-1" style="height: 34px; width: 180px;"class="date"  name="date" value="" type="text">
                                    <label> 
                                           
                                    </label>
                                </div>

                            <div style="overflow: hidden; margin-top: 20px;width: 100%;">
                               <div style="float: left; height: 34px; margin-left: 10%;">

                               <label style="" for="form-field-1">
                                       日班班数 </label> <input placeholder="" id="form-field-1" style="height: 34px; width: 180px;"class="day_times"  name="day_times" value="" type="text">
                                    <label> 
                                           
                                    </label>
                                </div>
                                <div style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        日班工资 </label> <input placeholder="" class="day_salary" style="height: 34px; width: 180px;" name="day_salary" value="" type="text">
                                </div>
                            </div>

                            <div style="overflow: hidden; margin-top: 20px;">
                               <div style="float: left; height: 34px; margin-left: 10%;">

                               <label style="" for="form-field-1">
                                        夜班班数  </label> <input placeholder="" id="form-field-1" style="height: 34px; width: 180px;"class="night_times"  name="night_times" value="" type="text">
                                    <label> 
                                           
                                    </label>
                                </div>
                                <div style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        夜班工资 </label> <input placeholder="" class="night_salary" style="height: 34px; width: 180px;" name="night_salary" value="" type="text">
                                </div>
                            </div>

                            <div style="overflow: hidden; margin-top: 20px;">
                    <div style="float: left; height: 34px; margin-left: 10%;line-height: 34px;">
                    备注:</div>
                    <div>

                    <textarea name="remark" class="autosize-transition remark"  style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 80px;width: 475px;"></textarea>
                    
                </div>
                </div>        
                </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="icon-remove"></i> 取消
                    </button>
                    <button class="btn btn-sm btn-primary table2_edit_save">
                        <i class="icon-ok"></i> 保存
                    </button>
                </div>
            </div>
        </div>
    </div>
   </div>

<!-- 加班工资出编辑框  table_2_2  结束 -->
<div id="modal_table_2_form2" class="modal" tabindex="-1">
    <div class="modal-dialog" style="width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="blue bigger">请编辑以下内容</h4>
            </div>
            <div class="modal-body overflow-visible">
                <div class="center">
                    <form novalidate="novalidate" class="form-horizontal" role="form" method="post" action="/data/data_post_add" id="table3_form_add" autocomplete="off">
                        
                          <div style="overflow: hidden; ">
                                <div style="float: left; margin-left: 10%;">
                                    <label style=""> 部门 <select style="width: 200px; height: 34px; margin-left: 20px;" aria-controls="sample-table-2" size="1" 
                                    class="department_id"
                                    name="department_id"
                                    >
                                    <option value=""></option>

                                      <?php   
                        foreach ( $Alldepartment as $row ) {
                    ?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php                                                       }    ?>
                                                   
                 
                    
                                     </select>
                                    </label>
                                </div>
                                <div style="text-align: left; float: left; margin-left: 10%;">
                                    <label style=""> 职务 <select style="display: inline; width: 200px; height: 34px;" aria-controls="sample-table-2" size="1"name="post_id"  class="post_id" 
                                    >

                                   

                                        
                                            </select>
                                    </label>
                                </div>
                            </div>
                            <div style="overflow: hidden; margin-top: 20px;">
                                <div style="float: left; margin-left: 10%;">
                                    <label style=""> 员工姓名 <select style="width: 200px; height: 34px; " aria-controls="sample-table-2" size="1" name="cn_name"  class="cn_name" >
                                            <option value="" selected="selected"></option>
                                      
                                     </select>
                                    </label>
                                </div>
                                <div style="float: left; height: 34px; margin-left: 9%;">
                                    <label style="" for="form-field-1">
                                        员工编码 </label> <input placeholder="" readonly="readonly" class="employee_code" style="height: 34px; width: 180px;" name="employee_code" value="" type="text">
                                </div>
                            </div>

                            <div style="float: left; height: 34px; margin-left: 10%;margin-bottom: 20px;margin-top: 20px;">

                               <label style="" for="form-field-1">
                                        工资月份  </label> <input placeholder="" id="form-field-1" style="height: 34px; width: 180px;"class="date"  name="date" value="" type="text">
                                    <label> 
                                           
                                    </label>
                                </div>

                            <div style="overflow: hidden; margin-top: 20px;width: 100%;">
                               <div style="float: left; height: 34px; margin-left: 10%;">

                               <label style="" for="form-field-1">
                                       日班班数 </label> <input placeholder="" id="form-field-1" style="height: 34px; width: 180px;"class="day_times"  name="day_times" value="" type="text">
                                    <label> 
                                           
                                    </label>
                                </div>
                                <div style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        日班工资 </label> <input placeholder="" class="day_salary" style="height: 34px; width: 180px;" name="day_salary" value="" type="text">
                                </div>
                            </div>

                            <div style="overflow: hidden; margin-top: 20px;">
                               <div style="float: left; height: 34px; margin-left: 10%;">

                               <label style="" for="form-field-1">
                                        夜班班数  </label> <input placeholder="" id="form-field-1" style="height: 34px; width: 180px;"class="night_times"  name="night_times" value="" type="text">
                                    <label> 
                                           
                                    </label>
                                </div>
                                <div style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        夜班工资 </label> <input placeholder="" class="night_salary" style="height: 34px; width: 180px;" name="night_salary" value="" type="text">
                                </div>
                            </div>

                            <div style="overflow: hidden; margin-top: 20px;">
                    <div style="float: left; height: 34px; margin-left: 10%;line-height: 34px;">
                    备注:</div>
                    <div>

                    <textarea name="remark" class="autosize-transition remark"  style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 80px;width: 475px;"></textarea>
                    
                </div>
                </div>        
                </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="icon-remove"></i> 取消
                    </button>
                    <button class="btn btn-sm btn-primary table2_add_save">
                        <i class="icon-ok"></i> 保存
                    </button>
                </div>
            </div>
        </div>
    </div>
   </div>
<!-- 加班工资弹出编辑框  table_2_2  开始 -->



<!-- 加班工资出编辑框  table_2_2  结束 -->



<!-- 福利弹出编辑框  table_5_2  开始 -->

<div id="modal_table_5_form1" class="modal" tabindex="-1">
    <div class="modal-dialog" style="width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="blue bigger">请编辑以下内容</h4>
            </div>
            <div class="modal-body overflow-visible">
                <div class="center">
                    <form novalidate="novalidate" class="form-horizontal" role="form" method="post" action="/data/data_post_add" id="table3_form_add" autocomplete="off">
                        
                          <div style="overflow: hidden; ">
                                <div style="float: left; margin-left: 10%;">
                                    <label style=""> 部门 <select style="width: 200px; height: 34px; margin-left: 20px;" aria-controls="sample-table-2" size="1" 
                                    class="department_id"
                                    name="department_id"
                                    >
                                    <option value=""></option>

                                      <?php   
                        foreach ( $Alldepartment as $row ) {
                    ?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php                                                       }    ?>
                                                   
                 
                    
                                     </select>
                                    </label>
                                </div>
                                <div style="text-align: left; float: left; margin-left: 10%;">
                                    <label style=""> 职务 <select style="display: inline; width: 200px; height: 34px;" aria-controls="sample-table-2" size="1"name="post_id"  class="post_id" 
                                    >

                                   

                                        
                                            </select>
                                    </label>
                                </div>
                            </div>
                            <div style="overflow: hidden; margin-top: 20px;">
                                <div style="float: left; margin-left: 10%;">
                                    <label style=""> 员工姓名 <select style="width: 200px; height: 34px; " aria-controls="sample-table-2" size="1" name="cn_name"  class="cn_name" >
                                            <option value="" selected="selected"></option>
                                      
                                     </select>
                                    </label>
                                </div>
                                <div style="float: left; height: 34px; margin-left: 9%;">
                                    <label style="" for="form-field-1">
                                        员工编码 </label> <input placeholder="" readonly="readonly" class="employee_code" style="height: 34px; width: 180px;" name="employee_code" value="" type="text">
                                </div>
                            </div>


                            <div style="overflow: hidden; margin-top: 20px;">
                               <div style="float: left; height: 34px; margin-left: 10%;">

                               <label style="" for="form-field-1">
                                        工资月份  </label> <input placeholder="" id="form-field-1" style="height: 34px; width: 180px;"class="date"  name="date" value="" type="text">
                                    <label> 
                                           
                                    </label>
                                </div>
                                <div style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        税收合计 </label> <input placeholder="" class="tax_amount" style="height: 34px; width: 180px;" name="tax_amount" value="" type="text">
                                </div>
                            </div>

                            <div style="overflow: hidden; margin-top: 20px;">
                    <div style="float: left; height: 34px; margin-left: 10%;line-height: 34px;">
                    备注:</div>
                    <div>

                    <textarea name="remark" class="autosize-transition remark"  style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 80px;width: 475px;"></textarea>
                    
                </div>
                </div>        
                </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="icon-remove"></i> 取消
                    </button>
                    <button class="btn btn-sm btn-primary table5_edit_save">
                        <i class="icon-ok"></i> 保存
                    </button>
                </div>
            </div>
        </div>
    </div>
   </div>

<!-- 福利弹出编辑框  table_5_2  结束 -->


<!-- 福利弹出新增框  table_5_2  开始 -->

<div id="modal_table_5_form2" class="modal" tabindex="-1">
    <div class="modal-dialog" style="width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="blue bigger">请编辑以下内容</h4>
            </div>
            <div class="modal-body overflow-visible">
                <div class="center">
                    <form novalidate="novalidate" class="form-horizontal" role="form" method="post" action="/data/data_post_add" id="table3_form_add" autocomplete="off">
                        
                          <div style="overflow: hidden; ">
                                <div style="float: left; margin-left: 10%;">
                                    <label style=""> 部门 <select style="width: 200px; height: 34px; margin-left: 20px;" aria-controls="sample-table-2" size="1" 
                                    class="department_id"
                                    name="department_id"
                                    >
                                    <option value=""></option>

                                      <?php   
                        foreach ( $Alldepartment as $row ) {
                    ?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php                                                       }    ?>
                                                   
                 
                    
                                     </select>
                                    </label>
                                </div>
                                <div style="text-align: left; float: left; margin-left: 10%;">
                                    <label style=""> 职务 <select style="display: inline; width: 200px; height: 34px;" aria-controls="sample-table-2" size="1"name="post_id"  class="post_id" 
                                    >

                                   

                                        
                                            </select>
                                    </label>
                                </div>
                            </div>
                            <div style="overflow: hidden; margin-top: 20px;">
                                <div style="float: left; margin-left: 10%;">
                                    <label style=""> 员工姓名 <select style="width: 200px; height: 34px; " aria-controls="sample-table-2" size="1" name="cn_name"  class="cn_name" >
                                            <option value="" selected="selected"></option>
                                      
                                     </select>
                                    </label>
                                </div>
                                <div style="float: left; height: 34px; margin-left: 9%;">
                                    <label style="" for="form-field-1">
                                        员工编码 </label> <input placeholder="" readonly="readonly" class="employee_code" style="height: 34px; width: 180px;" name="employee_code" value="" type="text">
                                </div>
                            </div>


                            <div style="overflow: hidden; margin-top: 20px;">
                               <div style="float: left; height: 34px; margin-left: 10%;">

                               <label style="" for="form-field-1">
                                        工资月份  </label> <input placeholder="" id="form-field-1" style="height: 34px; width: 180px;"class="date"  name="date" value="" type="text">
                                    <label> 
                                           
                                    </label>
                                </div>
                                <div style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        税收合计 </label> <input placeholder="" class="tax_amount" style="height: 34px; width: 180px;" name="tax_amount" value="" type="text">
                                </div>
                            </div>

                            <div style="overflow: hidden; margin-top: 20px;">
                    <div style="float: left; height: 34px; margin-left: 10%;line-height: 34px;">
                    备注:</div>
                    <div>

                    <textarea name="remark" class="autosize-transition remark"  style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 80px;width: 475px;"></textarea>
                    
                </div>
                </div>        
                </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="icon-remove"></i> 取消
                    </button>
                    <button class="btn btn-sm btn-primary table5_add_save">
                        <i class="icon-ok"></i> 保存
                    </button>
                </div>
            </div>
        </div>
    </div>
   </div>

<!-- 弹出新增框  table_5_2  结束 -->
<!-- 6666弹出新增框 -->
<div id="modal_table_6_form2" class="modal" tabindex="-1">
    <div class="modal-dialog" style="width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="blue bigger">请编辑以下内容</h4>
            </div>
            <div class="modal-body overflow-visible">
                <div class="center">
                    <form novalidate="novalidate" class="form-horizontal" role="form" method="post" action="/data/data_post_add" id="table3_form_add" autocomplete="off">
                        
                          <div style="overflow: hidden; ">
                                <div style="float: left; margin-left: 10%;">
                                    <label style=""> 部门 <select style="width: 200px; height: 34px; margin-left: 20px;" aria-controls="sample-table-2" size="1" 
                                    class="department_id"
                                    name="department_id"
                                    >
                                    <option value=""></option>

                                      <?php   
                        foreach ( $Alldepartment as $row ) {
                    ?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php                                                       }    ?>
                                                   
                 
                    
                                     </select>
                                    </label>
                                </div>
                                <div style="text-align: left; float: left; margin-left: 10%;">
                                    <label style=""> 职务 <select style="display: inline; width: 200px; height: 34px;" aria-controls="sample-table-2" size="1"name="post_id"  class="post_id" 
                                    >

                                   

                                        
                                            </select>
                                    </label>
                                </div>
                            </div>
                            <div style="overflow: hidden; margin-top: 20px;">
                                <div style="float: left; margin-left: 10%;">
                                    <label style=""> 员工姓名 <select style="width: 200px; height: 34px; " aria-controls="sample-table-2" size="1" name="cn_name"  class="cn_name" >
                                            <option value="" selected="selected"></option>
                                      
                                     </select>
                                    </label>
                                </div>
                                <div style="float: left; height: 34px; margin-left: 9%;">
                                    <label style="" for="form-field-1">
                                        员工编码 </label> <input placeholder="" readonly="readonly" class="employee_code" style="height: 34px; width: 180px;" name="employee_code" value="" type="text">
                                </div>
                            </div>


                            <div style="overflow: hidden; margin-top: 20px;">
                               <div style="float: left; height: 34px; margin-left: 10%;">

                               <label style="" for="form-field-1">
                                        工资月份  </label> <input placeholder="" id="form-field-1" style="height: 34px; width: 180px;"class="date"  name="date" value="" type="text">
                                    <label> 
                                           
                                    </label>
                                </div>
                                <div style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        金额合计 </label> <input placeholder="" class="total_amount" style="height: 34px; width: 180px;" name="total_amount" readonly="readonly" value="" type="text">
                                </div>
                            </div>

                             <div style=" height: 34px; margin-left: 10%;margin-top: 20px;float: left;">
                                    <label style="" for="form-field-1">
                                        交通通讯补贴 </label> <input placeholder="" class="allowance_amount" style="height: 34px; width: 180px;" name="allowance_amount"  value="" type="text">
                                </div>

                            <div style="overflow: hidden; width: 100%;margin-top: 80px;">
                    <div style="float: left; height: 34px; margin-left: 10%;line-height: 34px; ">
                    备注:</div>
                    <div>

                    <textarea name="remark" class="autosize-transition remark"  style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 80px;width: 475px;"></textarea>
                    
                </div>
                </div>        
                </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="icon-remove"></i> 取消
                    </button>
                    <button class="btn btn-sm btn-primary table6_add_save">
                        <i class="icon-ok"></i> 保存
                    </button>
                </div>
            </div>
        </div>
    </div>
   </div>


<!-- 666 -->



<!-- 福利弹出编辑框  table_6_2  开始 -->

<div id="modal_table_6_form1" class="modal" tabindex="-1">
    <div class="modal-dialog" style="width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="blue bigger">请编辑以下内容</h4>
            </div>
            <div class="modal-body overflow-visible">
                <div class="center">
                    <form novalidate="novalidate" class="form-horizontal" role="form" method="post" action="/data/data_post_add" id="table3_form_add" autocomplete="off">
                        
                          <div style="overflow: hidden; ">
                                <div style="float: left; margin-left: 10%;">
                                    <label style=""> 部门 <select style="width: 200px; height: 34px; margin-left: 20px;" aria-controls="sample-table-2" size="1" 
                                    class="department_id"
                                    name="department_id"
                                    >
                                    <option value=""></option>

                                      <?php   
                        foreach ( $Alldepartment as $row ) {
                    ?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php                                                       }    ?>
                                                   
                 
                    
                                     </select>
                                    </label>
                                </div>
                                <div style="text-align: left; float: left; margin-left: 10%;">
                                    <label style=""> 职务 <select style="display: inline; width: 200px; height: 34px;" aria-controls="sample-table-2" size="1"name="post_id"  class="post_id" 
                                    >

                                   

                                        
                                            </select>
                                    </label>
                                </div>
                            </div>
                            <div style="overflow: hidden; margin-top: 20px;">
                                <div style="float: left; margin-left: 10%;">
                                    <label style=""> 员工姓名 <select style="width: 200px; height: 34px; " aria-controls="sample-table-2" size="1" name="cn_name"  class="cn_name" >
                                            <option value="" selected="selected"></option>
                                      
                                     </select>
                                    </label>
                                </div>
                                <div style="float: left; height: 34px; margin-left: 9%;">
                                    <label style="" for="form-field-1">
                                        员工编码 </label> <input placeholder="" readonly="readonly" class="employee_code" style="height: 34px; width: 180px;" name="employee_code" value="" type="text">
                                </div>
                            </div>


                            <div style="overflow: hidden; margin-top: 20px;">
                               <div style="float: left; height: 34px; margin-left: 10%;">

                               <label style="" for="form-field-1">
                                        工资月份  </label> <input placeholder="" id="form-field-1" style="height: 34px; width: 180px;"class="date"  name="date" value="" type="text">
                                    <label> 
                                           
                                    </label>
                                </div>
                                <div style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        金额合计 </label> <input placeholder="" class="total_amount" style="height: 34px; width: 180px;" name="total_amount" readonly="readonly" value="" type="text">
                                </div>
                            </div>

                             <div style=" height: 34px; margin-left: 10%;margin-top: 20px;float: left;">
                                    <label style="" for="form-field-1">
                                        交通通讯补贴 </label> <input placeholder="" class="allowance_amount" style="height: 34px; width: 180px;" name="allowance_amount"  value="" type="text">
                                </div>

                            <div style="overflow: hidden; width: 100%;margin-top: 80px;">
                    <div style="float: left; height: 34px; margin-left: 10%;line-height: 34px; ">
                    备注:</div>
                    <div>

                    <textarea name="remark" class="autosize-transition remark"  style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 80px;width: 475px;"></textarea>
                    
                </div>
                </div>        
                </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="icon-remove"></i> 取消
                    </button>
                    <button class="btn btn-sm btn-primary table6_edit_save">
                        <i class="icon-ok"></i> 保存
                    </button>
                </div>
            </div>
        </div>
    </div>
   </div>

<!-- 福利弹出编辑框  table_6_2  结束 -->


<!-- 666 -->

<!-- 福利弹出编辑框  table_7_2  开始 -->

<div id="modal_table_7_form1" class="modal" tabindex="-1">
    <div class="modal-dialog" style="width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="blue bigger">请编辑以下内容</h4>
            </div>
            <div class="modal-body overflow-visible">
                <div class="center">
                    <form novalidate="novalidate" class="form-horizontal" role="form" method="post" action="/data/data_post_add" id="table3_form_add" autocomplete="off">
                        
                          <div style="overflow: hidden; ">
                                <div style="float: left; margin-left: 10%;">
                                    <label style=""> 部门 <select style="width: 200px; height: 34px; margin-left: 20px;" aria-controls="sample-table-2" size="1" 
                                    class="department_id"
                                    name="department_id"
                                    >
                                    <option value=""></option>

                                      <?php   
                        foreach ( $Alldepartment as $row ) {
                    ?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php                                                       }    ?>
                                                   
                 
                    
                                     </select>
                                    </label>
                                </div>
                                <div style="text-align: left; float: left; margin-left: 10%;">
                                    <label style=""> 职务 <select style="display: inline; width: 200px; height: 34px;" aria-controls="sample-table-2" size="1"name="post_id"  class="post_id" 
                                    >

                                   

                                        
                                            </select>
                                    </label>
                                </div>
                            </div>
                            <div style="overflow: hidden; margin-top: 20px;">
                                <div style="float: left; margin-left: 10%;">
                                    <label style=""> 员工姓名 <select style="width: 200px; height: 34px; " aria-controls="sample-table-2" size="1" name="cn_name"  class="cn_name" >
                                            <option value="" selected="selected"></option>
                                      
                                     </select>
                                    </label>
                                </div>
                                <div style="float: left; height: 34px; margin-left: 9%;">
                                    <label style="" for="form-field-1">
                                        员工编码 </label> <input placeholder="" readonly="readonly" class="employee_code" style="height: 34px; width: 180px;" name="employee_code" value="" type="text">
                                </div>
                            </div>


                            <div style="overflow: hidden; margin-top: 20px;">
                               <div style="float: left; height: 34px; margin-left: 10%;">

                               <label style="" for="form-field-1">
                                        工资月份  </label> <input placeholder="" id="form-field-1" style="height: 34px; width: 180px;"class="date"  name="date" value="" type="text">
                                    <label> 
                                           
                                    </label>
                                </div>
                                <div style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        福利合计 </label> <input placeholder="" class="total_amount" style="height: 34px; width: 180px;" name="total_amount" value="" type="text">
                                </div>
                            </div>

                            <div style="overflow: hidden; margin-top: 20px;">
                    <div style="float: left; height: 34px; margin-left: 10%;line-height: 34px;">
                    备注:</div>
                    <div>

                    <textarea name="remark" class="autosize-transition remark"  style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 80px;width: 475px;"></textarea>
                    
                </div>
                </div>        
                </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="icon-remove"></i> 取消
                    </button>
                    <button class="btn btn-sm btn-primary table7_edit_save">
                        <i class="icon-ok"></i> 保存
                    </button>
                </div>
            </div>
        </div>
    </div>
   </div>

<!-- 福利弹出编辑框  table_7_2  结束 -->

<!-- 福利新增弹出编辑框  table_7_2  开始 -->


<div id="modal_table_7_form2" class="modal" tabindex="-1">
    <div class="modal-dialog" style="width: 700px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="blue bigger">请编辑以下内容</h4>
            </div>
            <div class="modal-body overflow-visible">
                <div class="center">
                    <form novalidate="novalidate" class="form-horizontal" role="form" method="post"  autocomplete="off">
                        
                          <div style="overflow: hidden; ">
                                <div style="float: left; margin-left: 10%;">
                                    <label style=""> 部门 <select style="width: 200px; height: 34px; margin-left: 20px;" aria-controls="sample-table-2" size="1" 
                                    class="department_id"
                                    name="department_id"
                                    >
                                    <option value=""></option>

                                      <?php   
                        foreach ( $Alldepartment as $row ) {
                    ?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php                                                       }    ?>
                                                   
                 
                    
                                     </select>
                                    </label>
                                </div>
                                <div style="text-align: left; float: left; margin-left: 10%;">
                                    <label style=""> 职务 <select style="display: inline; width: 200px; height: 34px;" aria-controls="sample-table-2" size="1"name="post_id"  class="post_id" 
                                    >

                                   

                                        
                                            </select>
                                    </label>
                                </div>
                            </div>
                            <div style="overflow: hidden; margin-top: 20px;">
                                <div style="float: left; margin-left: 10%;">
                                    <label style=""> 员工姓名 <select style="width: 200px; height: 34px; " aria-controls="sample-table-2" size="1" name="cn_name"  class="cn_name" >
                                            <option value="" selected="selected"></option>
                                      
                                     </select>
                                    </label>
                                </div>
                                <div style="float: left; height: 34px; margin-left: 9%;">
                                    <label style="" for="form-field-1">
                                        员工编码 </label> <input placeholder="" readonly="readonly" class="employee_code" style="height: 34px; width: 180px;" name="employee_code" value="" type="text">
                                </div>
                            </div>


                            <div style="overflow: hidden; margin-top: 20px;">
                               <div style="float: left; height: 34px; margin-left: 10%;">

                               <label style="" for="form-field-1">
                                        工资月份  </label> <input placeholder="" id="form-field-1" style="height: 34px; width: 180px;"class="date"  name="date" value="" type="text">
                                    <label> 
                                           
                                    </label>
                                </div>
                                <div style="float: left; height: 34px; margin-left: 10%;">
                                    <label style="" for="form-field-1">
                                        福利合计 </label> <input placeholder="" class="total_amount" style="height: 34px; width: 180px;" name="total_amount" value="" type="text">
                                </div>
                            </div>

                            <div style="overflow: hidden; margin-top: 20px;">
                    <div style="float: left; height: 34px; margin-left: 10%;line-height: 34px;">
                    备注:</div>
                    <div>

                    <textarea name="remark" class="autosize-transition remark"  style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 80px;width: 475px;"></textarea>
                    
                </div>
                </div>        
                </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="icon-remove"></i> 取消
                    </button>
                    <button class="btn btn-sm btn-primary table7_add_save">
                        <i class="icon-ok"></i> 保存
                    </button>
                </div>
            </div>
        </div>
    </div>
   </div>
<!-- 福利新增弹出编辑框  table_7_2  结束 -->








<?php

 require_once 'calculate_js.php';

?>