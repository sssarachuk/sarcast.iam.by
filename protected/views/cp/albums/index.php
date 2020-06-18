<?php
$this->breadcrumbs = array(
	'Альбом',
);

$this->menu=array(
	array('label'=>'Управление альбомами', 'url'=>array('manage')),
	array('label'=>'Добавление альбома', 'url'=>array('create')),
);
?>

<h1>Список альбомов</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
