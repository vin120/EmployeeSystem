
<?php

    $this->pageTitle = Yii::t('vcos','员工证书管理');
    $theme_url = Yii::app()->theme->baseUrl;
    $menu_type = 'information_certificate';
?>
<?php 
    //navbar 挂件
    $disable = 1;
    $this->widget('navbarWidget',array('disable'=>$disable));
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
				<body>
				<div class="col-sm-6" style="width:100%">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li class='active'>
													<a>船员预调配</a>
												</li>
											</ul>

											<div class="tab-content">
												<div class='tab-pane in active' style="height:2000px">
												<!-- 标题 -->
													<div class="page-header">
                                    <h1>
                                        <?php echo Yii::t('vcos','员工调配管理');?>
                                        <small>
                                            <i class="icon-double-angle-right"></i>
                                            <?php echo Yii::t('vcos','船员调配管理'); ?>
                                        </small>
                                    </h1>
                           				 </div><!-- /.page-header -->
												
												
									 <form id='member_list' class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl("Information/information_certificate");?>" autocomplete="off" >
										<table>
										<tr>
										<td><h4>船舶名称:</h4></td>
										<td width="200px"></td>
										<td><h4>船舶编号:</h4></td>
										</tr>
										</table>	
										<div class="line"></div>
										<br/>				
										
										<div class="col-xs-12">
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														
														<th> <?php echo yii::t('vcos', '序号')?></th>
														<th> <?php echo yii::t('vcos', '部门')?></th>
														<th class="hidden-480"> <?php echo yii::t('vcos', '职务')?></th>
														<th>
														<?php echo yii::t('vcos', '员工编号')?>
														</th>
														<th> <?php echo yii::t('vcos', '姓名')?></th>
														<th> <?php echo yii::t('vcos', '性别')?></th>
														<th> <?php echo yii::t('vcos', '上船时间')?></th>
														<th> <?php echo yii::t('vcos', '在船天数')?></th>
													</tr>
												</thead>

												<tbody>
											
												</tbody>
												
											</table>
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
                                          <div class="center" id="page_div"></div> 
                                        
											</form>
										  	<center>	
																				
										  	</div>
											</div>
											</div><!-- /span -->
											</div>								
									<?php
									   	//设置容器配置挂件
										$this->widget('settingsContainerWidget');
									?>
									<?php
									    $this->widget('scrollUpWidget');
									?>
									</body>
									