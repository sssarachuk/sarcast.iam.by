<?php

include dirname(__DIR__)."/Quiz/models/QuizFinalizationForm.php";

class QuizFinalizationFormWidget extends CWidget {

    private $model;

    public function init() {
        $this->model = new QuizFinalizationForm();
    }

    public function run() {

        if(isset($_POST['QuizFinalizationForm']))
        {
            // collects user input data
            $this->model->attributes = $_POST['QuizFinalizationForm'];
            // validates user input and redirect to previous page if validated
            if($this->model->validate()){

            }
        }
        // displays the login form
        $this->render('quiz-finalization-form',array('model'=>$this->model));
    }

}