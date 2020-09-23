<?php
include dirname(__DIR__)."/viewmodels/quiz/QuizViewModel.php";
include dirname(__DIR__)."/viewmodels/quiz/QuizQuestionModel.php";

class QuizController extends Controller {

        public function actionIndex(){

            $quiz = new QuizViewModel();
            $quiz->name = "Рассчитайте стоимость вашей свадьбы";

            $question1 = new QuizQuestionModel();
            $question1->text = "Какая съемка вас интересует?";

            $question2 = new QuizQuestionModel();
            $question2->text = "Вы больше хотите живые фото (репортажные), постановочные, или микс?";

            $question3 = new QuizQuestionModel();
            $question3->text = "Какие этапы сьемки вас интересуют?";

            $quiz->questions = array($question1, $question2, $question3);

            $this->render('index', array('quiz' => $quiz));

    }
}