<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	'enableAjaxValidation' => TRUE,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Поля, помеченные &laquo;<span class="required">*</span>&raquo;,
		обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title'); ?>
		<?php echo $form->error($model,'title'); ?>
		<small>(уникальный, <b>60-70 символов</b> (основной поисковый запрос + дополнительные если влезут))</small><br>
		<small>(без точек и знаков препинания, стараться все уместить в понятное читабельное предложение)</small><br>
		<small>(в начале самые главные слова, не упоминать название компании)</small>
	</div>
	<br>
	<div class="row">
		<?php echo $form->labelEx($model,'title_eng'); ?>
		<?php echo $form->textField($model,'title_eng'); ?>
		<?php echo $form->error($model,'title_eng'); ?>
		<small>(перевод на английский язык, используется для slug)</small>
	</div>
    <br>
	<div class="row">
		<?php echo $form->labelEx($model,'slug'); ?>
		<?php echo $form->textField($model,'slug'); ?>
		<?php echo $form->error($model,'slug'); ?>
		<small>(оставьте пустым для автогенерации)</small>
	</div>
    <br>
    <div class="row">
		<?php echo $form->labelEx($model,'h1'); ?>
		<?php echo $form->textField($model,'h1'); ?>
		<?php echo $form->error($model,'h1'); ?>
		<small>(отличается от Заголовка Title, основной короткий запрос, без слов аля -купить-)</small>
	</div>
	<br>
	<div class="row">
		<?php echo $form->labelEx($model,'h1_eng'); ?>
		<?php echo $form->textField($model,'h1_eng'); ?>
		<?php echo $form->error($model,'h1_eng'); ?>
		<small>(перевод на английский язык)</small>
	</div>
    <br>
    <div class="row">
		<?php echo $form->labelEx($model,'h1_nav'); ?>
		<?php echo $form->textField($model,'h1_nav'); ?>
		<?php echo $form->error($model,'h1_nav'); ?>
		<small>(сокращенный Заголовок H1, для навигационного меню)</small>
	</div>
	<br>
	<div class="row">
		<?php echo $form->labelEx($model,'h1_nav_eng'); ?>
		<?php echo $form->textField($model,'h1_nav_eng'); ?>
		<?php echo $form->error($model,'h1_nav_eng'); ?>
		<small>(перевод на английский язык)</small>
	</div>
	<br>
	<div class="row">
		<?php echo $form->labelEx($model,'sort'); ?>
		<?php echo $form->textField($model,'sort'); ?>
		<?php echo $form->error($model,'sort'); ?>
		<small>(сортировка по возрастанию, цифры меньше 0 скрывают с Главной страницы, цифра -100500 не показывает даже в меню)</small>
	</div>
    <br>
    <div class="row">
		<?php echo $form->labelEx($model,'text1'); ?>
		<?php $this->widget('ext.ckeditor.CKEditorWidget', array(
			"model" => $model,
			"attribute" => 'text1',
			"defaultValue" => $model->text1,
			//Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
			"config" => array(
				"height" => "300px",
				"width" => "100%",
				"toolbar" => "Full",
				"language" => "ru"
			)
		));?>
		<?php echo $form->error($model,'text1'); ?>
	</div>
    <br>
    <div class="row">
		<?php echo $form->labelEx($model,'text1_eng'); ?>
		<?php $this->widget('ext.ckeditor.CKEditorWidget', array(
			"model" => $model,
			"attribute" => 'text1_eng',
			"defaultValue" => $model->text1_eng,
			//Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
			"config" => array(
				"height" => "300px",
				"width" => "100%",
				"toolbar" => "Full",
				"language" => "en"
			)
		));?>
		<?php echo $form->error($model,'text1_eng'); ?>
	</div>
    <br>
    <div class="row">
		<?php echo $form->labelEx($model,'seo_description'); ?>
		<?php echo $form->textArea($model,'seo_description',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'seo_description'); ?>
		<small>(meta-тег description для seo, на русском)</small><br>
		<small>(уникальный, до <b>120-135 символов</b> (с пробелами), с содержанием осн. или доп.запроса)</small><br>
		<small>(рекомендуются скобки, цифры, значки, символы, чтобы поднять CTR, и призыв переходить на сайт в конце)</small><br>
		<small>(есть генераторы для помощи составления, например Saney.ru для кириллицы и Spotibo.com лат.)</small>
	</div>
    <br>
    <div class="row">
		<?php echo $form->labelEx($model,'seo_description_eng'); ?>
		<?php echo $form->textArea($model,'seo_description_eng',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'seo_description_eng'); ?>
		<small>(meta-тег description для seo, на английском)</small>
	</div>
    <br>
    <div class="row">
		<?php echo $form->labelEx($model,'seo_keywords'); ?>
		<?php echo $form->textField($model,'seo_keywords'); ?>
		<?php echo $form->error($model,'seo_keywords'); ?>
		<small>(meta-тег keywords для seo, на русском, не рекомендуется заполнять)</small>
	</div>
    <br>
    <div class="row">
		<?php echo $form->labelEx($model,'seo_keywords_eng'); ?>
		<?php echo $form->textField($model,'seo_keywords_eng'); ?>
		<?php echo $form->error($model,'seo_keywords_eng'); ?>
		<small>(meta-тег keywords для seo, на английском, не рекомендуется заполнять)</small>
	</div>
    <br>
    <div class="row">
		<?php echo $form->labelEx($model,'photos'); ?>
		<?php echo $form->textArea($model,'photos',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'photos'); ?>
		<small>(один адрес файла на строку)</small><br>
		<small>(адреса брать из Управления Альбомами, а сортировать здесь)</small>
	</div>
    <br>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->