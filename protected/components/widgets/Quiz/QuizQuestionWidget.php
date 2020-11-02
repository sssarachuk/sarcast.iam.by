<?php

class QuizQuestionWidget extends CWidget {

    public $model;

    public function run() {
        return $this->render('quiz-question', array('model'=>$this->model));
    }

}