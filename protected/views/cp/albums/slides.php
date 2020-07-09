<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/lib/image.php');
$IMG = new ModelToolImage();

$this->breadcrumbs=array(
	'Альбом' => array('manage'),
	$model->h1,
);

$this->menu=array(
	array('label'=>'Добавление альбома', 'url'=>array('create')),
	array('label'=>'Редактирование альбома', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удаление альбома', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Подтверждаете удаление категории?')),
	array('label'=>'Управление альбомами', 'url'=>array('manage')),
	array('label'=>'Список альбомов', 'url'=>array('index')),
);
?>

<h1>Управление слайдами для категории<br>&laquo;<?=$category->h1?>&raquo;</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
        'slug',
        'folder',
		//'created_at',
        'category_id',
	),
)); ?>

<?//=$model->showImages(0,'',array('width' => 300))?>


<!--<div><img class="owl-lazy" data-src="images/m-slider2.jpg" alt="" width="968" height="537"></div>-->

<br>
<div>
    <?php $images_url = $model->showImagesUrl(); ?>
    <? $counter = 0; ?>
    <?php foreach($images_url as $url): ?>
    <?php if ($counter != 0) { ?>
    <div class="col-xs-12">
       <img src="<?=$url;?>" width="1000">
       <br>
       Размер файла: <?php echo $model->getFilesize($_SERVER['DOCUMENT_ROOT'].$url); ?>
       <br><br>
       <div><b><?=$url;?></b><br><br>

      <!--Здесь должна быть кнопка, которая добавляет url фотографии в бд в Категории в поле photos в конец -->
      <p>*скопируйте адрес в блокнот (лучше выбирать только горизонтальные фото), одно имя файла на строку, и затем добавьте в Категориях в Слайды,
      <br>
      а в будущем здесь можно сделать кнопку, которая будет сама добавлять куда надо
      </p>

       </div>
    </div>
    <? } ?>
    <? $counter = 1; ?>
    <?php endforeach; ?>
</div>


