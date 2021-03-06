<?php

/**
 * This is the model class for table "album".
 *
 * The followings are the available columns in table 'album':
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $folder
 * @property string $photos
 * @property integer $created_at
 * @property integer $updated_at
 * 2020-05-27:
 * $title_eng, $gallery1_link, $gallery2_link, $text1, $text1_eng, $text2, $text2_eng, $seo_description, $seo_description_eng, $seo_keywords, $seo_keywords_eng
 */
class Album extends ActiveRecord
{
        public $image;

	/**
	 * Returns the static model of the specified AR class.
	 * @return Album the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'album';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, h1, folder, category_id', 'required'),
            array('folder, title, title_eng, seo_description, seo_description_eng', 'unique'),
			array('created_at, updated_at, category_id', 'numerical', 'integerOnly'=>true),
			array('sort', 'numerical'),
			array('title, title_eng, h1, h1_eng, slug, folder, gallery1_link, gallery2_link, seo_description, seo_description_eng, seo_keywords, seo_keywords_eng', 'length', 'max'=>255),
            array('text1, text1_eng, text2, text2_eng, review_before, review_after, comments', 'length', 'min'=>0),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, title_eng, slug, folder, photos, created_at, updated_at, category_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

        public function behaviors() {
		$behaviors = array(
			'SlugBehavior' => array(
				'class' => 'application.models.behaviors.SlugBehavior',
				'slug_colAttribute' => 'slug',
				'title_colAttribute' => 'title',
				//'max_slug_chars' => 125,
				'overwriteAttribute' => FALSE
			),
		);
		$behaviors = parent::behaviors($behaviors);
		return $behaviors;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
            'category_id' => 'Категория',
			'title' => '(RUS) Длинный заголовок Title',
            'title_eng' => '(ENG) Длинный заголовок Title',
            'h1' => '(RUS) Короткий заголовок H1',
            'h1_eng' => '(ENG) Короткий заголовок H1',
			'slug' => 'Slug',
			'folder' => 'Папка сохранения',
			'photos' => 'Фотографии',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'sort'	=> 'Сортировка',
            'gallery1_link'	=> 'Ссылка на фото БЕЗ обработки',
            'gallery2_link'	=> 'Ссылка на фото С обработкой',
            'text1'	=> '(RUS) Описание альбома в начале страницы',
            'text1_eng'	=> '(ENG) Описание альбома в начале страницы (перевод)',
            'text2'	=> '(RUS) Описание альбома в конце страницы',
			'text2_eng'	=> '(ENG) Описание альбома в конце страницы (перевод)',
			'review_before' => 'Отзыв клиента (исходный)',
			'review_after' => 'Отзыв клиента (публичный)',
			'comments' => 'Комментарии коллег (исходные)',
            'seo_description'	=> '(RUS) Описание - seo',
            'seo_description_eng'	=> '(ENG) Description - seo',
            'seo_keywords'	=> '(RUS) Ключевые слова - seo',
            'seo_keywords_eng'	=> '(ENG) Keywords - seo'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
        $criteria->compare('category_id',$this->category_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('title_eng',$this->title_eng,true);
		$criteria->compare('h1',$this->h1,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('folder',$this->folder,true);
		$criteria->compare('photos',$this->photos,true);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('updated_at',$this->updated_at);
		$criteria->compare('sort',$this->sort);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>20),
			'sort'=> ['defaultOrder' => ['id' => SORT_DESC]]
		));
	}

	/**
        * Возвращает картинки товара для вывода
        * @param int $limit
        * @param string $delimiter
        * @param array $htmlOptions
        * @return string
        */
	public function showImages($limit = 0, $delimiter = '', $htmlOptions = array()) {
		if ($this->photos) {
			$photos = array_map('trim', explode("\n", $this->photos));
			$dir = Yii::app()->params['albumImagesWebDir'].'/'.$this->folder.'/';
			$arrPhotos = array();
			$limit = $limit ? $limit : sizeof($photos);
			for ($i = 0; $i < $limit; $i++) {
				if ($photos[$i]) {
					$url = $dir . $photos[$i];
					$arrPhotos[] = CHtml::image($url, $this->title, $htmlOptions);
				}
			}
			return implode($delimiter, $arrPhotos);
		}
		return '';
	}

	/**
     * Возвращает url картинки товара для вывода
     * @param int $limit
     * @param string $delimiter
     * @param array $htmlOptions
     * @return string
     */
	public function showImagesUrl($limit = 0, $delimiter = '', $htmlOptions = array()) {
		if ($this->photos) {
			$photos = array_map('trim', explode("\n", $this->photos));
			$dir = Yii::app()->params['albumImagesWebDir'].$this->folder.'/';
			$arrPhotos = array();
			$limit = $limit ? $limit : sizeof($photos);
			for ($i = 0; $i < $limit; $i++) {
				if (isset($photos[$i])) {
                                    $url = $dir . $photos[$i];
                                    $arrPhotos[] = $url;
                                    /*if($limit == 1){
                                        return $url;
                                    }*/
				}
			}
			return $arrPhotos;
		}
		return '';
	}

	/**
	 * Get Filesize
	 * @param string $file_url
	 * @return string
	 */
	public function getFilesize($file_url) {
		if(!file_exists($file_url))
			return "Файл не найден";
		$bytes = filesize($file_url);
		$decimals = 2;
		$sz = 'BKMGTP';
		$factor = floor((strlen($bytes) - 1) / 3);
		return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
	}
}