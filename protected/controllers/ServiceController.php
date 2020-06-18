<?php

class ServiceController extends Controller {

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
				'actions'=>array('view', 'index', 'about'),
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
            
                    $service = Service::model()->find('slug=?', array($slug));
                    if (!$service) {
                            throw new CHttpException(404, 'Запрашиваемая вами услуга не найден');
                    }      
 
                    $this->render('view',array(
                            'service' => $service,
                    ));

	}
        
	public function actionIndex(){
            
                    $services = Service::model()->findAll();
 
                    $this->metaTags = array(
            			'title'			=> К_ЗАГОЛОВОК_СТРАНИЦЫ_ЦЕН,
            			'description'	=> К_ОПИСАНИЕ_СТРАНИЦЫ_ЦЕН,
            			'keywords'		=> К_КЛЮЧЕВЫЕ_СЛОВА_СТРАНИЦЫ_ЦЕН
        		    );
 
                    $this->render('index',array(
                            'services' => $services,
                    ));

	}
        
	public function actionAbout(){
 
                    $this->render('about',array(
                        
                    ));

	}        
        
        
}
