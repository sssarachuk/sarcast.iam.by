<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex() {
		$this->layout = '//layouts/main';

        $sliders = Slider::model()->findAll();

        $categories = Category::model()->findAll('sort >=0 ORDER BY sort');

        $albums = Album::model()->findAll('id!=-1 ORDER BY sort');

        $services = Service::model()->findAll('id!=-1 ORDER BY id');

		$this->metaTags = array(
			'title'			=> К_ЗАГОЛОВОК_ГЛАВНОЙ_СТРАНИЦЫ,
			'description'	=> К_ОПИСАНИЕ_ГЛАВНОЙ_СТРАНИЦЫ,
			'keywords'		=> К_КЛЮЧЕВЫЕ_СЛОВА_ГЛАВНОЙ_СТРАНИЦЫ
		);

		$this->render('index', array(
                    'sliders' => $sliders,
                    'albums' => $albums,
                    'categories' => $categories,
                    'services' => $services,
                            ));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError() {
	    if($error=Yii::app()->errorHandler->error) {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact() {
		$model = new ContactForm();
		if (isset($_POST['ContactForm'])) {
			$model->attributes = $_POST['ContactForm'];
			if ($model->validate()) {
                            //$headers = "From: {$model->email}\r\nReply-To: {$model->email}";
                            $headers = "MIME-Version: 1.0\r\n";
                            $headers .= "Content-type: text/html; charset='UTF-8' \r\n";
                            $headers .= "From: " . $model->email . "\r\n";
                            $headers .= "X-mailer: Furniture Mailer\r\n";

                            $content = 'Email: '.$model->email.' <br />';
                            $content .= 'Телефон: '.$model->phone.' <br />';
                            $content .= 'Сообщение: '.$model->body.' <br />';
                            mail(Yii::app()->params['adminEmail'], 'Furniture Store '. $model->email, $content, $headers);
                            //mail(Yii::app()->params['shopManagerEmail'], $model->subject, $content, $headers);
                            //Yii::app()->user->setFlash('contact', 'Спасибо вам за ваше сообщение. We will answer it as soon as possible.');
                            $this->refresh();
			}
		}
		$this->render('contact', array('model' => $model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionTest() {
		//$root = Category::model()->roots()->findByPk(4);

		//$roots = Category::model()->roots()->findAll();
		//$rs = Utilities::collectObjectsVars($roots, 'id');

		/*$roots = Category::model()->findByPk(5);
		$comments = $roots->descendants()->findAll();
		$rs = Utilities::collectObjectsVars($comments, 'title');
		Utilities::var_dump($rs);*/

		//$comments=$root->descendants()->findAll();
		//$comments = $root->children()->findAll();


		/*
		$root = new Category();
		$root->page_name = 'pn1';
		$root->title = 'root 5';
		$r = $root->tree->save(FALSE);
		//*/

		/*
		$node = new Category();
		$node->page_name = 'pn3';
		$node->title = 'title 4-1';
		$root->append($node, FALSE);
		//*/

		/*$p = Product::model()->findByPk(1);
		//Utilities::var_dump($p->categories);
		foreach ($p->categories as $c) {
			Utilities::var_dump(($c->id));
		}*/
		//$this->forward('site/login');

		$dataProvider = new CActiveDataProvider('Product');
		$criteria = new CDbCriteria;
		//$criteria->select='category.*';
		$criteria->with = 'categories';
		$criteria->condition = 'categories_categories."category_id"=:categories_id';
		$criteria->params = array(':categories_id' => 62);
		$dataProvider->setCriteria($criteria);
		$dataProvider->setTotalItemCount(21);

		/*array(
			'criteria'=>array(
				'condition'=>'categories.id=:categories_id',
				//'params'=>array(':categories_id'=>1),
				//'with'=>array('categories'),
			),
			'pagination'=>array(
				  'pageSize'=>10,
			),
		));*/
		$products = $dataProvider->getData(); //will return a list of Post objects
Utilities::var_dump(Utilities::collectObjectsVars($products, 'slug'));
		//$pages = $dataProvider->getPagination();

		$this->renderText('ok!');
	}

	public function actionUrlForwarder($slug) {
		$product = Product::model()->find('slug=?', array($slug));
		if ($product) {
			$this->forward('product/view/slug/' . $slug);
		} elseif($category = Category::model()->find('page_name=?', array($slug)) || $slug == 'search') {
			$this->forward('category/view/page_name/' . $slug);
		} else {
                        $this->forward('collection/view/collection_name/' . $slug);
                }
	}

	/**
	 * If GodMode enabled user can see debug toolbar and error messages
	 */
	/*public function actionGodMode() {
		$user = Yii::app()->user;
		if (isset($_GET['password'])) {
			if ($_GET['password'] == 'mp3') {
				setcookie('GodMode', sha1(date("j.m.Y")), 0, '/');
			} else {
				setcookie('GodMode', FALSE, 0, '/');
			}
		}
		$this->redirect("/");
	}*/

        public function actionAbout(){
			$page = Page::model()->find('name=:name', array(':name'=>'about'));

			$this->metaTags = array(
				'title'			=> $page->meta_title,
				'description'	=> $page->meta_description,
				'keywords'		=> $page->meta_keywords
			);

            $this->render('about',array('page' => $page));
        }

        public function actionContacts(){
			$page = Page::model()->find('name=:name', array(':name'=>'contacts'));

			$this->metaTags = array(
				'title'			=> $page->meta_title,
				'description'	=> $page->meta_description,
				'keywords'		=> $page->meta_keywords
			);

            $this->render('contacts',array('page' => $page));
		}

		public function actionPolicy(){
			$page = Page::model()->find('name=:name', array(':name'=>'policy'));

			$this->metaTags = array(
				'title'			=> $page->meta_title,
				'description'	=> $page->meta_description,
				'keywords'		=> $page->meta_keywords
			);

            $this->render('policy',array('page' => $page));
        }

        public function actionSend(){
            if(!isset($_POST['name']) || !$_POST['name'])
                $_POST['name'] = 'Noname';

           if(isset($_POST['name']) && $_POST['name']){
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset='UTF-8' \r\n";
                $headers .= "From: " . Yii::app()->params['adminEmail'] . "\r\n";
                $headers .= "X-mailer: Furniture Mailer\r\n";

                $content = 'Имя: '.$_POST['name'].'<br>';
                $content .= 'Телефон: '.$_POST['phone'].'<br>';
                if(isset($_POST['email']) && $_POST['email']) $content .= 'Email: '.$_POST['email'].'<br>';
                if(isset($_POST['date']) && $_POST['date']) $content .= 'Дата: '.$_POST['date'].'<br>';
				if(isset($_POST['message']) && $_POST['message']) $content .= '<br>Сообщение: '.$_POST['message'].'<br><br>';
				if(isset($_POST['message-footer']) && $_POST['message-footer']) $content .= '<br>Сообщение: '.$_POST['message-footer'].'<br><br>';
                $content .= 'Подарки: '.К_ПОДАРКИ_НА_ЭМЕЙЛ.'<br><br>';

				if(isset($_POST['contact-question-1']) && $_POST['contact-question-1']) $content .= '1) '.ВОПРОС_1_НА_ЭМЕЙЛ.': '.$_POST['contact-question-1'].'<br>';
				if(isset($_POST['contact-question-2']) && $_POST['contact-question-2']) $content .= '2) '.ВОПРОС_2_НА_ЭМЕЙЛ.': '.$_POST['contact-question-2'].'<br>';
				if(isset($_POST['contact-question-3']) && $_POST['contact-question-3']) $content .= '3) '.ВОПРОС_3_НА_ЭМЕЙЛ.': '.$_POST['contact-question-3'].'<br>';
				if(isset($_POST['contact-question-4']) && $_POST['contact-question-4']) $content .= '4) '.ВОПРОС_4_НА_ЭМЕЙЛ.': '.$_POST['contact-question-4'].'<br>';
				if(isset($_POST['contact-question-5']) && $_POST['contact-question-5']) $content .= '5) '.ВОПРОС_5_НА_ЭМЕЙЛ.': '.$_POST['contact-question-5'].'<br>';

				if(isset($_POST['is-clientview']) && $_POST['is-clientview'])
				{
					//страница clientview
					$album = Album::model()->find('id='.$_POST['is-clientview']);
					$content2 = '';
					if(isset($album->gallery1_link) && $album->gallery1_link)
						$content2 .= 'Ссылка на фото (галерея 1): '.$album->gallery1_link.'<br><br>';
					if(isset($album->gallery2_link) && $album->gallery2_link)
						$content2 .= 'Ссылка на фото (галерея 2): '.$album->gallery2_link.'<br><br>';
					$content .= '<br>'.$content2;
					//сохранение в БД
					if (empty($album->review_before)) {
						$album->review_before = $content;
						$album->save();
					}
				}
				else
				{
					$content2 = 'Подарки: '.К_ПОДАРКИ_НА_ЭМЕЙЛ;
				}
				//отправка
				if(isset($_POST['email']) && $_POST['email'])
				{
					mail(Yii::app()->params['shopManagerEmail'], 'Копия письма клиенту от '.К_ДОМЕН_САЙТА, $content2, $headers);
					mail($_POST['email'], 'Обратная связь от '.К_ДОМЕН_САЙТА, $content2, $headers);
				}
                mail(Yii::app()->params['adminEmail'], 'Обратная связь от '.К_ДОМЕН_САЙТА, $content, $headers);
				echo '1';
           }
        }
}