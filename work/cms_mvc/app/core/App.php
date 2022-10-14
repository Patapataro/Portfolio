<?php


class App
{
  protected $controller = 'home';

  protected $method = 'index';

  protected $params = [];

  public function __construct()
  {
    session_start();
    $url = $this->parseUrl();

    if(file_exists('./app/controllers/' . $url[0] . '.php'))
    {
      $this->controller = $url[0];
      unset($url[0]);
    }
    
      // keeps subscribers out of admin panel
    if($this->controller == 'admin'){
    
        if(isset($_SESSION['user_role']))
        {
            
          if(!($_SESSION['user_role'] === 'admin'))
            {

                $this->controller = 'home';

            }
            
        } else {
            
            $this->controller = 'home';

        }
    }

    require_once './app/controllers/' . $this->controller . '.php';
    $this->controller = new $this->controller;
    if(isset($url[1]))
    {
      if(method_exists($this->controller, $url[1]))
      {
        $this->method = $url[1];
        unset($url[1]);
      }
    }
      
    $this->params = $url ? array_values($url) : [];

    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  protected function parseUrl()
  {
    if(isset($_GET['url']))
    {
      return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
    }
  }
}

