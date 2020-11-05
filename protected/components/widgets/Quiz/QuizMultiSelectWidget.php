<?php

class QuizMultiSelectWidget extends CWidget {

    public $model;

    public function run() {

        return $this->render('quiz-multi-select', array(
            'model'=>$this->model,
        ));
    }

}