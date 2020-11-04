<?php
include dirname(__DIR__)."/viewmodels/quiz/QuizViewModel.php";
include dirname(__DIR__)."/viewmodels/quiz/QuizQuestionModel.php";
include dirname(__DIR__)."/viewmodels/quiz/QuizTitleModel.php";

class QuizController extends Controller {

        private $isStarted = false;
        private $currentIndex = 0;
        private $quizModel;

    public function actionIndex(){

            $this->isStarted = isset($_GET['index']);
            $this->quizModel = $this->getQuizViewModel();

            if($this->isStarted){
                $this->currentIndex = (int)$_GET['index'];
            }

            //onClick='location.href="?index=<?=$previousIndex;"'

//            Yii::app()->session['quizModel'] = $this->quizModel;
//            $this->previousIndex = $this->currentIndex - 1 < 0
//                ? 0
//                : $this->currentIndex - 1;
//
//            $this->nextIndex = $this->currentIndex + 1 > $questionCount
//                ? $questionCount
//                : $this->currentIndex + 1;
            //$this->currentQuestion = $this->quizModel->questions[$this->currentIndex];

            $this->render('index', array(
                'quizName' => $this->quizModel->name,
                'quizTitle' => $this->quizModel->title,
                'currentQuestion' => $this->quizModel->questions[$this->currentIndex],
                'isStarted' => $this->isStarted,
            ));

    }

    private function getQuizViewModel(){
        $quizModel = new QuizViewModel();
        $quizModel->name = "Рассчитайте стоимость вашей свадьбы";
        $quizModel->questions = $this->getQuizQuestions();
        $quizModel->title = $this->getQuizTitleModel(count($quizModel->questions));

        return $quizModel;
    }

    private function getQuizQuestions(){
        $question1 = new QuizQuestionModel();
        $question1->text = "Какая съемка вас интересует?";

        $question2 = new QuizQuestionModel();
        $question2->text = "Вы больше хотите живые фото (репортажные), постановочные, или микс?";

        $question3 = new QuizQuestionModel();
        $question3->text = "Какие этапы сьемки вас интересуют?";

        return array($question1, $question2, $question3);
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