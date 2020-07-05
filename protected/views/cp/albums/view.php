<?php
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
    array('label'=>'Управление слайдами', 'url'=>array('slides', 'id'=>$model->id)),
);
?>

<h1>Просмотр альбома &laquo;<?=$model->h1?>&raquo; (<?=count($model->showImagesUrl())-1;?> фото)</h1>

<p>Клиент может <a href="/album/<?=$model->id?>-<?=$model->slug?>" target="_blank" rel="nofollow"><b>скачать фотографии тут</b></a>.</p>
<p>Все остальные <a href="/album/<?=$model->slug?>" target="_blank" rel="nofollow"><b>видят фотографии тут</b></a>.</p>

<span>Репосты в соцсетях: </span>

<script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="https://yastatic.net/share2/share.js"></script>
<div class="ya-share2"
 data-services="vkontakte,odnoklassniki,facebook,twitter,pinterest,collections,viber,whatsapp,telegram,moimir,blogger,delicious,digg,reddit,evernote,linkedin,lj,pocket,qzone,renren,sinaWeibo,surfingbird,tencentWeibo,tumblr,skype" data-limit="9"
 data-title="<?=$category->h1?> - <?=$model->h1?> (<?=count($model->showImagesUrl())-1;?> фото)"
 data-description="<?=$model->title?>"
 data-image="<?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST']; ?><?=$model->showImagesUrl()[0];?>"
 data-url="<?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST']; ?>/album/<?=$model->slug;?>">
</div><br>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
        'slug',
        'folder',
		//'created_at',
	),
)); ?>
<?=$model->showImages(0,'',array('width' => 300))?>
