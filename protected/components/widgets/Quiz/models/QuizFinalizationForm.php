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
            'selectedSource' => 'Выберите куда присылать результаты?');
    }

    public function rules()
    {
        return array(
            array('name', 'required'),
            array('selectedSource', 'required'),
        );
    }
}