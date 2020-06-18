<?php
$this->breadcrumbs=array(
	'Слайдер' => array('manage'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Добавление слайда', 'url'=>array('create')),
	array('label'=>'Редактирование слайда', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удаление слайда', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Подтверждаете удаление категории?')),
	array('label'=>'Управление слайдами', 'url'=>array('manage')),
	array('label'=>'Список слайдов', 'url'=>array('index')),
);
?>

<h1>Просмотр слайда &laquo;<?=$model->title?>&raquo;</h1>

<?=$model->showImages(0,'',array('width' => 300))?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
                //'photos',
		//'created_at',
	),
)); ?>
