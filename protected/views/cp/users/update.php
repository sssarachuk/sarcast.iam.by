<?php
$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Обновление',
);

$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index')),
	//array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Просмотр пользователя', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление пользователями', 'url'=>array('admin')),
);
?>

<h1>Обновление пользователя <?=$model->email?></h1>

<?=$this->renderPartial('_form', array('model'=>$model)); ?>