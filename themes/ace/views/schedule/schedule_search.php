<?php
    $this->pageTitle = Yii::t('vcos','值班查询');
    $theme_url = Yii::app()->theme->baseUrl;
    $menu_type = 'schedule_search';
?>
<?php
	//navbar 挂件
	$this->widget('navbarWidget');
?>      

<!-- page specific plugin styles -->          
<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/fullcalendar.css" />


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

            <div class="page-content">
                <div class="page-header">
                    <h1>
                        <?php echo Yii::t('vcos','船员排班管理');?>
                        <small>
	                        <i class="icon-double-angle-right"></i>
	                        <?php echo Yii::t('vcos','值班查询'); ?>
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                    
                    
                    	<!-- PAGE CONTENT BEGINS -->
                        <div class="row">
							<div class="col-sm-9">
								<div id="calendar"></div>
							</div>
						</div><!-- /.row -->
                    	<!-- PAGE CONTENT ENDS -->
                    	
                    	
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div><!-- /.main-content -->
          
            
        <!-- /#ace-settings-container start-->
        <?php
            //设置容器配置挂件
            $this->widget('settingsContainerWidget');
        ?>
        <!-- /#ace-settings-container end-->
        
        
	</div><!-- /.main-container-inner -->
    
    
    <!-- scrool up widget start-->
    <?php
        $this->widget('scrollUpWidget');
    ?>
    <!-- scrool up widget end-->
        
        
</div><!-- /.main-container -->

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
<script src="<?php echo $theme_url; ?>/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/fullcalendar.min.js"></script>


        

<script type="text/javascript">
jQuery(function($) {

	/* initialize the calendar
	-----------------------------------------------------------------*/

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();


	var calendar = $('#calendar').fullCalendar({
		 buttonText: {
			prev: '<i class="icon-chevron-left"></i>',
			next: '<i class="icon-chevron-right"></i>'
		},
	
		header: {
			left: 'prev,next today',
			center: 'title',
			right: '',
		},
		monthNames: [
			"<?php echo Yii::t('vcos','一月'); ?>",
			"<?php echo Yii::t('vcos','二月'); ?>",
			"<?php echo Yii::t('vcos','三月'); ?>",
			"<?php echo Yii::t('vcos','四月'); ?>",
			"<?php echo Yii::t('vcos','五月'); ?>",
			"<?php echo Yii::t('vcos','六月'); ?>",
			"<?php echo Yii::t('vcos','七月'); ?>",
			"<?php echo Yii::t('vcos','八月'); ?>",
			"<?php echo Yii::t('vcos','九月'); ?>",
			"<?php echo Yii::t('vcos','十月'); ?>",
			"<?php echo Yii::t('vcos','十一月'); ?>",
			"<?php echo Yii::t('vcos','十二月'); ?>"
		],
		monthNamesShort: [
        	"<?php echo Yii::t('vcos','一月'); ?>",
    		"<?php echo Yii::t('vcos','二月'); ?>",
    		"<?php echo Yii::t('vcos','三月'); ?>",
    		"<?php echo Yii::t('vcos','四月'); ?>",
    		"<?php echo Yii::t('vcos','五月'); ?>",
    		"<?php echo Yii::t('vcos','六月'); ?>",
    		"<?php echo Yii::t('vcos','七月'); ?>",
    		"<?php echo Yii::t('vcos','八月'); ?>",
    		"<?php echo Yii::t('vcos','九月'); ?>",
    		"<?php echo Yii::t('vcos','十月'); ?>",
    		"<?php echo Yii::t('vcos','十一月'); ?>",
    		"<?php echo Yii::t('vcos','十二月'); ?>"
		],
		dayNames: [
			"<?php echo Yii::t('vcos','周日'); ?>",
			"<?php echo Yii::t('vcos','周一'); ?>",
			"<?php echo Yii::t('vcos','周二'); ?>",
			"<?php echo Yii::t('vcos','周三'); ?>",
			"<?php echo Yii::t('vcos','周四'); ?>",
			"<?php echo Yii::t('vcos','周五'); ?>",
			"<?php echo Yii::t('vcos','周六'); ?>"
		],
		dayNamesShort: [
			"<?php echo Yii::t('vcos','周日'); ?>",
			"<?php echo Yii::t('vcos','周一'); ?>",
			"<?php echo Yii::t('vcos','周二'); ?>",
			"<?php echo Yii::t('vcos','周三'); ?>",
			"<?php echo Yii::t('vcos','周四'); ?>",
			"<?php echo Yii::t('vcos','周五'); ?>",
			"<?php echo Yii::t('vcos','周六'); ?>"
		],
		today: ["<?php echo Yii::t('vcos','周六'); ?>"],
		firstDay: 0,
		weekends:true,
		buttonText: {
			today: "<?php echo Yii::t('vcos','本月'); ?>",
		 	month: "<?php echo Yii::t('vcos','月'); ?>",
		 	week: "<?php echo Yii::t('vcos','周'); ?>",
		 	day: "<?php echo Yii::t('vcos','日'); ?>",
			prev: "<?php echo Yii::t('vcos','上一月'); ?>",
		 	next: "<?php echo Yii::t('vcos','下一月'); ?>"
		 },
		selectable: true,
		select: function(date,allDay,jsEvent) {
			var pickDate = $.fullCalendar.formatDate(date, "yyyy-MM-dd-ddd");
			window.location.href="schedule_edit?&date="+pickDate;
		}
	});

})
</script>