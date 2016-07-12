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
            href="#table_middle_1" data-toggle="tab">  <?php  echo  Yii::t ( 'vcos', '各职务薪资统计(月度)' );?></a></li>
        <li class="<?php if($table_type=='2') echo "active";?>"><a
            href="#table_middle_2" data-toggle="tab">  <?php  echo  Yii::t ( 'vcos', '各职务薪资统计(年度)' );?></a></li>
        <li class="<?php if($table_type=='3') echo "active";?>"><a
            href="#table_middle_3" data-toggle="tab"><?php  echo  Yii::t ( 'vcos', '各薪资项目统计(月度)' );?> </a></li>
        <li class="<?php if($table_type=='4') echo "active";?>"><a
            href="#table_middle_4" data-toggle="tab"><?php  echo  Yii::t ( 'vcos', '各薪资项目统计(年度)' );?>  </a></li>
    </ul>
</div>
<div class="tab-content">
    <div class="tab-pane   <?php if($table_type=='1') echo "active";?>"
        id="table_middle_1">
        <form action="" method="post" id="form1">
            <div style="overflow: hidden; margin-top: 20px;">
                <div style="float: left;">
                    <span style="font-size: 20px;"> <?php  echo  Yii::t ( 'vcos', '年' );?> </span> <select
                        style="width: 100px;"
                        aria-controls="sample-table-2" size="1"
                        name="smalleryear" id="smalleryear">
                        <option selected="selected" value=""></option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                    </select> <span style="font-size: 20px;"> <?php  echo  Yii::t ( 'vcos', '月' );?> </span>
                    <select style="width: 100px;"
                        aria-controls="sample-table-2" size="1"
                        name="smallermonth" id="smallermonth">
                        <option selected="selected" value=""></option>
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">06</option>
                        <option value="7">07</option>
                        <option value="8">08</option>
                        <option value="9">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
                <div
                    style="float: left; width: 100px; height: 34px; line-height: 34px; text-align: center;">
                    <span style="font-size: 20px;"> <?php  echo  Yii::t ( 'vcos', '至' );?> </span>
                </div>
                <div
                    style="float: left; text-align: left; margin-left: 15px;">
                    <span style="font-size: 20px;"> <?php  echo  Yii::t ( 'vcos', '年' );?> </span> <select
                        style="width: 100px; height: 34px;"
                        aria-controls="sample-table-2" size="1"
                        name="operation_type" id="biggeryear">
                        <option selected="selected"></option>
                    </select> <span style="font-size: 20px;"> <?php  echo  Yii::t ( 'vcos', '月' );?> </span>
                    <select style="width: 100px; height: 34px;"
                        aria-controls="sample-table-2" size="1"
                        name="operation_type" id="biggermonth">
                        <option selected="selected"></option>
                    </select>
                </div>
                <button style="margin-left: 10%;" value="搜索" name="soso"
                    class="btn btn-purple  " id="search_box"
                    type="submit">
                    <?php  echo  Yii::t ( 'vcos', '搜索' );?> <i class="icon-search  bigger-110"> </i>
                </button>
            </div>
        </form>
        <div class="table-responsive">
            <table
                class="table table-striped table-bordered table-hover"
                id="sample-table-1">
                <thead>
                    <tr>
                        <th><?php  echo  Yii::t ( 'vcos', '序号' );?></th>
                        <th><?php  echo  Yii::t ( 'vcos', '职务合计' );?></th>
                        <?php
																								foreach ( $timedata as $value ) {

																									?>
                        <th><?php echo $value;?></th>
                        <?php
																								}

																								?>

                    </tr>
                </thead>
                <tbody>
                <?php
																$i = 0;
																foreach ( $tongji as $row ) {
																	$i ++;

																	?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $row['post_cn_name'];?><?php  echo  Yii::t ( 'vcos', '合计' );?></td>
                        <td><?php echo $row['month1'];?></td>
                        <td><?php echo $row['month2'];?></td>
                        <td><?php echo $row['month3'];?></td>
                        <td><?php echo $row['month4'];?></td>
                        <td><?php echo $row['month5'];?></td>
                        <td><?php echo $row['month6'];?></td>
                        <td><?php echo $row['month7'];?></td>
                        <td><?php echo $row['month8'];?></td>
                        <td><?php echo $row['month9'];?></td>
                        <td><?php echo $row['month10'];?></td>
                        <td><?php echo $row['month11'];?></td>
                        <td><?php echo $row['month12'];?></td>
                    </tr>
                    <?php
																}
																?>
                    <tr class="aaa" style="margin-top: 10px;">
                        <td></td>
                        <td><?php  echo  Yii::t ( 'vcos', '工资汇总' );?></td>
                        <?php																	foreach ( $month_salary_tongji as $value ) {

																									?>
                        <td><?php echo $value?></td>
                        <?php												}
                        	?>

                    </tr>
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
							'maxButtonCount' =>5,
							'cssFile' => false
					) );
					?>
    </div>
            <div style="text-align: center; margin-top: 100px;">
                <button class="btn btn-info export1" type="button">
                    <i class="icon-ok bigger-110"></i> <?php  echo  Yii::t ( 'vcos', '导出' );?>
                </button>
            </div>
        </div>
    </div>
    <div class="tab-pane   <?php if($table_type=='2') echo "active";?>"
        id="table_middle_2">
        <form action="" method="post" id="form2">
            <div style="overflow: hidden; margin-top: 20px;">
                <div style="float: left;">
                    <span style="font-size: 20px;"> <?php  echo  Yii::t ( 'vcos', '工资年份' );?> </span> <select
                        style="width: 100px;height: 34px;"
                        aria-controls="sample-table-2" size="1"
                        name="smalleryear" id="smalleryear2">
                        <option selected="selected" value=""></option>
                        <option>2011</option>
                        <option>2012</option>
                        <option>2013</option>
                        <option>2014</option>
                        <option>2015</option>
                        <option>2016</option>
                        <option>2017</option>
                        <option>2018</option>
                    </select><span
                        style="font-size: 20px; margin-left: 20px;">
                        <?php  echo  Yii::t ( 'vcos', '至' );?></span> <span
                        style="font-size: 20px; margin-left: 20px;">
                         <?php  echo  Yii::t ( 'vcos', '工资年份' );?></span> <select
                        style="width: 100px; height: 34px;"
                        aria-controls="sample-table-2" size="1"
                        name="biggeryear" id="biggeryear2">
                        <option selected="selected"></option>
                    </select>
                </div>
                <button style="margin-left: 10%;" value="搜索" name="soso"
                    class="btn btn-purple   " id="search_box2"
                    type="submit">
                    <?php  echo  Yii::t ( 'vcos', '搜索' );?> <i class="icon-search  bigger-110"> </i>
                </button>
            </div>
        </form>
        <div class="table-responsive">
       <table class="table table-striped table-bordered table-hover"     id="sample-table-1">
                    <thead>
                        <tr>
                            <th><?php  echo  Yii::t ( 'vcos', '序号' );?></th>
                            <th><?php  echo  Yii::t ( 'vcos', '职务' );?></th>
                            <?php

                         for ($i = 0; $i <= $yearsum; $i++) {


                            ?>

                                <th><?php echo $smalleryear+$i;?>年</th>
                                <?php
                                }
                                ?>
                            </tr>


                    </thead>
                    <tbody>
                     <?php
                    $i = 0;
                    foreach ( $yeartongji as $row )
                    {
                    	$i++;
                    ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row['post_cn_name'];?>合计</td>
                            <td><?php echo $row['year1'];?></td>
                            <td><?php echo $row['year2'];?></td>
                            <td><?php echo $row['year3'];?></td>
                            <td><?php echo $row['year4'];?></td>
                            <td><?php echo $row['year5'];?></td>
                        </tr>
                        <?php   }?>

                         <tr class="aaa" style="margin-top: 10px;">
                            <td><?php  echo  Yii::t ( 'vcos', '工资汇总' );?></td>
                            <td></td>
                            <?php
                            foreach ( $year_salary_tongji as $value ) {
                            ?>
                            <td><?php echo $value;?></td>
                            <?php
                            }
                            ?>
                        </tr>



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
                <button class="btn btn-info export2" type="button">
                    <i class="icon-ok bigger-110"></i> <?php  echo  Yii::t ( 'vcos', '导出' );?>
                </button>
            </div>
        </div>
    </div>
    <div class="tab-pane  <?php if($table_type=='3') echo "active";?>"
        id="table_middle_3">
        <div class="table-responsive">
            <table
                class="table table-striped table-bordered table-hover"
                id="sample-table-1">
                <thead>
                    <tr>
                        <th>序号</th>
                        <th>职务名称</th>
                        <th>工资月份</th>
                        <th>薪资合计</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>船长</td>
                        <td>2015-6</td>
                        <td>80000.00</td>
                    </tr>
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
                <button class="btn btn-info" type="button">
                    <i class="icon-ok bigger-110"></i> 导出
                </button>
            </div>
        </div>
    </div>
    <div class="tab-pane  <?php if($table_type=='4') echo "active";?> "
        id="table_middle_4">
        <div style="overflow: hidden; margin-bottom: 10px;">
            <div style="float: left;">
                <span style="font-size: 14px;"> 工资年份 </span> <select
                    style="width: 200px;" aria-controls="sample-table-2"
                    size="1" name="operation_type">
                    <option selected="selected" value=""></option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                </select>
            </div>
            <div
                style="float: left; text-align: left; margin-left: 15px;">
                <span style="font-size: 14px;"> 至 </span> <select
                    style="display: inline; width: 200px; margin-left: 15px;"
                    aria-controls="sample-table-2" size="1"
                    name="operation_module">
                    <option selected="selected" value=""></option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                </select>
            </div>
        </div>
        <div class="table-responsive">
            <table
                class="table table-striped table-bordered table-hover"
                id="sample-table-1">
                <thead>
                    <tr>
                        <th>序号</th>
                        <th>职务名称</th>
                        <th>工资月份</th>
                        <th>薪资合计</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>船长</td>
                        <td>2015-6</td>
                        <td>80000.00</td>
                    </tr>
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
                <button class="btn btn-info" type="button">
                    <i class="icon-ok bigger-110"></i> 导出
                </button>
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
<script type="text/javascript">
    jQuery(function($) {




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
<!-- 删除多条记录框js结束-->
<script type="text/javascript">


$('.tabbable ul li ').find('a').click(function(){
//     alert($(this).attr("href"));

	switch ($(this).attr("href")) {
    case  "#table_middle_1":
     location.href="<?php echo Yii::app()->createUrl("salary/salary_statistics");?>"+"/table_type/"+"1";
        break;
    case "#table_middle_2":
                location.href="<?php echo Yii::app()->createUrl("salary/salary_statistics");?>"+"/table_type/"+"2";
        break;
     case "#table_middle_3":
        location.href="<?php echo Yii::app()->createUrl("salary/salary_statistics");?>"+"/table_type/"+"3";
        break;
      case "#table_middle_4":
          location.href="<?php echo Yii::app()->createUrl("salary/salary_statistics");?>"+"/table_type/"+"4";
        break;
    default:

        break;
}
    return false;


});




$('#smalleryear').change(function(event) {
        var temp=$(this).val();

        if (temp!='') {

        var biggeryear=parseInt(temp)+1;



      $("#biggeryear").find("option:selected").text(biggeryear.toString());
      }
      else {
         $("#biggeryear").find("option:selected").text('');
      }


    });



    $('#smallermonth').change(function(event) {


        var temp=$("#smallermonth").find("option:selected").text();
        $("#biggermonth").find("option:selected").text(temp);









    });




    $('#smalleryear2').change(function(event) {
        var temp=$(this).val();
        if (temp!='') {
        var biggeryear=parseInt(temp)+4;
      $("#biggeryear2").find("option:selected").text(biggeryear.toString());
      }
      else {
         $("#biggeryear2").find("option:selected").text('');
      }


    });


    $('.export1').click(function(event) {
    url="<?php echo Yii::app()->createUrl("salary/statistics_month_export");?>"

            $('#form1').attr('action', url);

            $('#form1').submit();
        
    });
    $('.export2').click(function(event) {
    url="<?php echo Yii::app()->createUrl("salary/statistics_year_export");?>"

            $('#form2').attr('action', url);

            $('#form2').submit();
        
    });

    $('#search_box').click(function(event) {

         url="<?php echo Yii::app()->createUrl("salary/salary_statistics");?>";

            $('#form1').attr('action', url);
            $('#form1').submit();
        
    });


     $('#search_box2').click(function(event) {
    

          url="<?php echo Yii::app()->createUrl("salary/salary_statistics/table_type/2");?>";
            $('#form2').attr('action', url);
            $('#form2').submit();
        
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
