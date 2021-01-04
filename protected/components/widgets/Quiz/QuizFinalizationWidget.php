<?php

class QuizFinalizationWidget extends CWidget {

    public $quizTitle;
    public $model;
    public $previousIndex;
    public $previousButtonDisabled;
    public $currentDiscount;
    public $selectedSource;

    public function run() {

        return $this->render('quiz-finalization', array(
            'model'=>$this->model,
            'quizTitle'=>$this->quizTitle,
            'previousIndex'=>$this->previousIndex,
            'previousButtonDisabled'=>$this->previousButtonDisabled,
            'currentDiscount'=>$this->currentDiscount,
            'selectedSource'=>'Email',
        ));
    }

}