<?php

class QuizSingleSelectImageWidget extends QuizBaseWidget {

    public function init(){
       $this->initializeJavascript('quiz-single-select-image');
    }

    public function run() {

        return $this->render('quiz-single-select-image', array(
            'options'=>$this->options,
            'selectedOptions'=>$this->selectedOptions,
        ));
    }

}