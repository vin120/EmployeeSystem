<!-- 多条删除弹出框结束 -->
<script type="text/javascript">
      $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
            _title: function(title) {
                var $title = this.options.title || '&nbsp;'
                if( ("title_html" in this.options) && this.options.title_html == true )
                        title.html($title);
                else title.text($title);
            }
        }));


      $( "#table_1_2 .delete" ).on('click', function(e) {
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
                            var url="<?php  echo Yii::app()->request->url?>"+"/id/"+$a;

                           location.href=url;

                            $( this ).dialog( "close" );
                        }
                    }
                    ,
                    {
                        html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
                        "class" : "btn btn-xs ",
                        click: function() {
                            $('.widget-header h4').html("<i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '删除这条记录？')?>");
                            $('#dialog-confirm-content').html("<?php echo yii::t('vcos', '这条记录将被永久删除，并且无法恢复。')?>");
                            $('#confirm').show();
                            $( this ).dialog( "close" );
                        }
                    }
                ]
            });






      });



     $("#table_1_2 .checkALL").click(function () {

            if($(this).prop('checked')==true)
            {
                $("#table_1_2").find(".checkbox_button").prop("checked",true);
            }
            else {
                $("#table_1_2").find(".checkbox_button").prop("checked",false);
            }

        });


     //table_1_2删除选择

      $( "#table_1_2 .Batch_delete_records" ).on('click', function(e) {

        e.preventDefault();
        var ischeckbox=false;
        $("#table_1_2 .checkbox_button").each(function(){
          if($(this).prop('checked')==true)
          {
              ischeckbox=true;
          }
        });

        if(ischeckbox==false)
        {

            $( "#dialog-confirm2" ).removeClass('hide').dialog({
                closeOnEscape:false,
                open:function(event,ui){$(".ui-dialog-titlebar-close").hide();} ,
                resizable: false,
                modal: true,
                title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '没有选中 ！')?></h4></div>",
                title_html: true,
                buttons: [

                    {
                        html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
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
            title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '删除选中的记录？')?></h4></div>",
            title_html: true,
            buttons: [
                {
                    html: "<i class='icon-trash bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '删除？')?>",
                    "class" : "btn btn-danger btn-xs ",
                    "id" :"danger2",
                    click: function() {
                        var temp=$("#table_1_2").find('.form2');
                            var url="<?php  echo Yii::app()->request->url?>";
                            temp.attr('action', url);
                            temp.submit();

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



  $('#table_1_2 .pagination li a').click(
         function () {
              var url=$(this).attr("href");
             $("#table_1_2 .search_form").attr("action", url);
             $("#table_1_2 .search_form").submit();//将form表单跳转到<a>的href的地址
             return false;//退出不让啊<a>标签跳转链接



      });

      // 清空

      $("#table_1_2 .reset").click(function(){
//             清空表单所有内容，很好用，很强大
             $(':input','#table_1_2 .search_form')
             .not(':button, :submit, :reset, :hidden')
             .val('')

             .removeAttr('selected');

            });


// 搜索
 $('#table_1_2 .search').click(function(event) {


            url="<?php echo Yii::app()->createUrl("salary/salary_Calculate/t2/2");?>"
            $("#table_1_2 .search_form").attr('action', url);

            $("#table_1_2 .search_form").submit();




        });



 // 基本工资查询
// 清空表单所有内容


      $("#table_1_3 .reset").click(function(){
//             清空表单所有内容，很好用，很强大
             $(':input','#table_1_3 .search_form')
             .not(':button, :submit, :reset, :hidden')
             .val('')
              .removeAttr('checked')
             .removeAttr('selected');

            });

// 搜索
     $('#table_1_3 .search').click(function(event) {


            url="<?php echo Yii::app()->createUrl("salary/salary_Calculate/t2/3");?>"
            $("#table_1_3 .search_form").attr('action', url);

            $("#table_1_3 .search_form").submit();




        });

     //
       $('#table_1_3 .pagination li a').click(
         function () {
              var url=$(this).attr("href");
             $("#table_1_3 .search_form").attr("action", url);
             $("#table_1_3 .search_form").submit();//将form表单跳转到<a>的href的地址
             return false;//退出不让啊<a>标签跳转链接



      });


      $('#table_1_3 .export').click(function(event) {
          /* Act on the event */

          url="<?php echo Yii::app()->createUrl("salary/salary_managment_export");?>";
          $("#table_1_3 .search_form").attr("action", url);
       $("#table_1_3 .search_form").submit();

      });


      // id=table_2_2


      // table_2_2删除

      // 单条


      $( "#table_2_2 .delete" ).on('click', function(e) {
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
                            var url="<?php  echo Yii::app()->request->url?>"+"/id/"+$a;

                           location.href=url;

                            $( this ).dialog( "close" );
                        }
                    }
                    ,
                    {
                        html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
                        "class" : "btn btn-xs ",
                        click: function() {
                            $('.widget-header h4').html("<i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '删除这条记录？')?>");
                            $('#dialog-confirm-content').html("<?php echo yii::t('vcos', '这条记录将被永久删除，并且无法恢复。')?>");
                            $('#confirm').show();
                            $( this ).dialog( "close" );
                        }
                    }
                ]
            });






      });

      //

       $("#table_2_2 .checkALL").click(function () {

            if($(this).prop('checked')==true)
            {
                $("#table_2_2").find(".checkbox_button").prop("checked",true);
            }
            else {
                $("#table_2_2").find(".checkbox_button").prop("checked",false);
            }

        });


     //table_1_2删除选择

      $( "#table_2_2 .Batch_delete_records" ).on('click', function(e) {

        e.preventDefault();
        var ischeckbox=false;
        $("#table_2_2 .checkbox_button").each(function(){
          if($(this).prop('checked')==true)
          {
              ischeckbox=true;
          }
        });

        if(ischeckbox==false)
        {

            $( "#dialog-confirm2" ).removeClass('hide').dialog({
                closeOnEscape:false,
                open:function(event,ui){$(".ui-dialog-titlebar-close").hide();} ,
                resizable: false,
                modal: true,
                title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '没有选中 ！')?></h4></div>",
                title_html: true,
                buttons: [

                    {
                        html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
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
            title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '删除选中的记录？')?></h4></div>",
            title_html: true,
            buttons: [
                {
                    html: "<i class='icon-trash bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '删除？')?>",
                    "class" : "btn btn-danger btn-xs ",
                    "id" :"danger2",
                    click: function() {
                        var temp=$("#table_2_2").find('.form2');
                            var url="<?php  echo Yii::app()->request->url?>";
                            temp.attr('action', url);
                            temp.submit();

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



      $('#table_2_2 .pagination li a').click(
         function () {
              var url=$(this).attr("href");
             $("#table_2_2 .search_form").attr("action", url);
             $("#table_2_2 .search_form").submit();//将form表单跳转到<a>的href的地址
             return false;//退出不让啊<a>标签跳转链接



      });

      // 清空

      $("#table_2_2 .reset").click(function(){
//             清空表单所有内容，很好用，很强大
             $(':input','#table_2_2 .search_form')
             .not(':button, :submit, :reset, :hidden')
             .val('')
             .removeAttr('selected');

            });


// 搜索
 $('#table_2_2 .search').click(function(event) {


            url="<?php echo Yii::app()->createUrl("salary/salary_Calculate/t1/2/t2/2");?>"
            $("#table_2_2 .search_form").attr('action', url);

            $("#table_2_2 .search_form").submit();




        });






// 清空表单所有内容


      $("#table_2_3 .reset").click(function(){
//             清空表单所有内容，很好用，很强大
             $(':input','#table_2_3 .search_form')
             .not(':button, :submit, :reset, :hidden')
             .val('')
              .removeAttr('checked')
             .removeAttr('selected');

            });

// 搜索
     $('#table_2_3 .search').click(function(event) {


            url="<?php echo Yii::app()->createUrl("salary/salary_Calculate/t1/2/t2/3");?>"
            $("#table_2_3 .search_form").attr('action', url);

            $("#table_2_3 .search_form").submit();




        });

     //
       $('#table_2_3 .pagination li a').click(
         function () {
              var url=$(this).attr("href");
             $("#table_2_3 .search_form").attr("action", url);
             $("#table_2_3 .search_form").submit();//将form表单跳转到<a>的href的地址
             return false;//退出不让啊<a>标签跳转链接



      });


      $('#table_2_3 .export').click(function(event) {
          /* Act on the event */

          url="<?php echo Yii::app()->createUrl("salary/overtime_managment_export");?>";
          $("#table_2_3 .search_form").attr("action", url);
       $("#table_2_3 .search_form").submit();

      });



// table_3下的table_3_2,table_3_3 开始


     

      // 单条


      $( "#table_3_2 .delete" ).on('click', function(e) {
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
                            var url="<?php  echo Yii::app()->request->url?>"+"/id/"+$a;

                           location.href=url;

                            $( this ).dialog( "close" );
                        }
                    }
                    ,
                    {
                        html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
                        "class" : "btn btn-xs ",
                        click: function() {
                            $('.widget-header h4').html("<i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '删除这条记录？')?>");
                            $('#dialog-confirm-content').html("<?php echo yii::t('vcos', '这条记录将被永久删除，并且无法恢复。')?>");
                            $('#confirm').show();
                            $( this ).dialog( "close" );
                        }
                    }
                ]
            });






      });

      //

       $("#table_3_2 .checkALL").click(function () {

            if($(this).prop('checked')==true)
            {
                $("#table_3_2").find(".checkbox_button").prop("checked",true);
            }
            else {
                $("#table_3_2").find(".checkbox_button").prop("checked",false);
            }

        });


     //删除选中

      $( "#table_3_2 .Batch_delete_records" ).on('click', function(e) {

        e.preventDefault();
        var ischeckbox=false;
        $("#table_3_2 .checkbox_button").each(function(){
          if($(this).prop('checked')==true)
          {
              ischeckbox=true;
          }
        });

        if(ischeckbox==false)
        {

            $( "#dialog-confirm2" ).removeClass('hide').dialog({
                closeOnEscape:false,
                open:function(event,ui){$(".ui-dialog-titlebar-close").hide();} ,
                resizable: false,
                modal: true,
                title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '没有选中 ！')?></h4></div>",
                title_html: true,
                buttons: [

                    {
                        html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
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
            title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '删除选中的记录？')?></h4></div>",
            title_html: true,
            buttons: [
                {
                    html: "<i class='icon-trash bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '删除？')?>",
                    "class" : "btn btn-danger btn-xs ",
                    "id" :"danger2",
                    click: function() {
                        var temp=$("#table_3_2").find('.form2');
                            var url="<?php  echo Yii::app()->request->url?>";
                            temp.attr('action', url);
                            temp.submit();

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



      $('#table_3_2 .pagination li a').click(
         function () {
              var url=$(this).attr("href");
             $("#table_3_2 .search_form").attr("action", url);
             $("#table_3_2 .search_form").submit();//将form表单跳转到<a>的href的地址
             return false;//退出不让啊<a>标签跳转链接



      });

      // 清空

      $("#table_3_2 .reset").click(function(){
//             清空表单所有内容，很好用，很强大
             $(':input','#table_3_2 .search_form')
             .not(':button, :submit, :reset, :hidden')
             .val('')
             .removeAttr('selected');

            });


// 搜索
 $('#table_3_2 .search').click(function(event) {


            url="<?php echo Yii::app()->createUrl("salary/salary_Calculate/t1/2/t2/2");?>"
            $("#table_3_2 .search_form").attr('action', url);

            $("#table_3_2 .search_form").submit();




        });






// 清空表单所有内容


      $("#table_3_3 .reset").click(function(){
//             清空表单所有内容，很好用，很强大
             $(':input','#table_3_3 .search_form')
             .not(':button, :submit, :reset, :hidden')
             .val('')
              .removeAttr('checked')
             .removeAttr('selected');

            });

// 搜索
     $('#table_3_3 .search').click(function(event) {


            url="<?php echo Yii::app()->createUrl("salary/salary_Calculate/t1/2/t2/3");?>"
            $("#table_3_3 .search_form").attr('action', url);

            $("#table_3_3 .search_form").submit();




        });

     //
       $('#table_3_3 .pagination li a').click(
         function () {
              var url=$(this).attr("href");
             $("#table_3_3 .search_form").attr("action", url);
             $("#table_3_3 .search_form").submit();//将form表单跳转到<a>的href的地址
             return false;//退出不让啊<a>标签跳转链接



      });


      $('#table_3_3 .export').click(function(event) {
          /* Act on the event */

          url="<?php echo Yii::app()->createUrl("salary/overtime_managment_export");?>";
          $("#table_3_3 .search_form").attr("action", url);
       $("#table_3_3 .search_form").submit();

      });


      // table_3下的table_3_2,table_3_3 结束






      // table_4下的table_4_2,table_4_3 开始



      // 单条


      $( "#table_4_2 .delete" ).on('click', function(e) {
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
                            var url="<?php  echo Yii::app()->request->url?>"+"/id/"+$a;

                           location.href=url;

                            $( this ).dialog( "close" );
                        }
                    }
                    ,
                    {
                        html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
                        "class" : "btn btn-xs ",
                        click: function() {
                            $('.widget-header h4').html("<i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '删除这条记录？')?>");
                            $('#dialog-confirm-content').html("<?php echo yii::t('vcos', '这条记录将被永久删除，并且无法恢复。')?>");
                            $('#confirm').show();
                            $( this ).dialog( "close" );
                        }
                    }
                ]
            });






      });

      //

       $("#table_4_2 .checkALL").click(function () {

            if($(this).prop('checked')==true)
            {
                $("#table_4_2").find(".checkbox_button").prop("checked",true);
            }
            else {
                $("#table_4_2").find(".checkbox_button").prop("checked",false);
            }

        });


     //删除选中

      $( "#table_4_2 .Batch_delete_records" ).on('click', function(e) {

        e.preventDefault();
        var ischeckbox=false;
        $("#table_4_2 .checkbox_button").each(function(){
          if($(this).prop('checked')==true)
          {
              ischeckbox=true;
          }
        });

        if(ischeckbox==false)
        {

            $( "#dialog-confirm2" ).removeClass('hide').dialog({
                closeOnEscape:false,
                open:function(event,ui){$(".ui-dialog-titlebar-close").hide();} ,
                resizable: false,
                modal: true,
                title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '没有选中 ！')?></h4></div>",
                title_html: true,
                buttons: [

                    {
                        html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
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
            title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '删除选中的记录？')?></h4></div>",
            title_html: true,
            buttons: [
                {
                    html: "<i class='icon-trash bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '删除？')?>",
                    "class" : "btn btn-danger btn-xs ",
                    "id" :"danger2",
                    click: function() {
                        var temp=$("#table_4_2").find('.form2');
                            var url="<?php  echo Yii::app()->request->url?>";
                            temp.attr('action', url);
                            temp.submit();

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



      $('#table_4_2 .pagination li a').click(
         function () {
              var url=$(this).attr("href");
             $("#table_4_2 .search_form").attr("action", url);
             $("#table_4_2 .search_form").submit();//将form表单跳转到<a>的href的地址
             return false;//退出不让啊<a>标签跳转链接



      });

      // 清空

      $("#table_4_2 .reset").click(function(){
//             清空表单所有内容，很好用，很强大
             $(':input','#table_4_2 .search_form')
             .not(':button, :submit, :reset, :hidden')
             .val('')
             .removeAttr('selected');

            });


// 搜索
 $('#table_4_2 .search').click(function(event) {


            url="<?php echo Yii::app()->createUrl("salary/salary_Calculate/t1/4/t2/2");?>"
            $("#table_4_2 .search_form").attr('action', url);

            $("#table_4_2 .search_form").submit();




        });






// 清空表单所有内容


      $("#table_4_3 .reset").click(function(){
//             清空表单所有内容，很好用，很强大
             $(':input','#table_4_3 .search_form')
             .not(':button, :submit, :reset, :hidden')
             .val('')
              .removeAttr('checked')
             .removeAttr('selected');

            });

// 搜索
     $('#table_4_3 .search').click(function(event) {


            url="<?php echo Yii::app()->createUrl("salary/salary_Calculate/t1/4/t2/3");?>"
            $("#table_4_3 .search_form").attr('action', url);

            $("#table_4_3 .search_form").submit();




        });

     //
       $('#table_4_3 .pagination li a').click(
         function () {
              var url=$(this).attr("href");
             $("#table_4_3 .search_form").attr("action", url);
             $("#table_4_3 .search_form").submit();//将form表单跳转到<a>的href的地址
             return false;//退出不让啊<a>标签跳转链接



      });


      $('#table_4_3 .export').click(function(event) {
          /* Act on the event */

          url="<?php echo Yii::app()->createUrl("salary/performance_management_export");?>";
          $("#table_4_3 .search_form").attr("action", url);
       $("#table_4_3 .search_form").submit();

      });



      // table_4下的table_4_2,table_4_3 结束






       // table_5下的table_5_2,table_5_3 开始




      // 单条


      $( "#table_5_2 .delete" ).on('click', function(e) {
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
                            var url="<?php  echo Yii::app()->request->url?>"+"/id/"+$a;

                           location.href=url;

                            $( this ).dialog( "close" );
                        }
                    }
                    ,
                    {
                        html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
                        "class" : "btn btn-xs ",
                        click: function() {
                            $('.widget-header h4').html("<i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '删除这条记录？')?>");
                            $('#dialog-confirm-content').html("<?php echo yii::t('vcos', '这条记录将被永久删除，并且无法恢复。')?>");
                            $('#confirm').show();
                            $( this ).dialog( "close" );
                        }
                    }
                ]
            });






      });

      //

       $("#table_5_2 .checkALL").click(function () {

            if($(this).prop('checked')==true)
            {
                $("#table_5_2").find(".checkbox_button").prop("checked",true);
            }
            else {
                $("#table_5_2").find(".checkbox_button").prop("checked",false);
            }

        });


     //删除选中

      $( "#table_5_2 .Batch_delete_records" ).on('click', function(e) {

        e.preventDefault();
        var ischeckbox=false;
        $("#table_5_2 .checkbox_button").each(function(){
          if($(this).prop('checked')==true)
          {
              ischeckbox=true;
          }
        });

        if(ischeckbox==false)
        {

            $( "#dialog-confirm2" ).removeClass('hide').dialog({
                closeOnEscape:false,
                open:function(event,ui){$(".ui-dialog-titlebar-close").hide();} ,
                resizable: false,
                modal: true,
                title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '没有选中 ！')?></h4></div>",
                title_html: true,
                buttons: [

                    {
                        html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
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
            title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '删除选中的记录？')?></h4></div>",
            title_html: true,
            buttons: [
                {
                    html: "<i class='icon-trash bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '删除？')?>",
                    "class" : "btn btn-danger btn-xs ",
                    "id" :"danger2",
                    click: function() {
                        var temp=$("#table_5_2").find('.form2');
                            var url="<?php  echo Yii::app()->request->url?>";
                            temp.attr('action', url);
                            temp.submit();

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



      $('#table_5_2 .pagination li a').click(
         function () {
              var url=$(this).attr("href");
             $("#table_5_2 .search_form").attr("action", url);
             $("#table_5_2 .search_form").submit();//将form表单跳转到<a>的href的地址
             return false;//退出不让啊<a>标签跳转链接



      });

      // 清空

      $("#table_5_2 .reset").click(function(){
//             清空表单所有内容，很好用，很强大
             $(':input','#table_5_2 .search_form')
             .not(':button, :submit, :reset, :hidden')
             .val('')
             .removeAttr('selected');

            });


// 搜索
 $('#table_5_2 .search').click(function(event) {


            url="<?php echo Yii::app()->createUrl("salary/salary_Calculate/t1/5/t2/2");?>"
            $("#table_5_2 .search_form").attr('action', url);

            $("#table_5_2 .search_form").submit();




        });






// 清空表单所有内容


      $("#table_5_3 .reset").click(function(){
//             清空表单所有内容，很好用，很强大
             $(':input','#table_5_3 .search_form')
             .not(':button, :submit, :reset, :hidden')
             .val('')
              .removeAttr('checked')
             .removeAttr('selected');

            });

// 搜索
     $('#table_5_3 .search').click(function(event) {


            url="<?php echo Yii::app()->createUrl("salary/salary_Calculate/t1/5/t2/3");?>"
            $("#table_5_3 .search_form").attr('action', url);

            $("#table_5_3 .search_form").submit();




        });

     //
       $('#table_5_3 .pagination li a').click(
         function () {
              var url=$(this).attr("href");
             $("#table_5_3 .search_form").attr("action", url);
             $("#table_5_3 .search_form").submit();//将form表单跳转到<a>的href的地址
             return false;//退出不让啊<a>标签跳转链接



      });


      $('#table_5_3 .export').click(function(event) {
          /* Act on the event */

          url="<?php echo Yii::app()->createUrl("salary/tax_management_export");?>";
          $("#table_5_3 .search_form").attr("action", url);
       $("#table_5_3 .search_form").submit();

      });



      // table_5下的table_5_2,table_5_3 结束


      // table_6下的table_6_2,table_6_3 开始




      // 单条


      $( "#table_6_2 .delete" ).on('click', function(e) {
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
                            var url="<?php  echo Yii::app()->request->url?>"+"/id/"+$a;

                           location.href=url;

                            $( this ).dialog( "close" );
                        }
                    }
                    ,
                    {
                        html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
                        "class" : "btn btn-xs ",
                        click: function() {
                            $('.widget-header h4').html("<i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '删除这条记录？')?>");
                            $('#dialog-confirm-content').html("<?php echo yii::t('vcos', '这条记录将被永久删除，并且无法恢复。')?>");
                            $('#confirm').show();
                            $( this ).dialog( "close" );
                        }
                    }
                ]
            });






      });

      //

       $("#table_6_2 .checkALL").click(function () {

            if($(this).prop('checked')==true)
            {
                $("#table_6_2").find(".checkbox_button").prop("checked",true);
            }
            else {
                $("#table_6_2").find(".checkbox_button").prop("checked",false);
            }

        });


     //删除选中

      $( "#table_6_2 .Batch_delete_records" ).on('click', function(e) {

        e.preventDefault();
        var ischeckbox=false;
        $("#table_6_2 .checkbox_button").each(function(){
          if($(this).prop('checked')==true)
          {
              ischeckbox=true;
          }
        });

        if(ischeckbox==false)
        {

            $( "#dialog-confirm2" ).removeClass('hide').dialog({
                closeOnEscape:false,
                open:function(event,ui){$(".ui-dialog-titlebar-close").hide();} ,
                resizable: false,
                modal: true,
                title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '没有选中 ！')?></h4></div>",
                title_html: true,
                buttons: [

                    {
                        html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
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
            title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '删除选中的记录？')?></h4></div>",
            title_html: true,
            buttons: [
                {
                    html: "<i class='icon-trash bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '删除？')?>",
                    "class" : "btn btn-danger btn-xs ",
                    "id" :"danger2",
                    click: function() {
                        var temp=$("#table_6_2").find('.form2');
                            var url="<?php  echo Yii::app()->request->url?>";
                            temp.attr('action', url);
                            temp.submit();

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



      $('#table_6_2 .pagination li a').click(
         function () {
              var url=$(this).attr("href");
             $("#table_3_2 .search_form").attr("action", url);
             $("#table_3_2 .search_form").submit();//将form表单跳转到<a>的href的地址
             return false;//退出不让啊<a>标签跳转链接



      });

      // 清空

      $("#table_6_2 .reset").click(function(){
//             清空表单所有内容，很好用，很强大
             $(':input','#table_6_2 .search_form')
             .not(':button, :submit, :reset, :hidden')
             .val('')
             .removeAttr('selected');

            });


// 搜索
 $('#table_6_2 .search').click(function(event) {


            url="<?php echo Yii::app()->createUrl("salary/salary_Calculate/t1/6/t2/2");?>"
            $("#table_6_2 .search_form").attr('action', url);

            $("#table_6_2 .search_form").submit();




        });






// 清空表单所有内容


      $("#table_6_3 .reset").click(function(){
//             清空表单所有内容，很好用，很强大
             $(':input','#table_6_3 .search_form')
             .not(':button, :submit, :reset, :hidden')
             .val('')
              .removeAttr('checked')
             .removeAttr('selected');

            });

// 搜索
     $('#table_6_3 .search').click(function(event) {


            url="<?php echo Yii::app()->createUrl("salary/salary_Calculate/t1/6/t2/3");?>"
            $("#table_6_3 .search_form").attr('action', url);

            $("#table_6_3 .search_form").submit();




        });

     //
       $('#table_6_3 .pagination li a').click(
         function () {
              var url=$(this).attr("href");
             $("#table_6_3 .search_form").attr("action", url);
             $("#table_6_3 .search_form").submit();//将form表单跳转到<a>的href的地址
             return false;//退出不让啊<a>标签跳转链接



      });


      $('#table_6_3 .export').click(function(event) {
          /* Act on the event */

          url="<?php echo Yii::app()->createUrl("salary/allowance_management_export");?>";
          $("#table_6_3 .search_form").attr("action", url);
       $("#table_6_3 .search_form").submit();

      });



      // table_6下的table_6_2,table_6_3 结束


       // table_7下的table_7_2,table_7_3 开始



      // 单条


      $( "#table_7_2 .delete" ).on('click', function(e) {
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
                            var url="<?php  echo Yii::app()->request->url?>"+"/id/"+$a;

                           location.href=url;

                            $( this ).dialog( "close" );
                        }
                    }
                    ,
                    {
                        html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
                        "class" : "btn btn-xs ",
                        click: function() {
                            $('.widget-header h4').html("<i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '删除这条记录？')?>");
                            $('#dialog-confirm-content').html("<?php echo yii::t('vcos', '这条记录将被永久删除，并且无法恢复。')?>");
                            $('#confirm').show();
                            $( this ).dialog( "close" );
                        }
                    }
                ]
            });






      });

      //

       $("#table_7_2 .checkALL").click(function () {

            if($(this).prop('checked')==true)
            {
                $("#table_7_2").find(".checkbox_button").prop("checked",true);
            }
            else {
                $("#table_7_2").find(".checkbox_button").prop("checked",false);
            }

        });


     //删除选中

      $( "#table_7_2 .Batch_delete_records" ).on('click', function(e) {

        e.preventDefault();
        var ischeckbox=false;
        $("#table_7_2 .checkbox_button").each(function(){
          if($(this).prop('checked')==true)
          {
              ischeckbox=true;
          }
        });

        if(ischeckbox==false)
        {

            $( "#dialog-confirm2" ).removeClass('hide').dialog({
                closeOnEscape:false,
                open:function(event,ui){$(".ui-dialog-titlebar-close").hide();} ,
                resizable: false,
                modal: true,
                title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '没有选中 ！')?></h4></div>",
                title_html: true,
                buttons: [

                    {
                        html: "<i class='icon-remove bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '取消？')?>",
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
            title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i><?php echo yii::t('vcos', '删除选中的记录？')?></h4></div>",
            title_html: true,
            buttons: [
                {
                    html: "<i class='icon-trash bigger-110'></i>&nbsp; <?php echo yii::t('vcos', '删除？')?>",
                    "class" : "btn btn-danger btn-xs ",
                    "id" :"danger2",
                    click: function() {
                        var temp=$("#table_7_2").find('.form2');
                            var url="<?php  echo Yii::app()->request->url?>";
                            temp.attr('action', url);
                            temp.submit();

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



      $('#table_7_2 .pagination li a').click(
         function () {
              var url=$(this).attr("href");
             $("#table_7_2 .search_form").attr("action", url);
             $("#table_7_2 .search_form").submit();//将form表单跳转到<a>的href的地址
             return false;//退出不让啊<a>标签跳转链接



      });

      // 清空

      $("#table_7_2 .reset").click(function(){
//             清空表单所有内容，很好用，很强大
             $(':input','#table_7_2 .search_form')
             .not(':button, :submit, :reset, :hidden')
             .val('')
             .removeAttr('selected');

            });


// 搜索
 $('#table_7_2 .search').click(function(event) {


            url="<?php echo Yii::app()->createUrl("salary/salary_Calculate/t1/7/t2/2");?>"
            $("#table_7_2 .search_form").attr('action', url);

            $("#table_7_2 .search_form").submit();




        });






// 清空表单所有内容


      $("#table_7_3 .reset").click(function(){
//             清空表单所有内容，很好用，很强大
             $(':input','#table_7_3 .search_form')
             .not(':button, :submit, :reset, :hidden')
             .val('')
              .removeAttr('checked')
             .removeAttr('selected');

            });

// 搜索
     $('#table_7_3 .search').click(function(event) {


            url="<?php echo Yii::app()->createUrl("salary/salary_Calculate/t1/7/t2/3");?>"
            $("#table_7_3 .search_form").attr('action', url);

            $("#table_7_3 .search_form").submit();




        });

     //
       $('#table_7_3 .pagination li a').click(
         function () {
              var url=$(this).attr("href");
             $("#table_7_3 .search_form").attr("action", url);
             $("#table_7_3 .search_form").submit();//将form表单跳转到<a>的href的地址
             return false;//退出不让啊<a>标签跳转链接



      });


      $('#table_7_3 .export').click(function(event) {
          /* Act on the event */

          url="<?php echo Yii::app()->createUrl("salary/otherallowance_management_export");?>";
          $("#table_7_3 .search_form").attr("action", url);
       $("#table_7_3 .search_form").submit();

      });



      // table_7下的table_7_2,table_7_3 结束








</script>
<script type="text/javascript">
var flag=true;

    // 导入判断是否选择文件
    $(".daoru1").click(function(event) {
        /* Act on the event */
       if( $('#table_2_1').find('input').val()=='')
       {
        alert("请选择导入文件");
        flag=false;
        return false;
       }
       var filename=$('#table_2_1').find('input').val();
       var start=filename.lastIndexOf('.');
       var houchui=filename.substr(start)



     if(!((houchui=='.xls')||(houchui=='.xlsx')) )
     {
        alert("请选择正确的文件类型");
        return false;
     }

     var url="<?php echo Yii::app()->createUrl("salary/import_basesalary");?>";
    $('#import1').attr('action', url);
    $('#import1').submit();
    return false;
    });



      $(".daoru_5_1").click(function(event) {
        /* Act on the event */
       if( $('#table_5_1').find('input').val()=='')
       {
        alert("请选择导入文件");
        flag=false;
        return false;
       }
       var filename=$('#table_5_1').find('input').val();
       var start=filename.lastIndexOf('.');
       var houchui=filename.substr(start)



     if(!((houchui=='.xls')||(houchui=='.xlsx')) )
     {
        alert("请选择正确的文件类型");
        return false;
     }

     var url="<?php echo Yii::app()->createUrl("salary/import_tax_management");?>";
    $('#import_5_1').attr('action', url);
    $('#import_5_1').submit();
    return false;
    });




     $(".daoru_7_1").click(function(event) {
        /* Act on the event */
       if( $('#table_7_1').find('input').val()=='')
       {
        alert("请选择导入文件");
        flag=false;
        return false;
       }
       var filename=$('#table_7_1').find('input').val();
       var start=filename.lastIndexOf('.');
       var houchui=filename.substr(start)



     if(!((houchui=='.xls')||(houchui=='.xlsx')) )
     {
        alert("请选择正确的文件类型");
        return false;
     }

     var url="<?php echo Yii::app()->createUrl("salary/import_otherallowance_management");?>";
    $('#import_7_1').attr('action', url);
    $('#import_7_1').submit();
    return false;
    });

</script>
<!-- //选项卡切换 -->
<script type="text/javascript">

$('.tabbable1 #myTab  li ').find('a').click(function(){



    switch ($(this).attr("href")) {
    case  "#table_1":
     location.href="<?php echo Yii::app()->createUrl("salary/salary_calculate");?>";
        break;
    case "#table_2":
                location.href="<?php echo Yii::app()->createUrl("salary/salary_calculate");?>"+"/t1/"+"2";
        break;
     case "#table_3":
        location.href="<?php echo Yii::app()->createUrl("salary/salary_calculate");?>"+"/t1/"+"3";
        break;
      case "#table_4":
          location.href="<?php echo Yii::app()->createUrl("salary/salary_calculate");?>"+"/t1/"+"4";
        break;
     case "#table_5":
         location.href="<?php echo Yii::app()->createUrl("salary/salary_calculate");?>"+"/t1/"+"5";
        break;
      case "#table_6":
         location.href="<?php echo Yii::app()->createUrl("salary/salary_calculate");?>"+"/t1/"+"6";
        break;
       case "#table_7":
         location.href="<?php echo Yii::app()->createUrl("salary/salary_calculate");?>"+"/t1/"+"7";
        break;
    default:

        break;
}


return false;

});



$('.myTab4').each(function(index, el) {
    $(this).find('li').eq(0).click(function(event) {

     location.href="<?php echo Yii::app()->createUrl("salary/salary_calculate");?>"+"/t1/"+$('#t1').html();
   return false;


    });


    $(this).find('li').eq(1).click(function(event) {

  location.href="<?php echo Yii::app()->createUrl("salary/salary_calculate");?>"+"/t1/"+$('#t1').html()+"/t2/2";
   return false;


    });

    $(this).find('li').eq(2).click(function(event) {

 location.href="<?php echo Yii::app()->createUrl("salary/salary_calculate");?>"+"/t1/"+$('#t1').html()+"/t2/3";
  return false;


    });


});





// 删除





</script>







<script type="text/javascript">


$(document).ready(function() {

  $('#table7_table_7_2').find('.change').click(function(e) {


     var _thisTr = null; //记录table7_2中正在编辑的行                  
     _thisTr = $(this).parents('tr'); //记录table1中正在编辑的行
     var table1Tr = _thisTr  // table1中当前操作的行
     var department_id=$.trim(table1Tr.find('.department_id').text());
     var post_id=$.trim(table1Tr.find('.post_id').text());
     var department_name=$.trim(table1Tr.find('.department_name').text());
     var post_cn_name=$.trim(table1Tr.find('.post_cn_name').text());
     var cn_name=$.trim(table1Tr.find('.cn_name').text());
     var date=$.trim(table1Tr.find('.date').text());
     var post_cn_name=$.trim(table1Tr.find('.post_cn_name').text());
     var total_amount=$.trim(table1Tr.find('.total_amount').text());
     var employee_code=$.trim(table1Tr.find('.employee_code').text());
     var remark=$.trim(table1Tr.find('.remark').text());
     var $a =$.trim($(this).attr("id"));
     var a=$(".table7_edit_save").attr("id",$a);
     var table2Tr = $('#modal_table_7_form1').find('form');  //
     table2Tr.find('.department_id').val(department_id);

    // 通过默认的部门拿到默认的职务
    $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/getpost_bydepartment");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var post='<option value=""></option>';

      var post='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {    post=post+'<option value="'+a[i].post_id+'">'+a[i].post_cn_name+'</option>'
         
      }

      table2Tr.find('.post_id').html(post);//生成选择职务列表
      table2Tr.find('.post_id').val(post_id);


      //获取名字和员工编号开始


          $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/getcn_name");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id,'post_id':post_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
    

      if(data=='post_error')
     {
        alert("请选择职务");
        return;
     }

      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var namelist='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {   
       namelist=namelist+'<option value="'+a[i].cn_name+'">'+a[i].cn_name+'</option>'
         
      }

      // 对应的名字列表

      table2Tr.find('.cn_name').html(namelist);
      table2Tr.find('.cn_name option').each(function(index, el) {

        if($(this).text()==cn_name)
        {
          table2Tr.find('.cn_name').val($(this).val());

        }
        
      });

    
    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });


      // 结束



    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });



      //将table1中内容值显示到编辑页面上
       table2Tr.find('.employee_code').val(employee_code);
       var str='<option value="'+post_id+'" selected="selected">'+post_cn_name+'</option>';
       
       str='<option value="" selected="selected">'+cn_name+'</option>';
       // table2Tr.find('.cn_name').html(str);
       table2Tr.find('.date').val(date);
       table2Tr.find('.total_amount').val(total_amount);
       table2Tr.find('.remark').val(remark);
    });






  // 部门改变事件

var temp=$('#modal_table_7_form1').find('form'); 

 temp.find('.department_id').change(function(event) {

temp.find('.post_id').html('');
temp.find('.cn_name').html('');
temp.find('.employee_code').val('');
var department_id=$(this).val();


  $.ajax({
     url: "<?php echo Yii::app()->createUrl("salary/getpost_bydepartment");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        $('#department_post_id2').html('');
         return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var post='<option value=""></option>';

      var post='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {    post=post+'<option value="'+a[i].post_id+'">'+a[i].post_cn_name+'</option>'
         
      }
      

  
      temp.find('.post_id').html(post);

      //  alert(a);
      // var a=JSON.parse(data);
    

    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });

});



 // 职务下拉列表改变事件
 temp.find('.post_id').change(function(event) {


temp.find('.cn_name').html('');
temp.find('.employee_code').val('');
  var department_id=temp.find('.department_id').val();
  var post_id=$(this).val();
  if (post_id=='') {
    alert('请选择部门');
    return;
  }



     $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/getcn_name");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id,'post_id':post_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var namelist='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {   
       namelist=namelist+'<option value="'+a[i].cn_name+'">'+a[i].cn_name+'</option>'
         
      }

      // 对应的名字列表

      temp.find('.cn_name').html(namelist);
    
    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });





 });



//选择名字事件

temp.find('.cn_name').change(function(event) {

  temp.find('.employee_code').val('');
  var department_id=temp.find('.department_id').val();
  var post_id=temp.find('.post_id').val();
  var cn_name=$(this).val();

  if(cn_name=='')
  {
    alert("请选择名字");
    return;
  }




  $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/get_employee_code");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id,'post_id':post_id,'cn_name':cn_name},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
    
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
 


        temp.find('.employee_code').val(a[0].employee_code);
           
         
     

      // 对应的名字列表

     
    
    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });







});


$('.table7_edit_save').click(function(event) {


    var $a = $(this).attr("id");


    var url="<?php echo Yii::app()->createUrl("salary/otherallowance_edit");?>"+"?id="+$a;
    $('#modal_table_7_form1').find('form').attr('action', url);
    $('#modal_table_7_form1').find('form').submit();

 
});


$('.table7_add_save').click(function(event) {


   


    var url="<?php echo Yii::app()->createUrl("salary/otherallowance_add");?>";
    $('#modal_table_7_form2').find('form').attr('action', url);
    $('#modal_table_7_form2').find('form').submit();

 
});








  

});
     



  </script>


  <script type="text/javascript">


  var temp=$('#modal_table_7_form2').find('form'); 

 temp.find('.department_id').change(function(event) {

temp.find('.post_id').html('');
temp.find('.cn_name').html('');
temp.find('.employee_code').val('');
var department_id=$(this).val();


  $.ajax({
     url: "<?php echo Yii::app()->createUrl("salary/getpost_bydepartment");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
         return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var post='<option value=""></option>';

      var post='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {    post=post+'<option value="'+a[i].post_id+'">'+a[i].post_cn_name+'</option>'
         
      }
      

  
      temp.find('.post_id').html(post);

      //  alert(a);
      // var a=JSON.parse(data);
    

    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });

});



 // 职务下拉列表改变事件
 temp.find('.post_id').change(function(event) {


temp.find('.cn_name').html('');
temp.find('.employee_code').val('');
  var department_id=temp.find('.department_id').val();
  var post_id=$(this).val();
  if (post_id=='') {
    alert('请选择部门');
    return;
  }



     $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/getcn_name");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id,'post_id':post_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var namelist='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {   
       namelist=namelist+'<option value="'+a[i].cn_name+'">'+a[i].cn_name+'</option>'
         
      }

      // 对应的名字列表

      temp.find('.cn_name').html(namelist);
    
    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });





 });



//选择名字事件

temp.find('.cn_name').change(function(event) {

  temp.find('.employee_code').val('');
  var department_id=temp.find('.department_id').val();
  var post_id=temp.find('.post_id').val();
  var cn_name=$(this).val();

  if(cn_name=='')
  {
    alert("请选择名字");
    return;
  }




  $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/get_employee_code");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id,'post_id':post_id,'cn_name':cn_name},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
    
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);

        temp.find('.employee_code').val(a[0].employee_code);
           

      // 对应的名字列表

    
    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });







});
    



  </script>


<!-- 666 -->

<script type="text/javascript">


$(document).ready(function() {

  $('#table6_table_6_2').find('.change').click(function(e) {


     var _thisTr = null; //记录table7_2中正在编辑的行                  
     _thisTr = $(this).parents('tr'); //记录table1中正在编辑的行
     var table1Tr = _thisTr  // table1中当前操作的行
     var department_id=$.trim(table1Tr.find('.department_id').text());
     var post_id=$.trim(table1Tr.find('.post_id').text());
     var department_name=$.trim(table1Tr.find('.department_name').text());
     var post_cn_name=$.trim(table1Tr.find('.post_cn_name').text());
     var cn_name=$.trim(table1Tr.find('.cn_name').text());
     var date=$.trim(table1Tr.find('.date').text());
     var post_cn_name=$.trim(table1Tr.find('.post_cn_name').text());
     var allowance_amount=$.trim(table1Tr.find('.allowance_amount').text());
     var employee_code=$.trim(table1Tr.find('.employee_code').text());
     var remark=$.trim(table1Tr.find('.remark').text());
     var $a =$.trim($(this).attr("id"));
     var a=$(".table6_edit_save").attr("id",$a);
     var table2Tr = $('#modal_table_6_form1').find('form');  //
     table2Tr.find('.department_id').val(department_id);

    // 通过默认的部门拿到默认的职务
    $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/getpost_bydepartment");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var post='<option value=""></option>';

      var post='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {    post=post+'<option value="'+a[i].post_id+'">'+a[i].post_cn_name+'</option>'
         
      }

      table2Tr.find('.post_id').html(post);//生成选择职务列表
      table2Tr.find('.post_id').val(post_id);


      //获取名字和员工编号开始


          $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/getcn_name");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id,'post_id':post_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
    

      if(data=='post_error')
     {
        alert("请选择职务");
        return;
     }

      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var namelist='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {   
       namelist=namelist+'<option value="'+a[i].cn_name+'">'+a[i].cn_name+'</option>'
         
      }

      // 对应的名字列表

      table2Tr.find('.cn_name').html(namelist);
      table2Tr.find('.cn_name option').each(function(index, el) {

        if($(this).text()==cn_name)
        {
          table2Tr.find('.cn_name').val($(this).val());

        }
        
      });

    
    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });


      // 结束



    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });



      //将table1中内容值显示到编辑页面上
       table2Tr.find('.employee_code').val(employee_code);
       var str='<option value="'+post_id+'" selected="selected">'+post_cn_name+'</option>';
       
       str='<option value="" selected="selected">'+cn_name+'</option>';
       // table2Tr.find('.cn_name').html(str);
       table2Tr.find('.date').val(date);
       table2Tr.find('.allowance_amount').val(allowance_amount);
       table2Tr.find('.remark').val(remark);
    });






  // 部门改变事件

var temp=$('#modal_table_6_form1').find('form'); 

 temp.find('.department_id').change(function(event) {

temp.find('.post_id').html('');
temp.find('.cn_name').html('');
temp.find('.employee_code').val('');
var department_id=$(this).val();


  $.ajax({
     url: "<?php echo Yii::app()->createUrl("salary/getpost_bydepartment");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
    
         return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var post='<option value=""></option>';

      var post='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {    post=post+'<option value="'+a[i].post_id+'">'+a[i].post_cn_name+'</option>'
         
      }
      

  
      temp.find('.post_id').html(post);

      //  alert(a);
      // var a=JSON.parse(data);
    

    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });

});



 // 职务下拉列表改变事件
 temp.find('.post_id').change(function(event) {


temp.find('.cn_name').html('');
temp.find('.employee_code').val('');
  var department_id=temp.find('.department_id').val();
  var post_id=$(this).val();
  if (post_id=='') {
    alert('请选择部门');
    return;
  }



     $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/getcn_name");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id,'post_id':post_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var namelist='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {   
       namelist=namelist+'<option value="'+a[i].cn_name+'">'+a[i].cn_name+'</option>'
         
      }

      // 对应的名字列表

      temp.find('.cn_name').html(namelist);
    
    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });





 });



//选择名字事件

temp.find('.cn_name').change(function(event) {

  temp.find('.employee_code').val('');
  var department_id=temp.find('.department_id').val();
  var post_id=temp.find('.post_id').val();
  var cn_name=$(this).val();

  if(cn_name=='')
  {
    alert("请选择名字");
    return;
  }




  $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/get_employee_code");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id,'post_id':post_id,'cn_name':cn_name},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
    
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
 


        temp.find('.employee_code').val(a[0].employee_code);
           
         
     

      // 对应的名字列表

     
    
    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });







});


$('.table6_edit_save').click(function(event) {


    var $a = $(this).attr("id");


    var url="<?php echo Yii::app()->createUrl("salary/allowance_management_edit");?>"+"?id="+$a;
    $('#modal_table_6_form1').find('form').attr('action', url);
    $('#modal_table_6_form1').find('form').submit();

 
});


$('.table6_add_save').click(function(event) {


   


    var url="<?php echo Yii::app()->createUrl("salary/allowance_management_add");?>";
    $('#modal_table_6_form2').find('form').attr('action', url);
    $('#modal_table_6_form2').find('form').submit();

 
});








  

});
     



  </script>

<!-- 666 -->


<script type="text/javascript">


$(document).ready(function() {

  $('#table5_table_5_2').find('.change').click(function(e) {


     var _thisTr = null; //记录table7_2中正在编辑的行                  
     _thisTr = $(this).parents('tr'); //记录table1中正在编辑的行
     var table1Tr = _thisTr  // table1中当前操作的行
     var department_id=$.trim(table1Tr.find('.department_id').text());
     var post_id=$.trim(table1Tr.find('.post_id').text());
     var department_name=$.trim(table1Tr.find('.department_name').text());
     var post_cn_name=$.trim(table1Tr.find('.post_cn_name').text());
     var cn_name=$.trim(table1Tr.find('.cn_name').text());
     var date=$.trim(table1Tr.find('.date').text());
     var post_cn_name=$.trim(table1Tr.find('.post_cn_name').text());
     var tax_amount=$.trim(table1Tr.find('.tax_amount').text());
     var employee_code=$.trim(table1Tr.find('.employee_code').text());
     var remark=$.trim(table1Tr.find('.remark').text());
     var $a =$.trim($(this).attr("id"));
     var a=$(".table5_edit_save").attr("id",$a);
     var table2Tr = $('#modal_table_5_form1').find('form');  //
     table2Tr.find('.department_id').val(department_id);


    // 通过默认的部门拿到默认的职务
    $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/getpost_bydepartment");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var post='<option value=""></option>';

      var post='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {    post=post+'<option value="'+a[i].post_id+'">'+a[i].post_cn_name+'</option>'
         
      }

      table2Tr.find('.post_id').html(post);//生成选择职务列表
      table2Tr.find('.post_id').val(post_id);


      //获取名字和员工编号开始


          $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/getcn_name");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id,'post_id':post_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
    

      if(data=='post_error')
     {
        alert("请选择职务");
        return;
     }

      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var namelist='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {   
       namelist=namelist+'<option value="'+a[i].cn_name+'">'+a[i].cn_name+'</option>'
         
      }

      // 对应的名字列表

      table2Tr.find('.cn_name').html(namelist);
      table2Tr.find('.cn_name option').each(function(index, el) {

        if($(this).text()==cn_name)
        {
          table2Tr.find('.cn_name').val($(this).val());

        }
        
      });

    
    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });


      // 结束



    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });



      //将table1中内容值显示到编辑页面上
       table2Tr.find('.employee_code').val(employee_code);
       var str='<option value="'+post_id+'" selected="selected">'+post_cn_name+'</option>';
       
       str='<option value="" selected="selected">'+cn_name+'</option>';
       // table2Tr.find('.cn_name').html(str);
       table2Tr.find('.date').val(date);
       table2Tr.find('.tax_amount').val(tax_amount);
       table2Tr.find('.remark').val(remark);
    });






  // 部门改变事件

var temp=$('#modal_table_5_form1').find('form'); 

 temp.find('.department_id').change(function(event) {

temp.find('.post_id').html('');
temp.find('.cn_name').html('');
temp.find('.employee_code').val('');
var department_id=$(this).val();


  $.ajax({
     url: "<?php echo Yii::app()->createUrl("salary/getpost_bydepartment");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
    
         return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var post='<option value=""></option>';

      var post='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {    post=post+'<option value="'+a[i].post_id+'">'+a[i].post_cn_name+'</option>'
         
      }
      

  
      temp.find('.post_id').html(post);

      //  alert(a);
      // var a=JSON.parse(data);
    

    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });

});



 // 职务下拉列表改变事件
 temp.find('.post_id').change(function(event) {


temp.find('.cn_name').html('');
temp.find('.employee_code').val('');
  var department_id=temp.find('.department_id').val();
  var post_id=$(this).val();
  if (post_id=='') {
    alert('请选择部门');
    return;
  }



     $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/getcn_name");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id,'post_id':post_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var namelist='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {   
       namelist=namelist+'<option value="'+a[i].cn_name+'">'+a[i].cn_name+'</option>'
         
      }

      // 对应的名字列表

      temp.find('.cn_name').html(namelist);
    
    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });





 });



//选择名字事件

temp.find('.cn_name').change(function(event) {

  temp.find('.employee_code').val('');
  var department_id=temp.find('.department_id').val();
  var post_id=temp.find('.post_id').val();
  var cn_name=$(this).val();

  if(cn_name=='')
  {
    alert("请选择名字");
    return;
  }




  $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/get_employee_code");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id,'post_id':post_id,'cn_name':cn_name},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
    
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
 


        temp.find('.employee_code').val(a[0].employee_code);
           
         
     

      // 对应的名字列表

     
    
    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });







});


$('.table5_edit_save').click(function(event) {


    var $a = $(this).attr("id");


    var url="<?php echo Yii::app()->createUrl("salary/tax_management_edit");?>"+"?id="+$a;
    $('#modal_table_5_form1').find('form').attr('action', url);
    $('#modal_table_5_form1').find('form').submit();

 
});


$('.table5_add_save').click(function(event) {

    var url="<?php echo Yii::app()->createUrl("salary/tax_management_add");?>";
    $('#modal_table_5_form2').find('form').attr('action', url);
    $('#modal_table_5_form2').find('form').submit();
 
});








  

});
     



  </script>



 <script type="text/javascript">


  var temp=$('#modal_table_6_form2').find('form'); 

 temp.find('.department_id').change(function(event) {

temp.find('.post_id').html('');
temp.find('.cn_name').html('');
temp.find('.employee_code').val('');
var department_id=$(this).val();


  $.ajax({
     url: "<?php echo Yii::app()->createUrl("salary/getpost_bydepartment");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
         return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var post='<option value=""></option>';

      var post='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {    post=post+'<option value="'+a[i].post_id+'">'+a[i].post_cn_name+'</option>'
         
      }
      

  
      temp.find('.post_id').html(post);

      //  alert(a);
      // var a=JSON.parse(data);
    

    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });

});



 // 职务下拉列表改变事件
 temp.find('.post_id').change(function(event) {


temp.find('.cn_name').html('');
temp.find('.employee_code').val('');
  var department_id=temp.find('.department_id').val();
  var post_id=$(this).val();
  if (post_id=='') {
    alert('请选择部门');
    return;
  }



     $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/getcn_name");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id,'post_id':post_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var namelist='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {   
       namelist=namelist+'<option value="'+a[i].cn_name+'">'+a[i].cn_name+'</option>'
         
      }

      // 对应的名字列表

      temp.find('.cn_name').html(namelist);
    
    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });





 });



//选择名字事件

temp.find('.cn_name').change(function(event) {

  temp.find('.employee_code').val('');
  var department_id=temp.find('.department_id').val();
  var post_id=temp.find('.post_id').val();
  var cn_name=$(this).val();

  if(cn_name=='')
  {
    alert("请选择名字");
    return;
  }




  $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/get_employee_code");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id,'post_id':post_id,'cn_name':cn_name},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
    
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);

        temp.find('.employee_code').val(a[0].employee_code);
           

      // 对应的名字列表

    
    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });







});
    



  </script>


<!-- 555 -->







 <script type="text/javascript">


  var temp=$('#modal_table_5_form2').find('form'); 

 temp.find('.department_id').change(function(event) {

temp.find('.post_id').html('');
temp.find('.cn_name').html('');
temp.find('.employee_code').val('');
var department_id=$(this).val();


  $.ajax({
     url: "<?php echo Yii::app()->createUrl("salary/getpost_bydepartment");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
         return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var post='<option value=""></option>';

      var post='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {    post=post+'<option value="'+a[i].post_id+'">'+a[i].post_cn_name+'</option>'
         
      }
      

  
      temp.find('.post_id').html(post);

      //  alert(a);
      // var a=JSON.parse(data);
    

    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });

});



 // 职务下拉列表改变事件
 temp.find('.post_id').change(function(event) {


temp.find('.cn_name').html('');
temp.find('.employee_code').val('');
  var department_id=temp.find('.department_id').val();
  var post_id=$(this).val();
  if (post_id=='') {
    alert('请选择部门');
    return;
  }



     $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/getcn_name");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id,'post_id':post_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var namelist='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {   
       namelist=namelist+'<option value="'+a[i].cn_name+'">'+a[i].cn_name+'</option>'
         
      }

      // 对应的名字列表

      temp.find('.cn_name').html(namelist);
    
    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });





 });



//选择名字事件

temp.find('.cn_name').change(function(event) {

  temp.find('.employee_code').val('');
  var department_id=temp.find('.department_id').val();
  var post_id=temp.find('.post_id').val();
  var cn_name=$(this).val();

  if(cn_name=='')
  {
    alert("请选择名字");
    return;
  }




  $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/get_employee_code");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id,'post_id':post_id,'cn_name':cn_name},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
    
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);

        temp.find('.employee_code').val(a[0].employee_code);
           

      // 对应的名字列表

    
    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });







});
    



  </script>


<!-- 555 -->






  


<!-- 222 -->


<script type="text/javascript">
$(document).ready(function() {

  $('#table2_table_2_2').find('.change').click(function(e) {



     var _thisTr = null; //记录table7_2中正在编辑的行                  
     _thisTr = $(this).parents('tr'); //记录table1中正在编辑的行
     var table1Tr = _thisTr  // table1中当前操作的行



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




     var department_id=$.trim(table1Tr.find('.department_id').text());
     var post_id=$.trim(table1Tr.find('.post_id').text());
     var department_name=$.trim(table1Tr.find('.department_name').text());
     var post_cn_name=$.trim(table1Tr.find('.post_cn_name').text());
     var cn_name=$.trim(table1Tr.find('.cn_name').text());
     var date=$.trim(table1Tr.find('.date').text());

     var employee_code=$.trim(table1Tr.find('.employee_code').text());

     var day_times=$.trim(table1Tr.find('.day_times').text());

     var night_times=$.trim(table1Tr.find('.night_times').text());

     var day_salary=$.trim(table1Tr.find('.day_salary').text());
     var night_salary=$.trim(table1Tr.find('.night_salary').text());
     var remark=$.trim(table1Tr.find('.remark').text());

     var jiabanheji=$.trim(table1Tr.find('.jiabanheji').text());
     var $a =$.trim($(this).attr("id"));
     var a=$(".table2_edit_save").attr("id",$a);
     var table2Tr = $('#modal_table_2_form1').find('form');  //
     table2Tr.find('.department_id').val(department_id);


    // 通过默认的部门拿到默认的职务
    $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/getpost_bydepartment");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var post='<option value=""></option>';

      var post='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {    post=post+'<option value="'+a[i].post_id+'">'+a[i].post_cn_name+'</option>'
         
      }

      table2Tr.find('.post_id').html(post);//生成选择职务列表
      table2Tr.find('.post_id').val(post_id);


      //获取名字和员工编号开始


          $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/getcn_name");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id,'post_id':post_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
    

      if(data=='post_error')
     {
        alert("请选择职务");
        return;
     }

      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var namelist='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {   
       namelist=namelist+'<option value="'+a[i].cn_name+'">'+a[i].cn_name+'</option>'
         
      }

      // 对应的名字列表

      table2Tr.find('.cn_name').html(namelist);
      table2Tr.find('.cn_name option').each(function(index, el) {

        if($(this).text()==cn_name)
        {
          table2Tr.find('.cn_name').val($(this).val());

        }
        
      });

    
    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });


      // 结束



    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });



      //将table1中内容值显示到编辑页面上
       table2Tr.find('.employee_code').val(employee_code);
       table2Tr.find('.date').val(date);

       table2Tr.find('.day_times').val(day_times);
       table2Tr.find('.night_times').val(night_times);
       table2Tr.find('.day_salary').val(day_salary);
       table2Tr.find('.night_salary').val(night_salary);
       table2Tr.find('.remark').val(remark);
      
      table2Tr.find('.jiabanheji').val(jiabanheji);


    });






  // 部门改变事件

var temp=$('#modal_table_2_form1').find('form'); 

 temp.find('.department_id').change(function(event) {

temp.find('.post_id').html('');
temp.find('.cn_name').html('');
temp.find('.employee_code').val('');
var department_id=$(this).val();


  $.ajax({
     url: "<?php echo Yii::app()->createUrl("salary/getpost_bydepartment");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
    
         return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var post='<option value=""></option>';

      var post='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {    post=post+'<option value="'+a[i].post_id+'">'+a[i].post_cn_name+'</option>'
         
      }
      

  
      temp.find('.post_id').html(post);

      //  alert(a);
      // var a=JSON.parse(data);
    

    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });

});



 // 职务下拉列表改变事件
 temp.find('.post_id').change(function(event) {


temp.find('.cn_name').html('');
temp.find('.employee_code').val('');
  var department_id=temp.find('.department_id').val();
  var post_id=$(this).val();
  if (post_id=='') {
    alert('请选择部门');
    return;
  }



     $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/getcn_name");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id,'post_id':post_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var namelist='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {   
       namelist=namelist+'<option value="'+a[i].cn_name+'">'+a[i].cn_name+'</option>'
         
      }

      // 对应的名字列表

      temp.find('.cn_name').html(namelist);
    
    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });





 });



//选择名字事件

temp.find('.cn_name').change(function(event) {

  temp.find('.employee_code').val('');
  var department_id=temp.find('.department_id').val();
  var post_id=temp.find('.post_id').val();
  var cn_name=$(this).val();

  if(cn_name=='')
  {
    alert("请选择名字");
    return;
  }




  $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/get_employee_code");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id,'post_id':post_id,'cn_name':cn_name},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
    
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
 


        temp.find('.employee_code').val(a[0].employee_code);
           
         
     

      // 对应的名字列表

     
    
    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });







});


$('.table2_edit_save').click(function(event) {

    var $a = $(this).attr("id");


    var url="<?php echo Yii::app()->createUrl("salary/overtime_management_edit");?>"+"?id="+$a;
    $('#modal_table_2_form1').find('form').attr('action', url);
    $('#modal_table_2_form1').find('form').submit();

 
});


$('.table2_add_save').click(function(event) {

    var url="<?php echo Yii::app()->createUrl("salary/overtime_management_add");?>";
    $('#modal_table_2_form2').find('form').attr('action', url);
    $('#modal_table_2_form2').find('form').submit();
 
});








  

});
     



  </script>



 <script type="text/javascript">



  var temp=$('#modal_table_2_form2').find('form'); 

 temp.find('.department_id').change(function(event) {

temp.find('.post_id').html('');
temp.find('.cn_name').html('');
temp.find('.employee_code').val('');
var department_id=$(this).val();


  $.ajax({
     url: "<?php echo Yii::app()->createUrl("salary/getpost_bydepartment");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
         return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var post='<option value=""></option>';

      var post='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {    post=post+'<option value="'+a[i].post_id+'">'+a[i].post_cn_name+'</option>'
         
      }
      

  
      temp.find('.post_id').html(post);

      //  alert(a);
      // var a=JSON.parse(data);
    

    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });

});



 // 职务下拉列表改变事件
 temp.find('.post_id').change(function(event) {


temp.find('.cn_name').html('');
temp.find('.employee_code').val('');
  var department_id=temp.find('.department_id').val();
  var post_id=$(this).val();
  if (post_id=='') {
    alert('请选择部门');
    return;
  }



     $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/getcn_name");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id,'post_id':post_id},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
      
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);
      var namelist='<option value=""></option>';
      for (var i = 0; i < a.length; i++)
      {   
       namelist=namelist+'<option value="'+a[i].cn_name+'">'+a[i].cn_name+'</option>'
         
      }

      // 对应的名字列表

      temp.find('.cn_name').html(namelist);
    
    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });





 });



//选择名字事件

temp.find('.cn_name').change(function(event) {

  temp.find('.employee_code').val('');
  var department_id=temp.find('.department_id').val();
  var post_id=temp.find('.post_id').val();
  var cn_name=$(this).val();

  if(cn_name=='')
  {
    alert("请选择名字");
    return;
  }




  $.ajax({
    url: "<?php echo Yii::app()->createUrl("salary/get_employee_code");?>",
    type: 'post',
    dataType: 'text',
    data: {'department_id':department_id,'post_id':post_id,'cn_name':cn_name},
    success: function(data) { //成功返回数据时的回调函数
      //输出返回的文本

     if(data=='error')
     {
        alert("请选择部门");
        return;
     }
    
      // var a = eval("(" + data + ")");
      var a=JSON.parse(data);

        temp.find('.employee_code').val(a[0].employee_code);
           

      // 对应的名字列表

    
    },
    error: function(e) {
      alert('请求错误或失败');
    }
  });







});
    



  </script>



  </script>


<!-- 222 -->







<!-- 生成开始 -->
<script type="text/javascript">

// 费用补贴生成 开始

$(".table_6_1_generate").click(function(event) {

  alert("还没做");

     var url="<?php echo Yii::app()->createUrl("salary/allowance_management_generate");?>";
    
     var form=$("#table_6_1_form");
    form.attr('action', url);
    form.submit();





  /* Act on the event */
});

 // 费用补贴生成 结束




</script>
<!-- 生成结束 -->



