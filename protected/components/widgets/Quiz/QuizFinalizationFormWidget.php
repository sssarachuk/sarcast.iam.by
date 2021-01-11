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
            $incomingModel = $_POST['QuizFinalizationForm'];
            // collects user input data
            $this->model->setScenario($incomingModel['selectedSource']);
            $this->model->attributes = $incomingModel;
            // validates user input and redirect to previous page if validated
            if($this->model->validate()){
                $sender = Yii::app()->params['adminEmail'];
                $recipient = Yii::app()->params['serviceEmail'];
                $subject = "Результаты квиза от ".$this->model->attributes['name'];
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

                $message .= '</body></html>';
                $headers = 'From:' . $sender."\r\n";
                $headers .= 'Content-Type: text/html;\r\n';
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
        // displays the login form
        $this->render('quiz-finalization-form',array('model'=>$this->model));
    }

}