<?php

class AlbumController extends Controller {

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
	public function accessRules() {
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view'),
				'users'=>array('*'),
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
	public function actionView($slug){

        $album = Album::model()->find('slug=?', array($slug));
        if (!$album) { throw new CHttpException(404, 'Запрашиваемый вами альбом не найден'); }

        $category = Category::model()->findByPk($album->category_id);

        $albums = Album::model()->findAll('category_id='.$category->id.' AND sort>=0 ORDER BY sort');
        if (!$albums) { throw new CHttpException(404, 'Запрашиваемые вами альбомы не найдены'); }

        $this->metaTags = array(
            'title'			=> $album->title,
            'description'	=> $album->seo_description,
            'keywords'		=> $album->seo_keywords
        );

        $this->render('view',array(
                'album' => $album,
                'category' => $category,
                'albums' => $albums,
        ));

	}

}
