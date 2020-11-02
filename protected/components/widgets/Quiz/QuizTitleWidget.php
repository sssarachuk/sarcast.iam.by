<?php

class QuizTitleWidget extends CWidget {

    public $model;

    public function run() {
        return $this->render('question', array('question'=>$this->questionModel));
    }
}