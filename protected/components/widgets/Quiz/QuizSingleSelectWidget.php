<?php

class QuizSingleSelectWidget extends CWidget {

    public $options;

    public function run() {

        return $this->render('quiz-single-select', array(
            'options'=>$this->options,
        ));
    }

}