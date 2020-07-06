<?php

/**
 * This is the model class for table "service".
 *
 * The followings are the available columns in table 'service':
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $price
 * @property string $description
 * @property string $photos
 * @property integer $created_at
 * @property integer $updated_at
 */
class Service extends ActiveRecord
{
        public $image;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Service the static model class
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
		return 'service';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, title_eng, description, description_eng, category_id', 'required'),
			array('created_at, updated_at, category_id', 'numerical', 'integerOnly'=>true),
			array('title, title_eng, slug, pretitle, pretitle_eng, notes, price, price_rub, price_usd, price_eur', 'length', 'max'=>255),
            array('photos', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, title_eng, slug, price, description, description_eng, photos, created_at, updated_at, pretitle, notes, category_id', 'safe', 'on'=>'search'),
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
            'category_id' => 'Категория',
			'title' => 'Название услуги',
            'title_eng' => 'Название услуги ENG',
            'pretitle' => 'Заголовок',
            'pretitle_eng' => 'Заголовок ENG',
			'slug' => 'Slug',
			'price' => 'Цена',
            'price_rub' => 'Цена RUB',
            'price_usd' => 'Цена USD',
            'price_eur' => 'Цена EUR',
            'notes' => 'Примечание',
			'description' => 'Описание',
            'description_eng' => 'Описание ENG',
			'photos' => 'Фото',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
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
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('description',$this->description,true);
        $criteria->compare('description_eng',$this->description_eng,true);
		$criteria->compare('photos',$this->photos,true);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('updated_at',$this->updated_at);
        $criteria->compare('pretitle',$this->pretitle);
        $criteria->compare('notes',$this->notes);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'pagination'=>array('pageSize'=>25),
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
			$dir = Yii::app()->params['serviceImagesWebDir'];
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
			$dir = Yii::app()->params['serviceImagesWebDir'];
			$arrPhotos = array();
			$limit = $limit ? $limit : sizeof($photos);
			for ($i = 0; $i < $limit; $i++) {
				if (isset($photos[$i])) {
                                    $url = $dir . $photos[$i];
                                    $arrPhotos[] = $url;
                                    if($limit == 1){
                                        return $url;
                                    }
				}
			}
			return $arrPhotos;
		}
		return '';
	}
}