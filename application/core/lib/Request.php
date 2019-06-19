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

		public function getUriWithoutParams()
		{
			$uri = explode('?', $this->uri);

			if(is_array($uri)){
				return array_shift($uri);
			}

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
