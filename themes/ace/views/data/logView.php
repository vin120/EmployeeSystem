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
<script
    src="<?php echo $theme_url; ?>/assets/js/jquery.ui.touch-punch.min.js"></script>
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
<!-- 搜索表单开始 -->
<div class="center">
    <form method="post" id="search_form"
        action="<?php echo Yii::app()->createUrl("data/data_log");?>">
        <div style="overflow: hidden;">
            <div style="width: 50%; float: left; height: 34px;">
                <label style="" for="form-field-1"> <?php echo Yii::t('vcos','姓名');?>&nbsp;&nbsp;
                    &nbsp; &nbsp; </label> <input placeholder=""
                    id="form-field-1" style="height: 34px;" type="text"
                    name="Operator"
                    value="<?php  echo yii::t ( 'vcos', $Searchdata ['Operator'] ) ;  ?>">
            </div>
            <div class="input-group"
                style="width: 50%; float: left; text-align: left;">
                <label for="id-date-picker-1"> <?php  echo yii::t ( 'vcos', '操作时间' ) ;  ?>&nbsp;&nbsp; &nbsp;
                    &nbsp; </label> <input
                    class="form-control date-picker"
                    name="operation_time"
                    value="<?php  echo yii::t ( 'vcos', $Searchdata ['operation_time'] ) ;  ?>"
                    style="display: inline; width: 35%;"
                    id="id-date-picker-1" data-date-format="yyyy-mm-dd"
                    type="text"> <span style="display: inline;"
                    class="input-group-addon"> <i
                    class="icon-calendar bigger-110"> </i>
                </span>
            </div>
        </div>
        <div style="overflow: hidden; margin-top: 20px;">
            <div style="width: 50%; float: left;">
                <label> <?php  echo yii::t ( 'vcos', '操作类型' ) ;  ?>&nbsp;&nbsp;&nbsp;&nbsp; <select
                    style="width: 200px;" aria-controls="sample-table-2"
                    size="1" name="operation_type">

                    <?php

																				foreach ( $log as $row2 ) {

																					?>
                        <option
                            value="<?php  echo yii::t ( 'vcos', $row2 ['operation_type'] ) ;  ?>">
                    	<?php

																					echo yii::t ( 'vcos', $row2 ['operation_type'] );
																					?></option>

                                                                                    <?php
																				}
																				?>
                        <option selected="selected"
                            value="<?php  echo yii::t ( 'vcos', $Searchdata ['operation_type'] ) ;  ?>"><?php  echo yii::t ( 'vcos', $Searchdata ['operation_type'] ) ;  ?></option>
                </select>
                </label>
            </div>
            <div style="width: 50%; float: right; text-align: left;">
                <label style=""> <?php  echo yii::t ( 'vcos', '操作模块' ) ;  ?> &nbsp;&nbsp; &nbsp; &nbsp;<select
                    style="display: inline; width: 200px;"
                    aria-controls="sample-table-2" size="1"
                    name="operation_module">
                    <?php

																				foreach ( $log as $row1 ) {

																					?>
                            <option
                            value=" <?php echo  $row1['operation_module'];   ?>"> <?php  echo yii::t ( 'vcos', $row1 ['operation_module'] ) ;  ?> </option>

                <?php
																				}

																				?>

                    <option selected="selected"
                            value=" <?php echo  $Searchdata ['operation_module'];   ?>"> <?php  echo yii::t ( 'vcos', $Searchdata ['operation_module'] ) ;  ?> </option>
                </select>
                </label>
            </div>
        </div>
        <div style="margin-top: 20px;" class="center">
            <button style="" value="搜索" name="soso"
                class="btn btn-purple  search_search " type="submit">
               <?php echo Yii::t('vcos','搜索');?> <i class="icon-search  bigger-110"> </i>
            </button>
            &nbsp; &nbsp; &nbsp;
            <button value="清空" type="button" class="btn reset">
                <i class="icon-undo bigger-110"> </i> <?php echo Yii::t('vcos','清空');?>
            </button>
        </div>
    </form>
</div>
<!-- 搜索表单结束 -->
<div class="table-responsive" style="margin-top: 5px;">
    <table id="sample-table-2"
        class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th><?php echo Yii::t('vcos','序号');?></th>
                <th><?php echo Yii::t('vcos','员工编码');?></th>
                <th><?php echo Yii::t('vcos','姓名');?></th>
                <th><?php echo Yii::t('vcos','操作模块');?></th>
                <th><?php echo Yii::t('vcos','操作类型');?></th>
                <th><?php echo Yii::t('vcos','操作时间');?></th>
                <th><?php echo Yii::t('vcos','操作内容');?></th>
                <!--  <th colspan="2"> 操作</th>  -->
            </tr>
        </thead>
        <tbody>

		<?php

		$i = 0;
		foreach ( $log as $row ) {
			$i ++;

			?>


			<tr>
                <td><?php echo $i;?></td>
                <td><?php echo  $row['employee_code'];?></td>
                <td><?php echo $row['cn_name'];?></td>
                <td><?php echo $row['operation_module'];?></td>
                <td><?php echo $row['operation_type'];?></td>
                <td><?php echo  $row['operation_time'];?></td>
                <td><?php echo $row['operation_content'];?></td>
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
<div style="text-align: center; margin-top: 150px;">
    <a href="#modal-form" data-toggle="modal">
        <button class="btn btn-info export" type="button">
            <i class="icon-ok bigger-110"></i> <?php echo Yii::t('vcos','导出');?>
        </button>
    </a>
</div>
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
<!-- 分页的js开始 -->
<script type="text/javascript">

        $('.pagination li a').click(
         function () {
              var url=$(this).attr("href");
        	 $("form").attr("action", url);
             $("form").submit();//将form表单跳转到<a>的href的地址
             return false;//退出不让啊<a>标签跳转链接



      });



        $(".reset").click(function(){

//             清空表单所有内容，很好用，很强大
        	 $(':input','#search_form')
             .not(':button, :submit, :reset, :hidden')
             .val('')
             .removeAttr('checked')
             .removeAttr('selected');

            });


        
   
      


        $('.search_search').click(function(event) {
     
        	url="<?php echo Yii::app()->createUrl("data/data_log");?>"



            $('#search_form').attr('action', url);

        	$('#search_form').submit();




        });

        $('.export').click(function(event) {



        	url="<?php echo Yii::app()->createUrl("data/data_log_export");?>"



            $('#search_form').attr('action', url);

        	$('#search_form').submit();




        });






</script>
<!-- 分页的js结束 -->
