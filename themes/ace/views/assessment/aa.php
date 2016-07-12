
<?php

    $this->pageTitle = Yii::t('vcos','员工出勤考核');
    $theme_url = Yii::app()->theme->baseUrl;
    $menu_type = 'assessment_attendance';
?>
<?php 
    //navbar 挂件
    $disable = 1;
    $this->widget('navbarWidget',array('disable'=>$disable));
?> 


<script type="text/javascript" src="<?php echo $theme_url; ?>/assets/js/jquery-1.10.2.min.js">

</script>

	<body>

	
							
												
											<form id='member_list' method="post">
										 <input type='hidden' name='page' value="1">
                                        <input type='hidden' name='isPage' value="1">
                                            <div class="center" id="page_div"></div> 
	                                 </form>

      <script src="<?php echo $theme_url; ?>/assets/js/jqPaginator.js"></script>
									<script type="text/javascript">
									
									jQuery(function($) {
									   
									/* 获取参数 */
										//分页
									     var page = 1;
									        $('#page_div').jqPaginator({
									            totalPages: 2,
									            visiblePages: 5,
									            currentPage: page,
									            wrapper:'<ul class="pagination"></ul>',
									            first:  '<li class="first"><a href="javascript:void(0);">首页</a></li>',
									            prev:   '<li class="prev"><a href="javascript:void(0);">«</a></li>',
									            next:   '<li class="next"><a href="javascript:void(0);">»</a></li>',
									            last:   '<li class="last"><a href="javascript:void(0);">尾页</a></li>',
									            page:   '<li class="page"><a href="javascript:void(0);">{{page}}</a></li>',
									            onPageChange: function (num) {
									                var val = $("input[name='page']").val();
									                if(num != val)
									                {
									                    $("input[name='page']").val(num);
									                    $("input[name='isPage']").val(2);
									                    $("form#member_list").submit();
									                }
									            }
									        });
									     
									     
								
													
												});
									</script>                                         

									</body>
									