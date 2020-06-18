<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property integer $role
 * @property string $name
 * @property string $surname
 * @property string $phone
 * @property string $city
 * @property string $address
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends ActiveRecord {

	const ROLE_ADMIN		= 50;
	const ROLE_USER			= 10;
	const ROLE_GUEST		= 0;

	public $password_repeat;

	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password', 'required'),
			array('password_repeat', 'required', 'on'=>'registration'),
			array('password', 'compare', 'on'=>'registration'),
			array('email', 'email'),
			array('email', 'unique'),
			array('role, created_at, updated_at', 'numerical', 'integerOnly'=>true),
			array('name, surname, phone, city, address, password_repeat', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, password, role, name, surname, phone, city, address, created_at, updated_at', 'safe', 'on'=>'search'),
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
		$behaviors = array();
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
			'email' => 'Электропочта',
			'password' => 'Пароль',
			'password_repeat' => 'Пароль ещё раз',
			'role' => 'Права',
			'name' => 'Имя',
			'surname' => 'Фамилия',
			'phone' => 'Телефон',
			'city' => 'Город',
			'address' => 'Адрес',
			'created_at' => 'Зарегистрирован',
			'updated_at' => 'Обновлен',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('role',$this->role);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('updated_at',$this->updated_at);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	public function getFullName() {
		$fullName = trim($this->name . ' ' . $this->surname);
		return $fullName;
	}

}