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

<p>Клиенту <b><a href="/album/<?=$model->id?>-<?=$model->slug?>" target="_blank" rel="nofollow noopener">ссылка для скачивания фото</a></b>.</p>
<p>Коллегам-специалистам <b><a href="/album/<?=$model->id?>-<?=$model->id?>-<?=$model->slug?>" target="_blank" rel="nofollow noopener">ссылка для скачивания фото</a></b>.</p>
<p>Остальным <b><a href="/album/<?=$model->slug?>" target="_blank" rel="nofollow noopener">ссылка для просмотра фото</a></b>.</p>

<span>Репосты в соцсети (если фото не подгружается, то повторите, или с другого браузера): </span>

<script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="https://yastatic.net/share2/share.js"></script>
<div class="ya-share2"
 data-services="facebook,odnoklassniki,vkontakte,whatsapp,viber,telegram,twitter,pinterest,collections,messenger,tumblr,skype,moimir,blogger,delicious,digg,evernote,linkedin,lj,pocket,reddit,renren,sinaWeibo,surfingbird,tencentWeibo,qzone"
 data-limit="6"
 data-lang="ru"
 data-title="Альбом «<?=$album->h1?>» ✈ <?=$category->h1?>"
 data-description="<?=$model->title?> <?=$hashtags?>"
 data-image="<?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST']; ?><?=$model->showImagesUrl()[0];?>"
 data-url="<?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST']; ?>/album/<?=$model->id.'-'.$model->created_at.'?utm_repost=adminpost&date='.date('Ymd_His');?>">
</div><br>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'folder',
		'title',		
		'seo_description',
		'seo_keywords',
		'gallery1_link',
		'gallery2_link',
		//'created_at',
	),
)); ?>

<section id="photo-1" class="section section-md bg-white oh text-center">
	<div class="shell">
		<div class="isotope isotope--loaded" data-isotope-layout="fitRows" data-isotope-group="gallery" data-lightgallery="group" style="position: relative; height: 918px;">
			<div class="row" style="padding-bottom:5px;">
				<?php $images_url = $album->showImagesUrl(); ?>
				<? $counter = 0; ?>
				<?php foreach($images_url as $url): ?>
				<?php //if ($counter != 0) { ?>
				<div class="col-xs-12 col-sm-12 col-md-12" style="position:relative; padding-top:5px;">
					<div class="ya-share2" style="position:absolute; top:10px; left:10px;"
						data-services="pinterest,facebook,odnoklassniki,vkontakte,twitter,whatsapp,viber,telegram,collections,messenger,tumblr,skype,moimir,blogger,delicious,digg,evernote,linkedin,lj,pocket,reddit,renren,sinaWeibo,surfingbird,tencentWeibo,qzone"
						data-limit="4"
						data-lang="ru"
						data-title="Альбом «<?=$album->h1?>» ✈ <?=$category->h1?>"
						data-description="<?=$model->title?> <?=$hashtags?>"
						data-image="<?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST']; ?><?=$url;?>"
						data-url="<?=((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST']; ?>/album/<?=$model->id.'-'.$model->created_at.'?utm_repost=adminpost&date='.date('Ymd_His');?>">
					</div>
					<img src="<?=$url;?>" alt="<?=$album->title;?> фото <?=$counter;?>" width="720">
				</div>
				<? //} ?>
				<? $counter++; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<?//=$model->showImages(0,'',array('width' => 300))?>
