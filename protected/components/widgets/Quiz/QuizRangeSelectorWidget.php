<?php

class QuizRangeSelectorWidget extends QuizBaseWidget {

    public function init(){
        $this->initializeJavascript('quiz-range-selector');
    }

    public function run() {
        return $this->render('quiz-range-selector', array(
            'options'=>$this->options,
            'selectedOptions'=>$this->selectedOptions,
        ));
    }

}