<?php

class QuizDatepickerWidget extends QuizBaseWidget {

    public function init(){
        $this->initializeJqueryUI();
        $this->initializeJavascript('quiz-datepicker');
    }

    public function run() {

        $selectedDate = '';
        if(!is_null($this->selectedOptions) && count($this->selectedOptions) > 0){
            $selectedDate = $this->selectedOptions[0];
        }
        return $this->render('quiz-datepicker', array(
            'selectedDate'=>$selectedDate->value,
        ));
    }

}