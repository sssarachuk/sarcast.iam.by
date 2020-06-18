<?php
$this->breadcrumbs=array(
	'Альбомы' => array('manage'),
	'Добавление',
);

$this->menu=array(
	array('label' => 'Управление альбомом', 'url' => array('manage')),
	array('label' => 'Список альбомов', 'url' => array('index')),
);
?>

<h1>Добавление альбома</h1>

<?=$this->renderPartial('_form', array('model' => $model))?>