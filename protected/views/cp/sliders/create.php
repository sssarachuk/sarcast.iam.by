<?php
$this->breadcrumbs=array(
	'Слайдер' => array('manage'),
	'Добавление',
);

$this->menu=array(
	array('label' => 'Управление слайдами', 'url' => array('manage')),
	array('label' => 'Список слайдов', 'url' => array('index')),
);
?>

<h1>Добавление слайда</h1>

<?=$this->renderPartial('_form', array('model' => $model))?>