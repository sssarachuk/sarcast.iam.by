<?php

class QuizTextFieldWidget extends QuizBaseWidget {

    public function init(){
        $this->initializeJavascript('quiz-textfield');
    }

    public function run() {
        return $this->render('quiz-textfield', array(
            'options'=>$this->options,
            'selectedOptions'=>$this->selectedOptions,
        ));
    }

}