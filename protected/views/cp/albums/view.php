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

<p>Клиенту ссылка на <a href="/album/<?=$model->id?>-<?=$model->slug?>" target="_blank" rel="nofollow"><b>скачивание фотографий тут</b></a>.</p>
<p>Остальным ссылка <a href="/album/<?=$model->slug?>" target="_blank" rel="nofollow"><b>без скачивания фотографий тут</b></a>.</p>

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


<section id="photo-1" class="section section-md bg-white oh text-center">
	<div class="shell">
		<div class="isotope isotope--loaded" data-isotope-layout="fitRows" data-isotope-group="gallery" data-lightgallery="group" style="position: relative; height: 918px;">
			<div class="row">
				<?php $images_url = $album->showImagesUrl(); ?>
				<? $counter = 0; ?>
				<?php foreach($images_url as $url): ?>
				<?php //if ($counter != 0) { ?>
				<div class="col-xs-12 col-sm-12 col-md-12" style="position:relative; padding-top:5px;">
					<div class="ya-share2" style="position:absolute; top:10px; left:10px;"
						data-services="pinterest,collections,vkontakte,odnoklassniki,facebook,twitter,viber,whatsapp,telegram,moimir,blogger,delicious,digg,reddit,evernote,linkedin,lj,pocket,qzone,renren,sinaWeibo,surfingbird,tencentWeibo,tumblr,skype" data-limit="6"
						data-title="<?=$category->h1?> - <?=$model->h1?> (<?=count($model->showImagesUrl())-1;?> фото)"
						data-description="<?=$model->title?>"
						data-image="<?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST']; ?><?=$url;?>"
						data-url="<?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST']; ?>/album/<?=$model->slug;?>">
					</div>
					<img src="<?=$url;?>" alt="<?=$album->title;?> фото <?=$counter;?>" width="600">
				</div>
				<? //} ?>
				<? $counter++; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<?//=$model->showImages(0,'',array('width' => 300))?>
