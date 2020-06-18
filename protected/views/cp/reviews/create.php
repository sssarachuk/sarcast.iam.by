<?php
$this->breadcrumbs=array(
	'Отзывы' => array('manage'),
	'Добавление',
);

$this->menu=array(
	array('label' => 'Управление отзывами', 'url' => array('manage')),
	array('label' => 'Список отзывами', 'url' => array('index')),
);
?>

<h1>Добавление отзыва</h1>

<?=$this->renderPartial('_form', array('model' => $model))?>