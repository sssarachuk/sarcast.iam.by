<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'page-form',
	'enableAjaxValidation' => TRUE,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Поля, помеченные &laquo;<span class="required">*</span>&raquo;,
		обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
		<small>(латиницей и без пробелов)</small>
	</div>
	<br />

	<div class="row">
		<?php echo $form->labelEx($model,'meta_title'); ?>
		<?php echo $form->textField($model,'meta_title'); ?>
		<?php echo $form->error($model,'meta_title'); ?>
		<small>(уникальный, <b>60-70 символов</b> (основной поисковый запрос + дополнительные если влезут))</small>
	</div>
	<br />

	<div class="row">
		<?php echo $form->labelEx($model,'meta_description'); ?>
		<?php echo $form->textField($model,'meta_description'); ?>
		<?php echo $form->error($model,'meta_description'); ?>
		<small>(уникальный, до <b>120-135 символов</b> (с пробелами), с содержанием осн. или доп.запроса)</small>
	</div>
	<br />

	<div class="row">
		<?php echo $form->labelEx($model,'meta_keywords'); ?>
		<?php echo $form->textField($model,'meta_keywords'); ?>
		<?php echo $form->error($model,'meta_keywords'); ?>
	</div>
	<br />

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?><br />
		<?php $this->widget('ext.ckeditor.CKEditorWidget', array(
			"model" => $model,
			"attribute" => 'text',
			"defaultValue" => $model->text,
			//Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
			"config" => array(
				"height" => "300px",
				"width" => "100%",
				"toolbar" => "Full",
				"language" => "ru",
			)
		));?>
		<?php echo $form->error($model,'description'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->