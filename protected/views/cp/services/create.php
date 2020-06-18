<?php
$this->breadcrumbs=array(
	'Услуги' => array('manage'),
	'Добавление',
);

$this->menu=array(
	array('label' => 'Управление услугами', 'url' => array('manage')),
	array('label' => 'Список услуг', 'url' => array('index')),
);
?>

<h1>Добавление услуги</h1>

<?=$this->renderPartial('_form', array('model' => $model))?>