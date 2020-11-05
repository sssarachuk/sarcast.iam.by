<?php

class QuizSingleSelectWidget extends CWidget {

    public $model;

    public function run() {

        return $this->render('quiz-single-select', array(
            'model'=>$this->model,
        ));
    }

}