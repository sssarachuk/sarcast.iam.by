<?php

class QuizBaseWidget extends CWidget {

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

    public function initializeJqueryUI(){
        Yii::app()->clientScript->registerScriptFile('js/jquery-ui.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerCssFile('css/jquery-ui.css');
    }

    public function initializeJavascript($filenameWithoutExtension){
        Yii::app()->clientScript->registerScriptFile('js/'.$filenameWithoutExtension.'.js', CClientScript::POS_END);
    }

}