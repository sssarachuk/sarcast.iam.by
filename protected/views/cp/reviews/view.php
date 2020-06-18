<?php
$this->breadcrumbs=array(
	'Отзыв' => array('manage'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Добавление отзыва', 'url'=>array('create')),
	array('label'=>'Редактирование отзыва', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удаление отзыва', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Подтверждаете удаление категории?')),
	array('label'=>'Управление отзывами', 'url'=>array('manage')),
	array('label'=>'Список отзывов', 'url'=>array('index')),
);
?>

<h1>Просмотр отзыва &laquo;<?=$model->title?>&raquo;</h1>

<?=$model->showImages(0,'',array('width' => 46))?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
                'name',
                'date',
                'description',
		//'created_at',
	),
)); ?>
