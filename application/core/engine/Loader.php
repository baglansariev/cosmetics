<?php
	namespace application\core\engine;

	class Loader
	{

		public function view($view, $arr = [])
		{

			$file = VIEWS_PATH. $view . '.php';

			if(file_exists($file)){
				extract($arr);

				ob_start();
				require_once($file);
				$output = ob_get_clean();
			}

			return $output;
		}

		public function controller($controller)
		{
			$path = '\application\controllers\\'.ucfirst($controller);
			if(class_exists($path)){
				$controller =  new $path;
			}

			$method = 'index';

			if(method_exists($controller, $method)){
				return $controller->$method();
			}
			else{
				return '';
			}
		}

		public function model($model)
		{
			$path = '\application\models\\'.ucfirst($model);
			if(class_exists($path)){
				return new $path;
			}
		}
	}
