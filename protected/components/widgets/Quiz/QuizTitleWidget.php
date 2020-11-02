<?php

class QuizTitleWidget extends CWidget {

    public $model;

    public function run() {
        return $this->render('quiz-title', array('model'=>$this->model));
    }
}