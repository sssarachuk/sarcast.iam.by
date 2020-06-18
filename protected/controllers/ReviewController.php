<?php

class ReviewController extends Controller {

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
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

        public function actionIndex(){
            
            $reviews = Review::model()->findAll(array('order' => 'created_at DESC'));
            
            $this->metaTags = array(
    			'title'			=> К_ЗАГОЛОВОК_СТРАНИЦЫ_ОТЗЫВОВ,
    			'description'	=> К_ОПИСАНИЕ_СТРАНИЦЫ_ОТЗЫВОВ,
    			'keywords'		=> К_КЛЮЧЕВЫЕ_СЛОВА_СТРАНИЦЫ_ОТЗЫВОВ
		    );
            
            $this->render('index',array(
                    'reviews' => $reviews,
            ));            
            
        }

}
