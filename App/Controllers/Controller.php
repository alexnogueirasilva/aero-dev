<?php

namespace App\Controllers;

use App\Lib\Sessao;

abstract class Controller
{
    private $app;
    private $viewVar;

    public function __construct($app)
    {
        $this->app = $app;
        $this->setViewParam('nameController', $this->app->getControllerName());
        $this->setViewParam('nameAction', $this->app->getAction());
    }

    public function render($view)
    {
        $viewVar   = $this->getViewVar();
        $sessao    = Sessao::class;

        require_once $this->app->getPath() . '/App/Views/layouts/head.php';
        require_once $this->app->getPath() . '/App/Views/layouts/header.php';
        require_once $this->app->getPath() . '/App/Views/layouts/sidebar.php';
        require_once $this->app->getPath() . '/App/Views/' . $view . '.php';
        require_once $this->app->getPath() . '/App/Views/layouts/footer.php';
    }

    public function redirect($view)
    {
        header('Location: http://' . $this->app->getHost() . $view);
        exit;
    }

    public function getViewVar()
    {
        return $this->viewVar;
    }

    public function setViewParam($varName, $varValue)
    {
        if ($varName != "" && $varValue != "") 
        {
            $this->viewVar[$varName] = $varValue;
        }
    }
}