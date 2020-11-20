<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'album-form',
	'enableAjaxValidation' => TRUE,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Поля, помеченные &laquo;<span class="required">*</span>&raquo;,
		обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?=$form->dropDownList($model, 'category_id', CHtml::listData(Category::model()->findAll(), 'id', 'h1'), array('empty' => 'Выберите категорию')); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>
	<br>	
	<div class="row">
		<?php echo $form->labelEx($model,'folder'); ?>
		<?php echo $form->textField($model,'folder'); ?>
		<?php echo $form->error($model,'folder'); ?>
        <small>(латиницей и без пробелов, удобно как Имя-папки-на-компе)</small>
	</div>
	<br>
	<div class="row">
		<?php echo $form->labelEx($model,'photos'); ?>
		<?php echo $form->textArea($model,'photos',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'photos'); ?>
		<small>(одно имя файла (без пробелов) на строку, закачка по 1 фото за раз, поэтому проще через FTP залить, а имена скопировать)</small><br>
		<small>(1я строка для заглавной (лучше горизонтальной) фото, а серия фотографий начнется со 2й строки)</small>
	</div>
	<br>
	<div class="row">
		<?=CHtml::label('Изображение', 'image')?>
		<?=CHtml::activeFileField($model, 'image'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>
	<br>	
    <div class="row">
		<?php echo $form->labelEx($model,'gallery1_link'); ?>
		<?php echo $form->textField($model,'gallery1_link'); ?>
		<?php echo $form->error($model,'gallery1_link'); ?>
		<small>(весь отснятый НЕобработанный материал - ссылка на скачивание с облака)</small>
	</div>
    <br>
    <div class="row">
		<?php echo $form->labelEx($model,'gallery2_link'); ?>
		<?php echo $form->textField($model,'gallery2_link'); ?>
		<?php echo $form->error($model,'gallery2_link'); ?>
		<small>(готовые Обработанные фотографии - ссылка на скачивание с облака)</small>
	</div>
	<br>
	<div class="row">
		<?php echo $form->labelEx($model,'sort'); ?>
		<?php echo $form->textField($model,'sort'); ?>
		<?php echo $form->error($model,'sort'); ?>
		<small>(сортировка по возрастанию, цифры меньше 0 делают альбом скрытым, цифра -100500 не показывает даже в скрытых)</small>
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
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title'); ?>
		<?php echo $form->error($model,'title'); ?>
		<small>(уникальный, <b>60-70 символов</b> (основной поисковый запрос + дополнительные если влезут))</small><br>
		<small>(без точек, значков, и знаков препинания, стараться все уместить в понятное читабельное предложение)</small><br>
		<small>(в начале самые главные слова, не упоминать название компании)</small>
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
		<?php echo $form->labelEx($model,'h1_eng'); ?>
		<?php echo $form->textField($model,'h1_eng'); ?>
		<?php echo $form->error($model,'h1_eng'); ?>
		<small>(перевод на английский язык)</small>
	</div>
    <br>
	<div class="row">
		<?php echo $form->labelEx($model,'title_eng'); ?>
		<?php echo $form->textField($model,'title_eng'); ?>
		<?php echo $form->error($model,'title_eng'); ?>
		<small>(перевод на английский язык)</small>
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
		<?php echo $form->labelEx($model,'seo_keywords'); ?>		
		<?php echo $form->textArea($model,'seo_keywords',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'seo_keywords'); ?>
		<small>(ключевые фразы seo <b>для русскоязычной аудитории</b>, разделять запятыми, без доп.символов и значков, в начале самые важные фразы т.к. они преобразуются в хэштеги для репоста в соцсети)</small>
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
		<?php echo $form->labelEx($model,'seo_keywords_eng'); ?>
		<?php echo $form->textArea($model,'seo_keywords_eng',array('rows'=>3, 'cols'=>50)); ?>		
		<?php echo $form->error($model,'seo_keywords_eng'); ?>
		<small>(ключевые фразы seo <b>для англоязычной аудитории</b>, разделять запятыми, без доп.символов и значков, в начале самые важные фразы т.к. они преобразуются в хэштеги для репоста в соцсети)</small>
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
				"height" => "200px",
				"width" => "100%",
				"toolbar" => "Full",
				"language" => "ru"
			)
		));?>
		<?php echo $form->error($model,'text1'); ?>
		<small>(любой текст, но лучше ссылки на участников проекта, в ссылках добавлять <b>rel="nofollow noopener"</b>)</small><br>
		<small>(описание будет видно всем посетителям сайта)</small>
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
				"height" => "50px",
				"width" => "100%",
				"toolbar" => "Full",
				"language" => "en"
			)
		));?>
		<?php echo $form->error($model,'text1_eng'); ?>
		<small>(любой текст, но лучше ссылки на участников проекта, в ссылках добавлять <b>rel="nofollow noopener"</b>)</small><br>
		<small>(описание будет видно всем посетителям сайта)</small>
	</div>
    <br>
    <div class="row">
		<?php echo $form->labelEx($model,'text2'); ?>
		<?php $this->widget('ext.ckeditor.CKEditorWidget', array(
			"model" => $model,
			"attribute" => 'text2',
			"defaultValue" => $model->text2,
			//Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
			"config" => array(
				"height" => "200px",
				"width" => "100%",
				"toolbar" => "Full",
				"language" => "ru"
			)
		));?>
		<?php echo $form->error($model,'text2'); ?>
		<small>(описание будет видно всем посетителям сайта)</small>
	</div>
    <br>
    <div class="row">
		<?php echo $form->labelEx($model,'text2_eng'); ?>
		<?php $this->widget('ext.ckeditor.CKEditorWidget', array(
			"model" => $model,
			"attribute" => 'text2_eng',
			"defaultValue" => $model->text2_eng,
			//Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
			"config" => array(
				"height" => "50px",
				"width" => "100%",
				"toolbar" => "Full",
				"language" => "en"
			)
		));?>
		<?php echo $form->error($model,'text2_eng'); ?>
		<small>(описание будет видно всем посетителям сайта)</small>
	</div>
	<br>
	<div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php $this->widget('ext.ckeditor.CKEditorWidget', array(
			"model" => $model,
			"attribute" => 'comments',
			"defaultValue" => $model->comments,
			//Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
			"config" => array(
				"height" => "500px",
				"width" => "100%",
				"toolbar" => "Full",
				"language" => "ru"
			)
		));?>
		<?php echo $form->error($model,'comments'); ?>
		<small>(заполняются автоматически, и скрыты от посетителей сайта)</small>
	</div>
	<br>
    <div class="row">
		<?php echo $form->labelEx($model,'review_before'); ?>
		<?php $this->widget('ext.ckeditor.CKEditorWidget', array(
			"model" => $model,
			"attribute" => 'review_before',
			"defaultValue" => $model->review_before,
			//Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
			"config" => array(
				"height" => "200px",
				"width" => "100%",
				"toolbar" => "Full",
				"language" => "ru"
			)
		));?>
		<?php echo $form->error($model,'review_before'); ?>
		<small>(заполняется автоматически, и скрыт от посетителей сайта)</small>
	</div>
	<br>
    <div class="row">
		<?php echo $form->labelEx($model,'review_after'); ?>
		<?php $this->widget('ext.ckeditor.CKEditorWidget', array(
			"model" => $model,
			"attribute" => 'review_after',
			"defaultValue" => $model->review_after,
			//Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)
			"config" => array(
				"height" => "200px",
				"width" => "100%",
				"toolbar" => "Full",
				"language" => "ru"
			)
		));?>
		<?php echo $form->error($model,'review_after'); ?>
		<small>(заполняется вручную, и будет виден всем посетителям сайта)</small>
	</div>
	<br>    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->