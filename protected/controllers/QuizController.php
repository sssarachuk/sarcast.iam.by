<?php
include dirname(__DIR__)."/viewmodels/quiz/QuizViewModel.php";
include dirname(__DIR__)."/viewmodels/quiz/QuizQuestionModel.php";
include dirname(__DIR__)."/viewmodels/quiz/QuizTitleModel.php";
include dirname(__DIR__)."/viewmodels/quiz/QuizQuestionOption.php";
include dirname(__DIR__)."/viewmodels/quiz/QuizQuestionType.php";

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
            case QuizQuestionType::SingleSelect:
            case QuizQuestionType::SingleSelectImage:
            case QuizQuestionType::Datepicker:
                $this->quizModel->questions[$this->currentIndex]->selectedOptions = array($selectedOption);
                break;
            case QuizQuestionType::RangeSelector:
                if(isset($_POST['index']))
                {
                    $index = filter_var($_POST['index'], FILTER_VALIDATE_INT);

                    if(!is_null($index)){
                        if(is_null($this->quizModel->questions[$this->currentIndex]->selectedOptions)){
                            $this->quizModel->questions[$this->currentIndex]->selectedOptions = array(new QuizQuestionOption(), new QuizQuestionOption());
                        }

                        $this->quizModel->questions[$this->currentIndex]->selectedOptions[$index]->value = $selectedOption->value;
                    }
                }
                break;
            case QuizQuestionType::MultiSelect:
            case QuizQuestionType::MultiSelectImage: {
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
                QuizQuestionType::SingleSelectImage,
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
                QuizQuestionType::MultiSelect,
                array(
                    $this->generateOption("Сборы жениха и невесты", "Сборы жениха и невесты", null),
                    $this->generateOption("Церемония бракосочетания", "Церемония бракосочетания", null),
                    $this->generateOption("Прогулка", "Прогулка", null),
                    $this->generateOption("Банкет до первого танца", "Банкет до первого танца", null),
                    $this->generateOption("Банкет полностью", "Банкет полностью", null)
                )
            ),
            $this->generateQuestion(
                "В какой бюджет на фотографа вы хотите уложиться?",
                QuizQuestionType::RangeSelector,
                array(
                    $this->generateOption(150, 150, null),
                    $this->generateOption(600, 600, null),
                ),
                array(
                    $this->generateOption(150, 150, null),
                    $this->generateOption(400, 400, null),
                )
            ),
            $this->generateQuestion(
                "В каком городе будет проходить свадьба?",
                QuizQuestionType::SingleSelectDropDown,
                array(
                    $this->generateOption("Минск", "Минск", null),
                    $this->generateOption("Брест", "Брест", null),
                    $this->generateOption("Гомель", "Гомель", null),
                    $this->generateOption("Могилев", "Могилев", null),
                    $this->generateOption("Гродно", "Гродно", null),
                    $this->generateOption("Краков", "Краков", null),
                    $this->generateOption("Гданьск", "Гданьск", null),
                )
            ),
            $this->generateQuestion(
                "Предполагаемая дата свадьбы",
                QuizQuestionType::Datepicker,
                null
            ),
            $this->generateQuestion(
                "Выберите тип фотосессии",
                QuizQuestionType::SingleSelectImage,
                array(
                    $this->generateOption("Классическая семейная", "Классическая семейная", Yii::app()->params['albumImagesWebDir']."1.jpg"),
                    $this->generateOption("Семейный праздник", "Семейный праздник", Yii::app()->params['albumImagesWebDir']."2.jpg"),
                    $this->generateOption("Детская фотосессия", "Детская фотосессия", Yii::app()->params['albumImagesWebDir']."3.jpg"),
                    $this->generateOption("Детский праздник", "Детский праздник", Yii::app()->params['albumImagesWebDir']."4.jpg"),
                    $this->generateOption("Лайфстайл фотосессия", "Лайфстайл фотосессия", Yii::app()->params['albumImagesWebDir']."5.jpg"),
                    $this->generateOption("Беременность", "Беременность", Yii::app()->params['albumImagesWebDir']."6.jpg"),

                )
            ),
            $this->generateQuestion(
                "Укажите место съемки",
                QuizQuestionType::MultiSelectImage,
                array(
                    $this->generateOption("Фотостудия", "Фотостудия", Yii::app()->params['albumImagesWebDir']."1.jpg"),
                    $this->generateOption("Парки, зелень", "Парки, зелень", Yii::app()->params['albumImagesWebDir']."2.jpg"),
                    $this->generateOption("Помещение (дом, кафе)", "Помещение (дом, кафе)", Yii::app()->params['albumImagesWebDir']."3.jpg"),
                    $this->generateOption("Город, архитектура", "Город, архитектура", Yii::app()->params['albumImagesWebDir']."4.jpg"),
                    $this->generateOption("Пляжи, вода", "Пляжи, вода", Yii::app()->params['albumImagesWebDir']."5.jpg")
                )
            ),
            $this->generateQuestion(
                "Какой стиль съемки вам подходит больше всего?",
                QuizQuestionType::SingleSelect,
                array(
                    $this->generateOption("Репортажная", "Репортажная", null),
                    $this->generateOption("Постановочная", "Постановочная", null),
                    $this->generateOption("Микс", "Микс", null),

                )
            ),
            $this->generateQuestion(
                "Сколько фотографий вы хотите получить?",
                QuizQuestionType::SingleSelect,
                array(
                    $this->generateOption("10+ в обработке", "10+ в обработке", null),
                    $this->generateOption("30+ в обработке", "30+ в обработке", null),
                    $this->generateOption("50+ в обработке", "50+ в обработке", null),
                    $this->generateOption("исходники + обработка лучших", "исходники + обработка лучших", null),
                    $this->generateOption("только исходники", "только исходники", null),
                )
            ),
            $this->generateQuestion(
                "Сколько вам нужно времени на съемку?",
                QuizQuestionType::SingleSelect,
                array(
                    $this->generateOption("1 час", "1 час", null),
                    $this->generateOption("2 часа", "2 часа", null),
                    $this->generateOption("3 часа", "3 часа", null),
                    $this->generateOption("Целый день", "Целый день", null),
                )
            )
        );
    }

    private function generateQuestion($text, $type, $options, $selectedOptions = array()){
        $question = new QuizQuestionModel();

        $question->text = $text;
        $question->type = $type;
        $question->options = $options;
        $question->selectedOptions = $selectedOptions;

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