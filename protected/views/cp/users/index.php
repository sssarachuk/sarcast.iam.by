<?php
$this->breadcrumbs=array(
	'Пользователи',
);

$this->menu=array(
	//array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Управление пользователями', 'url'=>array('admin')),
);
?>

<h1>Пользователи</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>