<?php
include dirname(__DIR__)."/viewmodels/quiz/QuizViewModel.php";
include dirname(__DIR__)."/viewmodels/quiz/QuizQuestionModel.php";
include dirname(__DIR__)."/viewmodels/quiz/QuizTitleModel.php";

class QuizController extends Controller {

        private $isStarted = false;
        private $previousIndex = 0;
        private $currentIndex = 0;
        private $nextIndex = 0;
        private $quizModel;

    public function actionIndex(){

            $this->isStarted = isset($_GET['index']);
            $this->quizModel = $this->getQuizViewModel();
            $questionCount = count($this->quizModel->questions);

            if($this->isStarted){

                $this->currentIndex = (int)$_GET['index'];

                if($this->currentIndex >= $questionCount){
                    $this->currentIndex = $questionCount - 1;
                }

                $this->previousIndex = $this->currentIndex - 1 < 0
                    ? 0
                    : $this->currentIndex - 1;

                $this->nextIndex = $this->currentIndex + 1 >= $questionCount
                    ? $questionCount
                    : $this->currentIndex + 1;
            }

            $this->render('index', array(
                'quizName' => $this->quizModel->name,
                'quizTitle' => $this->quizModel->title,
                'currentQuestion' => $this->quizModel->questions[$this->currentIndex],
                'nextIndex' => $this->nextIndex,
                'previousIndex' => $this->previousIndex,
                'isStarted' => $this->isStarted,
                'previousButtonDisabled' => $this->currentIndex == 0,
                'nextButtonDisabled' => $this->currentIndex == $questionCount-1,
            ));

    }

    private function getQuizViewModel(){
        //$quizModel = Yii::app()->session['quizModel'];

        //if(is_null($quizModel)){
            $quizModel = new QuizViewModel();
            $quizModel->name = "Рассчитайте стоимость вашей свадьбы";
            $quizModel->questions = $this->getQuizQuestions();
            $quizModel->title = $this->getQuizTitleModel(count($quizModel->questions));
            //Yii::app()->session['quizModel'] = $quizModel;
        //}

        return $quizModel;
    }

    private function getQuizQuestions(){
        $question1 = new QuizQuestionModel();
        $question1->text = "Какой стиль съемки вам подходит больше всего?";
        $question1->type = "SingleSelect";

        $question2 = new QuizQuestionModel();
        $question2->text = "Что вы хотите видеть на фотографиях";
        $question2->type = "MultiSelect";

        $question3 = new QuizQuestionModel();
        $question3->text = "Какие этапы сьемки вас интересуют?";
        $question3->type = "MultiSelectImage";

        $question4 = new QuizQuestionModel();
        $question4->text = "Выберите тип фотосессии";
        $question4->type = "SingleSelectImage";

        return array($question1, $question2, $question3, $question4);
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