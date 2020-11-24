<?php

class QuizSingleSelectWidget extends CWidget {

    public $options;
    public $selectedOptions;

    //will be called on view
    public function optionIsSelected($option){
        $result = false;
        foreach($this->selectedOptions as $selectedOption){
            if($option->value == $selectedOption->value){
                $result = true;
                break;
            }
        }
        return $result;
    }

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