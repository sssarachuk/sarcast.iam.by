<?php
$this->breadcrumbs=array(
	'Услуга' => array('manage'),
	$model->title => array('view','id'=>$model->id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Добавление услуги', 'url'=>array('create')),
	array('label'=>'Просмотр услуги', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление услугами', 'url'=>array('manage')),
	array('label'=>'Список услуг', 'url'=>array('index')),
);
?>

<h1>Редактирование услуги &laquo;<?php echo $model->title; ?>&raquo;</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>