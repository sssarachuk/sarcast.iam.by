<?php
$this->breadcrumbs = array(
	'Страницы',
);

$this->menu=array(
	array('label'=>'Управление страницами', 'url'=>array('manage')),
);
?>

<h1>Список брендов</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
