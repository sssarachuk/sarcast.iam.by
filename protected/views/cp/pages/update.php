<?php
$this->breadcrumbs=array(
	'Страницы' => array('manage'),
	$model->name => array('view','id'=>$model->id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Просмотр страницы', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление страницами', 'url'=>array('manage')),
	array('label'=>'Список страниц', 'url'=>array('index')),
);
?>

<h1>Редактирование страницы &laquo;<?php echo $model->name; ?>&raquo;</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>