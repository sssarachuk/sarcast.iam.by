<?php

class QuizFinalizationWidget extends QuizBaseWidget {

    public $quizTitle;
    public $previousIndex;
    public $previousButtonDisabled;
    public $currentDiscount;

    public function init(){
        $this->initializeJqueryUI();
        $this->initializeJavascript('quiz-finalization');
    }

    public function run() {



        return $this->render('quiz-finalization', array(
            'quizTitle'=>$this->quizTitle,
            'previousIndex'=>$this->previousIndex,
            'previousButtonDisabled'=>$this->previousButtonDisabled,
            'currentDiscount'=>$this->currentDiscount,
        ));
    }

}