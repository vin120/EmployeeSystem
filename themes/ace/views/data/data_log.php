<?php
$this->pageTitle = Yii::t ( 'vcos', '日志管理' );
$theme_url = Yii::app ()->theme->baseUrl;
$menu_type = 'data_log';
?>
<?php
// navbar 挂件
$this->widget ( 'navbarWidget' );
?>

<!-- page specific plugin styles -->
<link rel="stylesheet"
	href="<?php echo $theme_url; ?>/assets/css/fullcalendar.css" />


<div class="main-container" id="main-container">

	<script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>

	<div class="main-container-inner">
		<a class="menu-toggler" id="menu-toggler" href="#"> <span
			class="menu-text"></span>
		</a>
        <?php
								// 菜单挂件
								$this->widget ( 'menuWidget', array (
										'menu_type' => $menu_type 
								) );
								?>
        <div class="main-content">
            <?php
												// 面包屑挂件
												$this->widget ( 'breadcrumbWidget' );
												?>

            <div class="page-content">
				<div class="page-header">
					<h1>
                        <?php echo Yii::t('vcos','基础数据资料');?>
                        <small> <i class="icon-double-angle-right"></i>
	                        <?php echo Yii::t('vcos','日志管理'); ?>
                        </small>
					</h1>
				</div>
				<!-- /.page-header -->

				<div class="row">
					<div class="col-xs-12">


						<!-- PAGE CONTENT BEGINS -->
						<?php
						require_once 'logView.php';
						
						?>
						<!-- PAGE CONTENT ENDS -->


					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.page-content -->
		</div>
		<!-- /.main-content -->


		<!-- /#ace-settings-container start-->
        <?php
								// 设置容器配置挂件
								$this->widget ( 'settingsContainerWidget' );
								?>
        <!-- /#ace-settings-container end-->


	</div>
	<!-- /.main-container-inner -->


	<!-- scrool up widget start-->
    <?php
				$this->widget ( 'scrollUpWidget' );
				?>
    <!-- scrool up widget end-->


</div>
<!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->

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


<script src="<?php echo $theme_url; ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/typeahead-bs2.min.js"></script>

<!-- page specific plugin scripts -->
<script
	src="<?php echo $theme_url; ?>/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script
	src="<?php echo $theme_url; ?>/assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/fullcalendar.min.js"></script>



