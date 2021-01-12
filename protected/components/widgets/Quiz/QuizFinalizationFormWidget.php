<?php

include dirname(__DIR__)."/Quiz/models/QuizFinalizationForm.php";

class QuizFinalizationFormWidget extends CWidget {

    private $model;
    private $session;

    public function init() {
        $this->model = new QuizFinalizationForm();
        $this->session = Yii::app()->session;
    }

    public function run() {
        if(isset($_POST['QuizFinalizationForm']))
        {
            $incomingModel = $_POST['QuizFinalizationForm'];
            // collects user input data
            $this->model->setScenario($incomingModel['selectedSource']);
            $this->model->attributes = $incomingModel;
            // validates user input and redirect to previous page if validated
            if($this->model->validate()){
                $this->sendEmail();
            }
        }
        // displays the login form
        $this->render('quiz-finalization-form',array('model'=>$this->model));
    }

    private function generateEmailBody() {
        $message = '<html><body>';
        $message .= '<h1>Контактные данные: </h1>';
        $message .= '<label>Имя: '.$this->model->attributes['name'].'</label>';
        $message .= '<br/>';
        $message .= '<label>'.$this->model->attributes['selectedSource'].': </label>';
        switch($this->model->attributes['selectedSource']){
            case 'Email': $message .= '<label>'.$this->model->attributes['email'].'</label>'; break;
            case 'Telegram':
            case 'Viber':
            case 'WatsUp': $message .= '<label>'.$this->model->attributes['phone'].'</label>'; break;
        }

        $quizModel = $this->session->get('quizModel');

        $message .= '<h2>Ответы на квиз: </h2>';

        if(!is_null($quizModel)){
            $message .= '<h3>'.$quizModel->name.'</h3>';
            $message .= '<ul>';
            foreach($quizModel->questions as $question) {
                $message .= '<li>';
                $message .= '<label>'.$question->text.'</label>';
                $message .= '<br/>';
                $message .= '<label style="color: green">';
                for ($i = 0; $i < count($question->selectedOptions); $i++)
                {
                    $selectedOption = $question->selectedOptions[$i];
                    $message .= $selectedOption->value;
                    if($i + 1 < count($question->selectedOptions))
                    {
                        $message .= ', ';
                    }

                }
                $message .= '</label>';
                $message .= '</li>';
            }
            $message .= '</ul>';
        }


        $message .= '</body></html>';

        return $message;
    }

    private function sendEmail(){
        $sender = Yii::app()->params['adminEmail'];
        $recipient = Yii::app()->params['serviceEmail'];
        $subject = "Результаты квиза от ".$this->model->attributes['name'];
        $headers = 'From:' . $sender."\r\n";
        $headers .= 'Content-Type: text/html;\r\n';
        $message = $this->generateEmailBody();
        if(mail($recipient, $subject, $message, $headers))
        {
            echo "Результаты квиза успешно отправлены";
        }
        else
        {
            echo "Ошибка: Данные не отправлены. Попробуйте снова";
        }
    }

}