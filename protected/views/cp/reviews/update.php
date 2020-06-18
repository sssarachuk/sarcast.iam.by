<?php
$this->breadcrumbs=array(
	'Отзыв' => array('manage'),
	$model->title => array('view','id'=>$model->id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Добавление отзыва', 'url'=>array('create')),
	array('label'=>'Просмотр отзыва', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление отзывами', 'url'=>array('manage')),
	array('label'=>'Список отзывов', 'url'=>array('index')),
);
?>

<h1>Редактирование отзыва &laquo;<?php echo $model->title; ?>&raquo;</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>