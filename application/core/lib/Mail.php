<?php
    namespace core\lib;
    use core\lib\Request;
    use core\lib\phpMailer\src\PHPMailer;

    class Mail
    {
        public $phpMailer;
        public $request;
        public $success_msg;
        public $error_msg;

        public function __construct()
        {
            $this->request = new Request;
            $this->phpMailer = new PHPMailer;
        }
        public function formSend($name, $phone, $message, $clientSubject = 'нет')
        {
            $this->setPhpMailerParams();
            // Письмо
            $this->phpMailer->Subject = 'ES.KZ: Клиент ' . $name . ' заказал звонок'; // Заголовок письма
            $this->phpMailer->Body = "Клиент заказал обратный звонок с сайта es.kz <br> \r\n"; // Текст письма
            $this->phpMailer->Body .= "Имя: $name <br> \r\n"; // Текст письма
            $this->phpMailer->Body .= "Телефон: $phone <br> \r\n"; // Текст письма
            $this->phpMailer->Body .= "Тема клиента: $clientSubject <br> \r\n"; // Текст письма
            $this->phpMailer->Body .= "Сообщение клиента: $message <br> \r\n"; // Текст письма
            // Результат
            if(!$this->phpMailer->send()){
                $this->sendErrorMessage();
                $this->setMessage('error');
                return false;
            }
            $this->setMessage('success');
            return true;
        }

        private function setPhpMailerParams()
        {
            // Настройки
            $this->phpMailer->CharSet = 'UTF-8';
            $this->phpMailer->isSMTP();
            $this->phpMailer->Host = 'smtp.mail.ru';
            $this->phpMailer->SMTPAuth = true;
            $this->phpMailer->Username = 'estaisaule@mail.ru'; // Ваш логин в Яндексе. Именно логин, без @yandex.ru
            $this->phpMailer->Password = 'fromstarnet123!'; // Ваш пароль
            $this->phpMailer->SMTPSecure = 'ssl';
            $this->phpMailer->Port = 465;
            $this->phpMailer->setFrom('estaisaule@mail.ru'); // Ваш Email
            $this->phpMailer->addAddress('estaisaule@mail.ru'); // Email получателя
            $this->phpMailer->isHTML(true);
        }

        private function sendErrorMessage()
        {
            $error_message = 'Message from Modal Form could not be sent. ';
            $error_message .= 'Mailer Error: ' . $this->phpMailer->ErrorInfo;
            $error_message .= ' Time: ' . date('d.m.Y H:i:s');

            $file_path = CORE_PATH . 'error.log';
            $file_content = file_get_contents($file_path);
            $file_content = $file_content . ' \r\n ' . $error_message;
            file_put_contents($file_path, $file_content);
        }

        private function setMessage($status)
        {
            switch ($status){
                case 'success': $this->success_msg = 'Ваше сообщение успешно отправлено';
                    break;
                case 'error': $this->error_msg = 'Произошла ошибка! Пожалуйста попробуйте попозже.';
                    break;
                default: '';
                    break;
            }
        }
    }