<?php
include dirname(__DIR__)."/viewmodels/quiz/QuizViewModel.php";
include dirname(__DIR__)."/viewmodels/quiz/QuizQuestionModel.php";
include dirname(__DIR__)."/viewmodels/quiz/QuizTitleModel.php";
include dirname(__DIR__)."/viewmodels/quiz/QuizQuestionOption.php";

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

            if(isset($_POST['selectedOption'])){
                $selectedOption = new QuizQuestionOption();
                $selectedOption->value = $_POST['selectedOption'];
                $this->quizModel->questions[$this->currentIndex]->selectedOptions = array($selectedOption);
                Yii::app()->session['quizModel'] = $this->quizModel;
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
        $quizModel = Yii::app()->session['quizModel'];

        if(is_null($quizModel)){
            $quizModel = new QuizViewModel();
            $quizModel->name = "Рассчитайте стоимость вашей свадьбы";
            $quizModel->questions = $this->getQuizQuestions();
            $quizModel->title = $this->getQuizTitleModel(count($quizModel->questions));
            Yii::app()->session['quizModel'] = $quizModel;
        }

        return $quizModel;
    }

    private function getQuizQuestions(){
        $question1 = new QuizQuestionModel();
        $question1->text = "Какой стиль съемки вам подходит больше всего?";
        $question1->type = "SingleSelect";
        $question1Option1 = new QuizQuestionOption();
        $question1Option1->text = "Репортажная";
        $question1Option1->value = "Репортажная";
        $question1Option2 = new QuizQuestionOption();
        $question1Option2->text = "Постановочная";
        $question1Option2->value = "Постановочная";
        $question1Option3 = new QuizQuestionOption();
        $question1Option3->text = "Микс";
        $question1Option3->value = "Микс";
        $question1->options = array($question1Option1, $question1Option2, $question1Option3);

        $question2 = new QuizQuestionModel();
        $question2->text = "Что вы хотите видеть на фотографиях?";
        $question2->type = "SingleSelect";
        $question2Option1 = new QuizQuestionOption();
        $question2Option1->text = "Сборы жениха и невесты";
        $question2Option1->value = "Сборы жениха и невесты";
        $question2Option2 = new QuizQuestionOption();
        $question2Option2->text = "Церемония бракосочетания";
        $question2Option2->value = "Церемония бракосочетания";
        $question2Option3 = new QuizQuestionOption();
        $question2Option3->text = "Прогулка";
        $question2Option3->value = "Прогулка";
        $question2Option4 = new QuizQuestionOption();
        $question2Option4->text = "Банкет до первого танца";
        $question2Option4->value = "Банкет до первого танца";
        $question2Option5 = new QuizQuestionOption();
        $question2Option5->text = "Банкет полностью";
        $question2Option5->value = "Банкет полностью";
        $question2->options = array($question2Option1, $question2Option2, $question2Option3, $question2Option4, $question2Option5);

        $question3 = new QuizQuestionModel();
        $question3->text = "Какой вид фотосессии вас интересует?";
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