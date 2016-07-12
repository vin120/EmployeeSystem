
<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'user-form',
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    )); ?>
    <div class="row">  
        <?php echo $form->labelEx($model,'avatar'); ?>  
        <?php echo CHtml::activeFileField($model,'avatar'); ?>  
        <?php echo $form->error($model,'avatar'); ?>  
    </div>  
        <div class="row buttons">  
            <?php echo CHtml::submitButton($model->isNewRecord ? '立即创建' : '保存修改'); ?>  
    </div>  
      
    <?php $this->endWidget(); ?>  
    <div class="row">  
        <?php echo '图片预览'; ?>  
        <?php echo '<img src="www.test.com/../'.$model->avatar.'" style="width:200px; height:300px;" />'; ?>  
    </div> 