<?php
$this->breadcrumbs=array(
	'Слайдер' => array('manage'),
	$model->title => array('view','id'=>$model->id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Добавление слайда', 'url'=>array('create')),
	array('label'=>'Просмотр слайда', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление слайдами', 'url'=>array('manage')),
	array('label'=>'Список слайдов', 'url'=>array('index')),
);
?>

<h1>Редактирование слайда &laquo;<?php echo $model->title; ?>&raquo;</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>