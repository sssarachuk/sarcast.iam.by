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
        return array(
            $this->generateQuestion(
                "Какой вид фотосессии вас интересует?",
                "SingleSelectImage",
                array(
                    $this->generateOption("Свадебная фотография", "Свадебная фотография", Yii::app()->params['albumImagesWebDir']."1.jpg"),
                    $this->generateOption("Семейная фотография", "Семейная фотография", Yii::app()->params['albumImagesWebDir']."2.jpg"),
                    $this->generateOption("Портретная фотография", "Портретная фотография", Yii::app()->params['albumImagesWebDir']."3.jpg"),
                    $this->generateOption("Love Story фотография", "Love Story фотография", Yii::app()->params['albumImagesWebDir']."4.jpg"),
                    $this->generateOption("Фотография мероприятий", "Фотография мероприятий", Yii::app()->params['albumImagesWebDir']."5.jpg"),
                    $this->generateOption("Фотография путешествий", "Фотография путешествий", Yii::app()->params['albumImagesWebDir']."6.jpg")
                )
            ),
            $this->generateQuestion(
                "Что вы хотите видеть на фотографиях?",
                "MultiSelect",
                array(
                    $this->generateOption("Сборы жениха и невесты", "Сборы жениха и невесты", null),
                    $this->generateOption("Церемония бракосочетания", "Церемония бракосочетания", null),
                    $this->generateOption("Прогулка", "Прогулка", null),
                    $this->generateOption("Банкет до первого танца", "Банкет до первого танца", null),
                    $this->generateOption("Банкет полностью", "Банкет полностью", null)
                )
            )
        );
    }

    private function generateQuestion($text, $type, $options){
        $question = new QuizQuestionModel();

        $question->text = $text;
        $question->type = $type;
        $question->options = $options;

        return $question;
    }

    private function generateOption($text, $value, $imgUrl){
        $option = new QuizQuestionOption();

        $option->text = $text;
        $option->value = $value;
        $option->imgUrl = $imgUrl;

        return $option;
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