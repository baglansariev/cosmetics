<?php
	namespace core\engine;

	use core\engine\View;
	use core\engine\Loader;
	use core\lib\Request;

	abstract class Controller
	{
		public $request;
		public $load;

		public function __construct()
		{
			$this->request = new Request;
			$this->load = new Loader;
			$this->view = new View;
		}
	}