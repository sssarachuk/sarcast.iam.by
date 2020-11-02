<?php
include dirname(__DIR__)."/viewmodels/quiz/QuizViewModel.php";
include dirname(__DIR__)."/viewmodels/quiz/QuizQuestionModel.php";
include dirname(__DIR__)."/viewmodels/quiz/QuizTitleModel.php";

class QuizController extends Controller {

        public $isStarted = false;

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

            $quiz->title = $this->getQuizTitleModel(count($quiz->questions));

            $this->render('index', array('quiz' => $quiz, 'isStarted' => $this->isStarted));

    }

    private function getQuizTitleModel($questionNumber) {
        $quizTitleModel = new QuizTitleModel();
        $quizTitleModel->title = "Пройдите тест из ".$questionNumber." вопросов и узнайте стоимость фотосъемки";
        $quizTitleModel->description = "за прохождение теста вы получите 2 подарка и 15% скидку";
        $quizTitleModel->startButtonTitle = "Рассчитать стоимость";
        $quizTitleModel->previewImg = Yii::app()->params['albumImagesWebDir']."5.jpg";
        return $quizTitleModel;
    }
}