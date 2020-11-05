<?php

class QuizMultiSelectImageWidget extends CWidget {

    public $model;

    public function run() {

        return $this->render('quiz-multi-select-image', array(
            'model'=>$this->model,
        ));
    }

}