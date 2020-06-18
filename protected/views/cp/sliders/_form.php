<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'slider-form',
	'enableAjaxValidation' => TRUE,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Поля, помеченные &laquo;<span class="required">*</span>&raquo;,
		обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?><br />
		<?php echo $form->textField($model,'title'); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'photos'); ?>
		<?php echo $form->textArea($model,'photos',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'photos'); ?><br />
		<small>(одно имя файла на строку)</small><br /><br />
	</div>

	<div class="row">
		<?=CHtml::label('Изображение слайда', 'image')?>
		<?=CHtml::activeFileField($model, 'image'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->