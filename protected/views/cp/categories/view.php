<?php
$this->breadcrumbs=array(
	'Категории' => array('manage'),
	$model->h1,
);

$this->menu=array(
	array('label'=>'Добавление категории', 'url'=>array('create')),
	array('label'=>'Редактирование категории', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удаление категории', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Подтверждаете удаление категории?')),
	array('label'=>'Управление категориями', 'url'=>array('manage')),
	array('label'=>'Список категорий', 'url'=>array('index')),
);
?>

<h1>Просмотр категории &laquo;<?=$model->h1?>&raquo;</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
        'slug',
	),
)); ?>
