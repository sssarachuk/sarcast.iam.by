<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/secondary';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu = array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs = array();

	public $metaTags = array();

	public function beforeRender() {
		if ($this->metaTags) {
			foreach ($this->metaTags as $tag => $value) {
				Yii::app()->clientScript->registerMetaTag($value, $tag);
				if ($tag == 'title') {
					$this->pageTitle = $value;
				}
			}
		}
        return TRUE;
	}

	/**
	 * rendering Open Graph meta tags for social networks
	 * @param album отображаемый альбом с картинкой для репоста
	 * @param category категория для текста описания
	 */
	public function actionOpenGraphMetaTags($album, $category) {
		$image_url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST'].$album->showImagesUrl()[0];
		$count_ph = count($album->showImagesUrl())-1;

		//Twitter
		Yii::app()->clientScript->registerMetaTag('summary_large_image', 'twitter:card', null, array(), null);
		Yii::app()->clientScript->registerMetaTag($album->h1.' ('.$count_ph.' фото)', 'twitter:title', null, array(), null);
		Yii::app()->clientScript->registerMetaTag('['.$category->h1.'] '.$album->title, 'twitter:description', null, array(), null);
		Yii::app()->clientScript->registerMetaTag(TWITTER_АККАУНТ, 'twitter:site', null, array(), null);
		Yii::app()->clientScript->registerMetaTag($image_url, 'twitter:image:src', null, array(), null);
		//Other
		Yii::app()->clientScript->registerMetaTag('article', null, null, ['property' => 'og:type'], null);
		Yii::app()->clientScript->registerMetaTag($album->h1.' ('.$count_ph.' фото)', null, null, ['property' => 'og:title'], null);
		Yii::app()->clientScript->registerMetaTag('['.$category->h1.'] '.$album->title, null, null, ['property' => 'og:description'], null);
		Yii::app()->clientScript->registerMetaTag($_SERVER['HTTP_HOST'], null, null, ['property' => 'og:site_name'], null);
		Yii::app()->clientScript->registerMetaTag('ru_RU', null, null, ['property' => 'og:locale'], null);
		//Yii::app()->clientScript->registerMetaTag('en_US', null, null, ['property' => 'og:locale:alternate'], null);
		Yii::app()->clientScript->registerMetaTag(АВТОРЫ_КОНТЕНТА, null, null, ['property' => 'article:author'], null);
		Yii::app()->clientScript->registerMetaTag(date('d/m/Y G:i', $album->created_at), null, null, ['property' => 'article:published_time'], null);
		Yii::app()->clientScript->registerMetaTag(date('d/m/Y G:i', $album->updated_at), null, null, ['property' => 'article:modified_time'], null);
		Yii::app()->clientScript->registerMetaTag($category->h1, null, null, ['property' => 'article:section'], null);
		Yii::app()->clientScript->registerMetaTag($category->seo_keywords, null, null, ['property' => 'article:tag'], null);
		Yii::app()->clientScript->registerMetaTag(((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST'].'/album/'.$album->slug, null, null, ['property' => 'og:url'], null);
		Yii::app()->clientScript->registerMetaTag($image_url, null, null, ['property' => 'og:image'], null);
		Yii::app()->clientScript->registerMetaTag($image_url, null, null, ['property' => 'og:image:secure_url'], null);
		Yii::app()->clientScript->registerMetaTag(getimagesize($image_url)[0], null, null, ['property' => 'og:image:width'], null);
		Yii::app()->clientScript->registerMetaTag(getimagesize($image_url)[1], null, null, ['property' => 'og:image:height'], null);
		//Yii::app()->clientScript->registerMetaTag($album->h1.' фото', null, null, ['property' => 'og:image:alt'], null);
	}

}