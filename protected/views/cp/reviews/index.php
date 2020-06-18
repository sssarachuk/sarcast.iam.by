<?php
$this->breadcrumbs = array(
	'Отзыв',
);

$this->menu=array(
	array('label'=>'Управление отзывами', 'url'=>array('manage')),
	array('label'=>'Добавление отзыва', 'url'=>array('create')),
);
?>

<h1>Список отзывов</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
