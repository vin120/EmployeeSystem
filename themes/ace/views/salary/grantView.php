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
<style type="text/css">
* {margin：0 auto;
	list-style: none;
}

#title {
	margin-left: 3%;
	font-weight: bold;
	color: #666;
	width: 105px;
	font-size: 16px;
	margin-top: -15px;
}

#one {
	width: 70%;
	height: 67px;
	border: 1px solid black;
	border-radius: 2px;
	margin: auto auto;
	position: relative;
	margin-top: 5%;
}

#center {
	width: 35%;
	height: 220px;
	border: 1px solid #000;
	border-radius: 10px;
	margin: 10% auto;
}

#zi {
	border: #0099CC solid 1px;
	border-radius: 5px;
	color: white;
	background-color: #63F;
	width: 15%;
	height: 15%;
	line-height: 28px;
	font-weight: bold;
	display: inline-block;
	text-decoration: none;
	text-align: center;
	margin: 2% 42%;
}

#tit {
	margin-top: -15px;
	margin-left: 3%;
	font-weight: bold;
	color: #666;
	width: 105px;
	font-size: 16px
}
</style>
<div id="table_type" style="display: none"><?php echo $table_type;?></div>
<div class="tabbable">
    <ul class="nav nav-tabs padding-12 tab-color-blue background-blue"
        id="myTab4">
        <li class="<?php if($table_type=='1') echo "active";?>"><a
            data-toggle="tab" href="#table_middle_1"><?php echo Yii::t('vcos','基本工资生成');?>  </a></li>
        <li class="<?php if($table_type=='2') echo "active";?>"><a
            data-toggle="tab" href="#table_middle_2"> <?php echo Yii::t('vcos','基本工资未发放');?></a></li>
        <li class="<?php if($table_type=='3') echo "active";?>"><a
            data-toggle="tab" href="#table_middle_3"> <?php echo Yii::t('vcos','基本工资已发放');?> </a></li>
    </ul>
</div>
<div class="tab-content">
    <div id="table_middle_1"
        class="tab-pane <?php if($table_type=='1') echo "active";?>">
        <form action="<?php echo Yii::app()->request->url;?>"
            method="post">
            <div
                style="border: 1px solid; width: 50%; margin-top: 100px; margin-left: auto; margin-right: auto; border-radius: 10px ! important;">
                <div style="border-bottom: 1px solid;">
                    <h3><?php echo Yii::t('vcos','基本工资生成');?></h3>
                </div>
                <div>
                    <table id="sample-table-2"
                        class="table table-striped table-bordered ">
                        <tbody>
                            <tr>
                                <td
                                    style="text-align: right; line-height: 35px;"><label>
                                        <?php echo Yii::t('vcos','选择年月：');?></label></td>
                                <td><label> <select name="gongzi[year]"
                                        size="1"
                                        aria-controls="sample-table-2">
                                            <option>2013</option>
                                            <option>2014</option>
                                            <option>2015</option>
                                            <option>2016</option>
                                            <option>2017</option>
                                    </select><?php echo Yii::t('vcos','年');?>
                                </label> <label> <select
                                        name="gongzi[month]" size="1"
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
                                    </select><?php echo Yii::t('vcos','月');?>
                                </label></td>
                            </tr>
                            <tr>
                                <td
                                    style="text-align: right; line-height: 35px;"><?php echo Yii::t('vcos','选择员工编码：');?></td>
                                <td><input placeholder=""
                                    id="form-field-1"
                                    name="gongzi[employee_code]"
                                    value="" type="text"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="margin-bottom: 10px;" class="center">
                    <button class="btn btn-primary" type="submit"><?php echo Yii::t('vcos','生成');?></button>
                </div>
                <div style="margin-left: 5%;">
                    <table id="sample-table-2"
                        class="table table-striped table-bordered ">
                        <tbody>
                            <tr>
                                <td><?php echo Yii::t('vcos','1、年月项为必填项；');?></td>
                            </tr>
                            <tr>
                                <td><?php echo Yii::t('vcos','2、员工编码为可选项；');?></td>
                            </tr>
                            <tr>
                                <td><?php echo Yii::t('vcos','3、重新生成工资将删除该月份（或指定员工）原有的记录，生成新的记录；');?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
    <div id="table_middle_2"
        class="tab-pane <?php if($table_type=='2') echo "active";?>">
        <div style="">
            <form method="post"
                action="<?php echo Yii::app()->createUrl("salary/salary_grant/table_type/2");?>"
                id="table2_form">
                <div style="overflow: hidden;">
                    <div
                        style="float: left; height: 34px; margin-left: 10%;">
                        <label style="" for="form-field-1"> <?php echo Yii::t('vcos','员工编码');?></label>
                        <input placeholder="" id="form-field-1"
                            style="height: 34px; width: 190px;"
                            name="employee_code"
                            value="<?php echo $search_form['employee_code']?>"
                            type="text">
                    </div>
                    <div
                        style="float: left; height: 34px; margin-left: 10%;">
                        <label style="" for="form-field-1"> <?php echo Yii::t('vcos','姓名');?> </label>
                        <input placeholder="" id="form-field-1"
                            style="height: 34px; width: 180px;"
                            name="cn_name"
                            value="<?php echo $search_form['cn_name']?>"
                            type="text">
                    </div>
                    <div
                        style="float: left; height: 34px; margin-left: 10%;">
                        <label> <?php echo Yii::t('vcos','工资月份');?> <select
                            style="width: 150px; height: 34px;"
                            name="date" size="1"
                            aria-controls="sample-table-2">
                                <option value=""></option>
                                <option
                                    value="<?php echo $search_form['date'];?>"
                                    selected="selected"><?php echo $search_form['date'];?></option>
                                <?php			
                        foreach ( $gongzi_date as $value ) {					?>
                                <option
                                    value="<?php echo  $value['date']?>"><?php echo  $value['date']?></option>
                                <?php	
                                }
                                ?>
                        </select>
                        </label>
                    </div>
                </div>
                <div style="overflow: hidden; margin-top: 20px;">
                    <div style="float: left; margin-left: 10%;">
                        <label style="">  <?php echo Yii::t('vcos','部门');?><select
                            style="width: 200px; height: 34px; margin-left: 20px;"
                            aria-controls="sample-table-2" size="1"
                            name="department_id">
                                <option value=""></option>
                                <option
                                    value="<?php echo $search_form['department_id']?>"
                                    selected="selected"><?php echo $search_form['search_department_name']?></option>
                               
                    <?php											foreach ( $Alldepartment as $row ) {			?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php											}		
                 	?>
                   
            </select>
                        </label>
                    </div>
                    <div
                        style="text-align: left; float: left; margin-left: 10%;">
                        <label style="">  <?php echo Yii::t('vcos','职务');?><select
                            style="display: inline; width: 180px; height: 34px;"
                            aria-controls="sample-table-2" size="1"
                            name="post_id">
                                <option value=""></option>
                                <option
                                    value="<?php echo $search_form['post_id']?>"
                                    selected="selected"><?php echo $search_form['post_cn_name'];?></option>
                               <?php	
                               foreach ( $post as $row )
                                {	
                                    ?>
                    <option value="<?php echo $row['post_id']?>"><?php echo  Yii::t ( 'vcos', $row['post_cn_name'] );?></option>
                    <?php		
                     }
                     ?>
                        </select>
                        </label>
                    </div>
                </div>
                <div style="margin-top: 20px; margin-bottom: 20px;"
                    class="center">
                    <button style="margin-left: -10%;" value="搜索"
                        name="soso" class="btn btn-purple search "
                        type="submit">
                         <?php echo Yii::t('vcos','搜索');?><i class="icon-search  bigger-110"> </i>
                    </button>
                    &nbsp; &nbsp; &nbsp;
                    <button value="清空" type="button" class="btn reset1">
                        <i class="icon-undo bigger-110"> </i><?php echo Yii::t('vcos','清空');?> 
                    </button>
                    <button class="btn btn-info export1" type="button"
                        style="margin-left: 8%;">
                        <i class="icon-ok bigger-110"></i> <?php echo Yii::t('vcos','导出');?>
                    </button>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <form method="post" id="table2_form">
                <table
                    class="table table-striped table-bordered table-hover"
                    id="sample-table-2">
                    <thead>
                        <tr>
                            <th><label> <input class="ace" id="checkALL"
                                    type="checkbox"> <span class="lbl"></span>
                            </label></th>
                            <th><?php echo Yii::t('vcos','工资月份');?></th>
                            <th><?php echo Yii::t('vcos','部门');?></th>
                            <th>职务<?php echo Yii::t('vcos','姓名');?></th>
                            <th><?php echo Yii::t('vcos','员工编码');?></th>
                            <th><?php echo Yii::t('vcos','姓名');?></th>
                            <th><?php echo Yii::t('vcos','基本工资');?></th>
                            <th><?php echo Yii::t('vcos','加班工资');?></th>
                            <th><?php echo Yii::t('vcos','技能补贴');?></th>
                            <th><?php echo Yii::t('vcos','交通通讯补贴');?></th>
                            <th><?php echo Yii::t('vcos','其他福利');?></th>
                            <th><?php echo Yii::t('vcos','五险一金');?></th>
                            <th><?php echo Yii::t('vcos','税收');?></th>
                            <th><?php echo Yii::t('vcos','绩效奖金');?></th>
                            <th><?php echo Yii::t('vcos','应发金额');?></th>
                            <th><?php echo Yii::t('vcos','操作');?></th>
                        </tr>
                    </thead>
                    <tbody>
                       
                <?php	
                foreach ( $gongzifafang as $row )
                 {	

         		?>
                    <tr>
                            <td><label> <input
                                    class="ace checkbox_button"
                                    type="checkbox" name="ids[]"
                                    value="<?php echo $row['id'];?>"> <span
                                    class="lbl"></span>
                            </label></td>
                            <td class="newdepartmentname"
                                style="display: none;"><?php echo $row['newdepartmentname'];?></td>
                            <td class="post_cn_name"
                                style="display: none;"><?php echo $row['post_cn_name'];?></td>
                            <td class="remark_base_salary"
                                style="display: none;"><?php echo $row['remark_base_salary'];?></td>
                            <td class="remark_skill_allowance"
                                style="display: none;"><?php echo $row['remark_skill_allowance'];?></td>
                            <td class="jiabanremark"
                                style="display: none;"><?php echo $row['jiabanremark'];?></td>
                            <td class="fulihejiremark"
                                style="display: none;"><?php echo $row['fulihejiremark'];?></td>
                            <td class="wuxianyijin_remark"
                                style="display: none;"><?php echo $row['wuxianyijin_remark'];?></td>
                            <td class="tax_remark"
                                style="display: none;"><?php echo $row['tax_remark'];?></td>
                            <td class="feiyongbutie_remark"
                                style="display: none;"><?php echo $row['feiyongbutie_remark'];?></td>
                            <td class="date"><?php echo $row['date'];?></td>
                            <td> <?php echo $row['newdepartmentname'];?></td>
                            <td><?php echo $row['post_cn_name'];?></td>
                            <td class="employee_code"><?php echo $row['employee_code'];?></td>
                            <td class="cn_name"><?php echo $row['cn_name'];?></td>
                            <td class="bank_name" style="display: none;"><?php echo $row['bank_name'];?></td>
                            <td class="bank_card_number"
                                style="display: none;"><?php echo $row['bank_card_number'];?></td>
                            <td class="fafang_id" style="display: none;"><?php echo $row['id'];?></td>
                            <td class="base_salary"><?php echo $row['base_salary'];?></td>
                            <td class="jiabangongzi"><?php echo $row['jiabangongzi'];?></td>
                            <td class="skill_allowance"><?php echo $row['skill_allowance'];?></td>
                            <td class="allowance_amount"><?php echo $row['allowance_amount'];?></td>
                            <td class="fuliheji"><?php echo $row['fuliheji'];?></td>
                            <td class="person_total"><?php echo $row['person_total'];?></td>
                            <td class="tax_amount"><?php echo $row['tax_amount'];?></td>
                            <td class="month_performance"><?php echo $row['month_performance'];?></td>
                            <td class="total_amount"><?php echo $row['total_amount'];?></td>
                            <td style="padding: 0px;">
                                <div style="margin-top: 15%;">
                                    <a href="#modal-form-table1"
                                        data-toggle="modal"><button
                                            class="btn btn-primary  chakan"
                                            style="border-width: 0px; width: 45%;margin-left: 2%;">查看</button>
                                    </a> <a href="#modal-form2"
                                        data-toggle="modal"
                                        class="fafanggongzi">
                                        <button class="btn btn-primary "
                                            style="border-width: 0px; background-color: #CC9966 !important; width: 45%;"><?php echo Yii::t('vcos','发放');?></button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php
								}
								
								?>
                </tbody>
                    </tbody>
                </table>
            </form>
        </div>
        <div style="text-align: center; margin-top: 250px;">
            <a href="#modal-form" data-toggle="modal" id="piliangfafang">
                <button class="btn btn-info" type="button">
                    <i class="icon-ok bigger-110"></i> <?php echo Yii::t('vcos','批量发放');?>
                </button>
            </a>
        </div>
    </div>
    <div id="table_middle_3"
        class="tab-pane  <?php if($table_type=='3') echo "active";?>">
        <div class="table-responsive">
            <form method="post"
                action="<?php echo Yii::app()->createUrl("salary/salary_grant/table_type/3");?>"
                id="table2_form3">
                <div style="overflow: hidden;">
                    <div
                        style="float: left; height: 34px; margin-left: 10%;">
                        <label style="" for="form-field-1"><?php echo Yii::t('vcos','员工编码');?> </label>
                        <input placeholder="" id="form-field-1"
                            style="height: 34px; width: 190px;"
                            name="employee_code"
                            value="<?php echo $search_form['employee_code']?>"
                            type="text">
                    </div>
                    <div
                        style="float: left; height: 34px; margin-left: 10%;">
                        <label style="" for="form-field-1"> <?php echo Yii::t('vcos','姓名');?> </label>
                        <input placeholder="" id="form-field-1"
                            style="height: 34px; width: 180px;"
                            name="cn_name"
                            value="<?php echo $search_form['cn_name']?>"
                            type="text">
                    </div>
                    <div
                        style="float: left; height: 34px; margin-left: 10%;">
                        <label> <?php echo Yii::t('vcos','工资月份');?> <select
                            style="width: 150px; height: 34px;"
                            name="date" size="1"
                            aria-controls="sample-table-2">
                                <option value=""></option>
                                <option
                                    value="<?php echo $search_form['date'];?>"
                                    selected="selected"><?php echo $search_form['date'];?></option>
                                <?php		
                    foreach ( $gongzi_date as $value ) {					?>
                                <option
                                    value="<?php echo  $value['date']?>"><?php echo  $value['date']?></option>
                                <?php
                                }
                                ?>
                        </select>
                        </label>
                    </div>
                </div>
                <div style="overflow: hidden; margin-top: 20px;">
                    <div style="float: left; margin-left: 10%;">
                        <label style="">  <?php echo Yii::t('vcos','部门');?><select
                            style="width: 200px; height: 34px; margin-left: 20px;"
                            aria-controls="sample-table-2" size="1"
                            name="department_id">
                                <option value=""></option>
                                <option
                                    value="<?php echo $search_form['department_id']?>"
                                    selected="selected"><?php echo $search_form['search_department_name']?></option>
                               
                    <?php	
                    foreach ( $Alldepartment as $row ) {
                    ?>
                    <option value="<?php echo $row['department_id'];?>"> <?php  echo  Yii::t ( 'vcos', $row['department_name'] );?></option>
                    <?php
                    }
                    ?>
                   
            </select>
                        </label>
                    </div>
                    <div
                        style="text-align: left; float: left; margin-left: 10%;">
                        <label style="">  <?php echo Yii::t('vcos','职务');?><select
                            style="display: inline; width: 180px; height: 34px;"
                            aria-controls="sample-table-2" size="1"
                            name="post_id">
                                <option value=""></option>
                                <option
                                    value="<?php echo $search_form['post_id']?>"
                                    selected="selected"><?php echo $search_form['post_cn_name'];?></option>
                               <?php	
                               foreach ( $post as $row ) {
                               ?>
                    <option value="<?php echo $row['post_id']?>"><?php echo  Yii::t ( 'vcos', $row['post_cn_name'] );?></option>
                    <?php		
                    }	
                    	?>
                        </select>
                        </label>
                    </div>
                </div>
                <div style="margin-top: 20px; margin-bottom: 20px;"
                    class="center">
                    <button style="margin-left: -10%;" value="搜索"
                        name="soso" class="btn btn-purple search "
                        type="submit">
                         <?php echo Yii::t('vcos','搜索');?><i class="icon-search  bigger-110"> </i>
                    </button>
                    &nbsp; &nbsp; &nbsp;
                    <button value="清空" type="button" class="btn reset2">
                        <i class="icon-undo bigger-110"> </i><?php echo Yii::t('vcos','清空');?> 
                    </button>
                    <button class="btn btn-info export2" type="button"
                        style="margin-left: 8%;">
                        <i class="icon-ok bigger-110"></i> <?php echo Yii::t('vcos','导出');?>
                    </button>
                </div>
            </form>
            <table
                class="table table-striped table-bordered table-hover"
                id="sample-table-2">
                <thead>
                    <tr>
                        <th><?php echo Yii::t('vcos','序号');?></th>
                        <th><?php echo Yii::t('vcos','工资月份');?></th>
                        <th><?php echo Yii::t('vcos','部门');?></th>
                        <th><?php echo Yii::t('vcos','职务');?></th>
                        <th><?php echo Yii::t('vcos','员工编码');?></th>
                        <th><?php echo Yii::t('vcos','姓名');?></th>
                        <th><?php echo Yii::t('vcos','基本工资');?></th>
                        <th><?php echo Yii::t('vcos','加班工资');?></th>
                        <th><?php echo Yii::t('vcos','技能补贴');?></th>
                        <th><?php echo Yii::t('vcos','交通通讯补贴');?></th>
                        <th><?php echo Yii::t('vcos','其他福利');?></th>
                        <th><?php echo Yii::t('vcos','五险一金');?></th>
                        <th><?php echo Yii::t('vcos','税收');?></th>
                        <th><?php echo Yii::t('vcos','绩效奖金');?></th>
                        <th><?php echo Yii::t('vcos','应发金额');?></th>
                        <th><?php echo Yii::t('vcos','操作');?></th>
                    </tr>
                </thead>
                <tbody>
                    
        <?php
								$i = 0;
								foreach ( $gongzifafang as $row ) {
									$i ++;
									
									?>
                    <tr>
                        <td><?php echo  $i;?></td>
                        <td class="newdepartmentname"
                            style="display: none;"><?php echo $row['newdepartmentname'];?></td>
                        <td class="post_cn_name" style="display: none;"><?php echo $row['post_cn_name'];?></td>
                        <td class="remark_base_salary"
                            style="display: none;"><?php echo $row['remark_base_salary'];?></td>
                        <td class="remark_skill_allowance"
                            style="display: none;"><?php echo $row['remark_skill_allowance'];?></td>
                        <td class="jiabanremark" style="display: none;"><?php echo $row['jiabanremark'];?></td>
                        <td class="fulihejiremark"
                            style="display: none;"><?php echo $row['fulihejiremark'];?></td>
                        <td class="wuxianyijin_remark"
                            style="display: none;"><?php echo $row['wuxianyijin_remark'];?></td>
                        <td class="tax_remark" style="display: none;"><?php echo $row['tax_remark'];?></td>
                        <td class="feiyongbutie_remark"
                            style="display: none;"><?php echo $row['feiyongbutie_remark'];?></td>
                        <td class="date"><?php echo $row['date'];?></td>
                        <td> <?php echo $row['newdepartmentname'];?></td>
                        <td><?php echo $row['post_cn_name'];?></td>
                        <td class="employee_code"><?php echo $row['employee_code'];?></td>
                        <td class="cn_name"><?php echo $row['cn_name'];?></td>
                        <td class="bank_name" style="display: none;"><?php echo $row['bank_name'];?></td>
                        <td class="bank_card_number"
                            style="display: none;"><?php echo $row['bank_card_number'];?></td>
                        <td class="fafang_id" style="display: none;"><?php echo $row['id'];?></td>
                        <td class="base_salary"><?php echo $row['base_salary'];?></td>
                        <td class="jiabangongzi"><?php echo $row['jiabangongzi'];?></td>
                        <td class="skill_allowance"><?php echo $row['skill_allowance'];?></td>
                        <td class="allowance_amount"><?php echo $row['allowance_amount'];?></td>
                        <td class="fuliheji"><?php echo $row['fuliheji'];?></td>
                        <td class="person_total"><?php echo $row['person_total'];?></td>
                        <td class="tax_amount"><?php echo $row['tax_amount'];?></td>
                        <td class="month_performance"><?php echo $row['month_performance'];?></td>
                        <td class="total_amount"><?php echo $row['total_amount'];?></td>
                        <td>
                            <div>
                                <a href="#modal-form-table1"
                                    data-toggle="modal"><button
                                        class="btn btn-primary  chakan"
                                        style="border-width: 0px;"><?php echo Yii::t('vcos','查看');?></button>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php
								}
								
								?>
             
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- 弹出编辑框开始 -->
<div aria-hidden="false" id="modal-form2" class="modal in" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body overflow-visible">
                <div style="font-size: 18px;" class="center">
                    <form novalidate="novalidate"
                        class="form-horizontal" role="form"
                        method="post" id="fafang_form"
                        autocomplete="off">
                        <div class="form-group">
                            <div style="float: left; margin-left: 50px;">
                                <label for="certificate_code"> <?php echo Yii::t('vcos','员工编号:');?></label>
                                <label id="employee_code"
                                    style="margin-left: 20px;"
                                    for="certificate_code">123456</label>
                            </div>
                            <div
                                style="float: left; margin-left: 140px;">
                                <label style="margin-right: 20px;"
                                    for="certificate_code"><?php echo Yii::t('vcos','姓名');?>  </label>
                                <label id="cn_name"
                                    for="certificate_code"><?php echo Yii::t('vcos','张三');?> </label>
                            </div>
                        </div>
                        <div class="space-6"></div>
                        <div style="" class="form-group">
                            <label
                                style="float: left; margin-left: 50px; text-align: left; width: 85px;"
                                for="certificate_type"><?php echo Yii::t('vcos','银行名称');?> </label> <input
                                style="margin-left: 20px; float: left; width: 250px;"
                                placeholder="" id="bank_name"
                                name="bank_name" type="text">
                        </div>
                        <div class="space-6"></div>
                        <div style="" class="form-group">
                            <label
                                style="float: left; margin-left: 50px; text-align: left; width: 85px;"
                                for="certificate_type"> <?php echo Yii::t('vcos','银行账号');?></label> <input
                                style="margin-left: 20px; float: left; width: 250px;"
                                placeholder="" id="bank_card_number"
                                name="bank_card_number" type="text">
                        </div>
                        <input name="id" id="fafangid"
                            style="display: none;">
                    </form>
                </div>
                <div class="center"
                    style="color: red; height: 100px; line-height: 100px; font-size: 40px;"><?php echo Yii::t('vcos','确定发放？');?></div>
                <div class="modal-footer">
                    <div class="center">
                        <button
                            class="btn btn-sm btn-primary gongzifafang">
                            <i class="icon-ok"></i> <?php echo Yii::t('vcos','确定');?>
                        </button>
                        <button class="btn btn-sm" data-dismiss="modal">
                            <i class="icon-remove"></i> <?php echo Yii::t('vcos','取消');?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE CONTENT ENDS -->
</div>
<!-- 结束 -->
<div id="dialog-confirm2" class="hide">
    <div class="alert alert-info bigger-110" id="dialog-confirm-content">
        <?php echo yii::t('vcos', '请至少选择一项')?></div>
    <div class="space-6"></div>
</div>
<div id="dialog-confirm-multi" class="hide">
    <div class="alert alert-info bigger-110"
        id="dialog-confirm-multi-content">
        <?php echo yii::t('vcos', '将给选中的员工发放工资')?></div>
    <div class="space-6"></div>
    <p class="bigger-110 bolder center grey" id="confirm_multi">
        <i class="icon-hand-right blue bigger-120"></i> <?php echo Yii::t('vcos','确定吗？');?>
    </p>
</div>
<!-- 查看编辑框 -->
<div aria-hidden="false" id="modal-form-table1" class="modal in"
    tabindex="-1">
    <div style="width: 700px;" class="modal-dialog">
        <div class="modal-content">
            <div style="padding: 0px; border: medium none;"
                class="modal-header">
                <button id="close_button" style="padding: 0px;" type="button"
                    class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body overflow-visible">
                <div style="overflow: hidden; height: 30px;">
                    <div style="width: 50%; float: left; height: 30px;">
                        <label for="form-field-1" style="">&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp; &nbsp;<?php echo Yii::t('vcos','部门');?>&nbsp;&nbsp; &nbsp; &nbsp; </label>
                        <input value="" name="Operator"
                            id="newdepartmentname"
                            style="height: 30px; width: 180px;"
                            placeholder="" type="text">
                    </div>
                    <div style="width: 50%; float: left; height: 30px;">
                        <label for="form-field-1" style="">&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp; &nbsp;<?php echo Yii::t('vcos','职务');?>&nbsp;&nbsp; &nbsp; &nbsp; </label>
                        <input value="" name="Operator"
                            id="post_cn_name"
                            style="height: 30px; width: 180px;"
                            placeholder="" type="text">
                    </div>
                </div>
                <div style="overflow: hidden; margin-top: 10px;">
                    <div style="width: 50%; float: left; height: 30px;">
                        <label for="form-field-1" style=""><?php echo Yii::t('vcos','员工编码');?>&nbsp;&nbsp;
                            &nbsp; &nbsp; </label> <input value=""
                            id="employee_code" name="Operator"
                            style="height: 30px; width: 180px;"
                            placeholder="" type="text">
                    </div>
                    <div style="width: 50%; float: left; height: 30px;">
                        <label for="form-field-1" style="">
                            <?php echo Yii::t('vcos','员工姓名');?>&nbsp;&nbsp; &nbsp; &nbsp; </label> <input
                            value="" name="Operator" id="cn_name"
                            style="height: 30px; width: 180px;"
                            placeholder="" type="text">
                    </div>
                </div>
                <div style="overflow: hidden; margin-top: 10px;">
                    <div style="width: 50%; float: left; height: 30px;">
                        <label for="form-field-1" style="">
                            <?php echo Yii::t('vcos','工资月份');?>&nbsp;&nbsp; &nbsp; &nbsp; </label> <input
                            value="" name="Operator" id="date"
                            style="height: 30px; width: 180px;"
                            placeholder="" type="text">
                    </div>
                    <div style="width: 50%; float: left; height: 30px;">
                        <label for="form-field-1" style="">
                            <?php echo Yii::t('vcos','应发金额');?>&nbsp;&nbsp; &nbsp; &nbsp; </label> <input
                            value="" name="Operator" id="total_amount"
                            style="height: 30px; width: 180px;"
                            placeholder="" type="text">
                    </div>
                </div>
                <div style="height: 30px; margin-top: 10px;">
                    <label for="form-field-1" style=""><?php echo Yii::t('vcos','基本工资');?> &nbsp;&nbsp;
                        &nbsp; &nbsp; </label> <input value=""
                        id="base_salary" name="Operator"
                        style="height: 30px; width: 500px;"
                        placeholder="" type="text">
                </div>
                <div
                    style="height: 30px; margin-top: 10px; line-height: 30px;">
                    <label for="form-field-1" style=""> <?php echo Yii::t('vcos','备 注');?>&nbsp;&nbsp;
                        &nbsp; &nbsp; </label> <input value=""
                        name="Operator"
                        style="height: 30px; width: 500px; margin-left: 25px;"
                        id="remark_base_salary" placeholder=""
                        type="text">
                </div>
                <div
                    style="height: 30px; margin-top: 10px; padding: 0px; line-height: 30px;">
                    <label for="form-field-1" style="">
                        <?php echo Yii::t('vcos','技能工龄津贴');?>&nbsp;&nbsp; &nbsp; &nbsp; </label> <input
                        value="" name="Operator"
                        style="height: 30px; width: 475px;"
                        id="skill_allowance" placeholder="" type="text">
                </div>
                <div
                    style="height: 30px; margin-top: 10px; line-height: 30px;">
                    <label for="form-field-1" style=""><?php echo Yii::t('vcos','备 注');?> &nbsp;&nbsp;
                        &nbsp; &nbsp; </label> <input value=""
                        name="Operator"
                        style="height: 30px; width: 500px; margin-left: 25px;"
                        id="remark_skill_allowance" placeholder=""
                        type="text">
                </div>
                <div style="height: 30px; margin-top: 10px;">
                    <label for="form-field-1" style=""> <?php echo Yii::t('vcos','费用补贴');?>&nbsp;&nbsp;
                        &nbsp; &nbsp; </label> <input value=""
                        name="Operator"
                        style="height: 30px; width: 500px;"
                        id="allowance_amount" placeholder="" type="text">
                </div>
                <div
                    style="height: 30px; margin-top: 10px; line-height: 30px;">
                    <label for="form-field-1" style=""> <?php echo Yii::t('vcos','备 注');?>&nbsp;&nbsp;
                        &nbsp; &nbsp; </label> <input value=""
                        name="Operator"
                        style="height: 30px; width: 500px; margin-left: 25px;"
                        id="feiyongbutie_remark" placeholder=""
                        type="text">
                </div>
                <div style="height: 30px; margin-top: 10px;">
                    <label for="form-field-1" style=""> <?php echo Yii::t('vcos','其他福利');?>&nbsp;&nbsp;
                        &nbsp; &nbsp; </label> <input value=""
                        name="Operator"
                        style="height: 30px; width: 500px;"
                        id="fuliheji" placeholder="" type="text">
                </div>
                <div
                    style="height: 30px; margin-top: 10px; line-height: 30px;">
                    <label for="form-field-1" style=""> <?php echo Yii::t('vcos','备 注');?>&nbsp;&nbsp;
                        &nbsp; &nbsp; </label> <input value=""
                        name="Operator"
                        style="height: 30px; width: 500px; margin-left: 25px;"
                        id="fulihejiremark" placeholder="" type="text">
                </div>
                <div
                    style="height: 30px; margin-top: 10px; line-height: 30px;">
                    <label for="form-field-1" style=""><?php echo Yii::t('vcos','五险一金');?> &nbsp;&nbsp;
                        &nbsp; &nbsp; </label> <input value=""
                        name="Operator"
                        style="height: 30px; width: 500px;"
                        id="person_total" placeholder="" type="text">
                </div>
                <div style="height: 30px; margin-top: 10px;">
                    <label for="form-field-1" style=""> <?php echo Yii::t('vcos','备 注');?>&nbsp;&nbsp;
                        &nbsp; &nbsp; </label> <input value=""
                        name="Operator"
                        style="height: 30px; width: 500px; margin-left: 25px;"
                        id="wuxianyijin_remark" placeholder=""
                        type="text">
                </div>
                <div
                    style="height: 30px; margin-top: 10px; line-height: 30px;">
                    <label for="form-field-1" style=""> <?php echo Yii::t('vcos','税收');?>&nbsp;&nbsp;
                        &nbsp; &nbsp; </label> <input value=""
                        name="Operator"
                        style="height: 30px; width: 500px; margin-left: 25px;"
                        id="tax_amount" placeholder="" type="text">
                </div>
                <div style="height: 30px; margin-top: 10px;">
                    <label for="form-field-1" style=""> <?php echo Yii::t('vcos','备 注');?>&nbsp;&nbsp;
                        &nbsp; &nbsp; </label> <input value=""
                        name="Operator"
                        style="height: 30px; width: 500px; margin-left: 25px;"
                        id="tax_remark" placeholder="" type="text">
                </div>
                <div style="height: 30px; margin-top: 10px;">
                    <label for="form-field-1" style=""><?php echo Yii::t('vcos','绩效工资');?> &nbsp;&nbsp;
                        &nbsp; &nbsp; </label> <input value=""
                        name="Operator"
                        style="height: 30px; width: 500px;"
                        id="month_performance" placeholder=""
                        type="text">
                </div>
                <div style="height: 30px; margin-top: 10px;">
                    <label for="form-field-1" style=""> <?php echo Yii::t('vcos','备 注');?>&nbsp;&nbsp;
                        &nbsp; &nbsp; </label> <input value=""
                        name="Operator"
                        style="height: 30px; width: 500px; margin-left: 25px;"
                        id="jixiaoremark" placeholder="" type="text">
                </div>
                <div class="modal-footer">
                    <div class="center">
                        <button
                            class="btn btn-sm btn-primary table_save_edit close1_1">
                            <i class="icon-ok"></i> <?php echo Yii::t('vcos','关闭');?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE CONTENT ENDS -->
</div>
<!--   查看编辑框结束 -->
<script type="text/javascript">

$(document).ready(function() {

    $('.close1_1').click(function(event) {
      
        $('#close_button').click();
        
    });
    

    
$('.tabbable ul li ').find('a').click(function(){
//     alert($(this).attr("href"));

    switch ($(this).attr("href")) {
    case  "#table_middle_1":
     location.href="<?php echo Yii::app()->createUrl("salary/salary_grant");?>"+"/table_type/"+"1";
        break;
    case "#table_middle_2":
                location.href="<?php echo Yii::app()->createUrl("salary/salary_grant");?>"+"/table_type/"+"2";
        break;
     case "#table_middle_3":
        location.href="<?php echo Yii::app()->createUrl("salary/salary_grant");?>"+"/table_type/"+"3";
        break;
      
    default:
      
        break;
}
    return false;
    

});

});
    </script>
<script type="text/javascript">
      var _thisTr = null; //记录table1中正在编辑的行

  $('#sample-table-2 tr').find('.fafanggongzi').click(function(e) {
 
          _thisTr = $(this).parents('tr'); //记录table1中正在编辑的行
         var table1Tr = _thisTr  // table1中当前操作的行

         var employee_code = table1Tr.find('.employee_code').text();
          //         获取内容1的值


         var cn_name = table1Tr.find('.cn_name').text();  //获取内容2的值
         var bank_name = table1Tr.find('.bank_name').text();  //获取内容3的值
         var bank_card_number = table1Tr.find('.bank_card_number').text();  //获取内容4的值
         var id = table1Tr.find('.fafang_id').text();  //获取内容5的值




    $('#fafang_form').find('#employee_code').text(employee_code);
       $('#fafang_form').find('#cn_name').text(cn_name);
       $('#fafang_form').find('#bank_name').val(bank_name);
       $('#fafang_form').find('#bank_card_number').val(bank_card_number);
       $('#fafang_form').find('#fafangid').val(id);


       
           





    });




  $('#sample-table-2 tr').find('.chakan').click(function(e) {

 
          _thisTr = $(this).parents('tr'); //记录table1中正在编辑的行
         var table1Tr = _thisTr  // table1中当前操作的行
     var remark_base_salary = table1Tr.find('.remark_base_salary').text();
     var remark_skill_allowance = table1Tr.find('.remark_skill_allowance').text();
      var jiabanremark = table1Tr.find('.jiabanremark').text();
      var fulihejiremark = table1Tr.find('.fulihejiremark').text();
      var wuxianyijin_remark = table1Tr.find('.wuxianyijin_remark').text();
      var tax_remark = table1Tr.find('.tax_remark').text();
      var jixiaoremark = table1Tr.find('.jixiaoremark').text();
      var feiyongbutie_remark = table1Tr.find('.feiyongbutie_remark').text();

         var employee_code = table1Tr.find('.employee_code').text();
        
          //         获取内容1的值
         var cn_name = table1Tr.find('.cn_name').text();  //获取内容2的值
         var bank_name = table1Tr.find('.bank_name').text();  //获取内容3的值
         var bank_card_number = table1Tr.find('.bank_card_number').text();  //获取内容4的值
         var id = table1Tr.find('.fafang_id').text();  //获取内容5的值


     var total_amount = table1Tr.find('.total_amount').text();
     var date = table1Tr.find('.date').text();
     var post_cn_name = table1Tr.find('.post_cn_name').text();
     var base_salary = table1Tr.find('.base_salary').text();

     var allowance_amount = table1Tr.find('.allowance_amount').text();
     var skill_allowance = table1Tr.find('.skill_allowance').text();
     var day_salary= table1Tr.find('.day_salary').text();



     var month_performance = table1Tr.find('.month_performance').text();
     var fuliheji= table1Tr.find('.fuliheji').text();
     var tax_amount = table1Tr.find('.tax_amount').text();
     var person_total= table1Tr.find('.person_total').text();

    var newdepartmentname=table1Tr.find('.newdepartmentname').text();



    $('#modal-form-table1').find('#employee_code').val(employee_code);
    $('#modal-form-table1').find('#remark_base_salary').val(remark_base_salary);
    $('#modal-form-table1').find('#remark_skill_allowance').val(remark_skill_allowance);
    $('#modal-form-table1').find('#jiabanremark').val(jiabanremark);
    $('#modal-form-table1').find('#fulihejiremark').val(fulihejiremark);
    $('#modal-form-table1').find('#wuxianyijin_remark').val(wuxianyijin_remark);
$('#modal-form-table1').find('#wuxianyijin_remark').val(wuxianyijin_remark);
$('#modal-form-table1').find('#tax_remark').val(tax_remark);
$('#modal-form-table1').find('#jixiaoremark').val(jixiaoremark);
$('#modal-form-table1').find('#feiyongbutie_remark').val(feiyongbutie_remark);
$('#modal-form-table1').find('#cn_name').val(cn_name);


$('#modal-form-table1').find('#bank_name').val(bank_name);
$('#modal-form-table1').find('#bank_card_number').val(bank_card_number);
$('#modal-form-table1').find('#total_amount').val(total_amount);


$('#modal-form-table1').find('#date').val(date);
$('#modal-form-table1').find('#post_cn_name').val(post_cn_name);
$('#modal-form-table1').find('#base_salary').val(base_salary);
$('#modal-form-table1').find('#skill_allowance').val(skill_allowance);
$('#modal-form-table1').find('#month_performance').val(month_performance);


$('#modal-form-table1').find('#fuliheji').val(fuliheji);
$('#modal-form-table1').find('#tax_amount').val(tax_amount);
$('#modal-form-table1').find('#person_total').val(person_total);
$('#modal-form-table1').find('#newdepartmentname').val(newdepartmentname);
$('#modal-form-table1').find('#allowance_amount').val(allowance_amount);





         
   
    
       
       




        







    });


  $(".gongzifafang").click(function(event) {
    var url="<?php echo Yii::app()->createUrl("salary/gongzifafang");?>";
    $('#fafang_form').attr('action', url);
    $('#fafang_form').submit();
      
  });

  
  </script>
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

        $('.export1').click(function(event) {

    var url="<?php echo Yii::app()->createUrl("salary/salary_pay_not_export");?>";
    $('#table2_form').attr('action', url);
    $('#table2_form').submit();


        });

           $('.export2').click(function(event) {
            alert("sfmsfms");

    var url="<?php echo Yii::app()->createUrl("salary/salary_pay_export");?>";
    $('#table2_form3').attr('action', url)
    $('#table2_form3').submit();


        });

           $('.search').click(function(event) {

            var url="<?php echo  Yii::app()->request->url;?>";
           $(this).find('form').attr('action', 'url');

               
           });


    });




</script>
<script type="text/javascript">
jQuery(function($) {

	  $(".reset1").click(function(){

//        清空表单所有内容，很好用，很强大
   	 $(':input','#table2_form')
        .not(':button, :submit, :reset, :hidden')
        .val('')
        .removeAttr('checked')
        .removeAttr('selected');

       });


	  $(".reset2").click(function(){

      
   	 $(':input','#table2_form3')
        .not(':button, :submit, :reset, :hidden')
        .val('')
        .removeAttr('checked')
        .removeAttr('selected');

       });


    $( "#piliangfafang" ).on('click', function(e) {
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
                open:function(event,ui){$(".ui-dialog-titlebar-close").show();} ,
                resizable: false,
                modal: true,
                title: "<?php echo yii::t('vcos', '没有选中 ！')?>",
                title_html: true,
                buttons: [

                    {
                        html: " <?php echo yii::t('vcos', '取消？')?>",
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
            title: "<?php echo yii::t('vcos', '发放工资')?>",
            title_html: true,
            buttons: [
                {
                    html: "<i class='icon-trash bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '确定')?>",
                    "class" : "btn btn-danger btn-xs ",
                    "id" :"danger2",
                    click: function() {

                         var url="<?php echo Yii::app()->createUrl("salary/gongzifafang");?>";
    $('#table2_form2').attr('action', url);
     $('#table2_form2').submit();
   
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