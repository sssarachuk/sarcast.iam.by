<?php

class QuizMultiSelectImageWidget extends QuizBaseWidget {

    public function init(){
        $this->initializeJavascript('quiz-multi-select-image');
    }

    public function run() {
        return $this->render('quiz-multi-select-image', array(
            'options'=>$this->options,
            'selectedOptions'=>$this->selectedOptions,
        ));
    }

}