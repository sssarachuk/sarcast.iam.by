<?php

class CategoryController extends Controller {

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

        public function actionIndex(){

            $categories = Category::model()->findAll();

            $this->render('index',array(
                    'categories' => $categories,
            ));

        }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($slug){

                    if ($slug==К_СКРЫТАЯ_КАТЕГОРИЯ_АЛЬБОМОВ) return $this->actionHiddenAlbums();//если скрытая категория

                    $category = Category::model()->find('slug=?', array($slug));
                    if (!$category) {
                            throw new CHttpException(404, 'Запрашиваемая вами категория не найдена');
                    }

                    $albums = Album::model()->findAll('category_id='.$category->id.' AND sort>=0 ORDER BY sort');

                    $this->metaTags = array(
            			'title'			=> $category->title,
            			'description'	=> $category->seo_description,
            			'keywords'		=> $category->seo_keywords
        		    );

                    $this->render('view',array(
                            'category' => $category,
                            'albums' => $albums,
                    ));

	}

    /**
	 * Display HIDDEN ALBUMS page
	 */
	public function actionHiddenAlbums(){

                    $albums = Album::model()->findAll('sort<0 AND sort !=-100500 ORDER BY sort');

                    $this->metaTags = array(
            			'title'			=> К_ЗАГОЛОВОК_СКРЫТЫХ_СТРАНИЦ,
            			'description'	=> К_ОПИСАНИЕ_СКРЫТЫХ_СТРАНИЦ,
            			'keywords'		=> К_КЛЮЧЕВЫЕ_СЛОВА_СКРЫТЫХ_СТРАНИЦ
        		    );

                    $this->render('hidden',array(
                            'albums' => $albums,
                    ));

	}


}
