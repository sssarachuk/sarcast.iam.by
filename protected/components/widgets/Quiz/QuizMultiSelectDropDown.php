<?php

class QuizMultiSelectDropDown extends QuizBaseWidget {

    public function init(){
        $this->initializeJavascript('quiz-multi-select-dropdown');
    }

    public function run() {
        return $this->render('quiz-multi-select-dropdown', array(
            'options'=>$this->options,
            'selectedOptions'=>$this->selectedOptions,
        ));
    }

}