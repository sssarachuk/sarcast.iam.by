<?php

class QuizSingleSelectDropDownWidget extends QuizBaseWidget {

    public function init(){
        $this->initializeJavascript('quiz-single-select-dropdown');
    }

    public function run() {

        return $this->render('quiz-single-select-dropdown', array(
            'options'=>$this->options,
            'selectedOptions'=>$this->selectedOptions,
        ));
    }

}