<?php
$this->breadcrumbs=array(
	'Альбом' => array('manage'),
	$model->h1 => array('view','id'=>$model->id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Добавление альбома', 'url'=>array('create')),
	array('label'=>'Просмотр альбома', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление альбомами', 'url'=>array('manage')),
	array('label'=>'Список альбомов', 'url'=>array('index')),
);
?>

<h1>Редактирование альбома &laquo;<?php echo $model->h1; ?>&raquo;</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>