<?php
$this->breadcrumbs=array(
	'Страницы' => array('manage'),
	'Добавление',
);

$this->menu=array(
	array('label' => 'Управление страницами', 'url' => array('manage')),
	array('label' => 'Список страниц', 'url' => array('index')),
);
?>

<h1>Добавление страницы</h1>

<?=$this->renderPartial('_form', array('model' => $model))?>