<?php
    $this->pageTitle = Yii::t('vcos','值班查询');
    $theme_url = Yii::app()->theme->baseUrl;
    $menu_type = 'schedule_search';
?>
<?php
    //navbar 挂件
    $disable = 1;
    $this->widget('navbarWidget',array('disable'=>$disable));
?>      
<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/bootstrap.css" />
<link rel="stylesheet" href="<?php echo $theme_url; ?>/assets/css/ace.css" />

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
	                        <?php echo Yii::t('vcos','编辑排班'); ?>
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                    
                    
                    	<!-- PAGE CONTENT BEGINS -->
                        
                        
                        <!-- tree begin --> 
                     	<div class="row">
							<div class="col-sm-2">
								<div class="widget-box transparent ">
								
									<div class="widget-header  widget-header-small ">
										<h4 class="lighter smaller">公司组织</h4>
									</div>
		
									<div class="widget-body">
										<div class="widget-main padding-2">
											<div id="tree" class="tree"></div>
										</div>
									</div>
		                       	</div>
                       		</div>
                       </div>
                       	<!-- tree end -->
                        
                        
                    	<!-- PAGE CONTENT ENDS -->
                    	
                    	
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div><!-- /.main-content -->
	</div><!-- ./main-container-inner -->
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


<script src="<?php echo $theme_url; ?>/assets/js/bootstrap.js"></script>

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
    var remoteUrl = 'get_department';
    var remoteDateSource = function(options, callback) {
        var parent_id = null
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
                	// console.log(response);
                }
            })
        }
    }

//     function getDatas(){
//     	var output ="";
//     	var ids = "";
//     	    var items = $('#tree' ).tree('selectedItem' );  
//     	    for (var i in items) if (items.hasOwnProperty(i)) {  
//     	        var item = items[i];  
//     	       ids += item.additionalParameters['id' ] + ",";
//     	       output += item.text + ",";
//     	    }
    	    
//     	    ids = ids.substring(0, ids.lastIndexOf(","));
//     	    output = output.substring(0, output.lastIndexOf(","));
//     	alert(ids+"___"+output);
//     }
    
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
    	if(data.additionalParameters.id == 1){
        	alert("11");
    	}
    	
    	if(data.additionalParameters.id == 2){
        	alert("22");
    	}
    });
});
</script>