<?php
$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список пользователей', 'url'=>array('index')),
	//array('label'=>'Создать пользователя', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление пользователями</h1>

<p>
Вы можете использовать операторы сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
или <b>=</b>) в начале каждой вашей поисковой фразы.
</p>

<?php echo CHtml::link('Продвинутый поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
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
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
