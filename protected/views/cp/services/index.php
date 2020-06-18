<?php
$this->breadcrumbs = array(
	'Услуги',
);

$this->menu=array(
	array('label'=>'Управление услугами', 'url'=>array('manage')),
	array('label'=>'Добавление услуги', 'url'=>array('create')),
);
?>

<h1>Список услуг</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
