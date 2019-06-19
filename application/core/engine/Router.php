<?php
	namespace application\core\engine;

	use application\core\engine\View;
	use application\core\lib\Request;

	class Router
	{
		public $routes;
		public $request;
		protected $params = [];

	    public function __construct()
	    {
	        $this->routes = require_once(ROUTES_PATH . 'routes.php');
	        $this->request = new Request;
	    }

	    public function match()
	    {	
	    	foreach ($this->routes as $key => $val) {
	    		if(preg_match("#^$key$#", $this->request->getUri())){
	    			$this->params = $val;
	    			return true;
	    		}
	    	}
	    	return false;
	    }
	    public function run()
	    {
	    	if($this->match()){
	    		$path = 'application\controllers\\'.ucfirst($this->params['controller']).'Controller';
	    		$action = $this->params['action'].'Action';
	    		$controller = new $path();
	    		$controller->$action();
	    	}
	    	else{
	    		View::errorResponse(404, 'Страница не найдена');
	    	}
	    }
	}