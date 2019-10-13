<?php

namespace App;

use App\Controllers\HomeController;
use Exception;

class App
{
    private $controller;
    private $controllerFile;
    private $action;
    private $params;
    public  $controllerName;    
    private $path;
    private $host;

    public function __construct()
    {     
        $this->setHost($_SERVER['HTTP_HOST'] . "/aero-dev");
        $this->setPath(realpath('./'));
        $this->url();
    }

    public function run()
    { 
        if (isset($this->controller)) {
            $this->controllerName = ucwords($this->controller) . 'Controller';
            $this->controllerName = preg_replace('/[^a-zA-Z]/i', '', $this->controllerName);
        } else {
            $this->controllerName = "HomeController";
        }

        $this->controllerFile   = $this->controllerName . '.php';
        $this->action           = preg_replace('/[^a-zA-Z]/i', '', $this->action);        

        if (file_exists($this->getPath() . '/App/Controllers/' . $this->controllerFile)) {
            $nomeClasse     = "\\App\\Controllers\\" . $this->controllerName;
            $objetoController = new $nomeClasse($this);

            if (method_exists($objetoController, $this->action)) {
                $objetoController->{$this->action}($this->params);
                return;
            } else if (!$this->action && method_exists($objetoController, 'index')) {
                $objetoController->index($this->params);
                return;
            } else {
                throw new Exception("Nosso suporte já esta verificando desculpe!", 500);
            }        
        }        
        throw new Exception("Página não encontrada.", 404);
    }

    public function url () {

        if (isset($_GET['url'])) {
            $path = $_GET['url'];
            $path = rtrim($path, '/');
            $path = filter_var($path, FILTER_SANITIZE_URL); 

            $path = explode('/', $path);

            $this->controller  = $this->verificaArray( $path, 0 );
            $this->action      = $this->verificaArray( $path, 1 );

            if ($this->verificaArray($path, 2)) {
                unset( $path[0] );
                unset( $path[1] );
                $this->params = array_values( $path );
            }
        }
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    private function verificaArray ( $array, $key ) {
        if ( isset( $array[ $key ] ) && !empty( $array[ $key ] ) ) {
            return $array[ $key ];
        }
        return null;
    }

    public function setPath($path){
        $this->path = $path;
    }

    public function getPath(){
        return $this->path;
    }

    public function getHost(){
        return $this->host;
    }

    public function setHost($host){
        $this->host = $host;
    }
}