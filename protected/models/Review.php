<?php

/**
 * This is the model class for table "review".
 *
 * The followings are the available columns in table 'review':
 * @property integer $id
 * @property string $title
 * @property string $name
 * @property string $date
 * @property string $description
 * @property string $photos
 * @property integer $created_at
 * @property integer $updated_at
 */
class Review extends ActiveRecord
{
        public $image;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Review the static model class
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
		return 'review';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description', 'required'),
			array('created_at, updated_at', 'numerical', 'integerOnly'=>true),
			array('title, name, date', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, name, date, description, photos, created_at, updated_at', 'safe', 'on'=>'search'),
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Заголовок',
			'name' => 'Имя',
			'date' => 'дата',
			'description' => 'Описание',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('photos',$this->photos,true);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('updated_at',$this->updated_at);

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
			$dir = Yii::app()->params['albumImagesWebDir'];
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
			$dir = Yii::app()->params['albumImagesWebDir'];

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