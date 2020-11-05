<?php

class QuizSingleSelectImageWidget extends CWidget {

    public $model;

    public function run() {

        return $this->render('quiz-single-select-image', array(
            'model'=>$this->model,
        ));
    }

}