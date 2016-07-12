<div class=”row”>
    <?php echo $form->labelEx($model,'adImg'); ?>
    <?php echo CHtml::activeFileField($model,'adImg'); ?>
    <?php echo $form->error($model,'adImg'); ?>
</div>
<?php //if(!empty($model->adImg)):?>
<div class=”row”>
    <?php echo CHtml::label('图片预览','') ?>
    <?php echo '<img src="images/shop/'.$model->adImg.'" />'; ?>
</div>
<?php //endif;?>