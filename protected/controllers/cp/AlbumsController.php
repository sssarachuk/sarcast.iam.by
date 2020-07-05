<?php

class AlbumsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/cp';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','menu'),
				//'users'=>array('*'),
				'users'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','slides'),
				//'users'=>array('@'),
				'users'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('manage','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$album = Album::model()->find('id='.$id);
		$category = Category::model()->findByPk($album->category_id);

		$image_url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST'].$album->showImagesUrl()[0];

		/* Twitter Card данные */
		Yii::app()->clientScript->registerMetaTag('summary_large_image', 'twitter:card', null, array(), null);
		Yii::app()->clientScript->registerMetaTag(TWITTER_АККАУНТ, 'twitter:site', null, array(), null);
		Yii::app()->clientScript->registerMetaTag($category->h1.' - '.$album->h1, 'twitter:title', null, array(), null);
		Yii::app()->clientScript->registerMetaTag($album->title, 'twitter:description', null, array(), null);
		Yii::app()->clientScript->registerMetaTag($image_url, 'twitter:image', null, array(), null);
		//Yii::app()->clientScript->registerMetaTag($album->h1.' фото', 'twitter:image:alt', null, array(), null);

		//тип объекта og:type
		Yii::app()->clientScript->registerMetaTag('article', null, null, ['property' => 'og:type'], null);
		Yii::app()->clientScript->registerMetaTag(date('d/m/Y G:i', $album->created_at), null, null, ['property' => 'article:published_time'], null);
		Yii::app()->clientScript->registerMetaTag(date('d/m/Y G:i', $album->updated_at), null, null, ['property' => 'article:modified_time'], null);
		Yii::app()->clientScript->registerMetaTag(АВТОРЫ_КОНТЕНТА, null, null, ['property' => 'article:author'], null);
		Yii::app()->clientScript->registerMetaTag($category->h1, null, null, ['property' => 'article:section'], null);
		Yii::app()->clientScript->registerMetaTag($category->seo_keywords, null, null, ['property' => 'article:tag'], null);
		//название og:title
		$count_ph = count($album->showImagesUrl())-1;
		Yii::app()->clientScript->registerMetaTag($category->h1.' - '.$album->h1.' ('.$count_ph.' фото)', null, null, ['property' => 'og:title'], null);
		//описание og:description
		Yii::app()->clientScript->registerMetaTag($album->title, null, null, ['property' => 'og:description'], null);
		//url объекта og:url
		Yii::app()->clientScript->registerMetaTag(((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .$_SERVER['HTTP_HOST'].'/album/'.$album->slug, null, null, ['property' => 'og:url'], null);
		//url изображения og:image
		Yii::app()->clientScript->registerMetaTag($image_url, null, null, ['property' => 'og:image'], null);
		//ширина og:image:width и высота изображения og:image:height
		Yii::app()->clientScript->registerMetaTag(getimagesize($image_url)[0], null, null, ['property' => 'og:image:width'], null);
		Yii::app()->clientScript->registerMetaTag(getimagesize($image_url)[1], null, null, ['property' => 'og:image:height'], null);
		//альт текст изображения og:image:alt
		Yii::app()->clientScript->registerMetaTag($album->h1.' фото', null, null, ['property' => 'og:image:alt'], null);
		//название сайта og:site_name
		Yii::app()->clientScript->registerMetaTag($_SERVER['HTTP_HOST'], null, null, ['property' => 'og:site_name'], null);
		//язык сайта og:locale
		Yii::app()->clientScript->registerMetaTag('ru_RU', null, null, ['property' => 'og:locale'], null);
		Yii::app()->clientScript->registerMetaTag('en_US', null, null, ['property' => 'og:locale:alternate'], null);

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'album' => $album,
			'category' => $category,
		));
	}

    /**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionSlides($id)
	{
        $album = Album::model()->find('id='.$id);
        $category = Category::model()->findByPk($album->category_id);

        $this->render('slides',array(
			'model'=>$this->loadModel($id),
            'category' => $category,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new Album();

		$this->performAjaxValidation($model);

		if (isset($_POST['Album'])) {
			$model->attributes = $_POST['Album'];

			if ($model->save()) {
                                if ($image = CUploadedFile::getInstance($model, 'image')) {
                                        $model->image = $image;
                                        $this->attachImage($image, $model);
                                }
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model' => $model
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id) {
		$model = $this->loadModel($id);

		$this->performAjaxValidation($model);

		if (isset($_POST['Album'])) {
			$model->attributes = $_POST['Album'];

			if ($image = CUploadedFile::getInstance($model, 'image')) {
				$model->image = $image;
				$this->attachImage($image, $model);
			}

			$model->photos = $_POST['Album']['photos'];

			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}



		}

		$this->render('update',array(
			'model'=>$model
		));
	}

	/**
	 * Добавляет загруженную картинку к модели
	 * @param <type> $image
	 * @param <type> $model
	 */
	private function attachImage($image, $model) {
                $path = Yii::app()->params['albumImagesSysDir'].'/'.$model->folder;

                if(!file_exists($path)) {
                   mkdir($path, 0755, true);
                }

		$photoName = $image->getName();
		$model->image->saveAs(Yii::app()->params['albumImagesSysDir'].'/'.$model->folder.'/' . $photoName);
		$model->photos = $model->photos ? $model->photos . "\n" . $photoName : $photoName;
		return $model->save();
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		if(Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('manage'));
			}
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Album');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionManage()
	{
		$model=new Album('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Album']))
			$model->attributes=$_GET['Album'];

		$this->render('manage',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id) {
		$model = Album::model()->findByPk((int)$id);
		if ($model === null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if(isset($_POST['ajax']) && $_POST['ajax']==='album-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}