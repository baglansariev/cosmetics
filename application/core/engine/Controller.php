<?php
	namespace core\engine;

    use core\engine\Loader;
    use core\engine\View;
    use core\lib\Request;
    use core\lib\Response;
    use core\lib\Session;
    use core\lib\Mail;

	abstract class Controller
	{
        public $request;
        public $load;
        public $view;
        public $session;
        public $response;
        public $mail;

		public function __construct()
		{
            $this->request = new Request;
            $this->load = new Loader;
            $this->view = new View;
            $this->session = new Session;
            $this->response = new Response;
            $this->mail = new Mail;
		}
	}