<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'service-form',
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
		<?php echo $form->labelEx($model,'slug'); ?>
		<?php echo $form->textField($model,'slug'); ?>
		<?php echo $form->error($model,'slug'); ?>
		<small>(оставьте пустым для автогенерации)</small>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'pretitle'); ?><br />
		<?php echo $form->textField($model,'pretitle'); ?>
		<?php echo $form->error($model,'pretitle'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'notes'); ?><br />
		<?php echo $form->textField($model,'notes'); ?>
		<?php echo $form->error($model,'notes'); ?>
	</div>          
        
	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php $this->widget('ext.ckeditor.CKEditorWidget', array(
			"model" => $model,
			"attribute" => 'description',
			"defaultValue" => $model->description,
			//Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
			"config" => array(
				"height" => "300px",
				"width" => "100%",
				"toolbar" => "Full",
				"language" => "ru"
			)
		));?>
		<?php echo $form->error($model,'description'); ?>
	</div>        
        
	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?><br />
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>        
        
	<div class="row">
		<?php echo $form->labelEx($model,'photos'); ?>
		<?php echo $form->textArea($model,'photos',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'photos'); ?><br />
		<small>(одно имя файла на строку)</small><br /><br />
	</div>

	<div class="row">
		<?=CHtml::label('Изображение услуги', 'image')?>
		<?=CHtml::activeFileField($model, 'image'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->