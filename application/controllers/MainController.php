<?php
	namespace application\controllers;

	use application\core\engine\Controller;

	class MainController extends Controller
	{

	    public function indexAction()
	    {
	    	$this->view->asset->setMetaDesc('Тестовое описание');
	    	$this->view->asset->setMetaKeys('ключ1, ключ2');
	    	$this->view->asset->setTitle('Главная');
	    	$data['test'] = $this->load->controller('TestController');
	    	$this->view->response('Main/index', $data);
	    }
	}
