<?php

class QuizQuestionWidget extends CWidget {

    public $questionModel;

    public function run() {
        return $this->render('quiz-question', array('question'=>$this->questionModel));
    }

}