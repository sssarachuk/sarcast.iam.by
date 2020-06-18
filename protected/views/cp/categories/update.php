<?php
$this->breadcrumbs=array(
	'Категории' => array('manage'),
	$model->h1 => array('view','id'=>$model->id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Добавление категории', 'url'=>array('create')),
	array('label'=>'Просмотр категории', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление категориями', 'url'=>array('manage')),
	array('label'=>'Список категорий', 'url'=>array('index')),
);
?>

<h1>Редактирование категории &laquo;<?php echo $model->h1; ?>&raquo;</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>