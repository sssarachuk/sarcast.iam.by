<?php

class QuizMultiSelectWidget extends QuizBaseWidget {

    public function init(){
        $this->initializeJavascript('quiz-multi-select');
    }

    public function run() {
        return $this->render('quiz-multi-select', array(
            'options'=>$this->options,
            'selectedOptions'=>$this->selectedOptions,
        ));
    }

}