<?php
$this->breadcrumbs=array(
	'Страницы' => array('manage'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Редактирование страницы', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Управление страницами', 'url'=>array('manage')),
	array('label'=>'Список страниц', 'url'=>array('index')),
);
?>

<h1>Просмотр страниц &laquo;<?=$model->name?>&raquo;</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
                'text:html',
                //'photos',
		//'created_at',
		//'updated_at',
	),
)); ?>
