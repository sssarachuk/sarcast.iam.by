<?php
$this->breadcrumbs=array(
	'Услуга' => array('manage'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Добавление услуги', 'url'=>array('create')),
	array('label'=>'Редактирование услуги', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удаление услуги', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Подтверждаете удаление категории?')),
	array('label'=>'Управление услугами', 'url'=>array('manage')),
	array('label'=>'Список услуг', 'url'=>array('index')),
);
?>

<h1>Просмотр услуги &laquo;<?=$model->title?>&raquo;</h1>

<?=$model->showImages(0,'',array('width' => 300))?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
                'slug',
                'pretitle',
                'price',
                'notes',
                array(
                    'name' => 'description',
                    'type' => 'html',
                ),
                //'photos',
		//'created_at',
	),
)); ?>
