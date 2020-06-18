<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/cp/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/cp/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/cp/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/cp/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">Панель управления <?=CHtml::encode(Yii::app()->name)?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Сайт', 'url'=>'/'),
				//array('label'=>'О магазине', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Обратная связь', 'url'=>array('/site/contact')),
				//array('label'=>'Корзина'.' ('.Yii::app()->shoppingCart->getItemsCount().')', 'url'=>array('/shop/basket')),
				array('label'=>'Панель управления', 'url'=>array('/cp/admin/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Категории', 'url'=>array('/cp/categories/manage')),
                array('label'=>'Слайдер', 'url'=>array('/cp/sliders/manage')),
                array('label'=>'Альбомы', 'url'=>array('/cp/albums/manage')),
                array('label'=>'Цены', 'url'=>array('/cp/services/manage')),
                array('label'=>'Страницы', 'url'=>array('/cp/pages/manage')),
                array('label'=>'Отзывы', 'url'=>array('/cp/reviews/manage')),
				array('label'=>'Вход', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Выход ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->

	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->

	<?php echo $content; ?>

	<div id="footer">
		<?php echo date('Y'); ?> &copy; <?=Yii::app()->name?><br/>
		Все права защищены.
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>