<?php
$this->pageTitle = Yii::t ( 'vcos', '公司组织结构' );
$theme_url = Yii::app ()->theme->baseUrl;
$menu_type = 'data_structure';
?>
<?php
// navbar 挂件
$disable = 1;
$this->widget ( 'navbarWidget', array (
		'disable' => $disable 
) );
?>

<link rel="stylesheet"
    href="<?php echo $theme_url; ?>/assets/css/fullcalendar.css" />
<link rel="stylesheet"
    href="<?php echo $theme_url; ?>/assets/css/bootstrap.css" />

   
<link rel="stylesheet"
    href="<?php echo $theme_url; ?>/assets/css/ace.css" />



    <link href="<?php echo $theme_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/font-awesome.min.css" />

        <!--[if IE 7]>
          <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
        <![endif]-->

        <!-- page specific plugin styles -->

        <!-- fonts -->

        <link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/ace-fonts.css" />

        <!-- ace styles -->

        <link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/ace.min.css" />
        <link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/ace-rtl.min.css" />
        <link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/ace-skins.min.css" />
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
                        <?php echo Yii::t('vcos','基础数据管理');?>
                        <small> <i class="icon-double-angle-right"></i>
	                        <?php echo Yii::t('vcos','公司组织结构'); ?>
                        </small>
                    </h1>
                </div>
                <!-- /.page-header -->
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <?php
                        require_once 'structureView.php';
                        
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
    </div>
    <!-- ./main-container-inner -->
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
<!-- page specific plugin scripts -->
<script src="<?php echo $theme_url; ?>/assets/js/fuelux/fuelux.tree.js"></script>
<!-- ace scripts -->
<script src="<?php echo $theme_url; ?>/assets/js/ace-elements.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/ace.js"></script>
<script type="text/javascript">

jQuery(function($) {

	/* tree
	-----------------------------------------------------------------*/
	//construct the data source object to be used by tree
    var remoteUrl = "<?php echo Yii::app()->createUrl('data/get_department');?>";
    var remoteDateSource = function(options, callback) {
        var parent_id = null;
        if( !('text' in options || 'type' in options) ){
            parent_id = 0;//load first level data
        }
        else if('type' in options && options['type'] == 'folder') {//it has children
            if('additionalParameters' in options && 'children' in options.additionalParameters)
            	parent_id = options.additionalParameters['id']
        }

        if(parent_id !== null) {
            $.ajax({
                url: remoteUrl,
                data: 'id='+parent_id,
                type: 'POST',
                dataType: 'json',
                success : function(response) {
                    if(response.status == "OK"){
                        callback({ data: response.data });
                    }
                },
                error: function(response) {
                    alert("error");
                	// console.log(response);
                }
            })
        }
    }

    $('#tree').ace_tree({
        dataSource: remoteDateSource ,
        multiSelect: false,
		loadingHTML:'<div class="tree-loading"><i class="icon-refresh icon-spin blue"></i></div>',
		'open-icon' :'ace-icon tree-minus', //'icon-minus',
		'close-icon' : 'ace-icon tree-plus',//'icon-plus',
		'selectable' : true,
		'selected-icon' : '',
		'unselected-icon' : '',
    }).on(' selected.fu.tree', function(event,data) {
    	console.log(event);
    	console.log(data);
    }).on('opened.fu.tree ', function(event, data) {
        alert(data.additionalParameters.id)

       var url= "<?php echo Yii::app()->createUrl("data/data_structure_getbumen_allpost");?>";

    	$.ajax({
                url: url,
                data: {'department_id':data.additionalParameters.id},
                type: 'POST',
                dataType: 'text',
                success : function(response) {


                 
                     var obj=JSON.parse(response);
                     // alert(response);
                      str='';

                     // alert(obj.length);

                     if(obj.length<=1)
                     {

                     }
                     else {

                        for (var i = 0; i < obj.length; i++) {
                            var str1='<tr>'+ '<td class="center">'+(i+1).toString()+'</td>'
                            + '<td class="center">'+obj[i].department_quanname+'</td>'+
                            '<td class="center">'+obj[i].post_name+'</td>"+</tr>';


                            str+=str1;
                            
                        }
                        
                     }


             $('#department_list').find('table  tbody').html(str);
                    
                },
                error: function(response) {
                    alert("发送错误");
                    // console.log(response);
                }
            })
    });
});
</script>


