<?php

class QuizSingleSelectWidget extends CWidget {

    public $options;
    public $selectedOptions;

    public function init(){
        Yii::app()->clientScript->registerScriptFile('js/quiz-single-select.js', CClientScript::POS_END);
    }

    public function run() {

        return $this->render('quiz-single-select', array(
            'options'=>$this->options,
            'selectedOptions'=>$this->selectedOptions,
        ));
    }

}