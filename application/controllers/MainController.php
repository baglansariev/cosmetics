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
	    	$data['header'] = $this->load->controller('common/HeaderController');
	    	$data['footer'] = $this->load->controller('common/FooterController');
	    	$this->view->response('Main/index', $data);
	    }
	}
