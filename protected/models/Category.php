<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property integer $created_at
 * @property integer $updated_at
 */
class Category extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Category the static model class
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
		return 'category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, title_eng, h1, h1_eng, h1_nav, h1_nav_eng', 'required'),
            array('title, title_eng, seo_description, seo_description_eng', 'unique'),
			array('created_at, updated_at', 'numerical', 'integerOnly'=>true),
			array('sort', 'numerical'),
			array('slug, title, title_eng, h1, h1_eng, h1_nav, h1_nav_eng, seo_description, seo_description_eng, seo_keywords, seo_keywords_eng', 'length', 'max'=>255),
            array('text1, text1_eng, photos', 'length', 'min'=>0),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, slug, title, created_at, updated_at', 'safe', 'on'=>'search'),
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
				'title_colAttribute' => 'title_eng',
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
			'slug' => 'Slug',
			'title' => 'Заголовок Title RUS',
            'title_eng' => 'Заголовок Title ENG',
            'h1' => 'Заголовок H1 RUS',
            'h1_eng' => 'Заголовок H1 ENG',
            'h1_nav' => 'Сокращенный заголовок H1 RUS',
            'h1_nav_eng' => 'Сокращенный заголовок H1 ENG',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'sort'	=> 'Сортировка',
            'text1'	=> 'Текстовое описание (RUS)',
            'text1_eng'	=> 'Текстовое описание (перевод на ENG)',
            'seo_description'	=> 'SEO Описание (RUS)',
            'seo_description_eng'	=> 'SEO Description (ENG)',
            'seo_keywords'	=> 'SEO Ключевые слова (RUS)',
            'seo_keywords_eng'	=> 'SEO Keywords (ENG)',
            'photos' => 'Фотографии в слайдер'
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
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('title',$this->title,true);
        $criteria->compare('title_eng',$this->title_eng,true);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('updated_at',$this->updated_at);
		$criteria->compare('sort',$this->sort);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>25),
		));
	}

    /**
     * Возвращает url картинки слайда для вывода
     * @param int $limit
     * @param string $delimiter
     * @param array $htmlOptions
     * @return string
     */
	public function showImagesUrl($limit = 0, $delimiter = '', $htmlOptions = array()) {
		if ($this->photos) {
			$photos = array_map('trim', explode("\n", $this->photos));
			$dir = '';
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
}