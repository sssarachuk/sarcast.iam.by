<?php
$this->breadcrumbs=array(
	'Категории' => array('manage'),
	'Добавление',
);

$this->menu=array(
	array('label' => 'Управление категориями', 'url' => array('manage')),
	array('label' => 'Список категорий', 'url' => array('index')),
);
?>

<h1>Добавление категории</h1>

<?=$this->renderPartial('_form', array('model' => $model))?>