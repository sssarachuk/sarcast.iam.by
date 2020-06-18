<?php
$this->breadcrumbs=array(
	'Альбомы' => array('manage'),
	'Управление',
);

$this->menu=array(
	array('label' => 'Добавление альбома', 'url'=>array('create')),
    array('label' => 'Управление альбомами', 'url'=>array('manage')),
	array('label' => 'Список альбомов', 'url' => array('index')),    
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('slider-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление альбомами</h1>

<p>
Вы можете посмотреть все <a href="/category/<?php echo К_СКРЫТАЯ_КАТЕГОРИЯ_АЛЬБОМОВ ?>" target="_blank">скрытые альбомы на сайте тут.</a>
<br><br>
Вы можете использовать операторы сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
или <b>=</b>) в начале каждого поискового запроса.
</p>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'album-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',        
        'folder',
        'category_id',
        'sort',
        'invisibility',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
