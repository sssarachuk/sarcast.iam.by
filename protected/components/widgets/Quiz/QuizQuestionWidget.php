<?php

class QuizQuestionWidget extends CWidget {

    public $quizTitle;
    public $model;
    public $previousIndex;
    public $previousButtonDisabled;
    public $nextIndex;
    public $nextButtonDisabled;

    public function run() {

        return $this->render('quiz-question', array(
            'model'=>$this->model,
            'quizTitle'=>$this->quizTitle,
            'previousIndex'=>$this->previousIndex,
            'previousButtonDisabled'=>$this->previousButtonDisabled,
            'nextIndex'=>$this->nextIndex,
            'nextButtonDisabled'=>$this->nextButtonDisabled,
        ));
    }

}