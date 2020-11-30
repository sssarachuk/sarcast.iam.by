<?php

class QuizRangeSelectorWidget extends QuizBaseWidget {

    public function init(){
        $this->initializeJqueryUI();
        $this->initializeJavascript('quiz-range-selector');
    }

    public function run() {

        if(is_null($this->selectedOptions) || count($this->selectedOptions) < 2){
            $this->selectedOptions = $this->options;
        }

        return $this->render('quiz-range-selector', array(
            'options'=>$this->options,
            'selectedOptions'=>$this->selectedOptions,
        ));
    }

}