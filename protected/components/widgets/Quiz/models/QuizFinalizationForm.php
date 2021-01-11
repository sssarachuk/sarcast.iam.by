<?php

class QuizFinalizationForm extends CFormModel {
    public $sources = array('Email' => 'Email', 'WatsUp'=>'WatsUp', 'Telegram' => 'Telegram', 'Viber' => 'Viber');

    public $name;
    public $selectedSource;
    public $email;
    public $phone;
    public $isAgreeWithConfidentialPolicy = false;

    public function attributeLabels()
    {
        return array(
            'name' => 'Введите имя',
            'selectedSource' => 'Выберите куда присылать результаты?',
            'email' => 'Введите Email',
            'phone' => 'Введите телефон'
        );
    }

    public function rules()
    {
        return array(
            array('name', 'required'),
            array('selectedSource', 'required'),
            array('email', 'required', 'on' => 'Email'),
            array('email', 'email', 'on' => 'Email'),
            array('phone', 'required', 'on' => 'WatsUp, Telegram, Viber'),
            array('phone', 'match', 'pattern' => '/^([+]?[0-9 ]+)$/', 'on' => 'WatsUp, Telegram, Viber'),
        );
    }
}