<?
	namespace application\core\lib;

	class Request
	{
		private $uri;

		public function __construct()
		{
			$this->uri = trim($_SERVER['REQUEST_URI'], '/');
		}

		public function getUri()
		{
			return $this->uri;
		}

		public function get($name)
		{
			return $_GET[$name];
		}

		public function post($name)
		{
			return $_POST[$name];
		}
	}
