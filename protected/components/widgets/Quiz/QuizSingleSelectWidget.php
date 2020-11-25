<?php

class QuizSingleSelectWidget extends QuizBaseWidget {

    public function init(){
       $this->initializeJavascript('quiz-single-select');
    }

    public function run() {

        return $this->render('quiz-single-select', array(
            'options'=>$this->options,
            'selectedOptions'=>$this->selectedOptions,
        ));
    }

}