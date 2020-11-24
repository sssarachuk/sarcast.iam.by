<?php
include dirname(__DIR__)."/viewmodels/quiz/QuizViewModel.php";
include dirname(__DIR__)."/viewmodels/quiz/QuizQuestionModel.php";
include dirname(__DIR__)."/viewmodels/quiz/QuizTitleModel.php";
include dirname(__DIR__)."/viewmodels/quiz/QuizQuestionOption.php";

class QuizController extends Controller {

        private $session;
        private $isStarted = false;
        private $quizModel;
        private $previousIndex = 0;
        private $currentIndex = 0;
        private $nextIndex = 0;

    public function actionIndex(){

            $this->session = Yii::app()->session;

            $this->isStarted = isset($_GET['index']);

            $this->setQuizModel();

            if($this->isStarted) {
                $this->setIndexes();
            }

            if(isset($_POST['selectedOption'])){
                $this->updateQuizModelWithSelectedOption();
            }

            $this->render('index', array(
                'quizName' => $this->quizModel->name,
                'quizTitle' => $this->quizModel->title,
                'currentQuestion' => $this->quizModel->questions[$this->currentIndex],
                'nextIndex' => $this->nextIndex,
                'previousIndex' => $this->previousIndex,
                'isStarted' => $this->isStarted,
                'previousButtonDisabled' => $this->currentIndex == 0,
                'nextButtonDisabled' => $this->currentIndex == count($this->quizModel->questions) - 1,
            ));

    }

    private function updateQuizModelWithSelectedOption(){
        $selectedOption = new QuizQuestionOption();
        $selectedOption->value = $_POST['selectedOption'];

        switch($this->quizModel->questions[$this->currentIndex]->type){
            case 'SingleSelect':
            case 'SingleSelectImage':
                $this->quizModel->questions[$this->currentIndex]->selectedOptions = array($selectedOption);
                break;
            case 'MultiSelect':{
                if(isset($_POST['selectedOptionChecked'])){
                    $selectedOptionChecked = filter_var($_POST['selectedOptionChecked'], FILTER_VALIDATE_BOOLEAN);

                    if($selectedOptionChecked){
                        //find and push if not exists
                        $selectedOptionIndex = $this->findSelectedIndex($selectedOption);
                        if($selectedOptionIndex == -1){
                            array_push($this->quizModel->questions[$this->currentIndex]->selectedOptions, $selectedOption);
                        }
                    }
                    else{
                        //find and delete if exists
                        $selectedOptionIndex = $this->findSelectedIndex($selectedOption);
                        if($selectedOptionIndex >= 0)
                        {
                            array_splice($this->quizModel->questions[$this->currentIndex]->selectedOptions, $selectedOptionIndex, 1);
                        }
                    }
                }
            }
            break;
        }


        $this->session->add('quizModel', $this->quizModel);
    }

    private function findSelectedIndex($option){
        $index = -1;
        $selectedOptions = $this->quizModel->questions[$this->currentIndex]->selectedOptions;
        $selectedOptionsCount = count($selectedOptions);

        for ($i = 0; $i < $selectedOptionsCount; $i++){
            if($option->value == $selectedOptions[$i]->value){
                $index = $i;
                break;
            }
        }
        return $index;
    }

    private function setIndexes(){
        $questionCount = count($this->quizModel->questions);

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

    private function setQuizModel(){
        if(!$this->isStarted){
            $this->session->remove('quizModel');
        }

        $quizModel = $this->session->get('quizModel');

        if(is_null($quizModel)){
            $quizModel = new QuizViewModel();
            $quizModel->name = "Рассчитайте стоимость вашей свадьбы";
            $quizModel->questions = $this->getQuizQuestions();
            $quizModel->title = $this->getQuizTitleModel(count($quizModel->questions));
            $this->session->add('quizModel', $quizModel);
        }

        $this->quizModel = $quizModel;
    }

    private function getQuizQuestions(){
        $question1 = new QuizQuestionModel();
        $question1->text = "Какой стиль съемки вам подходит больше всего?";
        $question1->type = "SingleSelectImage";
        $question1Option1 = new QuizQuestionOption();
        $question1Option1->text = "Репортажная";
        $question1Option1->value = "Репортажная";
        $question1Option1->imgUrl = Yii::app()->params['albumImagesWebDir']."1.jpg";
        $question1Option2 = new QuizQuestionOption();
        $question1Option2->text = "Постановочная";
        $question1Option2->value = "Постановочная";
        $question1Option2->imgUrl = Yii::app()->params['albumImagesWebDir']."2.jpg";
        $question1Option3 = new QuizQuestionOption();
        $question1Option3->text = "Микс";
        $question1Option3->value = "Микс";
        $question1Option3->imgUrl = Yii::app()->params['albumImagesWebDir']."3.jpg";;
        $question1->options = array($question1Option1, $question1Option2, $question1Option3);

        $question2 = new QuizQuestionModel();
        $question2->text = "Что вы хотите видеть на фотографиях?";
        $question2->type = "MultiSelect";
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