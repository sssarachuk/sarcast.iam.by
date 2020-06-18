<?php
$this->breadcrumbs=array(
	'Альбом' => array('manage'),
	$model->h1,
);

$this->menu=array(
	array('label'=>'Добавление альбома', 'url'=>array('create')),
	array('label'=>'Редактирование альбома', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удаление альбома', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Подтверждаете удаление категории?')),
	array('label'=>'Управление альбомами', 'url'=>array('manage')),
	array('label'=>'Список альбомов', 'url'=>array('index')),
);
?>

<h1>Просмотр альбома &laquo;<?=$model->h1?>&raquo;</h1>

<?=$model->showImages(0,'',array('width' => 300))?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
                'slug',
                'folder',
		//'created_at',
	),
)); ?>
