<?php
$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index')),
	//array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Обновление пользователя', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удаление пользователя', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Подтверждаете удаление пользователя?')),
	array('label'=>'Управление пользователями', 'url'=>array('admin')),
);
?>

<h1>Просмотр пользователя <?=$model->email?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'email',
		//'password',
		//'role',
		'name',
		'surname',
		'phone',
		'city',
		'address',
		//'created_at',
		//'updated_at',
	),
)); ?>
