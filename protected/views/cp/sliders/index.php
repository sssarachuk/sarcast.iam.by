<?php
$this->breadcrumbs = array(
	'Слайдер',
);

$this->menu=array(
	array('label'=>'Управление слайдами', 'url'=>array('manage')),
	array('label'=>'Добавление слайда', 'url'=>array('create')),
);
?>

<h1>Список слайдов</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
