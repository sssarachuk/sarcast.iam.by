<?php

class QuizDatepickerWidget extends QuizBaseWidget {

    public function init(){
        $this->initializeJavascript('quiz-datepicker');
    }

    public function run() {
        return $this->render('quiz-datepicker', array(
            'options'=>$this->options,
            'selectedOptions'=>$this->selectedOptions,
        ));
    }

}