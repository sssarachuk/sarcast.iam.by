<?php
$this->breadcrumbs = array(
	'Категории',
);

$this->menu=array(
	array('label'=>'Управление категориями', 'url'=>array('manage')),
	array('label'=>'Добавление категории', 'url'=>array('create')),
);
?>

<h1>Список категорий</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
