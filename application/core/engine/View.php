<?php
	namespace application\core\engine;

	use \application\core\lib\Asset;

	class View
	{
		public $view;
		public $asset;
		public $layout = 'default';

		public function __construct()
		{
			$this->asset = new Asset;
		}

		public function response($path, $arr = [])
		{
			extract($arr);

			ob_start();
			require_once(VIEWS_PATH . $path . '.php');
			$content = ob_get_clean();
			
			require_once(LAYOUTS_PATH . $this->layout . '.php');
		}

		public static function errorResponse($type, $title)
		{
			http_response_code($type);
			$content = obInclude(VIEWS_PATH . 'errors/' . $type . '.php');
			require_once(LAYOUTS_PATH . $this->layout . '.php');
			exit();
		}

	}

